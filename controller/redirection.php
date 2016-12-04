<?php
/**
 * redirection suivant la cible de l'url
 */

$messageErreur = null;
$message = null;

if (!isset($_GET["cible"])) {
    include("vue/accueil/accueil.php");
}
else if (isset($_GET["cible"])) {      //on redirige vers la page connexion si non connecté, sinon vers la page capteurs
    if ($_GET["cible"] == "espaceclient") {
        if (!isset($_SESSION["userID"]))
            include("vue/espaceClient/connexion.php");
        else {
            include("vue/espaceClient/mesConfigurations.php");
        }
    }
    else if ($_GET["cible"] == "inscriptionRedirige") {
        include("vue/espaceClient/inscription.php");
    }
    else if ($_GET["cible"] == "controllerInscription") {
        include("controller/inscription.php");
    }
    else if ($_GET["cible"] == "accueil") {
        include("vue/accueil/accueil.php");
    }
    else if ($_GET["cible"] == "deconnexion"){
        include("deconnexion.php");
    }
    else if ($_GET["cible"] == "connecterRedirige") {
        include("vue/espaceClient/connexion.php");
    }
    else if ($_GET["cible"] == "controllerConnexion") {
        include("controller/connexion.php");
    }
    else if ($_GET["cible"] == "espaceclient-creerUnMode") {
        include("vue/espaceClient/creerUnMode.php");
    }
    else if ($_GET["cible"] == "espaceclient-mesConfigurations") {
        include("vue/espaceClient/mesConfigurations.php");
    }
    else if ($_GET["cible"] == "espaceclient-modifierDonneesPerso") {
        include("vue/espaceClient/modifierDonneesPerso.php");
    }
    else if ($_GET["cible"] == "controllerModifierDonneesPerso") {
        include("controller/modifierDonneesPerso.php");
    }

}


