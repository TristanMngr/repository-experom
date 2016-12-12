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
 *      'adresse'=> '14 rue',
 *      'mdp'=>'cocos',
 *      'role'=>'primaire'));
 *
 * Pour David:
 * $tableau = array(
 *'typeDeRequete'=>'delete',
 *'table'=>'salles',
 *'champ'=>'nom',
 *'param'=>array('champ'=>'qefze'));
 *
 * Ensuite execute la fonction :  requeteDansTable($db,$tableau);
 *
 * La fonction ne renvoie rien dans le cas de update ou insert.
 *
 *
 */





function requeteDansTable($db,$tableau){

    if ($tableau['typeDeRequete'] == "select") {
        if (isset($tableau['and'])) { /*lorsque l'on ajoute and dans l'array ('and'=>'and') alors on peut utilisé une deuxieme param pour where*/
            $query = 'SELECT * FROM ' . $tableau['table'] . ' WHERE ' . $tableau['champ'] . '=:champ AND '.$tableau['champ2'].'=:champ2';
        }
        else {
            $query = 'SELECT * FROM ' . $tableau['table'] . ' WHERE ' . $tableau['champ'] . '=:champ';
        }
    }
    else if ($tableau['typeDeRequete'] == "update") {

        $query = 'UPDATE '.$tableau['table'].' SET '.$tableau['setValeur'].'=:setValeur WHERE '.$tableau['champ'].'=:champ';
    }
    else if ($tableau['typeDeRequete'] == "insert"){
        if ($tableau['table'] == 'users') {
            $query = 'INSERT INTO ' . $tableau['table'] . '(nom, mail, adresse, mdp, dateInscription, role, numero) VALUES(:nom,:mail,:adresse,:mdp,NOW(), :role, :numero)';
        }
        else if ($tableau['table'] == 'salles' ) {
            $query = 'INSERT INTO ' . $tableau['table'] . '(nom, temperature, humidite, IDuser) VALUES(:nom,:temperature,:humidite,:IDuser)';
        }
        else if ($tableau['table'] == 'usersSalles') {
            $query = 'INSERT INTO ' . $tableau['table'] . '(IDuser, IDsalle) VALUES(:IDuser,:IDsalle)';
        }
    }
    else if ($tableau['typeDeRequete'] == 'delete') {
        $query = 'DELETE FROM ' . $tableau['table'] . ' WHERE ' . $tableau['champ'] . '=:champ';
    }
    $param = $tableau['param'];
    $requete = $db->prepare($query);
    $requete->execute($param);
    $tableauDonnees = array();
    if ($tableau['typeDeRequete'] == "select") {
        while ($donnees = $requete -> fetch()) {
            array_push($tableauDonnees,$donnees);
        }
        return $tableauDonnees;
    }


    $requete->closeCursor();
}



function joinTables($db,$tableau) {

    if ($tableau['typeDeRequete'] == 'join' & $tableau['table'] == 'userssalles') {
        $query = 'SELECT s.*
                FROM users u
                INNER JOIN userssalles us ON us.IDuser = u.ID
                INNER JOIN salles s ON s.ID = us.IDsalle
                WHERE u.nom =:champ';
    }
    $param = $tableau['param'] ;
    $requete = $db->prepare($query);
    $requete->execute($param);

    $tableau = array();
    while ($donnees = $requete->fetch()) {
        array_push($tableau,$donnees);
    }
    return $tableau;

}

?>