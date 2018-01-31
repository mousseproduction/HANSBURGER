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
require( 'gestionBdd' . ucfirst( $_SESSION[ 'type' ] ) . 'Formulaire.php' );
?>
    </body>
</html>
