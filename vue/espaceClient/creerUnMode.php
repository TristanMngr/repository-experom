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
            <form action=<?php if($editMode) {echo '/espace-client/modes/modifier';} else {echo "/espace-client/modes/creer-un-mode";} ?> method="post">
            <div id="creerMode">

                <h1>Creer un mode</h1>
                <ul id="configMode">

                    <li class="template first">
                        <div id="temp">
                            <h2>Température</h2>
                            <div class="placementConf">
                                <input type="text" name="tempMode" id="tempMode" class="inputModeConf" autofocus value="<?php if($typeModeTemp) {echo $consigneTemp;} ?>"><label for="tempMode">°C </label>
                                <span>de </span><input type="number" name="timeBeginTemp" id="timeBeginTemp" class="inputModeConf" min="1" max="24" value="<?php if($typeModeTemp) {echo $beginTemp;} ?>">
                                <span>à </span><input type="number" name="timeEndTemp" id="timEndTemp" class="inputModeConf" min="1" max="24" value="<?php if($typeModeTemp) {echo $endTemp;} ?>">

                                <!--<button class="valider">Valider</button>-->
                                <input type="checkbox" name="checkTemp">
                            </div>
                        </div>
                    </li>


                    <li class="template">
                        <div id="hum">
                            <h2>Humidité</h2>
                            <div class="placementConf">
                                <input type="text" name="humMode" id="humMode" class="inputModeConf" value="<?php if($typeModeHum) {echo $consigneHum;} ?> "><label for="humMode">% </label>
                                <span>de </span><input type="number" name="timeBeginHum" id="timBeginHum" class="inputModeConf" min="1" max="24" value="<?php if($typeModeHum) {echo $beginHum;} ?>">
                                <span>à </span><input type="number" name="timeEndHum" id="timEndHum" class="inputModeConf" min="1" max="24" value="<?php if($typeModeHum) {echo $endHum;} ?>">

                                <!--<button class="valider">Valider</button>-->
                                <input type="checkbox" name="checkHum" <?php if($isCheckedHum) {echo "checked='checked";} ?>>
                            </div>
                        </div>
                    </li>
                </ul>
                <div id="submitMode">
                    <input type="input" name="nom" id="inputNomMode" placeholder="nom du mode" value="<?php if($modeName!=null){ echo $modeName;} ?>">
                        <input type="submit" id="submitNomMode">
                </div>
            </div>
            </form>
        </div>
    <?php } ?>
        <div id="placementChoixMode">
            <div id="choixMode">
                <h1>Choisir un mode</h1>
                <ul>
                    <li>mode1</li>
                    <li>mode2</li>
                    <?php foreach($arrayNameMode as $key => $mode) {?>
                    <li><span class="listMode"><? echo $mode;?></span>
                        <form class="formInline" action="/espace-client/modes/modifier" method="post">
                            <input type="hidden" name="editMode" value="<?php echo $mode ?>">
                            <input type="submit" value="modifier" class="inputEdit">
                        </form>
                        <!--<form class="formInline" action="/espace-client/modes/supprimer" method="post">-->

                            <!--<input type="hidden" name="removeMode" value="<?php /*echo $mode */?>">-->
                            <input type="submit" value="supprimer" onclick="deleteConf('<?php echo $mode ?>','mode')" class="inputRemove"></li>
                        <!--</form>--><?php } ?>

                    <li>
                        <form action="/espace-client/modes/creer"><input type="submit" id="creerMode" value="creer un mode"></form>
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