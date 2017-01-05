<?php
include("vue/header.php");
include("vue/footer.php");
ob_start();
$titre = "consommation";
?>

<section id="consoMaison">
<table id="consommation">
 	<caption> Température de la maison </caption>
 		<tr>
 			<th> Le 03/01 </th>
 			<th> Le 04/01 </th>
 			<th> Le 05/01 </th>
 			<th> Le 06/01 </th>
 		</tr>
 		<tr>
 			<td> 25°C </td>
 			<td> 26°C </td>
 			<td> 24°C </td>
 			<td> 25°C </td>
 		</tr>
 </table>
 <table>
 	<caption> Humidité de la maison </caption>
 		<tr>
 			<th> Le 03/01 </th>
 			<th> Le 04/01 </th>
 			<th> Le 05/01 </th>
 			<th> Le 06/01 </th>
 		</tr>
 		<tr>
 			<td> 50% </td>
 			<td> 45% </td>
 			<td> 46% </td>
 			<td> 37% </td>
 		</tr>
 </table>
</section>

<?php
$section = ob_get_clean();
include("gabarit.php");
