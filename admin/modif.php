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
    <title>Modifier</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-xl-12 col-sm-6">
                <h1>Modification de la commande</h1>
                <form action="" method="post">
                <?php
		            $id=$_GET['id'];
			        $requete="SELECT * FROM commande WHERE id_commande = $id";
                    if($resultat = mysqli_query($connect,$requete)){
                        while ($ligne = mysqli_fetch_assoc($resultat)){
                            echo"<div class='mt-5 mb-3'>
                                <label for='id' class='form-label'>Numéro de la commande</label>
                                <input type='text' class='form-control' name='id' value='".$ligne['id_commande']."'>
                            </div>";
                            echo"<div class='mb-3'>
                                <label for='id' class='form-label'>Mail</label>
                                <input type='email' class='form-control' name='mail' value='".$ligne['mail']."'>
                            </div>";
                            echo"<div class='mb-3'>
                                <label for='id' class='form-label'>Nom</label>
                                <input type='text' class='form-control' name='name' value='".$ligne['nom']."'>
                            </div>";
                            echo"<div class='mb-3'>
                                    <label for='heure'>Heur de retrait</label>
                                    <select class='form-select' id='objet' name='heure'>
                                        <option>Choisir heure de retrait</option>
                                        <option value='12h00 à 12h15'>12h00 - 12h15</option>
                                        <option value='12h15 à 12h30'>12h15 - 12h30</option>
                                        <option value='12h30 à 12h45'>12h30 - 12h45</option>
                                        <option value='12h45 à 13h00'>12h45 - 13h00</option>
                                    </select>
                                </div>";
                            echo"<div class='mb-3'>
                                <label for='id' class='form-label'>commande</label>
                                <input type='text' class='form-control' name='commande' value='".$ligne['commande']."'>
                            </div>";
                        }
                    }
                ?>
                <button type="submit" class="btn btn-primary" name="modif">Modifier</button>
                <?php
                    if(isset($_POST['modif'])){

                        $mail=$_POST['mail'];	
                        $name=$_POST['name'];
                        $heure=$_POST['heure'];
                        $commande=$_POST['commande'];

                        $request="UPDATE commande SET mail='$mail' , nom='$name', recuperation='$heure', commande='$commande' WHERE id_commande=$id";
                        $result = mysqli_query($connect,$request);
 
                        header('Location:modifconf.php');
                    }
                    
                ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
  $content = ob_get_clean();
  require "commons/template.php";
?>