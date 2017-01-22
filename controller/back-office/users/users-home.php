<?php
if (isset($_GET['target3'])) {

    /*récupération IDmaison*/
    $tableau = array('typeDeRequete'=> 'select','table'=>'users','param'=>array('pseudo'=>$_GET['target3']));
    $IDmaison = requeteDansTable($db,$tableau)[0]['IDmaison'];

    /*récupération des données des utilisateurs de la même maison*/
    $tableau = array('IDmaison'=>$IDmaison);
    $arrayDataUsers = fetchDataUsers($db,$tableau);

    /*récupération de tout les noms modes de la maison.*/
    $tableau = array('IDmaison'=>$IDmaison);
    $arrayNameMode = fetchNameMode($db,$tableau);

    $tableau = array('IDmaison'=>$IDmaison);
    $arrayNameSalle = fetchNameSalle($db,$tableau);

    ?>

    <div class="info-BO">
        <h1>Utilisateurs</h1>
        <ul>
            <?php foreach($arrayDataUsers as $key => $value) { ?>
            <li><?= $value['pseudo'] ?></li>
            <?php } ?>
        </ul>
    </div>
    <div class="info-BO">
        <h1>Salles</h1>
        <ul>
            <?php foreach($arrayNameSalle as $key => $value) { ?>
                <li><?= $value['nom'] ?></li>
            <?php } ?>
        </ul>
    </div>
    <div class="info-BO">
        <h1>Modes</h1>
       <ul>
           <?php foreach($arrayNameMode as $key => $value) { ?>
               <li><?= $value['nom'] ?></li>
           <?php } ?>
       </ul>
    </div>


<?php

}