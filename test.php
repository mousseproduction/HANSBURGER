<?php

include_once('fonctions.php');
include_once('initialisation.php');








// echo 'AFFICHAGE DECK_____________________________________________________________';

// afficherTableau($zimmer['deck']);
// echo 'AFFICHAGE MAIN_____________________________________________________________';
// afficherTableau($zimmer['main']);
// echo 'AFFICHAGE DECK_____________________________________________________________';

// afficherTableau($burger['deck']);
// echo 'AFFICHAGE MAIN_____________________________________________________________';
// afficherTableau($burger['main']);
//
$joueurActif['caracteristiques']['cagnotte'] = 20;
afficherTableau($joueurActif['main']);
$saisie = readline('choisir la carte a invoquer');
if ( ($saisie >= 0) && ($saisie <= count($joueurActif['main']))) {
    invoquer($saisie);
    afficherTableau($joueurActif['attente']);
} else {
    echo 'Saisie incorrecte';
}
echo $joueurActif['caracteristiques']['cagnotte'];
var_dump($joueurActif['main']);