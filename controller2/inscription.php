<?php
/**
 * formulaire d'inscription
 */
include("modele/users.php");

// inscription utilisateur principal
if ($utilisateurSecondaire == False) {
    if (isset($_POST["nom"]) && isset($_POST["mail"]) && isset($_POST["adresse"]) && isset($_POST["mdp"]) && isset($_POST["rmdp"]) && $_GET['cible'] == "controllerInscription") {
        //même principe que pour connexion
        if (!empty($_POST["nom"]) && !empty($_POST["mail"]) && !empty($_POST["adresse"]) && !empty($_POST["mdp"]) && !empty($_POST["rmdp"])) {
            if ($_POST["mdp"] == $_POST["rmdp"]) {
                if (getDansTableUsers($db, "nom", $_POST["nom"]) == array()) { // on verifie que l'array est vide, permet de verifier que "nom" n'existe pas déja dans la table
                    insertDansTableUsers($db,"principal",$_POST["adresse"]);
                    $donneesUtilisateur = getDansTableUsers($db, "nom", $_POST["nom"]);
                    variablesSession($donneesUtilisateur);

                    $_SESSION['message'] = "Vous êtes bien inscrit";
                    include("controller/accueil/accueil.php");
                } else {
                    $messageErreur = "Ce mail ou nom est déja utilisé";
                    include("controller/espaceClient/inscription.php");
                }
            } else {
                $messageErreur = "Les mots de passe ne sont pas identiques";
                include("controller/espaceClient/inscription.php");
            }
        } else {
            $messageErreur = "Le/les champs est/sont vide(s)";
            include("controller/espaceClient/inscription.php");

        }
    } else {
        $messageErreur = "Les variables n'existe pas";
        include("controller/espaceClient/inscription.php");

    }
}
// Pour ajouter un nouvelle utilisateur à partir de l'utilisateur principal
else if ($utilisateurSecondaire == True) {
    if (isset($_POST["nom"]) && isset($_POST["mdp"]) && isset($_POST["rmdp"]) && isset($_POST["mail"]) && $_GET['cible'] == "controllerInscriptionSecondaire") {
        if (!empty($_POST["nom"]) && !empty($_POST["mail"]) && !empty($_POST["mdp"]) && !empty($_POST["rmdp"])) {
            if ($_POST["mdp"] == $_POST["rmdp"]) {
                if (getDansTableUsers($db, "nom", $_POST["nom"]) == array()) { // on verifie que l'array est vide, permet de verifier que "nom" n'existe pas déja dans la table
                    insertDansTableUsers($db, "secondaire",$_SESSION["adresse"]);
                    $donneesUtilisateur = getDansTableUsers($db, "nom", $_POST["nom"]);

                    $_SESSION['message'] = "L'Utilisateur secondaire a bien été créer";
                    include("controller/espaceClient/modifierDonneesPerso.php");

                } else {
                    $messageErreur = "Ce mail ou nom est déja utilisé";
                    include("controller/espaceClient/inscription.php");
                }
            } else {
                $messageErreur = "Les mots de passe ne sont pas identiques";
                include("controller/espaceClient/inscription.php");

            }
        } else {
            $messageErreur = "Le/les champs est/sont vide(s)";
            include("controller/espaceClient/inscription.php");
        }
    }else {
        $messageErreur = "Les variables n'existe pas";
        include("controller/espaceClient/inscription.php");
    }
}