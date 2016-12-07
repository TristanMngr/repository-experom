<?php
session_start();
include("modele/connexionDB.php");
include("controller/redirection.php");
?>


<?php
/*


function select($db, $query, $param) {
    $requete = $db->prepare($query);
    $requete->execute(array($param));

    $donnees = $requete->fetch();
    $requete->closeCursor();
    return $donnees;
}



function tableUtilisateur($db,$post,$typeRequete){
    {
        if ($typeRequete == "select") {
            $query = 'SELECT userID, mail, mdp, nom, adresse,role, dateInscription FROM users WHERE userID=:userID';
        }
        if ($typeRequete == "update") {
            $query = 'UPDATE users SET mail=:mail WHERE userID=:userID';
        }
        if ($tgypeRequete == "insert"){
            $query = 'INSERT INTO users(nom, mail, adresse, mdp, dateInscription, role) VALUES(:nom,:mail,:adresse,:mdp,NOW(), :role)';
        }

        return select($db,$query, ["userID" => $post]);
    }


}
*/?>
