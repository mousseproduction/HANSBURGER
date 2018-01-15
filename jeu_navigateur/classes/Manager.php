<?php

abstract class Manager {
    
   private $db;
   
    //TODO ajouter un moyen de centraliser la connection à la BDD pour tous les 
    // managers
   //private function setDb(){} 

    protected function executeQuery( $requete, $fetchMode, array $userInput ) {
        $ressource = self::db;
        $reponse = $ressource->prepare( $requete );
        $reponse->execute( $userInput );
        
        if( strtolower( substr( $requete, 0, 6) ) == 'select' ){
            if( $fetchMode == 'ASSOC') {
                $data = $reponse->fetchAll( PDO::FETCH_ASSOC );
            }
            if( $fetchMode == 'NUM') {
                $data = $reponse->fetchAll( PDO::FETCH_NUM );
            }
            $reponse->closeCursor(); // Termine le traitement de la requête
            return $data;
        }
        $resultat = $reponse->rowCount();
        $reponse->closeCursor(); // Termine le traitement de la requête
        return $resultat;    
    }
}
