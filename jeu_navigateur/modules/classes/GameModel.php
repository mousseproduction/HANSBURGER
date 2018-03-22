<?php

class GameModel extends KernelModel
{
    public function add( Game $partie ) {
        $partieDatas = $partie->getAttributeTable( [  'dateDebutPartie', 'cpt', 'partie_terminee', 'heros1Id', 'heros2Id', 'plateau' ] );
        
        $query =    "INSERT INTO `partie` (`id`, `date_debut`, `cpt_tour`, `partie_terminee`,`heros1_partie_id`, `heros2_partie_id`, `plateau_id`)". 
                    "VALUES (NULL, :dateDebutPartie, :cpt, :partie_terminee, :heros1Id, :heros2Id, :plateau);";
        return $this->executeQuery( $query, $partieDatas );
    }
    
    public function update( Game $partie ) {
        $partieDatas = $partie->getAttributeTable( [ 'id', 'dateDebutPartie', 'cpt', 'partie_terminee', 'heros1Id', 'heros2Id', 'plateau' ] );
        $query =    "UPDATE `partie`
                    SET  `date_debut` = :dateDebutPartie, `cpt_tour` = :cpt, `partie_terminee` = :partie_terminee, `heros1_partie_id` = :heros1Id, `heros2_partie_id` = :heros2Id, `plateau_id` = :plateau   
                    WHERE `partie`.`id` = :id;";
        return $this->executeQuery( $query, $partieDatas );
    }
    
    public function selectWhere( string $condition ) {
        $query =    'SELECT `partie`.`id` AS id,
                            `partie`.`date_debut` AS dateDebutPartie,
                            `partie`.`cpt_tour`AS cpt,
                            `partie`.`partie_terminee`AS partie_terminee,
                            `partie`.`heros1_partie_id`AS heros1Id,
                            `partie`.`heros2_partie_id`AS heros2Id,
                            `partie`.`plateau_id`AS plateau
                     FROM `partie`
                    ' . $condition . ';';

        $datas = $this->executeQuery( $query );
        foreach( $datas as $key => $data ) {
            $parties[] = new Game( $data );
        }
        return $parties[0];
    }
    
    public function delete( string $condition ) {
       $query = 'DELETE FROM `partie` WHERE' . $condition; 
       return $this->executeQuery( $query );
    }
}
