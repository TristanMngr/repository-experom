<?php
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
{
    $passage_ligne = "\r\n";
}
else
{
    $passage_ligne = "\n";
}

$sujet = 'changement de mot de passe';


ob_start();
?>
<html>
<head>

</head>
<body>
    <b>Salut à tous</b>
    , voici un e-mail envoyé par un <i>script PHP</i> <p> ton code : <strong>$user_code</strong></p>.
</body>
</html>
<?php
$message_html = ob_get_clean();
$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";

//=====Message html

//=====Création de la boundary
$boundary = "-----=".md5(rand());

//=====Création du header de l'e-mail
$header = "From: \"Domisep\"<domisep.contact@gmail.com>".$passage_ligne;
$header .= "Reply-to: \"NoReply\" <domisep.contact@gmail.com>".$passage_ligne;
$header .= "MIME-Version: 1.0".$passage_ligne;
$header .= "Content-Type: multipart/alternative;".$passage_ligne." 
boundary=\"$boundary\"".$passage_ligne;
//==========



// message

$message = $passage_ligne."--".$boundary.$passage_ligne;

//=====Ajout du message au format texte.

$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;

$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

$message.= $passage_ligne.$message_txt.$passage_ligne;

//==========

$message.= $passage_ligne."--".$boundary.$passage_ligne;

//=====Ajout du message au format HTML

$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;

$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

$message.= $passage_ligne.$message_html.$passage_ligne;

//==========

$message.= $passage_ligne."--".$boundary."--".$passage_ligne;

$message.= $passage_ligne."--".$boundary."--".$passage_ligne;

//==========

?>

