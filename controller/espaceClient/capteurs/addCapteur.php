<?php

/**
 * ajouter un capteur
 */


if ($_GET['target2'] == 'ajouter-capteur') {
    if (isset($_POST['room']) & !empty($_POST['room'])) {
        if (isset($_POST['key']) & !empty($_POST['key'])) {

            $tableau = array('typeDeRequete'=>'select', 'table'=>'capteurs','param'=>array('serial_key'=>$_POST['key'],'ID_maison'=>$_SESSION['IDmaison']));
            /*on verifie que la clef n'a pas déja été rentré pour une même maison*/
            if (requeteDansTable($db,$tableau) == array()) {


                /*on verifie que la clef existe*/
                if (getTrameSerialKey($arrayTrame, $_POST['key']) != array()) {

                    $trame = getTrameSerialKey($arrayTrame, $_POST['key']);
                    $arrayKeyType = getKeyTypeTrame($trame);
                    $tableau = array('typeDeRequete' => 'insert', 'table' => 'capteurs', 'param' => array('type' => $arrayKeyType['type'], 'serial_key' => $arrayKeyType['key'], 'nom' => $_POST['room'], 'ID_maison' => $_SESSION['IDmaison']));
                    requeteDansTable($db, $tableau);
                    $idCapteur = getLastID($db);

                    /**
                     * Attention cette partie n'est pas bonne on insert pas les trames ici normalement.
                     */

                    $arrayTrame = getAllTrameWithSerialKey($arrayTrame, $_POST['key']);

                    $arrayTranslateTrame = arrayRequestData($arrayTrame);

                    foreach ($arrayTranslateTrame as $key => $value) {
                        if ($value['typeOfCapteur'] == 'temperature') {
                            $tableau = array('typeDeRequete' => 'insert', 'table' => 'archives', 'param' => array('numero' => $value['idCapteur'], 'temperature' => $value['valueOfCapteur'] , 'ID_capteur' => $idCapteur));
                            requeteDansTable($db, $tableau);
                        }
                        if ($value['typeOfCapteur'] == 'humidite') {
                            $tableau = array('typeDeRequete' => 'insert', 'table' => 'archives', 'param' => array('numero' => $value['idCapteur'], 'humidite' => $value['valueOfCapteur'], 'ID_capteur' => $idCapteur));
                            requeteDansTable($db, $tableau);

                        }

                    }
                    $messageSuccess = "Votre clef est valide";

                } else {
                    $messageError = "Votre clef n'est pas valide";
                }
            }
            else {
                $messageError = "Attention ce capteur a déja été renseigné";
            }
        }
        else {
            $messageError = "Vous devez entrer une serial key";
        }
    }
    else {
        $messageError = "Vous devez entré un nom de salle";
    }
}

// récupération de tout les capteurs pour affichage
// réactualisation des données
$tableau = array('typeDeRequete'=>'select', 'table'=>'capteurs','param'=>array('ID_maison'=>$_SESSION['IDmaison']));
$arrayCapteurs = requeteDansTable($db,$tableau);



include('vue/espaceClient/capteurs.php')



?>