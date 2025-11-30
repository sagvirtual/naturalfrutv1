<?php include('../f54du60ig65.php');
$hasta_date = $_GET['hasta_date'];
$desde_date = $_GET['desde_date'];
$buscar = $_GET['buscar'];
$busproveedor = $_GET['busproveedor'];
$busproveedorP = $_GET['busproveedorp'];
/* ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); */

require('../salidas/mpdf.php');
ob_start();
?>
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;

    }
</style>

<table>
    <tr>
        <td style="text-align: center;">Fecha</td>
        <td style="text-align: center;">Id Orden</td>
        <td style="text-align: center;">Proveedor</td>
        <td style="text-align: center;">Produtos</td>

        <td style="text-align: center;">Cant.</td>

    </tr>
    <?php
    //join and precioprod.fecha BETWEEN '$desde_date' and '$hasta_date' 
    //Consulta SQL
    // Separar la entrada del usuario en palabras individuales

    $busquedads = mysqli_real_escape_string($rjdhfbpqj, $buscar);

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
    // Eliminar el "AND" adicional al final de las condiciones de búsqueda AND orden.col>='1'  // AND orden.col!='0' AND orden.col!='32' 


    //clente busqueda


    // Dividir la cadena de búsqueda en palabrascl
    $palabrascl = explode(' ', $busproveedor);

    // Crear un array para almacenar las condiciones de búsqueda para cada palabra
    $condicioncl = array();

    foreach ($palabrascl as $palabracl) {
        // Reemplazar espacios con comodines para que coincida con cualquier palabra
        $terminocl = '%' . str_replace(' ', '%', $palabracl) . '%';
        // Agregar la condición para esta palabra al array
        $condicioncl[] = "CONCAT(clientes.nom_empr, ' ', clientes.nom_contac) LIKE '$terminocl'";
    }

    // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabrascl estén presentes
    $condicion_fincl = implode(' AND ', $condicioncl);

    //proveedor busqueda


    // Dividir la cadena de búsqueda en palabrascl
    $palabrasclP = explode(' ', $busproveedorP);

    // Crear un array para almacenar las condiciones de búsqueda para cada palabra
    $condicionclP = array();

    foreach ($palabrasclP as $palabraclP) {
        // Reemplazar espacios con comodines para que coincida con cualquier palabra
        $terminoclP = '%' . str_replace(' ', '%', $palabraclP) . '%';
        // Agregar la condición para esta palabra al array
        $condicionclP[] = "proveedores.empresa LIKE '$terminoclP'";
    }

    // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabrascl estén presentes
    $condicion_finclP = implode(' AND ', $condicionclP);


    $cantidskt = 0;
    $bulto = 0;
    $total = 0;


    // Construir la consulta SQL completa
    $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT 
                                clientes.id, clientes.nom_empr, clientes.nom_contac, clientes.id as idcliente,
                                faltantes.fecha, faltantes.tipounidad, faltantes.cantidad,faltantes.id_orden, faltantes.id_cliente,faltantes.id_producto,
                                productos.nombre, productos.kilo, productos.unidadnom, productos.id,productos.id_proveedor,
                                proveedores.id as idproveedor,proveedores.empresa
                                FROM clientes
                                INNER JOIN faltantes ON clientes.id = faltantes.id_cliente 
                                INNER JOIN productos ON productos.id = faltantes.id_producto 
                                INNER JOIN proveedores ON proveedores.id = productos.id_proveedor 
                             WHERE ($condicion_final) AND faltantes.fecha BETWEEN '$desde_date' AND '$hasta_date' and ($condicion_fincl) and ($condicion_finclP) ORDER BY `productos`.`id` ASC");

    if (!$sqlcompra) {
        die("Error en consulta SQL básica: " . mysqli_error($rjdhfbpqj));
    }
    while ($rowcompra = mysqli_fetch_array($sqlcompra)) {
        $id_producto = $rowcompra["id"];
        $fechaorden = $rowcompra["fecha"];
        $cantidadds = $rowcompra["cantidad"];
        $idorden = $rowcompra["id_orden"];
        $tipounidad = $rowcompra["tipounidad"];
        $presentacion = $rowcompra["kilo"];
        $id_ordencod = base64_encode($rowcompra["id_orden"]);
        $id_clientecod = base64_encode($rowcompra["id_cliente"]);
        $nombreuns = $rowcompra["unidadnom"];
        $descuenun = 0;
        $bulto = $rowcompra["kilo"];
        if ($cantidadds == 0) {
            $cantidadds = 1;
        }


        if ($tipounidad == "0") {
            $cantidsk = $rowcompra["cantidad"];
            $cantidskt += $rowcompra["cantidad"];
        } else {
            $cantidsk = $rowcompra["cantidad"] * $bulto;
            $cantidskt += $rowcompra["cantidad"] * $bulto;
        }

        echo '
                                          <tr style="padding:10px;">
                                          <td style="text-align: center;padding:10px;"> 
                                           ' . date('d/m/y', strtotime($rowcompra["fecha"])) . '
                                           </td>
                                           <td style="text-align: center;">';
        if ($idorden > 0) {
            echo '' . $rowcompra["id_orden"] . '';
        } else {
            echo '';
        }


        echo '</td>
                                             <td>' . $rowcompra["empresa"] . '</td>
                                             <td>[' . $id_producto . '] ' . $rowcompra["nombre"] . '</td>
                                              <td style="text-align: center;">' . $cantidsk . ' ' . $nombreuns . '</td>
                                             ';

        echo '</tr>';
    }
    ?>

</table>

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->autosizeTables = false;
$mpdf->shrink_tables_to_fit = 0;
$mpdf->ignore_table_widths = true;
$mpdf = new mPDF('c', 'A4-P');
$mpdf->writeHTML($css, 1);


//$mpdf->SetHTMLFooter('<p style="font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Haga su pedido al 4709-3075 // 15-2415-0520 o 15-5429-6101 Num venta: 615252</p>');
$mpdf->AddPageByArray([
    "margin-left" => "5mm",
    "margin-right" => "5mm",
    "margin-top" => "5mm",
    "margin-bottom" => "15mm"
]);

$mpdf->writeHTML($html);
$mpdf->Output('faltantes.pdf', 'I'); //D
?>