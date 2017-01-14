<?php
include("vue/header.php");
include("vue/footer.php");
$titre = "ajouter un capteurs";

ob_start();
?>
    <section id="capteur">
        <h1>Ajouter un capteur</h1>
        <div id="addCapteur">
            <div>
                <h2>ajouter un capteur</h2>
                <form action="/espace-client/capteurs/ajouter-capteur" method="post">
                    <label for="room">nom salle:</label><input type="input" id="room" name="room">
                    <label for="key">serial key:</label><input type="number" id="key" name="key">
                    <input type="submit" class="submit">
                </form>
                <?php if (isset($messageError)) { ?>
                <div class="messageError"><?php echo $messageError ?></div>
                <?php } ?>
                <?php if (isset($messageSuccess)) { ?>
                <div class="messageSuccess"><?php echo $messageSuccess ?></div>
                <?php } ?>
            </div>
        </div>
        <div id="listCapteur">
            <div>
                <h2>Mes capteurs</h2>

            </div>
        </div>


    </section>
<?php
$section = ob_get_clean();

include("gabarit.php");
