<?php
require_once( 'common/ini.php' );
/**
 *-----------------------------------------------------
 *  ROUTING FUNCTION
 *-----------------------------------------------------
**/
if( isset( $_GET['m'] ) ) {
    if( isset( $_GET['c'] ) ) {
        $controllerName = ucfirst( $_GET['c'] ) . 'Controller';
        if( file_exists( 'modules/' . $_GET[ 'm' ] . '/' . $controllerName . '.php' ) ) {
            require_once( 'modules/' . $_GET[ 'm' ] . '/' . $controllerName . '.php' );
            if( class_exists( $controllerName ) ) {
                $controller = new $controllerName;
                if( isset( $_GET['a'] ) ) {
                    $methodName = strtolower( $_GET['a'] ) . 'Action';
                    if( method_exists( $controller, $methodName ) ) {
                        $controller->$methodName();
                    } else {
                        header( 'Location: 404' );
                    }
                } else {
                    $controller->showAction();
                }
            } else {
                header( 'Location: 404' );
            }
        } else {
            header( 'Location: 404' );
        }
    }
} else {
    require_once( 'modules/admin/CarteController.php' );
    $controller = new CarteController;
    $controller->showAction();
}


