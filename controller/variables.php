<?php
/**
 * Création des variables de session à partir de getDansTableUsers()
 * @param array $donneesUtilisateur
 */
function variablesSession($db,$champ,$param) {

    $tableau = array('typeDeRequete'=>'select','table'=>'users','champ'=>$champ,'param'=>array('champ'=>$param));
    $donneesUtilisateur = requeteDansTable($db,$tableau);
    $_SESSION["userID"] = $donneesUtilisateur["userID"];
    $_SESSION["mail"] = $donneesUtilisateur["mail"];
    $_SESSION["nom"] = $donneesUtilisateur["nom"];
    $_SESSION["adresse"] = $donneesUtilisateur["adresse"];
    $_SESSION["dateInscription"] = $donneesUtilisateur["dateInscription"];
    $_SESSION["numero"] = $donneesUtilisateur["numero"];
    if ($donneesUtilisateur["role"] == "principal") {
        $_SESSION["role"] = "Utilisateur principal";
    }
    else if ($donneesUtilisateur["role"] == "secondaire"){
        $_SESSION["role"] = "Utilisateur secondaire";
    }
}
