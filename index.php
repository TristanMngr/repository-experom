<?php
session_start();
include("modele/connexionDB.php");
include("controller/variables.php");
include("modele/general.php");
/*include("modele/general.php");*/


/**
 * redirection suivant la cible de l'url
 */

$messageErreur = null;
$message = null;
$messageE = null;
$utilisateurSecondaire = False;


// TODO trame/titre maison/password gauche

/*if (isset($_GET['target']) & $_GET['target']=='popup') {
    include('vue/popUp/popup.html');
}*/


if (!isset($_GET["cible"])) {  // redirige vers la page cible de l'url
    include("vue/accueil/accueil.php");
}
else if ($_GET['cible'] == 'espace-client' & empty($_GET['target'])) {
    if (!isset($_SESSION["ID"])) {
        include("vue/espaceClient/connexion.php");
    }
    else {
        if ($_SESSION["role"] == "principal") {
            if (!isset($_SESSION['IDmaison'])) {
                include('vue/espaceClient/configMaison.php');
                // puet être ajouter redirection page accueil
            }
            else {
                include('controller/espaceClient/maison/index.php');
            }
        }
        else if ($_SESSION['role'] == "secondaire") {
            include('controller/espaceClient/maison/index.php');
        }
        else if ($_SESSION['role'] == 'admin') {
            include('vue/error.php');
        }
    }
}

// partie admin
else if ($_GET['cible'] == 'admin') {
    include('controller/back-office/index.php');

}

// mention légal/cgu/error
else if ($_GET['cible'] == 'mention-legal') {
    include('vue/mention-legal.php');
}
else if ($_GET['cible'] == 'cgu') {
    include('controller/cgu.php');
}
else if ($_GET['cible'] == 'error'){
    include('vue/error.php');
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
    include("controller/deconnexion.php");
}

/*espace-client*/

else if ($_GET['cible'] == 'espace-client') {
    /*ma maison*/

    if ($_GET['target'] == 'premiere-connexion') {
        include('controller/espaceClient/configMaison.php');
    }
     if ($_GET['target'] == 'ma-maison') {
        include('controller/espaceClient/maison/index.php');
    }

    /*creer un modes*/
    else if ($_GET['target'] == 'modes') {
        include('controller/espaceClient/modes/index.php');
    }


    /** ajouter un capteurs */


    else if ($_GET['target'] == 'capteurs') {
        if (isset($_SESSION['role'])){
            if ($_SESSION['role'] == "principal") {
                include('controller/espaceClient/capteurs/index.php');
            }
            else {
                include('vue/error.php');
            }
        }
        else {
                include('vue/error.php');

        }
    }



    /*donner perso*/

    else if ($_GET['target'] == 'modifier-donnees-perso') {
        if (isset($_SESSION['role'])){
            if ($_SESSION['role'] == "principal") {
                if (empty($_GET['target2'])) {
                    include("controller/espaceClient/modifierDonneesPerso.php");
                } else if ($_GET['target2'] == "ajouter-un-utilisateur") {
                    $utilisateurSecondaire = True;
                    include("vue/espaceClient/inscription.php");
                } else if ($_GET['target2'] == "ajouter-un-utilisateur-control") {
                    $utilisateurSecondaire = True;
                    include("controller/espaceClient/modifierDonneesPerso.php");
                } else if ($_GET['target2'] == 'suppression') {
                    include("controller/espaceClient/modifierDonneesPerso.php");
                }
            }
            else {
                include('vue/error.php');
            }
        }else {
            include('vue/error.php');

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



?>
