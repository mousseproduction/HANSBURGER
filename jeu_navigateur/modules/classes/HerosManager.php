<?php

class HerosManager extends Manager {
    
    public function add( Heros $heros ) {
        $herosDatas = $heros->haveAttributeTable();
        $query =    "INSERT INTO `heros_collection` (`id`, `nom`, `statut`, `pv`, `cagnotte`, `illustration_id`)". 
                    "VALUES (NULL, ':nom', ':statut', '20', '0',':illustrationId');";
        return $this->executeQuery( $query, $herosDatas );
    }
    
    public function update( Heros $heros ) {
        $herosDatas = $heros->haveAttributeTable();
        $query =    "UPDATE `heros_collection`".
                    "SET `nom` = ':nom', `statut` = ':statut', `pv` = ':pv', `cagnotte` = ':cagnotte', `id_heros_collection` = ':herosId' `id_type` = ':type' WHERE `carte_collection`.`id_carte_collection` = :id;";  
        return $this->executeQuery( $query, $carteDatas );
    }
    
    public function selectWhere( string $condition = '') {
        $query =    'SELECT  `carte_collection`.`id` AS id,
                    `carte_collection`.`nom` AS nom,
                    `carte_collection`.`pv`AS pv,
                    `carte_collection`.`degat`AS degat,
                    `carte_collection`.`prix`AS prix,
                    `carte_collection`.`type_id`AS type,
                    `illustration`.`id` AS illustrationId,
                    `illustration`.`path` AS illustrationPath,
                    `heros_collection`.`id` AS herosId,
                    `heros_collection`.`nom` AS herosNom
                    FROM `carte_collection`
                    INNER JOIN `illustration` ON `illustration`.`id` = `carte_collection`.`illustration_id`
                    INNER JOIN `heros_collection` ON `carte_collection`.`heros_collection` = `heros_collection`.`id`
                    ' . $condition . ';';

        $Datas = $this->executeQuery( $query );
        $objects = [];
        foreach( $Datas as $key => $Data ) {
            $objects[ $Data['id'] ] = new Carte( $Data );
        }

        return $objects;
    }
    
    public function delete( string $condition ) {
       $query = 'DELETE FROM `carte_collection` WHERE' . $condition; 
       return $this->executeQuery( $query );
    }
    
}
 

