<?php
session_start();	
include ('../Controller/connexion_database.php');

$error_message='';

$req1=$bdd->prepare("SELECT * FROM utilisateur WHERE Code_utilisateur = ?");
$req1->execute(array($_SESSION['id']));

		if(false==empty($_POST))
		{
			$post_ancienMdp = $_POST['ancien_mdp'];
			$post_mdp1 = $_POST['mdp1'];
			$post_mdp2 = $_POST['mdp2'];
			
			while ($ligne = $req1 -> fetch())
			{				
				if(password_verify($post_ancienMdp, $ligne["Mot_de_passe"])==true || $post_ancienMdp==$ligne["Mot_de_passe"])
				{
				    if($post_mdp1==$post_mdp2 && strlen($post_mdp1)>=5){
    					$req=$bdd->prepare("UPDATE utilisateur SET Mot_de_passe = ? WHERE Code_utilisateur = ?");
    					$req->execute(array(password_hash($_POST['mdp1'], PASSWORD_DEFAULT), $_SESSION['id']));
    					$error_message='Votre mot de passe a été changé avec succès';
    					header ('Location: ../View/accueil.php');
    			        exit();
			        }
    			    else if ($post_mdp1==$post_mdp2 && (strlen($post_mdp1)<5))
    			    {
    			    	$error_message='Nouveau mot de passe trop court (minimum 5 caractères)';
    			    	header ('Location: ../View/accueil.php');
    			        exit();
    			    }
    				else{
    					$error_message='les 2 mot de passe sont differents';
    					header ('Location: ../View/accueil.php');
    			        exit();
    				}
				}else{
					$error_message='Erreur de mot de passe';
					header ('Location: ../View/accueil.php');
			        exit();
				}
			}
		}

		if (false == empty($error_message)){
			$error_message="<div class=\"alert alert-danger\" role=\"alert\">$error_message</div>";
		}

?>