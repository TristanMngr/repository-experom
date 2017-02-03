/**
 * requete sur le pseudo pour générer la page information maison
 * @param cible
 * @returns {*}
 */

function ajaxGetHome(cible)
{
    if (cible == "")
    {
        document.getElementById("maison-BO").innerHTML = "";
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

            document.getElementById("maison-BO").innerHTML = xmlhttp.responseText;






        }
    }
    xmlhttp.open("GET", "/admin/utilisateurs/home/"+cible.id, true);
    xmlhttp.send();
}
