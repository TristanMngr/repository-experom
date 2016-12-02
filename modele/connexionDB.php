<?php

/*connexion à la bdd */
try {
    $db = new PDO("mysql:host=localhost;dbname=experom;meta=uft8","root","root",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $erreur) {
    die("Erreur : ".$erreur->getMessage());
}