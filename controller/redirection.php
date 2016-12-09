<?php
/**
 * redirection suivant la cible de l'url
 */

$messageErreur = null;
$message = null;
$utilisateurSecondaire = False;

if (!isset($_GET["cible"])) {  // redirige vers la page cible de l'url
    include("vue/accueil/accueil.php");
} else {
    switch ($_GET["cible"]) {
        case "espaceclient":
            if (!isset($_SESSION["userID"])) {
                include("vue/espaceClient/connexion.php");
            } else {
                if ($_SESSION["role"]=="Utilisateur principal") {
                include("vue/espaceClient/mesConfigurations.php");

                }
                else {
                    include("vue/accueil/accueil.php");
                }
            }
            break;
        case "inscriptionRedirige":
            include("vue/espaceClient/inscription.php");
            break;
        case "controllerInscription":
            include("controller/espaceClient/inscription.php");
            break;
        case "accueil":
            include("vue/accueil/accueil.php");
            break;
        case "deconnexion":
            include("deconnexion.php");
            break;
        case "connecterRedirige":
            include("vue/espaceClient/connexion.php");
            break;
        case "controllerConnexion":
            include("controller/espaceClient/connexion.php");
            break;
        case "espaceclient-maMaison":
            include('vue/espaceClient/maMaison.php');
            break;
        case "espaceclient-creerUnMode";
            include("vue/espaceClient/creerUnMode.php");
            break;
        case "espaceclient-mesConfigurations":
            include("vue/espaceClient/mesConfigurations.php");
            break;
        case "espaceclient-modifierDonneesPerso":
            include("vue/espaceClient/modifierDonneesPerso.php");
            break;
        case "controllerModifierDonneesPerso":
            include("controller/espaceClient/modifierDonneesPerso.php");
            break;
        case "contact":
            include("vue/contact/contact.php");
            break;
        case "ajouterUnUtilisateur":
            $utilisateurSecondaire = True;
            include("vue/espaceClient/inscription.php");
            break;
        case "controllerInscriptionSecondaire":
            $utilisateurSecondaire = True;
            include("controller/espaceClient/inscription.php");
            break;
    }

}



