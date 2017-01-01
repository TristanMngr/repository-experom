<?php
include("vue/header.php");
include("vue/footer.php");
ob_start();
$titre = "vue des capteurs";
?>

<section id="maMaison">
    <h1>ma maison</h1>
    <div id="indexMaison">
        <ul>
            <?php
            for ($salle = 0; $salle<count($tableauDonneesSalles); $salle++) {?>
                <li><a href="#<?php echo 'salle'.$salle?>"> <?php echo $tableauDonneesSalles[$salle]['nom'] ?></a></li>
            <?php  }
            ?>
            <li><a href="/espace-client/ma-maison/creation"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
        </ul>
    </div>
    <div class="message"><?php echo $messageErreur; ?></div>
    <div id="contenuAllMaison">
        <?php if(isset($_GET['target2']) & $_GET['target2']== 'creation') {?>
        <div id="creationSalle">
            <a href="/espace-client/ma-maison"><i class="fa fa-times" aria-hidden="true"></i></a>
            <h1>Création d'une salle</h1>

            <form action="/espace-client/ma-maison/ajouter" method="post">
                <ul>
                    <li><span>ajouter température</span>
                        <label for="temperatureOui">Oui</label><input type="radio" name="temperature" value="true" id="temperatureOui" checked>
                        <label for="temperatureNon">Non</label><input type="radio" name="temperature" value="false" id="temperatureNon">
                    </li>
                    <li><span>ajouter humidité</span>
                        <label for="humiditeOui">Oui</label><input type="radio" name="humidite" value="true" id="humiditeOui" checked>
                        <label for="humiditeNon">Non</label><input type="radio" name="humidite" value="false" id="humiditeNon">
                    </li>
                    <li>
                        <span><label for="nomSalle">Quelle nom pour votre salle :</label></span><input type="text" name="nomSalle" id="nomSalle"></li>
                </ul>
                <input type="submit" value="créer" id="creation">
            </form>
        </div>
    <?php } ?>
        <div id="contenuMaison">
            <?php
        for ($salle= 0; $salle<count($tableauDonneesSalles); $salle++) {
            ?>
            <div class="salle">
                <form action="/espace-client/ma-maison/supprimer" method="post" id="removeSalle">
                    <i class="fa fa-times" aria-hidden="true" onclick="document.getElementById('removeSalle').submit();"></i>
                    <input type="hidden" name="removeSalle" value="<?php echo $tableauDonneesSalles[$salle]['nom']; ?>">
                </form>
                <h1 id="<?php echo 'salle'.$salle ?>"><?php echo $tableauDonneesSalles[$salle]['nom'] ?></h1>
                <ul>
                    <?php if($tableauDonneesSalles[$salle]['isTemperature']=="true") { ?>
                    <li>
                        <h2>Température</h2>
                        <div class="conteneurModif">
                            <ul>
                                <li>
                                    <div>Modifier état :</div>
                                    <form method="post" action="traitement.php" >

                                        <label for="tempOn">Actif </label> <input type="radio" name="etatTemp"
                                                                                         id="tempOn"
                                                                                         checked="checked"/>
                                        <label for="tempOff">Inactif</label> <input type="radio" name="etatTemp"
                                                                                          id="tempOff"/>

                                        <input type="submit" value="Envoyer"/>
                                    </form>
                                </li>
                                <li> Modes température modes :
                                    <form method="post" action="traitement.php">
                                        <label for="mode1"> Mode1 </label> <input type="radio" name="mode" id="mode1"/>
                                        <label for="mode2"> Mode2 </label> <input type="radio" name="mode" id="mode2"/>
                                        <label for="mode3"> Mode3 </label> <input type="radio" name="mode" id="mode3"/>

                                        <input type="submit" value="Envoyer"/>
                                    </form>
                                </li>
                            </ul>

                        </div>
                    </li>
                    <?php }
                    if ($tableauDonneesSalles[$salle]['isHumidite']=="true") {
                    ?>
                    <li>
                        <h2>Humidité</h2>
                        <div class="conteneurModif">
                            <ul>
                                <li>
                                    <div>Modifier état :</div>
                                    <form method="post" action="traitement.php" >

                                        <label for="tempOn">Actif </label> <input type="radio" name="etatTemp"
                                                                                         id="tempOn"
                                                                                         checked="checked"/>
                                        <label for="tempOff">Inactif</label> <input type="radio" name="etatTemp"
                                                                                          id="tempOff"/>

                                        <input type="submit" value="Envoyer"/>
                                    </form>
                                </li>
                                <li> Modes température modes :
                                    <form method="post" action="traitement.php">
                                        <label for="mode1"> Mode1 </label> <input type="radio" name="mode" id="mode1"/>
                                        <label for="mode2"> Mode2 </label> <input type="radio" name="mode" id="mode2"/>
                                        <label for="mode3"> Mode3 </label> <input type="radio" name="mode" id="mode3"/>

                                        <input type="submit" value="Envoyer"/>
                                    </form>
                                </li>
                                <br/>
                            </ul>

                        </div>
                    </li>
                    <?php } ?>
                    <li>
                        <span>
                            <h2>choisir un mode :</h2>
                            <form action="/espace-client/ma-maison/activer-mode" method="post">
                            <select name="getMode">
                                <?php for($mode =0; $mode < count($arrayMode); $mode++){ ?>
                                <option value="<?php echo $arrayMode[$mode];?>"><?php echo $arrayMode[$mode];?></option>
                                <?php } ?>
                            </select>
                                <input type="submit" value="activer">

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
