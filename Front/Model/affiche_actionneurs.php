<?php

include ('../Controller/connexion_database.php');

$reponse = $bdd->prepare('SELECT * FROM donnees_actionneurs INNER JOIN devices ON donnees_actionneurs.Devices_idDevices = devices.idDevices AND CeMac_idCeMac=? INNER JOIN type_de_device ON type_de_device.reference_produit = devices.Type_de_device_reference_produit');         //on selecctionne les donnees actionneurs
$reponse->execute(array($_SESSION['idcemac']));                                             //selon le ce mac de l'utilisateur

echo "<table border=1>
<tr>
  <th>Pièce</th>
  <th>Référence</th>
  <th>Fonction</th>
  <th>Valeur actuelle</th>
  <th>Valeur souhaitée</th>
</tr>
";

while ($donnees = $reponse->fetch())

{
    echo "
    <tr>
      <td>".$donnees["nom_piece"]."</td>
      <td>".$donnees["nom_actionneur"]."</td>
      <td>".$donnees["fonction"]."</td>
      <td>".$donnees["consigne_temporelle_de_debut"]."</td>
      <td>".$donnees["valeur_de_consigne"]."</td>
    </tr>
    ";
}
echo "</table>" . "<br>";
$reponse->closeCursor();
?>
