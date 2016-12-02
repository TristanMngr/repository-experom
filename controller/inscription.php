<?php


include("modele/users.php");

$messageErreur;
$afficherErreur = False;


if (isset($_POST["nom"]) && isset($_POST["mail"]) && isset($_POST["adresse"]) && isset($_POST["mdp"]) && isset($_POST["rmdp"]) && $_GET['cible']=="inscription") {
    if (!empty($_POST["nom"]) && !empty($_POST["mail"]) && !empty($_POST["adresse"]) && !empty($_POST["mdp"]) && !empty($_POST["rmdp"])) {
        if ($_POST["mdp"] == $_POST["rmdp"]) {
            insertDansTableUsers($db);
            $donneesUtilisateur = getDansTableUsers($db, $_POST["nom"]);
            $_SESSION["userID"] = $donneesUtilisateur["userID"];
            include("vue/accueil/accueil.php");

        }
        else {
            $afficherErreur = True;
            $messageErreur = "Les mots de passe ne sont pas identiques";
            include("vue/espaceClient/inscription.php");
        }
    }
    else {
        $afficherErreur =True;
        $messageErreur = "Le/les champs est/sont vide(s)";
        include("vue/espaceClient/inscription.php");

    }
}
else {
    $afficherErreur =True;
    $messageErreur = "Les variables n'existe pas";
    include("vue/espaceClient/inscription.php");

}