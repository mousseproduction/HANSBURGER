<?php
require_once( 'include/headerView.php');

if( isset( $message) ) {
    echo '<div class="message">' . $message . '</div>';
}
?>
<h2>Exporter en CSV</h2>
<div class="creer ligne">
    <form action=".?m=admin&c=csv&a=export" method="post">
        <label> Nom du fichier de bordure
                <input type="text" name="bordure" value="" >
        </label>
        <label> Nom du fichier de picto vie
                <input type="text" name="pictovie" value="" >
        </label>
        <label> Nom du fichier de picto prix
                <input type="text" name="pictoprix" value="" >
        </label>
        <label> Nom du fichier de picto degat
                <input type="text" name="pictodegat" value="" >
        </label>
            <br>
        <label> Chemin d'accès jusqu'au dossier ou qu'ils sont stockés tout tes pitits fichiers
                <input type="text" name="path" value="" >
        </label>
        <button type="submit">Télécharger le CSV</button>
    </form>
</div>
<div class="warning">ATTENTION: le nom de tes fichiers d'illustration doit être le nom de la carte en minuscule. Les espaces doivent être remplacés par des '_'</div>
<?php
require_once( 'include/footerView.php');
?>

