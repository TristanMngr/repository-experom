/**
 * ajoute les capteur selectionner dans une div
 * @param id
 * @param nom
 */

function addCapteur(id,nom,type) {

    // on entre tout les id de la liste dans un array, et on verifie la présence lors du clique


    arrayLiId = new Array();
    for (var li = 0; li < listLiElement.length; li ++) {
        arrayLiId[li] = listLiElement[li].id;
        console.log(arrayLiId[li])
    }
    console.log(id);

    if (arrayLiId.indexOf('capteur'+id) == -1) {
        if (arrayLiId.indexOf('capteur'+id) == -1) {
            document.getElementById(id).style.background = 'green';
            document.getElementById(id).style.color = 'white';

        }



        divContList = document.getElementById('conteneurList');

        ulElementTemp = document.getElementById('allListCapteurTemp');
        ulElementHum = document.getElementById('allListCapteurHum');


        liElement = document.createElement('li');

        liElement.id = 'capteur'+id;
        liElement.setAttribute('class', 'list');
        liElement.textContent = nom + " " + id;


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


        /*affiche les div si capteur présent dans la liste*/
        if (ulElementTemp.childElementCount > 1 | ulElementHum.childElementCount > 1) {
            divContList.style.display = "block"
        }

        if (ulElementTemp.childElementCount > 1) {
            ulElementTemp.style.display = "block"
        }
        if (ulElementHum.childElementCount > 1) {
            ulElementHum.style.display = "block"
        }
    }
    else {

        /*Dans le cas ou on reselectionne le même capteur alors on supprime le le li de la liste de capteur*/

        divContList = document.getElementById('conteneurList');
        ulElementTemp = document.getElementById('allListCapteurTemp');
        ulElementHum = document.getElementById('allListCapteurHum');



        arrayLiId = new Array();
        for (var li = 0; li < listLiElement.length; li ++) {
            arrayLiId[li] = listLiElement[li].id;
        }

        document.getElementById(id).style.background = '#FFFFFF';
        document.getElementById(id).style.color = '#3F4E5F';

        if (type == 'temperature') {
            ulElementTemp.removeChild(document.getElementById('capteur'+id))
        }
        else if (type == 'humidite') {
            ulElementHum.removeChild(document.getElementById('capteur'+id))
        }


        /*cache les div si capteur non présent dans la liste*/
        /*if (ulElementTemp.childElementCount <= 1 & ulElementHum.childElementCount <= 1) {
            divContList.style.display = "none"
        }*/

        if (ulElementTemp.childElementCount <= 1) {
            ulElementTemp.style.display = "none"
        }
        if (ulElementHum.childElementCount <= 1) {
            ulElementHum.style.display = "none"
        }

        /*parentElement = document.querySelector('#conteneurList #'+id).parentNode;

        parentElement.removeChild(document.getElementById(id));*/

    }

}




/*function createNewList(type) {
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


    /!*on insert l'element juste avant la div comportant l'input*!/
}*/

// récuppère toute les id (numero serie)  des capteurs, l'array est ensuite envoyé via ajax
function sendArrayCapteur() {
    var arraySerialKey = new Array();
    divElement = document.getElementsByClassName('list');
    hiddenElement = document.getElementById('serialKey');


    for (i = 0 ; i < divElement.length ; i ++) {
        //découpe la string pour avoir une id correspondant à la serial key
        arraySerialKey[i] = divElement[i].id.substr(7);
    }
    arrayString = arraySerialKey.toString();
    hiddenElement.value = arrayString;

}