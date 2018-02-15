<?php
class Carte {

    use tGetAtrributeTable, tHydrate;
    
  
    /**
     *-----------------------------------------------------
     *  ATTRIBUTES
     *-----------------------------------------------------
    **/
    private $id;
    private $nom;
    private $pv;
    private $degat;
    private $prix;
    private $herosId;
    private $herosNom;
    private $statutId;
    private $statutNom;
    private $typeId;
    private $typeNom;
    private $carteCollectionId;
    private $illustrationId;
    private $illustrationPath;
    private $description;


    /**
     *-----------------------------------------------------
     *  METHODES
     *-----------------------------------------------------
    **/

    public function __construct( array $data = [] ) {
        $this->hydrate( $data );
    }

    
    /**
     * display - return html code to display the card
     *
     * @param  string $mode - normale or clicable?
     *
     * @return string $cardHtml
     */
    public function display( string $mode = normale ) {
        if( $mode == 'normale' ) {
            $cardHtml = '';
        }
        if( $mode == 'clicable' ) {
            $cardHtml = '';
        }
        return $cardHtml;
    }
    

    /**
     *-----------------------------------------------------
     *  getters and setters
     *-----------------------------------------------------
    **/

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
     * Get degat.
     *
     * @return degat.
     */
    public function getDegat() { return $this->degat; }

    /**
     * Set degat.
     *
     * @param degat the value to set.
     */
    public function setDegat($degat) {
        if( ctype_digit( $degat ) ) {
            $this->degat = $degat;
        }
    }

    /**
     * Get prix.
     *
     * @return prix.
     */
    public function getPrix() { return $this->prix; }

    /**
     * Set prix.
     *
     * @param prix the value to set.
     */
    public function setPrix($prix) {
        if( ctype_digit( $prix ) ) {
            $this->prix = $prix;
        }
    }

    
    /**
     * Get herosId.
     *
     * @return herosId.
     */
    public function getHerosId() { return $this->herosId; }
    
    /**
     * Set herosId.
     *
     * @param herosId the value to set.
     */
    public function setHerosId($herosId) {
        if( ctype_digit( $herosId ) && $herosId >= 0 ) {
            $this->herosId = $herosId;
        }
    }
    
    /**
     * Get herosNom.
     *
     * @return herosNom.
     */
    public function getHerosNom() { return $this->herosNom; }
    
    /**
     * Set herosNom.
     *
     * @param herosNom the value to set.
     */
    public function setHerosNom($herosNom) {
        if( is_string( $herosNom) ) {
            $this->herosNom = $herosNom;
        }
    }
    
    /**
     * Get statutId.
     *
     * @return statutId.
     */
    public function getStatutId() { return $this->statutId; }
    
    /**
     * Set statutId.
     *
     * @param statutId the value to set.
     */
    public function setStatutId($statutId) {
        if( ctype_digit( $statutId ) && $statutId >= 0 ) {
            $this->statutId = $statutId;
        }
    }
    
    /**
     * Get statutNom.
     *
     * @return statutNom.
     */
    public function getStatutNom() { return $this->statutNom; }
    
    /**
     * Set statutNom.
     *
     * @param statutNom the value to set.
     */
    public function setStatutNom($statutNom) {
        if( is_string( $statutNom ) ) {
            $this->statutNom = $statutNom;
        }
    }
    
    /**
     * Get typeId.
     *
     * @return typeId.
     */
    public function getTypeId() { return $this->typeId; }
    
    /**
     * Set typeId.
     *
     * @param typeId the value to set.
     */
    public function setTypeId($typeId) {
        if( ctype_digit( $typeId ) && $typeId >= 0 ) {
            $this->typeId = $typeId;
        }
    }
    
    /**
     * Get typeNom.
     *
     * @return typeNom.
     */
    public function getTypeNom() { return $this->typeNom; }
    
    /**
     * Set typeNom.
     *
     * @param typeNom the value to set.
     */
    public function setTypeNom($typeNom) {
        if( is_string( $typeNom ) ) {
            $this->typeNom = $typeNom;
        }
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
        if( ctype_digit( $illustrationId ) && $illustrationId >= 0 ) {
            $this->illustrationId = $illustrationId;
        }
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
        if( is_string( $illustrationPath ) ) {
            $this->illustrationPath = $illustrationPath;
        }
    }
    
    /**
     * Get description.
     *
     * @return description.
     */
    public function getDescription() { return $this->description; }
    
    /**
     * Set description.
     *
     * @param description the value to set.
     */
    public function setDescription($description) {
        if( is_string( $description ) ) {
            $this->description = $description;
        }
    }

    
    /**
     * Get carteCollectionId.
     *
     * @return carteCollectionId.
     */
    public function getCarteCollectionId() { return $this->carteCollectionId; }
    
    /**
     * Set carteCollectionId.
     *
     * @param carteCollectionId the value to set.
     */
    public function setCarteCollectionId($carteCollectionId) {
        $this->carteCollectionId = $carteCollectionId;
    }
}
