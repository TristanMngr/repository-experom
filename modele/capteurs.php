<?php

/**
 fetch données capteurs
 */

function getArchivesFromCapteur($db,$tableau)
{
    $array = array();
    $requete = $db->prepare('SELECT archives.* , capteurs.type, capteurs.nom, capteurs.ID_salle
        FROM capteurs
        JOIN archives ON archives.ID_capteur = capteurs.ID
        WHERE capteurs.ID_maison =:ID_maison
        AND capteurs.ID_salle != 0');

    $requete->execute($tableau);
    while($data = $requete->fetch()) {
        $array[] = $data;
    }
    return $array;
}

function updateTableCapteur($db,$tableau) {
    $request = $db->prepare('UPDATE capteurs SET ID_salle=:ID_salle WHERE serial_key=:serial_key AND ID_maison=:ID_maison');

    $request -> execute($tableau);

    $request -> closeCursor();
}


function alreadyInArchives($db,$tableau) {
    $requete = $db->prepare('SELECT * FROM archives
WHERE (number_object =:number_object
AND type_requete=:type_requete
AND type_capteur=:type_capteur
AND number_capteur=:number_capteur
AND date_time =:date_time);');

    $requete->execute($tableau);
    $data = $requete->fetchAll();

    if ($data != array()) {
        return true;
    }
    else {
        return false;
    }
}

// verifie que le numbero n'est pas déja dans la database
function alreadyInCapteurs($db,$tableau) {
    $requete = $db->prepare('SELECT * FROM capteurs
WHERE ID_maison=:ID_maison
AND type=:type
AND number_capteur=:number_capteur');
    $requete->execute($tableau);
    $data = $requete->fetchAll();

    if ($data != array()) {
        return true;
    }
    else {
        return false;
    }
}

// recupère le numbero des capteur de temperature
function fetchNumberCapt($db,$tableau) {
    $requete = $db->prepare('SELECT DISTINCT number_capteur FROM archives
WHERE type_capteur =:type_capteur
AND number_object=:number_object
AND ID_capteur = 0'); // attention ici petit cheat pour ne pas créer de salle déja prise

    $requete-> execute($tableau);
    $data = $requete -> fetchAll();
    return $data;
}

// ajout automatiqueemnt tout les capteurs dispo dans la table capteurs
function addCapteurInDb($db,$typeTrames, $type) {
    $numberType = 0;
    if ($type == 'temperature') {
        $numberType = 3;
    }
    else if ($type == 'humidite') {
        $numberType = 4;
    }
    for ($number = 0; $number < count($typeTrames); $number++ ) {
        $tableau = array(
            'ID_maison'=> $_SESSION['IDmaison'],
            'type'=> $type,
            'number_capteur'=>$typeTrames[$number]['number_capteur'],

        );
        if (!alreadyInCapteurs($db,$tableau)) {
            $tableau = array('typeDeRequete'=>'insert','table'=>'capteurs','param'=>array(
                'type'=>$type,
                'number_capteur'=>$typeTrames[$number]['number_capteur'],
                'ID_maison'=>$_SESSION['IDmaison'],
                'serial_key'=>$numberType.$typeTrames[$number]['number_capteur']
            ));
            requeteDansTable($db,$tableau);
        }
    }
}
function getCapteursInfoToUpdate($db,$tableau) {
    $request = $db-> prepare('SELECT * FROM capteurs
WHERE ID_maison=:IDmaison');
    $request->execute($tableau);

    $data = $request->fetchAll();

    $request->closeCursor();


    return $data;
}
function updateIntoArchives($db,$tableau) {
  $request = $db-> prepare('UPDATE archives SET ID_capteur=:ID_capteur
  WHERE number_object=:number_object
  AND type_capteur=:type_capteur
  AND number_capteur=:number_capteur
  AND ID_capteur =0');

  $request->execute($tableau);

}

function getLastTrame($db,$id_capteur,$number_object) {
    $requete = $db->prepare('SELECT *
        FROM archives
        WHERE ID_capteur=:ID_capteur
        AND number_object=:number_object
        AND date_time = (SELECT max(date_time)
        FROM archives
        WHERE ID_capteur=:ID_capteur
        AND number_object=:number_object)');

    $requete->execute(array('ID_capteur'=>$id_capteur, 'number_object'=>$number_object));
    while($data = $requete->fetch()) {
        $array[] = $data;
    }
    return $array;
}
