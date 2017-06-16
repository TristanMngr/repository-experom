<?php
include("vue/back-office/header.php");
include("vue/back-office/footer.php");
$titre = "accueil-admin";

ob_start();
?>

<section id="user-BO">
    <div id="posChooseUser">
        <div id="chooseUser" class="theme">
            <label for="pseudo">Pseudo</label><input type="input" name="pseudo" autofocus placeholder="pseudo utilisateur" oninput="ajaxGetUsers(this)">
            <hr>
            <ul id="listUsers">

            </ul>
        </div>

    </div>
    <div id="posMaison-BO" class="theme">
        <div id="error">
            <?php if (isset($messageSuccess)) {
             if ($messageSuccess != "") { ?>
                <div class="messageSuccess BO"><?php echo $messageSuccess; ?></div>
            <?php }} ?>
            <?php if (isset($messageError)) {

              if ($messageError != "") { ?>
                <div class="messageError BO"><?php echo $messageError; ?></div>
            <?php }} ?>
        </div>
        <div id="maison-BO">
        </div>
        <div id="posEdit-BO">


        </div>
    </div>

</section>


<?php
$section = ob_get_clean();

include("gabarit.php");