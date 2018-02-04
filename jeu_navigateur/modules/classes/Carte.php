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
    private $heroModeleNom;
    private $statut;
    private $type;
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
                            'nom'=>'', 'pv'=>'',
                            'degat'=>'',
                            'prix'=>'',
                            'herosModeleId'=>'',
                            'herosModeleNom'=>'',
                            'statut'=>'',
                            'type'=>'',
                            'illustrationId'=>'',
                            'illustrationNom'=>''];
        
        foreach( $attributeTable as $attributeName => $attributeValue ) {
            $methode = 'get' . ucfirst( $attributeName );
            if( method_exists( $this, $methode ) ) {
                $attributeValue = $this->$methode;
            }
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
        if( is_int( $degat ) ) {
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
        if( is_int( $prix ) ) {
            $this->prix = $prix;
        }
    }

    /**
     * Set illustrationPath.
     *
     * @param illustrationPath the value to set.
     */
    public function setIllustrationPath($illustrationPath) {
        $this->illustrationPath = $illustrationPath;
    }
    
    /**
     * Get illustrationPath.
     *
     * @return illustrationPath.
     */
    public function getIllustrationPath() { return $this->illustrationPath; }
    
    /**
     * Set illustrationId.
     *
     * @param illustrationId the value to set.
     */
    public function setIllustrationId($illustrationId) {
        $this->illustrationId = $illustrationId;
    }
    
    /**
     * Get illustrationId.
     *
     * @return illustrationId.
     */
    public function getIllustrationId() { return $this->illustrationId; }
    
    /**
     * Set type.
     *
     * @param type the value to set.
     */
    public function setType($type) {
        $this->type = $type;
    }
    
    /**
     * Get type.
     *
     * @return type.
     */
    public function getType() { return $this->type; }
    
    /**
     * Set statut.
     *
     * @param statut the value to set.
     */
    public function setStatut($statut) {
        $this->statut = $statut;
    }
    
    /**
     * Get statut.
     *
     * @return statut.
     */
    public function getStatut() { return $this->statut; }
    
    /**
     * Set heroModeleNom.
     *
     * @param heroModeleNom the value to set.
     */
    public function setHeroModeleNom($heroModeleNom) {
        $this->heroModeleNom = $heroModeleNom;
    }
    
    /**
     * Get heroModeleNom.
     *
     * @return heroModeleNom.
     */
    public function getHeroModeleNom() { return $this->heroModeleNom; }
    
    /**
     * Set herosModeleId.
     *
     * @param herosModeleId the value to set.
     */
    public function setHerosModeleId($herosModeleId) {
        $this->herosModeleId = $herosModeleId;
    }
    
    /**
     * Get herosModeleId.
     *
     * @return herosModeleId.
     */
    public function getHerosModeleId() { return $this->herosModeleId; }
      
}
