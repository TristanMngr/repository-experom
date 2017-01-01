
// modes:

function getPage(valueElement){
    var tempElement = document.getElementById("temperature");
    var humElement = document.getElementById("humidite");
    var lumElement = document.getElementById("lumiere");
    var page ;
    switch (valueElement) {
        case "temperature":
            page = tempElement;
            break;
        case "humidite":
            page =  humElement;
            break;
        case "lumiere":
            page = lumElement;
    }
    return page;
}


function getSelection(valeur) {
    var idSelect ;
    switch (valeur) {
        case "choixCapteurTemp":
            idSelect = "temperature";
            break;
        case "choixCapteurHum":
            idSelect = "humidite";
            break;
        case "choixCapteurLum":
            idSelect = "lumiere";
    }
    return idSelect;
}
// ajout de la config température dans la div template.



//TODO change : changement de config selon le capteurs


var validerElement = document.getElementById('configMode');

var configModeElement = document.querySelectorAll('li.template');
var lastLiIndex = configModeElement.length-1;

validerElement.addEventListener("change", function (e) {

    configModeElement = document.querySelectorAll('li.template'); // changer ça

    console.log("le li element change:");
    console.log(configModeElement);

    lastLiIndex = configModeElement.length-1;

    var templateConfig = getPage(e.target.value);
    configModeElement[lastLiIndex].innerHTML = templateConfig.innerHTML;

});



validerElement.addEventListener("click", function (e) {

    if (e.target.classList[0] == "valider") {
        configModeElement = document.querySelectorAll('li.template');
        lastLiIndex = configModeElement.length-1;
        configModeElement[lastLiIndex].className += " disabledClass";
        var selection = document.getElementsByName('select')[lastLiIndex];


        console.log(configModeElement[lastLiIndex]);


        var liElement = document.createElement('li');
        liElement.setAttribute('class', 'template');
        configModeElement = liElement;

        document.getElementById('configMode').appendChild(liElement);
        liElement.innerHTML = getPage('humidite').innerHTML;
    }


});

//TODO valider : ajouter une div avec les config capteurs

















