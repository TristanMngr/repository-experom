<?php


/*On verifie que le nom de la salle n'est pas déja utilisé pour une même maison*/
$isCapteurHum = false;
$isCapteurTemp = false;

$tableauPost = array($_POST['chooseCapteurHum'], $_POST['chooseCapteurTemp']);


// transforme un string en tableau
function getTableauTypeId($tableauPost){

    $arrayTypeId = array();
    for ($post = 0; $post < count($tableauPost); $post++) {
        if ($tableauPost[$post] != 'false') {
            $arrayTypeId[$post] = explode("-", $tableauPost[$post]);
        }
    }
    return $arrayTypeId;

}




// on verifie que la liste déroulante ne vaut pas false;
if ($_POST['chooseCapteurTemp']!= 'false') {
    $isCapteurTemp = true;
}
if ($_POST['chooseCapteurHum']!= 'false') {
    $isCapteurHum = true;
}
if ($isCapteurTemp == true | $isCapteurHum == true){
    if (isset($_POST['nomSalle']) & !empty($_POST['nomSalle'])) {
        $tableau = array(
            'typeDeRequete' => 'select',
            'table' => 'salles',
            'param' => array(
                'IDmaison' => $_SESSION['IDmaison'],
                'nom' => $_POST['nomSalle']
            ));
        if (requeteDansTable($db, $tableau) == array()) {

            // insert dans la table des données, dont IDmaison.
            $tableau = array(
                'typeDeRequete' => 'insert',
                'table' => 'salles',
                'param' => array(
                    'nom' => $_POST['nomSalle'],
                    'isTemperature' => $isCapteurTemp,
                    'isHumidite' => $isCapteurHum,
                    'IDmaison' => $_SESSION['IDmaison']));
            requeteDansTable($db, $tableau);

            $idSalle = getLastID($db);



            // insert dans table Capteurs
            $arrayTypeId = getTableauTypeId($tableauPost);

            $idCapteurTemp = null;
            $idCapteurHum = null;
            // on boucle sur les capteurs de la liste déroulante, le rang 0 correspond au type.
            foreach($arrayTypeId as $item => $value) {

                    $tableau = array(
                        'typeDeRequete' => 'insert',
                        'table' => 'capteurs',
                        'param' => array(
                            'type' => $arrayTypeId[$item][0],
                            'ID_salle' => $idSalle
                        ));

                    requeteDansTable($db, $tableau);
                    if ($arrayTypeId[$item][0] == 'temperature') {
                        $idCapteurTemp = getLastID($db);
                    } else if ($arrayTypeId[$item][0] == 'humidite') {
                        $idCapteurHum = getLastID($db);
                    }


            }

            // a viré:

            $arrayConsigne = array();
            $arrayRequestData = arrayRequestData($arrayTrame);
            for ($tram = 0; $tram < count($arrayRequestData); $tram ++) {
                foreach($arrayTypeId as $item => $value) {
                    if ($arrayRequestData[$tram]['idCapteur'] == $arrayTypeId[$item][1]) {

                        $arrayConsigne[$arrayTypeId[$item][0]][] = $arrayRequestData[$tram]['valueOfCapteur'];
                        $arrayConsigne[$arrayTypeId[$item][0]][] = $arrayTypeId[$item][1];
                    }
                }
            }



            if ($_POST['chooseCapteurTemp'] != 'false') {


                $tableau = array(
                    'typeDeRequete' => "insert",
                    'table' => 'archives',
                    'param' => array(
                        'numero' => $arrayConsigne['temperature'][1],
                        'temperature' => $arrayConsigne['temperature'][0],
                        'ID_capteur'=> $idCapteurTemp
                    ));
                requeteDansTable($db, $tableau);
            }

            if ($_POST['chooseCapteurHum'] != 'false') {

                $tableau = array(
                    'typeDeRequete' => "insert",
                    'table' => 'archives',
                    'param' => array(
                        'numero' => $arrayConsigne['humidite'][1],
                        'humidite' => $arrayConsigne['humidite'][0],
                        'ID_capteur'=> $idCapteurHum
                    ));
                requeteDansTable($db, $tableau);
            }



            $messageSuccess = $_POST['nomSalle']." a bien été créee";

        } else {
            $messageError = "Cette salle à déja été créer";
        }
    }
    else {
        $messageError = "Vous devez entrer un nom de salle";
    }
}
else {
    $messageError = "Vous devez avoir au moins un capteur dans une pièce.";
}




// on réactualise les données
$tableau = array(
    'typeDeRequete'=>'select',
    'table'=>'salles',
    'param'=>array(
        'IDmaison'=>$_SESSION['IDmaison']
    ));

$tableauDonneesSalles = requeteDansTable($db,$tableau);




include('vue/espaceClient/maMaisonV2.php');




