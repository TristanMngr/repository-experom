<?php
include("controller/pages.php");


$titre = "modifier mes capteurs";
$header = headerPage();

$section = section("espaceClientModifierDonneesPerso",$messageErreur, $utilisateurSecondaire);

$footer = footer();

include("gabarit.php");
?>






