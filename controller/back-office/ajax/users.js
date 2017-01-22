function ajaxGetUsers(cible)
{
    if (cible == "")
    {
        document.getElementById("listUsers").innerHTML = "";
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

            if (cible.value.length > 1) {
                document.getElementById("listUsers").innerHTML = xmlhttp.responseText;
            }
            else {
                document.getElementById("listUsers").innerHTML ="";
            }
        }
    }
    xmlhttp.open("GET", "/admin/utilisateurs/list/"+cible.value, true);
    xmlhttp.send();
}
