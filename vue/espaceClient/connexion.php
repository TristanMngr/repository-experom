<?php
include("vue/header.php");
include("vue/footer.php");
$titre = "connexion";

ob_start();
?>
<section id="conteneur">
    <article id="connexion" class="theme">
        <h1 class="titre">Connexion</h1>
        <form method="post" id="connexion" action="/espace-client/connexion-control">

            <div><label for="pseudo">Pseudo</label><input type="text" name="pseudo" id="pseudo" class="input" autofocus></div>

            <div><label for="mdp">Mot de passe</label><input type="password" class="input" name="mdp" id="mdp"></div>

            <!--<div><label for="resterConnecter">Maintenir la session ouverte</label><input type="checkbox" name="resterConnecter" id="resterConnecter"></div>-->

            <div id="connexion" class="leftInscription"><input class="submit" type="submit" name="connexion" value="Connexion"></div>
            <div id="div-forget-mdp"><a href="/espace-client/oublie-mdp" id="forget-mdp">J'ai oublié mon mot de passe</a></div>

        </form>
        <a href="/espace-client/redirection-inscription">Créer un compte Experom</a>
        <?php if (isset($messageError)) { ?>
            <div class="messageError"><?php echo $messageError; ?></div>
        <?php } if (isset($messageSuccess)) { ?>
            <div class="messageSuccess"><?php echo $messageSuccess; ?></div>
        <?php } ?>

    </article>
</section>
<?php
$section = ob_get_clean();

include("gabarit.php");
