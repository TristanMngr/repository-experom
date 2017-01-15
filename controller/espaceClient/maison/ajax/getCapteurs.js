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
            document.getElementById("displayCapteur").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "/espace-client/ma-maison/creation/"+cible, true);
    xmlhttp.send();
}