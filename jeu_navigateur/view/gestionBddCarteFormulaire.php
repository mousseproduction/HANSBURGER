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

//TODO ajouter les get des cartes dans les inputs
<div class="table"> 
    <?php foreach( $cartes as $key => $carte ) { ?>
    <div class="ligne">
        <form action="" method="post">
        <input type="text" name="nom" value="<>">
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
            <?php foreach( $illastrations as $key => $illustration ) { ?>
                <option value="<?php echo $illustration['id'] ?>"><?php echo $illustration['nom'] ?></option>
            <?php } ?>
            </select>
        </form>
    </div>
    <?php } ?>
</div>
