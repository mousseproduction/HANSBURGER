<?php
error_reporting( E_ALL & ~E_NOTICE ); // Sets which PHP errors are reported (http://php.net/manual/fr/function.error-reporting.php)

/**
 * --------------------------------------------------
 * CORE PREDEFINED CONSTANTS
 * http://php.net/manual/fr/reserved.constants.php
 * --------------------------------------------------
 */
if( strtoupper( substr( PHP_OS, 0, 3 ) )=='WIN' ) : // If the version of the operating system (provided by the pre-defined constants PHP_OS) corresponds to a Windows kernel,
    if( !defined( 'PHP_EOL') ) :
        define( 'PHP_EOL', "\r\n" );
    endif;

    if( !defined( 'DIRECTORY_SEPARATOR') ) :
        define( 'DIRECTORY_SEPARATOR', "\\" );
    endif;
else :
    if( !defined( 'PHP_EOL') ) :
        define( 'PHP_EOL', "\n" );
    endif;

    if( !defined( 'DIRECTORY_SEPARATOR') ) :
        define( 'DIRECTORY_SEPARATOR', "/" );
    endif;
endif;

if( !defined( 'DS' ) )
    define( 'DS', DIRECTORY_SEPARATOR ); // Defines the folder separator connected to the system
/** **/



if( !defined( 'ABSPATH' ) )
    define( 'ABSPATH', __DIR__ . DS ); // Defines the root folder

if( !defined( 'CONFIGPATH' ) )
    define( 'CONFIGPATH', ABSPATH . 'app' . DS . 'config' . DS ); // Defines the config folder

if( !defined( 'VENDORPATH' ) )
    define( 'VENDORPATH', ABSPATH . 'vendor' . DS ); // Defines the path to the folder containing third-party dependencies


//require_once( CONFIGPATH . 'framewind.conf' );
//require_once( CONFIGPATH . 'app.conf' );
//
//require_once( VENDORPATH . 'common.php' );

/**
*----------------------------------------------------
* CARDS STATUS CONSTANT
*----------------------------------------------------
*/
define("DECK","1");
define("MAIN","2");
define("ATTENTE","3");
define("COMBAT","4");
define("CIMETIERE","5");

/**
*----------------------------------------------------
* SESSION START
*----------------------------------------------------
*/
session_start();

/**
*----------------------------------------------------
* DATABASE CONFIG
*----------------------------------------------------
*/
if( !defined( 'DBHOST' ) )
    define( 'DBHOST', 'localhost' ); 

if( !defined( 'DBNAME' ) )
    define( 'DBNAME', 'hansburger' ); 

if( !defined( 'DBCHARSET' ) )
    define( 'DBCHARSET', 'UTF8' ); 

if( !defined( 'DBUSER' ) )
    define( 'DBUSER', 'root' ); 

if( !defined( 'DBPWD' ) )
    define( 'DBPWD', '' ); 

/**
*----------------------------------------------------
* AUTOLOADER
*----------------------------------------------------
*/
/**
 * loadClasses - Vérifie si un fichier existe et l'inclut
 * @param   string  $className
 * @return
**/
function loadClasses( $className ) {
    $find = false;
    $_file_ = 'include/' . $className . '.php';
    if( file_exists( $_file_ ) && $find === false) {
        require_once( $_file_ );
        $find = true;
    }

    $_file_ = 'modules/classes/' . $className . '.php';
    if( file_exists( $_file_ ) && $find === false) {
        require_once( $_file_ );
        $find = true;
    }

    $_file_ = 'modules/admin/' . $className . '.php';
    if( file_exists( $_file_ ) && $find === false) {
        require_once( $_file_ );
        $find = true;
    }

    $_file_ = 'modules/game/' . $className . '.php';
    if( file_exists( $_file_ ) && $find === false) {
        require_once( $_file_ );
        $find = true;
    }
}
spl_autoload_register( 'loadClasses' ); // On enregistre la fonction "loadClasses" en tant qu'implémentation de __autoload()
