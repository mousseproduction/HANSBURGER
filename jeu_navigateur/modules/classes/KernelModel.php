<?php

abstract class KernelModel {
    
    //-----------------------------------------------------
    //	ATTRIBUTES
    //-----------------------------------------------------

    private $SPDO;
   
   //-----------------------------------------------------
   //	METHODES
   //-----------------------------------------------------
   public function __construct() {
           $this->SPDO = SPDO::getInstance();
   }

    //TODO : Ajouter gestion d'erreurs
   public function executeQuery( string $requete, array $userInput = [] ) {
        if( ( $ressource = $this->SPDO->getPDO() ) !== false ) {
            if( ( $reponse = $ressource->prepare( $requete ) ) !== false ) {
                if( ( $reponse->execute( $userInput ) ) !== false ) {
                    if( strtolower( substr( $requete, 0, 6) ) == 'select' ){
                            $data = $reponse->fetchAll( PDO::FETCH_ASSOC );
                            $reponse->closeCursor(); 
                            return $data;
                    }
                    if( strtolower( substr( $requete, 0, 6) ) == 'insert' ) {
                        $resultat = $ressource->lastInsertId();
                        $reponse->closeCursor(); 
                        return $resultat;    
                    } 
                    $resultat = $reponse->rowCount();
                    $reponse->closeCursor(); 
                    return $resultat;    
                }else echo "dans ton cul";
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
    public function getSPDO() { return $this->$SPDO; }
}


