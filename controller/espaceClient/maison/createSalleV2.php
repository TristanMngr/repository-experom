<?php


$isTemp = false;
$isHum = false;

// on transforme la string en tableau
$stringSerialKey = $_POST['serialKey'];

$arraySerialKey = explode(',',$stringSerialKey);


if (isset($_POST['nomSalle']) & !empty($_POST['nomSalle'])) {
    if ($_POST['nomSalle'] != "general") {
        if ($stringSerialKey != "") {
            $tableau = array('typeDeRequete' => 'select', 'table' => 'salles', 'param' => array('nom' => $_POST['nomSalle'], 'IDmaison' => $_SESSION['IDmaison']));
            if (requeteDansTable($db, $tableau) == array()) {
                // récupère le type
                for ($key = 0; $key < count($arraySerialKey); $key++) {
                    if (typeCapteur(substr($arraySerialKey[$key], 0, 1)) == 'temperature') {
                        $isTemp = true;
                    }
                    if (typeCapteur(substr($arraySerialKey[$key], 0, 1)) == 'humidite') {
                        $isHum = true;
                    }
                }
                $tableau = array('typeDeRequete' => 'insert', 'table' => 'salles', 'param' => array('nom' => $_POST['nomSalle'], 'isTemperature' => $isTemp, 'isHumidite' => $isHum, 'IDmaison' => $_SESSION['IDmaison']));
                requeteDansTable($db, $tableau);

                $idSalle = getLastID($db);

                for ($key = 0; $key < count($arraySerialKey); $key++) {

                    $tableau = array('ID_salle' => $idSalle, 'serial_key' => (int)$arraySerialKey[$key], 'ID_maison' => $_SESSION['IDmaison']);

                    updateTableCapteur($db, $tableau);
                }
                //TODO ajout salle general si n'existe pas

                $tableau = array('typeDeRequete' => 'select', 'table' => 'salles', 'param' => array('IDmaison' => $_SESSION['IDmaison'], 'nom' => 'general'));


                if (requeteDansTable($db, $tableau) == array()) {
                    $tableau = array('typeDeRequete' => 'insert', 'table' => 'salles', 'param' => array('IDmaison' => $_SESSION['IDmaison'], 'nom' => 'general'));
                    requeteDansTable($db, $tableau);
                    $showGeneral = true;
                }

                $messageSuccess = 'Votre salle a été créée avec succès';

            } else {
                $messageError = 'Ce nom est déja utilisé';
            }
        } else {
            $messageError = "Vous n'avez séléctionné aucun capteur";
        }
    }
    else {
        $messageError = "Veuillez utiliser un autre nom";
    }
}

//on réactualise les données.

$tableau = array('IDmaison'=> $_SESSION['IDmaison']);
$tableauDonneesSalles = getDataCapteursByNameSalle($db,$tableau);




include('vue/espaceClient/maMaison.php');