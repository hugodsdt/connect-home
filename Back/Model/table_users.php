<?php
include("../Controller/connect_database.php");

$reponse = $bdd->query('SELECT Code_utilisateur, Mot_de_passe, Nom, Prenom,Type_utilisateur, mail FROM utilisateur ORDER BY Code_utilisateur');

echo "<table border=1>
<tr>
	<th> Numero utilisateur </th>
	<th> Nom </th>
	<th> Prénom </th>
	<th> Type d'utilisateur </th>
	<th> Mail </th>
</tr>
";
while ($donnees = $reponse->fetch())
{
	echo "
	<tr>
	 <td>".$donnees["Code_utilisateur"]."</td>
	 <td>".$donnees["Nom"]."</td>
	 <td>".$donnees["Prenom"]."</td>
	 <td>".$donnees["Type_utilisateur"]."</td>
	 <td>".$donnees["mail"]."</td>

	 </tr>
	 ";
}
echo "</table>";

$reponse->closeCursor();

?>
