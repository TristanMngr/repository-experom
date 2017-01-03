<?php
/**
 * Destruction de la session et redirection vers accueil
 */
unset($_SESSION);   //détruit la variable SESSION
session_destroy();  //détruit la session
$messageGeneral = "Vous êtes bien déconnecté";
include("vue/accueil/accueil.php");
