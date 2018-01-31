<?php

$error_message='';

$bdd = new PDO("mysql:host=localhost; dbname=mydb; charset=utf8","root","root");
	$entrees=$bdd->query("SELECT * FROM utilisateur");
		if(false==empty($_POST)){
			
			$post_username = $_POST['id'];														//on ajoute utilisateur
			$post_password = $_POST['Mot_de_passe'];															//on ajoute mdp 
			
			while ($ligne = $entrees -> fetch()){																//boucle de verif
				
				if($post_username==$ligne["Code_utilisateur"]){			//test de correspondance util
				    if($post_password==$ligne["Mot_de_passe"] || password_verify($post_password, $ligne["Mot_de_passe"])==true){	//test de correspondance mdp
						
						session_start();																		//ceration session
						$req=$bdd->prepare("SELECT * FROM appartement WHERE Utilisateur_Code_utilisateur = ?"); //affiche de la bdd table appartement où le code utilisateur est celui de l'utilisateur
						$req->execute(array($_POST['id']));
						$donnees = $req -> fetch();
						$_SESSION['Code_appartement']=$donnees["Code_appartement"];	
						
						$req2=$bdd->prepare("SELECT * FROM piece WHERE Appartement_Code_appartement= ?");		//affiche de la bdd table piece où le code appartement est celui de l'utilisateur
						
						$req2->execute(array($_SESSION['Code_appartement']));
						$donnees2 = $req2 -> fetch();
						
						
						$_SESSION['id']=$ligne['Code_utilisateur'];								//relié avec ligne 6
						$_SESSION['Nom'] = $ligne["Nom"];														//on recupere dans la session le code utilisateur, le nom, le prenom, le mail
						$_SESSION['Prenom'] = $ligne["Prenom"];
						$_SESSION['mail'] = $ligne["mail"];

						$_SESSION['nom_de_rue']=$donnees["nom_de_rue"];											//relié avec la ligne 17
						$_SESSION['num_de_rue']=$donnees["num_de_rue"];											//on recupere dans la session  le nom rue, le num rue, le code postal, la ville, le code appart
						$_SESSION['Code_postal']=$donnees["Code_postal"];
						$_SESSION['ville']=$donnees["ville"];
						

						$_SESSION['idcemac']=$donnees2['CeMac_idCeMac'];										//relié avec ligne 22 on recupere l'id cemac
						$_SESSION['status']="Active";
						
						header ('Location: Front/View/accueil.php');
			            exit();
			      }
			      else{
					$error_message='Erreur de nom d\'utilisateur ou de mot de passe';
				    }
				}else{
					$error_message='Erreur de nom d\'utilisateur ou de mot de passe';
				}
			}		
		}
		if (false == empty($error_message)){
			$error_message="<div class=\"alert alert-danger\" role=\"alert\">$error_message</div>";
		}
?>