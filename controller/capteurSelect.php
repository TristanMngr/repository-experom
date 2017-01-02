<?php
/**
 * charge tout les capteurs appartenant au groupe .
 */




$arrayTrame = ['100011301002A01251B','100011402001A01251B','100011405002401251B','100011306001801251B','100011307001C01251B'];



// fonction qui traduit le numero du capteurs en string

function typeCapteur($value) {
    $capteur = null;
    switch ($value) {
        case '3':
            $capteur = 'temperature';
            break;
        case '4':
            $capteur = 'humidite';
            break;
    }
    return $capteur;
}

function arrayRequestData($arrayTrame)
{
    // code groupe de l'eleve.
    $codeGroupe = "0001";

    $arrayTraduction = array();

    for ($trame = 0; $trame < count($arrayTrame); $trame++) {
        $groupe = substr($arrayTrame[$trame], 1, 4);
        if ($groupe == $codeGroupe) {
            $typeOfTrame = substr($arrayTrame[$trame], 0, 1);
            $typeOfRequest = substr($arrayTrame[$trame], 5, 1);
            $typeOfCapteur = substr($arrayTrame[$trame], 6, 1);
            $idCapteur = substr($arrayTrame[$trame], 7, 2);
            $valueOfCapteur = substr($arrayTrame[$trame], 9, 4);
            $time = substr($arrayTrame[$trame], 13, 4);
            $sumCharac = substr($arrayTrame[$trame], 17, 2);


            // création d'un nouveau tableau avec les valeurs traduite.

            if (hexdec($typeOfTrame) == 1) {
                if (hexdec($typeOfRequest) == 1) {
                    if (hexdec($typeOfCapteur) == '3' or hexdec($typeOfCapteur) == '4') {
                        $arrayTraduction[$trame]['typeOfTrame'] = hexdec($typeOfTrame);
                        $arrayTraduction[$trame]['typeOfRequest'] = hexdec($typeOfRequest);
                        $arrayTraduction[$trame]['typeOfCapteur'] = typeCapteur(hexdec($typeOfCapteur));
                        $arrayTraduction[$trame]['idCapteur'] = hexdec($idCapteur);
                        $arrayTraduction[$trame]['valueOfCapteur'] = hexdec($valueOfCapteur);
                        $arrayTraduction[$trame]['time'] = $time;

                    }}}}}
    if ($arrayTraduction != array()) {
        return $arrayTraduction;
    }
    else {
        return false;
    }

}
$arrayRequestCapteur = arrayRequestData($arrayTrame);
// tableau avec les données pour affichage:


function getNameTrame($arrayTraduction) {
    $newArray = array();
    for ($trame = 0; $trame < count($arrayTraduction); $trame ++) {
        $idTypeCapteur = $arrayTraduction[$trame]['typeOfCapteur']."-".$arrayTraduction[$trame]['idCapteur'];
        if ($arrayTraduction[$trame]['typeOfCapteur'] == 'temperature') {
            $newArray['temperature'][] = $idTypeCapteur;
        }
        else if ($arrayTraduction[$trame]['typeOfCapteur'] == 'humidite') {
            $newArray['humidite'][] = $idTypeCapteur;
        }
    }
    return $newArray;
}

$arraySelectCapt = getNameTrame($arrayRequestCapteur);







/*
<?php

$tableauSystème = array(
    'TRA'= '0x31',
    'OBJ'= '0x30' or '0x31',
    'REQ'= '0x31',
    'TYP1'= '0x31', // Capteur de distance modèle 1
    'TYP2'= '0x32', // Capteur de distance modèle 2
    'TYP3'= '0x33', // Capteur de température
    'TYP4'= '0x34', // Capteur d'humidité
    'TYP5'= '0x35', // Capteur de lumière modèle 1
    'TYP6'= '0x36', // Capteur de couleur
    'TYP7'= '0x37', // Capteur de préscence
    'TYP8'= '0x38', // Capteur de lumière modèle 2
    'TYP9'= '0x39', // Capteur de mouvement
    'TYP10'= '0x41', // Capteur présence son modèle 1
    'TYP11'= '0x42', // Envoi de la date JJ:MM
    'TYP12'= '0x43', // Envoi de l'année AAAA
    'TYP13'= '0x61', // Requête actionneur 1
    'TYP14'= '0x48', // Requête Heure 1 (HH:MM)
    'TYP15'= '0x68', // Requête Heure 2 (MM:SS)
    'TYP16'= '0x70', // Requête date (JJ:MM)
    'TYP17'= '0x71', // Requête année (AAAA)
    'NUM'= '' // Numéro du capteur
	'VAL'= '' // Valeur du capteur
	'TIM'= '' // Valeur lue
	'CHK'= '' // Somme des caractères précédents
);

$tableauPasserelle = array(
    'TRA'= '0x31',
    'OBJ'= '0x30' or '0x31',
    'REQ'= '0x31',
    'TYP1'= '0x31', // Capteur de distance modèle 1
    'TYP2'= '0x32', // Capteur de distance modèle 2
    'TYP3'= '0x33', // Capteur de température
    'TYP4'= '0x34', // Capteur d'humidité
    'TYP5'= '0x35', // Capteur de lumière modèle 1
    'TYP6'= '0x36', // Capteur de couleur
    'TYP7'= '0x37', // Capteur de préscence
    'TYP8'= '0x38', // Capteur de lumière modèle 2
    'TYP9'= '0x39', // Capteur de mouvement
    'TYP10'= '0x41', // Capteur présence son modèle 1
    'TYP11'= '0x42', // Envoi de la date JJ:MM
    'TYP12'= '0x43', // Envoi de l'année AAAA
    'TYP13'= '0x61', // Requête actionneur 1
    'TYP14'= '0x48', // Requête Heure 1 (HH:MM)
    'TYP15'= '0x68', // Requête Heure 2 (MM:SS)
    'TYP16'= '0x70', // Requête date (JJ:MM)
    'TYP17'= '0x71', // Requête année (AAAA)
    'NUM'= '' // Numéro du capteur
	'ANS'= '' // Réponse de la passerelle
	'CHK'= '' // Somme des caractères précédents
);



function typedecommunication($tableau)
{
    $tableauSystème = array();
    $tableauPasserelle = array();

    	if ($tableau['Système-->Passerelle'] == ) {
            return $tableauPasserelle;
        }

    	else{
            return $tableauSystème;
        }
?>
*/