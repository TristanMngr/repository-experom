<?php

/**
 * AJAX
 * listes des utilisateurs (input) cf ajax/users.js
 */

if (isset($_GET['target3'])) {

    $tableau = array('pseudo' => $_GET['target3'] . '%');
    $arrayUsers = fetchSubUsers($db, $tableau);


    foreach ($arrayUsers as $key => $value) { ?>
        <li id="<?= $value['pseudo']?>" onclick="ajaxGetHome(this)"><?= $value['pseudo']; ?></li>
    <?php }


}
?>