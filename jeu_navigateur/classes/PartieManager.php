<?php

class PartieManager extends Manager
{
    public function add( Partie $partie ) {
        $partieDatas = $partie->haveAttributeTable();
        $query =    "INSERT INTO `partie` (`id`, `date`, `cpt_tour`, `id_heros_partie`, `id_heros_partie_1`, `id_plateau`)". 
                    "VALUES (NULL, ':date', ':cpt', ':heros1', ':heros2', ':plateau');";
        return $this->executeQuery( $query, $partieDatas );
    }
    
    public function update( Partie $partie ) {
        $partieDatas = $partie->haveAttributeTable();
        $query =    "UPDATE `partie`".
                    "SET `id` = ':id', `date` = ':date', `cpt_tour` = ':cpt', `id_heros_partie` = ':heros1', `id_heros_partie_1` = ':heros2' `id_plateau` = ':plateau'";  
        return $this->executeQuery( $query, $partieDatas );
    }
    
    public function selectWhere( string $condition ) {
        $query =    'SELECT  `partie`.`id_partie` AS id,
                    `partie`.`date` AS date,
                    `partie`.`cpt_tour`AS cpt,
                    `partie`.`id_heros_partie`AS heros1,
                    `partie`.`id_heros_partie_1`AS heros2,
                    `partie`.`id_plateau`AS plateau,
                    INNER JOIN `heros_partie` ON `partie`.`id_heros_partie` = `heros_partie`.`id_heros_partie`
                    INNER JOIN `heros_partie` ON `partie`.`id_heros_partie_1` = `heros_partie`.`id_heros_partie`
                    INNER JOIN `plateau` ON `partie`.`id_plateau` = `plateau`.`id_plateau`
                    ' . $condition . ';';

        $partieDatas = $this->executeQuery( $query );
        foreach( $partieDatas as $key => $partieDatas ) {
            $partie[ $partieDatas['id'] ] = new Partie( $partieDatas );
        }

        return $partie;
    }
    
    public function delete( string $condition ) {
       $query = 'DELETE FROM `partie` WHERE' . $condition; 
       return $this->executeQuery( $query );
    }
}
