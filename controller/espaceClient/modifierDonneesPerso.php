<?php
include("modele/general.php");
/**
 * modifier ses données perso
 *
 * On creer un tableau vide
 * On verifie que les variables envoyés par l'utilisateurs existe et qu'elles ne sont pas vides
 * Dans ce cas on ajoute a la clef, la variables envoyé par l'utilisateur
 * Et on change les variables de sessions
 * On boucle sur la fonction updateDansTableUsers (modele/general.php)
 */

$isInscrit = null;
$isUtilisateur = null;

// Inscription utilisateur secondaire

if (isset($_POST["pseudo"]) && isset($_POST["mdp"]) && isset($_POST["rmdp"]) && isset($_POST["mail"]) && $_GET['target2'] == "ajouter-un-utilisateur-control") {
    if (!empty($_POST["pseudo"]) && !empty($_POST["mail"]) && !empty($_POST["mdp"]) && !empty($_POST["rmdp"])) {
        if ($_POST["mdp"] == $_POST["rmdp"]) {
            if (preg_match("#^[a-z0-9_.-]+@[a-z0-9_.-]{2,}\.[a-z]{2,4}$#",$_POST['mail'])) {

                $tableau = array(
                    'typeDeRequete'=> 'select',
                    'table'=>'users',
                    'param'=>array('pseudo'=>$_POST["pseudo"]));

                if (requeteDansTable($db, $tableau) == array()) {

                    if ($_POST['mail'] == $_SESSION['mail']) {
                        // si le mail n'es pas egal au mail principal
                        $tableau = array(
                            'typeDeRequete' => 'insert',
                            'table' => 'users',
                            'param' => array(
                                'pseudo' => $_POST['pseudo'],
                                'nom' => $_SESSION['nom'],
                                'mail' => $_POST['mail'],
                                'mdp' => $_POST['mdp'],
                                'dateInscription'=>'',
                                'role' => 'secondaire',
                                'numero' => $_SESSION['numero'],
                                'IDmaison' => $_SESSION['IDmaison']
                            ));

                        requeteDansTable($db, $tableau);


                        $isInscrit = True;
                        $messageErreur = "L'Utilisateur secondaire a bien été crée";
                    }
                    else {
                        //si le mail est egal au mail principal
                        $tableau = array(
                            'typeDeRequete' => 'select',
                            'table' => 'users',
                            'param' => array('mail' => $_POST["mail"]));


                        if (requeteDansTable($db, $tableau) == array()) {
                            $tableau = array(
                                'typeDeRequete' => 'insert',
                                'table' => 'users',
                                'param' => array(
                                    'pseudo' => $_POST['pseudo'],
                                    'nom' => $_SESSION['nom'],
                                    'mail' => $_POST['mail'],
                                    'mdp' => $_POST['mdp'],
                                    'role' => 'secondaire',
                                    'dateInscription'=>'',
                                    'numero' => $_SESSION['numero'],
                                    'IDmaison' => $_SESSION['IDmaison']
                                ));


                            requeteDansTable($db, $tableau);


                            $isInscrit = True;
                            $messageErreur = "L'Utilisateur secondaire a bien été crée";
                        } else {
                            $messageErreur = "Ce mail est déja prit";
                            include("vue/espaceClient/inscription.php");
                        }
                    }


                } else {
                    $messageErreur = "Ce pseudo est déja utilisé";
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

    if ($_POST['modifierMail'] != $_SESSION['mail']) {
        if (isset($_POST['modifierMail']) && !empty($_POST['modifierMail'])) {
            if (preg_match("#^[a-z0-9_.-]+@[a-z0-9_.-]{2,}\.[a-z]{2,4}$#", $_POST['modifierMail'])) {
                $tableau = array(

                    'typeDeRequete' => 'select',
                    'table' => 'users',
                    'param' => array(
                        'mail' => $_POST['modifierMail']));

                if (requeteDansTable($db, $tableau) == array()) {

                    $tableauUtilisateurs['mail'] = $_POST['modifierMail'];
                    $_SESSION["mail"] = $_POST['modifierMail'];
                } else {
                    $message = "Ce mail est déja utilisé";
                }
            } else {
                $message = "Attention ce mail n'est pas valide";
            }
        }
    }

    if (isset($_POST['modifierMdp']) && !empty($_POST['modifierMdp'])) {
        $tableauUtilisateurs['mdp'] = "cocos_" . md5($_POST['modifierMdp']);
        $_SESSION["mdp"] = $_POST['modifierMdp'];

    }

    if ($_POST['modifierNom'] != $_SESSION['nom']) {
        if (isset($_POST['modifierNom']) && !empty($_POST['modifierNom'])) {
            $tableauUtilisateurs['nom'] = ($_POST['modifierNom']);
            $_SESSION["nom"] = $_POST['modifierNom'];

        }
    }
    if ($_POST['modifierAdresse'] != $_SESSION['adresse']) {
        if (isset($_POST['modifierAdresse']) && !empty($_POST['modifierAdresse'])) {
            $tableau = array(

                'typeDeRequete' => 'select',
                'table' => 'maison',
                'param' => array(
                    'adresse' => $_POST['modifierAdresse']));

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
    }
    if ($_POST['modifierNumero'] != $_SESSION['numero']) {
        if (isset($_POST['modifierNumero']) && !empty($_POST['modifierNumero'])) {
            if (preg_match("#^0[1-68]([ .-]?[0-9]{2}){4}$#", $_POST['modifierNumero'])) {
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
            } else {
                $message = "Attention ce numéro n'es pas valide";
            }
        }
    }
    if ($tableauUtilisateurs != array()) {
        if ($message == "") {
            $message = "Vos données ont été modifiés";

            foreach ($tableauUtilisateurs as $set => $setChange) {

                $tableau = array(
                    'typeDeRequete' => 'update',
                    'table' => 'users',
                    'setValeur' => $set,
                    'champ' => 'ID',
                    'param' => array(

                        'setValeur' => $setChange,
                        'champ' => $_SESSION['ID'])); //attention

                requeteDansTable($db, $tableau);
            }
        }
    }
}

//suppression d'un compte secondaire

if ($_GET['target2'] == 'suppression') {
    $tableau = array(
        'typeDeRequete' => 'delete',
        'table'=>'users',
        'param'=>array(
            'pseudo'=>$_POST['pseudoSuppression']));

    $messageErreur = "L'utilisateur secondaire a bien été supprimer";
    requeteDansTable($db,$tableau);
}

/*Récupération des mail portant le meme non pour afficher ensuite*/

if ($_GET['target'] == 'modifier-donnees-perso' or $_GET['target'] == 'modifier-donnees-perso-control' or $_GET['target'] == 'modifier-donnees-perso' or $_GET['target2'] == 'suppression') {

    $tableau = array(
        'typeDeRequete'=>'select',
        'table'=>'users',
        'param'=>array(
                'IDmaison'=>$_SESSION['IDmaison']));



    $donneesComptes = requeteDansTable($db,$tableau);
    for ($tableau = 0; $tableau <count($donneesComptes); $tableau ++) {
        // on supprime la tableau pour celui qui c'est connecté.
        if ($donneesComptes[$tableau]['ID'] == $_SESSION['ID']) {
            unset($donneesComptes[$tableau]);
        }
    }

    // si le tableau est vide alors il n y'a rien a afficher/sinon isPresentUtilisateur vaut true.
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
else if ($isInscrit == True & $_GET['target2'] == "ajouter-un-utilisateur-control") {
    include('vue/espaceClient/modifierDonneesPerso.php');
}

?>







}