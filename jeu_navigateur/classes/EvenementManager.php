<?php

class EvenementManager extends Manager
{
    public function add( Evenement $evenement ) {
        $evenementDatas = $evenement->haveAttributeTable();
        $query =    "INSERT INTO `evenement` (`id_evenement`, `id_partie`, `id_action`, `id_carte_partie`, `id_heros_partie`, `id_heros_partie_1`)". 
                    "VALUES (NULL, ':action', ':carte_partie', ':heros1', ':heros2');";
        return $this->executeQuery( $query, $evenementDatas );
    }
    
    public function update( Evenement $evenement ) {
        $evenementDatas = $evenement->haveAttributeTable();
        $query =    "UPDATE `evenement`".
                    "SET `id_evenement` = ':id', `id_partie` = ':partie', `id_action` = ':action', `id_carte_partie` = ':carte_partie', `id_heros_partie` = ':heros1' `id_heros_partie` = ':heros2'";  
        return $this->executeQuery( $query, $evenementDatas );
    }
    
    public function selectWhere( string $condition ) {
        $query =    'SELECT  `evenement`.`id_evenement` AS id,
                    `evenement`.`id_partie` AS date,
                    `evenement`.`id_action`AS action,
                    `evenement`.`id_carte_partie`AS carte_partie,
                    `evenement`.`id_heros_partie_1`AS heros2,
                    `partie`.`id_plateau`AS plateau,
                    INNER JOIN `heros_partie` ON `partie`.`id_heros_partie` = `heros_partie`.`id_heros_partie`
                    INNER JOIN `heros_partie` ON `partie`.`id_heros_partie_1` = `heros_partie`.`id_heros_partie`
                    INNER JOIN `plateau` ON `partie`.`id_plateau` = `plateau`.`id_plateau`
                    ' . $condition . ';';

        $evenementDatas = $this->executeQuery( $query );
        foreach( $evenementDatas as $key => $evenementDatas ) {
            $evenement[ $evenementDatas['id'] ] = new Evenement( $evenementDatas );
        }
        return $evenement;
    }
    
    public function delete( string $condition ) {
       $query = 'DELETE FROM `partie` WHERE' . $condition; 
       return $this->executeQuery( $query );
    }

}
