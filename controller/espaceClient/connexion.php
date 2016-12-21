<?php



/**
 * verification du formulaire de connexion
 */

include("modele/users.php");

if (isset($_POST["pseudo"]) and isset($_POST["mdp"])) { //existance des variable
    if (!empty($_POST["pseudo"]) && !empty($_POST["mdp"])) { //sont vide?

        $tableau = array(
            'typeDeRequete'=> 'select',
            'table' => 'users',
            'param'=> array('pseudo'=>$_POST['pseudo']));

        $donneesUtilisateur = requeteDansTable($db,$tableau);

        $motDePasseCrypter = md5($_POST['mdp']);
        /*$donneesUtilisateur = getDansTableUsers($db, "mail", $_POST["mail"]);//fonction du modele users.php*/
        if ($donneesUtilisateur[0]["mdp"] == 'cocos_'.$motDePasseCrypter) { //verif de mot de passe(table et envoyé)

            variablesSession($db, 'pseudo', $_POST['pseudo']);  //fonction qui déclare les variables de sessions (modele/users)
            $_SESSION['message'] = "Tu es bien connecté";
            if ($_SESSION["role"] == "Utilisateur principal") {

                include("vue/espaceClient/mesConfigurations.php");
            }
            else if ($_SESSION["role"] == "Utilisateur secondaire") {

                include("vue/accueil/accueil.php");
            }

        } else {
            $messageErreur = "Le mail ou le mot de passe est incorrect";
            include("vue/espaceClient/connexion.php");
        }
    } else {
        $messageErreur = "Le ou les Champs sont vides";
        include("vue/espaceClient/connexion.php");
    }
}



?>
