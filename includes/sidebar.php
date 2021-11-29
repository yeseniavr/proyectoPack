<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
    <img src="img/logo.svg" alt="Logo G-Check" width="40px">
    Pack Express</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!--<div class="btn-group me-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">Dark</button>
      <button type="button" class="btn btn-sm btn-outline-secondary">Light</button>
  </div>
-->
  <div class="dropdown perfil">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
    <!--mostrar nombre de usuario-->
      <?php echo $_SESSION["nombre_usuario"]; ?>
    </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <li><a class="dropdown-item" href="perfil.php">Perfil</a></li>
      <li><a class="dropdown-item" href="pass.php">Cambiar contraseña</a></li>
      <li><a class="dropdown-item" href="logout.php">Salir</a></li>
    </ul>
  </div>
</header>

<div class="container-fluid">
<div class="row">
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <a href="gestion.php" class="nav-link">
      <?php
//mostrar imagen de usuario
$id = $_SESSION['id_usuario'];
$query = "SELECT imagen FROM usuarios WHERE id_user = '$id'";
$result = mysqli_query($conexion, $query);
while ($row = mysqli_fetch_array($result)) {?>
         <?php echo "<img src='" . $row['imagen'] . "' class='logo'>"; ?>
        <?php }?>
    </a>
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Clientes</span>
      <a class="link-secondary" href="#" aria-label="Add a new report">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="nuevo-cliente.php">
          <span data-feather="file-text"></span>
          Nuevo Cliente
        </a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="gestion.php">
          <span data-feather="file-text"></span>
          Cartera de Clientes
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contador.php">
          <span data-feather="file-text"></span>
          Importe Total por Cliente
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Cheques</span>
      <a class="link-secondary" href="#" aria-label="Add a new report">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="nuevo-cheque.php">
          <span data-feather="file-text"></span>
          Nuevo Cheque
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cheques.php">
          <span data-feather="file-text"></span>
          Registro de Cheques
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cliente-cheque.php">
          <span data-feather="file-text"></span>
          Cheques por cliente
        </a>
      </li>
  </div>
</nav>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 px-3">


