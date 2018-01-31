<?php


include ('../Controller/connexion_database.php');

$reponse=$bdd->prepare('SELECT * FROM donnees_capteurs INNER JOIN devices ON donnees_capteurs.Devices_idDevices = devices.idDevices AND CeMac_idCeMac=? INNER JOIN type_de_device ON type_de_device.reference_produit = devices.Type_de_device_reference_produit');
$reponse->execute(array($_SESSION['idcemac']));

echo "<table border=1>
  <tr>
    <th> Pièce </th>
    <th> Référence </th>
    <th> Fonction </th>
    <th> Valeur </th>
  </tr>
";                                                                //le tableau affiche les pièces type et valeur de chaque capteur
while ($donnees = $reponse->fetch())
{
  echo "
    <tr>
      <td>".$donnees["nom_piece"]."</td>
      <td>".$donnees["nom_capteur"]."</td>
      <td>".$donnees["fonction"]."</td>
      <td>".$donnees["valeur_mesuree"]."</td>
    </tr>
    ";                                                            //on récupère les donnéees de la base
}
echo "</table>" . "<br>";

$reponse->closeCursor();												

?>
