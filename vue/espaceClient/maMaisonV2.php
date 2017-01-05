<?php
include("vue/header.php");
include("vue/footer.php");
ob_start();
$titre = "vue des capteurs";
?>

<section id="maMaison">
    <h1>Maison</h1>
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

            <form action="/espace-client/ma-maison/ajouter" method="post">
                <ul>
                    <li><span>Température</span>
                        <select name="chooseCapteurTemp">
                            <option value="false">désactiver</option>
                            <?php for ($capteur = 0; $capteur < count($arraySelectCapt['temperature']); $capteur++){?>
                             <option value="<?php echo $arraySelectCapt['temperature'][$capteur];?>"><?php echo $arraySelectCapt['temperature'][$capteur]; ?></option>
                            <?php }?>
                        </select>
                    </li>
                    <li><span>Humidité</span>
                        <select name="chooseCapteurHum">
                                <option value="false">désactiver</option>
                            <?php for ($capteur = 0; $capteur < count($arraySelectCapt['humidite']); $capteur++){?>
                                <option value="<?php echo $arraySelectCapt['humidite'][$capteur];?>"><?php echo $arraySelectCapt['humidite'][$capteur]; ?></option>
                            <?php }?>
                        </select>
                    </li>
                    <li>
                        <span><label for="nomSalle">Choisie un nom de salle</label></span><input type="text" name="nomSalle" id="nomSalle"></li>
                </ul>
                <div><input type="submit" value="créer salle" id="creation"></div>
            </form>
        </div>
    <?php } ?>
        <div id="contenuMaison">
            <?php
        for ($salle= 0; $salle<count($tableauDonneesSalles); $salle++) {
            ?>
            <div class="salle">
                <form action="/espace-client/ma-maison/supprimer" method="post" id="<?php echo $tableauDonneesSalles[$salle]['nom'] ?>">
                    <i class="flaticon-cancel-music" aria-hidden="true" onclick="document.getElementById('<?php echo $tableauDonneesSalles[$salle]['nom'] ?>').submit();"></i>
                    <input type="hidden" name="removeSalle" value="<?php echo $tableauDonneesSalles[$salle]['nom']; ?>">
                </form>
                <h1 id="<?php echo $tableauDonneesSalles[$salle]['nom']; ?>"><?php echo $tableauDonneesSalles[$salle]['nom'];?></h1>
                <ul>
                    <?php $dataCapteur= getdataCapteur($db,$tableauDonneesSalles[$salle]['ID']); ?>
                    <?php if($tableauDonneesSalles[$salle]['isTemperature']==true) { ?>
                    <li>
                        <h2 class="temp"><span>Température</span><span class="data"><?php if (isset($dataCapteur['temp'])) { echo $dataCapteur['temp'];} ?></span>
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
                        <h2 class="hum"><span>Humidité</span><span class="data"><?php if (isset($dataCapteur['hum'])) { echo $dataCapteur['hum'];} ?></span>
                            <label class="switch">
                                <input type="checkbox" checked name="switchHum">
                                <i class="flaticon-power" aria-hidden="true"></i>
                            </label>
                        </h2>

                    </li>
                    <?php } ?>
                    <li>
                        <span>
                            <h2 class="modeSalle"><span>Mode</span></h2>
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
