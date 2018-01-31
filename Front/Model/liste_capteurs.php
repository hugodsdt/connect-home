<?php

include ('../Controller/connexion_database.php');

	//requête pour récupérer les info triées par date depuis la table pannes
	$req = $bdd->prepare('SELECT * FROM type_de_device WHERE fonction = ?');
	$req->execute(array($_GET['type']));
	// Affichage de ces informations dans un tableau
	echo "<table>
		<tr>
			<th> <strong>Nom</strong> </th>
			<th> <strong>Référence produit</strong> </th>
			<th> <strong>Fonction</strong> </th>
			<th> <strong>Type</strong> </th>
			<th> <strong>Surface couverte</strong> </th>
			<th> <strong>Prix</strong> </th>
		</tr>
		";
	
	while ($donnees = $req->fetch())
	{
		echo "
			<tr>
				<td>".$donnees["nom_du_device"]."</td>
				<td>".$donnees["reference_produit"]."</td>
				<td>".$donnees["fonction"]."</td>
				<td>".$donnees["identification"]."</td>
				<td>".$donnees["surface_couverte"]."</td>
				<td>".$donnees["prix"]." €"."</td>
		    </tr>
		   	";
	}
	echo "</table>"; 
?>