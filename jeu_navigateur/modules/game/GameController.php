<?php 

Class GameController {

    /**
     *-----------------------------------------------------
     *  attributes
     *-----------------------------------------------------
    **/

    private $gameModel;
    private $herosGameModel;
    private $herosCollectionModel;
    private $cardCollectionModel;
    private $cardGameModel;
    private $game;
    private $request;
    private $clickableList;

    /**
     *-----------------------------------------------------
     *  methodes
     *-----------------------------------------------------
    **/


    /**
     * __ comstruct - set the required models on instanciation
    **/
    public function __construct() {
        $this->setGameModel( new GameModel );
        $this->setHerosGameModel( new HerosGameModel );
        $this->setHerosCollectionModel( new HerosCollectionModel );
        $this->setCardCollectionModel( new CardCollectionModel );
        $this->setCardGameModel( new CardGameModel );
        $this->setRequest( sRequest::getInstance() );
    }
        
    //ACTION METHODES
    //----------------------------------------------------

    /**
     * init - create a new game and return the first view
     * @param int $player1Id
     * @param int $player2Id
    **/
    public function initAction( $player1Id, $player2Id )
    {
        //init the two new heros using herosCollection datas
        if (rand(1,2)==1) 
        {
            $p1 = $player1Id;
            $p2 = $player2Id;
        } 
        else 
        { 
            $p1 = $player2Id;
            $p2 = $player1Id;
        }
        $hans = $this->initHeros( $p1, 'Hans Zimmer' );
        $burger = $this->initHeros( $p2, 'Fast Food' );

        //init their cards using cardCollection datas
        $hans->setCartes( $this->initHerosCards( $hans ) );
        $burger->setCartes( $this->initHerosCards( $burger ) );

        //init a new game
        $game = $this->initGame( $hans->getId(), $burger->getId() );
        $this->setGame( $game );
        if (rand(1,2)==1) 
        {
            $this->getGame()->setHerosActif( $hans );
            $this->getGame()->setHerosInactif( $burger );
        } 
        else 
        { 
            $this->getGame()->setHerosActif( $burger );
            $this->getGame()->setHerosInactif( $hans );
        }

        $this->getGame()->getHerosActif()->setStatut( 'Actif' );
        $this->getGame()->getHerosInactif()->setStatut( 'Inactif' );
        $updateList = ( [ $this->getGame()->getHerosActif(), $this->getGame()->getHerosInactif() ] );


        $updateList[] = $this->getGame()->getHerosActif()->draw(3);
        $updateList[] = $this->getGame()->getHerosInactif()->draw(3);
        $this->update( $updateList );

        include( 'board.php' );
    }


    /**
     *  invokeAction- undocumented function
     * 
    **/
    public function invokeAction() {
        $gameId = 16;
        $cardId = $this->getRequest()->get('id');

        $this->loadGame( $gameId );
        $updateList = $this->getGame()->invoke($cardId); //retourne false si pbm sinon retourne le tableau des objets modifiés
        if( is_string($updateList) ) {
            $message = $updateList;
        } else {
            $this->update( $updateList );
        }
        include('modules/game/board.php');
    }

    /**
     * passAction - undocumented function
     * 
    **/
    public function passAction() {
        //$id = $this->request idDeLaCarteInvoquee
        $gameId = 16;

        $this->loadGame($gameId);
        $updateList = $this->getGame()->pass();
        if( is_string($updateList) ) {
            $message = $updateList;
        } else {
            $this->update( $updateList );
        }
        include('modules/game/board.php');
        //retourner le necessaire pour la vue
    }


    /**
     * attackAction - 
     * 
    **/
    public function attackAction() {
        $gameId = 16;
        $assaillantId = $this->getRequest()->get('assaillantId');
        echo $assaillantId;
        $targetId = $this->getRequest()->get('targetId');

        $this->loadGame( $gameId );
        $updateList = $this->getGame()->attack($assaillantId, $targetId);
        if( is_string($updateList) ) {
            $message = $updateList;
        } else {
            $this->update( $updateList );
        }
        include('modules/game/board.php');
    }
    
    
    

    


    //INITIALISATION METHODES
    //----------------------------------------------------

    /**
     * initHeros - create a HerosGame using HerosCollection
     * @param int $player1Id
     * @param string $herosCollectionName
     * @return Heros
    **/
    public function initHeros( $playerId, $herosCollectionName ) {
        $heros = $this->getHerosCollectionModel()->selectWhere( 'WHERE `nom` = "'.$herosCollectionName.'"' )[0];
        $heros->setJoueur( $playerId );
        $heros->setHeros_collection( $heros->getId() );
        $heros->setCagnotte(1);
        $herosId = $this->getHerosGameModel()->add( $heros );
        $heros->setId( $herosId );
        return $heros;
    }
    
    /**
     * initHerosCards - init the cardsGame of a HerosGame using CardCollection
     * @param int $herosId
     * @param int $herosName
     * @return array $cards
    **/
    public function initHerosCards( $heros ) {
        $cards = $this->getCardCollectionModel()->selectWhere( 'WHERE `heros_collection_id` = "'.$heros->getHeros_Collection().'"' );

        /* Clonage Management*/
        $cardClones=[];
        foreach ($cards as $key => $card) {
            if($card->getTypeId() == 1 || $card->getTypeId() == 2  ){
                $cardClones[] = clone $card ;  
            }
        }
        $cards = array_merge( $cards, $cardClones );
        
        //create cards in database
        foreach( $cards as $key => $card ) {
            $card->setStatutId( '1' );
            $card->setStatutNom( 'Deck' );
            $card->setCarteCollectionId($card->getId());
            $card->setHerosId( $heros->getId() );
            $cardId = $this->getCardGameModel()->add( $card );
            $card->setId( $cardId );
        }
        return $cards;
        
    }

    /**
     * initGame - create the new game in db
     * @return Game $game
    **/
    public function initGame( $heros1Id , $heros2Id  ) {
        $game = new Game(['dateDebutPartie'=>date('Y-m-d H:i:s'), 'cpt'=>'1', 'partie_terminee'=>false  , 'heros1Id'=>$heros1Id ,'heros2Id'=>$heros2Id ]);
        
        $gameId = $this->getGameModel()->add( $game );
        $game->setId( $gameId );
        return $game;
    }

    /**
     * loadGame - load all the datas of a game
     * 
    **/
    public function loadGame( $gameId ) {
        $this->setGame( $this->getGameModel()->selectWhere( 'WHERE `id` = ' . $gameId ) );
        $heros1 = $this->getHerosGameModel()->selectWhere( 'WHERE `heros_partie`.`id` = ' . $this->getGame()->getHeros1Id() );
        $heros2 = $this->getHerosGameModel()->selectWhere( 'WHERE `heros_partie`.`id` = ' . $this->getGame()->getHeros2Id() );
        if( $heros1->getStatut() == 'Actif' ) {
            $this->getGame()->setHerosActif( $heros1  );
            $this->getGame()->setHerosInactif(  $heros2 );
        } else{
            $this->getGame()->setHerosActif( $heros2  );
            $this->getGame()->setHerosInactif(  $heros1 );
        }
        $this->getGame()->getHerosActif()->setCartes( $this->getCardGameModel()->selectWhere( 'WHERE `heros_partie_id` = ' . $this->getGame()->getHerosActif()->getId() ) );
        $this->getGame()->getHerosInactif()->setCartes( $this->getCardGameModel()->selectWhere( 'WHERE `heros_partie_id` = ' . $this->getGame()->getHerosInactif()->getId() ) );
    }
    

    /**
     * update - update (in the database) the elements listed in $this->toUpdateList
     * 
    **/
    public function update( array $updateList ) {
        var_dump($updateList);
        array_walk_recursive( $updateList, [$this, 'updateObject'] );
    }

    /**
     * updateObject - update in the database the object passed in parameter
     * 
    **/
    public function updateObject( $object, $key  ) {
        $class = get_class( $object );
        if( $class == 'Creature' || $class == 'Spell' || $class == 'Card' ) {
            $this->getCardGameModel()->update( $object );
        }
        if( $class == 'Heros' ) {
            $this->getHerosGameModel()->update( $object );
        }
        if( $class == 'Game' ) {
            $this->getGameModel()->update( $object );
        }
    }
        

    /**
     * addToUpdateList - ajoute l'objet Ã  updateList
    **/
    public function addToUpdateList( $object ) {
        $this->updateList[] = $object;
    }
    
    

    /**
     * listerCliquable - list the clickable elements for the next view
     * 
     * @param string $mode - define which elements have to be listed
     * 
    **/
    public function listerCliquable( string $mode ) {
        
    }
    /**
     *-----------------------------------------------------
     *  GETTERS AND SETTERS
     *-----------------------------------------------------
    **/
    
    /**
     * Get gameModel.
     *
     * @return gameModel.
     */
    public function getGameModel() { return $this->gameModel; }
    
    /**
     * Set gameModel.
     *
     * @param gameModel the value to set.
     */
    public function setGameModel($gameModel) {
        $this->gameModel = $gameModel;
    }
    
    /**
     * Get herosGameModel.
     *
     * @return herosGameModel.
     */
    public function getHerosGameModel() { return $this->herosGameModel; }
    
    /**
     * Set herosGameModel.
     *
     * @param herosGameModel the value to set.
     */
    public function setHerosGameModel($herosGameModel) {
        $this->herosGameModel = $herosGameModel;
    }
    
    /**
     * Get herosCollectionModel.
     *
     * @return herosCollectionModel.
     */
    public function getHerosCollectionModel() { return $this->herosCollectionModel; }
    
    /**
     * Set herosCollectionModel.
     *
     * @param herosCollectionModel the value to set.
     */
    public function setHerosCollectionModel($herosCollectionModel) {
        $this->herosCollectionModel = $herosCollectionModel;
    }
    
    /**
     * Get cardCollectionModel.
     *
     * @return cardCollectionModel.
     */
    public function getCardCollectionModel() { return $this->cardCollectionModel; }
    
    /**
     * Set cardCollectionModel.
     *
     * @param cardCollectionModel the value to set.
     */
    public function setCardCollectionModel($cardCollectionModel) {
        $this->cardCollectionModel = $cardCollectionModel;
    }
    
    /**
     * Get cardGameModel.
     *
     * @return cardGameModel.
     */
    public function getCardGameModel() { return $this->cardGameModel; }
    
    /**
     * Set cardGameModel.
     *
     * @param cardGameModel the value to set.
     */
    public function setCardGameModel($cardGameModel) {
        $this->cardGameModel = $cardGameModel;
    }
    
    /**
     * Get game.
     *
     * @return game.
     */
    public function getGame() { return $this->game; }
    
    /**
     * Set game.
     *
     * @param game the value to set.
     */
    public function setGame($game) {
        $this->game = $game;
    }
    
    /**
     * Get request.
     *
     * @return request.
     */
    public function getRequest() { return $this->request; }
    
    /**
     * Set request.
     *
     * @param request the value to set.
     */
    public function setRequest($request) {
        $this->request = $request;
    }
    
    /**
     * Get clickableList.
     *
     * @return clickableList.
     */
    public function getClickableList() { return $this->clickableList; }
    
    /**
     * Set clickableList.
     *
     * @param clickableList the value to set.
     */
    public function setClickableList($clickableList) {
        $this->clickableList = $clickableList;
    }
}
