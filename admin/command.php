<?php
  include '../connect.php';
  ob_start(); 
  session_start();
    if(!isset($_SESSION['username'])){
      header('location:../pages/connection.php?action=conn');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commander</title>
</head>

<body>
<?php
    if(isset($_POST['valider'])){
      $nom = $_POST['name'];
      $mail = $_POST['mail'];
      $commande = $_POST['commande'];
      $heure = $_POST['heure'];

      $nom = mysqli_real_escape_string($connect,$nom);
      $mail = mysqli_real_escape_string($connect,$mail);
      $commande = mysqli_real_escape_string($connect,$commande);
      $heure = mysqli_real_escape_string($connect,$heure);

      $req = "INSERT INTO commande (nom,mail,commande,recuperation) ";
      $req .="VALUES ('{$nom}','{$mail}','{$commande}','{$heure}') ";
      $result = mysqli_query($connect,$req);
    ?>
  <div class="alert alert-success" role="alert">
    Commande envoyé avec succès
  </div>
  <?php }?>
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-sm-6">
        <h1>Commander</h1>
        <form action="" method="post" name="F">
          <div class="mb-3">
            <label for="mail" class="form-label">Email address</label>
            <input type="email" class="form-control" name="mail" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="mb-3">
            <label for="heure">Heur de retrait</label>
            <select class="form-select" id="objet" name="heure">
              <option>Choisir heure de retrait</option>
              <option value="12h00 à 12h15">12h00 - 12h15</option>
              <option value="12h15 à 12h30">12h15 - 12h30</option>
              <option value="12h30 à 12h45">12h30 - 12h45</option>
              <option value="12h45 à 13h00">12h45 - 13h00</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="message">Commande</label>
            <textarea class="form-control" id="message" rows="3" name="commande" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="valider">Valider</button>
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