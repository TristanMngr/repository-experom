<?php
include("modele/general.php");
include("controller/debug.php");
include('modele/modes.php');

$displayConfig = false;
$editMode = false;


$modeName = null;
// pour la température
$typeModeTemp = false;
$isCheckedTemp = false;
$consigneTemp =null;
$beginTemp = null;
$endTemp = null;


// pour l'humidité
$isCheckedHum = false;
$typeModeHum = false;
$consigneHum = null;
$beginHum = null;
$endHum = null;



// récupération de tout les noms de modes pour ensuite les affichers
$tableau = array('param'=> array('champ'=>$_SESSION["IDmaison"]));

$tableauDonneesMode = getDataMode($db,$tableau);


// création d'un tableau avec les noms des modes et suppression des doublons
$arrayNameMode = array();

for ( $k = 0; $k < count($tableauDonneesMode); $k ++ ) {
$arrayNameMode[] = $tableauDonneesMode[$k]['nom'];
}
$arrayNameMode = array_unique($arrayNameMode);




if ($_GET['target2'] == "creer-un-mode") {
    include("controller/espaceClient/modes/createMode.php");
}
else if ($_GET['target2'] == "supprimer") {
    include("controller/espaceClient/modes/removeMode.php");
}
else if ($_GET['target2'] == "modifier") {
    $editMode = true;
    $displayConfig = true;
    include("controller/espaceClient/modes/editMode.php");
}
else if ($_GET['target2'] == 'creer') {
    $displayConfig = true;
    include("vue/espaceClient/creerUnMode.php");
}
else {
    include("vue/espaceClient/creerUnMode.php");
}
