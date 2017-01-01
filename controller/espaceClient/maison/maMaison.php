<?php


/*On verifie que le nom de la salle n'est pas déja utilisé pour une même maison*/

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
                'isTemperature' => $_POST['temperature'],
                'isHumidite' => $_POST['humidite'],
                'IDmaison' => $_SESSION['IDmaison']));

        requeteDansTable($db, $tableau);
        $messageErreur = "Votre salle à bien été créer";

    } else {
        $messageErreur = "Cette salle à déja été créer";
    }
}
else {
    $messageErreur = "Vous devez entré un nom de salle";
}




include('vue/espaceClient/maMaison.php');




