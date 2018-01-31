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
	<title>Back-Office articles</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="view.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> <!-- inclure les fenetres modales -->
</head>
<?php include("header_bo.php"); ?>
<body>

	<center>
		<h2> <center> Gestion des articles en vente sur le site </center> </h2>

<?php include("../Model/table_articles.php"); ?>

	</center>
	<p>

		<article>

        <div class="container">
				<form name="article" onsubmit="Testarticle()"  method="post" action="../Model/post_articles.php">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ajouter un article</button> <!-- le bouton pour ajouter un article -->

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter un article</h4>
            </div>
        <div class="modal-body"> <!-- Ouverture de la fenetre modale -->
        <p>
        	Entrez les informations sur le nouvel article
            <br>

            <input type="number" placeholder="Référence produit" name="reference_produit">
            <br>

            <input type="text" placeholder="Nom" name = "nom_du_device">
            <br>

            <input type="number" step=".01" placeholder="Prix" name = "prix">
            <br>

          	<select name = "identification">
              <option value="Capteur">Capteur</option>
              <option value="Actionneur">Actionneur</option>
            </select>
            <br>

            <select  name = "fonction">
              <option value="Humidite">Humidité</option>
              <option value="Camera">Caméra</option>
              <option value="Temperature">Température</option>
              <option value="Luminosite">Luminosité</option>
              <option value="Fumee">Fumée</option>
              <option value="Eau">Consommation d'eau</option>
              <option value="Electricite">Electricité</option>
							<option value="Mouvement">Mouvement</option>
            </select>

						<input type="text" placeholder="unité" name="unite">
            <br>

						<input type="number" placeholder="Surface couverte en m²" name="surface_couverte">
            <br>
						<input type="submit" value = "Ajouter"> <!-- le bouton doit être dans la fenetre modale -->
        </p>

        </div>
        <div class="modal-footer">
          <input type="buttton" class="btn btn-default" data-dismiss="modal" value = "Fermer"> <!-- Ce bouton ne permet pas de submit correctement -->
        </div>

      </div>
    </div>
  </div>
</form>
</div>
    </article>

		<script>
		function Testarticle(){ // test de champs remplis, un par un 

			var ref = article.reference_produit.value;
			var nom = article.nom_du_device.value;
			var prix = article.prix.value;
			var unite = article.unite.value;
			var surface = article.surface_couverte.value;
			if (ref == "") {
					 alert("Le code reference est vide, si vous en souhaitez un supprimez et recommencez");
					 return false;
					 article.reference_produit.focus() ;
			}
			if (nom == "") {
						alert("Le nom est vide, si vous en souhaitez un supprimez et recommencez");
						return false;
						article.nom_du_device.focus() ;
			}
			if (prix == "") {
						alert("Le prix est vide, si vous en souhaitez un supprimez et recommencez");
						return false;
						article.prix.focus() ;
			}
			if (unite == "") {
							alert("L'unité est vide, si vous en souhaitez une supprimez et recommencez");
							return false;
							article.unite.focus() ;
			}
			if (surface == "") {
							alert("La surface est vide, si vous en souhaitez une supprimez et recommencez");
							return false;
							article.surface_couverte.focus() ;
			}

		}
		</script>
<br>
	<article>

			<div class="container">

				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Supprimer un article</button> <!-- Même type de bouton pour la suppression d'article -->

					<div class="modal fade" id="myModal2" role="dialog">
							<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Supprimer un article</h4>
										</div>
										<form  method="post" action="../Model/del_articles.php">
										<div class="modal-body">

												<p>
														Entrez la référence de l'article à supprimer
														<br>
														<input type="number" placeholder="Référence produit" name="reference_del">
														<input type="submit" value = "Supprimer">

												</p>

										</div>

										<div class="modal-footer">
										 <input type="button" class="btn btn-default" data-dismiss="modal" value = "Fermer">
										</div>
										</form>
									</div>
								</div>
						</div>

			</div>
	</article>
</p>

</body>
</html>
