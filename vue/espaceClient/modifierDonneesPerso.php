<?php
include("vue/header.php");
include("vue/footer.php");
ob_start();
$titre = "donnée perso";

?>
<section id="modifierDonnerPersonnel">
    <div id="conteneurDonnerPerso">
        <div id="monCompte">
            <h1>Mon compte</h1>
            <div id="modifier">
                <h2>Modifier mes informations</h2>
                <form method="post" action="/espace-client/modifier-donnees-perso-control">
                    <div><em class="informations">Rôle: </em><div class="informations"><?php echo $_SESSION['role'] ?></div></div>
                    <div><em class="informations">Inscrit le: </em><div class="informations"><?php echo $_SESSION['dateInscription'] ?></div></div>
                    <div><label for="modifierMail">E-mail</label><input type="text"
                                                                                     name="modifierMail"
                                                                                     id="modifierMail"
                        value="<?php echo $_SESSION['mail'] ?>"></div>
                    <div><label for="modifierNom">Nom</label><input type="text" name="modifierNom" id="modifierNom" value="<?php echo $_SESSION['nom'] ?>"></div>

                    <div><label for="modifierAdresse">Adresse</label><input type="text"
                                                                                     name="modifierAdresse"
                                                                                     id="modifierAdresse"
                        value="<?php echo $_SESSION['adresse'] ?>"></div>
                    <div><label for="modifierNumero">Numero de téléphone</label><input type="text"
                                                                                     name="modifierNumero"
                                                                                     id="modifierNumero"
                        value="<?php echo $_SESSION['numero'] ?>"></div>
                    <div><label for="modifierMdp">Mot de passe</label><input type="password"
                                                                                          name="modifierMdp"
                                                                                          id="modifierMdp"></div>

                    <!--TODO verifiacation du mot de passe-->
                    <div><label for="verifMdp">Vérification mot de passe</label><input type="password"
                                                                             name="verifMdp"
                                                                             id="verifMdp"></div>


                    <div id="envoyer-modifier">
                        <input type="submit" value="Valider" class="envoyer">
                    </div>


                </form>
                <?php if (isset($messageE)) { ?>
                    <div class="messageError"><?php echo $messageE; ?></div>
                <?php } if (isset($messageS)) {?>
                    <div class="messageSuccess"><?php echo $messageS; ?></div>
                <?php } ?>
                <div class="link"><a href="/espace-client/modifier-donnees-perso/ajouter-un-utilisateur">Ajouter un utilisateur secondaire</a></div>

            </div>
        </div>
        <?php if($isPresentUtilisateur == True) { ?>
        <div id="maFamille">
            <h1>Ma famille</h1>
            <div id="utilisateurs">
                <h2>Tout mes utilisateurs</h2>
                    <ul>
                        <?php for ($comptes=1; $comptes<=count($donneesComptes); $comptes++) { ?>
                        <li>
                            <div class="supprimerCompte"><?php echo $donneesComptes[$comptes]['pseudo'];?></div>
                                <input type="submit" value="supprimer" onclick="deleteConf('<?php echo $donneesComptes[$comptes]['pseudo']; ?>','utilisateur')" class="inputRemove">
                        </li>
                        <?php } ?>
                    </ul>
                <?php if (isset($messageError)) { ?>
                <div class="messageError"><?php echo $messageError; ?></div>
                <?php } if (isset($messageSuccess)) { ?>
                <div class="messageSuccess"><?php echo $messageSuccess; ?></div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    </div>
</section>
<?php
$section = ob_get_clean();
include("gabarit.php");




