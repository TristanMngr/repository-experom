<?php
/**
 * suppression de salle
 */

/*suppression de salle envoyer par javascript*/
if (isset($_GET['target3'])) {

    $removeSalle = $_GET['target3'];


    // on récupère l'id de la salle
    $tableau = array('typeDeRequete' => 'select', 'table' => 'salles', 'param' => array('nom' => $removeSalle, 'IDmaison' => $_SESSION['IDmaison']));
    $dataSalle = requeteDansTable($db, $tableau);


    if (isset($dataSalle[0]['nom'])) {
        $nomSalle = $dataSalle[0]['nom'];
        $idSalle = $dataSalle[0]['ID'];


        // on remet les valeurs des ID_capteur à 0

        $tableau = array('typeDeRequete' => 'update', 'table' => 'capteurs', 'setValeur' => 'ID_salle', 'champ' => 'ID_salle', 'param' => array('setValeur' => 0, 'champ' => $idSalle));
        requeteDansTable($db, $tableau);

        /*$tableau = array('typeDeRequete'=>'select', 'table'=>'capteurs','param'=>array('ID_salle'=>$idSalle));
        $capteursSalle = requeteDansTable($db,$tableau);*/


        /*for ($capteur = 0; $capteur < count())*/

        $tableau = array(
            'typeDeRequete' => 'delete',
            'table' => 'salles',
            'param' => array(
                'IDmaison' => $_SESSION['IDmaison'],
                'nom' => $_GET['target3']));

        requeteDansTable($db, $tableau);

        $tableau = array('typeDeRequete' => 'select', 'table' => 'salles', 'param' => array('IDmaison' => $_SESSION['IDmaison']));
        if (count(requeteDansTable($db, $tableau)) == 1) {
            $tableau = array('typeDeRequete' => 'delete',
                'table' => 'salles',
                'param' => array(
                    'IDmaison' => $_SESSION['IDmaison'],
                    'nom' => 'general'));
            requeteDansTable($db, $tableau);
            $showGeneral = false;


        }

        $messageError = "Vous avez bien supprimé : " . $removeSalle;


    }

// on remet à zero l'id du mode si il n'y'a aucune salle.
    $tableau = array('typeDeRequete' => 'select', 'table' => 'salles', 'param' => array('IDmaison' => $_SESSION['IDmaison']));
    if (requeteDansTable($db, $tableau) == array()) {
        $tableau = array('typeDeRequete' => 'update', 'table' => 'salles', 'setValeur' => 'ID_mode', 'champ' => 'ID', 'param' => array('setValeur' => 0, 'champ' => -1));
        requeteDansTable($db, $tableau);
    }


// On réactualise les données.

    $tableau = array('IDmaison' => $_SESSION['IDmaison']);
    $tableauDonneesSalles = getDataCapteursByNameSalle($db, $tableau);

}

include('vue/espaceClient/maMaison.php');