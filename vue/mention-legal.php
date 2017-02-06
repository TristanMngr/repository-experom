<?php
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != 'admin') {
        include("vue/header.php");
        include("vue/footer.php");
    } else {
        include("vue/back-office/header.php");
        include("vue/back-office/footer.php");
    }
}
else {
    include("vue/header.php");
    include("vue/footer.php");
}
$titre = "mention légal";

ob_start();
?>
    <section id="mention-legale">
        <div>
            <h1>Mentions légales</h1>

            <h2>Propriétaire du site Internet</h2>
            <p>Ce site Internet est la propriété de Domisep</p>

            <h2>Hébergement</h2>
            <p>Ce site est hébergé sur un serveur privé</p>


            <h2>Développement</h2>
            <p>Ce site a été développé par une entreprise d'expert: Experom</p>
        </div>
    </section>
<?php
$section = ob_get_clean();
include('gabarit.php');
