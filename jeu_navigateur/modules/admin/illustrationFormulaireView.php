<?php
if( isset( $message) ) {
    echo '<div class="message">' . $message . '</div>';
}
?>
<div class="creer ligne">
    <form action=".?m=admin&c=illustration&a=create" method="post">
        <input type="text" name="path" value="">
        <button type="submit">Créer</button>
    </form>
</div>

<div class="table"> 
    <?php foreach( $illustrations as $key => $illustration ) { ?>
    <div class="ligne">
        <form action=".?m=admin&c=illustration&a=update" method="post">
            <input type="text" name="nom" value="<?php $illustration->getPath()?>">
            <button type="submit"></button>
        </form>
        <a href=".?m=admin&c=illustration&a=delete&id=<?php $caret->getId() ?>">Supprimer</a>
    </div>
    <?php } ?>
</div>
