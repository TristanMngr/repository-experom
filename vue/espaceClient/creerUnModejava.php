<?php
include("vue/header.php");
include("vue/footer.php");
ob_start();
$titre = "créer un modes";
?>
<section id="modes">
    <h1>Mes modes</h1>
    <div id="conteneurModes">
        <div id="placementConfigMode">
            <div id="creerMode">
                <form action="">
                <h1>Creer un mode</h1>
                <ul id="configMode">

                    <li class="template">
                        <div id="temp">
                            <h2>Température</h2>
                            <input type="text" name="tempMode" id="tempMode"><label for="tempMode">°C </label>
                            <span>de </span><input type="text" name="timeBeginTemp" id="dateBeginTemp">
                            <span>à </span><input type="text" name="timEndTemp" id="timEndTemp">
                            <select name="choixCapteur" id="choixCapteurTemp" class="templateMode">
                                <option value="temperature" name="temperature" selected>Temperature</option>
                                <option value="humidite" name="humidite" >Humidité</option>
                                <option value="lumiere" >Lumiere</option>
                            </select>
                            <button class="valider">Valider</button>
                        </div>
                    </li>


                    <template id="temperature">
                        <div id="temp">
                            <h2>Température</h2>
                            <input type="text" name="tempMode" id="tempMode"><label for="tempMode">°C </label>
                            <span>de </span><input type="text" name="timeBeginTemp" id="dateBeginTemp">
                            <span>à </span><input type="text" name="timEndTemp" id="timEndTemp">
                            <select name="choixCapteur" id="choixCapteurTemp" class="templateMode">
                                <option value="temperature" name="temperature" selected>Temperature</option>
                                <option value="humidite" name="humidite" >Humidité</option>
                                <option value="lumiere" >Lumiere</option>
                            </select>
                            <button class="valider">Valider</button>
                        </div>
                    </template>

                    <template id="humidite">
                        <div id="hum">
                            <h2>Humidité</h2>
                            <input type="text" name="tempMode" id="humMode"><label for="humMode">% </label>
                            <span>de </span><input type="text" name="timeBeginHum" id="timBeginHum">
                            <span>à </span><input type="text" name="timEndHum" id="timEndHum">
                            <select name="choixCapteur" id="choixCapteurHum" class="templateMode">
                                <option value="temperature" name="temperature">Temperature</option>
                                <option value="humidite" name="humidite" selected>Humidité</option>
                                <option value="lumiere" >Lumiere</option>
                            </select>
                            <button class="valider">Valider</button>
                        </div>
                    </template>

                    <template id="lumiere">
                        <div id="lum">
                            <h2>Lumière</h2>
                            <input type="text" name="lumMode" id="lumMode"><label for="lumMode">% </label>
                            <span>de </span><input type="text" name="timeBeginLum" id="timBeginLum">
                            <span>à </span><input type="text" name="timEndLum" id="timEndLum">
                            <select name="choixCapteur" id="choixCapteurLum" class="templateMode">
                                <option value="temperature" name="temperature" >Temperature</option>
                                <option value="humidite" name="humidite" >Humidité</option>
                                <option value="lumiere" name="lumiere" selected>Lumiere</option>
                            </select>
                            <button class="valider">Valider</button>
                        </div>
                    </template>
                </ul>
                </form>
            </div>
        </div>
        <div id="placementChoixMode">
            <div id="choixMode">
                <h1>Choisir un mode</h1>
                <ul>
                    <li>mode1</li>
                    <li>mode2</li>
                    <li><button id="creerMode">créer un mode</button></li>
                </ul>

            </div>
        </div>



    </div>



</section>

<?php
$section = ob_get_clean();
?>

<?php
include("gabarit.php");