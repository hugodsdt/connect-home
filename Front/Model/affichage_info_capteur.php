<?php

include ('../Controller/connexion_database.php');

  // Récupération des 10 derniers messages
  $reponse = $bdd->prepare('SELECT * FROM devices NATURAL JOIN type_de_device WHERE devices.Type_de_device_reference_produit=type_de_device.reference_produit AND CeMac_idCeMac=?');
  $reponse->execute(array($_SESSION['idcemac']));

  echo "<table border=1>
  <tr>
    <th> Nom </th>
    <th> Fonction </th>
    <th> Réference </th>
    <th> Type </th>
  </tr>
  ";

  while ($donnees = $reponse->fetch())
  {
    echo "
    <tr>
     <td>".$donnees["nom_du_device"]."</td>
     <td>".$donnees["fonction"]."</td>
     <td>".$donnees["reference_produit"]."</td>
     <td>".$donnees["identification"]."</td>
     </tr>
     ";
  }
  echo "</table>" . "<br>"; 

  $reponse->closeCursor();
?>