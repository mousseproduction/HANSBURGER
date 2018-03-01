<?php
class CardCollectionModel extends KernelModel {
    
    public function insert( Carte $carte ) {
        $carteDatas = $carte->getAttributeTable( ['nom', 'pv', 'degat', 'prix', 'herosId', 'typeId', 'illustrationId', 'description'  ]);
        $query =    "INSERT INTO `carte_collection` (`id`, `nom`, `pv`, `degat`, `prix`, `heros_collection_id`, `type_id`, `illustration_id`, `description` ) 
                    VALUES (NULL, :nom, :pv, :degat, :prix, :herosId, :typeId, :illustrationId, :description );";
        return $this->executeQuery( $query, $carteDatas );
    }
    
    public function update( Carte $carte ) {
        $carteDatas = $carte->getAttributeTable( ['nom', 'pv', 'degat', 'prix', 'herosId', 'typeId', 'illustrationId', 'id', 'description' ] );
        $query =    "UPDATE `carte_collection`".
            "SET `nom` = :nom,
            `pv` = :pv,
            `degat` = :degat,
            `prix` = :prix,
            `heros_collection_id` = :herosId,
            `type_id` = :typeId,
            `illustration_id` = :illustrationId, 
            `description` = :description
            WHERE `carte_collection`.`id` = :id;";  
        return $this->executeQuery( $query, $carteDatas );
    }
    
    public function selectWhere( string $condition = '') {
        $query =    'SELECT  `carte_collection`.`id` AS id,
                    `carte_collection`.`nom` AS nom,
                    `carte_collection`.`pv` AS pv,
                    `carte_collection`.`degat` AS degat,
                    `carte_collection`.`prix` AS prix,
                    `carte_collection`.`type_id` AS typeId,
                    `carte_collection`.`description` AS description,
                    `type`.`libelle` AS typeNom,
                    `illustration`.`id` AS illustrationId,
                    `illustration`.`path` AS illustrationPath,
                    `heros_collection`.`id` AS herosId,
                    `heros_collection`.`nom` AS herosNom
                    FROM `carte_collection`
                    INNER JOIN `illustration` ON `illustration`.`id` = `carte_collection`.`illustration_id`
                    INNER JOIN `heros_collection` ON `carte_collection`.`heros_collection_id` = `heros_collection`.`id`
                    INNER JOIN `type` ON `carte_collection`.`type_id` = `type`.`id`
                    ' . $condition . ';';

        $datas = $this->executeQuery( $query );
        $objects = [];
        foreach( $datas as $key => $data ) {
            $objects[ $data['id'] ] = new Card( $data );
        }
        return $objects;
    }
    
    public function delete( string $condition ) {
       $query = 'DELETE FROM `carte_collection` ' . $condition; 
       return $this->executeQuery( $query );
    }


    //TODO : add a class for listing methodes

    public function getHerosCollectionList( ) {
       $query = 'SELECT `id` AS id, `nom` AS nom FROM `heros_collection`;'; 
       return $this->executeQuery( $query );
    }

    public function getTypeList( ) {
       $query = 'SELECT `id` AS id, `libelle` AS libelle FROM `type`;'; 
       return $this->executeQuery( $query );
    }
}
 

