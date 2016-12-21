<?php
include("vue/header.php");
include("vue/footer.php");
ob_start();
$titre = "inscription";


?>
<section id="conteneur">
    <article id="inscription">
        <h1><?php if ($utilisateurSecondaire == False){echo "Inscription" ;} else {echo "Création d'un utilisateur secondaire";} ?></h1>
        <form method="post" action=<?php if ($utilisateurSecondaire == False) {echo "/espace-client/inscription-control";} else if ($utilisateurSecondaire == True) {echo "/espace-client/modifier-donnees-perso/ajouter-un-utilisateur-control";}?>>
            <div><label for="pseudo">Pseudo</label><input type="text" name="pseudo" id="pseudo" value="<?= isset($_POST['pseudo']) ? $_POST['pseudo'] : ""; ?>"></div>
            <?php if ($utilisateurSecondaire == False){ ?><div><label for="nom">Nom</label><input type="text" name="nom" id="nom" value="<?= isset($_POST['nom']) ? $_POST['nom'] : ""; ?>"></div><?php } ?>
            <div><label for="mail">E-mail</label><input type="text" name="mail" id="mail" value="<? if ($utilisateurSecondaire == False && isset($_POST['mail'])) { echo $_POST['mail']; } else { echo "";} if ($utilisateurSecondaire) {echo $_SESSION['mail'];} ?>"></div>
            <?php if ($utilisateurSecondaire == False){ ?><div><label for="adresse">Adresse</label><input type="text" name="adresse" id="adresse" value="<?= isset($_POST['adresse']) ? $_POST['adresse'] : ""; ?>"></div><?php } ?>
            <?php if ($utilisateurSecondaire == False){ ?><div><label for="numero">Numero de telephone</label><input type="text" name="numero" id="numero" value="<?= isset($_POST['numero']) ? $_POST['numero'] : ""; ?>"></div><?php }?>
            <div><label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp"></div>
            <div><label for="rmdp">Votre mot de passe, encore</label><input type="password" name="rmdp"
                                                                            id="rmdp"></div>

            <div id="envoyer"><input type="submit" name="submit" value="Envoyer"></div>
        </form>

        <?php if ($utilisateurSecondaire == False){ ?><a href="/espace-client/redirection-connexion">Déja inscrit ? Connecte-toi !</a> <?php } else { ?> <a class="redirectionConfig" href="/espace-client/modifier-donnees-perso">page des configurations </a> <?php } ?>
        <div class="message">
            <?php {echo $messageErreur;} ?>
        </div>
    </article>
</section>

<?php
$section = ob_get_clean();
include("gabarit.php");
?>


