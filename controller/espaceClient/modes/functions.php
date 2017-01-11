<?php
// verifie que les variable post existe.
function isIssetVariable($tableauPost) {
    $tableau = array();
    foreach ($tableauPost as $key => $value) {
        if (isset($tableauPost[$key])) {
            $tableau[$key] = $value;
        }
    }
    if (count($tableauPost) != count($tableau)) {
        return false;
    }
    else {
        return true;
    }
}

// verifie que les champs ne sont pas vides.
function isNoEmptyVariable($tableauPost) {
    $tableau = array();
    foreach ($tableauPost as $key => $value) {
        if (!empty($tableauPost[$key])) {
            $tableau[$key] = $value;
        }

    }
    if (count($tableauPost) != count($tableau)) {
        return false;
    }
    else {
        return true;
    }
}


//verifie que les champs sont bien des nombres
function isNumber($tableauPost) {
    unset($tableauPost['type']);
    $tableau = array();
    foreach ($tableauPost as $key => $value) {
        if (is_numeric($value)) { //is_numeric
            $tableau[$key] = $value;
        }
    }
    displayArray("isNumber",$tableau);
    if (count($tableauPost) != count($tableau)) {
        return false;
    }
    else {
        return true;
    }
}

// verifie que les checkbox son coché, si oui alors on ajoute dans un nouveau tableau tout les $post de cette checkbox
function postDataArray() {
    $tableauData = array();
    if (isset($_POST['checkTemp'])) {
        $tableauPostTemp = array("consigne"=>$_POST['tempMode'],"timeEnd"=>$_POST['timeEndTemp'],"timeBegin"=> $_POST['timeBeginTemp']);
        $tableauData['temperature'] = $tableauPostTemp;
        $tableauData['temperature']['type'] = "temperature";
    }
    if (isset($_POST['checkHum'])) {
        $tableauPostHum = array("consigne"=>$_POST['humMode'],"timeEnd"=>$_POST['timeBeginHum'],"timeBegin"=> $_POST['timeEndHum']);
        $tableauData['humidite'] = $tableauPostHum;
        $tableauData['humidite']['type'] = "humidite";
    }

    return $tableauData;
}

function postDataUpdate() {
    $tableauData = array();
    if (isset($_POST['checkTemp'])) {
        $tableauPostTemp = array("consigne"=>$_POST['tempMode'],"heure_fin"=>$_POST['timeEndTemp'],"heure_debut"=> $_POST['timeBeginTemp']);
        $tableauData['temperature'] = $tableauPostTemp;
        $tableauData['temperature']['type'] = "temperature";
    }
    if (isset($_POST['checkHum'])) {
        $tableauPostHum = array("consigne"=>$_POST['humMode'],"heure_debut"=>$_POST['timeBeginHum'],"heure_fin"=> $_POST['timeEndHum']);
        $tableauData['humidite'] = $tableauPostHum;
        $tableauData['humidite']['type'] = "humidite";
    }

    return $tableauData;
}














