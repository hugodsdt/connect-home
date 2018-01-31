<?php
include("../Controller/connect_database.php");
	$reponse = $bdd->query('SELECT idPannes, Date, Type_de_panne, Devices_idDevices FROM pannes ORDER BY idPannes'); // sélection des données dans la BDD pour inclusion dans le tableau

	echo "<table border=1>
	<tr>
		<th> Identifiant de la panne </th>
		<th> Date </th>
		<th> Type de panne </th>
		<th> Id du device en panne </th>
	</tr>
	";

	while ($donnees = $reponse->fetch())
	{
		echo "
		<tr>
			<td>".$donnees["idPannes"]."</td>
			<td>".$donnees["Date"]."</td>
			<td>".$donnees["Type_de_panne"]."</td>
			<td>".$donnees["Devices_idDevices"]."</td>
	     </tr>
	     	";
	}
	echo "</table>"; // fermeture du tableau
?>
