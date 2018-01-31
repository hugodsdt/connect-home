<?php
include("../Controller/connect_database.php");



$req = $bdd->prepare('DELETE FROM pannes WHERE idPannes = :idPannes'); // on sélectionne le paramètre en fonction duquel on va supprimer le device
$affectedLines = $req -> execute(array('idPannes' => $_POST['idPannes'])); // on effectue la suppression
$return = $req->fetch();




header('Location: ../View/backoffice_pannes.php'); // retour à la page pannes
?>
