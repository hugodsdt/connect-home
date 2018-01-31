<?php
session_start();
if($_SESSION['status']!="Active") {
	header ('Location: ../index.php');
  	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width">
	<title>Back-Office Commandes</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="view.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include("header_bo.php"); ?>

<h2> <center> Commandes en cours </center> </h2>
<?php include("../Model/table_commandes.php"); ?>

</br>

<article>

		<div class="container">

		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">Supprimer une commande </button> <!-- le bouton pour supprimer un compte -->


		<div class="modal fade" id="myModal3" role="dialog">
				<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Gestion des commandes</h4>
				</div>
		<form  method="post" action="../Model/del_commandes.php">
		<div class="modal-body">
		<p>
			Entrez le code de la commande traità traiter:
				<br>
				<input type="number" placeholder="Code de la commande" name="reference">

				<input type="submit" value = "Traiter">
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

</body>
</html>
