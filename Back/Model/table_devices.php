<?php
  // Connexion à la base de données
include("../Controller/connect_database.php");

	$reponse = $bdd->query("SELECT DISTINCT devices.idDevices, devices.Type_de_device_reference_produit, appartement.Utilisateur_Code_utilisateur, utilisateur.Nom, utilisateur.Prenom FROM devices INNER JOIN piece ON piece.CeMac_idCeMac=devices.CeMac_idCeMac INNER JOIN appartement ON appartement.Code_appartement=piece.Appartement_Code_appartement INNER JOIN utilisateur ON utilisateur.Code_utilisateur=appartement.Utilisateur_Code_utilisateur");

  echo "<center><table border=1>
  <tr>
		<th class = 'com'> Code utilisateur </th>
    <th class = 'com'> Nom utilisateur</th>
    <th class='com'> Id du device </th>
    <th class='com'> Type de device </th>

  </tr>
  "; // première ligne du tableau reférençant les devices
  while ($donnees = $reponse->fetch())
  {
    echo "
    <tr>
		<td class='com'>".$donnees["Utilisateur_Code_utilisateur"]."</td>
    <td class='com'>".$donnees["Nom"]." ".$donnees["Prenom"]."</td>
     <td class='com'>".$donnees["idDevices"]."</td>
     <td class='com'>".$donnees["Type_de_device_reference_produit"]."</td>

     </tr>
     ";
  }
  echo "</table></center>";

  $reponse->closeCursor();

  ?>
