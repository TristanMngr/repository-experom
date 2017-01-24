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

    // on verifie que le nom n'existe pas déja
    if (isset($_POST['nomSalle']) & !empty($_POST['nomSalle'])) {
        $tableau = array(
            'typeDeRequete' => 'select',
            'table' => 'salles',
            'param' => array(
                'IDmaison' => $_SESSION['IDmaison'],
                'nom' => $_POST['nomSalle']
            ));
        if (requeteDansTable($db, $tableau) == array()) {

            // si n'existe pas, on insert dans la table des salles les valeurs de isTemperature/isHumidite, dont IDmaison.
            $tableau = array(
                'typeDeRequete' => 'insert',
                'table' => 'salles',
                'param' => array(
                    'nom' => $_POST['nomSalle'],
                    'isTemperature' => $isCapteurTemp,
                    'isHumidite' => $isCapteurHum,
                    'IDmaison' => $_SESSION['IDmaison']));
            requeteDansTable($db, $tableau);


            // on récupère l'id de la salle
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


            // pour chaque cas ajouter une condition sur le type de capteurs.

            $arrayTramTemp = array();
            $arrayTramHum = array();
            $arrayConsigne = array();
            $arrayRequestData = arrayRequestData($arrayTrame);
            foreach ($arrayRequestData as $array => $value) {
                if ($arrayRequestData[$array]['idCapteur'] == $arrayTypeId[$item][1]) { // verifie que les deux id correspondent
                    // pour le capteurs de température
                    if ($arrayRequestData[$array]['typeOfCapteur'] == 'temperature') {
                        foreach($arrayTypeId as $item => $value) {
                            if ($arrayTypeId[$item][0] == 'temperature') {

                                $arrayConsigne[$arrayTypeId[$item][0]][] = $arrayRequestData[$array]['valueOfCapteur']; // ajout de la valeur du capteurs
                                $arrayConsigne[$arrayTypeId[$item][0]][] = $arrayTypeId[$item][1]; // ajout de l'id du capteurs (tram)
                            }
                        }

                    }
                    if ($arrayRequestCapteur[$array]['typeOfCapteur'] == 'humidite') {
                        // pour le capteurs d'humidite
                        foreach($arrayTypeId as $item => $value) {

                            if ($arrayTypeId[$item][0] == 'humidite') {
                                $arrayConsigne[$arrayTypeId[$item][0]][] = $arrayRequestData[$array]['valueOfCapteur']; // ajout de la valeur du capteurs
                                $arrayConsigne[$arrayTypeId[$item][0]][] = $arrayTypeId[$item][1]; // ajout de l'id du capteurs (tram)
                            }
                        }
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



            $messageSuccess = $_POST['nomSalle']." a bien été créée";

        } else {
            $messageError = "Cette salle a déjà été créée";
        }
    }
    else {
        $messageError = "Vous devez entrer un nom de salle";
    }
}
else {
    $messageError = "Vous devez avoir au moins un capteurs dans une pièce.";
}




// on réactualise les données
// récupération de tout les noms de modes pour ensuite les affichers
$tableau = array('param'=> array('champ'=>$_SESSION["IDmaison"]));

$tableauDonneesMode = getDataMode($db,$tableau);







include('vue/espaceClient/maMaison.php');




