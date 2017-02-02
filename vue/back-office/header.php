<?php
ob_start();
?>
    <header>
        <a href='/accueil' class="inline logo" ><img src="/vue/style/images/logo-header.png" alt="logo_domisep" class="logo"></a></a>
        <nav class="inline">

            <?php if ($isLogin == true) { ?>
            <ul id="menuAccueil">
                <li class="nonderoulant"><a href="/admin/utilisateurs">Utilisateurs</a></li>
                <li class="nonderoulant"><a href="/admin/cgu-editer">CGU</a></li>
                <li class="nonderoulant"><a href="/admin/creation-admin">Créer un admin</a></li>
            </ul>
            <?php } else { ?>
            <ul id="menuAccueil-BO">
                <li><h1>Administrateur</h1></li>
            </ul>
            <?php } ?>
        </nav>

        <?php if (isset($_SESSION["ID"])) {?> <!--si la session afficher le bouton déco-->

            <form method = "post" class="inline" action = "/deconnexion-controller" >
                <input type = "submit" value = "déconnexion" ><br/><br/>
                <?php if (isset($_GET["cible"]) && ($_GET["cible"] == "/espace-client/inscription-controller" || $_GET["cible"] == "/espace-client/connexion-controller"))
                {echo $_SESSION["message"];}?>

                <!--si session et si cible existe et si cible=inscription afficher le message-->
            </form >
        <?php } ?>
    </header>
<?php
$header = ob_get_clean();