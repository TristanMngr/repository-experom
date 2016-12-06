<?php
include("controller/pages.php");

$titre = "Inscription";
$header = headerPage();

$section = section("espaceClientInscription",$messageErreur, $utilisateurSecondaire);

$footer = footer();

include("gabarit.php");
?>






