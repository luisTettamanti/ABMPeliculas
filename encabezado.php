<?php
  session_start();
  $mysqli = include_once "conexion.php";
  if (isset($_SESSION['usuario'])) {
    $usuarioActual = $_SESSION['usuario'];
  } else {
    $usuarioActual = 'Usuario';
  }
  $resultado = $mysqli->query('SELECT * FROM Categorias');
  $categorias = $resultado->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es" style="position:relative; min-height:100%;">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CarenaMovies</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
</head>

<body class="d-flex flex-column min-vh-100" style="background-image: url('img/fondo.jpg');">
  <header class="text-white p-5" style="background-color:teal;background-image:url('img/camara.png');background-size:cover;background-repeat:no-repeat;">
    <h2><a href="indexcategorias.php" class="text-light" style="text-decoration:none;">CarenaMovies</a></h2>
  </header>
  <nav style="background-color:teal;" class="navbar navbar-expand-sm sticky-top navbar-dark mb-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="indexcategorias.php">CarenaMovies</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Categorías</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="indexcategorias.php?categoria=Todas">Todas</a></li>
              <?php foreach ($categorias as $cat) {
                echo '<li><a class="dropdown-item" href="indexcategorias.php?categoria='.$cat['nombre'].'">'.$cat['nombre'].'</a></li>';
              } ?>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Ofertas</a>
          </li>
          <?php
            if ($usuarioActual!='Usuario') {
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="reserva.php">Carro de Compras</a>';
              echo '</li>';
            }
           ?>
        </ul>
        <ul class="nav navbar-nav ms-auto">

          <li class="nav-item dropdown dropstart">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="#"><?php echo $usuarioActual; ?></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo 'login.php';?>">Registro / Login</a></li>
              <li><a class="dropdown-item" href="<?php echo 'logout.php';?>">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
