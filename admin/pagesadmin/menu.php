<?php
  include '../../connect.php';
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
  <title>Ajout/Modif/Supprimer Menu</title>
</head>

<body>
<?php
      
      if (isset($_POST["modif"])){ 
        
        $date = $_POST['date'];
        $img = $_FILES['image']['name'];
        // $img_tmp = $_FILES['image']['tmp_name'];
        $pdf   = $_FILES['pdf']['name'];
        // $pdf_tmp   = $_FILES['pdf']['tmp_name'];

        $jour = mysqli_real_escape_string($connect,$date);
        
        // move_uploaded_file($img_tmp, "../../images/$img");
        // move_uploaded_file($pdf_tmp, "../../pdf/$pdf" );

        $dossier = '/www/projet/FoodTruck/images';
        $fichierupload = $dossier . basename($images);
        move_uploaded_file($image, $fichierupload);
        $dossier = '/www/projet/FoodTruck/images';
        $fichierupload = $dossier . basename($pdf);
        move_uploaded_file($pdf, $fichierupload); 

        $req = "UPDATE menu SET image = '$img', pdf='$pdf' WHERE date = '$date'"; 
        $resultat = mysqli_query($connect,$req); 
      ?>
      <div class="alert alert-success" role="alert">
        Menu Modifié
      </div>  
    <?php }?>
    
    <?if (isset($_POST["supr"])){
        $date = $_POST['date'];

        $date = mysqli_real_escape_string($connect,$date);

        $req = "UPDATE menu SET image = 'indispo.jpg', pdf='indispo.pdf' WHERE date = '$date' ";
        $result = mysqli_query($connect,$req);
      ?>
      <div class="alert alert-danger" role="alert">
        Menu supprimé 
      </div> 
    
      <?php }?>

      
  <div class="container mt-5">
    <form method="post" action="" enctype="multipart/form-data">
      <div class="row mb-3">
        <label for="heure" class="col-sm-1 col-form-label">Heur de retrait</label>
        <div class="col-sm-10">
          <select class="form-select col-sm-10" id="objet" name="date">
            <option>Choisir le jour</option>
            <option value="Lundi">Lundi</option>
            <option value="Mardi">Mardi</option>
            <option value="Mercredi">Mercredi</option>
            <option value="Jeudi">Jeudi</option>
            <option value="Vendredi">Vendredi</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="formImage" class="form-label col-sm-1 col-form-label ">Image du menu</label>
        <div class="col-sm-10">
          <input class="form-control" type="file" id="formFile" name="image">
        </div>
      </div>
      <div class="row mb-3">
        <label for="formFile" class="form-label col-sm-1 col-form-label ">Pdf du menu</label>
        <div class="col-sm-10">
          <input class="form-control" type="file" id="formFile" name="pdf">
        </div>
      </div>
      <button type="submit" class="btn btn-success" name="modif">Modifier</button>
      <button type="submit" class="btn btn-danger" name="supr">Supprimer</button>
      <p class="text-danger">Pour la suppresion juste choisir le jour</p>
    </form>
  </div>
</body>
</html>



<?php
  $content = ob_get_clean();
  require "commonsadmin/template.php";
?>