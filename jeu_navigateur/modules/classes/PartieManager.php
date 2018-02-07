<?php

class PartieManager extends Manager
{
    public function add( Partie $partie ) {
        $partieDatas = $partie->haveAttributeTable();
        $query =    "INSERT INTO `partie` (`id`, `date_debut`, `cpt_tour`, `partie_terminee`,`heros1_partie_id`, `heros2_partie_id`, `plateau_id`)". 
                    "VALUES (NULL, ':date', ':cpt', ':finpartie', ':heros1', ':heros2', ':plateau');";
        return $this->executeQuery( $query, $partieDatas );
    }
    
    public function update( Partie $partie ) {
        $partieDatas = $partie->haveAttributeTable();
        $query =    "UPDATE `partie`".
                    "SET `id` = ':id', `date` = ':date', `cpt_tour` = ':cpt',`partie_terminee` = 'finpartie', `heros1_partie_id` = ':heros1', `heros2_partie_id` = ':heros2' `plateau_id` = ':plateau'";  
        return $this->executeQuery( $query, $partieDatas );
    }
    
    public function selectWhere( string $condition ) {
        $query =    'SELECT  `partie`.`id_partie` AS id,
                    `partie`.`date` AS date,
                    `partie`.`cpt_tour`AS cpt,
                    `partie`.`partie_terminee`AS finpartie,
                    `partie`.`heros1_partie_id`AS heros1,
                    `partie`.`heros2_partie_id`AS heros2,
                    `partie`.`plateau_id`AS plateau,
                    INNER JOIN `heros_partie` ON `partie`.`heros1_partie_id` = `heros_partie`.`id`
                    INNER JOIN `heros_partie` ON `partie`.`heros2_partie_id` = `heros_partie`.`id`
                    INNER JOIN `plateau` ON `partie`.`plateau_id` = `plateau`.`id`
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
