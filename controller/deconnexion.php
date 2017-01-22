<?php
/**
 * Destruction de la session et redirection vers accueil
 */

if (isset($_SESSION['role'])) {
    $role = null;

    if ($_SESSION['role'] == 'admin') {
        $role = 'admin';
    } else {
        $role = 'autre';
    }

    unset($_SESSION);   //détruit la variable SESSION
    session_destroy();  //détruit la session
    $messageGeneral = "Vous êtes bien déconnecté";
    if ($role != 'admin') {
        include("vue/accueil/accueil.php");
    } else {
        $isLogin = false;
        include("vue/back-office/connexion-BO.php");
    }
}
else {
    include("vue/accueil/accueil.php");
}