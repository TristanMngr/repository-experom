<?php
include("vue/back-office/header.php");
include("vue/back-office/footer.php");
$titre = "utilisateurs";

ob_start();
?>

    <section id="cgu-BO">
        <div id="cgu" class="theme">
            <h1>Conditions générales d'utilisation</h1>
            <form action="/admin/cgu-editer/creation" method="post">
                <textarea align="left" name="cgu" cols="70" rows="25" autofocus placeholder=<?php if (!isset($dataCGU[0]['text'])) { ?>"Vous n'avez pas encore crée les conditions générales d'utilisation" <?php } ?>><?= isset($dataCGU[0]['text'])?$dataCGU[0]['text']:"" ?></textarea>

                <input type="submit" value="Valider">

                <?php if (isset($messageSuccess)) { ?>
                <div class="messageSuccess"><?php echo $messageSuccess; ?></div>
                   <?php } ?>
            </form>
        </div>

    </section>


<?php
$section = ob_get_clean();

include("gabarit.php");