<?php

class CarteManager extends Manager {
    
    public function add( Carte $carte ) {
        $carteDatas = $carte->haveAttributeTable();
        $query =    "INSERT INTO `carte_modele` (`id`, `nom`, `pv`, `degat`, `prix`, `heros_modele_id`, `type_id`, `illustration_id`)". 
                    "VALUES (NULL, ':nom', ':pv', ':degat', ':prix', ':modele', ':type', ':illustration');";
        return $this->executeQuery( $query, $carteDatas );
    }
    
    public function update( Carte $carte ) {
        $carteDatas = $carte->haveAttributeTable();
        $query =    "UPDATE `carte_modele`".
                    "SET `nom` = ':nom', `pv` = ':pv', `degat` = ':degat', `prix` = ':prix', `id_heros_modele` = ':modele' `id_type` = ':type' WHERE `carte_modele`.`id_carte_modele` = :id;";  
        return $this->executeQuery( $query, $carteDatas );
    }
    
    public function selectWhere( string $condition ) {
        $query =    'SELECT  `carte_partie`.`id` AS id,
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
                    ' . $condition . ';';

        $cartesDatas = $this->executeQuery( $query );
        foreach( $cartesDatas as $key => $carteDatas ) {
            $cartes[ $carteDatas['id'] ] = new Carte( $carteDatas );
        }

        return $cartes;
    }
    
    public function delete( string $condition ) {
       $query = 'DELETE FROM `carte_modele` WHERE' . $condition; 
       return $this->executeQuery( $query );
    }
    
}
 

