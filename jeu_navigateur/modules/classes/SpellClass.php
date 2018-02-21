<?php 
class Spell extends Card {

    /**
     * onInvocation - is executed on invo
     * 
    **/
    public function onInvocation() {
        $game->attack( $this );
    }
    
}
