<?php
/**
 * suppression de salle
 */

/*suppression de salle envoyer par javascript*/
if (isset($_GET['target3'])) {
    $removeSalle = $_GET['target3'];
    $tableau = array(
        'typeDeRequete'=>'delete',
        'table'=>'salles',
        'param'=>array(
            'IDmaison'=>$_SESSION['IDmaison'],
            'nom'=>$_GET['target3']));

    requeteDansTable($db,$tableau);

    $messageError = "Vous avez bien supprimé : ".$removeSalle;
}

// On réactualise les données.

$tableau = array(
    'typeDeRequete'=>'select',
    'table'=>'salles',
    'param'=>array(
        'IDmaison'=>$_SESSION['IDmaison']
    ));

$tableauDonneesSalles = requeteDansTable($db,$tableau);

include('vue/espaceClient/maMaison.php');