<?php
//FUNCTION JEU__________________________________________________________________________________________________________________________________________________



function piocher (&$joueur, $nbpioche=1){//Nombre de carte à piocher ( 1 par défault)
    $selection=array_rand($joueur['deck'],$nbpioche);//Choisis au hasard une ou plusieurs cartes dans le deck identifiée avec leur index
    foreach ($selection as $value) {//Pour chaque carte selectionnée (index)
        $joueur['deck'][$value]['statut']='main';//on modifie le statut de la carte (de deck => main)
        $joueur['main'][]=$joueur['deck'][$value];//On ajoute la carte dans la main
        unset($joueur['deck'][$value]);//On supprime la carte du deck
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

//A FINIR
function attaquer(&$joueurInactif, $indexcible) {
    $indexCible = readline('Quelle carte souhaitez-vous attaquer?');
}

function attenteToCombat(&$joueur) {
    foreach($joueur['attente'] as $key => $value) {
        $value['statut'] = 'combat';
        $joueur['combat'][] = $value;
        unset( $joueur['attente'][$key] );
    }
} 

//FUNCTION AFFICHAGE_________________________________________________________________________________________________________________________________________
function afficherCarte($carte) {
    if($carte['type'] == 'sort') {
        $affichage = "-------------------------\n".
                     "|".str_pad( strtoupper($carte['nom']), 23, " ", STR_PAD_BOTH )."|\n".
                     "|type : ".$carte['type']."            |\n".
                     "| prix : ".$carte['prix']."              |\n".
                     "| degats : ".$carte['degats']."            |\n".
                     "-------------------------\n";
    } else {
        $affichage = "-------------------------\n".
                     "|".str_pad( strtoupper($carte['nom']), 23, " ", STR_PAD_BOTH )."|\n".
                     "| type : ".$carte['type']."       |\n".
                     "| prix : ".$carte['prix']."              |\n".
                     "| pv : ".$carte['pv']."                |\n".
                     "| degats : ".$carte['degats']."            |\n".
                     "-------------------------\n";
    }
    echo $affichage;
}

function afficherTableau($element){
        foreach ($element as $value) {
            afficherCarte ($value);
        }
}
