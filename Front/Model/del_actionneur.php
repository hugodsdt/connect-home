<?php
session_start();

include ('../Controller/connexion_database.php');

$req3 = $bdd->prepare('DELETE FROM donnees_actionneurs WHERE nom_actionneur = :reference');
$req3 -> execute(array('reference' => $_POST['reference']));
$return3 = $req3->fetch();

$req = $bdd->prepare('DELETE FROM devices WHERE Type_de_device_reference_produit = :reference');
$req -> execute(array('reference' => $_POST['reference']));
$return = $req->fetch();

header('Location: ../View/accueil.php');

?>