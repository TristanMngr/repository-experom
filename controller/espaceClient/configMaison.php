<?php

/**
 * première connexion
 */



// insertion des données envoyé par configMaison.php (vue)

if ($_GET['target'] == 'premiere-connexion') {


    $tableau = array(
        'typeDeRequete' => 'insert',
        'table' => 'maison',
        'param' => array(
            'nom' => $_POST['nom'],
            'superficie' => $_POST['superficie'],
            "adresse" => $_POST['adresse']
        ));
    requeteDansTable($db, $tableau);

// on récupère la dernière ID de l'insertion

    $lastID = getLastID($db);

// update de l'id de la maison dans users
    $tableau = array(
        'typeDeRequete' => 'update',
        'table' => 'users',
        'setValeur' => 'IDmaison',
        'champ' => 'ID',
        'param' => array('setValeur' => $lastID, 'champ' => $_SESSION["ID"])
    );
    requeteDansTable($db, $tableau);

    /*$tableau = array('typeDeRequete'=>'select','table'=>'maison','param'=>array('ID'=>$_SESSION['IDmaison']));
    if (requeteDansTable($db,$tableau)[0]['number_object']== 0) {*/



// selection de toute les données de maison.

    $tableau = array(
        'typeDeRequete' => 'select',
        'table' => 'maison',
        'param' => array(
            'ID' => $lastID
        ));
    $donneesMaison = requeteDansTable($db, $tableau);
    $_SESSION['IDmaison'] = $donneesMaison[0]['ID'];


    // update clef
    $tableau = array('typeDeRequete'=>'update','table'=>'maison','setValeur'=>'number_object','champ'=>'ID','param'=> array(
        'setValeur'=>$_SESSION['clef'],
        'champ'=>$_SESSION['IDmaison']
    ));
    requeteDansTable($db,$tableau);


    $_SESSION['adresse'] = $donneesMaison[0]['adresse'];
    $_SESSION['nomMaison'] = $donneesMaison[0]['nom'];


}

include('vue/accueil/accueil.php');