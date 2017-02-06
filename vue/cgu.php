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
$titre = "CGU";

ob_start();
?>
    <section id="cgu-foot-section">
        <h1>Conditions Générales d'utilisation</h1>
        <div id="cgu-foot">
            <p><?php if ($textCGU != "") { echo $textCGU; } else { echo "Les CGU doivent être mises à jour"; } ?></p>
        </div>
    </section>
<?php
$section = ob_get_clean();
include('gabarit.php');
