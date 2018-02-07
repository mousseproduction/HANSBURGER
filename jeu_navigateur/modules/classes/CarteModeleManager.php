<?php
class CarteModeleManager extends Manager {
    
    public function insert( Carte $carte ) {
        $carteDatas = $carte->getAttributeTable( ['nom', 'pv', 'degat', 'prix', 'herosModeleId', 'typeId', 'illustrationId', 'description'  ]);
        $query =    "INSERT INTO `carte_modele` (`id`, `nom`, `pv`, `degat`, `prix`, `heros_modele_id`, `type_id`, `illustration_id`, `description` ) 
                    VALUES (NULL, :nom, :pv, :degat, :prix, :herosModeleId, :typeId, :illustrationId, :description );";
        return $this->executeQuery( $query, $carteDatas );
    }
    
    public function update( Carte $carte ) {
        $carteDatas = $carte->getAttributeTable( ['nom', 'pv', 'degat', 'prix', 'herosModeleId', 'typeId', 'illustrationId', 'id', 'description' ] );
        $query =    "UPDATE `carte_modele`".
            "SET `nom` = :nom,
            `pv` = :pv,
            `degat` = :degat,
            `prix` = :prix,
            `heros_modele_id` = :herosModeleId,
            `type_id` = :typeId,
            `illustration_id` = :illustrationId, 
            `description` = :description
            WHERE `carte_modele`.`id` = :id;";  
        return $this->executeQuery( $query, $carteDatas );
    }
    
    public function selectWhere( string $condition = '') {
        $query =    'SELECT  `carte_modele`.`id` AS id,
                    `carte_modele`.`nom` AS nom,
                    `carte_modele`.`pv` AS pv,
                    `carte_modele`.`degat` AS degat,
                    `carte_modele`.`prix` AS prix,
                    `carte_modele`.`type_id` AS typeId,
                    `carte_modele`.`description` AS description,
                    `type`.`libelle` AS typeNom,
                    `illustration`.`id` AS illustrationId,
                    `illustration`.`path` AS illustrationPath,
                    `heros_modele`.`id` AS herosModeleId,
                    `heros_modele`.`nom` AS herosModeleNom
                    FROM `carte_modele`
                    INNER JOIN `illustration` ON `illustration`.`id` = `carte_modele`.`illustration_id`
                    INNER JOIN `heros_modele` ON `carte_modele`.`heros_modele_id` = `heros_modele`.`id`
                    INNER JOIN `type` ON `carte_modele`.`type_id` = `type`.`id`
                    ' . $condition . ';';

        $datas = $this->executeQuery( $query );
        $objects = [];
        foreach( $datas as $key => $data ) {
            $objects[ $data['id'] ] = new Carte( $data );
        }
        return $objects;
    }
    
    public function delete( string $condition ) {
       $query = 'DELETE FROM `carte_modele` ' . $condition; 
       return $this->executeQuery( $query );
    }

    public function getHerosModeleList( ) {
       $query = 'SELECT `id` AS id, `nom` AS nom FROM `heros_modele`;'; 
       return $this->executeQuery( $query );
    }

    public function getTypeList( ) {
       $query = 'SELECT `id` AS id, `libelle` AS libelle FROM `type`;'; 
       return $this->executeQuery( $query );
    }
}
 

