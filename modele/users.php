<!--fonction qui insert les données de l'inscription-->

<?php

/**
 * Insertion de données dans le tableau utilisateur
 * @param object PDO $db
 */
function insertDansTableUsers($db)
{
    $reqPrepare = $db->prepare('INSERT INTO users(nom, mail, adresse, mdp, dateInscription) VALUES(:nom,:mail,:adresse,:mdp,NOW())');

    $reqPrepare->execute(array(
        "nom" => $_POST["nom"],
        "mail" => $_POST["mail"],
        "adresse" => $_POST["adresse"],
        "mdp" => $_POST["mdp"]

    ));
    $reqPrepare->closeCursor();

}

/**
 * Récupère des données dans le tableau utilisateur
 * @param object PDO $db
 * @param string $where
 * @param string $post
 * @return array
 */
function getDansTableUsers($db,$where,$post )
{
    if ($where == "nom") {


        $requete = $db->prepare('SELECT userID, mail, mdp,nom, adresse FROM users WHERE nom=:nom');
        $requete->execute(array(
            "nom" => $post
        ));

        $donnees = $requete->fetch();
        $requete->closeCursor();
        return $donnees;
    }
    else if ($where == "mail"){
        $requete = $db->prepare('SELECT userID, mail, mdp,nom, adresse FROM users WHERE mail=:mail');
        $requete -> execute(array(
            "mail"=> $post
        ));

        $donnees = $requete->fetch();
        $requete->closeCursor();
        return $donnees;
    }

}

?>