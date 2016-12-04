<?php
/**
 * connexion a la base de donné et récuperation de l'erreur (si il y'a).
 * si xamp,wamp:$motDePasse="", si mamp:$motDePasse:"root"
 */

$adresseHote = "localhost";
$baseDeDonne = "experom";
$login = "root";
$motDePasse = "root";
try {
    $db = new PDO("mysql:host=".$adresseHote.";dbname=".$baseDeDonne.";meta=uft8",$login,$motDePasse,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $erreur) {
    die("Erreur : ".$erreur->getMessage());
}