<?php
if( isset( $message) ) {
    echo '<div class="message">' . $message . '</div>';
}
?>
<div class="creer ligne">
    <form action="" method="post">
        <input type="text" name="nom" value="">
        <input type="text" name="pv" value="">
        <input type="text" name="degat" value="">
        <input type="text" name="prix" value="">
        <select name="herosModeleId">
        <?php foreach( $herosTable as $key => $heros ) { ?>
            <option value="<?php echo $heros['id'] ?>"><?php echo $heros['nom'] ?></option>
        <?php } ?>
        </select>
        <select name="type">
        <?php foreach( $types as $key => $type ) { ?>
            <option value="<?php echo $type['id'] ?>"><?php echo $type['nom'] ?></option>
        <?php } ?>
        </select>
        <select name="illustrationId">
        <?php foreach( $illustrations as $key => $illustration ) { ?>
            <option value="<?php echo $illustration['id'] ?>"><?php echo $illustration['nom'] ?></option>
        <?php } ?>
        </select>
    </form>
</div>

<div class="table"> 
    <?php foreach( $cartes as $key => $carte ) { ?>
    <div class="ligne">
        <form action="" method="post">
        <input type="text" name="nom" value="<?php $carte->getName()?>">
            <input type="text" name="pv" value="<?php $carte->getPv()?>">
            <input type="text" name="degat" value="<?php $carte->getDegat()?>">
            <input type="text" name="prix" value="<?php $carte->getPrix()?>">
            <select name="herosModeleId">
            <?php foreach( $herosTable as $key => $heros ) { ?>
                <option value="<?php echo $heros['id'] ?>"><?php echo $heros['nom'] ?></option>
            <?php } ?>
            </select>
            <select name="type">
            <?php foreach( $types as $key => $type ) { ?>
                <option value="<?php echo $type['id'] ?>"><?php echo $type['nom'] ?></option>
            <?php } ?>
            </select>
            <select name="illustrationId">
            <?php foreach( $illastrations as $key => $illustration ) { ?>
                <option value="<?php echo $illustration['id'] ?>"><?php echo $illustration['nom'] ?></option>
            <?php } ?>
            </select>
        </form>
        <a href=".?m=admin&a=update&id=<?php $caret->getId() ?>">Modifier</a>
        <a href=".?m=admin&a=delete&id=<?php $caret->getId() ?>">Supprimer</a>
    </div>
    <?php } ?>
</div>
