<?php
$titre = "connexion";
$header = headerPage();

ob_start();
?>
<section id="conteneur">
    <article id="inscription">
        <h1>Connexion</h1>
        <form method="post" action="index.php?cible=connexion">

            <div><label for="mail">Adresse e-mail</label><input type="text" name="mail" id="mail"></div>

            <div><label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp"></div>

            <div><label for="resterConnecter">Maintenir la session ouverte</label><input type="checkbox" name="resterConnecter" id="resterConnecter"></div>

            <div id="connexion"><input type="submit" name="connexion" value="connexion"></div>

        </form>
        <a href="index.php?cible=espaceclient">Créer ton compte Experom</a>
        <p><?php echo $messageErreur; ?></p>

    </article>
</section>
<?php
$section = ob_get_clean();

$footer = footer();

include("gabarit.php");
?>
