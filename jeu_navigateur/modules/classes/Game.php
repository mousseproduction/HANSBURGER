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
                $this->getHerosActif()->buy( $card );
                $this->getHerosActif()->moveCard( $card, 'Attente' );
                if( method_exists( $card, 'onInvocation' ) ) {
                    $card->onInvocation();
                }
                //$game->listClickable( 'buyable' );
                //$game->listClickable( 'fightable' );
            } else {
                //$game->listClickable( 'buyable' );
                //$game->listClickable( 'fightable' );
                return  "C'est la première et la dernière fois..... La prochaine fois j'appelle la crampe";
            }
        return false;
        }
    }


    /**
     *Le héros actif choisit quelle carte il va utiliser pour combattre et quelle carte/héros il veut attaquer
     *
     * @param [int] $carteAttaquante
     * @return void
     */
    public function attack(int $assailantIndex, $targetIndex  = null ) {//Numéro de carte choisie par le heros
        if( ( $assailantCard = $this->getHerosActif()->isCardInZone( $assailantIndex, 'Combat' ) )  !== false ) {
            if( $targetIndex == null ) {
                //$game->listClickable( 'targetable' );
            } else {
                if( ( $shieldIndexList = $this->getHerosInactif()->isThereShield() ) !== false ) {
                    if( !in_array( $targetIndex, $shieldIndexList )) {
                        $message = "C'est la première et la dernière fois..... La prochaine fois je sors le gant en latex";
                        return $message;
                    }
                }
                if( is_numeric( $targetIndex ) ) {
                    if( ( $targetCard = $this->getHerosInactif()->isCardInZone( $targetIndex, 'Combat' ) )  !== false ) {
                        $assailantCard->hit( $targetCard );
                    } else {
                        return $message = "C'est la première et la dernière fois..... La prochaine fois je sors le gant en latex";
                    }
                } elseif( is_string( $targetIndex ) ) {
                    $assailantCard->hit( $this->getHerosInactif() );
                }
                $this->getHerosActif()->moveCard( $assailantCard, 'Attente' );
                //$game->listClickable( 'buyable' );
                //$game->listClickable( 'fightable' ); 
                }
        }
    }

    /**
     * pass - pass round action
     * 
    **/
    public function pass() {
        $cpt = $this->getCpt()+1;
        $this->setCpt( $cpt );
        $this->endRound( $this->getHerosActif() );
        $this->switchHeros();
        $this->beginRound( $this->getHerosActif() );
    }
    

    /**
     * switchHeros 
    **/
    public function switchHeros()
    {
        $tmp = $this->herosActif;
        $this->herosActif = $this->herosInactif;
        $this->herosInactif = $tmp;
        
    }


/**
     * Déplace les cartes de la zone d'attente à la zone de combat
     */
    public function endRound( Heros $heros )
        {
            if( isset( $heros->getCartes()['attente'] ) ) {
                foreach($heros->getCartes()['attente'] as $key => $card) 
                {
                    $heros->moveCard( $card, 'Combat' );
                }   
            }
        }


    /**
     * beginRound - pioche une carte et attribue la cagnotte
     * 
    **/
    public function beginRound( Heros $heros ) {
        $heros->draw();
        $this->allocateCagnotte( $heros );
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

        
     /************************
      * GET THE VALUE OF id
      ************************/ 
     public function getId()
     {
      return $this->id;
     }

     /***************************
      * SET THE VALUE OF id
      *
      * @return  self
      **************************/ 
     public function setId($id)
     {
        if( ctype_digit( $id ) && $id >= 0 ) 
        {
            $this->id = $id;
        }
      return $this;
     }

     /*******************************
      * GET THE VALUE OF date
      ******************************/ 
     public function getDateDebutPartie()
     {
      return $this->dateDebutPartie;
     }

     /*******************************
      * SET THE VALUE OF dateDebutPartie
      *
      * @return  self
      ******************************/ 
     public function setDateDebutPartie($date)
     {
        $this->dateDebutPartie = $date;
         return $this;
     }

     /*****************************
      * GET THE VALUE OF cpt COMPTEUR DE TOURS
      ****************************/ 
     public function getCpt()
     {
      return $this->cpt;
     }

     /*****************************
      * SET THE VALUE OF cpt
      *
      * @return  self
      ****************************/ 
     public function setCpt( $cpt)
     {
          $this->cpt = $cpt;
          return $this;
     }

     /****************************
      * GET THE VALUE OF heros1
      ****************************/ 
     public function getHerosActif()
     {
      return $this->herosActif;
     }

     /*****************************
      * SET THE VALUE OF heros1
      *
      * @return  self
      ****************************/ 
     public function setHerosActif( Heros $herosActif )
     {
            $this->herosActif = $herosActif;
        return $this;
     }

     /*****************************
      * GET THE VALUE OF heros2
      ****************************/ 
     public function getHerosInactif()
     {
      return $this->herosInactif;
     }

     /********************************
      * SET THE VALUE OF heros2
      *
      * @return  self
      *******************************/ 
     public function setHerosInactif( Heros $herosInactif)
     {
            $this->herosInactif = $herosInactif;
        return $this;
     }

     /********************************
      * GET THE VALUE OF plateau
      *******************************/ 
     public function getPlateau()
     {
      return $this->plateau;
     }

     /********************************
      * SET THE VALUE OF plateau
      *
      * @return  self
      *******************************/ 
     public function setPlateau($plateau)
     {
            $this->plateau = $plateau;
      return $this;
     }

     /**
      * Get the value of partie_terminee
      */ 
     public function getPartie_terminee()
     {
          return $this->partie_terminee;
     }

     /**
      * Set the value of partie_terminee
      *
      * @return  self
      */ 
     public function setPartie_terminee($partie_terminee)
     {
          $this->partie_terminee = $partie_terminee;

          return $this;
     }

     /**
      * Get the value of heros1Id
      */ 
     public function getHeros1Id()
     {
          return $this->heros1Id;
     }

     /**
      * Set the value of heros1Id
      *
      * @return  self
      */ 
     public function setHeros1Id($heros1Id)
     {
          $this->heros1Id = $heros1Id;
          return $this;
     }

     /**
      * Get the value of heros2Id
      */ 
     public function getHeros2Id()
     {
          return $this->heros2Id;
     }

     /**
      * Set the value of heros2Id
      *
      * @return  self
      */ 
     public function setHeros2Id($heros2Id)
     {
          $this->heros2Id = $heros2Id;

          return $this;
     }
}
