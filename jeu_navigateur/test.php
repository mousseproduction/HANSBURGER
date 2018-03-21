<?php
include( 'include/ini.php' );
$gameController = new GameController;
//$gameController->invokeAction( 4, 84); ça marche!!!!!
$gameController->passAction(4); //arranger game update

