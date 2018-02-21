<?php
class Game {

    use tHydrate, tGetAttributeTable;

     private $id;
     private $dateDebutPartie;
     private $cpt;
     private $dateFinPartie;
     private $herosActif;
     private $herosInactif;
     private $plateau;

     private $updateList; //tableau des objets à mettre à jour en base de donnée
     private $clickableList; //liste des objets qui doivent être cliquables



    function __construct( $data = [])
    {
        $this->hydrate( $data );

    } 

     /**
     * Le héros choisit quelle creature ou bouclier  il veut invoquer
     *
     * @param [int] $indexCarte
     * @return void
     */
    public function invoke( $indexCard ) {//Numéro de carte choisie par le heros
        if( ( $card = $this->getHerosActif()->isCardInZone( $indexCard, 'Main' ) )  !== false ) {
            if( $this->getHerosActif()->canIBuy( $card ) ) {
                $this->getHerosActif()->buy( $card );
                $this->getHerosActif()->moveCard( $card, 'Attente' );
                if( method_exists( $card, 'onInvocation' ) ) {
                    $card->onInvocation();
                }
                $game->listClickable( 'buyable' );
                $game->listClickable( 'fightable' );
            } else {
                $game->listClickable( 'buyable' );
                $game->listClickable( 'fightable' );
                return $message = "C'est la première et la dernière fois..... La prochaine fois j'appelle la crampe";
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
    public function attack($assailantIndex, $targetIndex  = null ) {//Numéro de carte choisie par le heros
        if( ( $assailantCard = $this->getHerosActif()->isCardInZone( $assailantIndex, 'Combat' ) )  !== false ) {
            if( $targetIndex == null ) {
                $game->listClickable( 'targetable' );
            } else {
                if( ( $shieldIndexList = $this->getHerosInactif()->isThereShield() ) !== false ) {
                    if( !is_in_array( $targetIndex, $shieldIndexList )) {
                        $message = "C'est la première et la dernière fois..... La prochaine fois je sors le gant en latex";
                        return $message;
                    }
                }
                if( is_int( $targetIndex ) ) {
                    if( ( $targetCard = $this->getHerosActif()->isCardInZone( $targetIndex, 'Combat' ) )  !== false ) {
                        $assailantCard->hit( $targetCard );
                    } else {
                        return $message = "C'est la première et la dernière fois..... La prochaine fois je sors le gant en latex";
                    }
                } elseif( is_string( $targetIndex ) ) {
                    $assailantCard->hit( $this->getHerosInactif() );
                }
                $this->getHerosActif()->moveCard( $assailantCard, 'Attente' );
                $game->listClickable( 'buyable' );
                $game->listClickable( 'fightable' );
            }
        }
    }

    /**
     * pass - pass round action
     * 
    **/
    public function pass() {
        $this->setCpt( $this->getCpt() + 1 );
        $this->getHerosActif()->endRound();
        $this->switchHeros();
        $this->getHerosActif()->beginRound();
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
     * update - update (in the database) the elements listed in $this->toUpdateList
     * 
    **/
    public function update() {
        foreach( $this->updateList() as $key => $object ) {
            $class = get_class( $object );
            if( $class == 'Creature' || $class == 'Sort' ) {
                $cardGameModel->update( $object );
            }
            if( $class == 'Heros' ) {
                $herosGameModel->update( $object );
            }
            if( $class == 'Partie' ) {
                $GameModel->update( $object );
            }
        }
    }


    /**
     * addToUpdateList - ajoute l'objet à updateList
    **/
    public function addToUpdateList() {
        
    }
    
    

    /**
     * listerCliquable - list the clickable elements for the next view
     * 
     * @param string $mode - define which elements have to be listed
     * 
    **/
    public function listerCliquable( string $mode ) {
        
        $this->cliquableListe =
    }

    
    

    public function finDePartie()
    {
        if (($heros1['pv'] = 0) || $heros2['pv'] = 0  )
        {
            header('Location: index.php');
        }elseif ($heros1['cimetiere']=20 || $heros2['cimetiere']=20) 
        {
            header('Location: index.php');
        }
    }

    public function abandon( $heros )
    {
        if(isset($_POST['abandon']))
        {
           $this->heros['pv'] = 0;
           header ('Location: index.php'); // CREER CONSTANTE PAGE FIN DE PARTIE // 
        }
    }

    public function compteurTour()
    {
        $compteurTour ++;
        if( $compteurTour <= 20) {
            $joueurActif['caracteristiques']['cagnotte'] = number_format($compteurTour / 2);
        } else {
            $joueurActif['caracteristiques']['cagnotte'] = 10;
        }
    
    }

    
    public function premierJoueur()
    {
        if (rand(1,2)==1) 
        {
            $heros1['caracteristiques']['statut']='actif';
            $heros2['caracteristiques']['statut']='inactif';
            $joueurActif = $heros1;
            $joueurInactif = $heros2;
        } 
        else 
        { 
            $heros1['caracteristiques']['statut']='inactif';
            $heros2['caracteristiques']['statut']='actif';
            $joueurActif = $heros2;
            $joueurInactif = $heros1;
        }

        piocher($joueurActif, 3);
        piocher($joueurInactif,3);

        $compteurTour = 0;
    }

    
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
    if( is_int( $id ) && $id >= 0 ) 
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
     if( checkdate($month , $day , $year) !=false)
     {
        $this->date = $dateDebutPartie;
     }
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
 public function setCpt($cpt)
 {
    if( is_int( $id ) && $id >= 0 ) 
    {
        $this->id = $id;
    }
  return $this;
 }

 /****************************
  * GET THE VALUE OF dateFinPartie
  *****************************/ 
 public function getDateFinPartie()
 {
  return $this->dateFinPartie;
 }

 /**************************
  * SET THE VALUE OF dateFinPartie
  *
  * @return  self
  ************************/ 
 public function setDateFinPartie($dateFinPartie)
 {
    if( checkdate($month , $day , $year) !=false)
    {
       $this->dateFinPartiefin = $dateFinPartie;
    }
  return $this;
 }

 /****************************
  * GET THE VALUE OF heros1
  ****************************/ 
 public function getHeros1()
 {
  return $this->heros1;
 }

 /*****************************
  * SET THE VALUE OF heros1
  *
  * @return  self
  ****************************/ 
 public function setHeros1($heros1)
 {
     if (is_string($heros1)) {
        $this->heros1 = $heros1;
     }
    return $this;
 }

 /*****************************
  * GET THE VALUE OF heros2
  ****************************/ 
 public function getHeros2()
 {
  return $this->heros2;
 }

 /********************************
  * SET THE VALUE OF heros2
  *
  * @return  self
  *******************************/ 
 public function setHeros2($heros2)
 {
  if (is_string($heros2)) {
        $this->heros2 = $heros2;
     }
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
     if(is_array($plateau)){
        $this->plateau = $plateau;
     }
  return $this;
 }

 /************************************** 
 *PUBLIC FUNCTION
 ***************************************/

    private function hydrate( array $data ) 
    {
        foreach( $data as $key => $value ) 
        {
            $methode = 'set' . ucfirst( $key );

            if( method_exists( $this, $methode )) 
            {
                $this->$methode($value);
            }
        }
    }

}
