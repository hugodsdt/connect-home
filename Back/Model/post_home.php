<?php

include("../Controller/connect_database.php");

$error_message="";
$submit=$bdd->query('SELECT * FROM appartement');

while ($ligne = $submit -> fetch()){
  if($_POST['Code_appartement']==$ligne["Code_appartement"]){
    header('Location: ../View/backoffice_clients.php');
  }
  else {
    $req = $bdd->prepare('INSERT INTO appartement (Code_appartement, num_de_rue, nom_de_rue, ville, Code_postal, Utilisateur_Code_utilisateur) VALUES (?, ?, ?, ?, ?, ?)'); //on sélectionne les colonnes dans lesquelles on va éditer, et permet de les vérifier
    $req -> execute(array($_POST['Code_appartement'], $_POST['num_de_rue'], $_POST['nom_de_rue'], $_POST['ville'], $_POST['Code_postal'], $_POST['Utilisateur_Code_utilisateur'])); // on y met les valeur venant du formulaire
    header('Location: ../View/backoffice_clients.php');
  }
}


?>
