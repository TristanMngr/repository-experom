<?php

function headerPage()
{
    ob_start();
    ?>
    <header>
        <h1 class="inline" id="logo">experom</h1>
        <nav class="inline">
            <ul>
                <li class="nonderoulant"><a href="index.php?cible=accueil">accueil</a></li>
                <li class="deroulant"><a href="index.php?cible=espaceclient">espace client</a>
                    <div id="fleche"></div>
                    <ul id="deroulant">
                        <?php if (isset($_SESSION["userID"])) { ?>
                            <li><a href="index.php?cible=espaceclient-maMaison">ma maison</a></li>
                            <li><a href="index.php?cible=espaceclient-creerUnMode">créer un mode</a></li>
                            <li><a href="index.php?cible=espaceclient-mesConfigurations">mes configurations</a></li>
                            <li><a href="index.php?cible=espaceclient-modifierDonneesPerso">modifier son compte</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nonderoulant"><a href="index.php?cible=contact">contact</a></li>
            </ul>
        </nav>
        <?php if (isset($_SESSION["userID"])) {?>
            <form method = "post" class="inline" action = "index.php?cible=deconnexion" >
            <input type = "submit" name = "valider" value = "deconnexion" >
        </form >
        <?php } ?>
    </header>
    <?php
    $header = ob_get_clean();
    return $header;
}


function footer()
{
    ob_start();
    ?>
    <footer>
    <ul id="footer">
        <li>CGU</li>
        <li>Mentions légales</li>
        <li>Contact</li>
        <li>Partenaires</li>
    </ul>
    </footer>
    <?php
    $footer = ob_get_clean();
    return $footer;

}