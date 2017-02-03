<?php

/**
 * requete pour les CGU dans la table cgu
 */


$tableau = array('typeDeRequete'=>'select', 'table'=>'cgu','param'=>array('ID'=>1));
$dataCGU = requeteDansTable($db,$tableau);

$textCGU = "";

if ($dataCGU != array()) {
    $textCGU = $dataCGU[0]['text'];
}



include('vue/cgu.php');
?>