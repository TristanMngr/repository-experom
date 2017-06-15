<?php
include("vue/header.php");
include("vue/footer.php");
$titre = "accueil";

ob_start();
?>
<section id="accueil">
    <!--<img src="ressources/images/buildings.png" alt="buildings" class="images">-->

    <article id="apropos">
        <?php /*echo mail('domisep.contact@gmail.com','test','salut je test addresse mail'); */?>
        <h1>Domisep : La Domotique Idéale, Simple Et Pratique</h1>

        <h2>La domotique, c’est quoi?</h2>
        <p>
        La domotique est l'ensemble des techniques de l'électronique, de physique du bâtiment, d'automatisme, de l'informatique et des télécommunications utilisées dans les bâtiments, plus ou moins « interopérables » et permettant de centraliser le contrôle des différents systèmes et sous-systèmes de la maison et de l'entreprise (chauffage, volets roulants, porte de garage, portail d'entrée, prises électriques, etc.). La domotique vise à apporter des solutions techniques pour répondre aux besoins de confort (gestion d'énergie, optimisation de l'éclairage et du chauffage), de sécurité (alarme) et de communication (commandes à distance, signaux visuels ou sonores, etc.) que l'on peut retrouver dans les maisons, les hôtels, les lieux publics, etc.

        Que peut on faire grâce à la domotique ?

        On peut dire que la domotique trouve sa place dans trois domaines principaux en particulier.
        </p>

        <h2>Le confort</h2>
        <p>
        Aujourd’hui, une maison intelligente est capable d’être contrôlée à distance (grâce à votre smartphone par exemple). Vous pouvez ainsi adapter vous-même votre chauffage pour que la maison soit toujours à la température idéale pour vous avant même que vous n’arriviez.
        </p>

        <h2>Les économies d’énergie</h2>

        <p>En gérant le chauffage et les lumières selon l’heure du jour, le système domotique vous permet d’économiser de l’énergie, et donc de l’argent, même si au départ on ne recherchait que le confort en plus. La consommation d’énergie peut être suivie très finement, qu’il s’agisse de votre consommation d’électricité, d’eau, ou même de gaz.</p>

        <h2>La sécurité</h2>

        <p class="last">
        Les automatismes que nous avons vus plus haut peuvent tout à fait contribuer à la sécurité de vos biens, en réalisant ce qu’on appelle une simulation de présence :  même en votre absence, des lumières s’allument aléatoirement. Ainsi, de l’extérieur, il devient très difficile de savoir si la maison est inoccupée, ce qui dissuade de nombreux cambrioleurs.
        Une détection de fuite d’eau peut être détecté afin d’éviter de gros dégats.
        </p>




    </article>
</section>
<?php
$section = ob_get_clean();
include('gabarit.php');