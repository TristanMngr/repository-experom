/**
 * Created by tristanmenager on 06/01/2017.
 */
function deleteConf(name,action) {
    if (confirm('Vous êtes sur le point de supprimer '+name+ '?')) {
        newName = "";
        newName = name.replace(" ","+");


        console.log(newName);
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