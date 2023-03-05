<?php
  include '../connect.php';
  include ('mail.php');
  ob_start();
  session_start();
    if(!isset($_SESSION['username'])){
      header('location:../../pages/connection.php?action=conn');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des commandes</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="commande">
          <?php
          
					date_default_timezone_set('Europe/Paris');
					$requete = "SELECT * FROM commande";

						if($resultat = mysqli_query($connect,$requete)){
							while ($ligne = mysqli_fetch_assoc($resultat)){
                $idp=$ligne['id_commande'];
                $recup=$ligne['recuperation'];
                $nom=$ligne['nom'];
                $mail=$ligne['mail'];
                $commande=$ligne['commande'];
                $statue=$ligne['statue'];
								//initialisation du format date et heure
								$dt_debut = date_create_from_format('Y-m-d H:i:s', $ligne['date']);
								//affiche l'id (l'ordre d'attente)
								echo"<h3>commande n°".$idp."</h3>";
								//affichage de l'heur souhaité
								echo"<h4>Pour ".$recup."</h4>";
								//affichage du Nom qui est dans la bdd
								echo"<p>".$nom."</p>";
								//affichage du Mail qui est dans la bdd
								echo"<p>".$mail."</p>";
								//affichage de la date et de l'heur qui est dans la bdd avec un format
								echo"<p>".$dt_debut->format('d/m/y H:i:s')."</p>";
								//affiache la commande qui est dans la base de donnée 
								echo"<p><div style='width:400px'>".$commande."</div></p>";
								//préparation et récupération
								echo"<p style='color:green'>".$statue."</p>";
								//séparation de chaque commande 
                echo"<form method='post' class='fc'>";
                echo "<button type='submit' class='btn btn-success' name='commande' value='$mail'>Commande pret</button>";
                echo "&nbsp";
                echo "<button type='submit' class='btn btn-danger' name='recupere' value='$mail' >Commande récupéré</button>";
                 echo"</form>";
								echo "<hr />";
                                
							}

              if(isset($_POST['commande'])){
                $mail = $_POST['commande'];
                sendmail($mail);
								$mail = mysqli_real_escape_string($connect,$mail);
                                
                $req = "UPDATE commande SET statue = 'A récupérer' WHERE mail = '$mail'";
                $result = mysqli_query($connect,$req); 
                echo"<meta http-equiv='refresh' content='0'>";

               }elseif(isset($_POST['recupere'])){
                  $nom=$_POST['recupere'];
                                
								$nom = mysqli_real_escape_string($connect,$mail);
							
                   $req ="DELETE FROM commande WHERE mail = '$mail'";
                   $result = mysqli_query($connect,$req); 
                   echo"<meta http-equiv='refresh' content='0'>";

              }
                            
                            
						}
					?>
        </div>
      </div>
    </div>
</body>

</html>



<?php
  $content = ob_get_clean();
  require "commons/template.php";

?>