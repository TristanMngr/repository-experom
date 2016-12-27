<?php
include("vue/header.php");
include("vue/footer.php");
ob_start();
$titre = "vue des capteurs";
?>



<section id= "index">
    <h1> Index </h1>
    <h2><?php echo $messageErreur ?></h2>
    <div>
        <ul>
            <li><a href="#VueGenerale"> Vue Général </a></li>
            <?php
            for ($salle= 0; $salle<count($tableauDonneesSalles); $salle++) {?>
                <li><a href="#<?php echo 'salle'.$salle?>"> <?php echo $tableauDonneesSalles[$salle]['nom'] ?></a></li>
            <?php  }
            ?>
            <li><a href="/espace-client/ma-maison/creation">ajouter salle</a></li>

        </ul>
    </div>

</section>


<section id="corps">
    <?php if(isset($_GET['target2']) & $_GET['target2']== 'creation') {?>
    <div id="creation">
        <h1>Création d'une salle</h1>

        <form action="/espace-client/ma-maison/ajouter" method="post">
            <ul>
                <li><em>ajouter température</em>
                    <label for="temperatureOui">Oui</label><input type="radio" name="temperature" value="true" id="temperatureOui" checked>
                    <label for="temperatureNon">Non</label><input type="radio" name="temperature" value="false" id="temperatureNon">
                </li>
                <li><em>ajouter humidité</em>
                    <label for="humiditeOui">Oui</label><input type="radio" name="humidite" value="true" id="humiditeOui" checked>
                    <label for="humiditeNon">Non</label><input type="radio" name="humidite" value="false" id="humiditeNon">
                </li>
                <li><label for="nomSalle">Quelle nom pour votre salle :</label><input type="text" name="nomSalle" id="nomSalle"></li>
            </ul>
            <input type="submit" value="créer" id="creation">
        </form>
    </div>
    <?php } ?>
    <div id="VueGenerale">
        <h1> Vue Générale </h1>
        <ul>
            <li> Consommation </li>
            <li>  Position </li>
            <li>  Nombre de capteurs  </li>
            <li> Etat  </li> <!--Notification si erreur -->
        </ul>

    </div>
<?php
    for ($salle= 0; $salle<count($tableauDonneesSalles); $salle++) {
        ?>
        <div id="Salle1">
            <h1 id="<?php echo 'salle'.$salle ?>"><?php echo $tableauDonneesSalles[$salle]['nom'] ?></h1>
            <ul>
                <?php if($tableauDonneesSalles[$salle]['isTemperature']=="true") { ?>
                <li>
                    <h2> Température </h2>
                    <div class="conteneurModif">
                        <ul>

                            <li>Nombres Capteur Température</li>
                            <li>Etats Capteur Température</li>
                            <li>
                                <div class="formu">Modifier état :</div>
                                <form method="post" action="traitement.php" class="formu">

                                    <label for="étatActifoui"> Actif </label> <input type="radio" name="état"
                                                                                     id="étatActifoui"
                                                                                     checked="checked"/>
                                    <label for="étatActifnon"> Inactif </label> <input type="radio" name="état"
                                                                                       id="étatActifnon"/>

                                    <input type="submit" value="Envoyer"/>
                                </form>
                            </li>
                            <br/>


                            <li> Modes température modes :
                                <form method="post" action="traitement.php">
                                    <p class="modifMode">
                                        <label for="mode1"> Mode1 </label> <input type="radio" name="mode" id="mode1"/>
                                        <label for="mode2"> Mode2 </label> <input type="radio" name="mode" id="mode2"/>
                                        <label for="mode3"> Mode3 </label> <input type="radio" name="mode" id="mode3"/>


                                    </p>
                                    <input type="submit" value="Envoyer"/>
                                </form>
                                </br>
                            </li>

                            <li> Mesures Capteur Température</li>
                            </br>
                            <li> Fonctionnement Capteur Température</li>
                            </br> <!-- notification panne capteur -->

                        </ul>

                    </div>
                </li>
                <?php }
                if ($tableauDonneesSalles[$salle]['isHumidite']=="true") {
                ?>

                <li>
                    <h2> Humidité </h2>
                    <div class="conteneurModif">
                        <ul>

                            <li> Nombres Capteur Humidité</li>
                            <li> Etats Capteur Humidité</li>
                            <li>
                                <div class="formu">Modifier état :</div>
                                <form method="post" action="traitement.php" class="formu">

                                    <label for="étatActifoui"> Actif </label> <input type="radio" name="état"
                                                                                     id="étatActifoui"
                                                                                     checked="checked"/>
                                    <label for="étatActifnon"> Inactif </label> <input type="radio" name="état"
                                                                                       id="étatActifnon"/>

                                    <input type="submit" value="Envoyer"/>
                                </form>
                            </li>
                            <br/>


                            <li> Modes humidité modes :
                                <form method="post" action="traitement.php">
                                    <p class="modifMode">
                                        <label for="mode1"> Mode1 </label> <input type="radio" name="mode" id="mode1"/>
                                        <label for="mode2"> Mode2 </label> <input type="radio" name="mode" id="mode2"/>
                                        <label for="mode3"> Mode3 </label> <input type="radio" name="mode" id="mode3"/>


                                    </p>
                                    <input type="submit" value="Envoyer"/>
                                </form>
                                </br>
                            </li>

                            <li> Mesures Capteur humidité</li>
                            </br>
                            <li> Fonctionnement Capteur humidité</li>
                            </br> <!-- notification panne capteur -->

                        </ul>

                    </div>
                </li>
                <?php } ?>

            </ul>
        </div>
        <?php
    }
$section = ob_get_clean();
include("gabarit.php");





