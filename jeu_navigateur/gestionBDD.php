<?php 
require( 'ini.php');

//SESSION INIT
if( !isset( $_SESSION[ 'type' ]) ) {
    $_SESSION[ 'type' ] = 'carte';
}
if( !isset( $_SESSION[ 'action' ]) ) {
    $_SESSION[ 'action' ] = 'insert';
}

//GET Listeners
if( isset( $_GET[ 'type' ]) ) {
    switch ( $_GET[ 'type' ] ) {
        case 0:
            $_SESSION[ 'type' ] = 'carte';    
            break;
        case 1:
            $_SESSION[ 'type' ] = 'illustration';    
            break;
        case 2:
            $_SESSION[ 'type' ] = 'csv';    
            break;
        default:
            $_SESSION[ 'type' ] = 'carte';
    }
}

//carte traitement
if( $_SESSION[ 'type' ] == 'carte' ) {
    $carteManager = new CarteModeleManager;
    $objects = $carteManager->selectWhere();

    if( isset( $_POST[ 'insert' ]) ) {
        $carte = new Carte( $_POST[] );
        $carteManager->add( $carte );
    }
    if( isset( $_POST[ 'update' ]) ) {
        $carte = new Carte( $_POST[] );
        $carteManager->update( $carte );
    }
    if( isset( $_POST[ 'delete' ]) ) {
        $carteManager->delete(  );
    }

}



require_once( 'view/gestionBdd.php')
?>

