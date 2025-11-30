<?php include('../f54du60ig65.php');

$modobus = $_POST['modobus'];
$buscar = $_POST['buscar'];

date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME,"es_RA");
$fechahoyb = date("Y-m-d");

//update
$idcodw = $_POST["jfndhom"];
$idw = base64_decode($idcodw);
$costo = $_POST["costo"];
$costo = trim($costo);


$sqlprecioprodr=mysqli_query($rjdhfbpqj,"SELECT * FROM precioprod Where id_producto = '$idw'  ORDER BY `precioprod`.`fecha` DESC");
if ($rowprecioprod = mysqli_fetch_array($sqlprecioprodr)){
    $fecha = $rowprecioprod["fecha"];
    $idprofun = $rowprecioprod["id"];
    $costorigi = $rowprecioprod["costo"];

    //fech and diferent
    $id_producto = $rowprecioprod["id_producto"];
    $kilo = $rowprecioprod["kilo"];
    $cproveedor = $rowprecioprod["cproveedor"];
    //fin date
    //estract gain
    $gananciaa = $rowprecioprod["ganancia_a"];   
    $gananciab = $rowprecioprod["ganancia_b"];   
    $gananciac = $rowprecioprod["ganancia_c"];
    $tipo = $rowprecioprod["tipo"];
    $kilo = $rowprecioprod["kilo"];
    $costo_total=$costo + $cproveedor;
    $costoxcaja = $costo_total * $kilo;

    $costov = number_format($costo, 2, '.', '');

    $costo_totalv = number_format($costo_total, 2, '.', '');
    $costoxcajav = number_format($costoxcaja, 2, '.', '');

    //precio minorista
    if ($tipo == "0") {
        $precio_kiloa = $costo_total + $gananciaa;
    } else {
        $precio_kiloa =  $costo_total / 100 * $gananciaa + $costo_total;
    }
    $precio_cajaar = $precio_kiloa * $kilo;
    
    $precio_kiloav = number_format($precio_kiloa, 2, '.', '');
    $precio_cajaav = number_format($precio_cajaar, 2, '.', '');
   
        //precio mayorista
        if ($tipo == "0") {
            $precio_kilob = $costo_total + $gananciab;
        } else {
            $precio_kilob =  $costo_total / 100 * $gananciab + $costo_total;
        }
        $precio_cajabr = $precio_kilob * $kilo;
        
        $precio_kilobv = number_format($precio_kilob, 2, '.', '');
        $precio_cajabv = number_format($precio_cajabr, 2, '.', '');

        //precio distribuidor
        if ($tipo == "0") {
            $precio_kiloc = $costo_total + $gananciac;
        } else {
            $precio_kiloc =  $costo_total / 100 * $gananciac + $costo_total;
        }
        $precio_cajacr = $precio_kiloc * $kilo;
        
        $precio_kilocv = number_format($precio_kiloc, 2, '.', '');
        $precio_cajacv = number_format($precio_cajacr, 2, '.', '');
   
}




// actualizo precio


if (!empty($idprofun) && !empty($costov) && $costorigi != $costo) {

    if($fecha == $fechahoyb){ 
    $sqlprecioprod = "Update precioprod Set costo_total='$costo_totalv', costoxcaja='$costoxcajav', precio_kiloa='$precio_kiloav', precio_cajaa='$precio_cajaav', precio_kilob='$precio_kilobv', precio_cajab='$precio_cajabv',  precio_kiloc='$precio_kilocv', precio_cajac='$precio_cajacv', costo='$costov' Where id = '$idprofun'";
    mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));
    }else{
    $sqlprecioprodx = "INSERT INTO `precioprod` (id_producto, kilo, cproveedor, costo_total, costoxcaja, ganancia_a, precio_kiloa, precio_cajaa, ganancia_b, precio_kilob, precio_cajab, ganancia_c, precio_kiloc, precio_cajac, costo, fecha, tipo) VALUES ('$id_producto', '$kilo', '$cproveedor', '$costo_totalv', '$costoxcajav', '$gananciaa', '$precio_kiloav', '$precio_cajaav', '$gananciab', '$precio_kilobv', '$precio_cajabv', '$gananciac', '$precio_kilocv', '$precio_cajacv', '$costov', '$fechahoyb', '$tipo');";
    mysqli_query($rjdhfbpqj, $sqlprecioprodx) or die(mysqli_error($rjdhfbpqj));
    }
  //actualizo precios en los remitos
  include('../orden/actualizo_pre_remito.php');
}
//


?>
