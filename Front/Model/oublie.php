<?php
include ('../Controller/connexion_database.php');

$error_message='';

	$entrees=$bdd->query("SELECT * FROM utilisateur");
		if(false==empty($_POST)){
			$post_email = $_POST['email'];
			while ($ligne = $entrees -> fetch()){
				if($post_email==$ligne["mail"]){
						session_start();
						$_SESSION['mail'] = $ligne["mail"];
						$_SESSION['id']=$ligne['Code_utilisateur'];
						$_SESSION['prenom'] = $ligne["Prenom"];
						$characts    = 'abcdefghijklmnopqrstuvwxyz';
						    $characts   .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
						$characts   .= '1234567890'; 
						$code_aleatoire      = ''; 

						for($i=0;$i < 10;$i++)    //10 est le nombre de caractères
						{ 
						    $code_aleatoire .= substr($characts,rand()%(strlen($characts)),1); 
						}
						$mail = $_SESSION['mail']; // Déclaration de l'adresse de destination.
						if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
						{
							$passage_ligne = "\r\n";
						}
						else
						{
							$passage_ligne = "\n";
						}
						//=====Déclaration des messages au format texte et au format HTML.
						$message_txt = "Bonjour".$_SESSION['prenom'].",";
						$message_html = "<html><head></head><body><b>Bonjour ".$_SESSION['prenom']."</b>, voici votre nouveau code : " .$code_aleatoire. "</body></html>";
						//==========
						 
						//=====Création de la boundary
						$boundary = "-----=".md5(rand());
						//==========
						 
						//=====Définition du sujet.
						$sujet = "nouveau mot de passe";
						//=========
						 
						//=====Création du header de l'e-mail.
						$header = "From: \"Domisep\"<domisep@domisep.webou.net>".$passage_ligne;
						$header.= "Reply-to:" .$_SESSION['prenom']. "<".$_SESSION['mail'].">".$passage_ligne;
						$header.= "MIME-Version: 1.0".$passage_ligne;
						$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
						//==========
						 
						//=====Création du message.
						$message = $passage_ligne."--".$boundary.$passage_ligne;
						//=====Ajout du message au format texte.
						$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
						$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
						$message.= $passage_ligne.$message_txt.$passage_ligne;
						//==========
						$message.= $passage_ligne."--".$boundary.$passage_ligne;
						//=====Ajout du message au format HTML
						$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
						$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
						$message.= $passage_ligne.$message_html.$passage_ligne;
						//==========
						$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
						$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
						//==========
						 
						//=====Envoi de l'e-mail.
						mail($mail,$sujet,$message,$header);
						//==========
						
						$code_aleatoire_hashed = password_hash($code_aleatoire, PASSWORD_DEFAULT);   //on hash le password aleatoire avant de l'envoyer à la bdd

						$req = $bdd->prepare('UPDATE `utilisateur` SET `Mot_de_passe` = :mdp WHERE `utilisateur`.`Code_utilisateur` = :user');
						$req -> execute(array(':mdp' => $code_aleatoire_hashed,
											  ':user' => $ligne["Code_utilisateur"]));
						$return = $req->fetch();
						$_SESSION['code']=$code_aleatoire_hashed;
						
						header('Location: ..\View\oubli2.php');
			      }
				else{
					$error_message='Cet email n\'existe pas';
				}
				}
		}
		if (false == empty($error_message)){
			$error_message="<div class=\"alert alert-danger\" role=\"alert\">$error_message</div>";
		}
?>


