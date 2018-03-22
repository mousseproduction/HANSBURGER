<?php
class Heros {

     use tGetAttributeTable, tHydrate, tSuffer, tIsDead;

    //----------------------------------------------
    //attributs
    //----------------------------------------------
    
    private $id;
    private $statut;
    private $nom;
    private $pv;
    private $cagnotte;
    private $joueur;
    private $heros_collection;
    private $illustrationId;
    private $illustrationPath;
    private $cartes;


     

     
    //----------------------------------------------
    //méthodes magiques
    //----------------------------------------------
    
   function __construct( array $data ) {
        $this->hydrate( $data );
    }


    //----------------------------------------------
    //méthodes
    //----------------------------------------------



                //GESTION ZONE DEST CARTE
    //-----------------------------------------------
    
    /**
     * isCardInZone - test si une carte est dans une zone, retourne la carte si vrai sinon false
     * 
     * @ param int $cardId
     * @ param string $zone
    **/
    public function isCardInZone( $cardId, $zone  ) {
        $zone = ucfirst( $zone );
        if( isset( $this->getCartes()[ $zone ][ $cardId ] ) ) {
            return $this->getCartes()[ $zone ][ $cardId ];
        } else {
            return false; }
    }
    

   /**
     *Déplacer une carte d'une zone à une autre
     *
     * @param [int] $indexcard
     *  @param [char] $zonedépart
     * @param [char] $zonearrivée
     * @return void
     */
    public function moveCard ( Card $card, $destination ){
        $destination = ucfirst( $destination );
        $this->cartes[ $destination ][ $card->getId() ] = $card;//On la stocke dans la zone d'arrivée
        unset($this->cartes[ $card->getStatutNom() ][ $card->getId() ]);// On la supprime dans la zone de départ
        $card->setStatutNom( $destination );//On change le statut de la carte choisie
        switch( $destination ) {
            case 'Main' :
                $card->setStatutId( 2 );
                break;
            case 'Attente' :
                $card->setStatutId( 3 );
                break;
            case 'Combat' :
                $card->setStatutId( 4 );
                break;
            case 'Cimeti�re' :
                $card->setStatutId( 5 );
                break;
        }
    } 


                //GESTION ACHATS
    //-----------------------------------------------


        


    /**
     * Le héros sélectionne au hasard une(ou plussieurs) carte(s) dans le deck
     *
     * @param [int] $nbpioche
     * @return void$flat = call_user_func_array('array_merge', $array);
     */
    public function draw($nbpioche=1){//Nombre de carte à piocher ( 1 par défault)
        if( isset( $this->getCartes()['Deck'] ) && !empty( $this->getCartes()['Deck'] ) ) {
            $selection=array_rand( $this->getCartes()['Deck'], $nbpioche);//Choisis au hasard une ou plusieurs cartes dans le deck identifiée avec leur index
            $updateList = [];
            if( is_array( $selection ) ) {
                foreach ( $selection as $cardId ) {//Pour chaque carte selectionnée (index)
                    if( $card = $this->isCardInZone( $cardId, 'Deck') ) {
                        $this->moveCard( $card, 'Main');//On déplace la carte du deck vers la main
                        $updateList[] = $card;
                    }
                }
            } else {
                    if( $card = $this->isCardInZone( $selection, 'Deck') ) {
                        $this->moveCard( $card, 'Main');//On déplace la carte du deck vers la main
                        $updateList[] = $card;
                    }
            }
            return $updateList;
        }
        return false;
    }


                //GESTION ACHATS
    //-----------------------------------------------

    /**
     * canIBuy - test si assez d'argent pour acheter la carte
     * 
    **/
    public function canIBuy( Card $card ) {
        if ($card->getPrix() <= $this->cagnotte) {//Si le prix de la carte choisie est inférieur ou égal à la cagnotte
            return true;
        } 
        return false;
    }


    /**
     * buy - achete la carte$flat = call_user_func_array('array_merge', $array);
     * 
    **/
    public function buy( Card $card ) {
        $this->setCagnotte( $this->getCagnotte() - $card->getPrix() );
    }
    
    /**
     * isThereShield - 
     * 
    **/
    public function isThereShield(  ) {
        if( isset( $this->getCartes()['Combat']) && !empty($this->getCartes()['Combat']) ) {
            $shieldIndexList=[];
            foreach( $this->getCartes()['Combat'] as $key => $card ) {
                if( $card->getTypeNom() == 'Bouclier' ) {
                    $shieldIndexList[] = $card->getId();
                } 
            }
            if( empty( $shieldIndexList ) ) {
                return false;
            } else {
                return $shieldIndexList;
            }
        }
        return false;
    }

    /**
     * isCemetryFull - test if the cemetry is Full
     * 
    **/
    public function isCemetryFull() {
        if( isset($this->getCartes()['Cimeti�re'] ) ) {
            if( count( $this->getCartes()['Cimeti�re'] ) == 20 ) {
                return true;
            }
        }
        return false;
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
        $this->id = $id;
    }
    
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
        $this->statut = $statut;
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
        $this->nom = $nom;
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
        $this->pv = $pv;
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
        $this->cagnotte = $cagnotte;
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
        $this->heros_collection = $heros_collection;
    }
    
    /**
     * Get illustrationId.
     *
     * @return illustrationId.
     */
    public function getIllustrationId() { return $this->illustrationId; }
    
    /**
     * Set illustrationId.
     *
     * @param illustrationId the value to set.
     */
    public function setIllustrationId($illustrationId) {
        $this->illustrationId = $illustrationId;
    }
    
    /**
     * Get illustrationPath.
     *
     * @return illustrationPath.
     */
    public function getIllustrationPath() { return $this->illustrationPath; }
    
    /**
     * Set illustrationPath.
     *
     * @param illustrationPath the value to set.
     */
    public function setIllustrationPath($illustrationPath) {
        $this->illustrationPath = $illustrationPath;
    }
    
    /**
     * Get cartes.
     *
     * @return cartes.
     */
    public function getCartes() { return $this->cartes; }
    
    /**
     * Set cartes.
     *
     * @param cartes the value to set.
     */
    public function setCartes($cards) {
        foreach( $cards as $key => $card ) {
            $this->cartes[ $card->getStatutNom() ][ $card->getId() ] = $card;
        }
    }
}
