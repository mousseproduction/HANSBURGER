<?php

class HerosManager extends Manager {

    public function add( Heros $heros ) {
        $herosDatas = $heros->haveAttributeTable();
        $query =    "INSERT INTO `heros_modele` (`id`,`nom`, `statut`,  `pv`, `cagnotte`, `illustration_id`)
        VALUES (NULL, ':nom', ':statut', '20', '0',':illustrationId');";
        return $this->executeQuery( $query, $herosDatas );
    }

    public function update( Heros $heros ) {
        $herosDatas = $heros->haveAttributeTable();
        $query =    "UPDATE `heros_modele`
                    SET `nom` = ':nom', `statut` = ':statut', `pv` = ':pv', `cagnotte` = ':cagnotte', `illustration_id` = ':illustration_id' WHERE `heros_modele_id` = :id;";
        return $this->executeQuery( $query, $herosDatas );
    }

    public function selectWhere( string $condition = '') {
        $query =    'SELECT  `heros_modele`.`id` AS id,
                    `heros_modele`.`nom` AS nom,
                    `heros_modele`.`statut` AS statut,
                    `heros_modele`.`pv`AS pv,
                    `heros_modele`.`cagnotte` AS cagnotte,
                    `illustration`.`id` AS illustrationId,
                    `illustration`.`path` AS illustrationPath,
                    FROM `heros_modele`
                    INNER JOIN `illustration` ON `illustration`.`id` = `heros_modele`.`illustration_id`
                    WHERE'. $condition . ';';

        $hero = $this->executeQuery( $query );

        return $hero[0];
    }

    public function delete( string $condition ) {
       $query = 'DELETE FROM `heros_modele` WHERE' . $condition;
       return $this->executeQuery( $query );
    }

}


