<?php



/**
 * verification du formulaire de connexion
 */

include("modele/general.php");

if (isset($_POST["pseudo"]) and isset($_POST["mdp"])) { //existance des variable
    if (!empty($_POST["pseudo"]) && !empty($_POST["mdp"])) { //sont vide?

        $tableau = array(
            'typeDeRequete'=> 'select',
            'table' => 'users',
            'param'=> array('pseudo'=>$_POST['pseudo']));

        $donneesUtilisateur = requeteDansTable($db,$tableau);

        $motDePasseCrypter = md5($_POST['mdp']);
        /*$donneesUtilisateur = getDansTableUsers($db, "mail", $_POST["mail"]);//fonction du modele general.php*/
        if (isset($donneesUtilisateur[0]['mdp'])) {
            if ($donneesUtilisateur[0]["mdp"] == 'cocos_' . $motDePasseCrypter) { //verif de mot de passe(table et envoyé)

                variablesSession($db, 'pseudo', $_POST['pseudo']);  //fonction qui déclare les variables de sessions (modele/users)
                $_SESSION['message'] = "Tu es bien connecté";
                if ($_SESSION["role"] == "principal") {
                    if (isset($_SESSION['IDmaison'])) {

                        include("vue/accueil/accueil.php");
                    }
                    else {
                        include('vue/espaceClient/configMaison.php');
                    }
                } else if ($_SESSION["role"] == "secondaire") {
                    if (isset($_SESSION['IDmaison'])) {

                        include("vue/accueil/accueil.php");
                    }
                    else {
                        include('vue/espaceClient/configMaison.php');
                    }
                }


            } else {
                $messageError = "Le mail ou le mot de passe est incorrect";
                include("vue/espaceClient/connexion.php");
            }
        }else {
            $messageError = "Ce compte n'existe pas";
            include("vue/espaceClient/connexion.php");
        }
    } else {
        $messageError = "Le ou les Champs sont vides";
        include("vue/espaceClient/connexion.php");
    }
}



?>
