<?php

function getDataSalle($db,$tableau) {
    $query = 'SELECT capteurs.type, archives.temperature, archives.humidite, archives.numero 
    FROM salles
    JOIN capteurs ON capteurs.ID_salle = salles.ID
    JOIN archives ON archives.ID_capteur = capteurs.ID
    WHERE capteurs.ID_salle =:ID_salle';


    $param = $tableau['param'] ;
    $requete = $db->prepare($query);
    $requete->execute($param);

    $tableau = array();
    while ($donnees = $requete->fetch()) {

        $tableau[] = $donnees;
    }
    return $tableau;
}


