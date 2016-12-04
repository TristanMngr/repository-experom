<?php
include("controller/pages.php");

$titre = "connexion";
$header = headerPage();

$section = section("espaceClientConnexion",$messageErreur);

$footer = footer();

include("gabarit.php");
?>
