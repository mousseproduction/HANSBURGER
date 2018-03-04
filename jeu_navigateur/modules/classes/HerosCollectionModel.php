<?php

class HerosCollectionModel extends KernelModel {

    public function add( Heros $heros ) {
        $herosDatas = $heros->haveAttributeTable( [ 'nom', 'statut', 'pv', 'cagnotte', 'illustrationId' ] );
        $query =    "INSERT INTO `heros_collection` (`id`,`nom`, `statut`,  `pv`, `cagnotte`, `illustration_id`)
        VALUES (NULL, :nom, :statut, '20', '0', :illustrationId);";
        return $this->executeQuery( $query, $herosDatas );
    }

    public function update( Heros $heros ) {
        $herosDatas = $heros->haveAttributeTable( [ 'id', 'nom', 'statut', 'pv', 'cagnotte', 'illustrationId' ] );
        $query =    "UPDATE `heros_collection`
                    SET `nom` = :nom, `statut` = :statut, `pv` = :pv, `cagnotte` = :cagnotte, `illustration_id` = :illustration_id 
                    WHERE `heros_collection_id` = :id;";
        return $this->executeQuery( $query, $herosDatas );
    }

    public function selectWhere( string $condition = '') {
        $query =    'SELECT  `heros_collection`.`id` AS id,
                    `heros_collection`.`nom` AS nom,
                    `heros_collection`.`statut` AS statut,
                    `heros_collection`.`pv`AS pv,
                    `heros_collection`.`cagnotte` AS cagnotte,
                    `illustration`.`id` AS illustrationId,
                    `illustration`.`path` AS illustrationPath
                    FROM `heros_collection`
                    INNER JOIN `illustration` ON `illustration`.`id` = `heros_collection`.`illustration_id`
                    '. $condition . ';';

        $datas = $this->executeQuery( $query );
        $objects = [];
        foreach( $datas as $key => $data ) {
            $objects[] = new Heros( $data );
        }
        return $objects;
    }

    public function delete( string $condition ) {
       $query = 'DELETE FROM `heros_collection` WHERE' . $condition;
       return $this->executeQuery( $query );
    }

}


