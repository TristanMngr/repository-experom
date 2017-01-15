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
                    <input type="submit" value="Ajouter" class="submit">
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
                <ul id="displayCapteur">
                    <?php foreach ($arrayCapteurs as $key => $value) { ?>
                    <li class="capteur"><h3><?php echo $value['nom'] ?></h3>
                        <ul>
                            <li><span>type :</span><?php echo $value['type'] ?></li>
                            <li><span>attribué :</span><?php if ($value['ID_salle'] == 0) {echo 'non';} else {echo 'oui';} ?></li>
                            <li><span>serial key :</span><?php echo $value['serial_key'] ?></li>
                        </ul>
                    <?php } ?>
                </ul>

            </div>
        </div>


    </section>
<?php
$section = ob_get_clean();

include("gabarit.php");
