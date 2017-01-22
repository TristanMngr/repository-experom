<?php
include("vue/header.php");
include("vue/footer.php");

$titre = "CGU";

ob_start();
?>
    <section id="section-error">
        <div id="error">
            <?php if (isset($_SESSION['role'])) {
                if  ($_SESSION['role'] == 'admin') { ?>

            <p>Vous devez vous déconnecter du compte admin pour pouvoir accéder à cette section</p>

                <?php } else if ($_SESSION['role']=='principal') { ?>

            <p>Vous devez vous déconnecter votre compte pour pouvoir accéder à cette section</p>

                <?php } else { ?>
            <p>Vous ne disposez pas des droits nécessaires pour accéder à cette page</p>

            <?php }} ?>
        </div>

    </section>
<?php
$section = ob_get_clean();
include('gabarit.php');
