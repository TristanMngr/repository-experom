<?php
/**
 * choisie la section html entré en paramètre
 * @param string $page
 * @param string $messageErreur
 * @return null|string
 */

function section($page,$messageErreur) {
    $section = null;
    switch ($page) {
        case "accueil";
            ob_start();
            ?>
            <section>
                <article id="news">
                    <h1>news</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit
                        amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit
                        amet, consectetur
                    </p>
                </article>
                <article id="apropos">
                    <h1>a propos</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit
                        amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                </article>
            </section>
            <?php
            $section = ob_get_clean();
            break;

        case "espaceClientConnexion";
            ob_start();
            ?>
            <section id="conteneur">
                <article id="inscription">
                    <h1>Connexion</h1>
                    <form method="post" action="index.php?cible=connexion">

                        <div><label for="mail">Adresse e-mail</label><input type="text" name="mail" id="mail"></div>

                        <div><label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp"></div>

                        <div><label for="resterConnecter">Maintenir la session ouverte</label><input type="checkbox"
                                                                                                     name="resterConnecter"
                                                                                                     id="resterConnecter">
                        </div>

                        <div id="connexion"><input type="submit" name="connexion" value="connexion"></div>

                    </form>
                    <a href="index.php?cible=inscriptionRedirige">Créer ton compte Experom</a>
                    <p><?php echo $messageErreur; ?></p>

                </article>
            </section>
            <?php
            $section = ob_get_clean();
            break;
        case "espaceClientCreerUnMode";
            ob_start();
            ?>
            <section id="mode">
                <h1>Paramétrer mes modes</h1>
                <div>
                    <h2>Mode Present</h2>
                    <ul>
                        <li>
                            <h3>Temperature</h3><label for="presentTemp">Lorsque tu es présent</label><input type="text"
                                                                                                             name="presentTemp"
                                                                                                             id="presentTemp"
                                                                                                             class="inputMode"
                                                                                                             value="24">
                            <input type="submit" value="Valider">
                        </li>
                        <li>
                            <h3>Lumiere</h3>
                            <label>On</label><input type="radio" value="On" name="modePresentLumiere" checked>
                            <label>Off</label><input type="radio" value="Off" name="modePresentLumiere">
                        </li>
                    </ul>
                </div>
                <div>
                    <h2>Mode absent</h2>
                    <ul>
                        <li>
                            <h3>Temperature</h3><label for="absentTemp">Lorsque tu es absent</label><input type="text"
                                                                                                           id="absentTemp"
                                                                                                           class="inputMode"
                                                                                                           value="19">
                            <input type="submit" value="Valider">
                        </li>
                        <li>
                            <h3>Lumiere</h3>
                            <label>On</label><input type="radio" value="On" name="modeAbsentLumiere">
                            <label>Off</label><input type="radio" value="Off" name="modeAbsentLumiere" checked>
                        </li>
                    </ul>
                </div>

            </section>

            <?php
            $section = ob_get_clean();
            break;
        case "espaceClientInscription";
            ob_start();
            ?>
            <section id="conteneur">
                <article id="inscription">
                    <h1>Inscription</h1>
                    <form method="post" action="index.php?cible=inscription">
                        <div><label for="nom">Nom</label><input type="text" name="nom" id="nom"></div>
                        <div><label for="mail">E-mail</label><input type="text" name="mail" id="mail"></div>
                        <div><label for="adresse">Adresse</label><input type="text" name="adresse" id="adresse"></div>
                        <div><label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp"></div>
                        <div><label for="rmdp">Votre mot de passe, encore</label><input type="password" name="rmdp"
                                                                                        id="rmdp"></div>
                        <div id="envoyer"><input type="submit" name="submit" value="Envoyer"></div>
                    </form>

                    <a href="index.php?cible=ceConnecter">Déja inscrit ? Connecte-toi !</a>
                    <p><?php {
                            echo $messageErreur;
                        } ?> </p>
                </article>
            </section>

            <?php
            $section = ob_get_clean();
            break;
        case "espaceClientMesConfigurations";
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


                    <div id="salleConteneur">
                        <h2>Chambre</h2>
                        <form method="post">
                            <div class="conteneurModif">
                                <p>Température<em>: 25°</em></p>
                                <ul>
                                    <li>
                                        <label for="temperatureChambre">Modifier température :</label><input type="text"
                                                                                                             name="temperatureChambre"
                                                                                                             value=""
                                                                                                             id="temperatureChambre"
                                                                                                             class="saisieUtilisateur">

                                    </li>
                                    <li>
                                        <p>Eteindre le chauffage : </p>
                                        <p class="radio">
                                            <label for="chauffageChambreOui">oui</label><input type="radio"
                                                                                               name="chauffageChambre"
                                                                                               id="chauffageChambreOui">
                                            <label for="chauffageChambreNon">non</label><input type="radio"
                                                                                               name="chauffageChambre"
                                                                                               id="chauffageChambreNon"
                                                                                               checked="checked">
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
                                            <label for="humiditeChambreOui">oui</label><input type="radio"
                                                                                              name="humiditeChambre"
                                                                                              id="chauffageChambreOui">
                                            <label for="humiditeChambreNon">non</label><input type="radio"
                                                                                              name="humiditeChambre"
                                                                                              id="humiditeChambreNon"
                                                                                              checked="checked">
                                        </p>
                                    </li>
                                    <input type="submit" value="Modifier" class="inputBloc">
                                </ul>
                            </div>
                            <div class="conteneurModif">
                                <p>Lumiere<em>: 2</em></p>
                                <ul>
                                    <li>
                                        <label for="luminositeChambre">Modifier luminosité :</label><input type="text"
                                                                                                           name="luminositeChambre"
                                                                                                           value=""
                                                                                                           id="luminositeChambre"
                                                                                                           class="saisieUtilisateur">

                                    </li>
                                    <li>
                                        <p>Eteindre lumières : </p>
                                        <p class="radio">
                                            <label for="lumiereChambreOui">oui</label><input type="radio"
                                                                                             name="lumiereChambre"
                                                                                             id="umiereChambreOui">
                                            <label for="lumiereChambreNon">non</label><input type="radio"
                                                                                             name="lumiereChambre"
                                                                                             id="lumiereChambreNon"
                                                                                             checked="checked">
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
                                            <label for="comportementOui">oui</label><input type="radio"
                                                                                           name="comportement"
                                                                                           id="comportementOui"
                                                                                           checked="checked">
                                            <label for="comportementNon">non</label><input type="radio"
                                                                                           name="comportement"
                                                                                           id="comportementNon">
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
                            <label for="temperatureSalleSejour">Température</label><em>: 24°</em><input type="text"
                                                                                                        name="temperatureSalleSejour"
                                                                                                        value=""
                                                                                                        id="temperatureSalleSejour"
                                                                                                        class="saisieUtilisateur">
                            <input type="submit" value="modifier" class="inputBloc">
                        </form>
                        <form method="post">
                            <label for="humiditeSalleSejour">Humidité</label><em>: 50%</em><input type="text"
                                                                                                  name="humiditeSalleSejour"
                                                                                                  value=""
                                                                                                  id="humiditeSalleSejour"
                                                                                                  class="saisieUtilisateur">
                            <input type="submit" value="modifier" class="inputBloc">
                        </form>
                        <form method="post">
                            <label for="lumiereSalleSejour">Lumières allumés</label><em>: 1</em><input type="text"
                                                                                                       name="lumiereSalleSejour"
                                                                                                       value=""
                                                                                                       id="lumiereSalleSejour"
                                                                                                       class="saisieUtilisateur">
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
            break;
        case "espaceClientModifierDonneesPerso";
            ob_start();
            ?>
            <section id="modifierDonnerPersonnel">
                <h1>Mon compte</h1>

                <div id="profil">
                    <h2>Profil du membre</h2>
                    <ul>
                        <li>E-mail: </li>
                        <li>Nom: </li>
                        <li>Adresse:</li>
                    </ul>
                </div>
                <div id="modifier">
                    <h2>Modifier mes informations</h2>
                    <form>
                        <div><label for="modifierPseudo">Modifier mon E-mail</label><input type="text"
                                                                                           name="modifierPseudo"
                                                                                           id="modifierPseudo"></div>
                        <div><label for="modifierMdp">Modifier mon mot de passe</label><input type="text"
                                                                                              name="modifierMdp"
                                                                                              id="modifierMdp"></div>
                        <input type="submit" value="Valider" class="envoyer">

                    </form>

                    <input type="submit" name="modifierDroit" value="Modifier les droits utilisateurs" class="envoyer">

                </div>
            </section>
            <?php
            $section = ob_get_clean();
            break;
    }

    return $section;

}

