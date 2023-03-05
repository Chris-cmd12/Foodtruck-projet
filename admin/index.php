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
  <title>Acceuil</title>
</head>

<body>
  <article>
    <div id="carouselExampleCaptions" class="carousel slide carousel-danger bold perso_bgOrangeDegrade"
      data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
          aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
          aria-label="Slide 5"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <?php
            $req = "SELECT image FROM menu WHERE date='Lundi'";
            $result = mysqli_query($connect,$req);
              $ligne = mysqli_fetch_assoc($result);
              $pdf = $ligne['image'];
              echo"<img src='../images/$pdf'
              class='d-block w-75 h-75 mx-auto img-tumbnail border border-2 border-dark' alt='Lundi'>"
            ?>
          <div class="carousel-caption d-none d-md-block">
            <h5>Lundi</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <?php
            $req = "SELECT image FROM menu WHERE date='Mardi'";
            $result = mysqli_query($connect,$req);
              $ligne = mysqli_fetch_assoc($result);
              $pdf = $ligne['image'];
              echo"<img src='../images/$pdf'
              class='d-block w-75 h-75 mx-auto img-tumbnail border border-2 border-dark' alt='Mardi'>"
            ?>
          <div class="carousel-caption d-none d-md-block">
            <h5>Mardi</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <?php
            $req = "SELECT image FROM menu WHERE date='Mercredi'";
            $result = mysqli_query($connect,$req);
              $ligne = mysqli_fetch_assoc($result);
              $pdf = $ligne['image'];
              echo"<img src='../images/$pdf'
              class='d-block w-75 h-75 mx-auto img-tumbnail border border-2 border-dark' alt='Mercredi'>"
            ?>
          <div class="carousel-caption d-none d-md-block">
            <h5>Mercredi</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <?php
            $req = "SELECT image FROM menu WHERE date='Jeudi'";
            $result = mysqli_query($connect,$req);
              $ligne = mysqli_fetch_assoc($result);
              $pdf = $ligne['image'];
              echo"<img src='../images/$pdf'
              class='d-block w-75 h-75 mx-auto img-tumbnail border border-2 border-dark' alt='Jeudi '>"
            ?>
          <div class="carousel-caption d-none d-md-block">
            <h5>Jeudi</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <?php
            $req = "SELECT image FROM menu WHERE date='Vendredi'";
            $result = mysqli_query($connect,$req);
              $ligne = mysqli_fetch_assoc($result);
              $pdf = $ligne['image'];
              echo"<img src='../images/$pdf'
              class='d-block w-75 h-75 mx-auto img-tumbnail border border-2 border-dark' alt='Vendredi'>"
            ?>
          <div class="carousel-caption d-none d-md-block">
            <h5>Vendredi</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="container my-5 text-center">

      <?php
        if(date('D') === 'Mon'){
          $req = "SELECT pdf FROM menu WHERE date='Lundi'";
            $result = mysqli_query($connect,$req);
              $ligne = mysqli_fetch_assoc($result);
              $pdf = $ligne['pdf'];
            echo "<a class='btn btn-primary' href='../pdf/$pdf'>Voir le Menu de Lundi</a>\n";
          }elseif(date('D') === 'Tue'){
            $req = "SELECT pdf FROM menu WHERE date='Mardi'";
            $result = mysqli_query($connect,$req);
              $ligne = mysqli_fetch_assoc($result);
              $pdf = $ligne['pdf'];
            echo "<a class='btn btn-primary' href='../pdf/$pdf'>Voir le Menu de Mardi</a>\n";;
          }elseif (date('D') === 'Wed') {
            $req = "SELECT pdf FROM menu WHERE date='Mercredi'";
            $result = mysqli_query($connect,$req);
              $ligne = mysqli_fetch_assoc($result);
              $pdf = $ligne['pdf'];
            echo "<a class='btn btn-primary' href='../pdf/$pdf'>Voir le Menu de Mercredi</a>\n";
          }elseif(date('D') === 'Thu'){
            $req = "SELECT pdf FROM menu WHERE date='Jeudi'";
            $result = mysqli_query($connect,$req);
              $ligne = mysqli_fetch_assoc($result);
              $pdf = $ligne['pdf'];
            echo "<a class='btn btn-primary' href='../pdf/$pdf'>Voir le Menu de Jeudi</a>\n";
          }elseif(date('D') === 'Fri'){
            $req = "SELECT pdf FROM menu WHERE date='Vendredi'";
            $result = mysqli_query($connect,$req);
              $ligne = mysqli_fetch_assoc($result);
              $pdf = $ligne['pdf'];
              echo "<a class='btn btn-primary' href='../pdf/$pdf' target='_blank'>Voir le Menu de Vendredi</a>\n";
            }

      ?>
      <a class="btn btn-info" href="command.php">Commander</a>
    </div>
  </article>
</body>

</html>




<?php
  $content = ob_get_clean();
  require "commons/template.php";

?>