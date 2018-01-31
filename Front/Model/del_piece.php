<?php
include ('../Controller/connexion_database.php');


$req = $bdd->prepare('DELETE FROM piece WHERE Nom_piece = :nompiece');
$req -> execute(array('nompiece' => $_POST['nompiece']));
$return = $req->fetch();


header('Location: ../View/accueil.php');

?>
