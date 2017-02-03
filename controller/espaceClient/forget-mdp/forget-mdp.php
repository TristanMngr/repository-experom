<?php

/**
 * Oublie de mot de passe
 * génération d'un numéro
 * envoie du numéro par mail
 */

if (isset($_POST['mail']) &isset($_POST['pseudo']) & !empty($_POST['mail']) & !empty($_POST['pseudo'])) {
    // on verifie que l'adresse est valide
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $tableau = array('typeDeRequete' => 'select', 'table' => 'users', 'param' => array('mail' => $_POST['mail']));
        // on verifie que le mail envoyé est bien existant dans la base de donnée
        if (requeteDansTable($db, $tableau) != array()) {
            // on créér un code
            $user_code = "";
            for ($num = 0; $num < 10; $num++) {
                $user_code .= mt_rand(0, 9);
            }

            $tableau = array('typeDeRequete' => 'select', 'table' => 'oublie_mdp', 'param' => array('mail' => $mail,'pseudo'=>$pseudo));
            // si le mail n'existe pas déja dans la table alors on insert les données : mdp et mail, sinon on update
            if (requeteDansTable($db, $tableau) == array()) {
                $tableau = array('typeDeRequete' => 'insert', 'table' => 'oublie_mdp', 'param' => array('mail' => $mail,'pseudo'=>$pseudo, 'code' => $user_code));
                requeteDansTable($db, $tableau);
            } else {
                $tableau = array('code'=>$user_code,'mail'=>$mail, 'pseudo'=>$pseudo);
                updateForgetMdp($db,$tableau);
            }
            // envoie du mail à l'utilisateur
            /*mail($_POST['mail'], 'changer de mot de passe', 'Voici le code de validation :' . $user_code);*/
            include("vue/espaceClient/format-mail.php");
            mail($mail, "changement de mot de passe", $message, $header);
            $messageSuccess = "Entre le code que nous t'avons envoyé par mail";

            // veriable qui permet de charger le bon morceau de page.
            $send_mail = true;
        } else {
            $messageError = "Désolé cette adresse mail n'existe pas dans notre base de donnée";
        }
    } else {
        $messageError = "Ce n'est pas une addresse mail";
    }
} else {
    $messageError = "Vous n'avez pas remplie tout les champs";
}


include('vue/espaceClient/forget-mdp.php');