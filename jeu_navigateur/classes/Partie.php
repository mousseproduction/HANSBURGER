<?php

class Partie 
{
 private $id;
 private $dateDebutPartie;
 private $cpt;
 private $dateFinPartie;
 private $heros1;
 private $heros2;
 private $plateau;

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

            if( method_exists( $this, $methode ) 
            {
                $this->$methode($value)
            }
        }
    }

    function __construct()
    {
        $this->hydrate( $data );

    } 

    public function display()
    {

    }

    public function finDePartie()
    {

    }

    public function abandon()
    {

    }

    public function compteurTour()
    {

    }

    public function attenteToCombat()  // Deplace la carte de la zone d'attente à la zone de combat
    {
        foreach($joueur['attente'] as $key => $carte) 
        {
            $carte['statut'] = 'combat';
            $joueur['combat'][] = $carte;
            unset( $joueur['attente'][$key] );
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

    public function switchHerosActif()
    {
        if(($heros1['caracteristiques']['statut'])='actif') || $heros2['caracteristiques']['statut'])='actif' )
        {
            
        }
        
    }
}
