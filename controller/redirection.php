<?php

/*test l'url et amène a la page indiqué par l'url*/


/*if (isset($_SESSION["userID"])) {
    include("vue/accueil/accueil");
}*/


if (!isset($_GET["cible"])) {
    include("vue/accueil/accueil.php");
}
else if (isset($_GET["cible"])) {
    if ($_GET["cible"] == "espaceclient") {
        $messageErreur = null;
        include("vue/espaceClient/inscription.php");
    }
    else if ($_GET["cible"] == "inscription") {
        include("controller/inscription.php");
    }
    else if ($_GET["cible"] == "accueil") {
        include("vue/accueil/accueil.php");
    }
    else if ($_GET["cible"] == "deconnexion"){  //ne marche pas encore
        include("deconnexion.php");
    }
    else if ($_GET["cible"] == "ceConnecter") {
        include("vue/espaceClient/connexion.php");
    }
    else if ($_GET["cible"] == "connexion") {
        include("controller/connexion.php");
    }

}


?>