<?php
session_start();
if($_SESSION['status']!="Active") {
	header ('Location: ../../index.php');
	  exit();
  }
?>

<!DOCTYPE html>
	<html>
		<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width">
		<title>Catalogue</title>
		<link rel="stylesheet" type="text/css" href="catalogue.css">
		<link rel="stylesheet" type="text/css" href="style_tableau.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <link rel="icon" type="image/png" href="Image/icon.png" />

		</head>

<?php include '../View/header.php' ?>


<body>	
	<center><h1>Catalogue</h1></center>		<!--titre de la page-->
	
	<article style="margin-top:10px;">
			
		<h2>Vos commandes en cours</h2><hr>
			<?php include '../Model/affichage_commande_catalogue.php' ?>	
	</article>
			
<article>
		 
	 <h2> Capteurs en vente par type </h2><hr>
	<ul>
		
		<li class="carre" >
		<a href="../View/catalogue_capteur.php?type=Humidite">
			<center><img src="Image/goutte.png" alt="Humidité" title="Humidité" class="pics" style="width:30%"/></center><br/>
		<p class="titre">Humidité</p></a>
		</li>
		
		
		<li class="carre">
		<a href="../View/catalogue_capteur.php?type=Camera">
			<img src="Image/camera.png" alt="Camera" title="Caméra" class="pics" style="width:30%"/><br/>
		<p class="titre">Camera</p></a>
		</li>
		
		<li class="carre">
		<a href="../View/catalogue_capteur.php?type=Temperature">
			<img src="Image/temp.png" style="width:30%" alt="Température" title="Température" class="pics"/><br/>
		<p class="titre">Température</p></a>
		</li>
		
		<li class="carre">
		<a href="../View/catalogue_capteur.php?type=Mouvement">
			<img src="Image/mouvement.png" style="width:30%"  alt="Capteur de mouvement" title="Capteur de mouvement" class="pics"/><br/>
		<p class="titre">Capteur de mouvement</p></a>
		</li>
	</ul>

	<ul>
		
		<li class="carre">
		<a href="../View/catalogue_capteur.php?type=Luminosite">
			<img src="Image/luminosite.png" style="width:30%"  alt="Luminosite" title="Luminosité" class="pics"/><br/>
		<p class="titre">Luminosité</p></a>
		</li>
		
		<li class="carre">
		<a href="../View/catalogue_capteur.php?type=Fumee">
			<img src="Image/feu.png" style="width:30%"  alt="Capteur de fumee" title="Capteur de fumée" class="pics"/><br/>
		<p class="titre">Capteur de fumée</p></a>
		</li>
		
		<li class="carre">
		<a href="../View/catalogue_capteur.php?type=Eau">
			<img src="Image/consoeau.png" style="width:30%" alt="Capteur de consommation d'eau" title="Capteur de consommation d'eau" class="pics"/><br>
		<p class="titre">Capteur de consomation d'eau</p></a>
		</li>
		
		<li class="carre">
		<a href="../View/catalogue_capteur.php?type=Electricite">
			<img src="Image/consoelec.png" style="width:30%"  alt="Capteur de consommation d'électricité" title="Capteur d'électricité" class="pics"/><br>
		<p class="titre">Capteur de consomation d'électricité</p></a>
		</li>
	</ul>

</article>

		</br>


		</body>

	<?php include '../View/footer.php' ?>
