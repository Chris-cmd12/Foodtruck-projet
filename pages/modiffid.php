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
                <form action="" method="post" name="F">
                <div class="mt-5 mb-3">
                    <label for="id" class="form-label">Numéro de votre commande</label>
                    <input type="text" class="form-control" name="id" required>
                </div>
                <button type="submit" class="btn btn-primary" name="modif">Modifier</button>
                </form>
            </div>
        </div>
    </div>
    <?php

		if(isset($_POST['modif'])){
			$id=$_POST['id']; 
			header('Location:modif.php?id='.$id.'');
		}
	?>
</body>
</html>
 
<?php
  $content = ob_get_clean();
  require "commons/template.php";
?>