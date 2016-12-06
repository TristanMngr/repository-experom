<?php
/**
 * Destruction de la session et redirection vers accueil
 */
unset($_SESSION);   //détruit la variable SESSION
session_destroy();  //détruit la session
include("vue2/accueil/accueil.php");
