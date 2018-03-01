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
        $this->setHoresCollectionModel( new HerosCollectionModel );
        $this->setCardCollectionModel( new CardCollectionModel );
        $this->setCardGameModel( new CardGameModel );
        echo 'test';
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
        if (rand(1,2)==1) 
        {
            $this->game->setHerosActif( $hans );
            $this->game->setHerosInactif( $burger );
        } 
        else 
        { 
            $this->game->setHerosActif( $burger );
            $this->game->setHerosInactif( $hans );
        }

        //each heros draw 3 cards
        $this->getGame()->getJoueurActif()->draw(3);
        $this->getGame()->getJoueurInactif()->draw(3);
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
        $heros = $this->getHerosCollectionModel()->selectWhere( 'WHERE `nom` = "'.$herosCollectionName.'"' );
        $heros->hydrate( [ 'pv'=>20, 'cagnotte'=>0, 'joueur'=> $playerId ] );
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
        $cards = $this->getCardsCollectionModel()->selectWhere( 'WHERE `heros_collection_id` = "'.$heros->getHeros_Collection().'"' );
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
        $game->hydrate( ['dateDebutPartie'=>date(), 'cpt'=>1, 'dateFinPartie'=>null] );
        $gameId = $this->getGameModel()->add( $game );
        $game->getId( $gameId );
        return $game;
    }
    
}
