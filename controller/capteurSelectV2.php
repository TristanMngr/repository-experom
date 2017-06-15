<?php

/*include "debug.php";*/
$ch = curl_init();
curl_setopt(
    $ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=9999");
curl_setopt($ch, CURLOPT_HEADER, FALSE); curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); $data = curl_exec($ch);
curl_close($ch);
//3401

$data_tab = str_split($data,33);


for($i=0;  $i< count($data_tab); $i++){
    $t = substr($data_tab[$i],0,1);
    $o = substr($data_tab[$i],1,4);
    $r = substr($data_tab[$i],5,1);
    $c = substr($data_tab[$i],6,1); // type de capteur
    $n = substr($data_tab[$i],7,2); // id capteur (ou numero)
    $v = substr($data_tab[$i],9,4);
    $a = substr($data_tab[$i],13,4);
    $x = substr($data_tab[$i],17,2);
    $year = substr($data_tab[$i],19,4);
    $month = substr($data_tab[$i],23,2);
    $day =  substr($data_tab[$i],25,2);
    $hour = substr($data_tab[$i],27,2);
    $min = substr($data_tab[$i],29,2);
    $sec = substr($data_tab[$i],31,2);

    $arrayTrame[$i] = array(
        "type"=>$t,
        "numeroObj"=>$o,
        "typeReq"=> $r,
        "typeCapt"=>$c,
        "numCapt"=>$n,
        "valeur"=>$v,
        "numTrame"=>$a,
        "checkSum"=>$x,
        "years"=>$year,
        "month"=>$month,
        "day"=>$day,
        "hour"=>$hour,
        "min"=>$min,
        "sec"=>$sec);
}


/*$arrayTrame = ['100011301002A01251B','100011401004001251B','100011302002A01251B','100011402001A01251B','100011303001801251B','100011403001C01251B',
    '100011304001501251B','100011404003001251B','100011305001D01251B','100011405002B01251B','100011306002C01251B','100011406002F01251B','100011307001E01251B',
    '100011407002A01251B'];*/

/*renvoie la trame suivant la serial key*/

function getTrameSerialKey($arrayTrame,$serialKey) {
    $arrayVide = array();
    for ($trame = 0; $trame < count($arrayTrame); $trame++) {
        $number = $arrayTrame[$trame]['typeCapt'].$arrayTrame[$trame]['numCapt'];
        if ($number == (string)$serialKey) {
            $arrayVide[] = $arrayTrame[$trame];
        }
    }
    if (isset($arrayVide[0])) {
        return $arrayVide[0];
    }
    else {
        return false;
    }
}

function getTrameSerialKey2($arrayTrame,$serialKey) {
    $arrayVide = array();
    for ($trame = 0; $trame < count($arrayTrame); $trame++) {
        $typeOfCapteur = substr($arrayTrame[$trame], 6, 1);
        $idCapteur = substr($arrayTrame[$trame], 7, 2);
        $number = $typeOfCapteur.$idCapteur;
        if ($number == (string)$serialKey) {
            $arrayVide[] = $arrayTrame[$trame];
        }
    }
    if (isset($arrayVide[0])) {
        return $arrayVide[0];
    }
    else {
        return false;
    }
}
function getAllTrameWithSerialKey($arrayTrame,$serialKey) {
    $arrayWithAllTrame = array();
    for ($trame = 0; $trame < count($arrayTrame); $trame++) {
        $number = $arrayTrame[$trame]['typeCapt'].$arrayTrame[$trame]['numCapt'];
        if ($number == (string)$serialKey) {
            $arrayWithAllTrame[] = $arrayTrame[$trame];
        }

    }
    return $arrayWithAllTrame;
}
// recup trame
function getAllTrameWithSerialKey2($arrayTrame,$serialKey) {
    $arrayWithAllTrame = array();
    for ($trame = 0; $trame < count($arrayTrame); $trame++) {
        $typeOfCapteur = substr($arrayTrame[$trame], 6, 1);
        $idCapteur = substr($arrayTrame[$trame], 7, 2);
        $number = $typeOfCapteur.$idCapteur;
        if ($number == (string)$serialKey) {
            $arrayWithAllTrame[] = $arrayTrame[$trame];
        }

    }
    return $arrayWithAllTrame;
}


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

function getKeyTypeTrame($trame) {
    $key = substr($trame, 6, 1).substr($trame, 7, 2);
    $arrayKeyType['key'] = (int)$key;
    $arrayKeyType['type'] = typeCapteur(substr($trame, 6, 1));
    return $arrayKeyType;
}

function arrayRequestData($arrayTrame)
{
// code groupe de l'eleve.
    $codeGroupe = "0001";

    $arrayTraduction = array();
    /*echo "<pre>";
    print_r($arrayTrame);
    echo "</pre>";*/
    for ($trame = 0; $trame < count($arrayTrame); $trame++) {
        $groupe = $arrayTrame[$trame]['numeroObj'];  //1/4
        if ($groupe == $codeGroupe) {
            $typeOfTrame = $arrayTrame[$trame]['type'];  //0/1
            $typeOfRequest = $arrayTrame[$trame]['typeReq']; // 5/1
            $typeOfCapteur = $arrayTrame[$trame]['typeCapt']; // 6/1
            $idCapteur = $arrayTrame[$trame]['numCapt']; // 7/2
            $valueOfCapteur = $arrayTrame[$trame]['valeur']; // 9/4
            $time = $arrayTrame[$trame]['numTrame']; // 13/4
            $sumCharac = $arrayTrame[$trame]['checkSum']; // 17/2


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


function arrayRequestData2($arrayTrame)
{
// code groupe de l'eleve.
    $codeGroupe = "0001";

    $arrayTraduction = array();

    for ($trame = 0; $trame < count($arrayTrame); $trame++) {
        $groupe = substr($arrayTrame[$trame], 1, 4);  //1/4
        if ($groupe == $codeGroupe) {
            $typeOfTrame = substr($arrayTrame[$trame], 0, 1);  //0/1
            $typeOfRequest = substr($arrayTrame[$trame], 5, 1); // 5/1
            $typeOfCapteur = substr($arrayTrame[$trame], 6, 1); // 6/1
            $idCapteur = substr($arrayTrame[$trame], 7, 2); // 7/2
            $valueOfCapteur = substr($arrayTrame[$trame], 9, 4); // 9/4
            $time = substr($arrayTrame[$trame], 13, 4); // 13/4
            $sumCharac = substr($arrayTrame[$trame], 17, 2); // 17/2


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



