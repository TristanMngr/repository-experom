<?php
include("controller/pages.php");
$messageErreur = null;
$titre = "Creation d'un mode";
$header = headerPage();

$section = section("espaceClientCreerUnMode",$messageErreur);

$footer = footer();

include("gabarit.php");
?>



