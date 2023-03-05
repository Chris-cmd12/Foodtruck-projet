<?php
  include '../connect.php';
  ob_start(); 
  session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Conncetion</title>
</head>

<body>
  <div class="container my-5">
    <form method="post" name="F2">
      <div class="mb-3">
        <label for="identifiant" class="form-label">Identifiant</label>
        <input type="text" class="form-control" name="ident" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="pass" required>
      </div>
      <button name="conn" class="btn btn-primary">Connection</button>
    </form>
  </div>

  <?php
    if(isset($_POST['conn'])){
      $id=$_POST['ident'];
      $mdp=$_POST['pass'];
      // $hash = password_hash($pass,PASSWORD_BCRYPT);
      
      $id = mysqli_real_escape_string($connect,$id);
      $mdp = mysqli_real_escape_string($connect,$mdp);
      // $hash = mysqli_real_escape_string($connect,$hash);

      $req="SELECT * FROM connect WHERE identifiant = '$id' AND motdepasse= '$mdp' ";
      $result = mysqli_query($connect,$req);

      $count = mysqli_num_rows($result);

      if($count==1){
          $_SESSION['username']=$id;
          $user = mysqli_fetch_assoc($result);
        if($user['role']=='administrateur'){
          header("location:../admin/index.php");
        }else{
          header("location:../foodtruck/index.php");
        }
        
      }else{
          echo"Mot de passe et identifiant incorrecte";
          echo $hash;
      }

    }

  ?>
</body>

</html>



<?php
  $content = ob_get_clean();
  require "commons/template.php";
?>