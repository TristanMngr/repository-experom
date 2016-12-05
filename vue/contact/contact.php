<?php
include("controller/pages.php");
$titre = "Contacts";
$header = headerPage();

$section = section("contact",$messageErreur);

$footer = footer();

include("gabarit.php");
?>