<?php
include("vue/header.php");
include("vue/footer.php");
$titre = "admin_page1";
ob_start();
?>

<section id="admin_page1" xmlns="http://www.w3.org/1999/html">

<action="#">
    Nom de l'utilisateur : <br/> <input  type ="text" name = "utilisateurs" value="">
    <input  type="radio" name="supprimer" value=""> Supprimer l'utilisateur <br/>

    <input type="radio" name="selectionner" value =""> Afficher les données de l'utilisateur<br/>


    <input type="submit" value="Envoyer">

</section>








<?php
$section = ob_get_clean();
include('gabarit.php');
?>