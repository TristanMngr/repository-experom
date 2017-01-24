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
                <h2>Ajouter un capteur</h2>
                <form action="/espace-client/capteurs/ajouter-capteur" method="post">
                    <div class="divAddCapt"><label for="room">Tag salle:</label><input type="input" autofocus id="room" name="room"></div>
                    <div class="divAddCapt"><label for="key">Serial key:</label><input type="number" id="key" name="key"></div>
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
                    <?php /*displayArray('captuer',$arrayCapteurs) */?>
                    <?php foreach ($arrayCapteurs as $key => $value) { ?>
                        <li class="capteur" id="list<?= $value['ID']; ?>" onclick="displayCross('isSet<?php echo $value['ID']; ?>','<?=  $value['ID'] ?>')"><h3><?php echo $value['nom'] ?></h3><span class="crossCapteur" id="<?php echo $value['ID'] ?>"></span>
                        <ul>
                            <li><span>type :</span><?php echo $value['type'] ?></li>
                            <li><span>attribué :</span><?php if ($value['ID_salle'] == 0 or getNameSalle($db,$value['ID_salle']) == false ) { ?><span class="isSet" id="isSet<?php echo $value['ID'] ?>"><?php echo 'non' ; ?></span><?php } else  { ?><span class="setSalle"><?php echo getNameSalle($db,$value['ID_salle']);} ?></span></li>
                            <li><span>serial key :</span><?php echo $value['serial_key'] ?></li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>

            </div>
        </div>


    </section>
<?php
$section = ob_get_clean();

include("gabarit.php");
