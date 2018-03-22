<?php
class Game {

    use tHydrate, tGetAttributeTable;

     private $id;
     private $dateDebutPartie;
     private $cpt;
     private $partie_terminee;
     private $heros1Id;
     private $heros2Id;
     private $herosActif;
     private $herosInactif;
     private $plateau;


    function __construct( $data = [])
    {
        $this->hydrate( $data );
    } 

     /**
     * Le héros choisit quelle creature ou bouclier il veut invoquer
     *
     * @param [int] $indexCarte
     * @return void
     */
    public function invoke( $indexCard ) {  //Numéro de carte choisie par le heros
        if( ( $card = $this->getHerosActif()->isCardInZone( $indexCard, 'Main' ) )  !== false ) {
            if( $this->getHerosActif()->canIBuy( $card ) ) {
        echo 'its';
                $this->getHerosActif()->buy( $card );
                $this->getHerosActif()->moveCard( $card, 'Attente' );
                if( method_exists( $card, 'onInvocation' ) ) {
                    $card->onInvocation();
                }
                var_dump($card);
                $result = [$card, $this->getHerosActif()];
                return $result;
                //$game->listClickable( 'buyable' );
                //$game->listClickable( 'fightable' );
            } else {
                //$game->listClickable( 'buyable' );
                //$game->listClickable( 'fightable' );
                return  "Tu as pas assez de thunes, retourne chez m�m�...";
            }
        }
        return "tricheur, retourne chez les grecs";
    }


    /**
     *Le héros actif choisit quelle carte il va utiliser pour combattre et quelle carte/héros il veut attaquer
     *
     * @param [int] $carteAttaquante
     * @return void
     */
    public function attack( $assailantIndex, $targetIndex  = null ) {//Numéro de carte choisie par le heros
        if( ( $assailantCard = $this->getHerosActif()->isCardInZone( $assailantIndex, 'Combat' ) )  !== false ) {
            if( $targetIndex == null ) {
                //$game->listClickable( 'targetable' );
            } else {
                if( ( $shieldIndexList = $this->getHerosInactif()->isThereShield() ) !== false ) {
                    if( !in_array( $targetIndex, $shieldIndexList )) {
                        $message = "C'est la première et la dernière fois..... La prochaine fois je sors le gant en polypropyl�ne";
                        return $message;
                    }
                }
                if( is_numeric( $targetIndex ) ) {
                    if( ( $targetCard = $this->getHerosInactif()->isCardInZone( $targetIndex, 'Combat' ) )  !== false ) {
                        $assailantCard->hit( $targetCard );
                        if( $assailantCard->isDead() ) {
                            $this->getHerosActif()->moveCard( $assailantCard, 'Cimeti�re' );
                            $this->isGameOver();
                        } else {
                            $this->getHerosActif()->moveCard( $assailantCard, 'Attente' );
                        }
                        if( $targetCard->isDead() ) {
                            $this->getHerosInactif()->moveCard( $targetCard, 'Cimeti�re' );
                            $this->isGameOver();
                        }
                        return [$assailantCard, $targetCard];
                    } else {
                        return $message = "C'est la première et la dernière fois..... La prochaine fois je sors le gant en latex";
                    }
                } elseif( is_string( $targetIndex ) ) {
                    $assailantCard->hit( $this->getHerosInactif() );
                    $this->isGameOver();
                    $this->getHerosActif()->moveCard( $assailantCard, 'Attente' );
                    return [$assailantCard, $this->getHerosInactif()];
                }
            }
        }
            return $message = "C'est la première et la dernière fois..... La prochaine fois je sors le gant en caoutchouc";
    }

    /**
     * pass - pass round action
     * 
    **/
    public function pass() {
        $cpt = $this->getCpt()+1;
        $this->setCpt( $cpt );
        $updateList[] = $this->endRound( $this->getHerosActif() );
        $this->switchHeros();
        $updateList[] = $this->beginRound( $this->getHerosActif() );
        $updateList[] = $this;
        $updateList[] = $this->getHerosActif();
        $updateList[] = $this->getHerosInactif();
        return $updateList;
    }
    

    /**
     * switchHeros 
    **/
    public function switchHeros()
    {
        $tmp = $this->herosActif;
        $this->herosActif = $this->herosInactif;
        $this->herosInactif = $tmp;
        $this->getHerosActif()->setStatut( 'Actif' );
        $this->getHerosInactif()->setStatut( 'Inactif');
    }


/**
     * Déplace les cartes de la zone d'attente à la zone de combat
     */
    public function endRound( Heros $heros )
        {
            if( isset( $heros->getCartes()['Attente'] ) ) {
                $listUpdate = $heros->getCartes()['Attente'];
                foreach($heros->getCartes()['Attente'] as $key => $card) 
                {
                    $heros->moveCard( $card, 'Combat' );
                }   
                return $listUpdate;
            }
        }


