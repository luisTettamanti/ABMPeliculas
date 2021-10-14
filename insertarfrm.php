<?php include_once "encabezado.php"; ?>
<div class="row">
    <div class="col-12">
        <h1>Insertar Película</h1>
        <form action="insertar.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input placeholder="Nombre" class="form-control" type="text" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="anio">Año</label>
                <input placeholder="Año" class="form-control" type="text" name="anio" id="anio" required>
            </div>
            <div class="form-group">
                <label for="duracion">Duración</label>
                <input placeholder="Duración" class="form-control" type="text" name="duracion" id="duracion" required>
            </div>
            <div class="form-group">
                <label for="idDirector">Nombre</label>
                <input placeholder="idDirector" class="form-control" type="text" name="idDirector" id="idDirector" required>
            </div>
            <div class="form-group">
                <label for="nombre">IMDB</label>
                <input placeholder="IMDB" class="form-control" type="text" name="IMDB" id="IMDB" required>
            </div>
            <div class="form-group">
                <label for="nombre">idCategoria</label>
                <input placeholder="idCategoria" class="form-control" type="text" name="idCategoria" id="idCategoria" required>
            </div>
            <div class="form-group my-4">
              <button class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php"; ?>
