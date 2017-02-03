<?php

/**
 * changer de mot de passe
 * après avoir reçue le code
 */

$send_mail = true;


if (isset($_POST['code']) & isset($_POST['mdp']) & isset($_POST['rmdp'])) {
    if (!empty($_POST['code']) & !empty($_POST['mdp']) & !empty($_POST['rmdp'])) {
        $tableau = array('typeDeRequete'=>'select', 'table'=>'oublie_mdp', 'param'=>array('code'=>$_POST['code']));
        // on récupere l'adresse mail du compte correspondant au code, si il existe
        if (requeteDansTable($db,$tableau) != array()) {
            $user_mail = requeteDansTable($db,$tableau)[0]['mail'];
            $user_pseudo = requeteDansTable($db,$tableau)[0]['pseudo'];
            if ($_POST['mdp'] == $_POST['rmdp']) {
                $mdp = htmlspecialchars($_POST['mdp']);
                $mdp_crypte = 'cocos_'.md5($mdp);
                $tableau = array('mdp'=>$mdp_crypte,'mail'=>$user_mail, 'pseudo'=>$user_pseudo);
                updateTableUsers($db,$tableau);
                $messageSuccess = "Votre mot de passe à bien été modifié";
                include('vue/espaceClient/connexion.php');

            }
            else {
                $messageError = "Les mots de passe ne correspondent pas";
            }
        }
        else {
            $messageError = "Désolé ce code n'existe pas";
        }


    }
    else {
        $messageError = "Désolé tout les champs ne sont pas remplies";
    }
}




include('vue/espaceClient/forget-mdp.php');
?>