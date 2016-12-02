<?php
$titre = "Mes configurations";
$header = headerPage();

ob_start();
?>
<section id="mamaison">
    <!-- header de section -->
    <h1>ma maison</h1>
    <div class="navSalle">
        <div><a href="#vueGenerale">Vue générale</a></div>
        <div><a href="#chambre">Chambre</a></div>
        <div><a href="#salledesejour">Salle de séjour</a></div>
        <div><a href="#cuisine">Cuisine</a></div>
        <div><a href="#ajouter">ajouter</a></div>
    </div>
    <!-- Toutes les salles -->
    <div id="salles">
        <!-- <div id="vueGenerale">
            <h2>Vue Générale</h2>
            <h3>Température moyenne</h3>
            <h3>Humidité</h3>
            <h3>Lumière allumé</h3>
            <h3 id="consommation">Consommation</h3>
        </div> -->
        <div id="salleConteneur">
            <h2>Chambre</h2>
            <form method="post">
                <div class="conteneurModif">
                    <p>Température<em>: 25°</em></p>
                    <ul>
                        <li>
                            <label for="temperatureChambre">Modifier température :</label><input type="text" name="temperatureChambre" value="" id="temperatureChambre" class="saisieUtilisateur">

                        </li>
                        <li>
                            <p>Eteindre le chauffage : </p>
                            <p class="radio">
                                <label for="chauffageChambreOui">oui</label><input type="radio" name="chauffageChambre" id="chauffageChambreOui">
                                <label for="chauffageChambreNon">non</label><input type="radio" name="chauffageChambre" id="chauffageChambreNon" checked="checked">
                            </p>
                        </li>
                        <input type="submit" value="Modifier" class="inputBloc">
                    </ul>
                </div>
                <div class="conteneurModif">
                    <p>Humidité<em>: 45%</em></p>
                    <ul>
                        <li>
                            <p>Arrêter :</p>
                            <p class="radio">
                                <label for="humiditeChambreOui">oui</label><input type="radio" name="humiditeChambre" id="chauffageChambreOui">
                                <label for="humiditeChambreNon">non</label><input type="radio" name="humiditeChambre" id="humiditeChambreNon" checked="checked">
                            </p>
                        </li>
                        <input type="submit" value="Modifier" class="inputBloc">
                    </ul>
                </div>
                <div class="conteneurModif">
                    <p>Lumiere<em>: 2</em></p>
                    <ul>
                        <li>
                            <label for="luminositeChambre">Modifier luminosité :</label><input type="text" name="luminositeChambre" value="" id="luminositeChambre" class="saisieUtilisateur">

                        </li>
                        <li>
                            <p>Eteindre lumières : </p>
                            <p class="radio">
                                <label for="lumiereChambreOui">oui</label><input type="radio" name="lumiereChambre" id="umiereChambreOui">
                                <label for="lumiereChambreNon">non</label><input type="radio" name="lumiereChambre" id="lumiereChambreNon" checked="checked">
                            </p>
                        </li>
                        <input type="submit" value="Modifier" class="inputBloc">
                    </ul>

                </div>
                <div class="conteneurModif">
                    <p>M'avertir en cas de comportement anormal: </p>
                    <ul>
                        <li>
                            <p class="radio">
                                <label for="comportementOui">oui</label><input type="radio" name="comportement" id="comportementOui" checked="checked">
                                <label for="comportementNon">non</label><input type="radio" name="comportement" id="comportementNon" >
                            </p>
                        </li>
                        <input type="submit" value="Modifier" class="inputBloc">
                    </ul>
                </div>
            </form>
        </div>
        <div id="salleConteneur">
            <h2>Salle de Séjour</h2>
            <form method="post">
                <label for="temperatureSalleSejour">Température</label><em>: 24°</em><input type="text" name="temperatureSalleSejour" value="" id="temperatureSalleSejour" class="saisieUtilisateur">
                <input type="submit" value="modifier" class="inputBloc">
            </form>
            <form method="post">
                <label for="humiditeSalleSejour">Humidité</label><em>: 50%</em><input type="text" name="humiditeSalleSejour" value="" id="humiditeSalleSejour" class="saisieUtilisateur">
                <input type="submit" value="modifier" class="inputBloc">
            </form>
            <form method="post">
                <label for="lumiereSalleSejour">Lumières allumés</label><em>: 1</em><input type="text" name="lumiereSalleSejour" value="" id="lumiereSalleSejour" class="saisieUtilisateur">
                <input type="submit" value="modifier" class="inputBloc">
            </form>

        </div>
        <div id="">
            <h2>Salle de séjour</h2>

            <h3>Température: 24°</h3>
            <h3>Humidité: 50%</h3>
            <h3>Lumière allumé: 1</h3>
        </div>
        <div id="cuisine"><h2>Cuisine</h2>

            <h3>Température</h3>
            <h3>Humidité</h3>
            <h3>Lumière allumé</h3>
        </div>
        <div id="ajouter"><h2>ajouter</h2>

            <h3>Température</h3>
            <h3>Humidité</h3>
            <h3>Lumière allumé</h3>
        </div>
    </div>
</section>

<?php
$section = ob_get_clean();

$footer = footer();

include("gabarit.php");
?>









