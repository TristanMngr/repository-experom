<?php
include("vue/header.php");
include("vue/footer.php");
$titre = "première connexion";

ob_start();
?>
    <section id="configMaison">
        <div>
            <p>Bienvenue <?php echo $_SESSION["pseudo"] ?>, c'est ta première connexion, tu dois configurer ta maison :</p>
            <form action="/espace-client/premiere-connexion" method="post">
                <label for="nom">Le nom de ta maison </label><input type="text" name="nom" id="nom">
                <label for="superficie">La superficie de ta maison</label><input type="text" name="superficie" id="superficie">
                <label for="adresse">Ton adresse </label><input type="text" name="adresse" id="adresse">
                <input type="submit" value="Valider">
            </form>
        </div>

    </section>
<?php
$section = ob_get_clean();

include("gabarit.php");