<?php
include("../Controller/connect_database.php");

$reponse = $bdd->query('SELECT Code_appartement, num_de_rue, nom_de_rue, ville, Code_postal, Utilisateur_Code_utilisateur FROM appartement'); // on récupère les données de la base

echo "<table border=1>
<tr>
  <th> Code appartement </th>
  <th> Numéro de la rue </th>
  <th> Nom de la rue </th>
  <th> Ville</th>
  <th> Code postal</th>
  <th> Code du propriétaire</th>

</tr>
"; // en tete du tableau
while ($donnees = $reponse->fetch()) // quand il y a des données à inclure
{
  echo "
  <tr>
   <td>".$donnees["Code_appartement"]."</td>
   <td>".$donnees["num_de_rue"]."</td>
   <td>".$donnees["nom_de_rue"]."</td>
   <td>".$donnees["ville"]."</td>
   <td>".$donnees["Code_postal"]."</td>
   <td>".$donnees["Utilisateur_Code_utilisateur"]."</td>
   </tr>
   "; // on met les données dans les cases une par une
}
echo "</table>";

$reponse->closeCursor();

?>
