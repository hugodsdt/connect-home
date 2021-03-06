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
	<title>Pannes</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="view.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php include("header_bo.php"); ?>

<body>


			<center><h2>Liste des capteurs en panne</h2></center>



<center>

<?php include("../Model/table_pannes.php"); ?>
</br>
</center>

<article>
<div class="container">
<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Nouvelle panne</button> <!-- bouton d'ouverture de fenetre modale, ajout de domicile -->

<!-- Modal -->
			<div class="modal fade" id="myModal2" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Panne</h4>
						</div>
						<form name="panne" submit="Testpanne"  method="post" action="../Model/post_panne.php">
							<div class="modal-body">
									<p>
									Entrez les informations sur la nouvelle panne
									<br>
									<input type="number" placeholder="idPannes" name ="idPannes">
									<br>
									Si la date est connue:
									<input type="date" placeholder="Date" name="Date">
									<br>
									<select name="Type_de_panne" >
           							<option value="surcharge">Surcharge</option>
           							<option value="surchauffe">Surchauffe</option>
           							<option value="degats_des_eaux">Dégats des eaux</option>
           							</select>
									<br>
									<input type="number" placeholder="idDevices" name="Devices_idDevices">
									<br>
									<input type="submit" value = "Ajouter">
							</div>
						<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
						</div>
					</form>
			</div>
	</div>
</div>
</div>
<script>
function Testpanne(){
	var id = panne.idPannes.value;
	//var date = panne.Date.value;
	var id_device = panne.Devices_idDevices.value;
	if (id == "") {
			 alert("L'id panne est vide");
			 return false;
			 panne.idPannes.focus() ;
	}
	/*if (date == "") {
				alert("La date est vide");
				return false;
				panne.Date.focus() ;
	}*/
	if (id_device == "") {
				alert("L'id device est vide");
				return false;
				panne.Devices_idDevices.focus() ;
	}

}
</script>
	</article>
		<br>
		<article>

				<div class="container">

				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4">Supprimer une panne</button> <!-- bouton d'ouverture de fenetre modale, suppression de domicile -->


				<div class="modal fade" id="myModal4" role="dialog">
						<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Supprimer une panne</h4>
									</div>
									<form  method="post" action="../Model/del_panne.php">
										<div class="modal-body">
											<p>
												Entrez le code de la panne à supprimer:
												<br>
												<input type="number" placeholder="Code de la panne" name="idPannes">

												<input type="submit" value = "Supprimer">
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
