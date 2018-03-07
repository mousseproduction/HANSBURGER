<?php

class HerosGameModel extends KernelModel {

    public function add( Heros $heros ) {
        $herosDatas = $heros->getAttributeTable( [ 'statut', 'pv', 'cagnotte', 'joueur', 'heros_collection' ] );
        $query =    "INSERT INTO `heros_partie` (`id`, `statut`,  `pv`, `cagnotte`, `joueur_id`, `heros_modele_id`)
        VALUES (NULL, :statut, :pv, :cagnotte, :joueur, :heros_collection);";
        return $this->executeQuery( $query, $herosDatas );
    }

    public function update( Heros $heros ) {
        $herosDatas = $heros->getAttributeTable( [ 'id', 'statut', 'pv', 'cagnotte', 'joueur', 'heros_collection' ] );
        $query =    "UPDATE `heros_partie`
                    SET `nom` = :nom, `statut` = :statut, `pv` = :pv, `cagnotte` = :cagnotte, `joueur_id` = :joueur, , `heros_collection_id` = :heros_collection 
                    WHERE `heros_partie_id` = :id;";
        return $this->executeQuery( $query, $herosDatas );
    }

    public function selectWhere( string $condition = '') {
        $query =    'SELECT  `heros_partie`.`id` AS id,
                    `heros_partie`.`nom` AS nom,
                    `heros_partie`.`statut` AS statut,
                    `heros_partie`.`pv`AS pv,
                    `heros_partie`.`cagnotte` AS cagnotte,
                    `illustration`.`id` AS illustrationId,
                    `illustration`.`path` AS illustrationPath,
                    FROM `heros_partie`
                    INNER JOIN `heros_model` ON `heros_model`.`id` = `heros_partie`.`heros_collection_id`
                    INNER JOIN `illustration` ON `illustration`.`id` = `heros_collection`.`illustration_id`
                    WHERE'. $condition . ';';

        $hero = $this->executeQuery( $query );

        return $hero[0];
    }

    public function delete( string $condition ) {
       $query = 'DELETE FROM `heros_partie` WHERE' . $condition;
       return $this->executeQuery( $query );
    }

}

