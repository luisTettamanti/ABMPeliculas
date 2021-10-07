<?php
  if (isset($_SESSION['usuario'])) {
    $usuario = ' - '.$_SESSION['usuario'];
  } else {
    $usuario = '';
  }
?>

    <footer class="p-2 fixed-bottom bg-dark">
      <span class="text-muted">ABM Películas<?php echo $usuario; ?></span>
    </footer>
  </div>
</body>
</html>
