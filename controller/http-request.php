<?php

/**
 page test trames
 */


/*$lecture = file_get_contents('http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=0001');*/

function getAllTrameWithSerialKey($arrayTrame,$serialKey) {
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
function getAllTrameWithSerialKeyV($arrayTrame,$serialKey) {
    $arrayWithAllTrame = array();
    for ($trame = 0; $trame < count($arrayTrame); $trame++) {
        $existe = strpos($arrayTrame[$trame],(string)($serialKey));
        if ($existe != false) {
            $arrayWithAllTrame[] = $arrayTrame[$trame];
        }


    }
    return $arrayWithAllTrame;
}

function getTrameTeam($arrayTrame,$team) {
    $arrayWithAllTrame = array();
    for ($trame = 0; $trame < count($arrayTrame); $trame++) {
        $existe = strpos($arrayTrame[$trame],(string)($team));
        if ($existe != false) {
            $arrayWithAllTrame[] = $arrayTrame[$trame];
        }
    }
    return $arrayWithAllTrame;
}


$arrayTrame = array();

$index=0;
$start = 0;
$lenght = 33;



while (substr($lecture,$start,$lenght)) {
    if ($trame = substr($lecture,$start,$lenght)) {
        $arrayTrame[] = substr($lecture, $start, $lenght);
        $start += 33;
    }
}



/*displayArray($arrayTrame);*/
date_default_timezone_set('UTC');

echo date('Y-m-d',mktime(0,0,0,1,20,2017));

echo 'data 1234556'.mktime(0,0,0,1,20,2017);

echo '</br>';


$tableau1 = array('salutlesamis','salut');
$tableau2 = array('chocolat','enrevoir');
$tableau = array($tableau1,$tableau2);

function assembleArray($tableau)
{
    $finalArray = array();
    for ($k = 0; $k < count($tableau); $k++) {
        for ($trame = 0; $trame < count($tableau[$k]); $trame++) {
            $finalArray [] = $tableau[$k][$trame];
        }
    }
    return $finalArray;
}




