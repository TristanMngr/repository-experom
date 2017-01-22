<?php


/**
 *
 * récupère les données des utilisateurs de la même maison.
 * @param $db
 * @param $tableau
 * @return array
 */
function fetchDataUsers($db,$tableau) {
    $request = $db-> prepare('SELECT users.*
        FROM users
        join maison on users.IDmaison = maison.ID
        WHERE maison.ID =:IDmaison');

    $request -> execute($tableau);

    $newArray = array();
    while ($data = $request -> fetch()) {
        $newArray[] = $data;
    }
    $request -> closeCursor();

    return $newArray;
}


function fetchNameMode($db,$tableau) {
    $query = "SELECT modes.nom
FROM modes
WHERE modes.IDmaison =:IDmaison
OR modes.IDmaison=-1";



    $requete = $db->prepare($query);
    $requete->execute($tableau);

    $tableau = array();
    while ($donnees = $requete->fetch()) {

        $tableau[] = $donnees;
    }
    return $tableau;
}

function fetchNameSalle($db,$tableau) {
    $request = $db-> prepare('SELECT salles.nom
FROM salles
join maison on salles.IDmaison = maison.ID
WHERE maison.ID = IDmaison');

    $request -> execute($tableau);

    $newArray = array();
    while ($data = $request -> fetch()) {
        $newArray[] = $data;
    }
    $request -> closeCursor();

    return $newArray;
}

