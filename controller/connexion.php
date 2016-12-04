<?php
/**
 * verification du formulaire de connexion
 */

include("modele/users.php");

if (isset($_POST["mail"]) and isset($_POST["mdp"])) { //existance des variable
    if (!empty($_POST["mail"]) && !empty($_POST["mdp"])) { //sont vide?
        $donneesUtilisateur = getDansTableUsers($db,"mail", $_POST["mail"]);//fonction du modele users.php
        if ($donneesUtilisateur["mdp"] == $_POST["mdp"]) { //verif des mot de passe(table et envoyé)
            $_SESSION["userID"] = $donneesUtilisateur["userID"]; //création des variables session
            $_SESSION["mail"] = $donneesUtilisateur["mail"];
            $_SESSION["adresse"] = $donneesUtilisateur["adresse"];
            include("vue/espaceClient/mesConfigurations.php");
        }
        else {
            $messageErreur = "Le mail ou le mot de passe est incorrect";
            include("vue/espaceClient/connexion.php");
        }
    }
    else {
        $messageErreur = "Le ou les Champs sont vides";
        include("vue/espaceClient/connexion.php");
    }

}