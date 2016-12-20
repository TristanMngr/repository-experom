<?php
include("modele/users.php");
/**
 * modifier ses données perso
 *
 * On creer un tableau vide
 * On verifie que les variables envoyés par l'utilisateurs existe et qu'elles ne sont pas vides
 * Dans ce cas on ajoute a la clef, la variables envoyé par l'utilisateur
 * Et on change les variables de sessions
 * On boucle sur la fonction updateDansTableUsers (modele/users.php)
 */

$inscription = null;
$isUtilisateur = null;

// Inscription utilisateur secondaire

if (isset($_POST["mdp"]) && isset($_POST["rmdp"]) && isset($_POST["mail"]) && $_GET['target2'] == "ajouter-un-utilisateur-control") {
    if ( !empty($_POST["mail"]) && !empty($_POST["mdp"]) && !empty($_POST["rmdp"])) {
        if ($_POST["mdp"] == $_POST["rmdp"]) {
            if (preg_match("#^[a-z0-9_.-]+@[a-z0-9_.-]{2,}\.[a-z]{2,4}$#",$_POST['mail'])) {

                $tableau = array(
                    'typeDeRequete'=> 'select',
                    'table'=>'users',
                    'param'=>array('mail'=>$_POST["mail"]));



                if (requeteDansTable($db, $tableau) == array()) {
                    $tableau = array(
                        'typeDeRequete' => 'insert',
                        'table' => 'users',
                        'param' => array(
                            'nom' => $_SESSION['nom'],
                            'mail' => $_POST['mail'],
                            'adresse' => $_SESSION['adresse'],
                            'mdp' => $_POST['mdp'],
                            'role' => 'secondaire',
                            'numero' => $_SESSION['numero']));

                    requeteDansTable($db, $tableau);
                    $inscription = True;
                    $messageErreur = "L'Utilisateur secondaire a bien été crée";
                }
                else {
                    $messageErreur = "Ce mail est déja prit";
                    include("vue/espaceClient/inscription.php");
                }

            }
            else {
                $messageErreur = "Attention ton adresse mail n'es pas valide";
                include("vue/espaceClient/inscription.php");
            }
        } else {
            $messageErreur = "Les mots de passe ne sont pas identiques";
            include("vue/espaceClient/inscription.php");

        }
    } else {
        $messageErreur = "Le/les champs est/sont vide(s)";
        include("vue/espaceClient/inscription.php");
    }
}


/*verification modification des données */
$tableauUtilisateurs = array();

if ($_GET["target"] == "modifier-donnees-perso-control") {

    if (isset($_POST['modifierMail']) && !empty($_POST['modifierMail'])) {
        if (preg_match("#^[a-z0-9_.-]+@[a-z0-9_.-]{2,}\.[a-z]{2,4}$#",$_POST['modifierMail'])) {
            $tableau = array(

                'typeDeRequete'=> 'select',
                'table'=>'users',
                'param'=>array(
                        'mail'=>$_POST['modifierMail']));

            if (requeteDansTable($db, $tableau) == array()) {

                $tableauUtilisateurs['mail'] = $_POST['modifierMail'];
                $_SESSION["mail"] = $_POST['modifierMail'];
            } else {
                $message = "Ce mail est déja utilisé";
            }
        }
        else {
            $message = "Attention ce mail n'est pas valide";
        }
    }
    if (isset($_POST['modifierMdp']) && !empty($_POST['modifierMdp'])) {
        $tableauUtilisateurs['mdp'] = "cocos_".md5($_POST['modifierMdp']);
        $_SESSION["mdp"] = $_POST['modifierMdp'];

    }
    if (isset($_POST['modifierAdresse']) && !empty($_POST['modifierAdresse'])) {
        $tableau = array(

            'typeDeRequete'=> 'select',
            'table'=>'users',
            'param'=>array(
                    'adresse'=>$_POST['modifierAdresse']));

        if (requeteDansTable($db, $tableau) == array()) {
            $tableauUtilisateurs['adresse'] = $_POST['modifierAdresse'];
            $_SESSION['adresse'] = $_POST['modifierAdresse'];
        } else {
            if ($message != "") {
                $message .= ", ";
            }
            $message .= " Le numéro est déja utilisé";
        }
    }
    if (isset($_POST['modifierNumero']) && !empty($_POST['modifierNumero'])) {
        if (preg_match("#^0[1-68]([ .-]?[0-9]{2}){4}$#",$_POST['modifierNumero'])) {
            $tableau = array(
                'typeDeRequete' => 'select',
                'table' => 'users',
                'param' => array('numero' => $_POST['modifierNumero']));

            if (requeteDansTable($db, $tableau) == array()) {
                $tableauUtilisateurs['numero'] = $_POST['modifierNumero'];
                $_SESSION['numero'] = $_POST['modifierNumero'];

            } else {
                if ($message != "") {
                    $message .= ", ";
                }
                $message .= " L'adresse est déja utilisé";
            }
        }
        else {
            $message = "Attention ce numéro n'es pas valide";
        }
    }
    if ($message == "") {
        $message = "Vos données ont été modifiés";

        foreach ($tableauUtilisateurs as $set => $setChange) {

            $tableau = array(
                'typeDeRequete' => 'update',
                'table'=>'users',
                'setValeur'=>$set,
                'champ'=>'ID',
                'param'=>array(

                    'setValeur'=>$setChange,
                    'champ'=>$_SESSION['ID'])); //attention

            requeteDansTable($db, $tableau);
        }
    }
}

//suppression d'un compte secondaire

if ($_GET['target2'] == 'suppression') {
    $tableau = array(
        'typeDeRequete' => 'delete',
        'table'=>'users',
        'param'=>array(
            'mail'=>$_POST['mailSuppression']));

    $messageErreur = "L'utilisateur secondaire a bien été supprimer";
    requeteDansTable($db,$tableau);
}

/*Récupération des mail portant le meme non pour afficher ensuite*/

if ($_GET['target'] == 'modifier-donnees-perso' or $_GET['target'] == 'modifier-donnees-perso-control' or $_GET['target'] == 'modifier-donnees-perso' or $_GET['target2'] == 'suppression') {

    /*on recherche toutes les données portant le nom de $_SESSION['nom']*/
    $tableau = array(
        'typeDeRequete'=>'select',
        'table'=>'users',
        'param'=>array(
                'nom'=>$_SESSION['nom']));

    $donneesComptes = requeteDansTable($db,$tableau);
    for ($tableau = 0; $tableau <count($donneesComptes); $tableau ++) {
        if ($donneesComptes[$tableau]['ID'] == $_SESSION['ID']) {
            unset($donneesComptes[$tableau]);
        }
    }


    if ($donneesComptes == array()) {
        $isPresentUtilisateur = False;
    }
    else {
        $isPresentUtilisateur = True;
    }




}




if ($_GET['target2'] != "ajouter-un-utilisateur-control")  {
    include('vue/espaceClient/modifierDonneesPerso.php');
}
else if ($inscription== True & $_GET['target2'] == "ajouter-un-utilisateur-control") {
    include('vue/espaceClient/modifierDonneesPerso.php');
}

?>







}