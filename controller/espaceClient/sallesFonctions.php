

<?php


function getIndexSalles($tableauDonneesSalles) {
    ob_start();
    ?>

    <section id= "index">
        <h1> Index </h1>
        <div>
            <ul>
                <li><a href="#VueGenerale"> Vue Général </a></li>
                <?php
                for ($salle= 0; $salle<count($tableauDonneesSalles); $salle++) {?>
                    <li><a href="#<?php echo 'salle'.$salle?>"> <?php echo $tableauDonneesSalles[$salle]['nom'] ?></a></li>
                <?php  }
                /*if ($_SESSION["role"] != "Utilisateur secondaire") {*/?>
                <li><a href="/espace-client/ma-maison/creation">ajouter salle</a></li>
                <?php /*}*/?>
            </ul>
        </div>

    </section>
    <?php
    $indexSalle = ob_get_clean();
    return $indexSalle;

}

function getSalles($tableauDonneesSalles)
{
    ob_start();
    for ($salle= 0; $salle<count($tableauDonneesSalles); $salle++) {
        ?>
        <div id="Salle1">
            <h1 id="<?php echo 'salle'.$salle ?>"><?php echo $tableauDonneesSalles[$salle]['nom'] ?></h1>
            <ul>
                <?php if($tableauDonneesSalles[$salle]['temperature']=='oui') { ?>
                <li>
                    <h2> Température </h2>
                    <div class="conteneurModif">
                        <ul>
                            <!-- <li> <a href="ConsommationCT"> Consommation Capteur Température </a> </li>  -->
                            <!-- <li> <a href="PositionsCT"> Positions Capteur Température </a> </li> -->
                            <li> Nombres Capteur Température</li>
                            <br/>
                            <li> Etats Capteur Température</li>
                            <br/> <!--Actif/Inactif-->
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
                if ($tableauDonneesSalles[$salle]['humidite']=='oui') {
                ?>

                <li>
                    <h2> Humidité </h2>
                    <div class="conteneurModif">
                        <ul>
                            <!-- <li> <a href="ConsommationCT"> Consommation Capteur Température </a> </li>  -->
                            <!-- <li> <a href="PositionsCT"> Positions Capteur Température </a> </li> -->
                            <li> Nombres Capteur Humidité</li>
                            <br/>
                            <li> Etats Capteur Humidité</li>
                            <br/> <!--Actif/Inactif-->
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
    $salles = ob_get_clean();
    return $salles;
}




?>

