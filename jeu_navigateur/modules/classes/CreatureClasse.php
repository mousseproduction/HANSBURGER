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
        $this->subir( $target->getDegat() );
    }
    
}
