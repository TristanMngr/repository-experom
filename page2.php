<?php
include("vue/header.php");
include("vue/footer.php");
$titre = "admin_page2";
ob_start();
?>

    <section id="admin_page2" xmlns="http://www.w3.org/1999/html">

        <action="#">
        Nom de l'utilisateur : <br/> <input  type ="text" name = "utilisateurs" value="">
        Modifier les permissions<br/> <input type=""text"  name ="modifier_permission" value="" >



        <input type="submit" value="Envoyer">

    </section>








<?php
$section = ob_get_clean();
include('gabarit.php');
?>