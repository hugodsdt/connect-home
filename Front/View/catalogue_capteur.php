<?php
session_start();
if($_SESSION['status']!="Active") {
	header ('Location: ../../index.php');
	  exit();
  }
?>

<!DOCTYPE html>
<html>

<script>
    function validateRegistration() 
    {
        var commande = catalogue_form.commande.value;
                
        if (commande == "") 
        {
            alert("Le champ de commande est vide");
            return false;
            catalogue_form.commande.focus() ;
         }
    }
</script>

<head>
	<title>Catalogue</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="../View/style_tableau.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
					  <link rel="icon" type="image/png" href="Image/icon.png" />



</head>
<?php include("../View/header.php"); ?>
<body>
	<br><center><div class="titre"><span style="font-size:30px">Voici la liste des capteurs en vente ! </span></div></center>
	<p><?php include '../Model/liste_capteurs.php' ?></p>
	<br> <br>

	<center>
		<p><span style="font-size:25px"><strong>Passez votre commande en ligne et recevez directement votre article en magasin !</strong></span></p>
		
	<form method="post" action="../Model/traitement_commande.php" name="catalogue_form" onsubmit="return validateRegistration()">
			<label>Veuillez entrer la référence du produit que vous voulez acheter : <input type="text" name="commande"></label>
			<input type="submit" value="Envoyer">
	</form>
	<br> <br>
	</center>

</body>
<?php include '../View/footer.php' ?>
</html>