<?php
require_once( 'common/headerView.php' );

if( isset( $message) ) {
    echo '<div class="message">' . $message . '</div>';
}
?>
<h2>Créer une carte</h2>
<div class="creer ligne">
    <form action="" method="post">
        <input type="text" name="nom" value="" placeholder="Nom" >
        <input type="text" name="pv" value="" placeholder="Pv">
        <input type="text" name="degat" value=""placeholder="Dégats">
        <input type="text" name="prix" value=""placeholder="Prix">
        <select name="herosModeleId">
        <?php foreach( $herosModeleList as $key => $heros ) { ?>
            <option value="<?php echo $heros['id'] ?>"><?php echo $heros['nom'] ?></option>
        <?php } ?>
        </select>
        <select name="type">
        <?php foreach( $typeList as $key => $type ) { ?>
            <option value="<?php echo $type['id'] ?>"><?php echo $type['libelle'] ?></option>
        <?php } ?>
        </select>
        <select name="illustrationId">
        <?php foreach( $illustrationList as $key => $illustration ) { ?>
            <option value="<?php echo $illustration['id'] ?>"><?php echo $illustration['path'] ?></option>
        <?php } ?>
        </select>
    </form>
</div>

<h2>Modifier ou supprimer une carte existante</h2>
<div class="table"> 
    <?php foreach( $cartes as $key => $carte ) { ?>
    <div class="ligne">
        <form action=".?m=admin&c=carte&a=update" method="post">
            <label>Nom<input type="text" name="nom" value="<?php echo $carte->getNom()?>"></label>
            <label>Pv<input type="text" name="pv" value="<?php echo $carte->getPv()?>"></label>
            <label>Dégats<input type="text" name="degat" value="<?php echo $carte->getDegat()?>"></label>
            <label>Prix<input type="text" name="prix" value="<?php echo $carte->getPrix()?>"></label>
            <select name="herosModeleId">
            <?php foreach( $herosModeleList as $key => $heros ) { ?>
                <option value="<?php echo $heros['id'] ?>" <?php echo($carte->getHerosModeleId() == $heros['id'])?'selected="selected"':''; ?>><?php echo $heros['nom'] ?></option>
            <?php } ?>
            </select>
            <select name="type">
            <?php foreach( $typeList as $key => $type ) { ?>
                <option value="<?php echo $type['id'] ?>" <?php echo($carte->getType() == $type['id'])?'selected="selected"':''; ?>><?php echo $type['libelle'] ?></option>
            <?php } ?>
            </select>
            <select name="illustrationId">
            <?php foreach( $illustrationList as $key => $illustration ) { ?>
                <option value="<?php echo $illustration['id'] ?>" <?php echo($carte->getIllustrationId() == $illustration['id'])?'selected="selected"':''; ?>><?php echo $illustration['path'] ?></option>
            <?php } ?>
            </select>
            <button type="submit" name="id">Modifier</button>
        </form>
        <form action=".?m=admin&c=carte&a=update" method="get">
            <button type="submit" name="id" >Supprimer</button>
        </form>
    </div>
    <?php } ?>
</div>

<?php
require_once( 'common/footerView.php' );
?>
