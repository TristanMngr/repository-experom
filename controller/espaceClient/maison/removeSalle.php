<?php
/**
 * suppression de salle
 */

if (isset($_POST["removeSalle"])) {

    $removeSalle = $_POST['removeSalle'];
    $tableau = array(
        'typeDeRequete'=>'delete',
        'table'=>'salles',
        'param'=>array(
            'IDmaison'=>$_SESSION['IDmaison'],
            'nom'=>$_POST['removeSalle']));

    requeteDansTable($db,$tableau);

    $messageErreur = "Vous avez bien supprimer : ".$removeSalle;
}


// On réactualise les données.

$tableau = array(
    'typeDeRequete'=>'select',
    'table'=>'salles',
    'param'=>array(
        'IDmaison'=>$_SESSION['IDmaison']
    ));

$tableauDonneesSalles = requeteDansTable($db,$tableau);

include('vue/espaceClient/maMaisonV2.php');