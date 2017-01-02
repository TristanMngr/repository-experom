<?php
include("modele/general.php");

if ($_GET['target']=='premiere-connexion') {
    // insertion des données envoyé par configMaison.php (vue)

    $tableau = array(
        'typeDeRequete' => 'insert',
        'table'=>'maison',
        'param'=>array(
            'nom'=>$_POST['nom'],
            'superficie'=>$_POST['superficie'],
            "adresse"=>$_POST['adresse']
        ));
    requeteDansTable($db, $tableau);

    // on récupère la dernière ID de l'insertion

    $lastID = getLastID($db);

    // update de l'id de la maison dans users
    $tableau = array(
        'typeDeRequete'=> 'update',
        'table'=>'users',
        'setValeur' => 'IDmaison',
        'champ'=> 'ID',
        'param'=> array('setValeur'=>$lastID,'champ'=>$_SESSION["ID"])
    );
    requeteDansTable($db,$tableau);


    // selection de toute les données de maison.

    $tableau = array(
        'typeDeRequete'=> 'select',
        'table'=>'maison',
        'param'=> array(
            'ID'=>$lastID
        ));
    $donneesMaison = requeteDansTable($db,$tableau);
    $_SESSION['IDmaison'] = $donneesMaison[0]['ID'];



    include('vue/accueil/accueil.php');
}
