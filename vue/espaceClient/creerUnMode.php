<?php
include("vue/header.php");
include("vue/footer.php");
ob_start();
$titre = "créer un modes";
?>
<section id="modes">
    <h1>Mes modes</h1>
    <div id="conteneurModes">

        <?php if ($displayConfig == true) { ?>
        <div id="placementConfigMode">
            <form action='<?php if($editMode == true) {echo '/espace-client/modes/modifier-controller';} else {echo "/espace-client/modes/creer-un-mode";} ?>' method="post">
            <div id="creerMode" class="theme">

                <h1><?= isset($editionMode)?"Editer mode":"Creer un mode";   ?></h1>
                <ul id="configMode">

                    <li class="template first">
                        <div id="temp">

                            <div class="placementConf">
                                <h2 class="titre-capteur"><img src="/vue/style/images/thermometer.png" alt="temperature" class="logo-capteur"></h2>
                                <input type="number" name="tempMode" id="tempMode" class="inputModeConf" autofocus value="<?php if($typeModeTemp) {echo $consigneTemp;} ?>"><label for="tempMode">°C </label>
                                <span>de </span><input type="number" name="timeBeginTemp" id="timeBeginTemp" class="inputModeConf" min="1" max="24" value="<?php if($typeModeTemp) {echo $beginTemp;} ?>">
                                <span>à </span><input type="number" name="timeEndTemp" id="timEndTemp" class="inputModeConf" min="1" max="24" value="<?php if($typeModeTemp) {echo $endTemp;} ?>">

                                <!--<button class="valider">Valider</button>-->
                                <input type="checkbox" name="checkTemp" <?php if($isCheckedTemp) {echo 'checked';} ?>>
                            </div>
                        </div>
                    </li>


                    <li class="template">
                        <div id="hum">

                            <div class="placementConf">
                                <h2 class="titre-capteur"><img src="/vue/style/images/humidity.png" alt="humidite" class="logo-capteur"></h2>
                                <input type="number" name="humMode" id="humMode" class="inputModeConf" value="<?php if($typeModeHum) { echo $consigneHum; } ?>"><label for="humMode">% </label>
                                <span>de </span><input type="number" name="timeBeginHum" id="timBeginHum" class="inputModeConf" min="1" max="24" value="<?php if($typeModeHum) {echo $beginHum;} ?>">
                                <span>à </span><input type="number" name="timeEndHum" id="timEndHum" class="inputModeConf" min="1" max="24" value="<?php if($typeModeHum) {echo $endHum;} ?>">

                                <!--<button class="valider">Valider</button>-->
                                <input type="checkbox" name="checkHum" <?php if($isCheckedHum) {echo 'checked';} ?>>
                            </div>
                        </div>
                    </li>
                </ul>
                <div id="submitMode">
                    <input type="input" name="nom" id="inputNomMode" placeholder="nom du mode" value="<?php if($modeName!=null){ echo $modeName;} ?>">
                        <input type="submit" id="submitNomMode" value="<?php if($editMode==true){echo "modifier";} else {echo "Créer";} ?>">
                        <input type="hidden" name="editMode" value="<?= isset($modeName)? $modeName: ""; ?>"/>
                </div>
            </div>
            </form>
        </div>
    <?php } ?>
        <div id="placementChoixMode">
            <div id="choixMode" class="theme">
                <h1>Choisir un mode</h1>
                <ul>
                    <?php foreach($arrayNameMode as $key => $mode) {?>
                    <li class="modeLeft"><span class="listMode"><? echo $mode;?></span>
                        <div class="right"><form class="modeRight" action="/espace-client/modes/modifier" method="post">
                            <input type="hidden" name="editMode" value="<?php echo $mode ?>">
                            <!--<span class="modeRight">--><input type="submit" value="Modifier" class="inputEdit">
                        </form>

                        <?php if ($mode == "mode nuit" or $mode == "mode jour") {
                            ?><input type="submit" value="Supprimer"  class="modeRight inputRemove disabled"  disabled></li>
                            <?php } else { ?>
                            <input type="submit" value="Supprimer" onclick="deleteConf('<?php echo $mode ?>','mode')" class="inputRemove not-disabled"></div></li>
                    <?php }} ?>

                    <li class="submit">
                        <form action="/espace-client/modes/creer"><input type="submit" id="submitCreerMode" value="Créer un mode"></form>
                    </li>
                    <?php if(isset($messageError)){  ?>
                    <li class="messageError"><?php echo $messageError; ?></li>
                      <?php  } if (isset($messageSuccess)) {?>
                    <li class="messageSuccess"><?php echo $messageSuccess; ?></li>
                      <?php }?>
                </ul>

            </div>
        </div>
        </form>



    </div>



</section>

<?php
$section = ob_get_clean();
?>

<?php
include("gabarit.php");