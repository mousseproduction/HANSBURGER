<?php
require_once( 'common/headerView.php');

if( isset( $message) ) {
    echo '<div class="message">' . $message . '</div>';
}
?>
<h2>Exporter en CSV</h2>
<div class="creer ligne">
    <form action=".?m=admin&c=csv&a=export" method="post">
        <label> Bordure
                <input type="text" name="bordure" value="" >
        </label>
        <label> Picto vie
                <input type="text" name="pictovie" value="" >
        </label>
        <label> Picto prix
                <input type="text" name="pictoprix" value="" >
        </label>
        <label> picto degat
                <input type="text" name="pictodegat" value="" >
        </label>
        <button type="submit">Télécharger le CSV</button>
    </form>
</div>
<?php
require_once( 'common/footerView.php');
?>

