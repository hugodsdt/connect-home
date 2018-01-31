<?php
session_start();
$q = $_GET["q"];

include ('../Controller/connexion_database.php');

$result = $bdd->prepare("SELECT * FROM devices NATURAL JOIN type_de_device WHERE devices.Type_de_device_reference_produit=type_de_device.reference_produit AND CeMac_idCeMac=? AND nom_piece=?");
$result->execute(array($_SESSION['idcemac'],$q));


echo "<table border='1'>
<tr>
<th>Nom</th>
<th>Référence</th>
<th>Fonction</th>
<th>Type</th>
</tr>";

 while ($row = $result->fetch())
  {
        echo "<tr>";
        echo "<td>" . $row['nom_du_device'] . "</td>";
        echo "<td>" . $row['reference_produit'] . "</td>";
        echo "<td>" . $row['fonction'] . "</td>";
        echo "<td>" . $row['identification'] . "</td>";
        echo "</tr>";
    }
echo "</table>";


$result->closeCursor();
?>
