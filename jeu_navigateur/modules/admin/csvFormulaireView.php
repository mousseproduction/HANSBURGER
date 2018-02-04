<?php
if( isset( $message) ) {
    echo '<div class="message">' . $message . '</div>';
}
?>
<div class="creer ligne">
    <form action=".?m=admin&c=csv&a=create" method="post">
        <input type="text" name="path" value="">
        <input type="text" name="path" value="">
        <input type="text" name="path" value="">
        <button type="submit">Créer</button>
    </form>
</div>
