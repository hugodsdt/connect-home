<?php session_start();
if($_SESSION['status']!="Active") {
	header ('Location: ../../index.php');
	  exit();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <script>
            function showUser(str)
            {
                if (str == "")
                {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                }
                if (window.XMLHttpRequest) {
                    xmlhttp= new XMLHttpRequest();
                } else {
                    if (window.ActiveXObject)
                        try {
                            xmlhttp= new ActiveXObject("Msxml2.XMLHTTP");
                        } catch (e) {
                            try {
                                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                            } catch (e) {
                                return NULL;
                            }
                        }
                }

                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "../Model/getuser.php?q=" + str, true);
                xmlhttp.send();
            }
        </script>
        
        <script>
          function validateRegistration() 
          {
            var ancien = form_accueil_1.ancien_mdp.value;
            var nouveau1 = form_accueil_1.mdp1.value;
            var nouveau2 = form_accueil_1.mdp2.value;
            var longueur = nouveau1.length;
             
            if (ancien == "" || nouveau1 =="" || nouveau2=="") // vérification que tous les champs sont rempplis
            {
              alert("Un champ est vide");
              return false;
              form_accueil_1.ancien.focus() ;
            }

            if (nouveau1 != nouveau2) // vérificatio que les nouveaux mdp sont identiques
            {
              alert("Les mots de passe sont différents");
              return false;
              form_accueil_1.nouveau1.focus() ;
            }

            if (longueur<5 ) // vérification que la longueur des nvx mdp sont > 5 caractères
            {
              alert("Le nouveau mot de passe est trop court");
              return false;
              form_accueil_1.nouveau1.focus() ;
            }
          }
</script>


<script>
          function validateRegistration2() 
          {
            var nompiece = form_accueil_2.nompiece.value;
            var superficie = form_accueil_2.superficie.value;
             
            if (nompiece == "" || superficie =="" ) // vérification que tous les champs sont remplis
            {
              alert("Un champ est vide");
              return false;
              form_accueil_2.nompiece.focus() ;
            }
          }

</script>


<script>
          function validateRegistration3() 
          {
            var nompiece = form_accueil_3.nompiece.value;
             
            if (nompiece == "" ) // vérification que tous les champs sont remplis
            {
              alert("Un champ est vide");
              return false;
              form_accueil_3.nompiece.focus() ;
            }
          }

</script>


<script>
          function validateRegistration4() 
          {
            var reference = form_accueil_4.reference.value;
            var piece = form_accueil_4.piece.value;
             
            if (reference == "" || piece =="" ) // vérification que tous les champs sont remplis
            {
              alert("Un champ est vide");
              return false;
              form_accueil_4.nompiece.focus() ;
            }
          }

</script>

<script>
          function validateRegistration5() 
          {
            var reference = form_accueil_5.reference.value ;
             
            if (reference == "" ) // vérification que tous les champs sont remplis
            {
              alert("Un champ est vide");
              return false;
              form_accueil_5.reference.focus() ;
            }
          }

</script>


<script>
          function validateRegistration6() 
          {
            var reference = form_accueil_6.reference.value ;
            var piece = form_accueil_6.piece.value;
             
            if (reference == "" || piece == "") // vérification que tous les champs sont remplis
            {
              alert("Un champ est vide");
              return false;
              form_accueil_6.reference.focus() ;
            }
          }

</script>

<script>
          function validateRegistration7() 
          {
            var reference = form_accueil_7.reference.value ;
             
            if (reference == "" ) // vérification que tous les champs sont remplis
            {
              alert("Un champ est vide");
              return false;
              form_accueil_7.reference.focus() ;
            }
          }

</script>
        
        
        

  <title>Accueil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="accueil3.css">
  <link rel="stylesheet" type="text/css" href="style_tableau.css">
  <link rel="icon" type="image/png" href="Image/icon.png" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<?php include("../View/header.php"); ?>

<?php include("../Model/affichage_info_piece.php"); ?>



<body>
  <section>

    <center><h1>Accueil</h1></center>

    <article>
        <h2>Informations</h2><hr>
        <p><?php include("../Model/affichage_info_client.php"); ?></p>
        
        <div class="container">
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal14" style="position:relative;bottom:80px;margin-left:5px">Changer de mot de passe</button>
        <div class="modal fade" id="myModal14" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Changer mon mot de passe : </h4>
                </div>
 <!-- Formulaire de modification de mdp -->
                <div class="modal-body">
                  
                  <form class ="black" method="post" action="../Model/modif_mdp.php" name="form_accueil_1" onsubmit="return validateRegistration()">
                    <p>Entrez les informations demandées :<br>
                    <label>Mot de passe actuel : </label><input type="password" name="ancien_mdp" placeholder="Mot de passe actuel"><br>
                    <label>Nouveau mot de passe : </label><input type="password" name="mdp1" placeholder="Nouveau mot de passe"><br>
                    <label>Nouveau mot de passe : </label><input type="password" name="mdp2" placeholder="Nouveau mot de passe"><br>
                    <input type="submit" name="ajouter" value="Modifier">
                  </form>
                  </p>
                </div>
              </div>    
            </div>
        </div>
        </div>
        <center><span style="color:red"></span></center>
    </article>



