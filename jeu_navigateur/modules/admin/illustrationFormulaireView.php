<?php
require_once( 'include/headerView.php');

if( isset( $message) ) {
    echo '<div class="message">' . $message . '</div>';
}
?>
<h2>Ajouter une illustration</h2>
<div class="creer ligne">
    <form action=".?m=admin&c=illustration&a=create" method="post">
        <input type="text" name="path" value="" placeholder="path">
        <button type="submit">Créer</button>
    </form>
</div>

<h2>Modifier ou supprimer une illustration</h2>
<div class="table"> 
    <?php foreach( $illustrations as $key => $illustration ) { ?>
    <div class="ligne">
        <form action=".?m=admin&c=illustration&a=update" method="post">
            <label>Path
                <input type="text" name="path" value="<?php echo $illustration['path'] ?>">
            </label>
            <button type="submit" name="id" value="<?php echo $illustration['id'] ?>">Modifier</button>
        </form>
        <form action=".?m=admin&c=illustration&a=delete" method="post">
            <button type="submit" name="id" value="<?php echo $illustration['id'] ?>">Supprimer</button>
        </form>
    </div>
    <?php } ?>
</div>

<?php
require_once( 'include/footerView.php');
?>

