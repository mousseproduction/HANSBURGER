<?php

class CartesManager extends Manager {
    
    public function add( Carte $carte ) {
        $query =    'INSERT INTO `carte_modele` (`id`, `nom`, `pv`, `degat`, `prix`, `heros_modele_id`, `type_id`, `illustration_id`)'. 
                    'VALUES (NULL, '.$carte->getNom().', '.
                                     $carte->getPv().', '.
                                     $carte->getDegat().', '.
                                     $carte->getPrix().', '.
                                     $carte->getHeros()['id'].', '.
                                     $carte->getType()['id'].', '.
                                     $carte->getIllustration()['id'].');';
        $this->executeQuery( $query );
    }
    
    public function update( Carte $carte ) {
        $query =    'UPDATE `carte_modele`'.
                    'SET `nom` = '. $carte->getNom() .', '.
                    '`pv` = '. $carte->getPv() .', '.
                    '`degat` = '. $carte->getDegat() .', '.
                    '`prix` = '. $carte->getPrix() .', '.
                    '`heros_modele_id` = '. $carte->getHeros()['id'] .', '.
                    '`type_id` = '. $carte->getType()['id'] .', '.
                    '`illustration_id` = '. $carte->getIllustration()['id'] .', '.
                    'WHERE `carte_modele`.`id` = '. $carte->getId(); 
        $this->executeQuery( $query );
    }
    
    public function select() {
    
    }
    
    public function selectAll() {
    
    }
    
    public function delete() {
    
    }
    
}
 

