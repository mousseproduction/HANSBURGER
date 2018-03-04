<?php
/**
 * ------------------------------------------------------------
 * SINGLETON PDO
 * ------------------------------------------------------------
**/
class SPDO {
    /**
     * --------------------------------------------------
     * STATICS
     * --------------------------------------------------
    **/
    private static $_instance;
    /**
     * --------------------------------------------------
     * PROPERTIES
     * --------------------------------------------------
    **/
    private $_db;



    /**
     * --------------------------------------------------
     * MAGIC METHODS
     * --------------------------------------------------
    **/

    /**
     * __construct - Class constructor
     * @return  
    **/
    private function __construct() {
        try {
            $this->_db = new PDO( 'mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=' . DBCHARSET, DBUSER, DBPWD );
        } catch( PDOException $e ) {
            throw $e;
        }
    }



    /**
     * --------------------------------------------------
     * STATIC METHODS
     * --------------------------------------------------
    **/
    /**
     * getInstance - 
     * @param   [string     $host]
     *          [string     $dbname]
     *          [string     $login]
     *          [string     $pass]
     *          [string     $charset]
     *          [string     $collate]
     * @return  
    **/
    public static function getInstance() {
        try {
            if( !isset( self::$_instance ) )
                self::$_instance = new SPDO();

            return self::$_instance;
        } catch( Exception $e ) {
            throw $e;
        }
    }



    /**
     * --------------------------------------------------
     * GETTERS
     * --------------------------------------------------
    **/
    /**
     * getPDO - 
     * @param   
     * @return  
    **/
    public function getPDO() {
        return $this->_db;
    }
}
