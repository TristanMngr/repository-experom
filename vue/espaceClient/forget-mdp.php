<?php
include("vue/header.php");
include("vue/footer.php");
$titre = "mot de passe";

ob_start();
?>
    <section id="conteneur">
        <div id="forget-mdp">
            <h1>Vous avez oubliez votre mot de passe ?</h1>
            <?php if (!isset($send_mail)) { ?>
            <form action="/espace-client/oublie-mdp/mail" method="post">
            <div class="inline"><label for="mail">Votre adresse mail</label><input type="text" id="mail" name="mail" value="<?= isset($_POST['mail'])?$_POST['mail']: ""; ?>" class="inline"></div>
            <div class="inline"><label for="pseudo">Votre pseudo</label><input type="text" id="pseudo" name="pseudo" value="<?= isset($_POST['pseudo'])?$_POST['pseudo']: ""; ?>" class="inline"></div>
            <input type="submit">
            </form>
                
            <?php } else { ?>
            <form action="/espace-client/oublie-mdp/change-mdp" method="post">
                <div class="inline"><label for="code">Entre le code de confirmation</label><input type="text" value="<?= isset($_POST['code'])?$_POST['code']: ""; ?>" name="code"></div>
                <div class="inline"><label for="mdp">Ton nouveau mot de passe</label><input type="password" name="mdp"></div>
                <div class="inline"><label for="rmdp">Retape ton mot de passe</label><input type="password" name="rmdp"></div>
                <input type="submit">
            </form>
            <?php } ?>
            
            
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
