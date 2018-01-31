<?php
session_start();
include ('../Controller/connexion_database.php');


$req = $bdd->prepare('INSERT INTO piece (Code_piece, Nom_piece, Surface_piece, Appartement_Code_appartement, CeMac_idCeMac) VALUES (NULL, ?, ?, ?, ?)');
$req -> execute(array( $_POST['nompiece'], $_POST['superficie'],$_SESSION['Code_appartement'],$_SESSION['idcemac']));
header('Location: ../View/accueil.php');
?>
