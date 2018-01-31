<?php
session_start();

include ('../Controller/connexion_database.php');


$req = $bdd->prepare('INSERT INTO devices (idDevices, Type_de_device_reference_produit,CeMac_idCeMac,nom_piece) VALUES (NULL,?,?, ?)');
$req -> execute(array($_POST['reference'], $_SESSION['idcemac'],$_POST['piece']));

$reponse = $bdd->prepare('SELECT * FROM devices WHERE Type_de_device_reference_produit= ? AND CeMac_idCeMac=?');
$reponse->execute(array($_POST['reference'],$_SESSION['idcemac']));
$donnees = $reponse->fetch();
$Devices=$donnees['idDevices'];

$req3 = $bdd->prepare('INSERT INTO donnees_actionneurs (Code_actionneur , nom_actionneur , consigne_temporelle_de_debut , consigne_temporelle_de_fin,valeur_de_consigne , Devices_idDevices) VALUES (NULL,?,NULL,NULL,NULL,?)');
$req3 -> execute(array($_POST['reference'],  $Devices));

header('Location: ../View/accueil.php');
?>