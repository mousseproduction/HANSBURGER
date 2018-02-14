<?php
class PartieController {
    private $partiemodel;
    private $herosmodel;
    private $cartemodel;
    private $partie;


    public function __construct() {
        $this->partiemodel = new PartieModel;
        $this->herosmodel = new HerosModel;
        $this->cartemodel = new CarteModel;
        $this->partie= new PartieClasse;
    }

    // A FAIRE
    public function IniAction() {
        include( 'PartieView.php' );
        $this->partie->premierJoueur();
    }

     

    public function NewPartieAction() {
    
        $compteurtour=0;
        $this->partie->compteurTour();
        
        if (tu peux l'acheter) $this->partie->getHeros_actif()->getCartes['main']->display('cliclable');
        mettre en surbrillance cartes achetables (main) 
        invoque
        mettre en surbrillance bouclier/combat adversaire fait de mettre en surbrillance
        combattre
        fin de tour (attentetocombat, switch hero, calcul cagnotte, pioche nouveau hero)
        A CHAQUE ACTION = include( 'PartieView.php' );
    }
    
    }