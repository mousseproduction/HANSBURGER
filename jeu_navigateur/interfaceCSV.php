<?php 
require_once( 'classes/Manager.php' );
require_once( 'classes/Carte.php' );
require_once( 'classes/CarteModeleManager.php' );

$carteManager = new CarteModeleManager;
$cards = $carteManager->selectWhere();

require_once( 'view/interfaceCSVView.php' );

