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
        </ul>
    </div>

</section>

<section id="corps">
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




