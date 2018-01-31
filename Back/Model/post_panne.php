<?php

include("../Controller/connect_database.php");

$error_message="";
$submit=$bdd->query('SELECT * FROM pannes');

while ($ligne = $submit -> fetch()){
  if($_POST['idPannes']==$ligne["idPannes"]){
    header('Location: ../View/backoffice_clients.php');
  }

  else {
    $req = $bdd->prepare('INSERT INTO pannes (idPannes, Date, Type_de_panne, Cout_ocasionne, Devices_idDevices) VALUES (?, ?, ?, ?, ?)'); //on sélectionne les colonnes dans lesquelles on va éditer, et permet de les vérifier
    $req -> execute(array($_POST['idPannes'], $_POST['Date'], $_POST['Type_de_panne'], $_POST['Cout_ocasionne'], $_POST['Devices_idDevices'])); // on y met les valeur venant du formulaire
    header('Location: ../View/backoffice_pannes.php');
  }

}

?>
