<?php
//FUNCTION JEU__________________________________________________________________________________________________________________________________________________



function piocher (&$joueur, $nbpioche=1){//Nombre de carte à piocher ( 1 par défault)
    $selection=array_rand($joueur['deck'],$nbpioche);//Choisis au hasard une ou plusieurs cartes dans le deck identifiée avec leur index
    if( is_array( $selection ) ) {
        foreach ($selection as $value) {//Pour chaque carte selectionnée (index)
            $joueur['deck'][$value]['statut']='main';//on modifie le statut de la carte (de deck => main)
            $joueur['main'][]=$joueur['deck'][$value];//On ajoute la carte dans la main
            unset($joueur['deck'][$value]);//On supprime la carte du deck
            }
    } else {
            $joueur['deck'][$selection]['statut']='main';//on modifie le statut de la carte (de deck => main)
            $joueur['main'][]=$joueur['deck'][$selection];//On ajoute la carte dans la main
            unset($joueur['deck'][$selection]);//On supprime la carte du deck
    }
}

function invoquer( $indexCarte ) {//Numéro de carte choisie par le joeur actif
    global $joueurActif;
    if ( $joueurActif['main'][$indexCarte]['prix'] <= $joueurActif['caracteristiques']['cagnotte']) {//Si le prix de la carte choisie est inférieur ou égal à la cagnotte
        $joueurActif['caracteristiques']['cagnotte'] -= $joueurActif['main'][$indexCarte]['prix'];//Alors on soustrait le prix de la carte du montant de la cagnotte
        $joueurActif['main'][$indexCarte]['statut']='attente';//Alors on passe la carte en statut "attente"
        $joueurActif['attente'][]=$joueurActif['main'][$indexCarte];//On la stocke dans la zone "attente" du joueur actif
        unset($joueurActif['main'][$indexCarte]);// On la supprime de la main du joeur actif
    } else {
        echo "Vous n'avez pas assez de monnaie pour acheter cette créature";// Sinon message erreur
    }
}

// DEFINIT LA CARTE ATTAQUANTE ET RETOURNE SON INDEX
function choisirAttaquant(&$joueurActif) {
    $indexAttaquant = readline('Avec quelle carte souhaitez-vous attaquer?');
    return $indexAttaquant;
}

//FONCTION SORT
function jouerSort ($indexCarte){
   global $joueurActif;
   global $joueurInactif;
    if ( $joueurActif['main'][$indexCarte]['prix'] <= $joueurActif['caracteristiques']['cagnotte']) {//Si le prix de la carte choisie est inférieur ou égal à la cagnotte
        $joueurActif['caracteristiques']['cagnotte'] -= $joueurActif['main'][$indexCarte]['prix'];//Alors on soustrait le prix de la carte du montant de la cagnotte
        $joueurActif['main'][$indexCarte]['statut']='combat';//Alors on passe la carte sort en statut "combat"
        $joueurActif['combat'][]=$joueurActif['main'][$indexCarte];//On la stocke dans la zone "combat" du joueur actif
        unset($joueurActif['main'][$indexCarte]);// On la supprime de la main du joeur actif
        $choix = readline('Pour attaquer le joueur, faite le 1. Pour attaquer une de ses créatures, faites le 2. Sinon taper la reponse D(imaginer une voix sensuelle)');
        switch ($choix) {
            case 1 : $indexCible = 'joueur';
                break;
            case 2 :
                $indexCible = readline('Quelle carte souhaitez-vous attaquer?');
        }
        $indexCombat = (count($joueurActif['combat']))-1;
        if ($indexCible == 'joueur'){
                $joueurInactif['caracteristiques']['pv'] -= $joueurActif['combat'][$indexCombat]['degats'];
        } else {
                $joueurInactif['combat'][$indexCible]['pv'] -= $joueurActif['combat'][$indexCombat]['degats'];

                testDeLaMortCarte( $joueurInactif, $indexCible);
        }
        $joueur['combat'][$indexCombat]['statut'] = 'cimetiere';
        $joueur['cimetiere'][] = $joueur['combat'][$indexCombat];
        echo 'Dans ta gueule la boule de feu brrrra';
        unset($joueur['combat'][$indexCombat]);
    } else {
            echo "Vous n'avez pas assez de monnaie pour acheter cette créature";// Sinon message erreur
    }
}


