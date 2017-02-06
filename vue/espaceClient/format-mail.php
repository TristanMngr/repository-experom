<?php



$header="MIME-Version: 1.0\r\n";
$header.='From:"domisep"<domisep.contact@gmail.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message='
<html>
	<body>
		<div align="center">
			<br />
			<h3 color="blue">Vous avez demandé à changer de mot de passe</h3>
			Voici le code : '.$user_code.'
			<br />
			<p>Entre ce code sur le site de Domisep puis choisi un nouveau mot de passe</p>
		</div>
	</body>
</html>
';

mail("primfxtuto@gmail.com", "Salut tout le monde !", $message, $header);
?>