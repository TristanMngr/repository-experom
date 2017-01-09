<?php
/**
 * charge tout les capteurs appartenant au groupe .
 */




$arrayTrame = ['100011301002A01251B','100011401004001251B','100011402001A01251B','100011403002401251B','100011306001801251B','100011307001C01251B'];



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





