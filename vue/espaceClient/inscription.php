<?php
$titre = "Inscription";
$header = headerPage();

ob_start();
?>
<section id="conteneur">
    <article id="inscription">
        <h1>Inscription</h1>
        <form method="post" action="index.php?cible=inscription">
            <div><label for="nom">Nom</label><input type="text" name="nom" id="nom"></div>
            <div><label for="mail">E-mail</label><input type="text" name="mail" id="mail"></div>
            <div><label for="adresse">Adresse</label><input type="text" name="adresse" id="adresse"></div>
            <div><label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp"></div>
            <div><label for="rmdp">Votre mot de passe, encore</label><input type="password" name="rmdp" id="rmdp"></div>
            <div id="envoyer"><input type="submit" name="submit" value="Envoyer"></div>
        </form>

        <a href="index.php?cible=ceConnecter">Déja inscrit ? Connecte-toi !</a>
        <p><?php {echo $messageErreur;} ?> </p>
    </article>
</section>

<?php
$section = ob_get_clean();

$footer = footer();

include("gabarit.php");
?>






