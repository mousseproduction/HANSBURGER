<?php

class CarteModeleManager extends Manager {
    
    public function add( Carte $carte ) {
        $carteDatas = $carte->haveAttributeTable();
        $query =    "INSERT INTO `carte_modele` (`id`, `nom`, `pv`, `degat`, `prix`, `heros_modele_id`, `type_id`, `illustration_id`)". 
                    "VALUES (NULL, ':nom', ':pv', ':degat', ':prix', ':herosModeleId', ':type', ':illustrationId');";
        return $this->executeQuery( $query, $carteDatas );
    }
    
    public function update( Carte $carte ) {
        $carteDatas = $carte->haveAttributeTable();
        $query =    "UPDATE `carte_modele`".
                    "SET `nom` = ':nom', `pv` = ':pv', `degat` = ':degat', `prix` = ':prix', `id_heros_modele` = ':herosModeleId' `id_type` = ':type' WHERE `carte_modele`.`id_carte_modele` = :id;";  
        return $this->executeQuery( $query, $carteDatas );
    }
    
    public function selectWhere( string $condition = '') {
        $query =    'SELECT  `carte_modele`.`id` AS id,
                    `carte_modele`.`nom` AS nom,
                    `carte_modele`.`pv`AS pv,
                    `carte_modele`.`degat`AS degat,
                    `carte_modele`.`prix`AS prix,
                    `carte_modele`.`type_id`AS type,
                    `illustration`.`id` AS illustrationId,
                    `illustration`.`path` AS illustrationPath,
                    `heros_modele`.`id` AS herosId,
                    `heros_modele`.`nom` AS herosNom
                    FROM `carte_modele`
                    INNER JOIN `illustration` ON `illustration`.`id` = `carte_modele`.`illustration_id`
                    INNER JOIN `heros_modele` ON `carte_modele`.`heros_modele_id` = `heros_modele`.`id`
                    ' . $condition . ';';

        $Datas = $this->executeQuery( $query );
        $objects = [];
        foreach( $Datas as $key => $Data ) {
            $objects[ $Data['id'] ] = new Carte( $Data );
        }

        return $objects;
    }
    
    public function delete( string $condition ) {
       $query = 'DELETE FROM `carte_modele` WHERE' . $condition; 
       return $this->executeQuery( $query );
    }
    
}
 

