<?php
/**
 * choisie la section html entré en paramètre
 * @param string $page
 * @param string $messageErreur
 * @return null|string

 */

function section($page,$messageErreur,$utilisateurSecondaire) {
    $section = null;
    switch ($page) {



        case "espaceClientCreerUnMode";

            break;
        case "espaceClientInscription";

            break;
        case "espaceClientModifierDonneesPerso";

            break;

            case "contact";


            break;


    }

    return $section;

}
?>

