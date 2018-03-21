<?php
class Card {

    use tGetAttributeTable, tHydrate, tSuffer, tIsDead;
    
  
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
        echo '<p>' . $this->getNom() . ' //type:' . $this->getTypeNom() . ' //statut:' . $this->getStatutNom() . ' //id:' .$this->getId() . ' //pv:' . $this->getPv() . '</p>';
    }


    /**
     * hit - hit the target and is hit back
     *
     * @param $target
    **/
    public function hit( $target ) {
        $target->suffer( $this->getDegat() );
        if( is_a( $target, 'Card' ) ) {
            $this->suffer( $target->getDegat() );
        }
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
        $this->id = $id;
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
        $this->degat = $degat;
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
        $this->prix = $prix;
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
        $this->herosId = $herosId;
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
        $this->herosNom = $herosNom;
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
        $this->statutId = $statutId;
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
        $this->statutNom = $statutNom;
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
        $this->typeId = $typeId;
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
        $this->typeNom = $typeNom;
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
        $this->description = $description;
    }
}
