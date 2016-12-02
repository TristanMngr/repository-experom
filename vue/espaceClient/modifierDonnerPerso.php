<?php

$titre = "modifier mes capteurs";
$header = headerPage();

ob_start();
?>
<section id="modifierDonnerPersonnel">
    <h1>Mon compte</h1>

    <div id="profil">
        <h2>Profil du membre</h2>
        <ul>
            <li>E-mail</li>
            <li>Nom</li>
            <li>Adresse</li>
        </ul>
    </div>
    <div id="modifier">
        <h2>Modifier mes informations</h2>
        <form>
            <div><label for="modifierPseudo">Modifier mon E-mail</label><input type="text" name="modifierPseudo" id="modifierPseudo"></div>
            <div><label for="modifierMdp">Modifier mon mot de passe</label><input type="text" name="modifierMdp" id="modifierMdp"></div>
            <input type="submit" value="Valider" class="envoyer">

        </form>

        <input type="submit" name="modifierDroit" value="Modifier les droits utilisateurs" class="envoyer">

    </div>
</section>
<?php
$section = ob_get_clean();

$footer = footer();

include("gabarit.php");
?>






