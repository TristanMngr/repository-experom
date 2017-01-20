<?php

$tableau = array('typeDeRequete'=>'select', 'table'=>'capteurs','param'=>array('ID_maison'=>$_SESSION['IDmaison']));
$arrayCapteurs = requeteDansTable($db,$tableau);

/** verifié que les capteurs n'ont pas déja été entré dans une salle  */



if ($_GET['target3'] == 'temperature') {


    ?>
    <h2>Capteur de température</h2>
    <ul id="displayCapteur">
        <?php foreach ($arrayCapteurs as $key => $value) {
        if ($value['type'] == 'temperature') { ?>
        <li class="capteur" id="<?php echo $value['serial_key']; ?>" onclick="addCapteur(this.id,'<?php echo $value['nom'] ?>','temperature')"><h3><?php echo $value['nom'] ?></h3>
            <ul>
                <li><span>type :</span><?php echo $value['type'] ?></li>
                <li><span>attribué :</span><?php if ($value['ID_salle'] == 0) {
                        echo 'non';
                    } else {
                        echo 'oui';
                    } ?></li>
                <li><span>serial key :</span><?php echo $value['serial_key'] ?></li>
            </ul>
            <?php }
            } ?>
        </li>
    </ul>
    <?php
}


else if ($_GET['target3'] == 'humidite') {
?>
    <h2>Capteur d'humidite</h2>
<ul id="displayCapteur">
    <?php foreach ($arrayCapteurs as $key => $value) {
    if ($value['type'] == 'humidite') { ?>
    <li class="capteur" id="<?php echo $value['serial_key']; ?>" onclick="addCapteur(this.id, '<?php echo $value['nom'] ?>','humidite')"><h3><?php echo $value['nom'] ?></h3>
        <ul>
            <li><span>type :</span><?php echo $value['type'] ?></li>
            <li><span>attribué :</span><?php if ($value['ID_salle'] == 0) {echo 'non';} else {echo 'oui';} ?></li>
            <li><span>serial key :</span><?php echo $value['serial_key'] ?></li>
        </ul>
        <?php }} ?>
    </li>
</ul>
<?php } ?>
<div id="passageList"><ul id="listCapteur"></ul></div>
<!--<div id="valider" onclick="createNewList('<?php /*echo $_GET['target3']; */?>')"><button type="button">Valider</button></div>-->
