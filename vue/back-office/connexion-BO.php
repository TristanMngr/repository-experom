<?php
include("vue/back-office/header.php");
include("vue/back-office/footer.php");
$titre = "page-Admin";

ob_start();
?>

<section id="conteneur">
    <article id="connexion" class="theme">
        <h1>Connexion administrateur</h1>
        <form method="post" action="/admin/connexion-control">

            <div><label for="pseudo">Pseudo</label><input type="text" name="pseudo" id="pseudo" class="input" autofocus></div>

            <div><label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp" class="input"></div>


            <div id="connexion" class="leftInscription"><input class="submit" type="submit" name="connexion" class="input" value="Connexion"></div>

        </form>
        <?php if (isset($messageError)) { ?>
            <div class="messageError"><?php echo $messageError; ?></div>
        <?php } if (isset($messageSuccess)) { ?>
            <div class="messageError"><?php echo $messageSuccess; ?></div>
        <?php } ?>

    </article>
</section>


<?php
$section = ob_get_clean();

include("gabarit.php");
