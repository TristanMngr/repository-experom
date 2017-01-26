<?php
include("vue/back-office/header.php");
include("vue/back-office/footer.php");
$titre = "accueil-admin";

ob_start();
?>

<section id="user-BO">
    <div id="posChooseUser">
        <div id="chooseUser">
            <label for="pseudo">Pseudo</label><input type="input" name="pseudo" autofocus placeholder="pseudo utilisateur" oninput="ajaxGetUsers(this)">
            <hr>
            <ul id="listUsers">

            </ul>
        </div>
        <div>salut</div>
    </div>
    <div id="posMaison-BO">
        <div id="maison-BO">

        </div>
    </div>
</section>


<?php
$section = ob_get_clean();

include("gabarit.php");