<?php
include("vue/header.php");
include("vue/footer.php");
include("controller/espaceClient/maison/functions.php");
ob_start();
$titre = "vue des capteurs";
?>

    <section id="maMaison">
        <!--onclick='ajaxGet("http://projets-tomcat.isep.fr:8080/appService?ACTION=getlog&TEAM=0000")'-->
        <h1>Maison <span id="nomMaison"><?php if (isset($_SESSION['nomMaison'])) {
                    echo $_SESSION['nomMaison'];
                } ?></span>
            <!--<a href="/espaceClient/ma-maison/consommation"><img src=<?php /*if($_GET['target']=='ma-maison'){echo "/style/images/diagram.png"; } else {echo "vue/style/images/diagram.png"; } */ ?>></a>-->
        </h1>
        <div id="indexMaison">
            <ul>
                <?php if ($showGeneral==true) { ?>
                    <li class="index"><a href="/espace-client/ma-maison/general">Général</a></li>
                <?php }
                for ($salle = 0; $salle < count($tableauDonneesSalles); $salle++) { ?>
                    <li class="index"><a
                                href="#<?php echo $tableauDonneesSalles[$salle]['nom_salle']; ?>"> <?php echo $tableauDonneesSalles[$salle]['nom_salle'] ?></a>
                    </li>
                <?php }
                ?>
                <li class="indexCross"><a href="/espace-client/ma-maison/creation"><i
                                class="flaticon-add-plus-button"></i></a></li>

            </ul>
        </div>
        <?php if (isset($messageError)) { ?>
            <div class="messageError"><?php echo $messageError; ?></div>
        <?php }
        if (isset($messageSuccess)) { ?>
            <div class="messageSuccess"><?php echo $messageSuccess; ?></div>
        <?php } ?>
        <div id="generalDiv">
            <?php if (isset($_GET['target3'])) {
                if ($_GET['target2'] == 'general' or $_GET['target3']=='general') {
                    include('vue/espaceClient/viewGeneral.php');
                }
            } ?>
        </div>

        <div id="contenuAllMaison">
            <?php if (isset($_GET['target2']) & $_GET['target2'] == 'creation') { ?>
                <div id="creationSalle">
                    <a href="/espace-client/ma-maison"><i class="flaticon-cancel-music" aria-hidden="true"></i></a>
                    <h1>Création d'une salle</h1>

                    <form action="/espace-client/ma-maison/ajouter" method="post" onclick="sendArrayCapteur()">
                        <!--envoie la tableau des serialKey-->

                        <ul id="parentElement">


                            <?php /** Version Ajax */ ?>
                            <h2>Selection capteur</h2>
                            <div id="chooseCapteurType">
                                <div id="temperature" class="chooseType" onclick="selectCapteur(this.id)"><img
                                            src="/vue/style/images/thermometer.png" class="logo-capteur"></div>
                                <div id="humidite" class="chooseType" onclick="selectCapteur(this.id)"><img
                                            src="/vue/style/images/humidity.png" class="logo-capteur"</div>
                            </div>


                            <div id="displayCapteur"></div>

                            <div id="conteneurList" style="display:none">
                                <h2>Capteurs selectionnés</h2>
                                <div>
                                    <ul id="allListCapteurTemp" style="display:none">
                                        <div class="titre">
                                            <h3>Température</h3>
                                        </div>
                                    </ul>
                                    <ul id="allListCapteurHum" style="display:none">
                                        <div class="titre">
                                            <h3>Humidité</h3>
                                        </div>
                                    </ul>
                                </div>
                            </div>

                            <input type="hidden" id="serialKey" name="serialKey">
                            <!--javascript insert le tableau en value-->
                            <div id="inputSalleName"><label for="nomSalle">Choisir un nom de salle</label></span><input
                                        type="text" name="nomSalle" id="nomSalle"></div>
                        </ul>
                        <div><input type="submit" value="ajouter salle" id="creation"></div>
                    </form>
                </div>
            <?php } ?>
            <div id="contenuMaison">
                <?php
                for ($salle = 0; $salle < count($tableauDonneesSalles); $salle++) {
                    ?>
                    <div class="salle" id="<?php echo "salle" . $tableauDonneesSalles[$salle]['ID'] ?>">
                        <?php if ($_SESSION['role'] == 'principal') { ?>
                        <i class="flaticon-cancel-music" aria-hidden="true"
                           onclick="deleteConf('<?php echo $tableauDonneesSalles[$salle]['nom_salle']; ?>','maison');"></i>
                        <?php } else { ?>
                        <div class="rien"></div>
                        <?php } ?>

                        </form>
                        <h1 id="<?php echo $tableauDonneesSalles[$salle]['nom_salle']; ?>"><?php echo $tableauDonneesSalles[$salle]['nom_salle']; ?></h1>
                        <ul id="salleList">
                            <?php
                            $arrayTypeValueMode = getTypeValueMode($db, $tableauDonneesSalles[$salle]['ID_mode']);

                            ?>
                            <li><h2 class="temp titre-capteur"><span></span><span
                                            class="data">Actuellement</span><span><?php if ($arrayTypeValueMode != false) echo "Mode"; else "" ?></span>
                            </li>
                            <?php if ($tableauDonneesSalles[$salle]['isTemperature'] == true) { ?>
                                <li>
                                    <!--Refaire cette ligne -->
                                    <h2 class="temp titre-capteur"><span><img src="/vue/style/images/thermometer.png"
                                                                              alt="temperature"
                                                                              class="logo-capteur"></span><span
                                                class="data"><?php if ($tableauDonneesSalles[$salle]['isTemperature']) {
                                                echo $tableauDonneesSalles[$salle]['temperature'];
                                            } ?>
                                            °C</span><span><?= isset($arrayTypeValueMode['temperature']) ? $arrayTypeValueMode['temperature'] : ""; ?> </span>
                                        <label class="switch">
                                            <input type="checkbox" checked name="switchTemp">
                                            <i class="flaticon-power" aria-hidden="true"></i>
                                        </label>
                                    </h2>

                                </li>
                            <?php }
                            if ($tableauDonneesSalles[$salle]['isHumidite'] == true) {
                                ?>
                                <li>
                                    <h2 class="hum titre-capteur"><span><img src="/vue/style/images/humidity.png"
                                                                             alt="humidite" class="logo-capteur">
                                            <!--Humidité--></span><span
                                                class="data"><?php if ($tableauDonneesSalles[$salle]['isHumidite']) {
                                                echo $tableauDonneesSalles[$salle]['humidite'];
                                            } ?>
                                            %</span><span><?= isset($arrayTypeValueMode['humidite']) ? $arrayTypeValueMode['humidite'] : ""; ?> </span>
                                        <label class="switch">
                                            <input type="checkbox" checked name="switchHum">
                                            <i class="flaticon-power" aria-hidden="true"></i>
                                        </label>
                                    </h2>

                                </li>
                            <?php } ?>
                            <hr class="margin-info">
                            <?php
                            $nameMode = getModeSalle($db, $tableauDonneesSalles[$salle]['ID'], $_SESSION['IDmaison']);

                            if (isset($nameMode)) { ?>

                                <li class="configMode">
                                    <span><h2 class="modeActif">Mode actif</h2></span><span
                                            class="modeActif green"><?php echo $nameMode; ?></span>
                                </li>
                            <?php } else { ?>
                                <li class="configMode">
                                    <span><h2 class="modeActif">Mode actif</h2></span><span
                                            class="modeActif red">Aucun</span>
                                </li>
                            <?php } ?>
                            <li class="configMode">
                        <span>
                            <h2 class="modeSalle"><span>Choisir un mode</span></h2>
                            <form class="modeSalle"
                                  action="/espace-client/ma-maison/activer-mode#<?php echo $tableauDonneesSalles[$salle]['nom_salle']; ?>"
                                  method="post">
                            <select name="getMode" id="getMode">
                                <?php for ($mode = 0; $mode < count($arrayMode); $mode++) { ?>
                                    <option value="<?php echo $arrayMode[$mode]; ?>"
                                    <?php if (isset($nameMode)) {
                                            if ($nameMode==$arrayMode[$mode]) {
                                                echo 'seleted';
                                            } else {
                                                echo ""; }} ?>><?php echo $arrayMode[$mode]; ?></option>

                                <?php } ?>
                            </select>
                                <input type="hidden" name="getIdSalle"
                                       value="<?php echo $tableauDonneesSalles[$salle]['ID']; ?>">
                                <input class="modeSalle" type="submit" value="activer">
                                <!--onclick="ajaxGetDataMode('<?php /*echo "salle".$tableauDonneesSalles[$salle]['ID']; */ ?>',document.getElementById('getMode').value)"-->
                            </form>
                        </span>


                            </li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>


<?php
$section = ob_get_clean();
include("gabarit.php");
