<?php
include("vue/header.php");
include("vue/footer.php");
ob_start();
$titre = "vue des capteurs";
?>
<section id= "index">
    <h1> Index </h1>
    <div>
        <ul>
            <li><a href="#VueGenerale"> Vue Générale</a></li>
            <li><a href="#Salle1"> Salle 1</a> </li>
            <li><a href="/espace-client/ma-maison/creation">ajouter salle</a></li>
        </ul>
    </div>

</section>

<section id="corps">
    <?php if(isset($_GET['target2']) & $_GET['target2']== 'creation') {?>
    <div id="creation">
        <h1>Création d'une salle</h1>
        <form action="/espace-client/ma-maison" method="post">
            <ul>
                <li><em>ajouter température</em>
                    <label for="temperatureOui">Oui</label><input type="radio" name="temperature" value="oui" id="temperatureOui" checked>
                    <label for="temperatureNon">Non</label><input type="radio" name="temperature" value="non" id="temperatureNon">
                </li>
                <li><em>ajouter température</em>
                    <label for="humiditeOui">Oui</label><input type="radio" name="humidite" value="oui" id="humiditeOui" checked>
                    <label for="humiditeNon">Non</label><input type="radio" name="humidite" value="non" id="humiditeNon">
                </li>
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

    <div id="Salle1">
        <h1>Salle 1</h1>
        <ul>
            <li>
                <h2> Température </h2>
                <div class="conteneurModif">
                    <ul>
                        <!-- <li> <a href="ConsommationCT"> Consommation Capteur Température </a> </li>  -->
                        <!-- <li> <a href="PositionsCT"> Positions Capteur Température </a> </li> -->
                        <li> Nombres Capteur Température  </li> <br/>
                        <li> Etats Capteur Température  </li> <br/> <!--Actif/Inactif-->
                        <li>
                            <div class="formu">Modifier état : </div>
                            <form method="post" action= "traitement.php" class="formu">

                                <label for= "étatActifoui"> Actif </label> <input type= "radio" name= "état" id="étatActifoui" checked="checked"/>
                                <label for="étatActifnon"> Inactif </label> <input type= "radio" name= "état" id="étatActifnon" />

                                <input type="submit" value="Envoyer" />
                            </form>
                        </li> <br/>


                        <li>  Modes température modes :
                            <form method="post" action ="traitement.php">
                                <p class="modifMode">
                                    <label for= "mode1"> Mode1 </label> <input type="radio" name="mode" id="mode1"/>
                                    <label for="mode2"> Mode2 </label> <input type="radio" name="mode" id="mode2"/>
                                    <label for="mode3"> Mode3 </label> <input type="radio" name="mode" id="mode3"/>


                                </p>
                                <input type="submit" value="Envoyer" />
                            </form> </br>
                        </li>

                        <li>  Mesures Capteur Température  </li> </br>
                        <li> Fonctionnement Capteur Température  </li> </br> <!-- notification panne capteur -->

                    </ul>

                </div>
            </li>

        </ul>
    </div>
</section>
<?php
$section = ob_get_clean();
include("gabarit.php");




