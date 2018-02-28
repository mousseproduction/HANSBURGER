<?php 

Class GameController {

    private $gameModel;
    private $herosGameModel;
    private $herosCollectionModel;
    private $cardCollectionModel;
    private $cardGameModel;
    private $game;

    public function init( $player1Id, $player2Id )
    {
        $this->game->setHerosActif( new Heros );
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

        $heros1 = new Heros ( [ 'pv'=>20, 'cagnotte'=>0, 'joueur_id'=> $p1, 'heros_collection_id'=>1 ] );
        $heros2 = new Heros ( [ 'pv'=>20, 'cagnotte'=>0, 'joueur_id'=> $p2, 'heros_collection_id'=>2 ] );
        if (rand(1,2)==1) 
        {
            $this->game->setHerosActif( $heros1 );
            $this->game->setHerosInactif( $heros2 );
        } 
        else 
        { 
            $this->game->setHerosActif( $heros2 );
            $this->game->setHerosInactif( $heros1 );
        }
        piocher($joueurActif, 3);
        piocher($joueurInactif,3);

        $compteurTour = 0; 
        $this->game = new Game( [ 'dateDebutPartie' => now() , 'cpt'=> 0 , 'dateFinPartie' => NULL , 'herosActif', 'herosInactif', 'plateau'] );
    }
}