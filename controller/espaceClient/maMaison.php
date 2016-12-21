<?php
include("modele/users.php");
include("controller/espaceClient/sallesFonctions.php");
/*création de salle*/

if (isset($_GET['target2']) & $_GET['target2'] == 'ajouter') {

    /*On verifie que le nom de la salle n'est pas déja utilisé pour une même id*/

    if (isset($_POST['nomSalle']) & !empty($_POST['nomSalle'])) {
        $tableau = array(
            'typeDeRequete' => 'select',
            'table' => 'salles',
            'param' => array(
                'IDuser' => $_SESSION['ID'],
                'nom' => $_POST['nomSalle']
            ));
        if (requeteDansTable($db, $tableau) == array()) {

            /*si le nom est valide alors on insert dans la table salles*/
            $tableau = array(
                'typeDeRequete' => 'insert',
                'table' => 'salles',
                'param' => array(
                    'nom' => $_POST['nomSalle'],
                    'temperature' => $_POST['temperature'],
                    'humidite' => $_POST['humidite'],
                    'IDuser' => $_SESSION['ID']));

            requeteDansTable($db, $tableau);

            /*récupération id salle, id users et insertion dans users-salles*/

            $tableau = array(
                'typeDeRequete' => 'select',
                'table' => 'salles',
                'param' => array(
                    'IDuser' => $_SESSION['ID'],
                    'nom' => $_POST['nomSalle']
                ));
            $donneesTableSalles = requeteDansTable($db, $tableau);


            $tableau = array(
                'typeDeRequete' => 'select',
                'table' => 'users',
                'param' => array(
                    'ID' => $_SESSION['ID']
                ));
            $donneesTableUsers = requeteDansTable($db, $tableau);


            $tableau = array(
                'typeDeRequete' => 'insert',
                'table' => 'usersSalles',
                'param' => array(
                    'IDuser' => $donneesTableUsers[0]['ID'],
                    'IDsalle' => $donneesTableSalles[0]['ID']
                ));
            requeteDansTable($db,$tableau);

        } else {
            $messageErreur = "Vous devez changer le nom de la salle";
        }
    }
    else {
        $messageErreur = "Vous devez entré un nom de salle";
    }
}

if ($_GET['target2'] == 'control' or $_GET['target2']== 'ajouter' or empty($_GET['target2']) or $_GET['target2'] == 'creation') {

    $tableau = array('typeDeRequete'=>'join','table'=>'userssalles','param'=>array('champ'=>$_SESSION['maison']));
    $tableauDonneesSalles = joinTables($db,$tableau);




}

include('vue/espaceClient/maMaison.php');




