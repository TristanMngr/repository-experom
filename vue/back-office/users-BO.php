<?php
include("vue/back-office/header.php");
include("vue/back-office/footer.php");
$titre = "accueil-admin";

ob_start();
?>

    <section id="user-BO">
        <div id="inputUser">
            <label for="pseudo">pseudo</label><input type="input" name="pseudo" placeholder="pseudo utilisateur">
        </div>
        <div id="chooseUser"></div>
    </section>


<?php
$section = ob_get_clean();

include("gabarit.php");