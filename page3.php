<?php
include("vue/header.php");
include("vue/footer.php");
$titre = "admin_page3";
ob_start();
?>

    <section id="admin_page3" xmlns="http://www.w3.org/1999/html">

        <action="#">
        Nom de la maison : <br/> <input  type ="text" name = "utilisateurs" value="">
        Modifier la clé : <br/> <input type="text" name="modifier_clé" value="">



        <input type="submit" value="Envoyer">

    </section>








<?php
$section = ob_get_clean();
include('gabarit.php');
?>