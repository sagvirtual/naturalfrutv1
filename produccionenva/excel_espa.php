<?php include('../f54du60ig65.php');
include('../funciones/funcNomProd.php');


$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

$id_producto = $_GET['id_producto'];
$modulo = $_GET['modulo'];

// Configuramos las cabeceras para descargar el archivo Excel
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=produccion_" . $desde . "_" . $hasta . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "\xEF\xBB\xBF"; // Añadimos BOM para que Excel detecte UTF-8 correctamente

?>

<style>
    body {
        font-size: 10pt;
        font-family: Arial, sans-serif;
    }

    th,
    td {
        border-bottom: 1px solid #000000;
        border-left: 1px solid #000000;
        border-right: 1px solid #000000;
        padding: 2px;
    }


    .tdderechaf {
        border-right-width: 1pt;
        border-right-style: solid;
        border-right-color: #000000;
        border-bottom-width: 1pt;
        border-bottom-style: solid;
        border-bottom-color: #000000;
        width: 80px;

    }
</style>
<?
function funcNombulto($rjdhfbpqj, $id_producto)
{

    $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where  id = '$id_producto'");
    if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {
        $presentacion = $rowusuarios["kilo"];
    }

    return $presentacion;
}


$ediyes = '0';
?>

<?php
// los item individuales
function trkilos($rjdhfbpqj, $desde, $hasta, $sector, $id_producto)
{
    $CantKilos = 0;

    if (!empty($id_producto)) {
        $sqlp = " and id_producto='" . $id_producto . "'";
    }
    $sqlordenc = mysqli_query($rjdhfbpqj, "SELECT * FROM producion_env Where  sector='$sector' $sqlp and fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha ASC");
    while ($roworden = mysqli_fetch_array($sqlordenc)) {
        $id = $roworden['id'];
        $hora = $roworden['hora'];
        $id_producto = $roworden['id_producto'];
        $CantKilos = ${"CantKilos" . $id};

        $CantKilos = $roworden['CantStock'];
        $fecha = $roworden['fecha'];
        $nombrepro = funcNomProd($rjdhfbpqj, $id_producto);
        echo '
    
       <tr>
          <td>  ' . date('d/m/y', strtotime($fecha)) . '</td>
          <td>' . $hora . '</td>
          <td>' . $nombrepro . '</td>
          <td><b>' . $CantKilos . '</b></td>
          </tr>';
    }
}


function totalproduciom($rjdhfbpqj, $desde, $hasta, $sector, $id_producto)
{
    $valor = 0;
    if (!empty($id_producto)) {
        $sqlp = " and id_producto='" . $id_producto . "'";
    }

    $sqlordenc = mysqli_query($rjdhfbpqj, "SELECT * FROM producion_env Where sector='$sector' $sqlp and fecha BETWEEN '$desde' AND '$hasta'");
    while ($roworden = mysqli_fetch_array($sqlordenc)) {
        $valor += $roworden['CantStock'];
    }
    return  $valor;
}

/* ordenes */
function totalproduciomOrdenes($rjdhfbpqj, $desde, $hasta, $sector, $id_producto)
{

    if ($sector == '21') {
        $fromes = 'itemenvas';
    }
    if ($sector == '22') {
        $fromes = 'itemenvasa';
    }




    $cantidad = 0;
    if (!empty($id_producto)) {
        $sqlp = " and id_producto='" . $id_producto . "'";
    }

    $sqlordenc = mysqli_query($rjdhfbpqj, "SELECT * FROM $fromes Where id_producto!='0' and  numero!='0' and listo='1' $sqlp and fecha BETWEEN '$desde' AND '$hasta' ");
    $canverificafin = mysqli_num_rows($sqlordenc);
    while ($roworden = mysqli_fetch_array($sqlordenc)) {

        $id_productov =  $roworden['id_producto'];
        $presentacion = funcNombulto($rjdhfbpqj, $id_productov);

        if ($roworden['unidad'] != "Kg.") {
            $cantidad += $roworden['cantidad'] * $presentacion;
        } else {


            $cantidad += $roworden['cantidad'];
        }
    }
    $catru = number_format($cantidad, 0, ',', '.');
    $cantidadc = $catru . " Kg. - Productos " . $canverificafin;
    return  $cantidadc;
}
/* item ordenes */

