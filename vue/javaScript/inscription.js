function password(element) {
    var aideElement = document.getElementById('helpMdp');
    var mdp = element.value;

    if (mdp.length > 1) {
        var lengthMdp = "Faible";
        var color = "red";
        if (mdp.length > 8) {
            lengthMdp = "Très bien";
            color = "green";
        }
        else if (mdp.length <= 7 & mdp.length >= 4) {
            lengthMdp = "Bien";
            color = "orange";
        }
        else if (mdp.length < 4) {
            lengthMdp = "Faible";
            color = "red";
        }
    }

    aideElement.textContent = lengthMdp;
    aideElement.style.color = color;
    element.style.color = color;
}

function rpassword(element) {
    mdpElement = document.getElementById('mdp');

    console.log(mdpElement.value);
    console.log(element.value);
    if (mdpElement.value == element.value) {

        element.style.border = "green solid 2px";
    }
    else {
        element.style.border = "black transparent 1px";

    }
}


