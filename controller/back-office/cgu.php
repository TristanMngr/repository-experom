<?php

/**
 * controller CGU
 * permet de modifier ou créer les CGU
 */


$tableau = array('typeDeRequete'=>'select', 'table'=>'cgu','param'=>array('ID'=>1));
$dataCGU = requeteDansTable($db,$tableau);


if ($dataCGU == array()) {
    if ($_GET['target2'] == 'creation') {
        if (isset($_POST['cgu']) & !empty($_POST['cgu'])) {
            /*$text = htmlspecialchars(nl2br($_POST['cgu']));*/
            $tableau = array('typeDeRequete' => 'insert', 'table' => 'cgu', 'param' => array('text'=>$_POST['cgu'],'ID'=>1));
            requeteDansTable($db, $tableau);

            $messageSuccess = 'les CGU ont bien été crée';
        }
    }
}
else {
    if ($_GET['target2'] == 'creation') {

        if (isset($_POST['cgu']) & !empty($_POST['cgu'])) {
            /*$text = htmlspecialchars(nl2br($_POST['cgu']));*/
            $tableau = array('typeDeRequete' => 'update', 'table' => 'cgu','setValeur'=>'text','champ'=>'ID', 'param' => array('setValeur'=>$_POST['cgu'],'champ'=>1));
            requeteDansTable($db, $tableau);

            $messageSuccess = 'les CGU ont bien été modifiés';
        }
    }
}
// réactualisation des données
$tableau = array('typeDeRequete'=>'select', 'table'=>'cgu','param'=>array('ID'=>1));
$dataCGU = requeteDansTable($db,$tableau);

include('vue/back-office/cgu-BO.php');