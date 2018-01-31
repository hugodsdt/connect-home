<?php
include("../Controller/connect_database.php");

$error_message="";
$submit=$bdd->query('SELECT * FROM type_de_device');

while ($ligne = $submit -> fetch()){
  if($_POST['reference_produit']==$ligne["reference_produit"]){
    header('Location: ../View/backoffice_clients.php');
  }

  else {
    $req = $bdd->prepare('INSERT INTO type_de_device (reference_produit, nom_du_device, prix, identification, fonction, unite, surface_couverte) VALUES (?, ?, ?, ?, ?, ?, ?)'); //on sélectionne les colonnes dans lesquelles on va éditer, et permet de les vérifier
    $req -> execute(array($_POST['reference_produit'], $_POST['nom_du_device'], $_POST['prix'], $_POST['identification'], $_POST['fonction'], $_POST['unite'], $_POST['surface_couverte'])); // on y met les valeur venant du formulaire
    header('Location: ../View/backoffice_articles.php');
  }
}

?>
