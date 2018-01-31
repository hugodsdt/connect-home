<?php

session_start();

include ('../Controller/connexion_database.php');


$req = $bdd->prepare('INSERT INTO commande (temps, Type_de_device_reference_produit, utilisateur_code_utilisateur) VALUES (NOW(), ?, ?)');
$req -> execute(array($_POST['commande'], $_SESSION['id']));

header('Location: ../View/catalogue.php');
?>
