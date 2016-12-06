<?php
include("controller/pages.php");
$messageErreur = null;
$titre = "Mes configurations";
$header = headerPage();

$section = section("espaceClientMesConfigurations",$messageErreur, $utilisateurSecondaire);

$footer = footer();

include("gabarit.php");
?>









