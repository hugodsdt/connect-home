<?php
include("../Controller/connect_database.php");



$req = $bdd->prepare('DELETE FROM commande WHERE reference = :reference'); // on sélectionne le paramètre en fonction duquel on va supprimer le device
$affectedLines = $req -> execute(array('reference' => $_POST['reference'])); // on effectue la suppression
$return = $req->fetch();




header('Location: ../View/backoffice_commandes.php'); // retour à la page commandes
?>
