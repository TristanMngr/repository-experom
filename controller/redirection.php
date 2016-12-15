<?php
/**
 * redirection suivant la cible de l'url
 */

$messageErreur = null;
$message = null;
$utilisateurSecondaire = False;



if (!isset($_GET["cible"])) {  // redirige vers la page cible de l'url
    include("vue/accueil/accueil.php");
}
else if ($_GET['cible'] == 'espace-client' & empty($_GET['target'])) {
    if (!isset($_SESSION["ID"])) {
        include("vue/espaceClient/connexion.php");
    } else {
        if ($_SESSION["role"] == "Utilisateur principal") {
            include("vue/espaceClient/mesConfigurations.php");

        } else {
            include("vue/accueil/accueil.php");
        }
    }
}


/*principaux*/

else if ($_GET['cible']== 'accueil') {
    include("vue/accueil/accueil.php");
}
else if ($_GET['cible'] == 'contact') {
    include("vue/contact/contact.php");
}
/*deconnexion*/


else if ($_GET["cible"] == "deconnexion-controller") {
    include("deconnexion.php");
}

/*espace-client*/

else if ($_GET['cible'] == 'espace-client') {

    /*ma maison*/

    if ($_GET['target'] == 'ma-maison') {
        if (empty($_GET['target2'])) {
            include('controller/espaceClient/maMaison.php');
        }
        if ($_GET['target2'] == 'ajouter' or $_GET['target2']== 'control' or $_GET['target2'] == 'creation'){
            include('controller/espaceClient/maMaison.php');
        }

    }


    /*creer un mode*/
    else if ($_GET['target'] == 'creer-un-mode') {
        include("vue/espaceClient/creerUnMode.php");
    }
    else if ($_GET['target'] == 'mes-configurations') {
        include("vue/espaceClient/mesConfigurations.php");
    }


    /*donner perso*/

    else if ($_GET['target'] == 'modifier-donnees-perso') {
        if (empty($_GET['target2'])) {
            include("controller/espaceClient/modifierDonneesPerso.php");
        }
        else if ($_GET['target2'] == "ajouter-un-utilisateur") {
            $utilisateurSecondaire = True;
            include("vue/espaceClient/inscription.php");
        }
        else if ($_GET['target2'] == "ajouter-un-utilisateur-control") {
            $utilisateurSecondaire = True;
            include("controller/espaceClient/modifierDonneesPerso.php");
        }
        else if ($_GET['target2'] == 'suppression') {
            include("controller/espaceClient/modifierDonneesPerso.php");
        }

    }
    else if ($_GET['target'] == "modifier-donnees-perso-control") {
        include("controller/espaceClient/modifierDonneesPerso.php");
    }




    /*inscription/connexion*/

    else if ($_GET['target'] == 'inscription-control') {
        include("controller/espaceClient/inscription.php");
    }
    else if ($_GET['target'] == 'connexion-control') {
        include("controller/espaceClient/connexion.php");
    }
    else if ($_GET['target'] == "redirection-connexion") {
        include("vue/espaceClient/connexion.php");
    }
    else if($_GET['target']=="redirection-inscription") {
        include("vue/espaceClient/inscription.php");
    }
}






















