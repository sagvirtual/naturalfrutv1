<?php 


/* elimina los item y actualiza el stok */
function eliminaitemstok($rjdhfbpqj,$iditem,$idproduc,$idorden,$cantpro) {

    if(!empty($iditem)){



// Consulta para obtener el historial de la orden
$sqlHistorial = mysqli_query($rjdhfbpqj, "SELECT * FROM histostock WHERE id_producto = '$idproduc' AND id_orden = '$idorden'");

$historial = [];
while ($rowHistorial = mysqli_fetch_array($sqlHistorial)) {
    $historial[] = [
        'cantidad' => $rowHistorial['CantStock'],
        'vencimiento' => $rowHistorial['fecven']
    ];
}

// Función para revertir el stock
function revertirStock(&$stock, $historial) {
    foreach ($historial as $item) {
        $fecha = $item['vencimiento'];
        $cantidadARevertir = $item['cantidad'];

        // Buscar el lote correspondiente en el stock
        foreach ($stock as &$lote) {
            if ($lote['vencimiento'] === $fecha) {
                $lote['cantidad'] += $cantidadARevertir;
                break;
            }
        }
    }
}

// Consulta para obtener el stock del producto ordenado por fecha de vencimiento
$sqlesw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 WHERE id_producto = '$idproduc' ORDER BY fecven ASC");

$stock = [];
while ($rowsddk = mysqli_fetch_array($sqlesw)) {
    $stock[] = [
        'cantidad' => $rowsddk['CantStock'],
        'vencimiento' => $rowsddk['fecven']
    ];
}

// Revertir el stock
revertirStock($stock, $historial);

// Actualizar la base de datos con el nuevo stock
foreach ($stock as $lote) {
    $cantidadActualizada = $lote['cantidad'];
    $vencimiento = $lote['vencimiento'];
    $sql = "UPDATE stockhgz1 SET CantStock = '$cantidadActualizada' WHERE id_producto = '$idproduc' AND fecven = '$vencimiento'";
    mysqli_query($rjdhfbpqj, $sql);
}

// Eliminar el registro del historial
$sqlEliminarHistorial = "DELETE FROM histostock WHERE id_producto = '$idproduc' AND id_orden = '$idorden'";
mysqli_query($rjdhfbpqj, $sqlEliminarHistorial);





$sqlborr ="delete from item_credito Where id= '$iditem'";
mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));


if($cantpro=='1'){

$sqlborrd ="delete from nota_credito Where id= '$idorden'";
mysqli_query($rjdhfbpqj, $sqlborrd) or die(mysqli_error($rjdhfbpqj));

$sqlborrd ="delete from item_orden Where id_notacredito= '$idorden' and id_notacredito!='0' and modo='1'";
        mysqli_query($rjdhfbpqj, $sqlborrd) or die(mysqli_error($rjdhfbpqj));

echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../notasdecredito'");
echo ("</script>");

}


} 
 echo '       <script>
setTimeout(function(){
    location.reload();
}, 2000); </script>';
$cantprod=$cantpro+1;
echo '
 <div style="display: flex;justify-content: center;align-items: center;position: fixed;top: 0;left: 0;width: 100%;height: 100%;">
<div  class="alert alert-danger" role="alert"><strong>Emiminando '.$cantpro.' un momento por favor...</strong></div></div>';
mysqli_close($rjdhfbpqj);
}


function eliminarorden($idorden,$rjdhfbpqj) {

    include('../lusuarios/login.php');
/* while item orden para boorar */

$sqlorden = mysqli_query($rjdhfbpqj, "SELECT  e.id as iditem, e.id_orden,  e.nombre, e.modo, e.id_producto, u.col, u.id
FROM item_credito e 
INNER JOIN nota_credito u 
ON e.id_orden = u.id
Where e.id_orden = '$idorden' and e.modo='0' and u.col!='8'"); 
 $cantpro = mysqli_num_rows($sqlorden);
while ($roworden = mysqli_fetch_array($sqlorden)) {


$iditem = $roworden["iditem"];
$nombre = $roworden["nombre"];//
$idproduc = $roworden["id_producto"];

eliminaitemstok($rjdhfbpqj,$iditem,$idproduc,$idorden,$cantpro);


                    }
                   // mysqli_close($rjdhfbpqj);

                }


?>    