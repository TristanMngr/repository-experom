<?php
/**
 * formulaire d'inscription
 */
include("modele/users.php");



if (isset($_POST["nom"]) && isset($_POST["mail"]) && isset($_POST["adresse"]) && isset($_POST["mdp"]) && isset($_POST["rmdp"]) && $_GET['cible']=="inscription") {
    //même principe que pour connexion
    if (!empty($_POST["nom"]) && !empty($_POST["mail"]) && !empty($_POST["adresse"]) && !empty($_POST["mdp"]) && !empty($_POST["rmdp"])) {
        if ($_POST["mdp"] == $_POST["rmdp"]) {
            if (getDansTableUsers($db,"nom",$_POST["nom"]) == array()) { // on verifie que l'array est vide, permet de verifier que "nom" n'existe pas déja dans la table
                $donneesUtilisateur = getDansTableUsers($db,"nom",$_POST["nom"]);
                insertDansTableUsers($db);
                $donneesUtilisateur = getDansTableUsers($db, "nom", $_POST["nom"]);
                $_SESSION["userID"] = $donneesUtilisateur["userID"];
                $_SESSION["mail"] = $donneesUtilisateur["mail"];
                $_SESSION["adresse"] = $donneesUtilisateur["adresse"];

                $messageErreur = "Tu es bien connecté";
                include("vue/accueil/accueil.php");


            }
            else {
                $messageErreur = "Ce mail ou nom est déja utilisé";
                include("vue/espaceClient/inscription.php");
            }
        }
        else {
            $messageErreur = "Les mots de passe ne sont pas identiques";
            include("vue/espaceClient/inscription.php");
        }
    }
    else {
        $messageErreur = "Le/les champs est/sont vide(s)";
        include("vue/espaceClient/inscription.php");

    }
}
else {
    $messageErreur = "Les variables n'existe pas";
    include("vue/espaceClient/inscription.php");

}