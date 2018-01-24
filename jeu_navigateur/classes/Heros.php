<?php
abstract class Heros {

    //----------------------------------------------
    //attributs
    //----------------------------------------------
    private $id;
    private $nom;
    private $statut;
    private $pv;
    private $cagnotte;
    /**
     * joueur = tableau composé de plusieurs clés : id,nom
     *
     * @var [array]
     */
    private $joueur;
    /**
     * heros_modele = tableau composé de plusieurs clés : id,nom
     *
     * @var [array]
     */
    private $heros_modele;
    /**
     * illustration = tableau composé de plusieurs clés : id,path
     *
     * @var [array]
     */
    private $illustration;
    /**
     * cartes = tableau composé de plusieurs clés (deck,main,attente,combat, cimetière) stockant des objets "cartes"
     *
     * @var [array]
     */
    private $cartes;


    private function hydrate( array $data ) {
        foreach( $data as $key => $value ) {
            $methode = 'set' . ucfirst( $key );
            if( method_exists( $this, $methode ) {
                $this->$methode( $value );
            }
        }
    }

    function __construct( array $data ) {
        $this->hydrate( $data )

    }

    //----------------------------------------------
    //getters et setters
    //----------------------------------------------
    /**
     * Get id.
     *
     * @return id.
     */
    public function getId() { return $this->id; }

    /**
     * Set id.
     *
     * @param id the value to set.
     */
    public function setId($id) {
        if( is_int( $id ) && $id >= 0 ) {
            $this->id = $id;
        }
    }

    /**
     * Get nom.
     *
     * @return nom.
     */
    public function getNom() { return $this->nom; }

    /**
     * Set nom.
     *
     * @param nom the value to set.
     */
    public function setNom($nom) {
        if( is_string( $nom  ) ) {
            $this->nom = $nom;
        }
    }

    /** VOIR S'IL EST POSSIBLE DE BLOQUER LA SAISIE "ACTIF" ou "INACTIF" */
    /**
     * Get statut.
     *
     * @return statut.
     */
    public function getStatut() { return $this->statut; }

    /**
     * Set statut.
     *
     * @param statut the value to set.
     */
    public function setStatut($statut) {
        if( is_string( $statut  ) ) {
            $this->statut = $statut;
        }
    }

    /**
     * Get pv.
     *
     * @return pv.
     */
    public function getPv() { return $this->pv; }

    /**
     * Set pv.
     *
     * @param pv the value to set.
     */
    public function setPv($pv) {
        if( is_int( $pv ) ) {
            $this->pv = $pv;
        }
    }

    /**
     * Get cagnotte.
     *
     * @return cagnotte.
     */
    public function getCagnotte() { return $this->cagnotte; }

    /**
     * Set cagnotte.
     *
     * @param cagnotte the value to set.
     */
    public function setCagnotte($cagnotte) {
        if( is_int( $cagnotte ) ) {
            $this->cagnotte = $cagnotte;
        }
    }

    /**
     * Get joueur.
     *
     * @return joueur.
     */
    public function getJoueur() { return $this->joueur; }

    /**
     * Set joueur.
     *
     * @param joueur the value to set.
     */
    public function setJoueur($joueur) {
        if( is_array( $joueur) && isset( $joueur['id'] ) && is_int( $joueur['id'] ) && isset( $joueur['nom'] ) ) {
            $this->joueur = $joueur;
        }
    }

    /**
     * Get heros_modele.
     *
     * @return heros_modele.
     */
    public function getHeros_modele() { return $this->heros_modele; }

    /**
     * Set heros_modele.
     *
     * @param heros_modele the value to set.
     */
    public function setHeros_modele($heros_modele) {
        if( is_array( $heros_modele) && isset( $heros_modele['id'] ) && is_int( $heros_modele['id'] ) && isset( $heros_modele['nom'] ) ) {
            $this->heros_modele = $heros_modele;
        }
    }
     * Get heros_modele.
     *
     * @return heros_modele.
     */
    public function getHeros_modele() { return $this->heros_modele; }

    /**
     * Set heros_modele.
     *
     * @param heros_modele the value to set.
     */
    public function setHeros_modele($heros_modele) {
        if( is_array( $heros_modele) && isset( $heros_modele['id'] ) && is_int( $heros_modele['id'] ) && isset( $heros_modele['nom'] ) ) {
            $this->heros_modele = $heros_modele;
        }
    }

    /**
     * Get illustration.
     *
     * @return illustration.
     */
    public function getIllustration() { return $this->illustration; }

    /**
     * Set illustration.
     *
     * @param illustration the value to set.
     */
    public function setIllustration($heros_modele) {
        if( is_array( $illustration) && isset( $illustration['id'] ) && is_int( $illustration['id'] ) && isset( $illustration['path'] ) ) {
            $this->illustration = $illustration;
        }
    }

    /**
     * Le héros sélectionne au hasard une(ou plussieurs) carte(s) dans le deck
     *
     * @param integer $nbpioche
     * @return void
     */
    public function piocher ($nbpioche=1){//Nombre de carte à piocher ( 1 par défault)
    $selection=array_rand($this->cartes['deck'],$nbpioche);//Choisis au hasard une ou plusieurs cartes dans le deck identifiée avec leur index
        if( is_array( $selection ) ) {
            foreach ($selection as $value) {//Pour chaque carte selectionnée (index)
                $this->cartes['deck'][$value]->setStatut('Main');//on modifie le statut de la carte (de deck => main)
                $this->cartes['main'][]=$this->cartes['deck'][$value];//On ajoute la carte dans la main
                unset($this->cartes['deck'][$value]);//On supprime la carte du deck
                }
        } else {
                $this->cartes['deck'][$selection]->setStatut('Main');//on modifie le statut de la carte (de deck => main)
                $this->cartes['main'][]=$joueur['deck'][$selection];//On ajoute la carte dans la main
                unset($this->cartes['deck'][$selection]);//On supprime la carte du deck
        }
    }

    /**
     * Le héros choisit quelle carte il veut invoquer
     *
     * @param [type] $indexCarte
     * @return void
     */
    public function invoquer( $indexCarte ) {//Numéro de carte choisie par le heros
     // vérifier si la carte choisie est bien dans la main ???
        if ($this->cartes['main'][$indexCarte]->getPrix <= $this->cagnotte) {//Si le prix de la carte choisie est inférieur ou égal à la cagnotte
            $this->cagnotte -= $this->cartes['main'][$indexCarte]->getPrix;//Alors on soustrait le prix de la carte du montant de la cagnotte
            $this->cartes['main'][$indexCarte]->setStatut('Attente');//Alors on passe la carte en statut "attente"
            $this->cartes['attente'][]=$this->cartes['main'][$indexCarte];//On la stocke dans la zone "attente" du joueur actif
            unset($this->cartes['main'][$indexCarte]);// On la supprime de la main du heros
        } else {
            $message= "Vous n'avez pas assez de monnaie pour acheter cette créature";// Sinon message erreur
        }
    }

    /**
     * Passer son tour = Le héros passe du statut actif au statut inactif
     *
     * @return void
     */
    public function passerSonTour(){
        $this->setStatut('Inactif');
    }

    /**
     * A générer depuis PARTIE ???
     *
     * @return void
     */
    public function abandonner(){
       $partie->setPartie_terminee('true'));
        $message='La partie est finie';
    }


