<?php
ob_start();
?>
<header>
    <h1 class="inline" id="logo">experom</h1>
    <nav class="inline">
        <ul>
            <li class="nonderoulant"><a href="index.php?cible=accueil">accueil</a></li>
            <li class="deroulant"><a href="index.php?cible=espaceclient">espace client</a>
                <?php if (isset($_SESSION["userID"])) { ?>
                    <div id="fleche"></div>
                <?php } ?>

                <ul id="deroulant">
                    <?php if (isset($_SESSION["userID"])) { ?> <!--si session on n'affiche pas le menu déroulant-->
                        <li><a href="index.php?cible=espaceclient-maMaison">ma maison</a></li>
                        <li><a href="index.php?cible=espaceclient-creerUnMode">créer un mode</a></li>
                        <?php if ($_SESSION["role"] == "Utilisateur principal"){?>
                            <li><a href="index.php?cible=espaceclient-mesConfigurations">mes configurations</a></li>
                            <li><a href="index.php?cible=espaceclient-modifierDonneesPerso">modifier son compte</a></li>
                        <?php }?>
                    <?php } ?>
                </ul>
            </li>
            <li class="nonderoulant"><a href="index.php?cible=contact">contact</a></li>
        </ul>
    </nav>
    <?php if (isset($_SESSION["userID"])) {?> <!--si la session afficher le bouton déco-->
        <form method = "post" class="inline" action = "index.php?cible=deconnexion" >
            <input type = "submit" value = "deconnexion" ><br/><br/>
            <?php if (isset($_GET["cible"]) && ($_GET["cible"] == "controllerInscription" || $_GET["cible"] == "controllerConnexion"))
            {echo $_SESSION["message"];}?>
            <!--si session et si cible existe et si cible=inscription afficher le message-->
        </form >
    <?php } ?>
</header>
<?php
$header = ob_get_clean();