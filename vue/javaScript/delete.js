/**
 fenêtre pop-up confirmation suppression, puis redirection vers controller suppression
 */


/*fonction qui permet de supprimer salle/modes/utilisateur/*/
function deleteConf(name,action) {
    if (confirm('Vous êtes sur le point de supprimer '+name+ '.')) {
        newName = "";
        newName = name.replace(/ /g,"+");


        if (action == "maison") {
            document.location.href = "/espace-client/ma-maison/supprimer/"+newName;
        }
        else if (action == "mode") {
            document.location.href = "/espace-client/modes/supprimer/"+newName;
        }
        else if (action == "utilisateur") {
            document.location.href = "/espace-client/modifier-donnees-perso/suppression/"+newName;

        }
    }
}



/*function windowPop() {
    window.open('../popUp/popup.html','superFenêtre','top=10,left=10,resible=no');
    return  false;
}*/
