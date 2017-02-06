<?php
/**
 * suppression de modes
 */

//suppression du mode avec un get de la salle envoyer par javascript
if (isset($_GET['target3'])) {

    //selection dans la table
    $nameMode = str_replace("+"," ", $_GET['target3']);
    $tableau = array('typeDeRequete'=> 'select', 'table'=>'modes', 'param'=>array('nom'=>$nameMode));
    $arrayDataMode = requeteDansTable($db,$tableau);

    if (isset($arrayDataMode[0]['ID'])) {
        $IDmode = $arrayDataMode[0]['ID'];

        //suppression dans la table modes_config
        $tableau = array('typeDeRequete' => 'delete', 'table' => 'modes_config', 'param' => array('ID_mode' => $IDmode));
        $arrayDataMode = requeteDansTable($db, $tableau);

        //suppression dans la table modes
        $tableau = array('typeDeRequete' => 'delete', 'table' => 'modes', 'param' => array('ID' => $IDmode));
        $arrayDataMode = requeteDansTable($db, $tableau);
        $messageSuccess = "Le mode a bien été supprimé";
    }
    else {
        $messageError = "Le mode n'existe pas";
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