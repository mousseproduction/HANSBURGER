<?php
include( 'include/ini.php' );
$gameController = new GameController;
$gameController->loadGame( 4 );
include( 'web/board.php');

