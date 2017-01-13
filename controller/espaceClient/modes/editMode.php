<?php



$modeName = null;
$modeID = null;
$editionMode = true;
$errorTemp  = true;
$errorHum = true;


if ($_GET['target2'] == 'modifier-controller') {

    // on doit récupérer l'id du mode de la table modes_config, puis fetch toutes les données et enfin update.
    $tableau = array('param' => array('nom' => $_POST['editMode'], 'IDmaison' => $_SESSION['IDmaison']));
    $dataMode = getDataModeByName($db, $tableau);

    //récupération du nom du mode
    $modeID = $dataMode[0]['ID'];
    $modeTempID = null;
    $modeHumID = null;

    // récupération de l'id du capteur par type.
    foreach ($dataMode as $capteur => $value) {
        if ($value['type'] == 'temperature') {
            $modeTempID = $value['id'];
        }
        if ($value['type'] == "humidite") {
            $modeHumID = $value['id'];
        }
    }



    $arrayDataConfig = postDataUpdate();




    // l'agencement est à refaire
    if (isset($_POST['nom']) & !empty($_POST['nom'])) {
        // verifie que le nom n'es pas déja pris pour cette maison.
        $tableau = array('typeDeRequete' => "select", "table" => "modes", 'param' => array('nom' => $_POST['nom'], 'IDmaison' => $_SESSION['IDmaison']));
        $dataModeArray = requeteDansTable($db,$tableau);
        if ($dataModeArray == array() or $dataModeArray[0]['nom'] == $_POST['editMode']) {

            if (isset($arrayDataConfig['temperature'])) {
                $arrayDataTemp = $arrayDataConfig['temperature'];
                foreach ($arrayDataTemp as $key => $value) {
                    if (isIssetVariable($arrayDataTemp)) {
                        if (isNoEmptyVariable($arrayDataTemp)) {
                            /*if (isNumber($arrayDataTemp)) {*/
                            $tableau = array(
                                'typeDeRequete' => 'update',
                                'table' => 'modes_config',
                                'setValeur' => $key,
                                'champ1' => 'ID_mode',
                                'champ2' => 'ID',
                                'param' => array(
                                    'setValeur' => $value,
                                    'champ1' => $modeID,
                                    'champ2' => $modeTempID
                                ));
                            updateTableMode($db, $tableau);
                            $errorTemp = false;
                        }
                            /* else {
                               $messageError = "Vous devez entrer des nombres.";
                           }*/
                         else {
                            $messageError = "Tout les champs ne sont pas remplis ";
                        }
                    } else {
                        $messageError = "Les variables n'existent pas";
                    }
                }
            }
            if (isset($arrayDataConfig['humidite'])) {
                $arrayDataHum = $arrayDataConfig['humidite'];
                foreach ($arrayDataHum as $key => $value) {
                    if (isIssetVariable($arrayDataHum)) {
                        if (isNoEmptyVariable($arrayDataHum)) {
                            /*if (isNumber($arrayDataHum)) {*/

                            $tableau = array('typeDeRequete' => 'update',
                                'table' => 'modes_config',
                                'setValeur' => $key,
                                'champ1' => 'ID_mode',
                                'champ2' => 'ID',
                                'param' => array(
                                    'setValeur' => $value,
                                    'champ1' => $modeID,
                                    'champ2' => $modeHumID
                                ));
                            updateTableMode($db, $tableau);
                            $errorHum = false;
                            }
                           /* else {
                                $messageError = "Vous devez entrer des nombres.";
                            }*/
                         else {
                            $messageError = "Tout les champs ne sont pas remplis ";
                        }
                    } else {
                        $messageError = "Les variables n'existent pas";
                    }
                }
            }
            // mise à jour du nom
            $tableau = array('typeDeRequete' => 'update',
                'table' => 'modes',
                'setValeur' => 'nom',
                'champ' => 'ID',
                'param' => array(
                    'setValeur' => $_POST['nom'],
                    'champ' => $modeID,
                ));
            requeteDansTable($db,$tableau);

            // suppression si les types sont décoché.

            foreach($dataMode as $key => $value) {
                if ($value["type"] == 'temperature') {
                    $idCapteurTemp = $value['id'];
                    if (!isset($_POST['checkTemp'])) {
                        $tableau = array("typeDeRequete"=> 'delete', 'table'=>'modes_config','param'=> array('ID'=>$idCapteurTemp));
                        requeteDansTable($db,$tableau);
                    }
                }
                if ($value["type"] == 'humidite') {
                    $idCapteurHum = $value['id'];
                    if (!isset($_POST['checkHum'])) {
                        $tableau = array("typeDeRequete"=> 'delete', 'table'=>'modes_config','param'=>array('ID'=>$idCapteurHum));
                        requeteDansTable($db,$tableau);
                    }
                }
            }
            if (!$errorHum & !$errorTemp) {
                $messageSuccess = $_POST['nom']. " à été édité avec succès";
            }






        }
        else {
            $messageError = "ce nom de mode existe déja";
        }
    }
}




            /*} else {
                $messageError = "vous devez entrer des nombres";
            }*/





if ($_GET['target2'] == 'modifier' or $_GET['target2'] == 'modifier-controller') {

    /*récupération dees données par nom de mode*/


    //récupération du nom du mode

    $dataMode = array();

    if ($_GET['target2'] == 'modifier') {
        $tableau = array('param' => array('nom' => $_POST['editMode'], 'IDmaison' => $_SESSION['IDmaison']));
        $dataMode = getDataModeByName($db, $tableau);
        $modeName = $dataMode[0]['nom'];
        $modeID = $dataMode[0]['ID'];
    }
    else if ($_GET['target2'] == 'modifier-controller') {
        $tableau = array('typeDeRequete'=> 'select', 'table'=>'modes','param'=>array('ID'=>$modeID));
        $arrayMode = requeteDansTable($db,$tableau);
        $modeName = $arrayMode[0]['nom'];
        $modeID = $arrayMode[0]['ID'];
        $tableau = array('param' => array('nom' => $modeName, 'IDmaison' => $_SESSION['IDmaison']));
        $dataMode = getDataModeByName($db, $tableau);
    }



    for ($array = 0; $array < count($dataMode); $array++) {
        if ($dataMode[$array]['type'] == "temperature") {
            $typeModeTemp = true;
            $isCheckedTemp = true;
            $consigneTemp = $dataMode[$array]['consigne'];
            $beginTemp = $dataMode[$array]['heure_debut'];
            $endTemp = $dataMode[$array]['heure_fin'];


        }
        if ($dataMode[$array]['type'] == "humidite") {
            $typeModeHum = true;
            $isCheckedHum = true;
            $consigneHum = $dataMode[$array]['consigne'];
            $beginHum = $dataMode[$array]['heure_debut'];
            $endHum = $dataMode[$array]['heure_fin'];
        }

    }
}
// réactualisation des données.


// récupération de tout les noms de modes pour ensuite les affichers
$tableau = array('param'=> array('champ'=>$_SESSION["IDmaison"]));

$tableauDonneesMode = getDataMode($db,$tableau);

// création d'un tableau avec les noms des modes et suppression des doublons
$arrayNameMode = array();

for ( $k = 0; $k < count($tableauDonneesMode); $k ++ ) {
    $arrayNameMode[] = $tableauDonneesMode[$k]['nom'];
}
$arrayNameMode = array_unique($arrayNameMode);



include("vue/espaceClient/creerUnMode.php");
















