<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../control_stock/funcionStockSnot.php');


$busquedadds = $_POST['producto'];
$busquedads = mysqli_real_escape_string($rjdhfbpqj, $busquedadds);

// Dividir la cadena de búsqueda en palabras
$palabras = explode(' ', $busquedads);

// Crear un array para almacenar las condiciones de búsqueda para cada palabra
$condiciones = array();

foreach ($palabras as $palabra) {
    // Reemplazar espacios con comodines para que coincida con cualquier palabra
    $termino = '%' . str_replace(' ', '%', $palabra) . '%';
    // Agregar la condición para esta palabra al array
    $condiciones[] = "productos.nombre LIKE '$termino'";
}

// Unir todas las condiciones con el operador AND para asegurarse de que todas las palabras estén presentes
$condicion_final = implode(' AND ', $condiciones);



?>
<style>
    .cuadbus {
        margin: 4;
        /* Elimina el margen */
        padding: 4;
        /* Elimina el padding */
    }

    .fonbus {
        border-left: 2px solid #06A8FF;
        border-right: 2px solid #06A8FF;
        border-bottom: 2px solid #06A8FF;
        width: 54%;
        position: absolute;
        margin: 0;
        /* Elimina el margen */
        padding: 4;
        /* Elimina el padding */
        top: 80;
        background-color: #ffffff;
        z-index: 1;
        margin: 0;
        /* Elimina el margen */
        padding: 4;
        /* Elimina el padding */
    }
</style>
<div id="cudrobus" class="fonbus">
    <?
    if (!empty($_POST['producto']) && $_POST['producto'] != ' ' && $_POST['producto'] != null)
        /* producto proveedor y marca */
        $sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where  $condicion_final ORDER BY `productos`.`position` ASC Limit 10");
    while ($roworden = mysqli_fetch_array($sqlorden)) {
        $numberimp = $numberimp + 1;

        $nombrev = $roworden["nombre"];
        $kilo = $roworden["kilo"];
        $modo_producto = $roworden["modo_producto"];
        $unidadnom = $roworden["unidadnom"];
        $nombrevd = explode("(", $nombrev);

        $marcno = $nombrevd[1];
        $idproduc = $roworden["id"];
        $stockdispom = SumaStock($rjdhfbpqj, $idproduc);
        $stokbulto = $stockdispom / $kilo;
        $stokbulto = explode(".", $stokbulto);
        $stokver = " <br>[Stock: " . $stockdispom . " " . $roworden['unidadnom'] . " / " . $stokbulto[0] . " " . $modo_producto . "]<br>";

        if (!empty($nombrevd[2])) {
            $marcnod = '<i style="color:blue;">(' . $nombrevd[2] . '</i>';
            $colorecaj = "black;";
        } else {
            $marcnod = "";
            $colorecaj = "blue;";
        }

        if ($marcno != '') {
            $empresamarca = ' <i style="color:' . $colorecaj . '">(' . $marcno . '</i>' . $marcnod . '';
        } else {
            $empresamarca = "";
        }

        $nombrevein = "<b>" . $nombrevd[0] . "</b>  " . $empresamarca . " - " . $modo_producto . "&nbsp;x&nbsp;" . $kilo . "&nbsp;" . $unidadnom;;

        echo '
 <p class="cuadbus" style="padding-left:5px;">' . $nombrevein . ' ' . $stokver . '<i style="display:none;">@' . $roworden["id"] . '@</i></p>

            ';
    }

    ?>

</div>