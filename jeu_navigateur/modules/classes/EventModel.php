<?php

class EventModel extends KernelModel
{
    public function add( Evenement $evenement ) {
        $evenementDatas = $evenement->haveAttributeTable();
        $query =    "INSERT INTO `evenement` (`id`, `partie_id`, `action_id`, `carte1_partie_id`, `carte2_partie_id`, `heros_partie_id`)". 
                    "VALUES (NULL, ':partie', ':action', ':carte1', ':carte2', ':heros');";
        return $this->executeQuery( $query, $evenementDatas );
    }
    
    public function update( Evenement $evenement ) {
        $evenementDatas = $evenement->haveAttributeTable();
        $query =    "UPDATE `evenement`".
                    "SET `id` = ':id', `partie_id` = ':partie', `action_id` = ':action', `carte1_partie_id` = ':carte1',, `carte2_partie_id` = ':carte2', `heros_partie_id` = ':heros'";  
        return $this->executeQuery( $query, $evenementDatas );
    }
    
    public function selectWhere( string $condition ) {
        $query =    'SELECT  `evenement`.`id` AS id,
                    `evenement`.`partie_id` AS date,
                    `evenement`.`action_id`AS action,
                    `evenement`.`carte1_partie_id`AS carte1,
                    `evenement`.`carte2_partie_id`AS carte2,
                    `evenement`.`heros_partie_id`AS heros,
                    INNER JOIN `heros_partie` ON `partie`.`heros1_partie_id` = `heros_partie`.`id`
                    INNER JOIN `heros_partie` ON `partie`.`heros2_partie_id` = `heros_partie`.`id`
                    INNER JOIN `plateau` ON `partie`.`plateau_id` = `plateau`.`id`
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
