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
  <title>Ajout/Modif/Supprimer compte</title>
</head>





<body>
<?php
    if(isset($_POST['creer'])){
      $nom = $_POST['name'];
      $role = $_POST['role'];
      $pass = $_POST['pass'];
      // $hash = password_hash($pass,PASSWORD_BCRYPT);


      $nom = mysqli_real_escape_string($connect,$nom);
      $role = mysqli_real_escape_string($connect,$role);
      $pass = mysqli_real_escape_string($connect,$pass);
      // $hash = mysqli_real_escape_string($connect,$hash);
      

      $req = "INSERT INTO connect (identifiant,motdepasse,role) VALUES ('$nom','$pass','$role') ";
      $result = mysqli_query($connect,$req);
?>
      <div class="alert alert-success" role="alert">
        Compte Créé
      </div>  
    <?php }elseif (isset($_POST['modif'])) {
      $nom = $_POST['name'];
      $role = $_POST['role'];
      $pass = $_POST['pass'];
      // $hash = password_hash($pass,PASSWORD_BCRYPT);


      $nom = mysqli_real_escape_string($connect,$nom);
      $role = mysqli_real_escape_string($connect,$role);
      $pass = mysqli_real_escape_string($connect,$pass);
      // $hash = mysqli_real_escape_string($connect,$hash);

      $req = "UPDATE connect SET motdepasse = '$pass' WHERE identifiant = '$nom' ";
      $result = mysqli_query($connect,$req);
      ?>
      <div class="alert alert-warning" role="alert">
        Compte modifié
      </div> 
      
    <?php }elseif (isset($_POST['supprimer'])) {
      $nom = $_POST['name'];

      $nom = mysqli_real_escape_string($connect,$nom);

      $req = "DELETE FROM connect WHERE identifiant = '$nom' ";
      $result = mysqli_query($connect,$req);
      ?>
      <div class="alert alert-danger" role="alert">
        Compte supprimé
      </div> 
    <?php }?>
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-6 col-xl-6">
      <form method="post" action="" name="F3">
        <div class="container mt-5">
          <div class="mb-3">
            <label for="name" class="form-label">Nom du Foodtruck / Utilisateur</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="mb-3">
            <label for="heure">Role</label>
            <select class="form-select" id="objet" name="role">
              <option>Choisir role</option>
              <option value="administrateur">administrateur</option>
              <option value="foodtruck">foodtruck</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="pass" required>
          </div>
          <button type="submit" name="creer" class="btn btn-success">Créer</button>
          <button type="submit" name="modif" class="btn btn-warning">Modifier</button>
          <p class="text-warning">Pour la modofication du mot de passe bien noté le bon nom du compte que vous shouaiter
            modifier</p>
        </div>
      </form>
    </div>
    <div class="col-12 col-sm-6 col-xl-6">
      <form method="post" action="" name="F5">
        <div class="container mt-5">
          <div class="mb-3">
            <label for="name" class="form-label">Nom du Foodtruck / Utilisateur</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>

</html>
<?php
  $content = ob_get_clean();
  require "commonsadmin/template.php";
?>