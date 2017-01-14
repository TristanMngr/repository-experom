<?php
include("controller/capteurSelectV2.php");
include("controller/debug.php");

if ($_GET['target2'] == "ajouter-capteur") {
    include('controller/espaceClient/capteurs/addCapteur.php');
}
else {
    include('vue/espaceClient/capteurs.php');
}
