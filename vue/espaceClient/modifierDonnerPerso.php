<?php
include("controller/pages.php");

$messageErreur = null;

$titre = "modifier mes capteurs";
$header = headerPage();

$section = section("espaceClientModifierDonneesPerso",$messageErreur);

$footer = footer();

include("gabarit.php");
?>






