<?php



$titre = "modifier mes capteurs";

/**
 * modifier ses données perso
 *
 * On creer un tableau vide
 * On verifie que les variables envoyés par l'utilisateurs existe et qu'elles ne sont pas vides
 * Dans ce cas on ajoute a la clef, la variables envoyé par l'utilisateur
 * Et on change les variables de sessions
 * On boucle sur la fonction updateDansTableUsers (modele/users.php)
 */

include("modele/users.php");

$tableauUtilisateurs = array();

if ($_GET["cible"] == "controllerModifierDonneesPerso") {

    if (isset($_POST['modifierMail']) && !empty($_POST['modifierMail'])) {
        if (getDansTableUsers($db, 'mail', $_POST['modifierMail']) == array()) {
            $tableauUtilisateurs['mail'] = $_POST['modifierMail'];
            $_SESSION["mail"] = $_POST['modifierMail'];
        } else {
            $messageErreur = "Ce mail est déja utilisé";
        }
    }
    if (isset($_POST['modifierMdp']) && !empty($_POST['modifierMdp'])) {
        $tableauUtilisateurs['mdp'] = $_POST['modifierMdp'];
        $_SESSION["mdp"] = $_POST['modifierMdp'];

    }
    if (isset($_POST['modifierAdresse']) && !empty($_POST['modifierAdresse'])) {
        if (getDansTableUsers($db, 'adresse', $_POST['modifierAdresse']) == array()) {
            $tableauUtilisateurs['adresse'] = $_POST['modifierAdresse'];
            $_SESSION['adresse'] = $_POST['modifierAdresse'];
        } else {
            if ($messageErreur != "") {
                $messageErreur .= ", ";
            }
            $messageErreur .= " L'adresse est déja utilisé";
        }
    }
    if ($messageErreur == "") {
        $messageErreur = "Vos données ont été modifiés";
        foreach ($tableauUtilisateurs as $set => $setChange) {
            updateDansTableUsers($db, $set, $_SESSION['userID'], $setChange);
        }
    }
}



include("vue/header.php");
include("vue/espaceClient/modifierDonneesPerso.php");
include("vue/footer.php");

include("gabarit.php");
?>






