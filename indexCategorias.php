<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Prueba nuevo index</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <?php
          $mysqli = include_once "conexion.php";

          $resultado = $mysqli->query('SELECT * FROM Categorias');
          $categorias = $resultado->fetch_all(MYSQLI_ASSOC);

          foreach ($categorias as $cat) {
            $resultado = $mysqli->query('SELECT * FROM Peliculas WHERE idCategoria='.$cat['id']);
            $peliculas = $resultado->fetch_all(MYSQLI_ASSOC);

            if ($peliculas) {
              echo '<h3>'.$cat['nombre'].'</h3>';
            }

            foreach ($peliculas as $peli) {
              echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">';
              echo '<div class="card bg-info">';
              echo '<img class="card-img-top" src="img/'.$peli['caratula'].'" alt="Card image">';
              echo '<div class="card-body">';
              echo '<h4 class="card-title">'.$peli['nombre'].'</h4>';
              echo '<p class="card-text">Some example text.</p>';
              echo '<a href="detalle.php?id='.$peli['id'].'" class="btn btn-primary">See Profile</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          }
        ?>
      </div>
    </div>
  </body>
</html>