function itemordenes($rjdhfbpqj, $desde, $hasta, $sector, $id_producto)
{
    if ($sector == '21') {
        $fromes = 'itemenvas';
    }
    if ($sector == '22') {
        $fromes = 'itemenvasa';
    }


    $CantKilos = 0;

    if (!empty($id_producto)) {
        $sqlp = " and id_producto='" . $id_producto . "'";
    }
    $sqlordenc = mysqli_query($rjdhfbpqj, "SELECT * FROM $fromes Where id_producto!='0' and listo='1' and  numero!='0' $sqlp and fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha,numero ASC");

    while ($roworden = mysqli_fetch_array($sqlordenc)) {
        $id = $roworden['id'];
        $horalisto = $roworden['hora'];
        $numero = $roworden['numero'];
        if ($horalisto > "00:00:00") {
            $horalisto = $roworden['hora'];
        } else {
            $horalisto =  "";
        }



        $id_producto = $roworden['id_producto'];
        $presentacion = funcNombulto($rjdhfbpqj, $id_producto);
        $CantKilos = ${"CantKilos" . $id};
        if ($roworden['unidad'] != "Kg.") {
            $CantKilos += $roworden['cantidad'] * $presentacion;
        } else {


            $CantKilos += $roworden['cantidad'];
        }

        $fecha = $roworden['fecha'];
        $nombrepro = funcNomProd($rjdhfbpqj, $id_producto);
        echo '

   <tr>
      <td>  ' . date('d/m/y', strtotime($fecha)) . '</td>
      <td>  ' . $horalisto . '</td>
      <td>' . $numero . '</td>
      <td>' . $nombrepro . '</td>
      <td><b>' . $CantKilos . '</b></td>
      </tr>';
    }
}


?>





<? if ($modulo == "1") { ?>

    <table>
        <tr>
            <th>Envasado Stock Planta Alta </th>
            <th>
                <?php
                $sectorb = '22';

                $totalproducb = totalproduciom($rjdhfbpqj, $desde, $hasta, $sectorb, $id_producto);
                echo '' . number_format($totalproducb, 0, ',', '.') . ' Kg.';


                ?></th>
            <th></th>
            <th></th>
        </tr>
    </table>
    <table>

        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Productos</th>
            <th>Kilos</th>
        </tr>
        <?php

        trkilos($rjdhfbpqj, $desde, $hasta, $sectorb, $id_producto);
        ?>

    </table>


<? } ?>

<? if ($modulo == "2") { ?>

    <table>
        <tr>
            <th>Envasado Stock Planta Baja </th>
            <th>
                <?php
                $sector = '21';

                $totalproduc = totalproduciom($rjdhfbpqj, $desde, $hasta, $sector, $id_producto);
                echo '' . number_format($totalproduc, 0, ',', '.') . ' Kg.';


                ?></th>
            <th></th>
            <th></th>
        </tr>
    </table>

    <table>

        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Productos</th>
            <th>Kilos</th>
        </tr>
        <?php

        trkilos($rjdhfbpqj, $desde, $hasta, $sector, $id_producto);
        ?>

    </table>




<? } ?>


<? if ($modulo == "3") { ?>
    <!-- envasado ordenes -->



    <table>
        <tr>
            <th>Envasado Ordenes Planta Alta</th>
            <th>
                <?php
                $sectorb = '22';

                $totalproducb = totalproduciomOrdenes($rjdhfbpqj, $desde, $hasta, $sectorb, $id_producto);
                echo '' . $totalproducb . '';


                ?></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </table>


    <table>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Nº Orden</th>
            <th>Productos</th>
            <th>Kilos</th>
        </tr>
        <?php

        itemordenes($rjdhfbpqj, $desde, $hasta, $sectorb, $id_producto);
        ?>

    </table>


<? } ?>
<? if ($modulo == "4") { ?>
    <table>
        <tr>
            <th>Envasado Ordenes Planta Baja</th>
            <th>
                <?php
                $sector = '21';

                $totalproduc = totalproduciomOrdenes($rjdhfbpqj, $desde, $hasta, $sector, $id_producto);
                echo '' . $totalproduc . '';

                ?></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </table>
    <table>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Nº Orden</th>
            <th>Productos</th>
            <th>Kilos</th>
        </tr>
        <?php

        itemordenes($rjdhfbpqj, $desde, $hasta, $sector, $id_producto);
        ?>

    </table>
<? } ?>