<?php
include("controller/capteurSelectV2.php");
include("controller/debug.php");
include("modele/general.php");



// récupération de tout les capteurs pour affichage
$tableau = array('typeDeRequete'=>'select', 'table'=>'capteurs','param'=>array('ID_maison'=>$_SESSION['IDmaison']));
$arrayCapteurs = requeteDansTable($db,$tableau);


if ($_GET['target2'] == "ajouter-capteur") {
    include('controller/espaceClient/capteurs/addCapteur.php');
}
else {
    include('vue/espaceClient/capteurs.php');
}
