<?php
include_once('fonctions.php');
include_once('initialisation.php');

    while ( ($joueurActif['caracteristiques']['pv'] >= 0) || (count($joueurActif['cimetiere'])) !=20 ) {

        // gestion du mana
        $compteurTour ++;
        if( $compteurTour <= 20) {
            $joueurActif['caracteristiques']['cagnotte'] = number_format($compteurTour / 2);
        } else {
            $joueurActif['caracteristiques']['cagnotte'] = 10;
        }

        piocher( $joueurActif );
        echo    "{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}}\n" . 
                str_pad("C'EST LE TOUR DE " . strtoupper($joueurActif['caracteristiques']['nom']), 60, " ", STR_PAD_BOTH) .
                "\n{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}}\n\n";
    
        $passeTonTour = false;
        while( $passeTonTour === false) {
            echo  'tu as ' . $joueurActif['caracteristiques']['pv'] . " pv et " . $joueurActif['caracteristiques']['cagnotte'] . " mana\n";
            echo  strtoupper($joueurInactif['caracteristiques']['nom']) . ' a ' . $joueurInactif['caracteristiques']['pv'] . "pv\n";

            echo "\n\nTU AS DANS TA MAIN LES CARTES SUIVANTES\n----------------------------------------------------------------------------------------\n\n";
            afficherTableau( $joueurActif['main']);

            echo "\n\nTA ZONE DE COMBAT\n----------------------------------------------------------------------------------------\n\n";
            afficherTableau( $joueurActif['combat']);

            echo "\n\nZONE DE COMBAT DE L'ADVERSAIRE\n--------------------------------------------------------------------------------------\n\n";
            afficherTableau( $joueurInactif['combat']);

            echo "Que souhaites tu faire?\n";
            $choixAction = readline("Pour invoquer, saisir 1   ||  Pour attaquer, saisir 2   ||    Pour passer ton tour, saisir 3     ");

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
