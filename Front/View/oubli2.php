<?php include("../Model/oublie2.php"); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Page de connexion</title>
	<link rel="stylesheet" type="text/css" href="../View/connexion3.css">
	<meta charset="utf-8">
</head>
<body>
	<header>
		<div id="logo"><img src="Image/logorond.png" style="width:200px"></div>
		<h1>Bienvenue sur le site Connect'Home !</h1>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	</header>


	<section>
		<article><br>
			<div id="phrase">Veuillez entrer le code reçu par mail :</div>
            <form method="post" action="">	
            	<?php echo $error_message;?>
            	<?php echo $message;?>
            	<label>Code reçu :</label>
            	<input type="text" name="code"><br><br>
            	<label>Nouveau mot de passe :</label>
            	<input type="password" name="nmdp"><br><br>
            	<input type="submit" name="valider" value="valider"><br><br>
            </form>

            <a href="..\..\index.php">Revenir à la page de connexion</a><br><br>

		</article>
		
	</section>

	<footer>
		<p><center>Adresse : 28, rue Notre-Dame-des-Champs, 75006, Paris / Téléphone :  01 49 54 52 00 / Mail : domisep@gmail.com</center></p>
	</footer>

</body>

</html>