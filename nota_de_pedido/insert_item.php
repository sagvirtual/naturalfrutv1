<?php include('../f54du60ig65.php');
include('func_descuentastock.php');
include('../control_stock/funcionStockSnot.php');
include('func_nombreunid.php');
include('funcVerificaIns.php'); //verifico que sea correcto lo que inserta
include('../lusuarios/login.php');
include('../funciones/func_actividad.php');
$id_cliente = $_POST['id_cliente'];
$fechaorden = $_POST['fechaordn'];
$horaord = $_POST['horaord'];
$id_ordenedit = $_POST['id_ordenedit'];
//$presentacion=$_POST['presentacion'];
$presentacion = $_POST['presentacion'];

//$producto=$_POST['producto'];
$idproduc = $_POST['idproduc'];
$cantidad = $_POST['cantidad'];
$unidad = $_POST['unidad'];



$producto = nombrbultnota($rjdhfbpqj, $idproduc, $unidad);

$descuenun = $_POST['descuenun'];
$improteun = $_POST['improteun'];
$importtot = $_POST['importtot'];

$id_categoria = $_POST['id_categoria'];
$id_marca = $_POST['id_marca'];

$sqlorxdona = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id ='$id_cliente'");
if ($rowordona = mysqli_fetch_array($sqlorxdona)) {
    $pickingcli = $rowordona["picking"];
}


