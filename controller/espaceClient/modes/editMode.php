<?php


if (isset($_POST["editMode"])) {

    $tableau = array('param'=> array('nom'=>$_POST['editMode'], 'IDmaison'=>$_SESSION['IDmaison']));
    $dataMode = getDataModeByName($db,$tableau);

    displayArray('message',$dataMode);

    $modeName = $dataMode[0]['nom'];

    for ($array = 0; $array < count($dataMode); $array ++) {
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
include("vue/espaceClient/creerUnMode.php");