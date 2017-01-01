<?php
include("modele/general.php");
// récupération de toutes les données des salles
$tableau = array(
    'typeDeRequete'=>'select',
    'table'=>'salles',
    'param'=>array(
        'IDmaison'=>$_SESSION['IDmaison']
    ));

$tableauDonneesSalles = requeteDansTable($db,$tableau);



if ($_GET['target2'] == 'ajouter') {
    include('controller/espaceClient/maison/maMaison.php');
}
else {
    include('vue/espaceClient/maMaison.php');
}