<?php
session_start();

include ('../Controller/connexion_database.php');


$req = $bdd->prepare('INSERT INTO devices (idDevices, Type_de_device_reference_produit,CeMac_idCeMac,nom_piece) VALUES (NULL,?,?, ?)');
$req -> execute(array($_POST['reference'], $_SESSION['idcemac'],$_POST['piece']));

$reponse = $bdd->prepare('SELECT * FROM devices WHERE Type_de_device_reference_produit= ? AND CeMac_idCeMac=?');
$reponse->execute(array($_POST['reference'],$_SESSION['idcemac']));
$donnees = $reponse->fetch();
$Devices=$donnees['idDevices'];

$req2 = $bdd->prepare('INSERT INTO donnees_capteurs (code_capteur,nom_capteur,valeur_mesuree,temps, Devices_idDevices) VALUES (NULL,?, NULL,NULL,?)');
$req2 -> execute(array($_POST['reference'], $Devices));



header('Location: ../View/accueil.php');

?>
