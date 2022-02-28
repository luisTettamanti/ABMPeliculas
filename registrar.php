<?php
  include_once "encabezado.php";
  //$mysqli = include_once "conexion.php";
  $errores = 0;
  $mensajes = array();

  if (isset($_POST['nombre']) and
    isset($_POST['email']) and
    isset($_POST['usuario']) and
    isset($_POST['clave1']) and
    isset($_POST['clave2'])) {
      $nombre = $_POST['nombre'];
      $email = $_POST['email'];
      $usuario = $_POST['usuario'];
      $clave1 = $_POST['clave1'];
      $clave2 = $_POST['clave2'];
      $encriptada = md5($clave1);

      $query = "SELECT * FROM usuarios WHERE usuario='$usuario'";
      $usuarios = $mysqli->query($query);
      if (!$usuarios) die($mysqli->error);
      $cantUsuarios = $usuarios->num_rows;

      if ($clave1===$clave2 and $cantUsuarios==0) {
        $sentencia = $mysqli->prepare("INSERT INTO usuarios (nombre, email, usuario, clave) VALUES (?, ?, ?, ?)");
        $sentencia->bind_param("ssss", $nombre, $email, $usuario, $encriptada);
        $sentencia->execute();
        header('Location: login.php');
      } else {
        if ($clave1!=$clave2) {
          $errores++;
          $mensaje = 'No hay concordancia en las claves.';
          array_push($mensajes, $mensaje);
        }
        if ($cantUsuarios>0) {
          $errores++;
          $mensaje = 'El nombre de usuario ya existe.';
          array_push($mensajes, $mensaje);
        }
      }
    } else {
      $nombre = '';
      $email = '';
      $usuario = '';
      $clave1 = '';
      $clave2 = '';
      $encriptada = '';
  }
?>

<div class="row">
  <div class="col-12">
    <h1>Registrar Usuario</h1>
    <form action="registrar.php" method="POST">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input value="<?php echo $nombre; ?>" placeholder="Apellido y nombres" class="form-control" type="text" name="nombre" id="nombre" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input value="<?php echo $email; ?>" placeholder="E-mail" class="form-control" type="email" name="email" id="email" required>
      </div>
      <div class="form-group">
        <label for="usuario">Usuario</label>
        <input value="<?php echo $usuario; ?>" placeholder="Usuario" class="form-control" type="text" name="usuario" id="usuario" required>
      </div>
      <div class="form-group">
        <label for="clave1">Clave</label>
        <input value="<?php echo $clave1; ?>" placeholder="Clave" class="form-control" type="password" name="clave1" id="clave1" required>
      </div>
      <div class="form-group">
        <label for="clave2">Reingrese Clave</label>
        <input value="<?php echo $clave2; ?>" placeholder="Clave" class="form-control" type="password" name="clave2" id="clave2" required>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-success">
      </div>
    </form>
    <?php
      for ($i=0; $i < $errores; $i++) {
        echo '<div class="alert alert-danger p-2">' . $mensajes[$i] . '</div>';
      }
    ?>
  </div>
</div>
<?php include_once "pie.php"; ?>
