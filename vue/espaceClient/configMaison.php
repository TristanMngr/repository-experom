<?php
include("vue/header.php");
include("vue/footer.php");
$titre = "première connexion";

ob_start();
?>
    <section id="configMaison">
        <div id="conteneur" class="theme">
            <p>Bienvenue <span><?php echo $_SESSION["pseudo"] ?></span>, c'est ta première connexion, tu dois configurer ta maison</p>
            <form action="/espace-client/premiere-connexion" method="post">
                <div><label class="labelMaison" for="nom">Le nom de ta maison </label><input type="text" name="nom" id="nom" autofocus></div>
                <div><label class="labelMaison" for="superficie">La superficie de ta maison</label><input type="text" name="superficie" id="superficie"></div>
                <div><label class="labelMaison" for="adresse">Ton adresse </label><input type="text" name="adresse" id="adresse"></div>
                <div class="divSubmit"><input class="submitMaison" type="submit" value="Valider"></div>
            </form>
        </div>

    </section>
<?php
$section = ob_get_clean();

include("gabarit.php");