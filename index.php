<?php
session_start();
include("modele/connexionDB.php");
include("controller/redirection.php");
?>

<?php

$table = "users";
$champ = "mail";

$requete = $db->prepare('SELECT * FROM '.$table.' WHERE '.$champ.'=:nom');
$requete->execute(array(
"nom" => "flopy@gmail.com"
));

$donnees=$requete->fetch();
if ($donnees == False) {
    echo "n'existe pas ";
}
else {
    echo "existe";
}

