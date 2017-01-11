<?php





/**
 * requeteDansTable V3
 * @param PDO $db: acces à la base de donné
 * @param mix $tableau array(typeDeRequete => quelle type de requete, table => dans quelle table, param=>array(param1=> ?,param2=> ?,...))
 * Dans le cas de update renseigner la valeur à update dans le tableau  : setValeur => valeur puis dans l'array parm: valeur => valeurDeRemplacement
 * @return mixed
 *
 * exemple :
 * $tableau = array(
 *  'typeDeRequete'=>'insert',              choisie la methode select
 *  'table'=> 'users',                      dans quelles tables
 *  'param'=> array('nom'=>'choco',         l'array qui renseigne tout les paramètres
 *      'mail'=>'choco@gmail.com',
 *      'adresse'=> '14 rue',
 *      'mdp'=>'cocos',
 *      'role'=>'primaire'));
 *
 * Pour David:
 * $tableau = array(
 *'typeDeRequete'=>'delete',
 *'table'=>'salles',
 *'param'=>array('champ'=>'qefze'));
 *
 * Ensuite execute la fonction :  requeteDansTable($db,$tableau);
 *
 * La fonction ne renvoie rien dans le cas de update ou insert.
 *
 *
 */


function requeteDansTable($db,$tableau){
    $tableau = securite($tableau);
    if ($tableau['typeDeRequete'] == "select") {
        $tableau = implodeChampsValues($tableau);
        $query = 'SELECT * FROM '.$tableau['table'].' WHERE '.$tableau['champsValues'];
    }
    else if ($tableau['typeDeRequete'] == "update") {

        /*$tableau = implodeChampsValues($tableau);*/
        $query = 'UPDATE '.$tableau['table'].' SET '.$tableau['setValeur'].'=:setValeur WHERE '.$tableau['champ'].'=:champ';
    }
    else if ($tableau['typeDeRequete'] == "insert"){
        $tableau = implodeChampsValues($tableau);
        $query = 'INSERT INTO ' . $tableau['table'] . '('.$tableau['champs'].') VALUES('.$tableau['values'].')';
    }
    else if ($tableau['typeDeRequete'] == 'delete') {
        $tableau = implodeChampsValues($tableau);
        $query = 'DELETE FROM ' . $tableau['table'] . ' WHERE ' . $tableau['champsValues'];
    }

    $param = $tableau['param'];
    $requete = $db->prepare($query);
    $requete->execute($param);
    $tableauDonnees = array();
    if ($tableau['typeDeRequete'] == "select") {
        while ($donnees = $requete -> fetch()) {
            $tableauDonnees[] = $donnees;
        }
        return $tableauDonnees;
    }
    $requete->closeCursor();
}



// récupère la derniere id de la dernière requête insert.

function getLastID($db){
    $lastinsertID = $db->lastinsertid();
    $lastinsertID = (int) $lastinsertID;

    return $lastinsertID;
}


/**
 * traite les informations de sécurités
 */

function securite($tableau)
{
    $tableauEntitiesAndCrypt = array();
    foreach ($tableau['param'] as $key => $value) {
        if ($key == 'mdp') {
            $tableauEntitiesAndCrypt[$key] = 'cocos_'.md5($value);
        } else {
            $tableauEntitiesAndCrypt[$key] = htmlentities($value);
        }
    }

    unset($tableau['param']);

    $tableau['param'] = $tableauEntitiesAndCrypt;
    return $tableau;
}

/**
 * concatène les valeurs et les champs du tableau['param'].
 * @param $tableau
 * @return array avec l'array initial et les champs concaténé en plus
 * Transforme les tableaux en formes compréhensible pour la fonction requêteDansTable()
 */

function implodeChampsValues($tableau)
{

    if ($tableau['typeDeRequete'] == 'insert') {
        $tableauChamps = array();
        $tableauValues = array();
        foreach ($tableau["param"] as $key => $values) {
            if ($key == 'dateInscription') {
                $tableauValues[] = 'NOW()';
            } else {
                $tableauValues[] = ':' . $key;
            }
        }
        $tableauValues = implode(', ', $tableauValues);

        foreach ($tableau["param"] as $key => $values) {
            $tableauChamps[] = $key;
        }
        $tableauChamps = implode(', ', $tableauChamps);

        $tableau['champs'] = $tableauChamps;
        $tableau['values'] = $tableauValues;
        unset($tableau['param']['dateInscription']);


        return $tableau;
    }

    else if ($tableau['typeDeRequete'] == 'select' or $tableau['typeDeRequete'] == 'delete') {
        $tableauChampsValues = array();
        foreach ($tableau['param'] as $key => $value) {
            $tableauChampsValues[] = $key . '=:' . $key;

        }
        $tableauChampsValues = implode(' AND ',$tableauChampsValues);
        $tableau['champsValues']  = $tableauChampsValues;



        return $tableau;

    }

}








?>