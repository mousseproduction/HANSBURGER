<?php
include( 'include/ini.php' );
$gameController = new GameController;
$gameController->initAction( 1, 2 );
var_dump( $gameController );
