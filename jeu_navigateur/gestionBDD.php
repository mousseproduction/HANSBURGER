<?php 
require_once( 'classes/Manager.php' );
require_once( 'classes/Carte.php' );
require_once( 'classes/CarteModeleManager.php' );

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

if( $_SESSION[ 'type' ] == 'carte' ) {
    $carteManager = new CarteModeleManager;
    $objects = $carteManager->selectWhere();

    if( isset( $_POST[ 'action' ]) && $_POST[ 'action' ] === 'insert' ) {
        unset( $_POST[ 'action' ]);
        $carte = new Carte( $_POST[] );
        $carteManager->add( $carte );
    }
    if( isset( $_POST[ 'action' ]) && $_POST[ 'action' ] === 'update' ) {
        unset( $_POST[ 'action' ]);
        $carte = new Carte( $_POST[] );
        $carteManager->update( $carte );
    }
    if( isset( $_POST[ 'action' ]) && $_POST[ 'action' ] === 'delete' ) {
        unset( $_POST[ 'action' ]);
        $carteManager->delete( $carte );
    }

}



require_once( 'view/interfaceCSVView.php' );
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="assets/stylesheet.css">
    </head>
    <body>
        <h1>Interface de gestion de la base de données</h1>
        <h2>Wé wé wé que souhaites tu faire ma caille?</h2>
        <div>
            <form action="" method="get">
                <button type="submit" name="type" value="0">Gérer les cartes</button>
            </form>
            <form action="" method="get">
                <button type="submit" name="type" value="1">Gérer les illustrations</button>
            </form>
            <form action="" method="get">
                <button type="submit" name="type" value="2">Generer un CSV</button>
            </form>
        </div>
        <?php
            require( 'view/'. $_SESSION[ 'type' ] .'FormView.php')
        ?>
    </body>
</html>

