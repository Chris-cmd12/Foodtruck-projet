<?php
  ob_start(); 
  session_start();
    if(!isset($_SESSION['username'])){
      header('location:../../pages/connection.php?action=conn');
    }
?>

<?php
  $content = ob_get_clean();
  require "commonsadmin/template.php";
?>