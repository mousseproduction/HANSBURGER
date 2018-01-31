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
        //Récuperation infos cartes:
            SELECT  `carte_partie`.`id` AS id,
                    `carte_modele`.`nom` AS nom,
                    `carte_partie`.`pv`AS pv,
                    `carte_partie`.`degat`AS degat,
                    `carte_partie`.`prix`AS prix,
                    `type`.`libelle`AS type,
                    `statut`.`libelle`AS statut,
                    `illustration`.`path`AS illustration,
                    `hero_partie`.`id`AS heros,
                    `carte_partie`.`prix`AS pv,
            INNER JOIN `statut` ON `carte_partie`.`id_statut` = `statut`.`id_statut`
            INNER JOIN `type` ON `type`.`id_type` = `carte_partie`.`id_type`
            INNER JOIN `carte_modele` ON `carte_partie`.`id_carte_modele` = `carte_modele`.`id_carte_modele`
            INNER JOIN `illustration` ON `illustration`.`id_illustration` = `carte_modele`.`id_illustration`
            INNER JOIN `heros_partie` ON `carte_partie`.`id_heros_partie` = `heros_partie`.`id_heros_partie`
            WHERE `carte_partie`.`id_carte_partie` = :id ;

    //INITIALISATION PARTIE
    //----------------------------------------------------------
        //Initialisation héros partie
            INSERT INTO `heros_partie` (`id`, `statut`, `pv`, `cagnotte`, `joueur_id`, `heros_modele_id`) 
            VALUES (NULL, ':statut', '20', '0', ':joueur_id', ':heros_modele_id'

        //Initialisation partie
            INSERT INTO `partie` (`id`, `date_debut`, `cpt_tour`, `partie_terminee`, `heros1_partie_id`, `hero2_partie_id`, `plateau_id`) 
            VALUES (NULL, ':date', '0', '0', ':heros_1' ':heros_2', ':plateau'


        //Initialisation carte partie
            INSERT INTO `carte_partie` (`id`, `pv`, `degat`, `prix`, `carte_modele_id`, `heros_partie_id`, `statut_id`, `type_id`) VALUES (NULL, '1', '2', '3', '5', '1', '1', '1'); INSERT INTO `carte_partie` (`id`, `pv`, `degat`, `prix`, `carte_modele_id`, `hero_partie_id`, `statut_id`, `type_id`) VALUES (NULL, '1', '2', '3', '5', '1', '1', '1'); INSERT INTO `carte_partie` (`id`, `pv`, `degat`, `prix`, `carte_modele_id`, `hero_partie_id`, `statut_id`, `type_id`) VALUES (NULL, '1', '2', '3', '5', '1', '1', '1'); INSERT INTO `carte_partie` (`id`, `pv`, `degat`, `prix`, `carte_modele_id`, `hero_partie_id`, `statut_id`, `type_id`)
            VALUES (NULL, ':pv', ':degat', ':prix', ':carte_modele_id', ':heros_partie_id', 'statut_id', 'type_id'); 

    //GESTION HISTORIQUE
    //----------------------------------------------------------
        //Ajout d'évenements

