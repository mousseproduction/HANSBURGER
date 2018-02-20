<?php
class Creature extends Carte {

    use tIsDead, tSubir;

    /**
     * frapper - hit the target and is hit back
     *
     * @param $cible
    **/
    public function frapper( $cible ) {
        $cible->subir( $this->getDegat() );
        $partie->addToUpdate( $cible );
        if( is_a( $cible, 'Creature' ) ) {
            $this->subir( $target->getDegat() );
            $partie->addToUpdate( $this );
        }
    }
    
}
