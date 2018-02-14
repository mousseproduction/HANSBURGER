<!-- 
    INVOQUER  === SORTIR CARTE DE SA MAIN !!!
 -->

<?php
class Heros {
     use tGetAtrributeTable, tHydrate,tSubir;

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
     * heros_collection = id
     *
     * @var [string]
     */
    private $heros_collection;

    /**
     * illustration =  id
     *
     * @var [INT]
     */
    private $illustrationId;
        
    /**
     * illustration = path
     *
     * @var [string]
     */
    private $illustrationPath;

    /**
     * cartes = tableau composé de plusieurs clés (deck,main,attente,combat, cimetière) stockant des objets "cartes"
     *
     * @var [array]
     */
    private $cartes;


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
                    $this->joueur = $joueur;
    }
        /**
     * Get illustration = id
     *
     * @return  [INT]
     */ 
    public function getIllustrationId()
    {
        return $this->illustrationId;
    }

    /**
     * Set illustration = id
     *
     * @param  [INT]  $illustrationId  illustration = id
     *
     * @return  self
     */ 
    public function setIllustrationId($illustrationId)
    {
        $this->illustrationId = $illustrationId;

        return $this;
    }

    /**
     * Get illustration = path
     *
     * @return  [string]
     */ 
    public function getIllustrationPath()
    {
        return $this->illustrationPath;
    }

    /**
     * Set illustration = path
     *
     * @param  [string]  $illustrationPath  illustration = path
     *
     * @return  self
     */ 
    public function setIllustrationPath($illustrationPath)
    {
        $this->illustrationPath = $illustrationPath;

        return $this;
    }
     /**
     * Get heros_collection.
     *
     * @return heros_collection.
     */
    public function getHeros_collection() { return $this->heros_collection; }

    /**
     * Set heros_collection.
     *
     * @param heros_collection the value to set.
     */
    public function setHeros_collection($heros_collection) {
        if( is_array( $heros_collection) && isset( $heros_collection['id'] ) && is_int( $heros_collection['id'] ) && isset( $heros_collection['nom'] ) ) {
            $this->heros_collection = $heros_collection;
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
  //----------------------------------------------
    //méthodes magiques
    //----------------------------------------------
    
    
   function __construct( array $data ) {
        $this->hydrate( $data );
    }
    //----------------------------------------------
    //méthodes
    //----------------------------------------------
    
    /**
     * Le héros sélectionne au hasard une(ou plussieurs) carte(s) dans le deck
     *
     * @param [int] $nbpioche
     * @return void
     */
    public function piocher ($nbpioche=1){//Nombre de carte à piocher ( 1 par défault)
    $selection=array_rand($this->cartes['deck'],$nbpioche);//Choisis au hasard une ou plusieurs cartes dans le deck identifiée avec leur index
        if( is_array( $selection ) ) {
            foreach ($selection as $carte) {//Pour chaque carte selectionnée (index)
                $this->deplacerCarte ($carte,'deck','main');//On déplace la carte du deck vers la main
                }
        } else {
                $this->deplacerCarte ($selection,'deck','main');
        }
    }

    /**
     * Le héros choisit quelle creature ou bouclier  il veut invoquer
     *
     * @param [int] $indexCarte
     * @return void
     */
    public function invoquer( $indexCarte ) 
    {//Numéro de carte choisie par le heros
        switch($this->cartes['main'][$indexCarte]->getType)
        {
            case'creature':
       
            if ($this->cartes['main'][$indexCarte]->getPrix <= $this->cagnotte) {//Si le prix de la carte choisie est inférieur ou égal à la cagnotte
                $this->cagnotte -= $this->cartes['main'][$indexCarte]->getPrix;//Alors on soustrait le prix de la carte du montant de la cagnotte
                $this->deplacerCarte ($selection,'main','attente');//On déplace la carte de la main vers la zone d'attente
            }else{
                $message= "Vous n'avez pas assez de monnaie pour acheter cette créature";// Sinon message erreur
            }break;    
            
            case'sort':

            if ($this->cartes['main'][$indexCarte]->getPrix <= $this->cagnotte) {//Si le prix de la carte choisie est inférieur ou égal à la cagnotte
                $this->cagnotte -= $this->cartes['main'][$indexCarte]->getPrix;//Alors on soustrait le prix de la carte du montant de la cagnotte
                $this->deplacerCarte ($selection,'main','combat');//On déplace la carte de la main vers la zone de combat
            }else{
                $message= "Vous n'avez pas assez de monnaie pour acheter cette créature";// Sinon message erreur
            }break;
        
        }
            
    }



    /**
     *Si le joueur veut jouer une carte sort, elle passe directement de la main en zone de combat, fait des dégats, puis finit au cimetière
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
                if ( ( substr( $indexCible, 0, 5)  == 'heros' ) &&  ( substr($indexCible,5,1) == $this->id ) ){//Si l'index transmis commence par heros et si le chiffre correspond à l'id du heros
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
     
/**
     *Déplacer une carte d'une zone à une autre
     *
     * @param [int] $indexcarte
     *  @param [char] $zonedépart
     * @param [char] $zonearrivée
     * @return void
     */
    public function deplacerCarte ($carte,$zonedépart,$zonearrivée){
            $this->cartes[$zonedépart][$carte->getId()]->getStatutNom()=$zonearrivée;//On change le statut de la carte choisie
            $this->cartes[$zonearrivée][]=$this->cartes[$zonedépart][$indexCarte];//On la stocke dans la zone d'arrivée
            unset($this->cartes[$zonedépart][$carte->getId()]);// On la supprime dans la zone de départ
    }
 
}
