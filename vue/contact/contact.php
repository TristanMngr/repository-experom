<?php
include("vue/header.php");
include("vue/footer.php");
$titre = "contact";
ob_start();
?>
<section id="contact">
    <div class="contact">
    <h1>Nous contacter</h1>


        <ul>
            <li><div>Localisation :</div><em>10 rue de Vanves</em> </li>
            <li><div>numéro de telephone: </div><em>0650205045</em>  </li>
            <li><div>E-mail : </div><em><a href="mailto: domisep@free.fr" class="email"> domisep@free.fr</a></em></li>
        </ul>
    </div>
</section>
<?php
$section = ob_get_clean();
include("gabarit.php");