<?php
/**
 * redirection suivant la cible de l'url
 */

$messageErreur = null;
$message = null;
$utilisateurSecondaire = False;
$display = False;

if (!isset($_GET["cible"])) {  // redirige vers la page cible de l'url
    include("controller/accueil/accueil.php");
} else {
    switch ($_GET["cible"]) {
        case "espaceclient":
            if (!isset($_SESSION["userID"])) {
                include("controller/espaceClient/connexion.php");
            } else {
                include("controller/espaceClient/mesConfigurations.php");
            }
            break;
        case "inscriptionRedirige":
            include("controller/espaceClient/inscription.php");
            break;
        case "controllerInscription":
            include("controller/espaceClient/inscription.php");
            break;
        case "accueil":
            include("controller/accueil/accueil.php");
            break;
        case "deconnexion":
            include("deconnexion.php");
            break;
        case "connecterRedirige":
            include("controller/espaceClient/connexion.php");
            break;
        case "controllerConnexion":
            include("controller/espaceClient/connexion.php");
            break;
        case "espaceclient-creerUnMode";
            include("controller/espaceClient/creerUnMode.php");
            break;
        case "espaceclient-mesConfigurations":
            include("controller/espaceClient/mesConfigurations.php");
            break;
        case "espaceclient-modifierDonneesPerso":
            include("controller/espaceClient/modifierDonneesPerso.php");
            break;
        case "controllerModifierDonneesPerso":
            include("controller/espaceClient/modifierDonneesPerso.php");
            break;
        case "contact":
            include("controller/espaceClient/contact.php");
            break;
        case "ajouterUnUtilisateur":
            $utilisateurSecondaire = True;
            include("controller/espaceClient/inscription.php");
            break;
        case "controllerInscriptionSecondaire":
            $utilisateurSecondaire = True;
            include("controller/espaceClient/inscription.php");
            break;
    }

}




