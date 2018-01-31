<?php

include("../Controller/connect_database.php");

$req = $bdd->prepare('DELETE FROM utilisateur WHERE Code_utilisateur = :Code_utilisateur'); // on sélectionne le paramètre en fonction duquel on va supprimer l'utilisateur
$req -> execute(array('Code_utilisateur' => $_POST['Code_utilisateur'])); // on effectue la suppression
$return = $req->fetch();

header('Location: ../View/backoffice_clients.php');// retour à la page clients
?>
