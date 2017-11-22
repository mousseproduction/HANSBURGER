<?php
include_once('fonctions.php');
include_once('initialisation.php');

    while ( ($joueurActif['caracteristiques']['pv'] >= 0) || (count($joueurActif['cimetiere'])) !=20 ) {

        // gestion du mana
        $compteurTour ++;
        if( $compteurTour <= 10) {
            $joueurActif['caracteristiques']['cagnotte'] = $compteurTour;
        } else {
            $joueurActif['caracteristiques']['cagnotte'] = 10;
        }

        piocher( $joueurActif );
        echo "C'est le tour de" $joueurActif['caracteristiques']['nom'] . "qui a" . $joueurActif['caracteristiques']['pv'] . "pv\n";

        $passeTonTour = false;
        while( $passeTonTour === false) {
            echo  'tu as ' . $joueurActif['caracteristiques']['pv']"\n";
            echo  $joueurInactif['caracteristiques']['nom'] . 'a ' . $joueurInactif['caracteristiques']['pv']"\n";

            echo "TU AS DANS TA MAIN LES CARTES SUIVANTES----------------------------------------------------\n";
            afficherTableau( $joueurActif['main']);

            echo "TU AS DANS TA ZONE DE COMBAT LES CARTES SUIVANTES----------------------------------------------------\n";
            afficherTableau( $joueurActif['combat']);

            echo "L'ADVERSAIRE A LES CARTES SUIVANTES----------------------------------------------------\n";
            afficherTableau( $joueurInactif['combat']);

            $choixAction = readline("Pour invoquer, saisir 1\nPour attaquer, saisir 2\nPour passer ton tour, saisir 3");

            switch ( $choixAction ) {
                case '1':
                        $index = readline('Quelle carte souhaites-tu invoquer?');
                        invoquer($index);
                    break;
                case '2':
                    $indexAttaquant = choisirAttaquant($joueurActif);
                    $indexCible = cibler($joueurInactif);
                    subir($indexCible, $indexAttaquant);
                    break;
                case '3':
                    $passeTonTour = true;
                break;
            }
        }
        attenteToCombat($joueurActif);
        $tmp = $joueurActif;
        $joueurActif = $joueurInactif;
        $joueurInactif = $tmp;
    }
    echo $joueurInactif['caracteristiques']['nom'] . 'a gagné!!!!!!!!';

?>