<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../listadeprecio/func_fechalista.php');
//desceunto stock

function descontarStock(&$stock, $cantidad, $rjdhfbpqj, $idproduc, $id_orden)
{
    foreach ($stock as &$lote) {
        if ($cantidad <= 0) {
            break;
        }

        $cantidadOriginal = $lote['cantidad'];
        $cantidadDescontada = 0;

        if ($lote['cantidad'] >= $cantidad) {
            $cantidadDescontada = $cantidad;
            $lote['cantidad'] -= $cantidad;
            $cantidad = 0;
        } else {
            $cantidadDescontada = $lote['cantidad'];
            $cantidad -= $lote['cantidad'];
            $lote['cantidad'] = 0;
        }

        $sqlh = "SELECT * FROM histostock WHERE id_producto = '$idproduc' AND fecven = '{$lote['vencimiento']}' and id_orden='$id_orden'";
        $result = mysqli_query($rjdhfbpqj, $sqlh);
        if (mysqli_num_rows($result) > 0) {
            if ($cantidadDescontada > 0) {
                $sqlh = "UPDATE histostock SET CantStock = '$cantidadDescontada' WHERE id_producto = '$idproduc' AND fecven = '{$lote['vencimiento']}' and id_orden='$id_orden'";
                mysqli_query($rjdhfbpqj, $sqlh);
            } else {
                $sqlborr = "DELETE FROM histostock WHERE id_producto = '$idproduc' AND fecven = '{$lote['vencimiento']}' and id_orden='$id_orden'";
                mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
            }
        } else {
            if ($cantidadDescontada > 0) {
                $sqlh = "INSERT INTO histostock (id_producto, CantStock, fecven, id_orden) VALUES ('$idproduc', '$cantidadDescontada', '{$lote['vencimiento']}', '$id_orden')";
                mysqli_query($rjdhfbpqj, $sqlh);
            }
        }
    }
    return $cantidad;
}

function ActualizaStock($rjdhfbpqj, $idproduc, $cantidad, $id_orden)
{
    $sqlesw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 WHERE id_producto = '$idproduc'  ORDER BY fecven ASC");

    $stock = [];
    while ($rowsddk = mysqli_fetch_array($sqlesw)) {
        $stock[] = [
            'cantidad' => $rowsddk['CantStock'],
            'vencimiento' => $rowsddk['fecven']
        ];
    }

    $restante = descontarStock($stock, $cantidad, $rjdhfbpqj, $idproduc, $id_orden);

    foreach ($stock as $lote) {
        $cantidadActualizada = $lote['cantidad'];
        $vencimiento = $lote['vencimiento'];
        $sql = "UPDATE stockhgz1 SET CantStock = '$cantidadActualizada' WHERE id_producto = '$idproduc' AND fecven = '$vencimiento'";
        mysqli_query($rjdhfbpqj, $sql);
    }
}


//

include('../funciones/funcHojaRuta.php');
$id_clientecod = 0;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// paso la bariables
$id_ordenc = $_POST['id_orden'];
$id_clientecodi = $_POST['id_clientecodi'];
$responsable = $_POST['responsable'];

$id_orden = base64_decode($id_ordenc);
$id_clienteal = base64_decode($id_clientecodi);


date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME, "es_RA");
$fechare = date("Y-m-d");

$fechare = new DateTime();
$diaHoy = $fechare->format('w');


