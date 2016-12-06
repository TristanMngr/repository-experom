<?php
/**
 * redirection suivant la cible de l'url
 */

$messageErreur = null;
$message = null;
$utilisateurSecondaire = False;

if (!isset($_GET["cible"])) {  // redirige vers la page cible de l'url
    include("vue2/accueil/accueil.php");
} else {
    switch ($_GET["cible"]) {
        case "espaceclient":
            if (!isset($_SESSION["userID"])) {
                include("vue2/espaceClient/connexion.php");
            } else {
                include("vue2/espaceClient/mesConfigurations.php");
            }
            break;
        case "inscriptionRedirige":
            include("vue2/espaceClient/inscription.php");
            break;
        case "controllerInscription":
            include("controller/inscription.php");
            break;
        case "accueil":
            include("vue2/accueil/accueil.php");
            break;
        case "deconnexion":
            include("deconnexion.php");
            break;
        case "connecterRedirige":
            include("vue2/espaceClient/connexion.php");
            break;
        case "controllerConnexion":
            include("controller/connexion.php");
            break;
        case "espaceclient-creerUnMode";
            include("vue2/espaceClient/creerUnMode.php");
            break;
        case "espaceclient-mesConfigurations":
            include("vue2/espaceClient/mesConfigurations.php");
            break;
        case "espaceclient-modifierDonneesPerso":
            include("vue2/espaceClient/modifierDonneesPerso.php");
            break;
        case "controllerModifierDonneesPerso":
            include("controller/modifierDonneesPerso.php");
            break;
        case "contact":
            include("vue2/contact/contact.php");
            break;
        case "ajouterUnUtilisateur":
            $utilisateurSecondaire = True;
            include("vue2/espaceClient/inscription.php");
            break;
        case "controllerInscriptionSecondaire":
            $utilisateurSecondaire = True;
            include("controller/inscription.php");
            break;g
    }

}




