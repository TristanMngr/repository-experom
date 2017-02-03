<?php

/**
 * AJAX
 * modification données personnels BO
 *
 */



include('request-users-edit.php');


?>

<form method="post" action="/admin/users-edit/<?php echo $_GET['target3'] ?>">
    <div class="block"><span class="line label">Inscrit le: </span><div class="line"><?=$arrayUser[0]['dateInscription'] ?></div></div>
    <div class="block"><label for="role" class="line" >Rôle:</label><div class="line"><?=$arrayUser[0]['role']; ?></div></div>
    <div class="block"><label for="modifierMail" class="line">E-mail</label><input class="line" type="text"
                                                        name="modifierMail"
                                                        id="modifierMail"
                                                        value=<?= $arrayUser[0]['mail'] ?>></div>
    <div class="block"><label for="modifierNom" class="line">Nom</label><input class="line" type="text" name="modifierNom" id="modifierNom" value="<?= $arrayUser[0]['nom'] ?>"></div>


    <div class="block"><label for="modifierNumero" class="line">Téléphone</label><input class="line" type="text"
                                                                       name="modifierNumero"
                                                                       id="modifierNumero"
                                                                       value="<?= $arrayUser[0]['numero'] ?>"></div>

    <div class="block"><label for="modifierMdp" class="line">Mot de passe</label><input class="line" type="password"
                                                             name="modifierMdp"
                                                             id="modifierMdp"></div>



    <div id="envoyer-modifier" class="block">
        <input type="submit" value="Valider" class="envoyer">
    </div>


</form>


