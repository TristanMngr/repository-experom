<?php


if ($_GET['target2'] == 'modifier' or $_GET['target2'] == 'modifier-controller') {

    /*récupération dees données par nom de mode*/
    $tableau = array('param' => array('nom' => $_POST['editMode'], 'IDmaison' => $_SESSION['IDmaison']));
    $dataMode = getDataModeByName($db, $tableau);


    $modeName = $dataMode[0]['nom'];


    for ($array = 0; $array < count($dataMode); $array++) {
        if ($dataMode[$array]['type'] == "temperature") {
            $typeModeTemp = true;
            $isCheckedTemp = true;
            $consigneTemp = $dataMode[$array]['consigne'];
            $beginTemp = $dataMode[$array]['heure_debut'];
            $endTemp = $dataMode[$array]['heure_fin'];

            // dégueulasse, à refaire :
            if ($_GET['target2'] == 'modifier-controller') {
                if ((isset($_POST['tempMode'])) & isset($_POST['timeBeginTemp']) & isset($_POST['timeEndTemp'])) {
                    if (!empty($_POST['tempMode']) & !empty($_POST['timeBeginTemp']) & !empty($_POST['timeEndTemp'])) {
                        $tableauPost = array('consigne' => $_POST['tempMode'], 'heure_debut' => $_POST['timeBeginTemp'], 'heure_fin' => $_POST['timeEndTemp']);
                        foreach ($tableauPost as $key => $value) {
                            if ($dataMode[$array]['type'] == 'temperature') {
                                $tableau = array(
                                    "typeDeRequete" => "update",
                                    "table" => 'modes_config',
                                    'setValeur' => $key,
                                    'champ' => 'type',
                                    'champ2' => 'ID_mode',
                                    'param' => array(
                                        'setValeur' => $value,
                                        'champ' => 'temperature',
                                        'champ2' => $dataMode[0]['ID']));
                                updateTableMode($db, $tableau);
                            }
                        }
                    }
                }
            }
            if ($dataMode[$array]['type'] == "humidite") {
                $typeModeHum = true;
                $isCheckedHum = true;
                $consigneHum = $dataMode[$array]['consigne'];
                $beginHum = $dataMode[$array]['heure_debut'];
                $endHum = $dataMode[$array]['heure_fin'];
            }
        }

        /*modification des données si checked.*/
        /*if ($isCheckedTemp) {

        }
        if ($isCheckedHum)*/

    }
}

include("vue/espaceClient/creerUnMode.php");