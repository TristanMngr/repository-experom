function ajaxGetDataMode(salle, mode)
{

    /*remplace les espace par des tiret pour que l'url comprenne*/
    mode = mode.replace(" ","-");

    if (salle == "")
    {
        document.getElementById(cible).innerHTML = "";
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


            document.getElementById(salle).innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "/espace-client/ma-maison/activer-mode/"+salle+"/"+mode, true);
    xmlhttp.send();
}/**
 * Created by tristanmenager on 22/01/2017.
 */
