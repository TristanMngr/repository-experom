<?php
include("vue/header.php");
include("vue/footer.php");
$titre = "ajouter un capteurs";

ob_start();
?>

<section>
<div id="BO-accueil">
    <h1>Connexion admin</h1>
    <form method="post" action="/espace-client/connexion-control">

        <div><label for="pseudo">Pseudo</label><input type="text" name="pseudo" id="pseudo" autofocus></div>

        <div><label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp"></div>


        <div id="connexion" class="leftInscription"><input class="submit" type="submit" name="connexion" value="Connexion"></div>

    </form>
    <?php if (isset($messageError)) { ?>
        <div class="messageError"><?php echo $messageError; ?></div>
    <?php } if (isset($messageSuccess)) { ?>
        <div class="messageError"><?php echo $messageSuccess; ?></div>
    <?php } ?>

</div>
</section>


<?php
$section = ob_get_clean();

include("gabarit.php");
