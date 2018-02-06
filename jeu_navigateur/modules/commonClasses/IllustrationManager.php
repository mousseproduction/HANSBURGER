<?php
class IllustrationManager extends Manager {

    /**
     *-----------------------------------------------------
     *  METHODES
     *-----------------------------------------------------
    **/

    /**
     * selectWhere - return from the database, the datas of the selected illustration
     * 
     * @param     string $condition
     *
     * @return    array $datas
    **/
    public function selectWhere( string $condition = '' ) {
       $query = 'SELECT `id` AS id, `path` AS path FROM `illustration`' . $condition . ';'; 
       return $this->executeQuery( $query );
    }
 
    /**
     * insert - insert a new illustration in the database
     * 
     * @param     array $illustrationDatas
    **/
    public function insert( array $illustrationDatas ) {
       $query = 'INSERT INTO `illustration` (`id`, `path`) VALUES (NULL, :path);'; 
       return $this->executeQuery( $query, $illustrationDatas );
    }
    
    /**
     *  update - update an illustration in the database
     * 
     * @param     array $illustrationDatas
    **/
    public function update( array $illustrationDatas ) {
       $query = 'UPDATE `illustration` SET `path` = :path WHERE `illustration`.`id` = :id ;'; 
       return $this->executeQuery( $query, $illustrationDatas );
    }

    /**
     *  delete - delete an illustration in the database
     * 
     * @param     $id
    **/
    public function delete( $id ) {
       $query = 'DELETE FROM `illustration` WHERE `illustration`.`id` = :id ;'; 
       return $this->executeQuery( $query, $id );
    }
}
