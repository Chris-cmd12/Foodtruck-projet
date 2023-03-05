<?php
  include '../connect.php';
  ob_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des commande</title>
</head>

<body>
  <div class="container my-5">
    <div class="row">
      <a class="btn btn-dark mb-5" href="modiffid.php">Modifier</a>
      <div class="col">
        <?php
					
					date_default_timezone_set('Europe/Paris');
					$requete = "SELECT * FROM commande ORDER BY Date";

						if($resultat = mysqli_query($connect,$requete)){
							while ($ligne = mysqli_fetch_assoc($resultat)){
								//initialisation du format date et heure
								$dt_debut = date_create_from_format('Y-m-d H:i:s', $ligne['date']);
								//affiche l'id (l'ordre d'attente)
								echo"<h3>commande n°".$ligne['id_commande']."</h3>";
								//affichage de l'heur souhaité
								echo"<h4>Pour ".$ligne['recuperation']."</h4>";
								//affichage du Nom qui est dans la bdd
								echo"<p>".$ligne['nom']."</p>";
								//affichage du Mail qui est dans la bdd
								echo"<p>".$ligne['mail']."</p>";
								//affichage de la date et de l'heur qui est dans la bdd avec un format
								echo"<p>".$dt_debut->format('d/m/y H:i:s')."</p>";
								//affiache la commande qui est dans la base de donnée 
								echo"<p><div style='width:400px'>".$ligne['commande']."</div></p>";
								//préparation et récupération
								echo"<p style='color:green'>".$ligne['statue']."</p>";
								//séparation de chaque commande 
								echo "<hr />";
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