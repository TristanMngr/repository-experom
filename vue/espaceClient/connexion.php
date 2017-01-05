<?php
include("vue/header.php");
include("vue/footer.php");
$titre = "connexion";

ob_start();
?>
<section id="conteneur">
    <article id="inscription">
        <h1>Connexion</h1>
        <form method="post" action="/espace-client/connexion-control">

            <div><label for="pseudo">Pseudo</label><input type="text" name="pseudo" id="pseudo" autofocus></div>

            <div><label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp"></div>

            <div class="leftInscription"><label for="resterConnecter">Maintenir la session ouverte</label><input type="checkbox"
                                                                                         name="resterConnecter"
                                                                                         id="resterConnecter">
            </div>

            <div id="connexion" class="leftInscription"><input class="submit" type="submit" name="connexion" value="Connexion"></div>

        </form>
        <a href="/espace-client/redirection-inscription">Créer ton compte Experom</a>
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
