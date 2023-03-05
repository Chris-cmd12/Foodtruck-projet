<nav class="navbar navbar-expand-xl navbar-dark perso_bgOrange sticky-top">
  <div class="container-fluid">

    <a class="navbar-brand" href="../admin/index.php"><?php echo $_SESSION["username"]; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="command.php">Commander</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pagesadmin/admin.php">Administration</a>
        </li>
      </ul>

    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="ordre.php">Ordres des commandes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../deco.php">Deconnection</a>
        </li>
    </div>

  </div>
</nav>