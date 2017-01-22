<?php
include("controller/capteurSelectV2.php");
include("controller/debug.php");



// récupération de tout les capteurs pour affichage
$tableau = array('typeDeRequete'=>'select', 'table'=>'capteurs','param'=>array('ID_maison'=>$_SESSION['IDmaison']));
$arrayCapteurs = requeteDansTable($db,$tableau);


function getNameSalle($db,$capteur) {
    $tableau = array('typeDeRequete' => 'select', 'table' => 'salles', 'param' => array('ID' =>$capteur));
    $salleName = requeteDansTable($db,$tableau);
    return $salleName[0]['nom'];

}


if ($_GET['target2'] == "ajouter-capteur") {
    include('controller/espaceClient/capteurs/addCapteur.php');
}
else if ($_GET['target2'] == "remove") {
    include('controller/espaceClient/capteurs/removeCapteur.php');
}
else {
    include('vue/espaceClient/capteurs.php');
}