//DEFINIT LA CARTE CIBLEE ET RETOURNE SON INDEX
        function cibler (&$joueurInactif) {
            //Affichage du plateau du joueur adverse

            //Scan à la recherche de boucliers
            $listeBouclier = [];
            foreach($joueurInactif['combat'] as $key => $carte) {
                if($carte['type'] == 'bouclier') {
                    $listeBouclier[]= $key;
                }
            }

            //Si pas de bouclier, choix entre attaquer joueur ou créature adverse
            if($listeBouclier === []) {
                $choix = readline('Pour attaquer le joueur, faite le 1. Pour attaquer une de ses créatures, faites le 2. Sinon taper la reponse D(imaginer une voix sensuelle)');
                switch ($choix) {
                    case 1 : $indexCible = 'joueur';
                        break;
                    case 2 :
                        $indexCible = readline('Quelle carte souhaitez-vous attaquer?');
                }

            //Si présence de bouclier, propose d'attaquer le(s) bouclier(s)
            } else {
                $indexCible = readline('Saisissez le bouclier que vous souhaitez attaquer');
            }
            return $indexCible;
        }

// CALCULE LES DEGATS
function subir($indexCible, $indexAttaquant) {
    global $joueurActif;
    global $joueurInactif;

    if ($indexCible == 'joueur'){
        $joueurInactif['caracteristiques']['pv'] -= $joueurActif['combat'][$indexAttaquant]['degats'];
        $joueurActif['attente'][] = $joueurActif['combat'][$indexAttaquant];
        unset($joueurActif['combat'][$indexAttaquant]);
        // if ($joueurInactif['caracteristiques']['pv'] < 0 ) {
        //         //FIN DE PARTIE
        //         echo "Peuchère t'as perdu cong";
        //}
    } else {
        $joueurInactif['combat'][$indexCible]['pv'] -= $joueurActif['combat'][$indexAttaquant]['degats'];
        $joueurActif['combat'][$indexAttaquant]['pv'] -= $joueurInactif['combat'][$indexCible]['degats'];
        testDeLaMortCarte($joueurInactif, $indexCible);
        testDeLaMortCarte($joueurActif, $indexAttaquant);
        if( isset($joueurActif['combat'][$indexAttaquant])) {
            $joueurActif['attente'][] = $joueurActif['combat'][$indexAttaquant];
            unset($joueurActif['combat'][$indexAttaquant]);
        }

        }
    }

function testDeLaMortCarte (&$joueur , $index) {
    if ($joueur['combat'][$index]['pv'] <= 0 ) {
        $joueur['combat'][$index]['statut'] = 'cimetiere';
        $joueur['cimetiere'][] = $joueur['combat'][$index];
        echo 'La carte ' . $joueur['combat'][$index]['nom'] . " est morte \n";
        unset($joueur['combat'][$index]);
    }

}

function attenteToCombat(&$joueur) {
    foreach($joueur['attente'] as $key => $carte) {
        $carte['statut'] = 'combat';
        $joueur['combat'][] = $carte;
        unset( $joueur['attente'][$key] );
    }
}

//FUNCTION AFFICHAGE_________________________________________________________________________________________________________________________________________
function afficherCarte($carte) {
    if($carte['type'] == 'sort') {
        $affichage = "*********************************************************************************************\n".
                     "|".str_pad( strtoupper($carte['nom']), 23, " ", STR_PAD_BOTH )."||".
                     "|type : ".$carte['type']."            ||".
                     "| prix : ".$carte['prix']."       ||".
                     "| degats : ".$carte['degats']."       ||\n".
                     "*********************************************************************************************\n";
    } else {
        $affichage = "------------------------------------------------------------------------------------------------------\n".
                     "|".str_pad( strtoupper($carte['nom']), 23, " ", STR_PAD_BOTH )."||".
                     "| type : ".$carte['type']."       ||".
                     "| prix : ".$carte['prix']."       ||".
                     "| pv : ".$carte['pv']."        ||".
                     "| degats : ".$carte['degats']."|\n".
                     "------------------------------------------------------------------------------------------------------\n";
    }
    echo $affichage;
}

function afficherTableau($element){
        foreach ($element as $key => $value) {
            echo $key;
            afficherCarte ($value);
        }
}
