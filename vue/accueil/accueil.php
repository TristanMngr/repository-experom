<?php
include("controller/pages.php");
$messageErreur = null;
$titre = "accueil";
$header = headerPage();

$section = section("accueil",$messageErreur);

$footer = footer();

include("gabarit.php");
?>




