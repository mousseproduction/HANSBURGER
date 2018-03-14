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

    private $updateList;
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
        //instancier sRequest
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

        var_dump( $this->getGame()->getHerosInactif() );

        $this->getGame()->getHerosActif()->draw(3);
        $this->getGame()->getHerosInactif()->draw(3);

        include( 'board.php' );

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
        $this->getGame()->setHerosActif( $this->getHerosGameModel()->selectWhere( 'WHERE `heros_partie`.`id` = ' . $this->getGame()->getHeros1Id() ) );
        $this->getGame()->setHerosInactif( $this->getHerosGameModel()->selectWhere( 'WHERE `heros_partie`.`id` = ' . $this->getGame()->getHeros2Id() ) );
        $this->getGame()->getHerosActif()->setCartes( $this->getCardGameModel()->selectWhere( 'WHERE `heros_partie_id` = ' . $this->getGame()->getHeros1Id() ) );
        $this->getGame()->getHerosInactif()->setCartes( $this->getCardGameModel()->selectWhere( 'WHERE `heros_partie_id` = ' . $this->getGame()->getHeros2Id() ) );
    }
    

    /**
     * update - update (in the database) the elements listed in $this->toUpdateList
     * 
    **/
    public function update() {
        foreach( $this->updateList as $key => $object ) {
            $class = get_class( $object );
            if( $class == 'Creature' || $class == 'Spell' ) {
                $cardGameModel->update( $object );
            }
            if( $class == 'Heros' ) {
                $herosGameModel->update( $object );
            }
            if( $class == 'Game' ) {
                $GameModel->update( $object );
            }
        }
    }


    /**
     * addToUpdateList - ajoute l'objet à updateList
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
    public function getGameModel()
    {
        return $this->gameModel;
    }
    
    /**
     * Set gameModel.
     *
     * @param gameModel the value to set.
     */
    public function setGameModel($gameModel)
    {
        $this->gameModel = $gameModel;
    }
    
    /**
     * Get herosGameModel.
     *
     * @return herosGameModel.
     */
    public function getHerosGameModel()
    {
        return $this->herosGameModel;
    }
    
    /**
     * Set herosGameModel.
     *
     * @param herosGameModel the value to set.
     */
    public function setHerosGameModel($herosGameModel)
    {
        $this->herosGameModel = $herosGameModel;
    }
    
    /**
     * Get herosCollectionModel.
     *
     * @return herosCollectionModel.
     */
    public function getHerosCollectionModel()
    {
        return $this->herosCollectionModel;
    }
    
    /**
     * Set herosCollectionModel.
     *
     * @param herosCollectionModel the value to set.
     */
    public function setHerosCollectionModel($herosCollectionModel)
    {
        $this->herosCollectionModel = $herosCollectionModel;
    }
    
    /**
     * Get cardCollectionModel.
     *
     * @return cardCollectionModel.
     */
    public function getCardCollectionModel()
    {
        return $this->cardCollectionModel;
    }
    
    /**
     * Set cardCollectionModel.
     *
     * @param cardCollectionModel the value to set.
     */
    public function setCardCollectionModel($cardCollectionModel)
    {
        $this->cardCollectionModel = $cardCollectionModel;
    }
    
    /**
     * Get cardGameModel.
     *
     * @return cardGameModel.
     */
    public function getCardGameModel()
    {
        return $this->cardGameModel;
    }
    
    /**
     * Set cardGameModel.
     *
     * @param cardGameModel the value to set.
     */
    public function setCardGameModel($cardGameModel)
    {
        $this->cardGameModel = $cardGameModel;
    }
    
    /**
     * Get game.
     *
     * @return game.
     */
    public function getGame()
    {
        return $this->game;
    }
    
    /**
     * Set game.
     *
     * @param game the value to set.
     */
    public function setGame($game)
    {
        $this->game = $game;
    }
}
