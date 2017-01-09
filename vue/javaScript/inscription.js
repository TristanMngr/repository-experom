function password(e) {
    console.log(e.target.value)
}


document.getElementById('mdp').addEventListener('input',function(e){
    var mdp = e.target.value;

    if (mdp.length > 1) {
        var lengthMdp = "faible";
        var color = "red";
        if (mdp.length > 8) {
            lengthMdp = "très bien";
            color = "green";
        }
        else if (mdp.length <= 7 & mdp.length >= 4) {
            lengthMdp = "bien";
            color = "orange";
        }
        else if (mdp.length < 4) {
            lengthMdp = "faible";
            color = "red";
        }
    }
    var aideElement = document.getElementById('helpMdp');
    aideElement.textContent = lengthMdp;
    aideElement.style.color = color;
    e.target.style.color = color;
});