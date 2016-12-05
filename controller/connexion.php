<?php
/**
 * verification du formulaire de connexion
 */

include("modele/users.php");

if (isset($_POST["mail"]) and isset($_POST["mdp"])) { //existance des variable
    if (!empty($_POST["mail"]) && !empty($_POST["mdp"])) { //sont vide?
        $donneesUtilisateur = getDansTableUsers($db,"mail", $_POST["mail"]);//fonction du modele users.php
        if ($donneesUtilisateur["mdp"] == $_POST["mdp"]) { //verif de mot de passe(table et envoyé)
            variablesSession($donneesUtilisateur);  //fonction qui déclare les variables de sessions (modele/users)
            $_SESSION['message'] = "Tu es bien connecté";
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

        blblalabal
    }

}