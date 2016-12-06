<?php
include("controller/pages.php");
$titre = "Creation d'un mode";
$header = headerPage();

$section = section("espaceClientCreerUnMode",$messageErreur, $utilisateurSecondaire);

$footer = footer();

include("gabarit.php");
?>



