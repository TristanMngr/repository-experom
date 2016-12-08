<?php


/**
 * Insertion de données dans le tableau utilisateur
 * @param object PDO $db
 */
function insertDansTableUsers($db,$role,$adresse)
{
    $reqPrepare = $db->prepare('INSERT INTO users(nom, mail, adresse, mdp, dateInscription, role) VALUES(:nom,:mail,:adresse,:mdp,NOW(), :role)');

    $reqPrepare->execute(array(
        "nom" => $_POST["nom"],
        "mail" => $_POST["mail"],
        "adresse" => $adresse,
        "mdp" => $_POST["mdp"],
        "role" => $role

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




function getDansTableUsers($db,$where,$post)
{
    if ($where == "userId") {
        $requete = $db->prepare('SELECT userID, mail, mdp, nom, adresse,role, dateInscription FROM users WHERE nom=:nom');
        $requete->execute(array(
            "nom" => $post
        ));

        $donnees = $requete->fetch();
        $requete->closeCursor();
        return $donnees;
    }

    else if ($where == "nom") {
        $requete = $db->prepare('SELECT userID, mail, mdp, nom, adresse,role, dateInscription FROM users WHERE nom=:nom');
        $requete->execute(array(
            "nom" => $post
        ));

        $donnees = $requete->fetch();
        $requete->closeCursor();
        return $donnees;
    }
    else if ($where == "mail"){
        $requete = $db->prepare('SELECT userID, mail, mdp, nom, adresse,role, dateInscription FROM users WHERE mail=:mail');
        $requete -> execute(array(
            "mail"=> $post
        ));

        $donnees = $requete->fetch();
        $requete->closeCursor();
        return $donnees;

    }else if ($where == "mdp"){
        $requete = $db->prepare('SELECT userID, mail, mdp, nom, adresse,role, dateInscription FROM users WHERE mdp=:mdp');
        $requete -> execute(array(
            "mdp"=> $post
        ));

        $donnees = $requete->fetch();
        $requete->closeCursor();
        return $donnees;

    }else if ($where == "adresse"){
        $requete = $db->prepare('SELECT userID, mail, mdp, nom, adresse,role, dateInscription FROM users WHERE adresse=:adresse');
        $requete -> execute(array(
            "adresse"=> $post
        ));

        $donnees = $requete->fetch();
        $requete->closeCursor();
        return $donnees;
    }

}


/**
 * modifie la table users suivant les données envoyées par l'utilisateur
 * @param object PDO $db
 * @param String $set : le champs qu'on veut changer
 * @param String $userID : l'id de l'utilisateur connécté
 * @param $setChange : la string envoyé par l'utilisateurs (celui qu'il veut changer)
 */
function updateDansTableUsers($db,$set,$userID,$setChange){


    if ($set == "mail") {

        $requete = $db->prepare('UPDATE users SET mail=:mail WHERE userID=:id');
        $requete->execute(array(
            'mail' => $setChange,
            'id' => $userID
        ));
        $requete->closeCursor();
    }
    else if ($set == "adresse") {

        $requete = $db->prepare('UPDATE users SET adresse=:adresse WHERE userID=:id');
        $requete->execute(array(
            'adresse' => $setChange,
            'id' => $userID
        ));
        $requete->closeCursor();
    }
    else if ($set == "mdp") {

        $requete = $db->prepare('UPDATE users SET mdp=:mdp WHERE userID=:id');
        $requete->execute(array(
            'mdp' => $setChange,
            'id' => $userID
        ));
        $requete->closeCursor();
    }
}