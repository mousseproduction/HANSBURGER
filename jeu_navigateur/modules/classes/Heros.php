<?php
class Heros {

     use tGetAttributeTable, tHydrate, tSuffer, tIsDead;

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
     * statut = statut du heros
     *
     * @var [int]
     */
    private $statut;

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
            return false;
        }
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
            case 'Cimetiere' :
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
     * @return void
     */
    public function draw($nbpioche=1){//Nombre de carte à piocher ( 1 par défault)
        if( isset( $this->getCartes()['Deck'] ) && !empty( $this->getCartes()['Deck'] ) ) {
            $selection=array_rand( $this->getCartes()['Deck'], $nbpioche);//Choisis au hasard une ou plusieurs cartes dans le deck identifiée avec leur index
            if( is_array( $selection ) ) {
                foreach ( $selection as $cardId ) {//Pour chaque carte selectionnée (index)
                    $this->moveCard( $this->getCartes()['Deck'][$cardId], 'Main');//On déplace la carte du deck vers la main
                    }
            } else {
                    $this->moveCard( $this->getCartes()['Deck'][$selection], 'Main');//On déplace la carte du deck vers la main
            }
        }
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
     * buy - achete la carte
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
                if( $card->getTypeNom == 'Bouclier' ) {
                    $shieldIndexList[] = $card->getId();
                } 
                if( empty( $shieldIndexList ) ) {
                    return false;
                } else {
                    return $shieldIndexList;
                }
            }
        }
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
        if( ctype_digit( $id ) && $id >= 0 ) {
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
        if( ctype_digit( $pv ) ) {
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
    public function getHeros_collection() 
    { 
        return $this->heros_collection; 
    }

    /**
     * Set heros_collection.
     *
     * @param heros_collection the value to set.
     */
    public function setHeros_collection( $heros_collection ) 
    {
            $this->heros_collection = $heros_collection;
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
    public function setCartes( array $cards)
    {
        foreach( $cards as $key => $card ) {
            $this->cartes[ $card->getStatutNom() ][ $card->getId() ] = $card;
        }
    }

    /**
     * Get statut = statut du heros
     *
     * @return  [int]
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set statut = statut du heros
     *
     * @param  [int]  $statut  statut = statut du heros
     *
     * @return  self
     */ 
    public function setStatut( $statut)
    {
        $this->statut = $statut;

        return $this;
    }
}
