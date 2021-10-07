<?php
  include_once "encabezado.php";
  $mysqli = include_once "conexion.php";
  $alerta = false;
  if (isset($_GET['usuario']) and isset($_GET['clave'])) {
    $usuario = $_GET['usuario'];
    $clave = $_GET['clave'];
    $encriptada = md5($clave);
    $sentencia = $mysqli->prepare("SELECT * FROM usuarios WHERE usuario = ? and clave = ?");
    $sentencia->bind_param("ss", $usuario, $encriptada);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $usuarios = $resultado->fetch_assoc();
    if ($usuarios) {
      $_SESSION['idUsuario'] = $usuarios['id'];
      $_SESSION['usuario'] = $usuarios['usuario'];
      header("Location: listar.php");
    } else {
      $alerta = true;
    }
  } else {
    $usuario = '';
    $clave = '';
  }
?>

<div class="row">
    <div class="col-12">
        <h1>Verificación Usuario</h1>
        <form action="login.php" method="GET">
            <div class="form-group">
              <label for="usuario">Usuario</label>
              <input value="<?php echo $usuario; ?>" placeholder="Usuario" class="form-control" type="text" name="usuario" id="usuario" required>
            </div>
            <div class="form-group">
              <label for="clave">Clave</label>
              <input value="<?php echo $clave; ?>" placeholder="Clave" class="form-control" type="password" name="clave" id="clave" required>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success">
              <a class="btn btn-warning" href="registrar.php">Registrar</a>
            </div>
        </form>
        <?php
          if ($alerta==true) {
            echo '<div class="alert alert-danger p-2">Usuario o contraseña inválidos.</div>';
          }
        ?>
    </div>
</div>
<?php include_once "pie.php"; ?>
