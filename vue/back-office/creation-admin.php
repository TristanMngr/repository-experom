<?php
include("vue/back-office/header.php");
include("vue/back-office/footer.php");
$titre = "création-admin";

ob_start();
?>

    <section>
        <div>
            creation admin
        </div>

    </section>


<?php
$section = ob_get_clean();

include("gabarit.php");