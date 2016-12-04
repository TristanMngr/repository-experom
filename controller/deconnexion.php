<?php
/**
 * Destruction de la session et redirection vers accueil
 */
unset($_SESSION);   //détruit la variable SESSION
session_destroy();  //détruit la session
include("vue/accueil/accueil.php");
