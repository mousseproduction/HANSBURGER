<?php
// include_once('fonctions.php');

//DECLARATION DES JOUEURS

$zimmer =
[
          //DECLARATION DES CARACTERISTIQUES-------------------------------
    'caracteristiques' =>
    [
            'nom' => "hans",
            'statut' => "inactif" ,
            'pv' => 20,
            'cagnotte' => 0,
    ],
    //DECLARATION DU DECK-------------------------------
    'deck' =>
    [
          //SPECIALE-------------------------------
        [
        'nom' => 'Batman',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'9',
        'pv'=>'9',
        'degats'=>'9',
        ],
        //SORTS-------------------------------
        [
        'nom' => 'Sort1',
        'type' => 'sort',
        'statut' => 'deck',
        'prix' => '1',
        'degats'=>'1',
        ],
        [
        'nom' => 'Sort2',
        'type' => 'sort',
        'statut' => 'deck',
        'prix' => '3',
        'degats'=>'4',
        ],
        [
        'nom' => 'Sort3',
        'type' => 'sort',
        'statut' => 'deck',
        'prix' => '5',
        'degats'=>'6',
        ],
        //BOUCLIERS-------------------------
        [
        'nom' => 'Bouclier1',
        'type' => 'bouclier',
        'statut' => 'deck',
        'prix'=>'1',
        'pv'=>'3',
        'degats'=>'1',
        ],
        [
        'nom' => 'Bouclier1',
        'type' => 'bouclier',
        'statut' => 'deck',
        'prix'=>'1',
        'pv'=>'3',
        'degats'=>'1',
        ],
        [
        'nom' => 'Bouclier2',
        'type' => 'bouclier',
        'statut' => 'deck',
        'prix'=>'3',
        'pv'=>'6',
        'degats'=>'3',
        ],
        [
        'nom' => 'Bouclier2',
        'type' => 'bouclier',
        'statut' => 'deck',
        'prix'=>'3',
        'pv'=>'6',
        'degats'=>'3',
        ],
        //CREATURES----------------------------
        [
        'nom' => 'Zazou',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'1',
        'pv'=>'1',
        'degats'=>'2',
        ],
        [
        'nom' => 'Zazou',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'1',
        'pv'=>'1',
        'degats'=>'2',
        ],
        [
        'nom' => 'Hannibal',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'2',
        'pv'=>'3',
        'degats'=>'2',
        ],
        [
        'nom' => 'Hannibal',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'2',
        'pv'=>'3',
        'degats'=>'2',
        ],
        [
        'nom' => 'Pingouins',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'3',
        'pv'=>'3',
        'degats'=>'5',
        ],
        [
        'nom' => 'Pingouins',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'3',
        'pv'=>'3',
        'degats'=>'5',
        ],
        [
        'nom' => 'kungfuPanda',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'4',
        'pv'=>'4',
        'degats'=>'2',
        ],
        [
        'nom' => 'kungfuPanda',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'4',
        'pv'=>'4',
        'degats'=>'2',
        ],
        [
        'nom' => 'Jack Sparrow',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'5',
        'pv'=>'5',
        'degats'=>'7',
        ],
        [
        'nom' => 'Jack Sparrow',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'5',
        'pv'=>'5',
        'degats'=>'7',
        ],
        [
        'nom' => 'Maximus,',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'7',
        'pv'=>'6',
        'degats'=>'8',
        ],
        [
        'nom' => 'Maximus',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'7',
        'pv'=>'6',
        'degats'=>'8',
        ],
    ],
    //DECLARATION DE LA MAIN
    'main'=>[],
    //DECLARATION DE LA ZONE D'ATTENTE
    'attente'=>[],
    //DECLARATION DE LA ZONE DE COMBAT
    'combat'=>[],
    //DECLARATION DE LA ZONE DE CIMETIERE
    'cimetiere'=>[],
];