//extrao verificacion
$resultaver = func_VeriInsert($rjdhfbpqj, $fechaorden, $idproduc, $cantidad, $unidad, $descuenun, $presentacion, $improteun, $importtot, $iditem);
if ($resultaver == '1') { //si escorrecto inserta if('1'=='1')

    /* zona */
    if ($descuenun == '0' && $importtot == '0') {
    } else {
        $sqlorxona = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id ='$id_cliente'");
        if ($roworzona = mysqli_fetch_array($sqlorxona)) {
            $zona = $roworzona['zona'];
        }

        $sqlorxona = mysqli_query($rjdhfbpqj, "SELECT * FROM zona Where id = '$zona'");
        if ($roworzona = mysqli_fetch_array($sqlorxona)) {
            $poszona = $roworzona['position'];
        }


        if ($id_ordenedit == 'dsds' || $id_ordenedit == '') {
            $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente = '$id_cliente' and finalizada='0' and fin='1'");
            if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

                $idzona = $rowordenx['zona'];
                $id_orden = $rowordenx['id'];
                $colorden = $rowordenx['col'];
                if ($colorden > '2') {
                    $agregado = '1';
                } else {
                    $agregado = '0';
                }

                /* udate dzona */
            } else {



                $timean = substr(microtime(), 2, 3) . date("His");
                $fechaan = date("dmy");
                $anclaje = $timean . $fechaan . $id_usuarioclav . $id_usuarioclav;

                $horas = date("H:i");
                if ($colorden != '8') {
                    $fechhoras = "Agregado día " . date("d") . " a las " . date("H:i") . "hs.";
                } else {
                    $fechhoras = "Agregado en CONCRETADO día " . date("d") . " a las " . date("H:i") . "hs.";
                }
                //$fechhoras = "Producto Agregado día ".date("d")." ".date("H:i")."hs.";


                if ($id_cliente > '0' && $id_cliente != '') {
                    $sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$id_cliente' and facturado='1'");
                    if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

                        $facturado = $rowclientes["facturado"];
                        $ivaporsen = $rowclientes["iva_por"];
                        $perporsen = $rowclientes["persep_por"];
                    } else {
                        $ivaporsen = 0;
                        $perporsen = 0;
                    }

                    $sqlorden = "INSERT INTO `orden` (id_cliente, fecha, hora, anclaje, fin, zona, poszona, responsable,idcuenta,ivaporsen,perporsen,id_usuarioclav) VALUES ('$id_cliente', '$fechaorden', '$horaord', '$anclaje', '1', '$zona', '$poszona', '$id_usuarioclav','$idcuenta','$ivaporsen','$perporsen','$pickingcli');";
                    mysqli_query($rjdhfbpqj, $sqlorden) or die(mysqli_error($rjdhfbpqj));
                }
                $sqlordenty = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where anclaje = '$anclaje' and id_cliente = '$id_cliente' and fin='1'");
                if ($roworden = mysqli_fetch_array($sqlordenty)) {


                    $id_orden = $roworden['id'];
                }
            }
        } else {
            $id_orden = $_POST['id_ordenedit'];

            $sqlo3x = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id = '$id_orden' and finalizada='1' and fin='1' and col >'2'");
            if ($rowordenx = mysqli_fetch_array($sqlo3x)) {
                $agregado = '1';
                $origen = "Agregado Producto";
                FuncActividad($rjdhfbpqj, $id_orden, $id_cliente, $idproduc, $origen, $id_usuarioclav);
            } else {
                $agregado = '0';
            }

            // if( $idzona!=$zona){
            $sqlclied = "Update orden Set zona='$zona', poszona='$poszona' Where id = '$id_orden'";
            mysqli_query($rjdhfbpqj, $sqlclied) or die(mysqli_error($rjdhfbpqj));
            //  }

        }
        if (!empty($id_cliente) && !empty($producto) && !empty($cantidad) && !empty($id_orden)) {

            $sqlorit = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$id_orden' and id_producto='$idproduc' and modo='0'");
            if ($roworitnx = mysqli_fetch_array($sqlorit)) {

                //echo 'El producto ya fue cargado<br><br>';

            } else {
                $stockdispom = SumaStock($rjdhfbpqj, $idproduc);
                if ($cantidad <= $stockdispom) {
                    if ($unidad == "0") {
                        $cantidadfinal = $cantidad;
                    } else {

                        $cantidbiene = cantbult($rjdhfbpqj, $idproduc);

                        $cantidadfinal = $cantidad * $cantidbiene;
                    }


                    /* descuenta stock */
                    $fechavenprx = ActualizaStock($rjdhfbpqj, $idproduc, $cantidadfinal, $id_orden);

                    $sqlo2nx = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id = '$id_orden'");
                    if ($rowordx = mysqli_fetch_array($sqlo2nx)) {
                        $coldden = $rowordx['col'];
                    }
                    if ($coldden > '1' && $coldden < '8') {
                        $fechhoras = "Agregado día " . date("d") . " a las " . date("H:i") . "hs.";

                        /* $sqlclied = "Update orden Set picking='0', forzado='2',col='3' Where id = '$id_orden'";
        mysqli_query($rjdhfbpqj, $sqlclied) or die(mysqli_error($rjdhfbpqj)); */
                    } else {
                        if ($coldden == '8') {
                            $fechhoras = "Agregado en CONCRETADO día " . date("d") . " a las " . date("H:i") . "hs.";
                            $refve = '1';
                        }
                    }
                    if ($importtot <= 0 && $descuenun <= 0) {
                        $nocarga = '1';
                    } else {
                        $nocarga = '3';
                    }


                    if ($id_cliente != '1' && $nocarga == '3') {
                        $sqlitem_ordeni = "INSERT INTO `item_orden` (id_cliente, id_orden, fecha, id_producto, kilos, tipounidad, nombre, descuenun, precio, total, fin, agregado, hora, id_categoria, id_marca,responsable,presentacion,stock) VALUES ('$id_cliente', '$id_orden', '$fechaorden', '$idproduc', '$cantidad', '$unidad', '$producto', '$descuenun', '$improteun', '$importtot', '1', '$agregado', '$fechhoras', '$id_categoria', '$id_marca', '$id_usuarioclav', '$presentacion', '$stockdispom');";
                        mysqli_query($rjdhfbpqj, $sqlitem_ordeni) or die(mysqli_error($rjdhfbpqj));
                    }
                } else {
                    $noser = '&error=1';
                }
            }
            /*     echo"
    <script>
    document.getElementById('producto').focus();
location.reload();
</script>
"; */
        } else {
            echo 'Coloque cantidades<br><br>';
        }

        /*  echo '

$id_cliente = '. $id_cliente.'<br>
$fechaorden = '. $fechaorden.'<br>
$horaord = '. $horaord.'<br>

$id_orden = '. $id_orden.'<br>

$producto='. $_POST['producto'].'<br>
$idproduc='. $_POST['idproduc'].'<br>
$cantidad='. $_POST['cantidad'].'<br>
$unidad='. $_POST['unidad'].'<br>
$descuenun='. $_POST['descuenun'].'<br>
$improteun='. $_POST['improteun'].'<br>
$importtot='. $_POST['importtot'].'

$importtot='. $_POST['importtot'].'

';  */
        $id_clientecod = base64_encode($id_cliente);
        $id_ordencod = base64_encode($id_orden);
    }



    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='index.php?jhduskdsa=$id_clientecod$noser&orjndty=$id_ordencod&ref=$refve&estatus=$resultaver'");
    echo ("</script>");
} else {
    $id_clientecod = base64_encode($id_cliente);
    $id_ordencod = base64_encode($id_orden);
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='index.php?jhduskdsa=$id_clientecod$noser&orjndty=$id_ordencod&ref=$refve&estatus=$resultaver'");
    echo ("</script>");
}
