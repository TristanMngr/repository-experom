function password(e) {
    console.log(e.target.value)
}


document.getElementById('mdp').addEventListener('input',function(e){
    var aideElement = document.getElementById('helpMdp');
    var mdp = e.target.value;

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
    e.target.style.color = color;
});