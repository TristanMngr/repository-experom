
<?php


/*$tableau = array('typeDeRequete'=>'select','table'=>'maison','param'=>array('ID'=>$_SESSION['IDmaison']));
$number_object = requeteDansTable($db,$tableau)[0]['ID'];*/
$tableau = array(
    'typeDeRequete'=> 'select',
    'table'=>'maison',
    'param'=>array('ID'=>$_SESSION['IDmaison']));

$number_object = strval(requeteDansTable($db,$tableau)[0]['number_object']);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=".$number_object);
curl_setopt($ch, CURLOPT_HEADER, FALSE); curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); $data = curl_exec($ch);
curl_close($ch);
//3401

$data_tab = str_split($data,33);

$arrayTrame = array();
for($i=0;  $i< count($data_tab); $i++){
    $t = substr($data_tab[$i],0,1);
    $o = substr($data_tab[$i],1,4);
    $r = substr($data_tab[$i],5,1);
    $c = substr($data_tab[$i],6,1);
    $n = substr($data_tab[$i],7,2);
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
        "type_trame"=>$t,
        "number_object"=>$o,
        "type_requete"=> $r,
        "type_capteur"=>$c,
        "number_capteur"=>$n,
        "value"=>$v,
        "number_trame"=>$a,
        "checksum"=>$x,
        "year"=>$year,
        "month"=>$month,
        "day"=>$day,
        "hour"=>$hour,
        "minute"=>$min,
        "second"=>$sec);
 }
/*echo "<pre>";
echo "toutes les trames</br>";
print_r($arrayTrame);
echo "</pre>";*/







