<?php
/**
 * Création des variables de session à partir de getDansTableUsers()
 * @param array $donneesUtilisateur
 */
function variablesSession($donneesUtilisateur) {

    $_SESSION["userID"] = $donneesUtilisateur["userID"];
    $_SESSION["mail"] = $donneesUtilisateur["mail"];
    $_SESSION["nom"] = $donneesUtilisateur["nom"];
    $_SESSION["adresse"] = $donneesUtilisateur["adresse"];
    $_SESSION["dateInscription"] = $donneesUtilisateur["dateInscription"];
    if ($donneesUtilisateur["role"] == "principal") {
        $_SESSION["role"] = "Utilisateur principal";
    }
    else if ($donneesUtilisateur["role"] == "secondaire"){
        $_SESSION["role"] = "Utilisateur secondaire";
    }
}
