<!--fonction qui insert les données de l'inscription-->

<?php


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
function getDansTableUsers($db,$nom)
{
    $requete = $db->prepare('SELECT userID, mail, mdp,nom FROM users WHERE nom=:nom');
    $requete -> execute(array(
            "nom"=> $nom
    ));

    $donnees = $requete->fetch();
    $requete->closeCursor();

    return $donnees;
}

?>