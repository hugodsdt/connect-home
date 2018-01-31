<?php

include ('../Controller/connexion_database.php');

$req = $bdd->prepare('UPDATE donnees_actionneurs SET valeur_de_consigne=? WHERE nom_actionneur=?'); //on modif les donnees
$req -> execute(array($_POST['valeur_de_consigne'],$_POST['reference']));                               // on y met les valeur venant du formulaire
header('Location: ../View/capteurs.php');

$reponse->closeCursor(); 																							// Termine le traitement de la requête

?>
