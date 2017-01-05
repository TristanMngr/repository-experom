<?php

// fonction qui récupère les données des capteurs de toute la maison.
function getDataMode($db,$tableau) {
$query = "SELECT modes.nom, modes.ID,modes_config.consigne, modes_config.heure_debut, modes_config.heure_fin, modes_config.type
FROM modes
JOIN modes_config ON modes_config.ID_mode = modes.ID
WHERE modes.IDmaison =:champ";


$param = $tableau['param'] ;
$requete = $db->prepare($query);
$requete->execute($param);

$tableau = array();
while ($donnees = $requete->fetch()) {

$tableau[] = $donnees;
}
return $tableau;
}


function getDataModeByName($db,$tableau) {
    $query = "SELECT modes_config.consigne, modes_config.heure_debut, modes_config.heure_fin, modes_config.type, modes.IDmaison, modes.nom, modes.ID
FROM modes
JOIN modes_config ON modes_config.ID_mode = modes.ID
WHERE modes.nom =:nom
AND modes.IDmaison =:IDmaison";


    $param = $tableau['param'] ;
    $requete = $db->prepare($query);
    $requete->execute($param);

    $tableau = array();
    while ($donnees = $requete->fetch()) {

        $tableau[] = $donnees;
    }
    return $tableau;

}



