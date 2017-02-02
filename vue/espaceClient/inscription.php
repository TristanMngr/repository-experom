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
            <?php if ($utilisateurSecondaire == False){ ?><div><label for="clef">Clef d'identification</label><input type="clef" name="clef" class="input" placeholder="0001"
                                                                                                                     id="clef" value="<?= isset($_POST['clef']) ? $_POST['clef'] : ""; ?>"></div><?php }?>
            <div><label for="pseudo">Pseudo</label><input type="text" name="pseudo" id="pseudo" class="input" value="<?= isset($_POST['pseudo']) ? $_POST['pseudo'] : ""; ?>" autofocus></div>
            <?php if ($utilisateurSecondaire == False){ ?><div><label for="nom">Nom</label><input type="text" name="nom" id="nom" class="input" value="<?= isset($_POST['nom']) ? $_POST['nom'] : ""; ?>"></div><?php } ?>
            <div><label for="mail">E-mail</label><input type="text" name="mail" id="mail" placeholder="exemple@mail.com" onblur="verifMail(this)" class="input" value="<? if ($utilisateurSecondaire == False && isset($_POST['mail'])) { echo $_POST['mail']; } else { echo "";} if ($utilisateurSecondaire) {echo $_SESSION['mail'];} ?>"></div>
            <?php if ($utilisateurSecondaire == False){ ?><div><label for="numero">Numero de telephone</label><input type="text" name="numero" onblur="verifNum(this)" id="numero" class="input" value="<?= isset($_POST['numero']) ? $_POST['numero'] : ""; ?>"></div><?php }?>
            <div><label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp" class="input" oninput="password(this)"></div><div class="helpMdp" id="helpMdp"></div>
            <div><label for="rmdp">Vérification du mot de passe</label><input type="password" class="input" name="rmdp"
                                                                            id="rmdp" oninput="rpassword(this)"></div><div class="helpMdp"></div>


            <div id="envoyer"><input type="submit" class="submit" name="submit" value="Envoyer"></div>
        </form>

        <?php if ($utilisateurSecondaire == False){ ?><a href="/espace-client/redirection-connexion" id="redirectionCo">Déja inscrit ? Connecte-toi !</a> <?php } else { ?> <a class="redirectionConfig" href="/espace-client/modifier-donnees-perso">Gestion des comptes </a> <?php } ?>

        <?php if (isset($messageError)) { ?>
            <div class="messageError"><?php echo $messageError; ?></div>
        <?php } if (isset($messageSuccess)) { ?>
            <div class="messageSuccess"><?php echo $messageSuccess; ?></div>
        <?php } ?>
    </article>
</section>

<?php
$section = ob_get_clean();
?><script type="text/javascript" src="/vue/javaScript/inscription.js"></script><?php
include("gabarit.php");
?>


