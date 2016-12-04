<?php
include("controller/pages.php");
$messageErreur = null;
$titre = "Mes configurations";
$header = headerPage();

$section = section("espaceClientMesConfigurations",$messageErreur);

$footer = footer();

include("gabarit.php");
?>









