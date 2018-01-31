<?php
session_start();
include ('../Controller/connexion_database.php');


$req2 = $bdd->prepare('DELETE FROM donnees_capteurs WHERE nom_capteur = :reference');
$req2 -> execute(array('reference' => $_POST['reference']));
$return2 = $req2->fetch();

$req3 = $bdd->prepare('DELETE FROM donnees_actionneurs WHERE nom_actionneur = :reference');
$req3 -> execute(array('reference' => $_POST['reference']));
$return3 = $req3->fetch();

$req = $bdd->prepare('DELETE FROM devices WHERE Type_de_device_reference_produit = :reference');
$req -> execute(array('reference' => $_POST['reference']));
$return = $req->fetch();


header('Location: ../View/accueil.php');

?>
