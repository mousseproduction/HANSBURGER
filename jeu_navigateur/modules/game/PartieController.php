<?php
class PartieController {

    private $partiemodel;
    private $request;


    public function __construct() {
        $this->partiemodel = new PartieModel;
        $partie =
        $this->request = sRequest::getInstance();
    }

//    // A FAIRE
//    public function IniAction()uuu {
//        include( 'PartieView.php' );
//        $this->partie->premierJoueur();
//    }
//
//     
//
//    public function NewPartieAction() {
//    
//        $compteurtour=0;
//        $this->partie->compteurTour();
//        
//        if (tu peux l'acheter) $this->partie->getHeros_actif()->getCartes['main']->display('cliclable');
//        mettre en surbrillance cartes achetables (main) 
//        invoque
//        mettre en surbrillance bouclier/combat adversaire fait de mettre en surbrillance
//        combattre
//        fin de tour (attentetocombat, switch hero, calcul cagnotte, pioche nouveau hero)
//        A CHAQUE ACTION = include( 'PartieView.php' );
//    }

    public function invoquerAction( $post ) {
        if( isset( $post['id'] ) ) {
            if( $partie->getJoueurActif()->invoquer( $post['id'] ) ) {
                $partie->update(); 
            } else {
                $message = "Tu as tenté de tricher petit coquinou, mais sache que tant que je vivrai, tu ne seras jamais qu'une ptite bite...";
            }
        } else {
            $message = "Tu as tenté de tricher petit coquinou, mais sache que tant que je vivrai, tu ne seras jamais qu'une ptite bite...";
        }
        $partie->listerCliquable( 'choix' );
        require_once('partieView.php');
    }



    public function attaquerAction() {
        //ajouter les methodes d'attaque
        $partie->getJoueurActif()->attaquer( $post );
        $partie->update(); 
        $partie->listerCliquable( 'choix' );
        require_once('partieView.php');
        
    }



    public function passerTourAction() {
        $partie->passerTour();
        $partie->update(); 
        $partie->listerCliquable( 'choix' );
        require_once('partieView.php');
    }
    
    
    
    
}
