<?php



include("../Controller/connect_database.php");


$req = $bdd->prepare('DELETE FROM type_de_device WHERE reference_produit = :reference_del'); // on sélectionne le paramètre en fonction duquel on va supprimer le device
$affectedLines = $req -> execute(array('reference_del' => $_POST['reference_del'])); // on effectue la suppression lorsque ce paramètre correspond avec le post
$return = $req->fetch();

header('Location: ../View/backoffice_articles.php'); // retour à la page articles

?>
