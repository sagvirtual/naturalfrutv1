<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('func_stoqueo.php');

//$id_producto='1772';
$ubicacion = $_GET['ubicacion'];

if ($ubicacion == 2) {
  $envasa = "Planta Baja";
} else {
  $envasa = "Planta Alta";
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
  <title>Anticipo de Stokeo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="container mt-3">
    <h2>Anticipo de Envasado <?= $envasa ?></h2>
    <p>Se revisa internamente las futuras ordenes y se calcula las cantidades.</p>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
        </tr>
      </thead>
      <tbody>

        <?php

        $productos_con_stock = [];

        $querycliordn = mysqli_query($rjdhfbpqj, "SELECT * FROM productos WHERE ubicacion='$ubicacion'");

        while ($rowcatpro = mysqli_fetch_array($querycliordn)) {
          $id_producto = $rowcatpro['id'];
          $nombre = $rowcatpro['nombre'];
          $stokeo = stockeo($rjdhfbpqj, $id_producto);

          if ($stokeo > 0) {
            $productos_con_stock[] = [
              'nombre' => $nombre,
              'kilos' => $stokeo
            ];
          }
        }

        // Ordenar por kilaje descendente
        usort($productos_con_stock, function ($a, $b) {
          return $b['kilos'] <=> $a['kilos'];
        });

        // Mostrar la tabla
        foreach ($productos_con_stock as $producto) {
          echo '<tr><td>' . $producto['nombre'] . '</td><td>' . $producto['kilos'] . ' Kilos</td></tr>';
        }
        ?>

      </tbody>
    </table>
  </div>

</body>

</html>