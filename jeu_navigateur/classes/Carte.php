<?php
abstract class Carte {

    //----------------------------------------------
    //attributs
    //----------------------------------------------
    private $id;
    private $nom;
    private $pv;
    private $degat;
    private $prix;
    private $modele;
    private $heros;
    private $statut;
    private $type;

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
     * Get heros.
     *
     * @return heros.
     */
    public function getHeros() { return $this->heros; }

    /**
     * Set heros.
     *
     * @param heros the value to set.
     */
    public function setHeros($heros) {
        if( is_array( $heros ) && isset( $heros['id'] ) && is_int( $heros['id'] ) && isset( $heros['nom'] ) ) {
            $this->heros = $heros;
        }
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
        if( is_array( $statut ) && isset( $statut['id'] ) && is_int( $statut['id'] ) && isset( $statut['nom'] ) ) {
            $this->statut = $statut;
        }
    }

    /**
     * Get modele.
     *
     * @return modele.
     */
    public function getModele() { return $this->modele; }

    /**
     * Set modele.
     *
     * @param modele the value to set.
     */
    public function setModele($modele) {
        if( is_array( $modele ) && isset( $modele['id'] ) && is_int( $modele['id'] ) && isset( $modele['nom'] ) ) {
            $this->modele = $modele;
        }
    }

    /**
     * Get type.
     *
     * @return type.
     */
    public function getType() { return $this->type; }

    /**
     * Set type.
     *
     * @param type the value to set.
     */
    public function setType($type) {
        if( is_array( $type ) && isset( $type['id'] ) && is_int( $type['id'] ) && isset( $type['nom'] ) ) {
            $this->type = $type;
        }
    }
}


bite couilles chatte