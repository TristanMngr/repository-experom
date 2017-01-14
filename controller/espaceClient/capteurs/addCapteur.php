<?php

if ($_GET['target2'] == 'ajouter-capteur') {
    if (isset($_POST['room']) & !empty($_POST['room'])) {
        if (isset($_POST['key']) & !empty($_POST['key'])) {
            $serialKey = (string)$_POST['key'];
            if (getTrame($arrayTrame,$serialKey) != false) {
                $messageSuccess = "votre clef est valide ".getTrame($arrayTrame,$serialKey);
            }
            else {
                $messageError = "votre clef n'est pas valide";
            }
        }
        else {
            $messageError = "vous devez entrer une serial key";
        }
    }
    else {
        $messageError = "vous devez entré un nom de salle";
    }
}

include('vue/espaceClient/capteurs.php')



?>