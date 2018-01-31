<?php 

function connexionAffichageInfoPiece()
{
        // Connexion à la base de données
        include ('../Controller/connexion_database.php');

        // Récupération des 10 derniers messages
        $reponse = $bdd->prepare('SELECT Nom_piece, Surface_piece FROM piece WHERE Appartement_Code_appartement = ?');
        $reponse->execute(array($_SESSION['Code_appartement']));
}
?>

<?php 
function affichageInfoPiece()
{
	include ('../Controller/connexion_database.php');

        // Récupération des 10 derniers messages
        $reponse = $bdd->prepare('SELECT Nom_piece, Surface_piece FROM piece WHERE Appartement_Code_appartement = ?');
        $reponse->execute(array($_SESSION['Code_appartement']));
        while ($donnees = $reponse->fetch())
        {
          echo "<option value='" .$donnees['Nom_piece']. "'>".$donnees['Nom_piece']."</option>" . "<br>" . " " . "<br>" ;
        }

        $reponse->closeCursor();
}
?>