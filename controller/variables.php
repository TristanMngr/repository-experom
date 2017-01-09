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


    //récupération des données de la maison puis création de la variable de session adresse.

    if ($donneesUtilisateur[0]["IDmaison"] != 0) {


        $champ = 'ID';
        $param = $donneesUtilisateur[0]['IDmaison'];

        $tableau = array(
            'typeDeRequete'=>'select',
            'table'=>'maison',
            'param'=>array(
                $champ=>$param
        ));

        $donneesMaison = requeteDansTable($db,$tableau);

        $_SESSION['IDmaison'] = $donneesUtilisateur[0]['IDmaison'];
        $_SESSION['adresse'] = $donneesMaison[0]['adresse'];
        $_SESSION['nomMaison'] = $donneesMaison[0]['nom'];
    }




    $_SESSION["pseudo"] = $donneesUtilisateur[0]["pseudo"];
    $_SESSION["ID"] = $donneesUtilisateur[0]["ID"];
    $_SESSION["mail"] = $donneesUtilisateur[0]["mail"];
    $_SESSION["nom"] = $donneesUtilisateur[0]["nom"];
    $_SESSION["dateInscription"] = $donneesUtilisateur[0]["dateInscription"];
    $_SESSION["numero"] = $donneesUtilisateur[0]["numero"];
    if ($donneesUtilisateur[0]["role"] == "principal") {
        $_SESSION["role"] = "principal";
    }
    else if ($donneesUtilisateur[0]["role"] == "secondaire"){
        $_SESSION["role"] = "secondaire";
    }
}