    /**
     *Le héros choisit quelle carte il va utiliser pour combattre
     *
     * @param [type] $indexAttaquant
     * @return void
     */
    public function choisirAttaquant($indexAttaquant) {//Numéro de carte choisie par le heros
    // vérifier si la carte choisie est bien dans la zone d'attente ???
        $this->cartes['attente'][$indexCarte]->setStatut('Combat');//On passe la carte sort en statut "combat"
        $this->cartes['combat'][]=$this->cartes['main'][$indexCarte];//On la stocke dans la zone "combat" du héros
        unset($this->cartes['attente'][$indexCarte]);// On la supprime de la zone d'attente du du héros
     }


     
    /** A FINIR !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
     *Le héros attaqué encaisse les dégats !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
     *
     * @param [type] $indexCible
     * @return void
     */
    public function vérifierCible($indexCible) {//Héros adversaire ou Numéro de carte choisie par le heros
        switch ($indexCible) {
            case 1 : $indexCible = 'joueur';
                break;
            case 2 :
                $indexCible = readline('Quelle carte souhaitez-vous attaquer?');
        }
        $indexCombat = (count($joueurActif['combat']))-1;
        if ($indexCible == 'joueur'){
                $joueurInactif['caracteristiques']['pv'] -= $joueurActif['combat'][$indexCombat]['degats'];
        } else {
                $joueurInactif['combat'][$indexCible]['pv'] -= $joueurActif['combat'][$indexCombat]['degats'];

                testDeLaMortCarte( $joueurInactif, $indexCible);
        }
        $joueur['combat'][$indexCombat]['statut'] = 'cimetiere';
        $joueur['cimetiere'][] = $joueur['combat'][$indexCombat];
        echo 'Dans ta gueule la boule de feu brrrra';
        unset($joueur['combat'][$indexCombat]);
    } else {
            echo "Vous n'avez pas assez de monnaie pour acheter cette créature";// Sinon message erreur
    }

     $this->cartes['main'][$indexCarte]->setStatut('Combat');//Alors on passe la carte en statut "attente"
}
}
