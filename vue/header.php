<?php
ob_start();
?>
<header>
    <a href="/accueil"  class="inline logo" ><h1 class="logo"><span>experom</span></h1></a>
    <nav class="inline">
        <ul id="menuAccueil">
            <li class="nonderoulant"><a href="/accueil">accueil</a></li>
            <li class="deroulant"><a href="/espace-client">espace client</a>
                <?php if (isset($_SESSION["ID"])) { ?>
                    <div id="fleche"></div>
                <?php } ?>

                <ul class="deroulant">
                    <?php if (isset($_SESSION["ID"])) { ?> <!--si session on n'affiche pas le menu déroulant-->
                        <li><a href="/espace-client/ma-maison">Maison</a></li>
                        <li><a href="/espace-client/modes">Modes</a></li>
                        <?php if ($_SESSION["role"] == "principal"){?>
                            <li id="menuLast"><a href="/espace-client/modifier-donnees-perso">Comptes</a></li>
                        <?php }?>
                    <?php } ?>
                </ul>
            </li>
            <li class="nonderoulant"><a href="/contact">contact</a></li>
        </ul>
    </nav>
    <?php if (isset($messageGeneral)) { ?>
    <div align="center" id="deconnexion"><?php echo $messageGeneral;?></div> <?php } ?>
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