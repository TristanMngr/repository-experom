<?php
/**
 * redirection suivant la cible de l'url
 */

$messageErreur = null;
$message = null;
$utilisateurSecondaire = False;
/*
if (!isset($_GET["cible"])) {  // redirige vers la page cible de l'url
    include("vue/accueil/accueil.php");
} else {
    switch ($_GET["cible"]) {
        case "espace-client" & empty($_GET['target']):
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
        case "redirection-inscription":
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
        case "redirection-connexion":
            include("vue/espaceClient/connexion.php");
            break;
        case "connexion":
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
        case "espace-client" & isset($_GET['target']):
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
*/

/*if (!isset($_GET["cible"])) {  // redirige vers la page cible de l'url
    include("vue/accueil/accueil.php");
} else {
    if ($_GET['cible'] == 'espace-client' & empty($_GET['target'])) {
        if (!isset($_SESSION["userID"])) {
            include("vue/espaceClient/connexion.php");
        } else {
            if ($_SESSION["role"] == "Utilisateur principal") {
                include("vue/espaceClient/mesConfigurations.php");

            } else {
                include("vue/accueil/accueil.php");
            }
        }
    }
    else if($_GET['cible']=="redirection-inscription") {
        include("vue/espaceClient/inscription.php");
    }
    else if ($_GET['cible'] == "controllerInscription") {
        include("controller/espaceClient/inscription.php");
    }
    else if ($_GET["cible"]=="accueil" & empty($_GET['target'])) {
        include("vue/accueil/accueil.php");
        }
    else if ($_GET["cible"] == "deconnexion")  {
        include("deconnexion.php");
    }
    else if ($_GET['cible'] == "redirection-connexion") {
        include("vue/espaceClient/connexion.php");
    }
    else if ($_GET['cible'] == "connexion") {
        include("controller/espaceClient/connexion.php");
    }
    else if ($_GET["cible"] == 'espace-client' & $_GET['target']== 'ma-maison') {
        include('vue/espaceClient/maMaison.php');
    }
    else if ($_GET['target'] == "creer-un-mode" & $_GET['cible'] == "espace-client") {
        include("vue/espaceClient/creerUnMode.php");
    }
    else if  ($_GET['cible'] == "espaceclient-mesConfigurations") {
        include("vue/espaceClient/mesConfigurations.php");
    }
    else if ($_GET['cible'] == "espace-client" & $_GET['target'] == "modifier-donnees-perso") {
        include("vue/espaceClient/modifierDonneesPerso.php");
    }
    else if ($_GET['cible'] == "controllerModifierDonneesPerso") {
        include("controller/espaceClient/modifierDonneesPerso.php");
    }
    else if ($_GET['cible'] == "contact") {
        include("vue/contact/contact.php");
            }
    else if ($_GET['cible'] == "ajouterUnUtilisateur") {
        $utilisateurSecondaire = True;
        include("vue/espaceClient/inscription.php");
    }
    else if ($_GET['cible'] == "controllerInscriptionSecondaire") {
        $utilisateurSecondaire = True;
        include("controller/espaceClient/inscription.php");
    }*/

if (!isset($_GET["cible"])) {  // redirige vers la page cible de l'url
    include("vue/accueil/accueil.php");
}
else if ($_GET['cible'] == 'espace-client' & empty($_GET['target'])) {
    if (!isset($_SESSION["userID"])) {
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
    if ($_GET['target'] == 'ma-maison') {
        include('vue/espaceClient/maMaison.php');
    }
    else if ($_GET['target'] == 'creer-un-mode') {
        include("vue/espaceClient/creerUnMode.php");
    }
    else if ($_GET['target'] == 'mes-configurations') {
        include("vue/espaceClient/mesConfigurations.php");
    }


    /*donner perso*/

    else if ($_GET['target'] == 'modifier-donnees-perso') {
        if (empty($_GET['target2'])) {
            include("vue/espaceClient/modifierDonneesPerso.php");
        }
        else if ($_GET['target2'] == "ajouter-un-utilisateur") {
            $utilisateurSecondaire = True;
            include("vue/espaceClient/inscription.php");
        }
        else if ($_GET['target2'] == "ajouter-un-utilisateur-control") {
            $utilisateurSecondaire = True;
            include("controller/espaceClient/inscription.php");
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






















