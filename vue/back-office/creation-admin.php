<?php
include("vue/back-office/header.php");
include("vue/back-office/footer.php");
$titre = "création-admin";

ob_start();
?>

    <section id="conteneur" class="BO">
        <article id="inscription">
            <h1>Création d'un administrateur</h1>
            <form method="post" action="/admin/creation-admin/control">
                <div><label for="pseudo">Pseudo</label><input type="text" name="pseudo" id="pseudo" class="input" value="<?= isset($_POST['pseudo']) ? $_POST['pseudo'] : ""; ?>" autofocus></div>
                <div><label for="mail">E-mail</label><input type="text" name="mail" id="mail" placeholder="exemple@mail.com" class="input" value="<?= isset($_POST['mail']) ? $_POST['mail'] : ""; ?>"></div>
                <div><label for="numero">Numero de telephone</label><input type="text" name="numero" id="numero" class="input" value="<?= isset($_POST['numero']) ? $_POST['numero'] : ""; ?>"></div>
                <div><label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp" class="input" oninput="password(this)"></div><div id="helpMdp"></div>
                <div><label for="rmdp">Vérification du mot de passe</label><input type="password" class="input" name="rmdp"
                                                                                  id="rmdp"></div>


                <div id="envoyer"><input type="submit" class="submit" name="submit" value="Envoyer"></div>
            </form>

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