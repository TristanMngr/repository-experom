<?php

if (isset($_POST['getMode'])) {

// récupération des données du mode par rapport a son nom et l'id de la maison.
    $tableau = array(
        'param'=>array(
            'nom'=>$_POST['getMode'],
            'IDmaison'=>$_SESSION['IDmaison']));

    $arrayDataMode = getDataModeByName($db,$tableau);

    /*displayArray('donnée array',$arrayDataMode);*/
}


include('vue/espaceClient/maMaisonV2.php');