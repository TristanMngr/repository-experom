<?php

/**
 * AJAX
 * modification des données personnels BO
 */

if (!empty($_GET['target2'])) {
    $tableau = array('typeDeRequete' => 'select', 'table' => 'users', 'param' => array('pseudo' => $_GET['target2']));

    $arrayUser = requeteDansTable($db, $tableau);

    $idMaison = $arrayUser[0]['IDmaison'];

    function noEmtpyEq($var1, $var2)
    {
        if (!empty($var1) & !empty($var2)) {
            if ($var1 != $var2) {
                return true;
            }
        }
    }


// TODO sécurité specialChar
    $messageError = "";
    $messageSuccess = "";
    $dataUser = array("nom" => $arrayUser[0]['nom'], "mail" => $arrayUser[0]['mail'], 'numero' => $arrayUser[0]['numero'], 'mdp' => $arrayUser[0]['mdp']);
    $dataInput = array("nom" => $_POST['modifierNom'], "mail" => $_POST['modifierMail'], 'numero' => $_POST['modifierNumero'], 'mdp' => $_POST['modifierMdp']);


    if (isset($_POST['modifierMail']) & isset($_POST['modifierNom']) & isset($_POST['modifierNumero']) & isset($_POST['modifierMdp'])) {
        if (noEmtpyEq($dataInput['nom'], $dataUser['nom'])) {
            $tableau = array('typeDeRequete' => 'select', 'table' => 'users', 'param' => array('nom' => $dataInput['nom']));
            if (requeteDansTable($db, $tableau) == array()) {
                $tableau = array('typeDeRequete' => 'update', 'table' => 'users', 'setValeur' => 'nom', 'champ' => 'IDmaison', 'param' => array('setValeur' => $dataInput['nom'], 'champ' => $idMaison));
                requeteDansTable($db, $tableau);
                $messageSuccess .= "Le nom a bien été modifié </br>";
            } else {
                $messageError .= "Ce nom existe déja</br>";
            }
        }
        if (noEmtpyEq($dataInput['mail'], $dataUser['mail'])) {
            $tableau = array('typeDeRequete' => 'select', 'table' => 'users', 'param' => array('mail' => $dataInput['mail']));
            if (requeteDansTable($db, $tableau) == array()) {
                if (filter_var($dataInput['mail'], FILTER_VALIDATE_EMAIL)) {
                    // TODO faire un deuxieme and pour cibler sur le pseudo
                    $tableau = array('typeDeRequete' => 'update', 'table' => 'users', 'setValeur' => 'mail', 'champ' => 'mail', 'param' => array('setValeur' => $dataInput['mail'], 'champ' => $dataUser['mail']));
                    requeteDansTable($db, $tableau);
                    $messageSuccess .= "Le mail a bien été modifié </br>";
                } else {
                    $messageError .= "Le mail n'est pas valide </br>";
                }
            } else {
                $messageError .= "Ce mail existe déja </br>";
            }
        }
        if (noEmtpyEq($dataInput['numero'], $dataUser['numero'])) {
            $tableau = array('typeDeRequete' => 'select', 'table' => 'users', 'param' => array('numero' => $dataInput['numero']));
            if (requeteDansTable($db, $tableau) == array()) {
                if (preg_match("#^0[1-68]([ .-]?[0-9]{2}){4}$#", $_POST['modifierNumero'])) {
                    $tableau = array('typeDeRequete' => 'update', 'table' => 'users', 'setValeur' => 'numero', 'champ' => 'numero', 'param' => array('setValeur' => $dataInput['numero'], 'champ' => $dataUser['numero']));
                    requeteDansTable($db, $tableau);
                    $messageSuccess .= "Le numero a bien été modifié </br>";
                } else {
                    $messageError .= "Le numero n'est pas valide </br>";
                }
            } else {
                $messageError .= "Ce numéro existe déja </br>";
            }
        }
        if (!empty($_POST['modifierMdp'])) {
            $mdpCrypt = "cocos_" . md5($_POST['modifierMdp']);
            $tableau = array('typeDeRequete' => 'update', 'table' => 'users', 'setValeur' => 'mdp', 'champ' => 'pseudo', 'param' => array('setValeur' => $mdpCrypt, 'champ' => $_GET['target2']));
            requeteDansTable($db, $tableau);
            $messageSuccess .= "Le mot de passe a bien été modifié </br>";
        }
    }
}
include('vue/back-office/users-BO.php');






?>