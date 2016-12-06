<?php
include("vue/header.php");
include("vue/footer.php");
ob_start();
$titre = "inscription";
?>
<section id="conteneur">
    <article id="inscription">
        <h1><?php if ($utilisateurSecondaire == False){echo "Inscription" ;} else {echo "Création d'un utilisateur secondaire";} ?></h1>
        <form method="post" action=<?php if ($utilisateurSecondaire == False) {echo "index.php?cible=controllerInscription";} else if ($utilisateurSecondaire == True) {echo "index.php?cible=controllerInscriptionSecondaire";}?>>
            <div><label for="nom">Nom</label><input type="text" name="nom" id="nom"></div>
            <div><label for="mail">E-mail</label><input type="text" name="mail" id="mail"></div>
            <?php if ($utilisateurSecondaire == False){ ?><div><label for="adresse">Adresse</label><input type="text" name="adresse" id="adresse"></div><?php } ?>
            <div><label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp"></div>
            <div><label for="rmdp">Votre mot de passe, encore</label><input type="password" name="rmdp"
                                                                            id="rmdp"></div>
            <div id="envoyer"><input type="submit" name="submit" value="Envoyer"></div>
        </form>

        <?php if ($utilisateurSecondaire == False){ ?><a href="index.php?cible=connecterRedirige">Déja inscrit ? Connecte-toi !</a> <?php } ?>
        <div class="message">
            <?php {echo $messageErreur;} ?>
        </div>
    </article>
</section>

<?php
$section = ob_get_clean();
include("gabarit.php");
?>


