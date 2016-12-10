<?php


/**
 * @param PDO $db: acces à la base de donné
 * @param mix $tableau array(type => ?, setValeur=> ?, champ=> ?, table => ?, param=>array(param1=> ?,param2=> ?,...))
 * @return mixed
 *
 * exemple :
 * $tableau = array(
 *  'typeDeRequete'=>'insert',              choisie la methode select
 *  'table'=> 'users',                      dans quelles tables
 *  'param'=> array('nom'=>'choco',         l'array qui renseigne tout les paramètres
 *      'mail'=>'choco@gmail.com',
 *      'adresse'=> '14 rue saint lazare',
 *      'mdp'=>'cocos',
 *      'role'=>'primaire'));
 *
 * La fonction ne renvoie rien dans le cas de update ou insert.
 */

function requeteDansTable($db,$tableau){
        /*foreach ($tableau['param'] as $keys=>$values) {
            $values = html_entity_decode($values);
            array_push()
        }*/


    if ($tableau['typeDeRequete'] == "select") {
        $query = 'SELECT * FROM '.$tableau['table'].' WHERE '.$tableau['champ'].'=:champ';
    }
    else if ($tableau['typeDeRequete'] == "update") {

        $query = 'UPDATE '.$tableau['table'].' SET '.$tableau['setValeur'].'=:setValeur WHERE '.$tableau['champ'].'=:champ';
    }
    else if ($tableau['typeDeRequete'] == "insert"){

        $query = 'INSERT INTO '.$tableau['table'].'(nom, mail, adresse, mdp, dateInscription, role, numero) VALUES(:nom,:mail,:adresse,:mdp,NOW(), :role, :numero)';
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


?>