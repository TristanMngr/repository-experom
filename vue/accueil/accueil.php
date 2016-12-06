<?php
include("controller/pages.php");
$titre = "accueil";
$header = headerPage();

$section = section("accueil",$messageErreur,$utilisateurSecondaire);

$footer = footer();

include("gabarit.php");
?>




