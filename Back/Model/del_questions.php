<?php
include("../Controller/connect_database.php");



$req = $bdd->prepare('DELETE FROM faq WHERE ID = :ID'); // on sélectionne le paramètre en fonction duquel on va supprimer le device
$affectedLines = $req -> execute(array('ID' => $_POST['ID'])); // on effectue la suppression
$return = $req->fetch();




header('Location: ../View/backoffice_faq.php'); // retour à la page articles
?>
