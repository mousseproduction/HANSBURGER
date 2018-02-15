<?php
class CartePartieManager extends Manager {
    
    public function insert( Carte $carte ) {
        $carteDatas = $carte->getAttributeTable( [ 'pv', 'degat', 'prix', 'carteCollectionId', 'herosId', 'typeId', 'statutId'  ]);
        $query =    "INSERT INTO `carte_collection` (`id`, `pv`, `degat`, `prix`, `carte_collection_id`, `heros_partie_id`, `type_id`, `statut_id`  ) 
                    VALUES (NULL, :nom, :pv, :degat, :prix, :carteCollectionId, :herosId, :typeId, :statutId );";
        return $this->executeQuery( $query, $carteDatas );
    }
    
    public function update( Carte $carte ) {
        $carteDatas = $carte->getAttributeTable( [ 'pv', 'degat', 'prix', 'carteCollectionId', 'herosId', 'typeId', 'statutId' ] );
        $query =    "UPDATE `carte_collection`".
            "SET `pv` = :pv,
            `degat` = :degat,
            `prix` = :prix,
            `carte_collection_id` = :carteCollectionId,
            `heros_partie_id` = :herosId,
            `type_id` = :typeId,
            `statut_id` = :statutId
            WHERE `carte_partie`.`id` = :id;";  
        return $this->executeQuery( $query, $carteDatas );
    }
    
    public function selectWhere( string $condition = '') {
        $query =    'SELECT  `carte_partie`.`id` AS id,
                    `carte_collection`.`nom` AS nom,
                    `carte_partie`.`pv` AS pv,
                    `carte_partie`.`degat` AS degat,
                    `carte_partie`.`prix` AS prix,
                    `heros_partie`.`id` AS herosId,
                    `heros_partie`.`nom` AS herosNom,
                    `statut`.`ìd` AS statutId,
                    `statut`.`libelle` AS statutNom,
                    `type`.`id` AS typeId,
                    `type`.`libelle` AS typeNom,
                    `carte_collection`.`id` AS carteCollectionId,
                    `illustration`.`id` AS illustrationId,
                    `illustration`.`path` AS illustrationPath,
                    `carte_collection`.`description` AS description,
                    FROM `carte_partie`
                    INNER JOIN `carte_collection` ON `carte_collection`.`id` = `carte_partie`.`carte_collectio_id`
                    INNER JOIN `heros_partie` ON `carte_partie`.`heros_partie_id` = `heros_partie`.`id`
                    INNER JOIN `illustration` ON `illustration`.`id` = `carte_collection`.`illustration_id`
                    INNER JOIN `statut` ON `carte_partie`.`statut_id` = `statut`.`id`
                    INNER JOIN `type` ON `carte_partie`.`type_id` = `type`.`id`
                    ' . $condition . ';';

        $datas = $this->executeQuery( $query );
        $objects = [];
        foreach( $datas as $key => $data ) {
            $objects[ $data['id'] ] = new Carte( $data );
        }
        return $objects;
    }
    
    public function delete( string $condition ) {
       $query = 'DELETE FROM `carte_partie` ' . $condition; 
       return $this->executeQuery( $query );
    }
}
 

