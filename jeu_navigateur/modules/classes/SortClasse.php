<?php 
class Sort extends Carte {

    /**
     * frapper - hit the target and is hit back
     *
     * @param $cible
    **/
    private function frapper( $cible ) {
        $cible->subir( $this->getDegat() );
        $partie->addToUpdate( $cible );
        if( is_a( $cible, 'Creature' ) ) {
            $this->subir( $target->getDegat() );
            $partie->addToUpdate( $this );
        }
    }

    /**
     * onInvoc - is executed on invo
     * 
    **/
    public function onInvocation() {
        
    }
    
}
