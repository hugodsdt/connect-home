<?php include("Front/Controller/session_connexion.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<title>Page de connexion</title>
	<link rel="stylesheet" type="text/css" href="Front/View/connexion3.css">
	<link rel="icon" type="image/png" href="Front/View/Image/icon.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta charset="utf-8">

</head>

<script>
            function validateRegistration() 
            {
                var id = form_connexion.id.value;
                var password = form_connexion.Mot_de_passe.value;
                
                if (id == "") 
                {
                    alert("Le code utilisteur est vide");
                    return false;
                    registration.id.focus() ;
                 }

                if (password == "") 
                {
                    alert("Le mot de passe est vide");
                    return false;
                    registration.Mot_de_passe.focus() ;
                }
            }
</script>

<body>

	<header>
		<center>
		    <img src="Front/View/Image/logorond.png" style="width:150px"> <!--logo-->
		</center>
		
		<h1>Bienvenue sur le site Connect'Home !</h1>
		
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		
  		
  	</header>
    
	<section class="main">
		<article><br>
			<div id="phrase">Veuillez vous connecter pour continuer :</div>
            <center><form method="post" action="" class="form-1" name="form_connexion" onsubmit="return validateRegistration()">
	            <?php echo $error_message;?>
	            
	            <p class="field">
				<label>Nom d'utilisateur:</label><br>
				<img src="Front/View/Image/user.png" style="width: 15px">
				<input type="text" name="id" placeholder="Nom d'utilisateur"></p>

				<p class="field">
				<label>Mot de passe:</label><br>
				<img id="cadenas" src="Front/View/Image/cadenas.png" style="width: 15px">
				<input type="password" name="Mot_de_passe" placeholder="Mot de passe"></p><br><br>

				<p class="clearfix"><input type="submit" name="Connexion" value="Connexion"></p>

				<a href="Front/View/oubli.php">J'ai oublié mon mot de passe</a><br>
	        </form></center><br> 


		</article>
		<center><aside>
			<p><span style="font-size:25px; color:#333"><u><strong>Vous n'êtes pas encore inscrits ?</strong></u><br><span style="font-size:22px; color:#333">Le but de Connect'Home est de vous simplifier la vie au quotidien, en rendant votre maison intelligente. Pour bénéficier des différentes fonctionnalités proposées rendez vous sur le site de <a href='#'><span style="color:blue"> Domisep </span></a>.</span>
			</p>
			<a href="/git/Back/index.php"><img src="Front/View/Image/admin.png" style="width:5%" title="administrateur"></a>
		</aside></center><br>
	</section>

	<footer>
		<p><center><span style="font-size: 25px">Adresse : 28, rue Notre-Dame-des-Champs, 75006, Paris / Téléphone :  01 49 54 52 00 / Mail : domisep@gmail.com</span></center></p>
	</footer>

</body>

</html>