<?php

trait tHydrate 
{
     public function hydrate( array $data ) {
        foreach( $data as $key => $value ) {
            $methode = 'set' . ucfirst( $key );
            if( method_exists( $this, $methode ) ) {
                $this->$methode( $value );
            }
        }
    }
}