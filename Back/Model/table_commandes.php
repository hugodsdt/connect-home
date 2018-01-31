<?php
  // Connexion à la base de données
include("../Controller/connect_database.php");

	$reponse = $bdd->query('SELECT Utilisateur_Code_utilisateur, reference, Type_de_device_reference_produit, temps FROM commande ORDER BY Utilisateur_code_utilisateur');

  echo    "<center><table border=1>
  <tr>
		<th class = 'com'> Code utilisateur </th>
    <th class='com'> Numéro de commande </th>
    <th class='com'> Identifiant de l'article </th>
    <th class='com'> Date de commande </th>
  </tr>
  "; // première ligne du tableau reférençant les commandes
  while ($donnees = $reponse->fetch())
  {
    echo "
    <tr>
		<td class='com'>".$donnees["Utilisateur_Code_utilisateur"]."</td>
     <td class='com'>".$donnees["reference"]."</td>
     <td class='com'>".$donnees["Type_de_device_reference_produit"]."</td>
     <td class='com'>".$donnees["temps"]."</td>
     </tr>
     "; // contenu de chaque ligne de commande
  }
  echo "</table></center>";

  $reponse->closeCursor();

  ?>
