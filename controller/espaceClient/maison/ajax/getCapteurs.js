function selectCapteur(cible)
{
    if (cible == "")
    {
        document.getElementById("displayCapteur").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp= new XMLHttpRequest();
    } else {
        if (window.ActiveXObject)
            try {
                xmlhttp= new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    return NULL;
                }
            }
    }

    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            /*permet de remettre a zero les border*/
            divElement = document.getElementsByClassName('chooseType');
            for (var div = 0 ; div < divElement.length; div ++) {
                divElement[div].style.border = "solid transparent 1px";
            }




            document.getElementById(cible).style.border = "solid green 3px";
            document.getElementById("displayCapteur").innerHTML = xmlhttp.responseText;

            listLiElement = document.getElementsByClassName("list");
            selectLiElement = document.getElementsByClassName('capteur');
            arrayLiId = new Array();
            for (var li = 0; li < listLiElement.length; li ++) {
                arrayLiId[li] = listLiElement[li].id;
                console.log(listLiElement[li].id)
            }


            for (var select = 0; select < selectLiElement.length; select ++) {

                if (arrayLiId.indexOf('capteur'+selectLiElement[select].id) != -1) {
                    console.log(arrayLiId.indexOf('capteur'+selectLiElement[select].id));
                    selectLiElement[select].style.background = "green";
                    selectLiElement[select].style.color = "white";
                }
            }

            // suppression des element déja selectionner si l'on reclique dessus


        }
    }
    xmlhttp.open("GET", "/espace-client/ma-maison/creation/"+cible, true);
    xmlhttp.send();
}