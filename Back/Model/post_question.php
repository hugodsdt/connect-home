<?php

	include("../Controller/connect_database.php");

	$req = $bdd->prepare('INSERT INTO faq (question, reponse) VALUES (?, ?)');
	$req -> execute(array($_POST['question'], $_POST['reponse']));
	header('Location: ../View/backoffice_faq.php');
	exit();
?>
