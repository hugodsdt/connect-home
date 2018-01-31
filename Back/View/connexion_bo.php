<?php include("Model/connect.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion Back-Office</title>
	<link rel="stylesheet" type="text/css" href="View/connexion_back.css">
		<meta charset="utf-8">

</head>
<body>


	<div class="titre">
		<img class="headerimg" src="View/Image/logorond.png">
	 </br>
		<center>Connexion administrateur</center>
	</br>


	</div>
	<p>Entrez votre indentifiant et votre mot de passe pour vous connecter à l'espace administrateur</p>
	<center> <span style="color: red"> <?php echo $error_message;?> </span></center>
</br>
	<center><form action="" method="POST">
	<!-- création du formulaire pour entrer son identifiant et son mot de passe -->
	  <label>Nom d'utilisateur:</label><br>
		<img src="View/Image/user.png" style="width: 15px">
		<input type="text" name="ID"><br> <br>
		<label>Mot de passe:</label><br>
		<img id="cadenas" src="View/Image/cadenas.png" style="width: 15px">
		<input type="password" name="password"><br> <br>
		<input type="submit" name="bouton" class="bouton" value="Se connecter" >
	</br>
		<center> Une fois connecté vous pourrez éditer les profils, consulter les informations relatives aux capteurs, et éditer le catalogue !<br><br>Pour retourner sur la version client, cliquez ici : <a href="../index.php">Client</a> </center>
	</form></center>


</body>
</html>
