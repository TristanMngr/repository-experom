<?php
/**
 * suppression de modes
 */


if (isset($_POST['removeMode'])) {

    //selection dans la table
    $tableau = array('typeDeRequete'=> 'select', 'table'=>'modes', 'param'=>array('nom'=>$_POST['removeMode']));
    $arrayDataMode = requeteDansTable($db,$tableau);

    if (isset($arrayDataMode[0]['ID'])) {
        $IDmode = $arrayDataMode[0]['ID'];

        //suppression dans la table modes_config
        $tableau = array('typeDeRequete' => 'delete', 'table' => 'modes_config', 'param' => array('ID_mode' => $IDmode));
        $arrayDataMode = requeteDansTable($db, $tableau);

        //suppression dans la table modes
        $tableau = array('typeDeRequete' => 'delete', 'table' => 'modes', 'param' => array('ID' => $IDmode));
        $arrayDataMode = requeteDansTable($db, $tableau);
        $messageSucces = "Le mode à bien été supprimer";
    }

    else {
        $messageError = "Désolé le mode n'existe pas/plus";
    }
}


// On réactualise l'affichage.
$tableau = array('param'=> array('champ'=>$_SESSION["IDmaison"]));

$tableauDonneesMode = getDataMode($db,$tableau);
$arrayNameMode = array();

for ( $k = 0; $k < count($tableauDonneesMode); $k ++ ) {
    $arrayNameMode[] = $tableauDonneesMode[$k]['nom'];
}
$arrayNameMode = array_unique($arrayNameMode);



include('vue/espaceClient/creerUnMode.php');