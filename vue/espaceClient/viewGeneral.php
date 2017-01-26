
<div id="general">
    <div class="salle" id="generalView">
        <a href="/espace-client/ma-maison" class="cancel"><i class="flaticon-cancel-music" aria-hidden="true"></i></a>

        <h1>Vue général de la maison</h1>
        <ul id="ulGeneral">
            <?php
            $arrayTypeValueMode = getTypeValueMode($db,$idModeGeneral);

            ?>
            <li><h2 class="temp titre-capteur"><span></span><span
                            class="data">Actuellement</span><span><?php if ($arrayTypeValueMode != false) echo  "Mode"; else "" ?></span>
            </li>
            <?php if ((int)$avgDataHome[0]['temperature'] != 0) { ?>
            <li>
                <!--Refaire cette ligne -->
                <h2 class="temp titre-capteur"><span><img src="/vue/style/images/thermometer.png" alt="temperature"
                                                          class="logo-capteur"></span><span
                            class="data"><?php if ($avgDataHome[0]['temperature']) {
                            echo $avgDataHome[0]['temperature'];
                        } ?>
                        °C</span><span><?= isset($arrayTypeValueMode['temperature']) ? $arrayTypeValueMode['temperature']: "";  ?> </span>
                    <label class="switch">
                        <input type="checkbox" checked name="switchTemp">
                        <i class="flaticon-power" aria-hidden="true"></i>
                    </label>
                </h2>

            </li>
            <?php } if ((int)$avgDataHome[0]['humidite'] != 0) { ?>
            <li>
                <h2 class="hum titre-capteur"><span><img src="/vue/style/images/humidity.png" alt="humidite"
                                                         class="logo-capteur"><!--Humidité--></span><span
                            class="data"><?php if ($avgDataHome[0]['humidite']) {
                            echo $avgDataHome[0]['humidite'];
                        } ?>
                        %</span><span><?= isset($arrayTypeValueMode['humidite'])? $arrayTypeValueMode['humidite']: "";  ?> </span>
                    <label class="switch">
                        <input type="checkbox" checked name="switchHum">
                        <i class="flaticon-power" aria-hidden="true"></i>
                    </label>
                </h2>

            </li>
            <?php } ?>
            <hr class="margin-info">
            <?php
            $nameMode = getModeSalle($db, -1, -1);

            if (isset($nameMode)) { ?>

                <li class="configMode">
                    <span><h2 class="modeActif">Mode actif</h2></span><span
                            class="modeActif green"><?php echo $nameMode; ?></span>
                </li>
            <?php } else { ?>
                <li class="configMode">
                    <span><h2 class="modeActif">Mode actif</h2></span><span class="modeActif red">Aucun</span>
                </li>
            <?php } ?>
            <li class="configMode">
                        <span>
                            <h2 class="modeSalle general"><span>Choisir un mode pour toutes les salles</span></h2>
                            <form class="modeSalle"
                                  action="/espace-client/ma-maison/activer-mode/general"
                                  method="post">
                            <select name="getMode" id="getMode">
                                <?php for ($mode = 0; $mode < count($arrayMode); $mode++) { ?>
                                    <option value="<?php echo $arrayMode[$mode]; ?>"><?php echo $arrayMode[$mode]; ?></option>

                                <?php } ?>
                            </select>
                                <!--<input type="hidden" name="getIdSalle" value="<?php /*echo $tableauDonneesSalles[$salle]['ID']; */?>">-->
                                <input class="modeSalle" type="submit" value="activer">

                            </form>
                        </span>
                <!--<img src="http://chart.apis.google.com/chart?cht=bvs&chd=t:80,20,100,30,50,60&chs=100x400&chl=temperature|humidite|chocolat|">-->


            </li>
        </ul>
    </div>


</div>