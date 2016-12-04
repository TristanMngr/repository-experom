<?php
/**
 * redirection suivant la variable de l'url
 */

$messageErreur = null;

if (!isset($_GET["cible"])) {
    include("vue/accueil/accueil.php");
}
else if (isset($_GET["cible"])) {
    if ($_GET["cible"] == "espaceclient") {
        include("vue/espaceClient/connexion.php");
    }
    else if ($_GET["cible"] == "inscriptionRedirige") {
        include("vue/espaceClient/inscription.php");
    }
    else if ($_GET["cible"] == "inscription") {
        include("controller/inscription.php");
    }
    else if ($_GET["cible"] == "accueil") {
        include("vue/accueil/accueil.php");
    }
    else if ($_GET["cible"] == "deconnexion"){
        include("deconnexion.php");
    }
    else if ($_GET["cible"] == "ceConnecter") {
        include("vue/espaceClient/connexion.php");
    }
    else if ($_GET["cible"] == "connexion") {
        include("controller/connexion.php");
    }
    else if ($_GET["cible"] == "espaceclient-creerUnMode") {
        include("vue/espaceClient/creerUnMode.php");
    }
    else if ($_GET["cible"] == "espaceclient-mesConfigurations") {
        include("vue/espaceClient/mesConfigurations.php");
    }
    else if ($_GET["cible"] == "espaceclient-modifierDonneesPerso") {
        include("vue/espaceClient/modifierDonnerPerso.php");
    }

}


