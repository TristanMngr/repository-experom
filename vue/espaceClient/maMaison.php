<?php
include("vue/header.php");
include("vue/footer.php");
include("controller/espaceClient/maison/functions.php");
ob_start();
$titre = "vue des capteurs";
?>

<section id="maMaison">
    <h1>Maison <span id="nomMaison"><?php if (isset($_SESSION['nomMaison'])) {echo  $_SESSION['nomMaison'];} ?></span><!--<a href="/espaceClient/ma-maison/consommation"><img src=<?php /*if($_GET['target']=='ma-maison'){echo "/style/images/diagram.png"; } else {echo "vue/style/images/diagram.png"; } */?>></a>--></h1>
    <div id="indexMaison">
        <ul>
            <?php
            for ($salle = 0; $salle<count($tableauDonneesSalles); $salle++) {?>
                <li class="index"><a href="#<?php echo $tableauDonneesSalles[$salle]['nom'];?>"> <?php echo $tableauDonneesSalles[$salle]['nom'] ?></a></li>
            <?php  }
            ?>
            <li class="indexCross"><a href="/espace-client/ma-maison/creation"><i class="flaticon-add-plus-button"></i></a></li>

        </ul>
    </div>
    <?php if (isset($messageError)) { ?>
    <div class="messageError"><?php echo $messageError  ; ?></div>
    <?php } if (isset($messageSuccess)){?>
        <div class="messageSuccess"><?php echo $messageSuccess; ?></div>
    <?php } ?>

    <div id="contenuAllMaison">
        <?php if(isset($_GET['target2']) & $_GET['target2']== 'creation') {?>
        <div id="creationSalle">
            <a href="/espace-client/ma-maison"><i class="flaticon-cancel-music" aria-hidden="true"></i></a>
            <h1>Création d'une salle</h1>

            <form action="/espace-client/ma-maison/ajouter" method="post" onclick="sendArrayCapteur()"> <!--envoie la tableau des serialKey-->

                <ul id="parentElement">


                    <?php /** Version Ajax */ ?>
                    <h2>Selection capteur</h2>
                    <div id="chooseCapteurType">
                        <div id="temperature" class="chooseType" onclick="selectCapteur(this.id)"><img src="/vue/style/images/thermometer.png" class="logo-capteur"></div>
                        <div id="humidite" class="chooseType" onclick="selectCapteur(this.id)"><img src="/vue/style/images/humidity.png" class="logo-capteur"</div>
                    </div>
                    

                    <div id="displayCapteur"></div>

                    <div id="conteneurList" style="display:none">
                        <h2>Capteur selectionné</h2>
                        <div ><ul id="allListCapteurTemp" style="display:none">
                                <div>
                                <h3>température</h3>
                                </div>
                            </ul>
                            <ul id="allListCapteurHum" style="display:none">
                                <div>
                                <h3>humidité</h3>
                                </div>
                            </ul>
                        </div>
                    </div>

                    <input type="hidden" id="serialKey" name="serialKey"> <!--javascript insert le tableau en value-->
                    <div id="inputSalleName"><label for="nomSalle">Choisir un nom de salle</label></span><input type="text" name="nomSalle" id="nomSalle"></div>
                </ul>
                <div><input type="submit" value="ajouter salle" id="creation"></div>
            </form>
        </div>
    <?php } ?>
        <div id="contenuMaison">
            <?php
        for ($salle= 0; $salle<count($tableauDonneesSalles); $salle++) {
            ?>
            <div class="salle">
                    <i class="flaticon-cancel-music" aria-hidden="true" onclick="deleteConf('<?php echo $tableauDonneesSalles[$salle]['nom']; ?>','maison');"></i>
                </form>
                <h1 id="<?php echo $tableauDonneesSalles[$salle]['nom']; ?>"><?php echo $tableauDonneesSalles[$salle]['nom'];?></h1>
                <ul>
                    <?php $dataCapteur= getdataCapteur($db,$tableauDonneesSalles[$salle]['ID']);
                          $nomDuMode = getModeSalle($db,$tableauDonneesSalles[$salle]['ID']);
                          /*$idMode = null;*/

                          /*if (getIdMode($db,$nomDuMode)!=false) {*/
                            $idMode = getIdMode($db,$nomDuMode);
                            $arrayTypeValueMode = getTypeValueMode($db,$idMode);  ?>
                    <?php if($tableauDonneesSalles[$salle]['isTemperature']==true) { ?>
                        <li><h2 class="temp titre-capteur"><span></span><span class="data">Actuellement</span><span><?php if ($arrayTypeValueMode != false) echo  "Mode"; else ""?></span></li>
                    <li>
                        <!--Refaire cette ligne -->
                        <h2 class="temp titre-capteur"><span><img src="/vue/style/images/thermometer.png" alt="temperature" class="logo-capteur"></span><span class="data"><?php if (isset($dataCapteur['temp'])) { echo $dataCapteur['temp'];} ?> °C</span><span><?= isset($arrayTypeValueMode['temperature']) ? $arrayTypeValueMode['temperature']: ""; ?> </span>
                            <label class="switch">
                                <input type="checkbox" checked name="switchTemp">
                                <i class="flaticon-power" aria-hidden="true"></i>
                            </label>
                        </h2>

                    </li>
                    <?php }
                    if ($tableauDonneesSalles[$salle]['isHumidite']==true) {
                    ?>
                    <li>
                        <h2 class="hum titre-capteur"><span><img src="/vue/style/images/humidity.png" alt="humidite" class="logo-capteur"><!--Humidité--></span><span class="data"><?php if (isset($dataCapteur['hum'])) { echo $dataCapteur['hum'];} ?> %</span><span><?= isset($arrayTypeValueMode['humidite'])? $arrayTypeValueMode['humidite']: ""; ?> </span>
                            <label class="switch">
                                <input type="checkbox" checked name="switchHum">
                                <i class="flaticon-power" aria-hidden="true"></i>
                            </label>
                        </h2>

                    </li>
                    <?php } ?>
                    <hr class="margin-info">
                    <?php $idSalle = $tableauDonneesSalles[$salle]['ID'];
                    $nameMode = getModeSalle($db,$idSalle);

                    if (isset($nameMode)) { ?>

                    <li class="configMode">
                        <span><h2 class="modeActif">Mode actif</h2></span><span class="modeActif green"><?php echo $nameMode ;?></span>
                    </li>
                    <?php } else {?>
                    <li class="configMode">
                        <span><h2 class="modeActif">Mode actif</h2></span><span class="modeActif red">Aucun</span>
                    </li>
                <?php } ?>
                    <li class="configMode">
                        <span>
                            <h2 class="modeSalle"><span>Choisir un mode</span></h2>
                            <form class="modeSalle" action="/espace-client/ma-maison/activer-mode#<?php echo $tableauDonneesSalles[$salle]['nom']; ?>" method="post">
                            <select name="getMode">
                                <?php for($mode =0; $mode < count($arrayMode); $mode++){ ?>
                                <option value="<?php echo $arrayMode[$mode];?>"><?php echo $arrayMode[$mode];?></option>

                                <?php } ?>
                            </select>
                                <input type="hidden" name="getIdSalle" value="<?php echo $tableauDonneesSalles[$salle]['ID']; ?>">
                                <input class="modeSalle" type="submit" value="activer">

                            </form>
                        </span>


                    </li>
                </ul>
            </div>
            <?php }?>
        </div>
    </div>
</section>




<?php
$section = ob_get_clean();
include("gabarit.php");
