<?php 

        // Connexion à la base de données
        include ('../Controller/connexion_database.php');


                
        $req = $bdd->prepare('SELECT DISTINCT commande.reference, commande.temps, commande.Type_de_device_reference_produit, type_de_device.nom_du_device FROM commande INNER JOIN type_de_device WHERE  commande.Type_de_device_reference_produit = type_de_device.reference_produit AND Utilisateur_code_utilisateur = ? ');
        $req -> execute(array( $_SESSION['id']));
        // Affichage de ces informations dans un tableau
        echo "<table border=1>
            <tr>
                <th>Nom de l'article</th>
                <th><center>Identifiant de l'article</center></th>
                <th> <center><strong>Date de la commande</center></th>
            </tr>
            ";
                
            while ($donnees = $req->fetch())
            {
                echo "
                <tr>
                    <td>".$donnees["nom_du_device"]. "</td>
                    <td>".$donnees["Type_de_device_reference_produit"]."</td>
                    <td>".$donnees["temps"]."</td>
                 </tr>
                    ";
            }
            echo "</table>" . "<br>"; 
?>