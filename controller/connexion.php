<?php

include("modele/users.php");



if (isset($_POST["mail"]) and isset($_POST["mdp"])) {
    if (!empty($_POST["mail"]) && !empty($_POST["mdp"])) {
        $donneesUtilisateurs = getDansTableUsers($db, $_POST["mail"]);
        if ($donneesUtilisateurs["mdp"] == $_POST["mdp"]) {
            $_SESSION["userID"] = $donneesUtilisateurs["userID"];
            include("vue/espaceClient/mesConfigurations.php");
        } else {
            $messageErreur = "Le mail ou le mot de passe est incorrect";
            include("vue/espaceClient/connexion.php");
        }
    }
    else {
        $messageErreur = "Le ou les Champs sont vides";
        include("vue/espaceClient/connexion.php");
    }

}