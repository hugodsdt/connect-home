<?php
include("../Controller/connect_database.php");

$reponse = $bdd->query('SELECT reference_produit, nom_du_device, prix, identification, fonction, unite, surface_couverte FROM type_de_device ORDER BY reference_produit'); // on récupère les données de la base

echo "<table border=1>
<tr>
  <th> Référence </th>
  <th> Nom </th>
  <th> Prix </th>
  <th> Identification</th>
  <th> Fonction</th>
  <th> unite</th>
  <th> Surface couverte </th>
</tr>
"; // en tete du tableau
while ($donnees = $reponse->fetch()) // quand il y a des données à inclure, on crée une nouvelle case et la remplie
{
  echo "
  <tr>
   <td>".$donnees["reference_produit"]."
   <td>".$donnees["nom_du_device"]."</td>
   <td>".$donnees["prix"]."</td>
   <td>".$donnees["identification"]."</td>
   <td>".$donnees["fonction"]."</td>
   <td>".$donnees["unite"]."</td>
   <td>".$donnees["surface_couverte"]." m²</td>
   </tr>
   "; // on met les données dans les cases une par une
}
echo "</table>";

$reponse->closeCursor();

?>