    /**
     * beginRound - pioche une carte et attribue la cagnotte
     * 
    **/
    public function beginRound( Heros $heros ) {
        
        $this->allocateCagnotte( $heros );
        if( $updateList = $heros->draw() ) {
            return $updateList;
        }
    }


    /**
     * allocateCagnotte - attribue la cagnotte
     * 
    **/
    public function allocateCagnotte( Heros $heros) {
        $cagnotte = ceil( $this->getCpt() / 2 );
        if( $cagnotte > 10 ) {
            $cagnotte = 10;
        }
        $heros->setCagnotte( $cagnotte );
    }
    

    
    

    public function isGameOver()
    {
        if (($this->herosActif->isDead()) || $this->herosActif->isCemetryFull()  )
        {
            $this->gameOver( $this->herosActif->getJoueur() );

        }
        elseif ($this->herosInactif->isDead() || $this->herosInactif->isCemetryFull()) 
        {
            $this->gameOver( $this->herosInactif->getJoueur() );
        }
    }

    public function gameOver( $joueur )
    {
        header('Location: index.php');
    }

    public function abandon( $heros )
    {
        if(isset($_POST['abandon']))
        {
           $this->heros['pv'] = 0;
           header ('Location: index.php'); // CREER CONSTANTE PAGE FIN DE PARTIE // 
        }
    }

    /**
     *-----------------------------------------------------
     *  GETTERSN AND SETTERS
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
     * Get dateDebutPartie.
     *
     * @return dateDebutPartie.
     */
    public function getDateDebutPartie() { return $this->dateDebutPartie; }
    
    /**
     * Set dateDebutPartie.
     *
     * @param dateDebutPartie the value to set.
     */
    public function setDateDebutPartie($dateDebutPartie) {
        $this->dateDebutPartie = $dateDebutPartie;
    }
    
    /**
     * Get cpt.
     *
     * @return cpt.
     */
    public function getCpt() { return $this->cpt; }
    
    /**
     * Set cpt.
     *
     * @param cpt the value to set.
     */
    public function setCpt($cpt) {
        $this->cpt = $cpt;
    }
    
    /**
     * Get partie_terminee.
     *
     * @return partie_terminee.
     */
    public function getPartie_terminee() { return $this->partie_terminee; }
    
    /**
     * Set partie_terminee.
     *
     * @param partie_terminee the value to set.
     */
    public function setPartie_terminee($partie_terminee) {
        $this->partie_terminee = $partie_terminee;
        return $this;
    }
    
    /**
     * Get heros1Id.
     *
     * @return heros1Id.
     */
    public function getHeros1Id() { return $this->heros1Id; }
    
    /**
     * Set heros1Id.
     *
     * @param heros1Id the value to set.
     */
    public function setHeros1Id($heros1Id) {
        $this->heros1Id = $heros1Id;
    }
    
    /**
     * Get heros2Id.
     *
     * @return heros2Id.
     */
    public function getHeros2Id() { return $this->heros2Id; }
    
    /**
     * Set heros2Id.
     *
     * @param heros2Id the value to set.
     */
    public function setHeros2Id($heros2Id) {
        $this->heros2Id = $heros2Id;
    }
    
    /**
     * Get herosActif.
     *
     * @return herosActif.
     */
    public function getHerosActif() { return $this->herosActif; }
    
    /**
     * Set herosActif.
     *
     * @param herosActif the value to set.
     */
    public function setHerosActif($herosActif) {
        $this->herosActif = $herosActif;
    }
    
    /**
     * Get herosInactif.
     *
     * @return herosInactif.
     */
    public function getHerosInactif() { return $this->herosInactif; }
    
    /**
     * Set herosInactif.
     *
     * @param herosInactif the value to set.
     */
    public function setHerosInactif($herosInactif) {
        $this->herosInactif = $herosInactif;
    }
    
    /**
     * Get plateau.
     *
     * @return plateau.
     */
    public function getPlateau() { return $this->plateau; }
    
    /**
     * Set plateau.
     *
     * @param plateau the value to set.
     */
    public function setPlateau($plateau) {
        $this->plateau = $plateau;
    }
}
