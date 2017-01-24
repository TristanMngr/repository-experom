function displayCross(idSpan,idCapteur) {

        spanElement = document.getElementById(idCapteur);
        liElement = document.getElementsByClassName('crossCapteur');
        spanSetElement = document.getElementById(idSpan);


        for ( var li = 0; li < liElement.length ; li ++) {
            liElement[li].innerHTML = "";
        }

        if (spanElement.innerHTML != "") {
            spanElement.innerHTML = "";
        }
        else {
            iElement = document.createElement('i');
            iElement.setAttribute('class', 'flaticon-cancel-music');
            iElement.id = 'capteur' + idCapteur;

            spanElement.appendChild(iElement);



            document.getElementById('capteur' + idCapteur).addEventListener('click', function() {

                if (spanSetElement != null) {
                    document.location.href = '/espace-client/capteurs/remove/' + idCapteur;
                }
                else {
                    alert("Désolé, vous devez d'abord supprimer la salle avec ce capteur pour pouvoir le supprimer");
                }

            });
        }


    }
