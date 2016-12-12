<?php
session_start();
include("modele/connexionDB.php");
include("controller/variables.php");
include("controller/redirection.php");



/*$chaine = "salut je m'appelle tristan";
$string = format_url($chaine);
echo $string;
*/



/*function joinTables($db,$tableau) {

    if ($tableau['typeDeRequete'] == 'join' & $tableau['table'] == 'userssalles') {
        $query = 'SELECT s.nom
                FROM users u
                INNER JOIN userssalles us ON us.IDuser = u.ID
                INNER JOIN salles s ON s.ID = us.IDsalle
                WHERE u.nom =:champ';
    }
    $param = $tableau['param'] ;
    $requete = $db->prepare($query);
    $requete->execute($param);

    $tableau = array();
    while ($donnees = $requete->fetch()) {
        array_push($tableau,$donnees);
    }
    return $tableau;

}


$tableauDeDonnees = joinTables($db,$tableau);

*/

?>












