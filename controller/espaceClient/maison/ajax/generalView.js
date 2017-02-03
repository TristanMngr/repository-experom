
function ajaxGeneralView()
{

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
            generalView = document.getElementById("generalView");
            if (generalView.innerHTML == "") {
                document.getElementById("generalView").innerHTML = xmlhttp.responseText;
            }
            else {
                generalView.innerHTML = "";
            }


        }
    }
    xmlhttp.open("GET", "/espace-client/ma-maison/general", true);
    xmlhttp.send();
}
