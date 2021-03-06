<?php


/**
 * Insertion de données dans le tableau utilisateur
 * @param object PDO $db
 */
function insertDansTableUsers($db,$role,$adresse)
{
    $reqPrepare = $db->prepare('INSERT INTO users(nom, mail, adresse, mdp, dateInscription, role) VALUES(:nom,:mail,:adresse,:mdp,NOW(), :role)');

    $reqPrepare->execute(array(
        "nom" => $_POST["nom"],
        "mail" => $_POST["mail"],
        "adresse" => $adresse,
        "mdp" => $_POST["mdp"],
        "role" => $role

    ));
    $reqPrepare->closeCursor();

}


/**
 * Récupère des données dans le tableau utilisateur
 * @param object PDO $db
 * @param string $where
 * @param string $post
 * @return array
 */




function getDansTableUsers($db,$where,$post)
{
    if ($where == "userId") {
        $requete = $db->prepare('SELECT userID, mail, mdp, nom, adresse,role, dateInscription FROM users WHERE nom=:nom');
        $requete->execute(array(
            "nom" => $post
        ));

        $donnees = $requete->fetch();
        $requete->closeCursor();
        return $donnees;
    }

    else if ($where == "nom") {
        $requete = $db->prepare('SELECT userID, mail, mdp, nom, adresse,role, dateInscription FROM users WHERE nom=:nom');
        $requete->execute(array(
            "nom" => $post
        ));

        $donnees = $requete->fetch();
        $requete->closeCursor();
        return $donnees;
    }
    else if ($where == "mail"){
        $requete = $db->prepare('SELECT userID, mail, mdp, nom, adresse,role, dateInscription FROM users WHERE mail=:mail');
        $requete -> execute(array(
            "mail"=> $post
        ));

        $donnees = $requete->fetch();
        $requete->closeCursor();
        return $donnees;

    }else if ($where == "mdp"){
        $requete = $db->prepare('SELECT userID, mail, mdp, nom, adresse,role, dateInscription FROM users WHERE mdp=:mdp');
        $requete -> execute(array(
            "mdp"=> $post
        ));

        $donnees = $requete->fetch();
        $requete->closeCursor();
        return $donnees;

    }else if ($where == "adresse"){
        $requete = $db->prepare('SELECT userID, mail, mdp, nom, adresse,role, dateInscription FROM users WHERE adresse=:adresse');
        $requete -> execute(array(
            "adresse"=> $post
        ));

        $donnees = $requete->fetch();
        $requete->closeCursor();
        return $donnees;
    }

}


/**
 * modifie la table users suivant les données envoyées par l'utilisateur
 * @param object PDO $db
 * @param String $set : le champs qu'on veut changer
 * @param String $userID : l'id de l'utilisateur connécté
 * @param $setChange : la string envoyé par l'utilisateurs (celui qu'il veut changer)
 */
function updateDansTableUsers($db,$set,$userID,$setChange){


    if ($set == "mail") {

        $requete = $db->prepare('UPDATE users SET mail=:mail WHERE userID=:id');
        $requete->execute(array(
            'mail' => $setChange,
            'id' => $userID
        ));
        $requete->closeCursor();
    }
    else if ($set == "adresse") {

        $requete = $db->prepare('UPDATE users SET adresse=:adresse WHERE userID=:id');
        $requete->execute(array(
            'adresse' => $setChange,
            'id' => $userID
        ));
        $requete->closeCursor();
    }
    else if ($set == "mdp") {

        $requete = $db->prepare('UPDATE users SET mdp=:mdp WHERE userID=:id');
        $requete->execute(array(
            'mdp' => $setChange,
            'id' => $userID
        ));
        $requete->closeCursor();
    }
}




