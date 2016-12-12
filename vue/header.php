<?php
ob_start();
?>
<header>
    <h1 class="inline" id="logo">experom</h1>
    <nav class="inline">
        <ul>
            <li class="nonderoulant"><a href="/accueil">accueil</a></li>
            <li class="deroulant"><a href="/espace-client">espace client</a>
                <?php if (isset($_SESSION["ID"])) { ?>
                    <div id="fleche"></div>
                <?php } ?>

                <ul id="deroulant">
                    <?php if (isset($_SESSION["ID"])) { ?> <!--si session on n'affiche pas le menu déroulant-->
                        <li><a href="/espace-client/ma-maison">ma maison</a></li>
                        <li><a href="/espace-client/creer-un-mode">créer un mode</a></li>
                        <?php if ($_SESSION["role"] == "Utilisateur principal"){?>
                            <li><a href="/espace-client/mes-configurations">mes configurations</a></li>
                            <li><a href="/espace-client/modifier-donnees-perso">modifier son compte</a></li>
                        <?php }?>
                    <?php } ?>
                </ul>
            </li>
            <li class="nonderoulant"><a href="/contact">contact</a></li>
        </ul>
    </nav>
    <?php if (isset($_SESSION["ID"])) {?> <!--si la session afficher le bouton déco-->
        <form method = "post" class="inline" action = "/deconnexion-controller" >
            <input type = "submit" value = "deconnexion" ><br/><br/>
            <?php if (isset($_GET["cible"]) && ($_GET["cible"] == "/espace-client/inscription-controller" || $_GET["cible"] == "/espace-client/connexion-controller"))
            {echo $_SESSION["message"];}?>
            <!--si session et si cible existe et si cible=inscription afficher le message-->
        </form >
    <?php } ?>
</header>
<?php
$header = ob_get_clean();