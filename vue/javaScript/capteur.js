function displayCross(id,idCapteur) {

        aElement = document.getElementById(idCapteur);

        if (aElement.innerHTML != "") {
            aElement.innerHTML = "";
        }
        else {
            iElement = document.createElement('i');
            iElement.setAttribute('class', 'flaticon-cancel-music');
            aElement.appendChild(iElement);
        }
    }
