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


function format_url($chaine) {

    // en minuscule
    $chaine=strtolower($chaine);

    // supprime les caracteres speciaux
    $accents = Array("/�/", "/�/", "/�/","/�/", "/�/", "/�/", "/�/","/�/","/�/","/�/", "/�/", "/�/", "/�/", "/�/", "/�/", "/�/", "/�/", "/�/", "/�/", "/�/");
    $sans = Array("e", "e", "e", "e", "c", "a", "a","a", "a","a", "a", "i", "i", "i", "i", "u", "o", "o", "o", "o");
    $chaine = preg_replace($accents, $sans, $chaine);
    $chaine = preg_replace('#[^A-Za-z0-9]#', '-', $chaine);

    // Remplace les tirets multiples par un tiret unique
    $chaine = preg_replace( "\-+", '-', $chaine );

    // Supprime le dernier caract�re si c'est un tiret
    $chaine = rtrim( $chaine, '-' );

    while (strpos($chaine,'--') !== false)
        $chaine = str_replace('--', '-', $chaine);

    return $chaine;

}
