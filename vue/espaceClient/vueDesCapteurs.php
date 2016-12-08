<?php
include("vue/header.php");
include("vue/footer.php");
ob_start();
$titre = "donnée perso";
?>

<?php
$section = ob_get_clean();
include("gabarit.php");




