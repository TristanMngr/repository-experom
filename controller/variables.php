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
    if (!isset($_SESSION['maison'])) {
        $_SESSION['maison'] = $donneesUtilisateur[0]['maison'];
    }
    $_SESSION["pseudo"] = $donneesUtilisateur[0]["pseudo"];
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


