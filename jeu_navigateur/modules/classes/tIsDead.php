<?php
trait tIsDead {

    /**
     * isDead - return true if the object have less then 1 pv
     * 
     * @return bool
    **/
    public function isDead() {
        if( $this->getPv() < 1 ) {
            return true;
        } 
        return false;
    }
    
}
