<?php


$isTemp = false;
$isHum = false;

// on transforme la string en tableau
$stringSerialKey = $_POST['serialKey'];

$arraySerialKey = explode(',',$stringSerialKey);


if (isset($_POST['nomSalle']) & !empty($_POST['nomSalle'])) {
    $tableau = array('typeDeRequete'=>'select', 'table'=>'salles', 'param'=> array('nom'=>$_POST['nomSalle'], 'IDmaison'=>$_SESSION['IDmaison']));
    if(requeteDansTable($db,$tableau) == array()) {
        // récupère le type
        for ($key = 0; $key < count($arraySerialKey); $key ++) {
            if (typeCapteur(substr($arraySerialKey[$key],0,1)) == 'temperature') {
                $isTemp = true;
            }
            if (typeCapteur(substr($arraySerialKey[$key],0,1)) == 'humidite') {
                $isHum = true;
            }
        }
        $tableau = array('typeDeRequete'=>'insert', 'table'=>'salles', 'param'=>array('nom'=>$_POST['nomSalle'], 'isTemperature'=>$isTemp, 'isHumidite'=>$isHum, 'IDmaison'=>$_SESSION['IDmaison']));
        requeteDansTable($db,$tableau);

        $idSalle = getLastID($db);

        for ($key = 0 ; $key < count($arraySerialKey); $key ++) {
            $tableau = array('typeDeRequete'=>'update', 'table'=>'capteurs','setValeur'=>'ID_salle','champ'=>'serial_key','param'=>array('setValeur'=>$idSalle,'champ'=>(int)$arraySerialKey[$key]));
            requeteDansTable($db,$tableau);
        }


        echo 'Votre salle à été créee avec succès';
    }
    else {
        echo 'Ce nom est déja utilisé';
    }
}

//on réactualise les données.


$tableau = array(
    'typeDeRequete'=>'select',
    'table'=>'salles',
    'param'=>array(
        'IDmaison'=>$_SESSION['IDmaison']
    ));

$tableauDonneesSalles = requeteDansTable($db,$tableau);

include('vue/espaceClient/maMaison.php');