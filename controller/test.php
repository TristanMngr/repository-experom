<?php
function select($db, $query, $param) {
    $requete = $db->prepare($query);
    $requete->execute($param);

    $donnees = $requete->fetch();
    $requete->closeCursor();
    return $donnees;
}

function getDansTableUsers($db, $param,$where)
{
    if ($where == "userId") {
        $query = 'SELECT userID, mail, mdp, nom, adresse,role, dateInscription FROM users WHERE userID=:userID';
        $table = $param;

    }
    return select($db, $query, ["userID" => $post]);
}

?>