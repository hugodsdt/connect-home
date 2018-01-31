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
	<title>Back-Office Utilisateurs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="view.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include("header_bo.php"); ?>

	<ul class="follow_icon">
          <li><a href="#" style="opacity: 1;"><img src="Image/facebook.png" alt=""/></a></li>
          <li><a href="#" style="opacity: 1;"><img src="Image/google.png" alt=""/></a></li>
          <li><a href="#" style="opacity: 1;"><img src="Image/twitter.png" alt=""/></a></li>
          <li><a href="#" style="opacity: 1;"><img src="Image/feed.png" alt=""/></a></li>
      </ul>
<center>

	<h1> Gestion des comptes utilisateurs       </h1>

<?php include("../Model/table_users.php"); ?>

</center>
	<p>


		<article>

        <div class="container">

        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >Créer un compte</button> <!-- le bouton pour ajouter un compte, le type de fenetre est le meme que pour les articles -->


        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter un utilisateur</h4>
            </div>
				<form name="registration" onsubmit="return validateRegistration()" method="post" action="../Model/post_clients.php">
        <div class="modal-body">
        <p>
        	Entrez les informations sur nouvel utilisateur
            <br>
            <input type="number" placeholder="Code de l'utilisateur" name="Code_utilisateur">
            <br>
            <input type="text" placeholder="Mot de passe initial" name="Mot_de_passe">
            <br>
            <select name="Type_utilisateur" >
           		<option value="Administrateur">Administrateur</option>
           		<option value="Client">Client</option>
           	</select>
            <br>
            <input type="text" placeholder="Nom" name="nom">
            <br>
            <input type="text" placeholder="Prénom" name= "prenom">
            <br>
            <input type="email" placeholder="Adresse mail" name="mail">
						<input type="submit" value = "Ajouter">
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

		<script>
			 function validateRegistration() { // test de champs remplis, un par un
			 var emailID = registration.mail.value; // on va chercher la valeur de chaque élément posté
			 var code = registration.Code_utilisateur.value;
			 var mdp = registration.Mot_de_passe.value;
			 var nom = registration.nom.value;
			 var prenom = registration.prenom.value
			 	console.log('essai');
			 atpos = emailID.indexOf("@");
			 dotpos = emailID.lastIndexOf(".");

			 if (atpos < 1 || ( dotpos - atpos < 2 )) { // pour être une adresse mail il faut au moins un caractère avant le @ et au moins 2 après le .
			 alert("Veuillez entrer un mail valide")
			 registration.mail.focus() ;
			 return false;
			 }

			 if (code == "") {
						 alert("Le code utilisteur est vide");
						 return false;
						 registration.Code_utilisateur.focus() ;
 			}
			if (mdp == "") {
							alert("Le mot de passe est vide");
							return false;
							registration.Mot_de_passe.focus() ;
			}
			if (nom == "") {
						 		alert("Le nom est vide");
						 		return false;
						 		registration.nom.focus() ;
			}
			if (prenom == "") {
								alert("Le prenom est vide");
								return false;
								registration.prenom.focus() ;
			}

			}


		</script>


		<br>
		<article>

        <div class="container">

        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">Supprimer un compte</button> <!-- le bouton pour supprimer un compte -->


        <div class="modal fade" id="myModal3" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Supprimer un utilisateur</h4>
            </div>
				<form  method="post" action="../Model/del_clients.php">
        <div class="modal-body">
        <p>
        	Entrez le code de l'utilisateur à effacer:
            <br>
            <input type="number" placeholder="Code de l'utilisateur" name="Code_utilisateur">

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
     <br>

	</p>
	<center>

		<h1> Domiciles actuellement référencés </h1> <!-- table de référencement des appartements -->

<?php include("../Model/table_homes.php"); ?>

	</center>
	<br>
	<article>

			<div class="container">
<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Ajouter un domicile</button> <!-- bouton d'ouverture de fenetre modale, ajout de domicile  -->

<!-- Modal -->
			<div class="modal fade" id="myModal2" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Créer un domicile</h4>
						</div>
						<form name="postHome" onsubmit="return Test()" method="post"  action="../Model/post_home.php" >
							<div class="modal-body">
									<p>
									Entrez les informations sur le nouveau domicile
									<br>
									<input type="number" placeholder="Code appartement" name ="Code_appartement">
									<br>
									<input type="number" placeholder="Numéro" name="num_de_rue">
									<br>
									<input type="text" placeholder="Nom de rue" name="nom_de_rue">
									<br>
									<input type="text" placeholder="Ville" name="ville">
									<br>
									<input type="number" placeholder="Code postal" name="Code_postal">
									<br>
									<input type="number" placeholder="Code propriétaire" name="Utilisateur_Code_utilisateur">
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

	</article>
	<script>
	function Test(){ // test de champs remplis, un par un
		var code = postHome.Code_appartement.value;
		var num = postHome.num_de_rue.value;
		var nom = postHome.nom_de_rue.value;
		var ville = postHome.ville.value;
		var postal = postHome.Code_postal.value;
		var owner = postHome.Utilisateur_Code_utilisateur.value;
		if (code == "") {
				 alert("Le code appartement est vide");
				 return false;
				 postHome.Code_appartement.focus() ;
		}
		if (num == "") {
					alert("Le numéro est vide");
					return false;
					postHome.num_de_rue.focus() ;
		}
		if (nom == "") {
					alert("Le nom de rue est vide");
					return false;
					postHome.nom_de_rue.focus() ;
		}
		if (ville == "") {
						alert("Le nom de ville est vide");
						return false;
						postHome.Ville.focus() ;
		}
		if (postal == "") {
						alert("Le code postal est vide");
						return false;
						postHome.Code_postal.focus() ;
		}
		if (owner == "") {
						alert("Le code propriétaire est vide");
						return false;
						postHome.Utilisateur_Code_utilisateur.focus() ;
		}
	}
	</script>
	<br>
	<article>

			<div class="container">

			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4">Supprimer un domicile</button> <!-- bouton d'ouverture de fenetre modale, suppression de domicile -->


			<div class="modal fade" id="myModal4" role="dialog">
					<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Supprimer un logement</h4>
								</div>
								<form  method="post" action="../Model/del_home.php">
									<div class="modal-body">
										<p>
											Entrez le code du logement à supprimer:
											<br>
											<input type="number" placeholder="Code du logement" name="Code_appartement">

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
<br>
</body>
</html>
