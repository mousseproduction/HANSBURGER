<?php
abstract class Heros {

    //----------------------------------------------
    //attributs
    //----------------------------------------------
    /**
     * id = id du heros
     *
     * @var [int]
     */
    private $id;

    /**
     * nom = nom du heros model
     *
     * @var [char]
     */
    private $nom;

    /**
     * statut = actif ou inactif
     *
     * @var [char]
     */
    private $statut;

    /**
     * pv = point de vie du héros
     *
     * @var [int]
     */
    private $pv;

    /**
     * cagnotte disponible à chaque tour
     *
     * @var [type]
     */
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

     /**
     * héros Adverse = objet Héros adverse pour la partie
     *
     * @var [objet]
     */
    private $heros_adverse;


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
     * Get the value of cartes
     */ 
    public function getCartes()
    {
        return $this->cartes;
    }

    /**
     * Set the value of cartes
     *
     * @return  self
     */ 
    public function setCartes($cartes)
    {
        $this->cartes = $cartes;

        return $this;
    }

    
    /**
     * Get héros Adverse = objet Héros adverse pour la partie
     *
     * @return  [objet]  $heros_adverse
     */ 
    public function getHeros_adverse()
    {
        return $this->heros_adverse;
    }

    /**
     * Set héros Adverse = objet Héros adverse pour la partie
     *
     * @param  [objet]  $heros_adverse
     *
     * @return  self
     */ 
    public function setHeros_adverse()
    {
        $this->heros_adverse = $heros_adverse;

        return $this;
    }

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
    //méthodes
    //----------------------------------------------
    
    /**
     * undocumented function
     *
     * @return void
     */
    public function getAttributeTable() {
        $attributeList = [ 'id'=>'', 'nom'=>'', 'statut'=>'', 'pv'=>'', 'cagnotte'=>'', 'illustration'=>'' ];
        foreach( $attributeList as $key => $value ) {
            $methode = 'get' . ucfirst( $key );
            if( method_exists( $this, $methode ) ) {
                $value = $this->$methode;
            }
        }
    }


    /**
     * Le héros sélectionne au hasard une(ou plussieurs) carte(s) dans le deck
     *
     * @param [int] $nbpioche
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
     * @param [int] $indexCarte
     * @return void
     */
    public function invoquer( $indexCarte ) {//Numéro de carte choisie par le heros
    // vérifier si la carte choisie est bien dans la main dans l'algo principal (si GET indique ?main=  ???)
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
     * @param [int] $indexAttaquant
     * @return void
     */
    public function choisirAttaquant($indexAttaquant) {//Numéro de carte choisie par le heros
    // vérifier si la carte choisie est bien dans la zone d'attente dans l'algo principal (si GET indique ?attente=  ???)
        $this->cartes['attente'][$indexCarte]->setStatut('Combat');//On passe la carte en statut "combat"
        $this->cartes['combat'][]=$this->cartes['main'][$indexCarte];//On la stocke dans la zone "combat" du héros
        unset($this->cartes['attente'][$indexCarte]);// On la supprime de la zone d'attente du du héros
     }

    /**
     *Si une carte sort est tirée, elle passe directement en zone de combat, fait des dégats, puis finit au cimetière
     *
     * @param [int] $indexAttaquant
     * @return void
     */
    public function jouerSort ($indexCible){
        if ($this->cartes['main'][$indexCible]->getPrix <= $this->cagnotte) {//Si le prix de la carte choisie est inférieur ou égal à la cagnotte
            $this->cagnotte -= $this->cartes['main'][$indexCible]->getPrix();//Alors on soustrait le prix de la carte du montant de la cagnotte
            $this->cartes['main'][$indexCible]['statut']='combat';//Alors on passe la carte sort en statut "combat"
            $this->cartes['combat'][]=$this->cartes['main'][$indexCarte];//On la stocke dans la zone "combat" du joueur actif
            unset($this->cartes['main'][$indexCarte]);// On la supprime de la main du joueur actif
            $indexAttaquant = (count($this->cartes['combat']))-1;// l'index de la carte sort est le dernier des cartes en zone de combat
                if (substr( $indexCible, 0, 5) ) == 'heros' && substr($indexCible,5,1) == $this->id)){//Si l'index transmis commence par heros et si le chiffre correspond à l'id du heros
            $this->setPv( $this->getPv() - $this->getHeros_adverse()->cartes['combat'][$indexAttaquant]->getDegat());//on met à jour les points de vie du heros ciblé en enlevant les degats de la carte attaquante
            // test de la fin de vie du heros
            // if ($this->getPv() < 0 ) {
            //FIN DE PARTIE
            //}
                } elseif(substr( $indexCible, 0, 5) ) == 'carte')) {//Si l'index transmis commence par carte, on récupère le num de la carte
                    $this->getHeros_adverse->getCartes['combat'][$indexCible]->setPv($this->getHeros_adverse->getCartes['combat'][$indexCible]->getPv()) - $this->cartes['combat'][$indexCombat]->getDegat();//on met à jour les points de vie de la carte ciblée en enlevant les degats de la carte attaquante

                    $this->getHeros_adverse()->testDeLaMortCarte($indexCible);// on teste si la carte ciblee est morte
                }
                $this->cartes['combat'][$indexAttaquant]['statut'] = 'cimetiere';// on passe la carte sort au cimetière
                $this->cartes['cimetiere'][] = $this->cartes['combat'][$indexAttaquant];// on enlève la carte sort de la zone de combat
                unset($this->cartes['combat'][$indexAttaquantt]);
        } else {
                $message= "Vous n'avez pas assez de monnaie pour acheter cette créature";// Sinon message erreur
        }
        return $message;
    }
     

 


    
}
