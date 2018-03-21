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
                    SET `statut` = :statut, `pv` = :pv, `cagnotte` = :cagnotte, `joueur_id` = :joueur,  `heros_modele_id` = :heros_collection 
                    WHERE `heros_partie`.`id` = :id;";
        return $this->executeQuery( $query, $herosDatas );
    }

    public function selectWhere( string $condition = '') {
        $query =    'SELECT  `heros_partie`.`id` AS id,
                    `heros_collection`.`nom` AS nom,
                    `heros_partie`.`statut` AS statut,
                    `heros_partie`.`pv`AS pv,
                    `heros_partie`.`cagnotte` AS cagnotte,
                    `heros_partie`.`joueur_id` AS joueur,
                    `heros_partie`.`heros_modele_id` AS heros_collection,
                    `illustration`.`id` AS illustrationId,
                    `illustration`.`path` AS illustrationPath
                    FROM `heros_partie`
                    INNER JOIN `heros_collection` ON `heros_collection`.`id` = `heros_partie`.`heros_modele_id`
                    INNER JOIN `illustration` ON `illustration`.`id` = `heros_collection`.`illustration_id`
                    '. $condition . ';';

        $datas = $this->executeQuery( $query );
        $objects = [];
        foreach( $datas as $key => $data ) {
            $objects[] = new Heros( $data );
        }
        return $objects[0];
    }

    public function delete( string $condition ) {
       $query = 'DELETE FROM `heros_partie` WHERE' . $condition;
       return $this->executeQuery( $query );
    }

}


