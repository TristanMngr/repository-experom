<?php

/**
 * connexion Back-office
 */

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

                $_SESSION['role'] = $donneesUtilisateur[0]['role'];  //fonction qui déclare les variables de sessions (modele/users)

                if ($_SESSION["role"] == "admin") {
                    $messageGeneral = "Tu es bien connecté";
                    $_SESSION['ID'] = $donneesUtilisateur[0]['ID'];
                    $isLogin = true;
                    include("vue/back-office/users-BO.php");
                }
                else {
                    $messageError = "Désolé tu n'es pas admin";
                    $isLogin = false;
                    include('vue/back-office/connexion-BO.php');
                }


            } else {
                $messageError = "Le pseudo ou le mot de passe est incorrect";
                $isLogin = false;
                include('vue/back-office/connexion-BO.php');
            }
        }else {
            $messageError = "Ce compte n'existe pas";
            $isLogin = false;
            include('vue/back-office/connexion-BO.php');
        }
    } else {
        $messageError = "Le ou les champs sont vides";
        $isLogin = false;
        include('vue/back-office/connexion-BO.php');
    }
}
