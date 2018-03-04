<?php

trait tgetAttributeTable
{
 /**
     * getAttributeTable - return the attributes listed in the parameter array 
     *
     * @param  array $attributeList - an array with the list of the attributes you want to get back
     *
     * @return array $attributeTable
     */
    public function getAttributeTable( array $attributeList  ) {
        $attributeList = array_flip( $attributeList );
        foreach( $attributeList as $value ) {
            $value = null;
        }
        foreach( $attributeList as $attributeName => $attributeValue ) {
            $methode = 'get' . ucfirst( $attributeName );
            if( method_exists( $this, $methode ) ) {
                $attributeTable[$attributeName] = $this->$methode();
            }
        }
        return $attributeTable;
    }
    
}
