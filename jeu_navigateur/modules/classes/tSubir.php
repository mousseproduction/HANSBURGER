<?php
trait tSubir
{
/** A MODIFIER
     *Le héros/la carte attaqué(e) encaisse les dégats !
     *
     * @param [objet] $carteattaquante
     * @return void
     */
    public function subir($carteattaquante) {// héros ou Numéro de carte choisie par le heros attaquant

            $this->setPv( $this->getPv() - $carteattaquante->getDegat());//on met à jour les points de vie du heros/carte ciblé(e) en enlevant les degats de la carte attaquante
    }
}