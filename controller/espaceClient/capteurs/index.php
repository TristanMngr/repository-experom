<?php
include("controller/capteurSelectV2.php");
include("controller/debug.php");


/*$tableau = array('typeDeRequete' => 'insert', 'table' => 'capteurs', 'param' => array('type' => $arrayKeyType['type'], 'serial_key' => $arrayKeyType['key'], 'nom' => $_POST['room'], 'ID_maison' => $_SESSION['IDmaison']));*/


// récupération de tout les capteurs pour affichage
$tableau = array('typeDeRequete'=>'select', 'table'=>'capteurs','param'=>array('ID_maison'=>$_SESSION['IDmaison']));
$arrayCapteurs = requeteDansTable($db,$tableau);


function getNameSalle($db,$capteur) {
    $tableau = array('typeDeRequete' => 'select', 'table' => 'salles', 'param' => array('ID' =>$capteur));
    $salleName = requeteDansTable($db,$tableau);
    if ($salleName != array()) {
        return $salleName[0]['nom'];
    }
    else {
        return false;
    }
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
