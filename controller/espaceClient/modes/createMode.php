<?php

// verifie que les variable post existe.
function isIssetVariable($tableauPost) {
    $tableau = array();
    foreach ($tableauPost as $key => $value) {
        if (isset($tableauPost[$key])) {
            $tableau[$key] = $value;
        }
    }
    if (count($tableauPost) != count($tableau)) {
        return false;
    }
    else {
        return true;
    }
}

// verifie que les champs ne sont pas vides.
function isNoEmptyVariable($tableauPost) {
    $tableau = array();
    foreach ($tableauPost as $key => $value) {
        if (!empty($tableauPost[$key])) {
            $tableau[$key] = $value;
        }

    }
    if (count($tableauPost) != count($tableau)) {
        return false;
    }
    else {
        return true;
    }
}


//verifie que les champs sont bien des nombres
function isNumber($tableauPost) {
    unset($tableauPost['type']);
    $tableau = array();
    foreach ($tableauPost as $key => $value) {
         if (is_numeric($value)) {
             $tableau[$key] = $value;
         }
    }

    if (count($tableauPost) != count($tableau)) {
        return false;
    }
    else {
        return true;
    }
}

// verifie que les checkbox son coché, si oui alors on ajoute dans un nouveau tableau tout les $post de cette checkbox
function postDataArray() {
    $tableauData = array();
    if (isset($_POST['checkTemp'])) {
        $tableauPostTemp = array("consigne"=>$_POST['tempMode'],"timeEnd"=>$_POST['timeEndTemp'],"timeBegin"=> $_POST['timeBeginTemp']);
        $tableauData['temperature'] = $tableauPostTemp;
        $tableauData['temperature']['type'] = "temperature";
    }
    if (isset($_POST['checkHum'])) {
        $tableauPostHum = array("consigne"=>$_POST['humMode'],"timeEnd"=>$_POST['timeBeginHum'],"timeBegin"=> $_POST['timeEndHum']);
        $tableauData['humidite'] = $tableauPostHum;
        $tableauData['humidite']['type'] = "humidite";
    }

    return $tableauData;
}


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
                        $messageError = "tout les champs ne sont pas remplie ";
                    }
                } else {
                    $messageError = "les variable n'existe pas";
                }
            }
        } else {
            $messageError = "Attention ce nom de modes existe deja";
        }
    } else {
        $messageError = "tu n'as pas renseigner le nom du modes";
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




