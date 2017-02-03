<?php

// récupération des données utilisateur.
// récupération des données maison de l'utilisateur

$tableau = array('typeDeRequete'=> 'select', 'table'=>'users','param'=>array('pseudo'=>$_GET['target3']));
$arrayUser = requeteDansTable($db,$tableau);

$tableau = array('typeDeRequete'=>'select', 'table'=> 'maison','param'=>array('ID'=> $arrayUser[0]['IDmaison']));
$arrayHome = requeteDansTable($db,$tableau);