<?php
include("vue/header.php");
include("vue/footer.php");
$titre = "connexion";

ob_start();
?>
<section id="conteneur">
    <article id="inscription">
        <h1>Connexion</h1>
        <form method="post" action="index.php?cible=controllerConnexion">

            <div><label for="mail">Adresse e-mail</label><input type="text" name="mail" id="mail"></div>

            <div><label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp"></div>

            <div><label for="resterConnecter">Maintenir la session ouverte</label><input type="checkbox"
                                                                                         name="resterConnecter"
                                                                                         id="resterConnecter">
            </div>

            <div id="connexion"><input type="submit" name="connexion" value="connexion"></div>

        </form>
        <a href="index.php?cible=inscriptionRedirige">Créer ton compte Experom</a>
        <div class="message"><?php echo $messageErreur; ?></div>

    </article>
</section>
<?php
$section = ob_get_clean();

include("gabarit.php");
