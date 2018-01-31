<?php
include("../Controller/connect_database.php");


$req = $bdd->prepare('DELETE FROM appartement WHERE Code_appartement = :Code_appartement'); // on sélectionne le paramètre en fonction duquel on va supprimer le domicile
$req -> execute(array('Code_appartement' => $_POST['Code_appartement'])); // on effectue la suppression
$return = $req->fetch();

header('Location: ../View/backoffice_clients.php'); // retour à la page clients

?>
