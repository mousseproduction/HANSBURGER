<?php
trait tSuffer
{
    /** 
     *Le héros/la carte attaqué(e) encaisse les dégats !
     *
     * @param int $degat
     * @return void
     */
    public function suffer($degat) {// héros ou Numéro de carte choisie par le heros attaquant
            $this->setPv( $this->getPv() - $degat() );//on met à jour les points de vie du heros/carte ciblé(e) en enlevant les degats de la carte attaquante
            $partie->addToUpdateList( $this );
    }
}
