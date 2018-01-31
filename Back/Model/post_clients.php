<?php

$error_message='';

include("../Controller/connect_database.php");

$submit=$bdd->query('SELECT * FROM utilisateur');

while ($ligne = $submit -> fetch()){
  if($_POST['Code_utilisateur']==$ligne["Code_utilisateur"]){
    header('Location: ../View/backoffice_clients.php');
  }
  else {
    $req = $bdd->prepare('INSERT INTO utilisateur (Code_utilisateur, Mot_de_passe, Nom, Prenom, Type_utilisateur, mail) VALUES (?, ?, ?, ?, ?, ?)'); //on sélectionne les colonnes dans lesquelles on va éditer, , et permet de les vérifier
    $req -> execute(array($_POST['Code_utilisateur'], password_hash($_POST['Mot_de_passe'], PASSWORD_DEFAULT), $_POST['nom'], $_POST['prenom'], $_POST['Type_utilisateur'],  $_POST['mail'])); // on y met les valeur venant du formulaire
    header('Location: ../View/backoffice_clients.php');
  }
}



?>
