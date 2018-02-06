<?php

abstract class Manager {
    
    //-----------------------------------------------------
    //	ATTRIBUTES
    //-----------------------------------------------------

    //TODO : Ajouter le SPDO
    private static $db = NULL;
   
   //-----------------------------------------------------
   //	METHODES
   //-----------------------------------------------------
   public function __construct() {
       if( self::$db === NULL ) {
           $this->setDb();
       } 
   }

    //TODO : Ajouter gestion d'erreurs
   public function executeQuery( string $requete, array $userInput = [] ) {
        if( ( $ressource = self::getDb() ) !== false ) {
            if( ( $reponse = $ressource->prepare( $requete ) ) !== false ) {
                if( ( $reponse->execute( $userInput ) ) !== false ) {
                    if( strtolower( substr( $requete, 0, 6) ) == 'select' ){
                            $data = $reponse->fetchAll( PDO::FETCH_ASSOC );
                            $reponse->closeCursor(); 
                            return $data;
                        }
                    $resultat = $reponse->rowCount();
                    $reponse->closeCursor(); 
                    return $resultat;    
                }
            }
        }
    }

    //-----------------------------------------------------
    //	GUETTERS AND SETTERS
    //-----------------------------------------------------

    /**
     * Get db.
     *
     * @return db.
     */
    public function getDb() { return self::$db; }
    
    /**
     * Set db.
     *
     * @param db the value to set.
     */
    //TODO : Ajouter constantes de DB
    public function setDb() {
           try { 
                $_str_host = 'localhost';
                $_str_dbname = 'hansburger';
                $_str_login = 'root';
                $_str_pwd = '';
                self::$db =  new PDO(   'mysql:host=' . $_str_host . 
                                        ';dbname=' . $_str_dbname . 
                                        ';charset=utf8', 
                                        $_str_login, $_str_pwd, array( PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION ) ); 
            } catch( PDOException $e ) { 
                die( $e->getMessage() );
            }
    }
}