<!-- Développement de la partie des pièces -->

  <article>
        <h2>Pièces</h2><hr>
        
          
        <div class="container">

          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="position:relative;bottom:80px;margin-left:5px">Ajouter une pièce</button>
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3" style="position:relative;bottom:80px;">Supprimer une pièce</button>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Ajouter une pièce</h4>
                </div>


 <!-- Formulaire d'ajout d'une pièce -->

                <div class="modal-body">
                  <p>Entrez les informations sur votre nouvelle pièce<br>
                  <form class = "black" method="post" action="../Model/add_piece.php" name="form_accueil_2" onsubmit="return validateRegistration2()">
                    <input type="text" name="nompiece" id="nompiece" placeholder="Nom de la pièce"><br>
                    <input type="text" name="superficie" id="superficie" placeholder="Superficie">
                    <input type="submit" name="ajouter" value="Ajouter">
                  </form>
                  </p>
                </div>
              </div>    
            </div>
        </div>


 <!-- Formulaire de suppression d'une pièce -->

  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Supprimer une pièce</h4>
        </div>

        <div class="modal-body">
          <p>Entrez les informations sur votre pièce à supprimer<br>
          <form class = "black" method="post" action="../Model/del_piece.php" name="form_accueil_3" onsubmit="return validateRegistration3()">
            <input type="text" name="nompiece" id="nompiece" placeholder="Nom de la pièce"><br>
            <input type="submit" name="supprimer" value="Supprimer"></p>
          </form>
        </div>
      </div>
    </div>
</div>

         <!-- Affichage des fonctions  -->
        <div id="txtHint">
          <b>Liste des pièces :</b>
        </div>
       
        <?php connexionAffichageInfoPiece() ?>
        
        <form class="select">
          <select name='users' onchange='showUser(this.value)'>
            <option value=''>Selectionne une pièce</option>
            <?php affichageInfoPiece() ?>
          </select>
        </form><br> <br>

    </article>




<!-- Développement de la partie Capteurs & Actionneurs -->


    <article>
        <h2>Capteurs & Actionneurs</h2><hr>
        <p>Liste des capteurs et actionneurs : </p>
        <div class="container">
          <!-- Trigger the modal with a button -->
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2" style="position:relative;bottom:120px; margin-left:5px">Ajouter un capteur</button>
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4" style="position:relative;bottom:120px; margin-left:5px">Supprimer un capteur</button>
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6" style="position:relative;bottom:120px; margin-left:5px">Ajouter un actionneur</button>
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal8" style="position:relative;bottom:120px; margin-left:5px">Supprimer un actionneur</button>

          <div class="tableau">
            <?php include("../Model/affichage_info_capteur.php"); ?>
          </div>

  <!-- Modal -->
          <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Capteurs </h4>
                </div>
                
                <div class="modal-body">
                  <form class="black" method="post" action="../Model/add_capteur.php" name="form_accueil_4" onsubmit="return validateRegistration4()">
                    <p>Entrez les informations sur votre nouveau capteur<br>
                      <input type="text" id="reference" name="reference" placeholder="Référence du capteur"><br> <br>
                      <select id="piece" name="piece">
                        <option value''>Selectionne une pièce</option>
                        <?php affichageInfoPiece() ?>
                      </select>
                    </p>
                    <input type="submit" name="ajouter" value="Ajouter">
                  </form>
                </div>
              </div>
            </div>
          </div>

    <div class="modal fade" id="myModal4" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Supprimer un capteur</h4>
          </div>

          <div class="modal-body">
            <form class = "black" method="post" action="../Model/del_capteur.php" name="form_accueil_5" onsubmit="return validateRegistration5()">
              <p>Entrez les informations sur le capteur à supprimer<br><input type="text" name="reference" id="Référence" placeholder="Id du capteur"><br>
              <input type="submit" name="supprimer" value="Supprimer"></p>
            </form>
          </div>
      </div>
    </div>
  </div>
</br>
      <div class="modal fade" id="myModal6" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"> Actionneurs</h4>
                </div>
                
                <div class="modal-body">
                  <form class="black" method="post" action="../Model/add_actionneur.php" name="form_accueil_6" onsubmit="return validateRegistration6()">
                    <p>Entrez les informations sur votre nouvel actionneur<br>
                      <input type="text" id="reference" name="reference" placeholder="Référence de l'actionneur"><br> <br>
                      <select id="piece" name="piece">
                        <option value''>Selectionne une pièce</option>
                        <?php affichageInfoPiece() ?>
                      </select>
                    </p>
                    <input type="submit" name="ajouter" value="Ajouter">
                  </form>
                </div>
              </div>
            </div>
          </div>

    <div class="modal fade" id="myModal8" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Supprimer un actionneur</h4>
          </div>

          <div class="modal-body">
            <form class = "black" method="post" action="../Model/del_actionneur.php" name="form_accueil_7" onsubmit="return validateRegistration7()">
              <p>Entrez les informations sur l'actionneur à supprimer<br><input type="text" name="reference" id="Référence" placeholder="Id de l'actionneur"><br>
              <input type="submit" name="supprimer" value="Supprimer"></p>
            </form>
          </div>
      </div>
    </div>
  </div>
</br>


</article>
   

</section>


  <?php include("../View/footer.php"); ?>
  </body>
</html>
