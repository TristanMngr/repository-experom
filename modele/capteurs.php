<?php

function getArchivesFromCapteur($db,$tableau)
{
    $array = array();
    $requete = $db->prepare('SELECT archives.* , capteurs.type, capteurs.nom, capteurs.ID_salle
        FROM capteurs
        JOIN archives ON archives.ID_capteur = capteurs.ID
        WHERE capteurs.ID_maison =:ID_maison
        AND capteurs.ID_salle != 0');

    $requete->execute($tableau);
    while($data = $requete->fetch()) {
        $array[] = $data;
    }
    return $array;
}