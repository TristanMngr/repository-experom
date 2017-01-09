<?php



if ($_GET['target2'] == 'creer-un-mode') {

    if (isset($_POST['nom']) & !empty($_POST['nom'])) {
        // verifie que le nom n'es pas déja pris pour cette maison.
        $tableau = array('typeDeRequete' => "select", "table" => "modes", 'param' => array('nom' => $_POST['nom'], 'IDmaison' => $_SESSION['IDmaison']));
        if (requeteDansTable($db, $tableau) == array()) {

            // insertion dans la table 'modes'.
            $tableau = array('typeDeRequete' => 'insert', 'table' => 'modes', 'param' => array('nom' => $_POST['nom'], 'IDmaison' => $_SESSION['IDmaison']));
            requeteDansTable($db, $tableau);
            $lastID = getLastID($db);

            $arrayDataConfig = postDataArray();


            // on parcours le nouveau tableau et on verifie que les variables existent, qu'elles ne sont pas vides, et que ce sont des nombres.
            // puis on insert dans la table 'mode_config'
            foreach ($arrayDataConfig as $arrayByType) {
                if (isIssetVariable($arrayByType)) {
                    if (isNoEmptyVariable($arrayByType)) {
                        if (isNumber($arrayByType)) {

                            $tableau = array('typeDeRequete' => 'insert', 'table' => 'modes_config', 'param' => array('type' => $arrayByType['type'], 'consigne' => $arrayByType['consigne'], 'heure_debut' => $arrayByType['timeBegin'], 'heure_fin' => $arrayByType['timeEnd'], 'ID_mode' => $lastID));
                            requeteDansTable($db, $tableau);
                            $messageSuccess = "Votre mode à été créer avec succès !";
                        } else {
                            $messageError = "vous devez entrer des nombres";
                        }
                    } else {
                        $messageError = "Tout les champs ne sont pas remplie ";
                    }
                } else {
                    $messageError = "Les variable n'existe pas";
                }
            }
        } else {
            $messageError = "Attention ce nom de modes existe déja";
        }
    } else {
        $messageError = "Tu n'as pas renseigné le nom du modes";
    }
}
// on réactualise
$tableau = array('param'=> array('champ'=>$_SESSION["IDmaison"]));

$tableauDonneesMode = getDataMode($db,$tableau);


// création d'un tableau avec les noms des modes et suppression des doublons
$arrayNameMode = array();

for ( $k = 0; $k < count($tableauDonneesMode); $k ++ ) {
    $arrayNameMode[] = $tableauDonneesMode[$k]['nom'];
}
$arrayNameMode = array_unique($arrayNameMode);


include("vue/espaceClient/creerUnMode.php");




