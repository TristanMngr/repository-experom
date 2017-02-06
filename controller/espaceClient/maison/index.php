<?php
include("modele/modes.php");
include("modele/salles.php");
include('controller/debug.php');
include("controller/capteurSelect.php");
include('modele/capteurs.php');



$messageError = null;
$showGeneral = false;



/**
 * nouvelle recherche sur les salles
 */

$tableau = array('IDmaison'=> $_SESSION['IDmaison']);
$tableauDonneesSalles = getDataCapteursByNameSalle($db,$tableau);



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

// récupération des modes par salles, puis récup du nom, pour mettre à jour la page

function getModeSalle($db,$idSalle,$idMaison)
{

    $tableau = array(
        'typeDeRequete'=>'select',
        'table'=>'salles',
        'param'=>array(
            'IDmaison'=>$idMaison,
            'ID'=>$idSalle
        ));

    $tableauDonneesSalles = requeteDansTable($db,$tableau);

    $tableau = array('param' => array('nom' => $tableauDonneesSalles[0]['nom'], 'IDmaison' => $_SESSION['IDmaison']));
    $arrayCapteurSelect = getDataModeByName($db, $tableau);
    $tableau = array('typeDeRequete' => 'select', 'table' => 'modes', 'param' => array('ID' => $tableauDonneesSalles[0]['ID_mode']));
    $arrayDataModeBySalle = requeteDansTable($db, $tableau);
    if (isset($arrayDataModeBySalle[0]['nom'])) {
        $nomMode = $arrayDataModeBySalle[0]['nom'];
        return $nomMode;
    }
}
function getModeGeneral($db,$idMaison) {
    $tableau = array('typeDeRequete'=>'select',
        'table'=>'salles',
        'param'=>array(
            'IDmaison'=>$idMaison,
            'nom'=>'general'
        ));
    $tableauDonneesSalles = requeteDansTable($db,$tableau);

    $tableau = array('param' => array('nom' => $tableauDonneesSalles[0]['nom'], 'IDmaison' => $_SESSION['IDmaison']));
    $arrayCapteurSelect = getDataModeByName($db, $tableau);
    $tableau = array('typeDeRequete' => 'select', 'table' => 'modes', 'param' => array('ID' => $tableauDonneesSalles[0]['ID_mode']));
    $arrayDataModeBySalle = requeteDansTable($db, $tableau);
    if (isset($arrayDataModeBySalle[0]['nom'])) {
        $nomMode = $arrayDataModeBySalle[0]['nom'];
        return $nomMode;
    }
}


// retourne un tableau type=>valeur du mode
function getTypeValueMode($db,$idMode) {
    $arrayTypeValue = array();
    $tableau = array('typeDeRequete'=>'select', 'table'=>'modes_config','param'=>array('ID_mode'=>$idMode));
    $arrayDataMode = requeteDansTable($db,$tableau);

    foreach($arrayDataMode as $key=>$value) {
        $arrayTypeValue[$value['type']] = $value['consigne'];
    }
    return $arrayTypeValue;

}

// pour la salle général
if (isset($_GET['target3'])) {
    if ($_GET['target2'] == 'general' or $_GET['target3'] == 'general') {
        $tableau = array('typeDeRequete' => 'select', 'table' => 'salles', 'param' => array('nom'=>'general','IDmaison'=>$_SESSION['IDmaison']));
        $idModeGeneral = requeteDansTable($db,$tableau)[0]['ID_mode'];
        $tableau = array('IDmaison' => $_SESSION['IDmaison']);
        $avgDataHome = avgAllSalle($db, $tableau);
    }
}

$tableau = array('typeDeRequete'=>'select','table'=>'salles','param'=>array('IDmaison'=>$_SESSION['IDmaison'],'nom'=>'general'));
if (requeteDansTable($db,$tableau) != array()) {
    $showGeneral = true;
}



if (!empty($_GET['target3']) & $_GET['target2'] == 'creation') {
    include('controller/espaceClient/maison/ajax/getCapteurs.php');
}
else if ($_GET['target2'] == 'ajouter') {
    include('controller/espaceClient/maison/createSalleV2.php');
}
else if ($_GET['target2'] == 'supprimer') {
    include('controller/espaceClient/maison/removeSalle.php');
}
else if ($_GET['target2'] == "activer-mode") {
    include('controller/espaceClient/maison/activateMode.php');
}
else if ($_GET['target2'] == "consommation") {
    include('vue/espaceClient/commation.php');
}
else {
    include('vue/espaceClient/maMaison.php');
}