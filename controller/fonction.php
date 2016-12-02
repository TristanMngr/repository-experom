

<?php

/*Fonction qui renvoie le chemin du fichier css*/
function folderInclude()
{
    /*on récupère le chemin du dossier courant*/
    $arrayDossierCourant = explode('/',getcwd());
    /*sa taille*/
    $tailleArray = count($arrayDossierCourant);
    /*son dossier courant*/
    $dossierCourant = $arrayDossierCourant[$tailleArray-1];
    $cheminInclude = 0;

    if ($dossierCourant == "accueil" or $dossierCourant == "contact" or $dossierCourant== "espaceClient") {
        $cheminInclude = "../style/style.css";
    }
    else if ($dossierCourant == "redirection.php"){
        $cheminInclude = "../vue/include/header.php";
    }

    return $cheminInclude;
}

?>