$burger =
[
    //DECLARATION DES CARACTERISTIQUES-------------------------------
    'caracteristiques' =>
        [
        'nom' => "burger",
        'statut' => "inactif" ,
        'pv' => 20,
        'cagnotte' => 0,
        ],
    //DECLARATION DU DECK-------------------------------
    'deck' => [
          //SPECIALE-------------------------------
        [
        'nom' => 'Ronald McDonald',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'9',
        'pv'=>'9',
        'degats'=>'9',
        ],
        //SORTS-------------------------------
        [
        'nom' => 'Sort1',
        'type' => 'sort',
        'statut' => 'deck',
        'prix' => '1',
        'degats'=>'2',
        ],
        [
        'nom' => 'Sort2',
        'type' => 'sort',
        'statut' => 'deck',
        'prix' => '3',
        'degats'=>'5',
        ],
        [
        'nom' => 'Sort3',
        'type' => 'sort',
        'statut' => 'deck',
        'prix' => '5',
        'degats'=>'7',
        ],
        //BOUCLIERS-------------------------
        [
        'nom' => 'Bouclier1',
        'type' => 'bouclier',
        'statut' => 'deck',
        'prix'=>'1',
        'pv'=>'3',
        'degats'=>'1',
        ],
        [
        'nom' => 'Bouclier1',
        'type' => 'bouclier',
        'statut' => 'deck',
        'prix'=>'1',
        'pv'=>'3',
        'degats'=>'1',
        ],
        [
        'nom' => 'Bouclier',
        'type' => 'bouclier',
        'statut' => 'deck',
        'prix'=>'3',
        'pv'=>'6',
        'degats'=>'3',
        ],
        [
        'nom' => 'Bouclier',
        'type' => 'bouclier',
        'statut' => 'deck',
        'prix'=>'3',
        'pv'=>'6',
        'degats'=>'3',
        ],
        //CREATURES----------------------------
        [
        'nom' => 'Hot Dog',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'1',
        'pv'=>'1',
        'degats'=>'2',
        ],
        [
        'nom' => 'Hot Dog',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'1',
        'pv'=>'1',
        'degats'=>'2',
        ],
        [
        'nom' => 'Pizza',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'2',
        'pv'=>'3',
        'degats'=>'2',
        ],
        [
        'nom' => 'Pizza',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'2',
        'pv'=>'3',
        'degats'=>'2',
        ],
        [
        'nom' => 'Sushis Ninja',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'3',
        'pv'=>'3',
        'degats'=>'4',
        ],
        [
        'nom' => 'Sushis Ninja',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'3',
        'pv'=>'3',
        'degats'=>'4',
        ],
        [
        'nom' => 'Muffins',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'4',
        'pv'=>'4',
        'degats'=>'2',
        ],
        [
        'nom' => 'Muffins',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'4',
        'pv'=>'4',
        'degats'=>'2',
        ],
        [
        'nom' => 'Kebab',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'5',
        'pv'=>'5',
        'degats'=>'6',
        ],
        [
        'nom' => 'Kebab',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'5',
        'pv'=>'5',
        'degats'=>'6',
        ],
        [
        'nom' => 'Hamburger',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'7',
        'pv'=>'6',
        'degats'=>'8',
        ],
        [
        'nom' => 'Hamburger',
        'type' => 'creature',
        'statut' => 'deck',
        'prix'=>'7',
        'pv'=>'6',
        'degats'=>'8',
        ],
    ],
    //DECLARATION DE LA MAIN
    'main'=>[],
    //DECLARATION DE LA ZONE D'ATTENTE
    'attente'=>[],
    //DECLARATION DE LA ZONE DE COMBAT
    'combat'=>[],
    //DECLARATION DE LA ZONE DE CIMETIERE
    'cimetiere'=>[],
];

/*  SELECTION DU PREMIER JOUEUR */
    if (rand(1,2)==1) {
        $zimmer['caracteristiques']['statut']='actif';
        $burger['caracteristiques']['statut']='inactif';
        $joueurActif = $zimmer;
        $joueurInactif = $burger;
    } else { $zimmer ['statut']='inactif';
        $burger['caracteristiques']['statut']='actif';
        $joueurActif = $burger;
        $joueurInactif = $zimmer;
    }

    piocher($joueurActif, 3);
    piocher($joueurInactif,3);

    $compteurTour = 0;