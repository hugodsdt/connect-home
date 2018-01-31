<?php
session_start();
$error_message='';
$message='';
if(false==empty($_POST)){
	$post_code = $_POST['code'];
	$post_nmdp = $_POST['nmdp'];
	if (password_verify($post_code, $_SESSION['code'])==true) {
		try
			{
			  $bdd = new PDO('mysql:host=localhost;dbname=hugodsdt_mydb;charset=utf8', 'hugodsdt', 'esi265');
			}
			catch(Exception $e)
			{
			        die('Erreur : '.$e->getMessage());
			}
		$post_nmdp_hashed = password_hash($post_nmdp, PASSWORD_DEFAULT);   //on hash le password aleatoire avant de l'envoyer à la bdd
		$req = $bdd->prepare('UPDATE `utilisateur` SET `Mot_de_passe` = :mdp WHERE `utilisateur`.`Code_utilisateur` = :user');
		$req -> execute(array(':mdp' => $post_nmdp_hashed,
	                          ':user' => $_SESSION['id']));
		$return = $req->fetch();
		$message= "votre mot de passe a bien été modifié.";
	}
	else{
		$error_message='Le code est invalide';
	}
}
if (false == empty($error_message)){
			$error_message="<div class=\"alert alert-danger\" role=\"alert\">$error_message</div>";
}
if (false == empty($message)){
			$error_message="<div class=\"alert alert-success\" role=\"alert\">$message</div>";
}
?>


