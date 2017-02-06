/**
 * javascript page inscription
 */

function password(element) {
    var aideElement = document.getElementById('helpMdp');
    var mdp = element.value;

    if (mdp.length > 1) {
        var lengthMdp = "Faible";
        var color = "red";
        if (mdp.length > 8) {
            lengthMdp = "Très bien";
            color = "green";
            element.style.border = "green solid 2px"
        }
        else if (mdp.length <= 7 & mdp.length >= 4) {
            lengthMdp = "Bien";
            color = "orange";
            element.style.border = "green solid 2px"
        }
        else if (mdp.length < 4) {
            lengthMdp = "Faible";
            color = "red";
            element.style.border = "red solid 2px"
        }
    }

    aideElement.textContent = lengthMdp;
    aideElement.style.color = color;
    /*element.style.color = color;*/
}

function rpassword(element) {
    mdpElement = document.getElementById('mdp');

    if (mdpElement.value == element.value) {

        element.style.border = "green solid 2px";
    }
    else if (element.value.length > 1) {
        element.style.border = "red solid 2px";

    }
}

function verifNum(element) {
    var regex =  new RegExp('^0[1-68]([ .-]?[0-9]{2}){4}$');
    if (regex.test(element.value)) {
        element.style.border = "green solid 2px"
    }
    else {
        element.style.border = "solid red 2px"
    }

}
function verifMail(element) {
    var regex = new RegExp('^[a-z0-9_.-]+@[a-z0-9_.-]{2,}\.[a-z]{2,4}$');
    if (regex.test(element.value)) {
        element.style.border = "green solid 2px"
    }
    else {
        element.style.border = "solid red 2px"
    }

}


