
<?php
/*switch ($arrayTraduction[$trame]['idCapteur']){
case 1:
$arrayTraduction[$trame]['idCapteur'] = "cuisine";
$idTypeCapteur = $arrayTraduction[$trame]['typeOfCapteur']."-".$arrayTraduction[$trame]['idCapteur'];
break;
case 2:
$arrayTraduction[$trame]['idCapteur'] ="salon";
$idTypeCapteur = $arrayTraduction[$trame]['typeOfCapteur']."-".$arrayTraduction[$trame]['idCapteur'];
break;
case 3:
$arrayTraduction[$trame]['idCapteur'] ="bureau";
$idTypeCapteur = $arrayTraduction[$trame]['typeOfCapteur']."-".$arrayTraduction[$trame]['idCapteur'];
break;
case 4:
$arrayTraduction[$trame]['idCapteur'] ="chambre";
$idTypeCapteur = $arrayTraduction[$trame]['typeOfCapteur']."-".$arrayTraduction[$trame]['idCapteur'];
break;
case 5:
$arrayTraduction[$trame]['idCapteur'] ="toilette";
$idTypeCapteur = $arrayTraduction[$trame]['typeOfCapteur']."-".$arrayTraduction[$trame]['idCapteur'];
break;
case 6:
$arrayTraduction[$trame]['idCapteur'] ="chambre enfant";
$idTypeCapteur = $arrayTraduction[$trame]['typeOfCapteur']."-".$arrayTraduction[$trame]['idCapteur'];
break;
case 7:
$arrayTraduction[$trame]['idCapteur'] ="salle de jeu";
$idTypeCapteur = $arrayTraduction[$trame]['typeOfCapteur']."-".$arrayTraduction[$trame]['idCapteur'];
default:
$idTypeCapteur = $arrayTraduction[$trame]['typeOfCapteur']."-".$arrayTraduction[$trame]['idCapteur'];
}*/


function displayCapteur($stringCapteur) {
    $newArray = explode('-',$stringCapteur);
    switch($newArray[1]) {
        case 1:
            $newArray[1] = "cuisine";
            break;
        case 2:
            $newArray[1] = "salon";
            break;
        case 3:
            $newArray[1] = "bureau";
            break;
        case 4:
            $newArray[1] = "chambre";
            break;
        case 5:
            $newArray[1] = "toilette";
            break;
        case 6:
            $newArray[1] = "chambre enfant";
            break;
        case 7:
            $newArray[1] = "salle de jeu";
            break;
        default:
            $newArray[1] = "id non attribué";
    }
    $newArray = implode('-',$newArray);
    return $newArray;
}

