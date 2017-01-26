<?php
if ($_GET['target2'] == 'control') {
    if (isset($_POST["pseudo"]) && isset($_POST["mail"]) && isset($_POST['numero']) && isset($_POST["mdp"]) && isset($_POST["rmdp"])) {
        //même principe que pour connexion
        if (isset($_POST["pseudo"]) && !empty($_POST["mail"]) && !empty($_POST['numero']) && !empty($_POST["mdp"]) && !empty($_POST["rmdp"])) {
            if ($_POST["mdp"] == $_POST["rmdp"]) {
                if (preg_match("#^[a-z0-9_.-]+@[a-z0-9_.-]{2,}\.[a-z]{2,4}$#",$_POST['mail']) && preg_match("#^0[1-68]([ .-]?[0-9]{2}){4}#",$_POST['numero'])) {
                    $tableau = array(
                        'typeDeRequete'=> 'select',
                        'table'=>'users',
                        'param'=>array('pseudo'=>$_POST["pseudo"]));

                    if (requeteDansTable($db, $tableau) == array()) { // on verifie que l'array est vide, permet de verifier que "nom" n'existe pas déja dans la table

                        $tableau = array(
                            'typeDeRequete'=> 'select',
                            'table'=>'users',
                            'param'=>array('mail'=>$_POST["mail"]));

                        if (requeteDansTable($db,$tableau) == array()) {
                            $tableau = array(
                                'typeDeRequete'=> 'select',
                                'table'=>'users',
                                'param'=>array('numero'=>$_POST["numero"]));

                            if (requeteDansTable($db,$tableau) == array()) {

                                $tableau = array(
                                    'typeDeRequete' => 'insert',
                                    'table' => 'users',
                                    'param' => array(
                                        'pseudo' => $_POST['pseudo'],
                                        'mail' => $_POST['mail'],
                                        'mdp' => $_POST['mdp'],
                                        'role' => 'admin',
                                        'dateInscription'=>'',
                                        'IDmaison'=>-1,
                                        'numero'=>$_POST['numero']
                                    ));

                                requeteDansTable($db, $tableau);




                                $messageSuccess = "L'admin ".$_POST['pseudo']." à bien été créé";
                                include("vue/back-office/users-BO.php");
                            }
                            else {
                                $messageError = "Ce numéro est déjà utilisé";
                                include("vue/back-office/creation-admin.php");

                            }
                        }
                        else {
                            $messageError = "Ce mail est déjà utilisé";
                            include("vue/back-office/creation-admin.php");
                        }
                    } else {
                        $messageError = "Ce pseudo est déjà utilisé";
                        include("vue/back-office/creation-admin.php");
                    }
                }
                else {
                    $messageError = "Attention ton numéro ou ton mail n'est pas valide";
                    include("vue/back-office/creation-admin.php");
                }
            } else {
                $messageError = "Les mots de passe ne sont pas identiques";
                include("vue/back-office/creation-admin.php");
            }
        } else {
            $messageError = "Le/les champs est/sont vide(s)";
            include("vue/back-office/creation-admin.php");

        }
    } else {
        $messageError = "Les variables n'existent pas";
        include("vue/back-office/creation-admin.php");

    }
}




include('vue/back-office/creation-admin.php');
?>