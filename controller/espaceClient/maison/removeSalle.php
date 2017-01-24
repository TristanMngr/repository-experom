<?php
/**
 * suppression de salle
 */

/*suppression de salle envoyer par javascript*/
if (isset($_GET['target3'])) {

    $removeSalle = $_GET['target3'];

    // on récupère l'id de la salle
    $tableau = array('typeDeRequete'=>'select', 'table'=>'salles','param'=>array('nom'=>$removeSalle));
    $dataSalle = requeteDansTable($db,$tableau);


    $nomSalle = $dataSalle[0]['nom'];


    // on remet les valeurs des ID_salle à 0

    $tableau = array('typeDeRequete'=>'update', 'table'=>'capteurs','setValeur'=>'ID_salle','champ'=>'nom' , 'param'=>array('setValeur'=>0,'champ'=>$nomSalle));
    requeteDansTable($db,$tableau);

    /*$tableau = array('typeDeRequete'=>'select', 'table'=>'capteurs','param'=>array('ID_salle'=>$idSalle));
    $capteursSalle = requeteDansTable($db,$tableau);*/


    /*for ($capteur = 0; $capteur < count())*/

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

$tableau = array('IDmaison'=> $_SESSION['IDmaison']);
$tableauDonneesSalles = getDataCapteursByNameSalle($db,$tableau);


include('vue/espaceClient/maMaison.php');