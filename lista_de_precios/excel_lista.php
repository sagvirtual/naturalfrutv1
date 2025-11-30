<?php
include('../f54du60ig65.php');
include('../listadeprecio/func_fechalista.php');
include('../control_stock/funcionStockS.php');


header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=productos_lista.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo "\xEF\xBB\xBF";

$fechalista = fechalista($rjdhfbpqj);

$buscar = $_POST['buscar'];
$buscar = str_replace(' ', '%', $buscar);
$_SESSION["buscar"] = $_POST['buscar'];

$busquedadds = $_POST['buscar'];
$busquedads = mysqli_real_escape_string($rjdhfbpqj, $busquedadds);
$palabras = explode(' ', $busquedads);

$condiciones = array();
foreach ($palabras as $palabra) {
    $termino = '%' . str_replace(' ', '%', $palabra) . '%';
    $condiciones[] = "productos.nombre LIKE '$termino'";
}
$condicion_final = implode(' AND ', $condiciones);

/**
 * Imprime filas de Excel (HTML) con TODAS las variantes de precio disponibles para un producto.
 * Columnas: Id | Producto | Presentación | Variante | Precio (total) | Unitario | Stock
 */ function imprimir_variantes($rjdhfbpqj, $unidsx, $fechalista)
{
    $stockdispom = 0;
    $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos WHERE id = '$unidsx' AND estado='0' and  id != '1761'");
    if (!$sqldrod) return;

    if ($rowp = mysqli_fetch_array($sqldrod)) {
        $nombre        = $rowp['nombre'];
        $unidadnom     = $rowp['unidadnom'];
        $modo_producto = $rowp['modo_producto'];
        $cantidbiene   = $rowp['kilo'];
        $stockdispom = SumaStockunid($rjdhfbpqj, $unidsx);
        $sqlprecio = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod 
            WHERE id_producto = '$unidsx' AND fecha <= '$fechalista' AND cerrado = '1' AND confirmado = '1'
            ORDER BY fecha DESC, id DESC LIMIT 1");
        if ($stockdispom > 0) {
            // bandera para imprimir ID/Nombre solo una vez
            $ya_impresos = false;

            // helper: imprime una fila; solo pone ID/NOMBRE la primera vez
            $emitir = function ($variante, $total, $ppu) use ($unidsx, $nombre, $unidadnom, $modo_producto, $cantidbiene, &$ya_impresos) {
                echo '<tr>';

                if (!$ya_impresos) {
                    echo '<td style="text-align:center">' . $unidsx . '</td>';
                    echo '<td>' . htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') . '</td>';
                    $ya_impresos = true;
                } else {
                    echo '<td></td><td></td>';
                }

                echo '<td style="text-align:center;">' . $variante . '</td>';
                echo '<td style="text-align:right;"><b>$' . number_format((float)$total, 0, ',', '.') . '</b></td>';
                echo '<td>$' . number_format((float)$ppu,   0, ',', '.') . '</td>';
                echo '</tr>';
            };

            if (!$sqlprecio || !($pr = mysqli_fetch_array($sqlprecio))) {
                // sin precio confirmado: una sola fila "vacía" con ID y nombre (solo una vez)
                echo '<tr>'
                    . '<td style="text-align:center">' . $unidsx . '</td>'
                    . '<td>' . htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') . '</td>'
                    . '<td>—</td><td>—</td><td>—</td>'
                    . '</tr>';
                return;
            }

            // Variables de precio
            $mpa = (float)$pr['mpa'];
            $mpb = (float)$pr['mpb'];
            $mpc = (float)$pr['mpc'];
            $mpd = (float)$pr['mpd'];
            $mpe = (float)$pr['mpe'];
            $mkb = (float)$pr['mkb'];
            $mkc = (float)$pr['mkc'];
            $mkd = (float)$pr['mkd'];
            $mke = (float)$pr['mke'];
            $mub = $pr['mub'];
            $muc = $pr['muc'];
            $mud = $pr['mud'];
            $mue = $pr['mue'];

            $epb = (float)$pr['epb'];
            $epc = (float)$pr['epc'];
            $epd = (float)$pr['epd'];
            $epe = (float)$pr['epe'];
            $ekb = (float)$pr['ekb'];
            $ekc = (float)$pr['ekc'];
            $ekd = (float)$pr['ekd'];
            $eke = (float)$pr['eke'];
            $eub = $pr['eub'];
            $euc = $pr['euc'];
            $eud = $pr['eud'];
            $eue = $pr['eue'];

            // A: unidad
            if ($mpa > 0) {
                $emitir('1 ' . $unidadnom, $mpa, $mpa);
            }

            // B
            if ($mkb > 0 && $mpb > 0) {
                if ($mub === "0") $emitir($mkb . ' ' . $unidadnom, $mpb * $mkb, $mpb);
                else              $emitir($mkb . ' ' . $modo_producto . ' x ' . $cantidbiene . ' ' . $unidadnom, $mpb * $cantidbiene * $mkb, $mpb);
            }
            // C
            if ($mkc > 0 && $mpc > 0) {
                if ($muc === "0") $emitir($mkc . ' ' . $unidadnom, $mpc * $mkc, $mpc);
                else              $emitir($mkc . ' ' . $modo_producto . ' x ' . $cantidbiene . ' ' . $unidadnom, $mpc * $cantidbiene * $mkc, $mpc);
            }
            // D
            if ($mkd > 0 && $mpd > 0) {
                if ($mud === "0") $emitir($mkd . ' ' . $unidadnom, $mpd * $mkd, $mpd);
                else              $emitir($mkd . ' ' . $modo_producto . ' x ' . $cantidbiene . ' ' . $unidadnom, $mpd * $cantidbiene * $mkd, $mpd);
            }
            // E
            if ($mke > 0 && $mpe > 0) {
                if ($mue === "0") $emitir($mke . ' ' . $unidadnom, $mpe * $mke, $mpe);
                else              $emitir($mke . ' ' . $modo_producto . ' x ' . $cantidbiene . ' ' . $unidadnom, $mpe * $cantidbiene * $mke, $mpe);
            }

            // Especiales (E)
            if ($ekb > 0 && $epb > 0) {
                if ($eub === "0") $emitir($ekb . ' ' . $unidadnom . ' (E)', $epb * $ekb, $epb);
                else              $emitir($ekb . ' ' . $modo_producto . ' x ' . $cantidbiene . ' ' . $unidadnom . ' (E)', $epb * $cantidbiene * $ekb, $epb);
            }
            if ($ekc > 0 && $epc > 0) {
                if ($euc === "0") $emitir($ekc . ' ' . $unidadnom . ' (E)', $epc * $ekc, $epc);
                else              $emitir($ekc . ' ' . $modo_producto . ' x ' . $cantidbiene . ' ' . $unidadnom . ' (E)', $epc * $cantidbiene * $ekc, $epc);
            }
            if ($ekd > 0 && $epd > 0) {
                if ($eud === "0") $emitir($ekd . ' ' . $unidadnom . ' (E)', $epd * $ekd, $epd);
                else              $emitir($ekd . ' ' . $modo_producto . ' x ' . $cantidbiene . ' ' . $unidadnom . ' (E)', $epd * $cantidbiene * $ekd, $epd);
            }
            if ($eke > 0 && $epe > 0) {
                if ($eue === "0") $emitir($eke . ' ' . $unidadnom . ' (E)', $epe * $eke, $epe);
                else              $emitir($eke . ' ' . $modo_producto . ' x ' . $cantidbiene . ' ' . $unidadnom . ' (E)', $epe * $cantidbiene * $eke, $epe);
            }
        }
    }
}


