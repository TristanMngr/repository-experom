<?php
echo $_GET['target2'];
$tableau = array('typeDeRequete'=> 'select', 'table'=>'users','param'=>array('pseudo'=>$_GET['target2']));

$arrayUser = requeteDansTable($db,$tableau);

$idMaison = $arrayUser[0]['IDmaison'];

function noEmtpyEq($var1,$var2) {
    if (!empty($var1) & !empty($var2)) {
        if ($var1 != $var2) {
            return true;
        }
    }
}



// TODO sécurité specialChar
$messageError = "";
$dataUser = array("nom"=>$arrayUser[0]['nom'],"mail"=>$arrayUser[0]['mail'],'numero'=>$arrayUser[0]['numero'],'mdp'=>$arrayUser[0]['mdp']);
$dataInput = array("nom"=>$_POST['modifierNom'],"mail"=>$_POST['modifierMail'],'numero'=>$_POST['modifierNumero'],'mdp'=>$_POST['modifierMdp']);
displayArray("tableau", $arrayUser);

if (isset($_POST['modifierMail']) & isset($_POST['modifierNom']) & isset($_POST['modifierNumero']) & isset($_POST['modifierMdp'])) {
    if (noEmtpyEq($dataInput['nom'], $dataUser['nom'])) {
        $tableau = array('typeDeRequete'=> 'select', 'table'=>'users','param'=>array('nom'=>$dataInput['nom']));
        if (requeteDansTable($db,$tableau) == array()) {
            $tableau = array('typeDeRequete'=> 'update', 'table'=>'users','setValeur'=>'nom', 'champ'=>'IDmaison','param'=>array('setValeur'=>$dataInput['nom'],'champ'=>$idMaison));
            requeteDansTable($db,$tableau);
            $messageSuccess .= "Le nom à bien été modifié </br>";
        }
    }
    if (noEmtpyEq($dataInput['mail'], $dataUser['mail'])) {
        $tableau = array('typeDeRequete'=> 'select', 'table'=>'users','param'=>array('mail'=>$dataInput['mail']));
        if (requeteDansTable($db,$tableau) == array()) {
            if (filter_var($dataInput['mail'],FILTER_VALIDATE_EMAIL)) {
                // TODO faire un deuxieme and pour cibler sur le pseudo
                $tableau = array('typeDeRequete' => 'update', 'table' => 'users', 'setValeur' => 'mail', 'champ' => 'mail', 'param' => array('setValeur' => $dataInput['mail'], 'champ' => $dataUser['mail']));
                requeteDansTable($db, $tableau);
                $messageSuccess .= "Le mail à bien été modifié </br>";
            }
        }
    }
    if (noEmtpyEq($dataInput['numero'], $dataUser['numero'])) {
        $tableau = array('typeDeRequete'=> 'select', 'table'=>'users','param'=>array('numero'=>$dataInput['numero']));
        if (requeteDansTable($db,$tableau) == array()) {
            // TODO filter le numero pour qu'il soit valide
            $tableau = array('typeDeRequete' => 'update', 'table' => 'users', 'setValeur' => 'numero', 'champ' => 'numero', 'param' => array('setValeur' => $dataInput['numero'], 'champ' => $dataUser['numero']));
            requeteDansTable($db, $tableau);
            $messageSuccess .= "Le numero à bien été modifié </br>";
        }
    }
    if (!empty($_POST['mdp'])) {
        $tableau = array('typeDeRequete' => 'update', 'table' => 'users', 'setValeur' => 'mdp', 'champ' => 'pseudo', 'param' => array('setValeur' =>"cocos_".md5('mdp'), 'champ' => $_GET['target2']));
        requeteDansTable($db, $tableau);
        $messageSuccess .= "Le mot de passe à bien été modifié </br>";
    }
}





?>