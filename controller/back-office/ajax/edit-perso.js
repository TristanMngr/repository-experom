// requête sur la page d'un utilisateur

function ajaxEditPerso(cible)
{
    if (cible == "")
    {
        document.getElementById("posEdit-BO").innerHTML = "";
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
            posEditElmt = document.getElementById("posEdit-BO").style.display = "block";
            document.getElementById("posEdit-BO").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "/admin/utilisateurs/edit-perso/"+cible, true);
    xmlhttp.send();
}
