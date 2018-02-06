<?php
class Carte {
    
  
    //TODO : Conditionner les setters et commenter les fonctions
    /**
     *-----------------------------------------------------
     *  attributs
     *-----------------------------------------------------
    **/
    private $id;
    private $nom;
    private $pv;
    private $degat;
    private $prix;
    private $herosModeleId;
    private $herosModeleNom;
    private $statutId;
    private $statutNom;
    private $typeId;
    private $typeNom;
    private $illustrationId;
    private $illustrationPath;

    public function hydrate( array $data ) {
        foreach( $data as $key => $value ) {
            $methode = 'set' . ucfirst( $key );
            if( method_exists( $this, $methode ) ) {
                $this->$methode( $value );
            }
        }
    }

    public function __construct( array $data = [] ) {
        $this->hydrate( $data );
    }

    /**
     * getAttributeTable - return the attributes of the instance in an array
     *
     * @return array $attributeTable
     */
    public function getAttributeTable() {
        $attributeTable = [ 'id'=>'',
                            'nom'=>'', 
                            'pv'=>'',
                            'degat'=>'',
                            'prix'=>'',
                            'herosModeleId'=>'',
                            'typeId'=>'',
                            'illustrationId'=>''];
        
        foreach( $attributeTable as $attributeName => $attributeValue ) {
            $methode = 'get' . ucfirst( $attributeName );
            if( method_exists( $this, $methode ) ) {
                $attributeTable[$attributeName] = $this->$methode();
            }
        }
        return $attributeTable;
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
     * Get herosModeleId.
     *
     * @return herosModeleId.
     */
    public function getHerosModeleId() { return $this->herosModeleId; }
    
    /**
     * Set herosModeleId.
     *
     * @param herosModeleId the value to set.
     */
    public function setHerosModeleId($herosModeleId) {
        $this->herosModeleId = $herosModeleId;
    }
    
    /**
     * Get herosModeleNom.
     *
     * @return herosModeleNom.
     */
    public function getHerosModeleNom() { return $this->herosModeleNom; }
    
    /**
     * Set herosModeleNom.
     *
     * @param herosModeleNom the value to set.
     */
    public function setHerosModeleNom($herosModeleNom) {
        $this->herosModeleNom = $herosModeleNom;
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
}
