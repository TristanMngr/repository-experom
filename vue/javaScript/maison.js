/**
 * ajoute les capteur selectionner dans une div
 * @param id
 * @param nom
 */

function addCapteur(id,nom,type) {


    document.getElementById(id).style.border = '2px solid green'

    divContList = document.getElementById('conteneurList');

    ulElementTemp = document.getElementById('allListCapteurTemp');
    ulElementHum = document.getElementById('allListCapteurHum');





    liElement = document.createElement('li');

    liElement.id = id;
    liElement.setAttribute('class','list');
    liElement.textContent = nom+" "+id;




    if (type == 'temperature') {
        ulElementTemp.appendChild(liElement);
    }

    else {
        ulElementTemp.style.display = "none"
    }
    if (type == 'humidite') {
        ulElementHum.appendChild(liElement);
    }
    else {
        ulElementTemp.style.display = "none"
    }


    if (ulElementTemp.childElementCount > 1 | ulElementHum.childElementCount > 1 ) {
        divContList.style.display = "block"
    }

    if (ulElementTemp.childElementCount > 1) {
        ulElementTemp.style.display = "block"
    }
    if (ulElementHum.childElementCount > 1 ) {
        ulElementHum.style.display = "block"
    }

    /*for (var k = 0; k < ulElement.get)*/





}




function createNewList(type) {
    getContentLiElement = document.getElementById('selectType');
    selectElement = document.getElementById('select');
    capteurElement = document.getElementById('displayCapteur');

    optionElement = selectElement.getElementsByTagName("option");
    for (var i=0; i< optionElement.length; i++ ) {
        if (optionElement[i].value == type) {
            selectElement.removeChild(optionElement[i]);
        }
    }

    divListCapteur = document.createElement('div');
    divListCapteur.setAttribute('class','allList');
    liElementText = document.createElement('li');
    spanElement = document.createElement('span');
    spanElement.textContent = type;

    divListCapteur.innerHTML += document.getElementById('passageList').innerHTML; // on met la liste des capteurs
    divListCapteur.firstElementChild.id = type;
    divListCapteur.firstElementChild.insertBefore(spanElement,divListCapteur.firstElementChild.firstElementChild);
    console.log(divListCapteur.childNodes);
    document.getElementById('listCapteur').innerHTML ="";
    capteurElement.innerHTML = "";
    document.getElementById('parentElement').insertBefore(divListCapteur,getContentLiElement);


    /*on insert l'element juste avant la div comportant l'input*/
}

// récuppère toute les id (numero serie)  des capteurs, l'array est ensuite envoyé via ajax
function sendArrayCapteur() {
    var arraySerialKey = new Array();
    divElement = document.getElementsByClassName('list');
    hiddenElement = document.getElementById('serialKey');


    for (i = 0 ; i < divElement.length ; i ++) {
        arraySerialKey[i] = divElement[i].id;
    }
    arrayString = arraySerialKey.toString();
    hiddenElement.value = arrayString;

}