$sqlde = mysqli_query($rjdhfbpqj, "SELECT id,col,responsable FROM orden Where id='$id_orden' and col='1' and responsable='99999'");
if ($rowiord = mysqli_fetch_array($sqlde)) {


    function SumaStockunid($rjdhfbpqj, $idproduc)
    {
        $CantStocktotal = 0;
        $sqlsw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1  Where id_producto = '$idproduc' and CantStock > 0");
        while ($rowsdk = mysqli_fetch_array($sqlsw)) {
            $CantStocktotal += $rowsdk['CantStock'];
        }
        return $CantStocktotal;
    }

    function SumaItems($rjdhfbpqj, $id_orden)
    {
        $totalitem = 0;
        $sqlitem = mysqli_query($rjdhfbpqj, "SELECT id_orden,total FROM item_orden Where id_orden = '$id_orden'");
        while ($rowitem = mysqli_fetch_array($sqlitem)) {
            $totalitem += $rowitem['total'];
        }
        return $totalitem;
    }

    function faltantes($rjdhfbpqj, $idproduc, $id_orden, $id_clienteal, $tipounidad, $cantidad, $fechahoy)
    {
        $sql = mysqli_query($rjdhfbpqj, "SELECT * FROM faltantes WHERE id_producto = '$idproduc' AND id_orden='$id_orden'");
        if (mysqli_fetch_array($sql)) {
            // Ya existe el registro, no hago nada
            return true; // Como ya existe, consideramos que está "insertado"
        } else {
            if ($id_orden > 0 && $id_clienteal > 0 && $idproduc > 0) {
                $sqlins = "INSERT INTO `faltantes` (id_producto, id_orden, id_cliente,tipounidad,cantidad,fecha) VALUES ('$idproduc', '$id_orden', '$id_clienteal', '$tipounidad', '$cantidad','$fechahoy')";
                $resultado = mysqli_query($rjdhfbpqj, $sqlins);
                if (!$resultado) {
                    // Falló la inserción
                    error_log("Error al insertar en faltantes: " . mysqli_error($rjdhfbpqj));
                    return false;
                }
                return true; // Inserción exitosa
            }
        }
        return false;
    }

    function revisoitemhay($rjdhfbpqj, $id_orden, $id_clienteal)
    {

        $sqlitem = mysqli_query($rjdhfbpqj, "SELECT id,id_orden,id_cliente FROM item_orden Where id_orden = '$id_orden' and id_cliente='$id_clienteal'");
        if (mysqli_fetch_array($sqlitem)) {
            return true;
        } else {
            return false;
        }
    }


    // verificar precios



    function func_VeriInsert($rjdhfbpqj, $id_orden, $iditem, $id_clienteal, $idproduc, $cantidad, $tipounidad, $descuenun, $presentacion, $precio)
    {

        $preciofin = 0;
        $omitempc = 0;
        $omiteepc = 0;
        $omitempd = 0;
        $cantidaddec = $cantidad;
        $omitempb = 0;

        if ($tipounidad != '0') {
            $cantidad = $cantidad * $presentacion;
            $precio = number_format($precio, 0, '.', '') . ".00";
        }

        $fechalista = fechalista($rjdhfbpqj);



        $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idproduc' and fecha <='$fechalista' and cerrado = '1'  and confirmado = '1' ORDER BY fecha DESC, id DESC;");
        if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
            $costo_total = $rowprecioprod["costo_total"];



            if ($costo_total < $rowprecioprod["mpa"]) {
                $mua = $rowprecioprod["mua"];
                $mub = $rowprecioprod["mub"];
                $muc = $rowprecioprod["muc"];
                $mud = $rowprecioprod["mud"];
                $mue = $rowprecioprod["mue"];

                $eub = $rowprecioprod["eub"];
                $euc = $rowprecioprod["euc"];
                $eud = $rowprecioprod["eud"];
                $eue = $rowprecioprod["eue"];

                $mka = $rowprecioprod["mka"];
                $mkb = $rowprecioprod["mkb"];
                $mkc = $rowprecioprod["mkc"];
                $mkd = $rowprecioprod["mkd"];
                $mke = $rowprecioprod["mke"];

                $ekb = $rowprecioprod["ekb"];
                $ekc = $rowprecioprod["ekc"];
                $ekd = $rowprecioprod["ekd"];
                $eke = $rowprecioprod["eke"];


                if ($mub == '1') {
                    $mkb = $mkb * $presentacion;
                } else {
                    $mkb = $rowprecioprod["mkb"];
                }
                if ($muc == '1') {
                    $mkc = $mkc * $presentacion;
                } else {
                    $mkc = $rowprecioprod["mkc"];
                }
                if ($mud == '1') {
                    $mkd = $mkd * $presentacion;
                } else {
                    $mkd = $rowprecioprod["mkd"];
                }
                if ($mue == '1') {
                    $mke = $mke * $presentacion;
                } else {
                    $mke = $rowprecioprod["mke"];
                }


                if ($eub == '1') {
                    $ekb = $ekb * $presentacion;
                } else {
                    $ekb = $rowprecioprod["ekb"];
                }
                if ($euc == '1') {
                    $ekc = $ekc * $presentacion;
                } else {
                    $ekc = $rowprecioprod["ekc"];
                }
                if ($eud == '1') {
                    $ekd = $ekd * $presentacion;
                } else {
                    $ekd = $rowprecioprod["ekd"];
                }
                if ($eue == '1') {
                    $eke = $eke * $presentacion;
                } else {
                    $eke = $rowprecioprod["eke"];
                }

                if ($rowprecioprod["mpb"] == '0') {
                    $omitempb = '1';
                    $mkb = '999999999999';
                }
                if ($rowprecioprod["mpc"] == '0') {
                    $omitempc = '1';
                    $mkc = '999999999999';
                }
                if ($rowprecioprod["mpd"] == '0') {
                    $omitempd = '1';
                    $mkd = '999999999999';
                }
                if ($rowprecioprod["mpe"] == '0') {
                    $omitempe = '1';
                    $mke = '999999999999';
                }

                if ($rowprecioprod["epb"] == '0') {
                    $omiteepb = '1';
                    $ekb = '999999999999';
                }
                if ($rowprecioprod["epc"] == '0') {
                    $omiteepc = '1';
                    $ekc = '999999999999';
                }
                if ($rowprecioprod["epd"] == '0') {
                    $omiteepd = '1';
                    $ekd = '999999999999';
                }
                if ($rowprecioprod["epe"] == '0') {
                    $omiteepe = '1';
                    $eke = '999999999999';
                }



                /* cuando es menor al B */
                if ($cantidad < $mkb) {
                    $preciofin = $rowprecioprod["mpa"];
                } elseif ($cantidad < $mkc && $omitempb != '1') {
                    if ($tipounidad == "0") {
                        $preciofin = $rowprecioprod["mpb"];
                    } else {
                        $preciofin = $rowprecioprod["mpb"] * $presentacion;
                    }
                } elseif ($cantidad < $mkd && $omitempc != '1') {
                    if ($tipounidad == "0") {
                        $preciofin = $rowprecioprod["mpc"];
                    } else {
                        $preciofin = $rowprecioprod["mpc"] * $presentacion;
                    }
                } elseif ($cantidad < $mke && $omitempd != '1') {
                    if ($tipounidad == "0") {
                        $preciofin = $rowprecioprod["mpd"];
                    } else {
                        $preciofin = $rowprecioprod["mpd"] * $presentacion;
                    }
                } elseif ($cantidad < $ekb && $omitempe != '1') {
                    if ($tipounidad == "0") {
                        $preciofin = $rowprecioprod["mpe"];
                    } else {
                        $preciofin = $rowprecioprod["mpe"] * $presentacion;
                    }
                } elseif ($cantidad < $ekc && $omiteepb != '1') {
                    if ($tipounidad == "0") {
                        $preciofin = $rowprecioprod["epb"];
                    } else {
                        $preciofin = $rowprecioprod["epb"] * $presentacion;
                    }
                } elseif ($cantidad < $ekd && $omiteepc != '1') {
                    if ($tipounidad == "0") {
                        $preciofin = $rowprecioprod["epc"];
                    } else {
                        $preciofin = $rowprecioprod["epc"] * $presentacion;
                    }
                } elseif ($cantidad < $eke && $omiteepd != '1') {
                    if ($tipounidad == "0") {
                        $preciofin = $rowprecioprod["epd"];
                    } else {
                        $preciofin = $rowprecioprod["epd"] * $presentacion;
                    }
                } elseif ($cantidad >= $eke && $omiteepe != '1') {
                    if ($tipounidad == "0") {
                        $preciofin = $rowprecioprod["epe"];
                    } else {
                        $preciofin = $rowprecioprod["epe"] * $presentacion;
                    }
                }
            }
        }


        $preciofin = number_format($preciofin, 0, '.', '') . ".00";

        //comparo totales Pasas
        if ($preciofin == $precio) {
            $result = "OK "; //correcto


        } else {

            //ago una correccion del precio
            if ($descuenun != '0.00000') {

                $precioporce = $preciofin * (1 - ($descuenun / 100));
                $precioFinalv = $precioporce * $cantidaddec;
                $precioFinal = number_format($precioFinalv, 0, '.', '') . ".00";
            } else {
                $precioFinalv = $preciofin * $cantidaddec;
                $precioFinal = number_format($precioFinalv, 0, '.', '') . ".00";
            }

            if ($precioFinal > 0 && $iditem > 0 && $id_orden > 0 && $id_clienteal > 0) {
                $sqlclientes = "Update item_orden Set  precio='$preciofin', total='$precioFinal' Where id = '$iditem' and id_orden = '$id_orden' and id_cliente='$id_clienteal'";
                mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
                $result = " Actualizado";
            }
        } //incorrecto

        return $result;
    }

    function caltotalven_php($iva, $percepcion, $totalitem, $deuda_anterior)
    {
        // Inicializar valores como float
        $valoiva = floatval($iva);
        $valdvp = floatval($percepcion);
        $totalventasd = floatval($totalitem);
        $anterior = floatval($deuda_anterior);



        // PERCEPCIÓN
        $perporsd = 0;
        if ($valdvp > 0 && $totalventasd > 0) {
            $perporsd = ($valdvp / 100) * $totalventasd;
        }

        $perporsd = round($perporsd);

        // IVA
        $ivaporsd = 0;
        $ivapovar = $totalventasd + $perporsd;
        if ($valoiva > 0 && $totalventasd > 0) {
            $ivaporsd = ($valoiva / 100) * $totalventasd;
        }

        $ivaporsd = round($ivaporsd);

        // SALDO FINAL
        $totalventa = $totalventasd + $ivaporsd + $perporsd;
        $saldofinal = $totalventasd + $ivaporsd + $perporsd + $anterior;


        $saldofinal = round($saldofinal);

        return [
            'totalpersep' => $perporsd,
            'totalivas' => $ivaporsd,
            'totalventa' => $totalventa,
            'saldo' => $saldofinal
        ];
    }






    // SCRIPT PRINCIPAL
    $sqlitem = mysqli_query($rjdhfbpqj, "SELECT id,id_orden,id_cliente,id_producto,nombre,tipounidad,kilos,descuenun,precio,total,presentacion FROM item_orden Where id_orden = '$id_orden'");
    while ($rowitem = mysqli_fetch_array($sqlitem)) {
        $iditem = $rowitem['id'];
        $nombre = $rowitem['nombre'];
        $idproduc = $rowitem['id_producto'];
        $tipounidad = $rowitem['tipounidad'];
        $presentacion = $rowitem['presentacion'];
        $precio = $rowitem['precio'];
        $cantidad = $rowitem['kilos'];
        $descuenun = $rowitem['descuenun'];
        if ($tipounidad == '0') {
            $kilos = $rowitem['kilos'];
        } elseif ($tipounidad == '1') {
            $kilos = $rowitem['kilos'] * $presentacion;
        }
        $cantidadstock = SumaStockunid($rjdhfbpqj, $idproduc);

        if ($kilos <= $cantidadstock) { //ES CUANDO HAY  STOCK
            // echo 'hay stock<br>';
            //reviso precios con el verificados de precio si el precio es el mismo no ago nada

            $resulveri = func_VeriInsert($rjdhfbpqj, $id_orden, $iditem, $id_clienteal, $idproduc, $cantidad, $tipounidad, $descuenun, $presentacion, $precio);
            // echo 'verficacio= ' . $resulveri . '<br>';
            //si el precio vario actualizo la cuendo mirando si el producto tiene descuento

            /* descuenta stock */
            ActualizaStock($rjdhfbpqj, $idproduc, $kilos, $id_orden);
            $stockdato = $cantidadstock - $kilos;
            $sqlcliens = "Update item_orden Set stock='$stockdato' Where id = '$iditem' and id_orden = '$id_orden' and id_cliente='$id_clienteal'";
            mysqli_query($rjdhfbpqj, $sqlcliens) or die(mysqli_error($rjdhfbpqj));
        } else { //ES CUANDO NO HAY EL PRODUCTO STOCK
            //echo 'No hay stock<br>';
            // Intentar insertar en faltantes
            if (faltantes($rjdhfbpqj, $idproduc, $id_orden, $id_clienteal, $tipounidad, $cantidad, $fechahoy)) {
                // Solo eliminar del pedido si se insertó correctamente
                if ($id_clienteal > 0 && $iditem > 0) {
                    $sqlborr = "DELETE FROM item_orden WHERE id = '$iditem' AND id_cliente = '$id_clienteal' and id_producto=' $idproduc'";
                    mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
                }
            }
        }
    }

    // ESTA ES LA PARTE DEL SALDO DE LA ORDEN GENERAL

    //compara para saber si cambio el saldo total
    $totalitem = SumaItems($rjdhfbpqj, $id_orden);
    $sqliord = mysqli_query($rjdhfbpqj, "SELECT id,subtotal,anterior,uniddesc,perporsen,ivaporsen FROM orden Where id='$id_orden' and subtotal!='$totalitem'");
    if ($rowiord = mysqli_fetch_array($sqliord)) {
        $deuda_anterior = $rowiord['anterior'];
        $percepcion = $rowiord['perporsen'];
        $iva = $rowiord['ivaporsen'];
        //actualizo los totales
        // echo '<br><br><br>total general es distinto figura ' . $rowiord['subtotal'] . ' - ' . $totalitem . ' ';



        $resultado = caltotalven_php($iva, $percepcion, $totalitem, $deuda_anterior);



        $totalper = $resultado['totalpersep'];
        $totalivas = $resultado['totalivas'];
        $total = $resultado['totalventa'];
        $saldo = $resultado['saldo'];

        // Mostrar los valores 998762 39950 104870 1143582
        /*     echo "<br><br><br>Suma Compra: " . $totalitem . "<br><br>";
        echo "Percepciones: " . $totalper . "<br>";
        echo "IVA: " . $totalivas . "<br>";
        echo "Total con IMpuestos: " . $total . "<br>";
        echo "Saldo final: " . $saldo . "<br><br>"; */

        if ($id_orden > 0) {
            $sqlclientes = "Update orden Set  subtotal='$totalitem', totalper='$totalper', totalivas='$totalivas', total='$total', saldo='$saldo' Where id = '$id_orden' and id_cliente = '$id_clienteal' and responsable='99999' and col !='8'";
            mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
            // echo '<br><br><br>se actualizo el total';
        }
    } else { //esta todo ok
        // echo '<br><br><br>Los totales esta ok';
    }
    // borro si no hay item en la orden
    if (!revisoitemhay($rjdhfbpqj, $id_orden, $id_clienteal)) {
        if ($id_clienteal > 0 && $id_orden > 0) {
            $sqlborr = "DELETE FROM orden WHERE id = '$id_orden' AND id_cliente = '$id_clienteal' and responsable='99999' and col !='8'";
            mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));

            echo '<p style="color:red;position:relative;top:6px;">Sin Items</p>';
        }
    } else {



        //pongo en la hoja de ruta
        $sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$id_clienteal'");
        if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

            $id_camionetacli = $rowclientes['camioneta'];
            $dia_repart1 = $rowclientes['dia_repart1'];
            $dia_repart2 = $rowclientes['dia_repart2'];
            $dia_repart3 = $rowclientes['dia_repart3'];
            $dia_repart4 = $rowclientes['dia_repart4'];
            $dia_repart5 = $rowclientes['dia_repart5'];
            $dia_repart6 = $rowclientes['dia_repart6'];
            $dia_repart0 = $rowclientes['dia_repart0'];
            $retira = $rowclientes['retira'];

            if ($dia_repart1 == '1' && $diaHoy <= 1) {
                $diaCliente = 1;
                $position = $rowclientes['position1'];
            } elseif ($dia_repart2 == '1' && $diaHoy <= 2) {
                $diaCliente = 2;
                $position = $rowclientes['position2'];
            } elseif ($dia_repart3 == '1' && $diaHoy <= 3) {
                $diaCliente = 3;
                $position = $rowclientes['position3'];
            } elseif ($dia_repart4 == '1' && $diaHoy <= 4) {
                $diaCliente = 4;
                $position = $rowclientes['position4'];
            } elseif ($dia_repart5 == '1' && $diaHoy <= 5) {
                $diaCliente = 5;
                $position = $rowclientes['position5'];
            } elseif ($dia_repart6 == '1' && $diaHoy <= 6) {
                $diaCliente = 6;
                $position = $rowclientes['position6'];
            } elseif ($dia_repart0 == '1' && $diaHoy <= 0) {
                $diaCliente = 0;
                $position = $rowclientes['position0'];
            } elseif ($dia_repart1 == '1') {
                $diaCliente = 1;
                $position = $rowclientes['position1'];
            } elseif ($dia_repart2 == '1') {
                $diaCliente = 2;
                $position = $rowclientes['position2'];
            } elseif ($dia_repart3 == '1') {
                $diaCliente = 3;
                $position = $rowclientes['position3'];
            } elseif ($dia_repart4 == '1') {
                $diaCliente = 4;
                $position = $rowclientes['position4'];
            } elseif ($dia_repart5 == '1') {
                $diaCliente = 5;
                $position = $rowclientes['position5'];
            } elseif ($dia_repart6 == '1') {
                $diaCliente = 6;
                $position = $rowclientes['position6'];
            } elseif ($dia_repart0 == '1') {
                $diaCliente = 0;
                $position = $rowclientes['position0'];
            }


            /* fice la fecha para crear la hoja de ruta */
            if ($diaCliente > 0) {
                $diaClienter = obtenerFechaMasCercana($diaCliente);

                HojaRuta($rjdhfbpqj, $diaClienter, $id_camionetacli, $id_orden, $position, $retira);
            }
        }
        $sqlordens = "Update orden Set  col='2' Where id = '$id_orden' and id_cliente = '$id_clienteal' and responsable='99999' and col !='8'";
        mysqli_query($rjdhfbpqj, $sqlordens) or die(mysqli_error($rjdhfbpqj));

        echo '<p style="color:red;position:relative;top:6px;">!Confirmado</p>';
    }
} else {

    //vuelvo porque no era cliente que cargo
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='../notadepedido?error=834723'");
    echo ("</script>");
}
