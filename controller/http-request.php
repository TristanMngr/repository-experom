<?php

function displayArray($array) {
    echo '<pre>';
    print_r($array);
    echo "</pre>";
}
$ecriture = file_put_contents('http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMANDE&TEAM=0001','100011301002A01251B',FILE_APPEND | LOCK_EX);

$lecture = file_get_contents('http://projets-tomcat.isep.fr:8080/appService?ACTION=getlog&TEAM=0000');



$arrayTrame = array();

$index=0;
$start = 0;
$lenght = 33;

while (substr($lecture,$start,$lenght)) {
    $arrayTrame[] = substr($lecture,$start,$lenght);
    $start +=33;

    echo 'trame'.substr($lecture,$start,$lenght);
    echo '</br>';


}

/*displayArray($arrayTrame);*/





?>