// Consulta principal ordenada por categoría y producto
$sqljoin = mysqli_query($rjdhfbpqj, "SELECT 
    productos.id as idproducto, 
    productos.nombre,
    categorias.nombre AS categoria,
    productos.unidadnom,
    productos.modo_producto,
    productos.kilo
    FROM productos 
    INNER JOIN marcas ON productos.id_marcas = marcas.id 
    INNER JOIN proveedores ON productos.id_proveedor = proveedores.id
    INNER JOIN categorias ON productos.categoria = categorias.id
    WHERE $condicion_final
       OR marcas.empresa LIKE '%$buscar%'
       OR productos.codigo LIKE '%$buscar%'
       OR proveedores.empresa LIKE '%$buscar%'
    ORDER BY categorias.nombre ASC, productos.nombre ASC");
echo "<table border='0'>";
echo "<tr style='height:70;'>"; // altura fija para que no se monte sobre el texto
echo "  <td style='vertical-align:middle;'>";
echo "    <table style='width:100%; border-collapse:collapse;'>";
echo "      <tr><td border='0'></td>";
echo "        <td style='width:180px; text-align:left; vertical-align:middle;'>";
echo "          <img src='https://www.softwarenatfrut.com/assets/logopexcel.png' alt='Logo' style='max-height:60px; max-width:80px;'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
";
echo "        </td>";
echo "        <td style='vertical-align:middle;'>";
echo "          <span style='font-size:16px; font-weight:bold;'>Lista de Precios</span><br>";
echo "          <span style='font-size:14px;'>Fecha: <b>" . date('d/m/Y', strtotime($fechahoy)) . "</b></span>";
echo "        </td>";
echo "      </tr>";
echo "    </table>";
echo "  </td>";
echo "</tr></table>";



echo "<table border='1'>";

$categoria_actual = '';
$imprimio_encabezado = false;

while ($row = mysqli_fetch_array($sqljoin)) {
    if ($categoria_actual !== $row['categoria']) {
        $categoria_actual = $row['categoria'];
        // Fila divisoria de categoría
        echo "<tr><td colspan='5' style='font-weight:bold;background-color:#d9d9d9;'>"
            . mb_strtoupper($categoria_actual, 'UTF-8') . "</td></tr>";
        // Encabezado de columnas
        echo "<tr>"
            . "<th>Id</th>"
            . "<th>Producto</th>"
            . "<th>Comprando</th>"
            . "<th>Precio Final</th>"
            . "<th>Precio Unit</th>"
            . "</tr>";
    }

    $unidsx = $row['idproducto'];
    imprimir_variantes($rjdhfbpqj, $unidsx, $fechalista);
}

echo "</table>";
