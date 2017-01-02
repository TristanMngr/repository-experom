<?php
include("modele/general.php");
include("modele/modes.php");
include("modele/salles.php");
include('controller/debug.php');
include("controller/capteurSelect.php");


$messageErreur = null;


// récupération de toutes les données des salles
$tableau = array(
    'typeDeRequete'=>'select',
    'table'=>'salles',
    'param'=>array(
        'IDmaison'=>$_SESSION['IDmaison']
    ));

$tableauDonneesSalles = requeteDansTable($db,$tableau);



// récupération de tout les noms de modes pour ensuite les affichers
$tableau = array('param'=> array('champ'=>$_SESSION["IDmaison"]));

$tableauDonneesMode = getDataMode($db,$tableau);


// création d'un tableau avec les noms des modes et suppression des doublons
$arrayNameMode = array();
$arrayMode = array();

for ( $k = 0; $k < count($tableauDonneesMode); $k ++ ) {
    $arrayNameMode[] = $tableauDonneesMode[$k]['nom'];
}

// mise à jour des clefs dans un nouveau tableau.
$arrayNameMode = array_unique($arrayNameMode);
foreach ($arrayNameMode as $key => $mode) {
    $arrayMode[] = $mode;
}



// fonction qui retourne la valeur du type demandé.
function getdataCapteur($db,$idSalle) {
    $value = array();
    $tableau = array('param'=>array('ID_salle'=>$idSalle));
    $dataSalle = getDataSalle($db,$tableau);
    foreach ($dataSalle as $key => $data)

    if ($data['type'] == 'temperature') {
        if ($data['temperature']!= null) {
            $value['temp'] = $data["temperature"];
        }
    }
    if ($data['type'] == 'humidite') {
        if ($data['humidite']!= null) {
            $value['hum'] = $data["humidite"];
        }
    }
    return $value;
}





if ($_GET['target2'] == 'ajouter') {
    include('controller/espaceClient/maison/createSalle.php');
}
else if ($_GET['target2'] == 'supprimer') {
    include('controller/espaceClient/maison/removeSalle.php');
}
else if ($_GET['target2'] == "activer-mode") {
    include('controller/espaceClient/maison/activateMode.php');
}
else {
    include('vue/espaceClient/maMaisonV2.php');
}