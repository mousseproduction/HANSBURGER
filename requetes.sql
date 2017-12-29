//--------------------------------------------------------
//LISTE DES REQUETES SQL À INTÉGRER AUX FONCTIONS DU JEUX
//--------------------------------------------------------

    //ACTIONS DES JOUEURS
    //---------------------------------------------------------
        //Piocher
            UPDATE `carte_partie`
            SET `id_statut` = '2'
            WHERE `carte_partie`.`id_carte_partie` = :idCartePiochee; 

        //Invoquer
            SELECT `carte_partie`.. `carte_partie`
            INNER JOIN `statut` ON `carte_partie`.`id_statut` = `statut`.`id_statut`
            INNER JOIN `type` ON `type`.`id_type` = `carte_partie`.`id_type`
            INNER JOIN `carte_modele` ON `carte_partie`.`id_carte_modele` = `carte_modele`.`id_carte_modele`
            INNER JOIN `illustration` ON `illustration`.`id_illustration` = `carte_modele`.`id_illustration`
            INNER JOIN `heros_partie` ON `carte_partie`.`id_heros_partie` = `heros_partie`.`id_heros_partie`
            WHERE `carte_partie`.`id_carte_partie` = :id ;

            
            
            UPDATE `carte_partie`
            SET `id_statut` = '3'
            WHERE `carte_partie`.`id_carte_partie` = :idCarteInvoquee; 

        //Réveiller
            UPDATE `carte_partie`
            SET `id_statut` = '4'
            WHERE `carte_partie`.`id_carte_partie` = :idCarteReveillee; 

        //Attaquer
            SELECT 
        //Passer tour

    //AFFICHAGE
    //---------------------------------------------------------
        //Récuperation de toutes les cartes avec: joueur, statut, type,

    //INITIALISATION PARTIE
    //----------------------------------------------------------
        //Initialisation partie
        //Initialisation joueur
        //Initialisation / selection cartes

    //GESTION HISTORIQUE
    //----------------------------------------------------------
        //Ajout d'évenements

