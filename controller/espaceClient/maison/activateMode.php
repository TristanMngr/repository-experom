<?php

/**
 * change directement les valeurs des archives lors de l'activation d'un mode, à changer lorsque l'on aura les trames reel.
 */


// permet d'éviter des valeurs null si le mode n'a pas de consigne pour un type
$temp = false;
$hum = false;


if (isset($_POST['getMode'])) {

// récupération des données du mode par rapport a son nom et l'id de la maison.
    $tableau = array(
        'param' => array(
            'nom' => $_POST['getMode'],
            'IDmaison' => $_SESSION['IDmaison']));

    $arrayDataMode = getDataModeByName($db, $tableau);


}

// activation du mode de la salle. (ajouter dans base de données is actif si temp


// on récupere les données des modes de la salle.
$tableau = array('param' => array('nom' => $_POST['getMode'], 'IDmaison' => $_SESSION['IDmaison']));

$arrayCapteurSelect = getDataModeByName($db, $tableau);


// insertion du mode de l'id du mode dans la base de donnée salle

// si l'activation est général alors on update toute les salle de la maison
if (isset($_GET['target3']) & $_GET['target3'] == 'general') {
    $tableau = array('typeDeRequete'=> 'update', 'table'=> 'salles', 'setValeur'=>'ID_mode','champ'=> 'IDmaison','param'=> array('setValeur'=> $arrayCapteurSelect[0]['ID'],'champ'=>$_SESSION['IDmaison']));
    // pour la salle général en question
    requeteDansTable($db,$tableau);
    $tableau = array('typeDeRequete'=> 'update', 'table'=> 'salles', 'setValeur'=>'ID_mode','champ'=> 'IDmaison','param'=> array('setValeur'=> $arrayCapteurSelect[0]['ID'],'champ'=>-1));

    requeteDansTable($db,$tableau);
}
else {
    $tableau = array('typeDeRequete' => 'update', 'table' => 'salles', 'setValeur' => 'ID_mode', 'champ' => 'ID', 'param' => array('setValeur' => $arrayCapteurSelect[0]['ID'], 'champ' => $_POST['getIdSalle']));
    requeteDansTable($db, $tableau);
}


//
foreach ($arrayCapteurSelect as $array => $champ) {
    if ($champ['type'] == 'temperature') {
        $modeTempConsigne = $champ['consigne'];
        $modeTempHeureDebut = $champ['heure_debut'];
        $modeTempHeureFin = $champ['heure_fin'];
        $temp = true;
    }
    if ($champ['type'] == 'humidite') {
        $modeHumConsigne = $champ['consigne'];
        $modeHumHeureDebut = $champ['heure_debut'];
        $modeHumHeureFin = $champ['heure_fin'];
        $hum = true;
    }
}

// on récupere les ID des capteurs de la salle et on les associe par type. (array de la forme array(type=>ID) )
// on traite le cas lorsque la salle est général
if (isset($_GET['target3']) & $_GET['target3'] == 'general') {
    // on récupère aussi le capteur avec comme id maison -1
    $tableau = array('typeDeRequete' => 'select', 'table' => 'capteurs', 'param' => array('ID_maison' => $_SESSION['IDmaison']));


    $arrayDataCapteur = requeteDansTable($db, $tableau);
}
else {
    $tableau = array('typeDeRequete' => 'select', 'table' => 'capteurs', 'param' => array('ID_salle' => $_POST['getIdSalle']));
    $arrayDataCapteur = requeteDansTable($db, $tableau);
}


$arrayIdCapt = array();


foreach ($arrayDataCapteur as $arrayCapt => $champCapt) {
    if ($champCapt['type'] == 'temperature') {
        $arrayIdCapt[$arrayCapt]['temperature'] = $champCapt['ID'];
    }
    if ($champCapt['type'] == 'humidite') {
        $arrayIdCapt[$arrayCapt]['humidite'] = $champCapt['ID'];
    }
}


// on va chercher les capteurs concerné dans l'archives et on change leurs valeurs.

// TODO on modifie toute les trames attention !
for ($capteur = 0; $capteur < count($arrayIdCapt); $capteur++) {
    foreach ($arrayIdCapt[$capteur] as $type => $id) {
        if ($type == 'temperature' & $temp != false) {

            $tableau = array('typeDeRequete' => 'update', 'table' => 'archives', 'setValeur' => 'value', 'champ' => 'ID_capteur', 'param' => array('setValeur' => $modeTempConsigne, 'champ' => $id));
            requeteDansTable($db, $tableau);
        }
        if ($type == 'humidite' & $hum != false) {
            $tableau = array('typeDeRequete' => 'update', 'table' => 'archives', 'setValeur' => 'value', 'champ' => 'ID_capteur', 'param' => array('setValeur' => $modeHumConsigne, 'champ' => $id));
            requeteDansTable($db, $tableau);
        }
    }
}


// tableau regroupant les données du modes. puis récupération du nom

$tableau = array('typeDeRequete' => 'select', 'table' => 'modes', 'param' => array('ID' => $arrayCapteurSelect[0]['ID']));
$arrayDataModeBySalle = requeteDansTable($db, $tableau);
$nomMode = $arrayDataModeBySalle[0]['nom'];


// on réactualise les données
$tableau = array('IDmaison' => $_SESSION['IDmaison']);
$tableauDonneesSalles = getDataCapteursByNameSalle($db, $tableau);



// réactualise les données pour la page viewGénéral
if (isset($_GET['target3'])) {
    if ($_GET['target2'] == 'general' or $_GET['target3'] == 'general') {
        $tableau = array('typeDeRequete'=>'select','table'=>'salles','param'=>array('IDmaison'=>$_SESSION['IDmaison'],'nom'=>'general'));
        $idModeGeneral = requeteDansTable($db,$tableau)[0]['ID_mode'];
        $tableau = array('IDmaison' => $_SESSION['IDmaison']);
        $avgDataHome = avgAllSalle($db, $tableau);
    }
}


include('vue/espaceClient/maMaison2.php');