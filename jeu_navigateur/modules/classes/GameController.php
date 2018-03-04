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
        $game = $this->initGame();
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
        echo 'coucou';
        $heros = $this->getHerosCollectionModel()->selectWhere( 'WHERE `nom` = "'.$herosCollectionName.'"' )[0];
        var_dump($heros);
        echo 'coucou';
        $heros->setJoueur( $PlagerId );
        $herosId = $this->getHerosGameModel()->add( $heros );
        $heros->setId( $herosId );
        var_dump($heros);
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
        foreach( $cards as $key => $card ) {
            $card->setStatutId( 1 );
            $card->setStatutName( 'Deck' );
            $cardId = $this->getCardGameModel()->add( $card );
            $card->setId( $cardId );
        }
        return $cards;
    }

    /**
     * initGame - create the new game in db
     * @return Game $game
    **/
    public function initGame() {
        $game = new Game;
        $game->hydrate( ['dateDebutPartie'=>date('d'), 'cpt'=>1, 'dateFinPartie'=>null] );
        $gameId = $this->getGameModel()->add( $game );
        $game->getId( $gameId );
        return $game;
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