/*

function requeteDansTable($db,$tableau){
    {
    if ($tableau['typeDeRequete'] == "select") {
    $query = 'SELECT * FROM '.$tableau['table'].' WHERE '.$tableau['champ'].'=:champ';
    }
    else if ($tableau['typeDeRequete'] == "update") {

    $query = 'UPDATE '.$tableau['table'].' SET '.$tableau['setValeur'].'=:setValeur WHERE '.$tableau['champ'].'=:champ';
    }
    else if ($tableau['typeDeRequete'] == "insert"){
        $nouveauTableau = array();
        foreach ($tableau['param'] as $key => $value) {
            array_push($nouveauTableau,$key);
        }
        $stringChamps = implode(', ',$nouveauTableau);
        $nouveauTableau = array();
        foreach ($tableau['param'] as $key => $value) {
            if ($key == "dateInscription") {
                $key = 'NOW()';
            }
            array_push($nouveauTableau,':'.$key);

        }
        $stringChampsValue = implode(', ',$nouveauTableau);
        $stringChampsValue = str_replace("'",' ',$stringChampsValue);
        $stringChamps = str_replace("'",' ',$stringChamps);


        $query = 'INSERT INTO '.$tableau['table'].'('.$stringChampsValue.') VALUES('.$stringChampsValue.')';
    }
    $param = $tableau['param'];
    $requete = $db->prepare($query);
    $requete->execute($param);

    if ($tableau['typeDeRequete'] == "select") {
    $donnees = $requete->fetch();
    return $donnees;
    }

    $requete->closeCursor();

    }
}


$tableau = array("typeDeRequete"=>"insert","table"=>"users","param"=>array('nom'=>'nom','mail'=>'mail','adresse'=>'adresse','mdp'=>'mdp','role'=>'role','numero'=>'numero'));
requeteDansTable($db,$tableau);

$nouveauTableau = array();
foreach ($tableau['param'] as $key => $value) {
    array_push($nouveauTableau,$key);
}
$stringChamps = implode(', ',$nouveauTableau);
$nouveauTableau = array();
foreach ($tableau['param'] as $key => $value) {
    array_push($nouveauTableau,':'.$key);

}
$stringChampsValue = implode(', ',$nouveauTableau);
$stringChampsValue = str_replace("'",' ',$stringChampsValue);
$stringChamps = str_replace("'",' ',$stringChamps);

print_r($stringChamps);
echo "<br/>";
print_r($stringChampsValue);


*/

/*affichage de toute les salles d'un utilisateur*/

/*recupération nom de l'utilisateur principal*/
/*$tableau = array(
    'typeDeRequete' => 'select',
    'table' => 'users',
    'champ' => 'nom',

    'param' => array(
        'champ' => $_SESSION['nom'],
        ));

$principalID = requeteDansTable($db, $tableau);


/*recupération de toute les salles dont le nom est $_SESSION['nom']*/

/*$tableau = array(
    'typeDeRequete' => 'select',
    'table' => 'usersSalles',
    'champ' => 'IDuser',
    'param' => array(
        'champ' => $principalID[0]['ID']
    ));*/

/* récupération de toute les id de salle correspondant à celle de l'id de l'utilisateur principal de la famille*/

/*$recuperationSalles = requeteDansTable($db, $tableau);
$tableauDonneesSalles = array();
for ($k=0 ;$k< count($recuperationSalles); $k++) {
    $tableau = array(
        'typeDeRequete' => 'select',
        'table'=> 'salles',
        'champ'=>'ID',
        'param'=> array(
            'champ'=>$recuperationSalles[$k]['IDsalle']));
    $donnees = requeteDansTable($db,$tableau);
    array_push($tableauDonneesSalles,$donnees);
*/

/*
 * profil
<div id="profil">
                <h2>Profil du membre</h2>
                <ul>
                    <li><em class="informations">Rôle: </em><div class="informations"><?php echo $_SESSION['role'] ?></div></li>
<li><em class="informations">E-mail: </em><div class="informations"><?php echo $_SESSION['mail'] ?></div></li>
<li><em class="informations">Nom: </em><div class="informations"><?php echo $_SESSION['nom'] ?> </div></li>
<li><em class="informations">Adresse: </em><div class="informations"><?php echo $_SESSION['adresse'] ?></div></li>
<li><em class="informations">Inscrit le: </em><div class="informations"><?php echo $_SESSION['dateInscription'] ?></div></li>
<li><em class="informations">Numéro: </em><div class="informations"><?php echo '0'.$_SESSION['numero'] ?></div></li>
</ul>
</div>

*/