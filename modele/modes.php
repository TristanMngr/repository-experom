<?php

// fonction qui récupère les données des capteurs de toute la maison.
function getDataMode($db,$tableau) {
$query = "SELECT modes.nom, modes.ID,modes_config.consigne, modes_config.heure_debut, modes_config.heure_fin, modes_config.type
FROM modes
JOIN modes_config ON modes_config.ID_mode = modes.ID
WHERE modes.IDmaison =:champ
OR modes.IDmaison =-1";


$param = $tableau['param'];
$requete = $db->prepare($query);
$requete->execute($param);

$tableau = array();
while ($donnees = $requete->fetch()) {

$tableau[] = $donnees;
}
return $tableau;
}


function getDataModeByName($db,$tableau) {
    $query = "SELECT modes_config.consigne, modes_config.heure_debut, modes_config.heure_fin, modes_config.type, modes.IDmaison, modes.nom, modes.ID, modes_config.ID as id
FROM modes
JOIN modes_config ON modes_config.ID_mode = modes.ID
WHERE modes.nom =:nom 
AND (modes.IDmaison =:IDmaison OR modes.IDmaison =-1)";


    $param = $tableau['param'] ;
    $requete = $db->prepare($query);
    $requete->execute($param);

    $tableau = array();
    while ($donnees = $requete->fetch()) {

        $tableau[] = $donnees;
    }
    return $tableau;

}

function updateTableMode($db,$tableau)
{
    if ($tableau['typeDeRequete'] == "update"){

        /*$tableau = implodeChampsValues($tableau);*/
    $query = 'UPDATE ' . $tableau['table'] . ' SET ' . $tableau['setValeur'] . '=:setValeur WHERE ' . $tableau['champ1'] . '=:champ1 AND ' . $tableau['champ2'] . '=:champ2';
    $param = $tableau['param'];
    $requete = $db->prepare($query);
    $requete->execute($param);

    }
}









