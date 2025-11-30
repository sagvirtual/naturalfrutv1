<?php include('../f54du60ig65.php');

include('../funciones/funcNombrcliente.php');

include('../nota_de_pedido/func_nombreunid.php');



function sabersifac($rjdhfbpqj, $id_producto)
{

    $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT id_producto,iva,modo FROM prodcom Where id_producto='$id_producto'");
    if ($rowordenx = mysqli_fetch_array($sqlordenx)) {
        //esta el producto
        $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT id_producto,iva,modo FROM prodcom Where id_producto='$id_producto' and modo='0'");
        if ($rowordenx = mysqli_fetch_array($sqlordenx)) {
            $modod = 0;
        }




        if ($modod == '0') {
            $facturadopro = 1;
        } elseif ($modod == '1') {
            $facturadopro = 2;
        }
    } else {
        $facturadopro = 3;
    }


    return $facturadopro;
}

$id_orden = $_POST['id_orden'];
$totalivas = $_POST['totalivas'];
$ivaporsen = $_POST['ivaporsen'];
$totalc = $_POST['totalc'];

/* function itemfac($rjdhfbpqj, $id_orden, $totalivas, $ivaporsen, $totalcon)
{
 */

echo '
    <table style="vertical-align: top; width:100%; font-size: 12px; id="itemfac">
    <tr style="vertical-align: middle;font-weight: bold;">
     <td style="text-align:center;"><strong>IdPro.</strong></td>
            <td><strong>Producto/s &nbsp;&nbsp; Pedido Nº' . $id_orden . '&nbsp;&nbsp; Monto $' . number_format($totalcon, 2, ',', '.') . '&nbsp;&nbsp;&nbsp;(IVA: %' . $totalivas . ', Percepción %' . $ivaporsen . ')</strong></td>
            <td style="width:50px; text-align:center;"><strong>Cant.</strong></td>
            <td style="width:50;text-align:center;"> <strong>Unid.</strong></td>
            <td style="width:70px;text-align:right;"><strong>Importe</strong></td>
            <td style="width:70px;text-align:center;"><strong>Total</strong></td>
            <td style="width:70px;text-align:center;"><strong>Fac.</strong></td>
     
        </tr>
    
  ';


$sqlorden = mysqli_query($rjdhfbpqj, "SELECT e.id_producto, e.id_categoria, e.modo, e.precio,  e.descuenun,  e.id_orden, e.agregado,  e.hora,  e.nombre,  e.kilos,  e.total,  e.tipounidad, u.id, u.nombre as nomcatego
    FROM item_orden e 
    INNER JOIN categorias u 
    ON e.id_categoria = u.id
    Where e.id_orden = '$id_orden' and e.modo='0' ORDER BY  nomcatego,e.nombre  ASC");


$cant = 0;
while ($roworden = mysqli_fetch_array($sqlorden)) {
    $tipounidad = $roworden['tipounidad'];
    $id_producto = $roworden['id_producto'];
    $sepeudefac = ${"sepeudefac " . $id_producto};
    $diddd = ${"diddd " . $id_producto};
    $colorfondo = ${"colorfondo " . $id_producto};

    $sepeudefac = sabersifac($rjdhfbpqj, $id_producto);
    $nombreunid = nombrunid($rjdhfbpqj, $id_producto);
    $nombrebult = nombrbult($rjdhfbpqj, $id_producto);
    $cantidadbiene = cantbult($rjdhfbpqj, $id_producto);

    if ($tipounidad == '0') {
        $seled0 =  $nombreunid;
        $comoviene = "";
    } else {
        $seled0 = $nombrebult;
        //$comoviene="- ".$nombrebult."&nbsp;x&nbsp;".$cantidadbiene."&nbsp;".$nombreunid;
        $comoviene = "";
    }






    $cant = $cant + 1;
    if ($cant % 2 == 0) {
        $colorfondo = "white";
    } else {
        $colorfondo = "#E2E2E2";
    }
    $preciounit = $roworden['precio'];
    $descunpre = $roworden['descuenun'];
    if ($descunpre != '0') {
        /*  ajax_parafacturar */

        $preciocdes = $roworden['total'] / $roworden['kilos'];
    } else {
        $preciocdes = '0';
    }
    $agregado = $roworden['agregado'];

    if ($sepeudefac == '1') {
        $diddd = 'SI';
        $colorfondo = '#9CFFA9';
    } elseif ($sepeudefac == '2') {
        $colorfondo = $colorfondo;
        $diddd = '';
    } elseif ($sepeudefac == '3') {
        $colorfondo = "orange";
        $diddd = 'S/Inf';
    }


    echo '
    <tr style="background-color: ' . $colorfondo . '; ">
    <td style="text-align:center;">' . $id_producto . ' </td>
    <td style="text-align:left;">' . $roworden['nombre'] . '' . $comoviene . ' </td>
    <td style="width:50px;text-align:center;padding-top: 5px; ">' . $roworden['kilos'] . '</td>
    <td style="width:50px;text-align:center;padding-top: 5px; ">' . $seled0 . '</td>
    <td style="width:70px;text-align:right;padding-right: 5px; padding-top: 5px; ">$' . number_format($roworden['precio'], 0, ',', '.') . '</td>
    <td style="width:70px; text-align:right;padding-top: 5px; padding-right: 5px;">$' . number_format($roworden['total'], 0, ',', '.') . '</td>
    <td style="width:70px; text-align:center;">' . $diddd . '</td>
    </tr>
 
    
    ';
}

echo '   </table>';
//}


//itemfac($rjdhfbpqj, $id_orden, $totalivas, $ivaporsen, $totalc);
