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
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="accueil3.css">
  <link rel="stylesheet" type="text/css" href="style_tableau.css">
    <link rel="icon" type="image/png" href="Image/icon.png" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Capteurs et actionneurs</title>
		</head>

		<?php include("../View/header.php"); ?>																					<!--le header est ajouté -->
		<?php include("../Model/affichage_info_piece.php"); ?>

<body>
	<center><h1>Capteurs & Actionneurs</h1></center>	<!--titre de la page-->

	<article style="margin-top: 10px;">																																	<!-- affiche le tableau des valeurs des capteurs -->
		<h2>Etat de vos capteurs</h2><hr>																					<!-- affiche le titre du tableau -->
		<center><?php include("../Model/affiche_capteurs.php"); ?>	
		</article>								<!-- page de la partie Controller -->
	</center>																																	<!-- on a le tableau des valeurs des capteurs -->

  <article>																																<!-- affiche le tableau des valeurs actionneurs -->
		<h2>Etat de vos actionneurs</h2><hr>
		<center><?php include("../Model/affiche_actionneurs.php"); ?>
	</article></center>																																	<!-- on a le tableau des valeurs des actionneurs -->


		<article><h2>Modifier une valeur</h2><hr>

		<p>Cliquez sur le bouton "modifier" pour changer la consigne de vos actionneurs.</p>
		<div class="container">											<!-- création d'un bouton de modification de valeur -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="position:relative;bottom:110px;margin-left:5px">Modifier une valeur</button>
        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modifier la valeur d'un actionneur</h4>					<!-- titre intérieur (modal)-->
        </div>
        
		<form  method="post" action="../Model/modifier.php">										<!--formulaire traité dans modifier.php-->
        <div class="modal-body">
        <p>
        	Sélectionner une pièce, un type d'actionneur et modifier sa valeur:			<!-- indications pour la client -->
        <br>

			<label>Pièce</label>														<!-- sélection de la pièce parmis liste roulante -->            
            <select type="piece" placeholder="nom de la pièce" name="Nom_piece">
                        <option value''>Selectionne une pièce</option>
                        <?php affichageInfoPiece() ?>
			</select>
            </br>

			<label>Référence :</label>														<!-- sélection du type d'actionneur -->
			<input type="text" name="reference">
			</br>

			<label>Valeur :</label>																			<!-- enfin on met la nouvelle valeur -->
            <input type="number" placeholder="valeur souhaitée" name="valeur_de_consigne"></br>
			
			<input type="submit" value = "Modifier">															<!--on valide la modifiaction-->
        </p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
			</form>
      </div>
    </div>
  </div>
</div>

		</article>
<?php include("../View/footer.php"); ?>
</body>
</html>
