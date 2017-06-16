<?php
// recuperation du number_object


 // http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=3401&TRAME=1340123030034000000
$tableau = array(
    'typeDeRequete'=> 'select',
    'table'=>'maison',
    'param'=>array('ID'=>$_SESSION['IDmaison']));

$number_object = strval(requeteDansTable($db,$tableau)[0]['number_object']);

$arrayToSend = array();



for ($capteur = 0; $capteur < count($arrayIdCapt); $capteur++) {

    foreach ($arrayIdCapt[$capteur] as $type => $id) {
        $currentTrame = getLastTrame($db, $id, $number_object);

        displayArray('hello',$currentTrame);


        $arrayToSend[$capteur] = $currentTrame[0]['type_trame'];
        $arrayToSend[$capteur] .= /*strval($currentTrame[0]['number_object'])*/'9999' ;
        $arrayToSend[$capteur] .= '2';
        $arrayToSend[$capteur] .= strval($currentTrame[0]['type_capteur']);
        $arrayToSend[$capteur] .=  '0'.strval($currentTrame[0]['number_capteur']) ;
        $arrayToSend[$capteur] .=  '00'.strval($currentTrame[0]['value']) ;
        $arrayToSend[$capteur] .=  '0000';
        $arrayToSend[$capteur] .=  '0000';

        echo $arrayToSend[$capteur];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=".$number_object."&TRAME=".$arrayToSend[$capteur]);
        curl_setopt($ch, CURLOPT_HEADER, FALSE); curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); $data = curl_exec($ch);
        curl_close($ch);


    }
}

/*for ($capteur = 0; $capteur < count($arrayIdCapt); $capteur++) {
    foreach ($arrayIdCapt[$capteur] as $type => $id) {
        if ($type == 'temperature' & $temp != false) {
            $arrayToSend[$capteur]['type_trame'] = '1';
            $arrayToSend[$capteur]['number_object'] = strval($number_object);
            $arrayToSend[$capteur]['type_request'] = '2';
            $arrayToSend[$capteur]['type_capteur'] = '3';
            $arrayToSend[$capteur]['number_capteur'] = '03';
            $arrayToSend[$capteur]['value'] = '3';


        }
    }
}*/

/*
*/