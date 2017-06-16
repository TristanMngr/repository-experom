<?php
include("controller/debug.php");
include("controller/trame.php");
include("modele/capteurs.php");


// on insert les trames dans la table Archives
for ($trame = 0; $trame < count($arrayTrame); $trame ++) {

    if ($arrayTrame[$trame] )
    $tableau = array(
        'number_object' =>$arrayTrame[$trame]['number_object'],
        'type_requete'=> $arrayTrame[$trame]['type_requete'],
        'type_capteur'=> $arrayTrame[$trame]['type_capteur'],
        'number_capteur'=> $arrayTrame[$trame]['number_capteur'],
        'date_time'=>$arrayTrame[$trame]['year'].'-'.
            $arrayTrame[$trame]['month'].'-'.
            $arrayTrame[$trame]['day'].' '.
            $arrayTrame[$trame]['hour'].':'.
            $arrayTrame[$trame]['minute'].':'.
            $arrayTrame[$trame]['second']);

    // on verifie que les trames ne sont pas déja ajouté dans la table archives
    if (!alreadyInArchives($db,$tableau)) {

        // on verifie que la trame est bien une trame d'écriture
        // si les deux conditions sont respecté, alors on insert dans la table archive
        if ($arrayTrame[$trame]['type_requete'] != 0 ) {
            $tableau = array('typeDeRequete' => 'insert', 'table' => 'archives', 'param' => array(
                'type_trame' => $arrayTrame[$trame]['type_trame'],
                'number_object' => $arrayTrame[$trame]['number_object'],
                'type_requete' => $arrayTrame[$trame]['type_requete'],
                'type_capteur' => $arrayTrame[$trame]['type_capteur'],
                'number_capteur' => $arrayTrame[$trame]['number_capteur'],
                'value' => $arrayTrame[$trame]['value'],
                'number_trame' => $arrayTrame[$trame]['number_trame'],
                'checksum' => $arrayTrame[$trame]['checksum'],
                'date_time' => $arrayTrame[$trame]['year'] . '-' .
                    $arrayTrame[$trame]['month'] . '-' .
                    $arrayTrame[$trame]['day'] . ' ' .
                    $arrayTrame[$trame]['hour'] . ':' .
                    $arrayTrame[$trame]['minute'] . ':' .
                    $arrayTrame[$trame]['second']
            ));
            requeteDansTable($db, $tableau);
        }

    }


}

// on recupere les trames avec le bon groupe et on insert dans la table
// capteurs les différent capteurs

$tableau = array('type_capteur'=>3,'number_object'=>$arrayTrame[0]['number_object']);
$tempTrames = fetchNumberCapt($db,$tableau);
$tableau = array('type_capteur'=>4,'number_object'=>$arrayTrame[0]['number_object']);
$humTrames = fetchNumberCapt($db,$tableau);

// ajout des capteurs automatique selon les trames reçues.


addCapteurInDb($db,$tempTrames,'temperature');
addCapteurInDb($db,$humTrames,'humidite');


$tableau = array('IDmaison'=>$_SESSION['IDmaison']);
$arrayCapteursToArchives = getCapteursInfoToUpdate($db,$tableau);

foreach ($arrayCapteursToArchives as $key => $value) {

    $type = 0;
    if ($arrayCapteursToArchives[$key]['type'] == 'temperature') {
      $type = 3;
    }
    else if ($arrayCapteursToArchives[$key]['type'] == 'humidite') {
      $type = 4;
    }
    $tableau = array(
      'ID_capteur'=> $arrayCapteursToArchives[$key]['ID'],
      'number_object'=>$arrayTrame[0]['number_object'],
      'type_capteur'=> $type,
      'number_capteur'=> $arrayCapteursToArchives[$key]['number_capteur']
    );
    updateIntoArchives($db,$tableau);


}






// récupération de tout les capteurs pour affichage
/*$tableau = array('typeDeRequete'=>'select', 'table'=>'capteurs','param'=>array('ID_maison'=>$_SESSION['IDmaison']));
$arrayCapteurs = requeteDansTable($db,$tableau);*/


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

$tableau = array('typeDeRequete'=>'select', 'table'=>'capteurs','param'=>array('ID_maison'=>$_SESSION['IDmaison']));
$arrayCapteurs = requeteDansTable($db,$tableau);


if ($_GET['target2'] == "ajouter-capteur") {
    include('controller/espaceClient/capteurs/addCapteur.php');
}
else if ($_GET['target2'] == "remove") {
    include('controller/espaceClient/capteurs/removeCapteur.php');
}
else {
    include('vue/espaceClient/capteurs.php');
}
