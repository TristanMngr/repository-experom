<?php
/**
 * Création des variables de session à partir de getDansTableUsers()
 * @param array $donneesUtilisateur
 */
function variablesSession($db,$champ,$param) {

    $tableau = array(
        'typeDeRequete'=>'select',
        'table'=>'users',
        'param'=>array(
            $champ=>$param));
    $donneesUtilisateur = requeteDansTable($db,$tableau);
    $_SESSION["ID"] = $donneesUtilisateur[0]["ID"];
    $_SESSION["mail"] = $donneesUtilisateur[0]["mail"];
    $_SESSION["nom"] = $donneesUtilisateur[0]["nom"];
    $_SESSION["adresse"] = $donneesUtilisateur[0]["adresse"];
    $_SESSION["dateInscription"] = $donneesUtilisateur[0]["dateInscription"];
    $_SESSION["numero"] = $donneesUtilisateur[0]["numero"];
    if ($donneesUtilisateur[0]["role"] == "principal") {
        $_SESSION["role"] = "Utilisateur principal";
    }
    else if ($donneesUtilisateur[0]["role"] == "secondaire"){
        $_SESSION["role"] = "Utilisateur secondaire";
    }
}


