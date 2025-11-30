<?php include('../f54du60ig65.php');
include('../listadeprecio/func_fechalista.php');
$idprodu = $_POST['idprodu'];
$cantidadds = $_POST['cantidad'];
$unidsx = $_POST['unidad'];
$tipocliente = $_POST['tipocliente'];
$fechaorden = $_POST['fechaorden'];

if (!empty($fechaorden)) {
    $fechalista = $_POST['fechaorden'];
} else {

    $fechalista = fechalista($rjdhfbpqj);
}


$sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idprodu' and fecha <='$fechalista' and cerrado = '1'  and confirmado = '1' ORDER BY fecha DESC, id DESC;");
if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
    $idcosto = $rowprecioprod["id"];

    $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idprodu'");
    if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
        $kilox = $rowpdaod['kilo'];
    }
    //$idcod = base64_encode($id);
    //$cproveedor = $rowprecioprod["cproveedor"];
    $id_producto = $rowprecioprod["id_producto"];
    $id_proveedor = $rowprecioprod["id_proveedor"];
    // $kilox = $rowprecioprod["kilo"];    
    $costoxcaj = $rowprecioprod["costoxcaj"];
    $costo = $rowprecioprod["costo"];
    $tipoprov = $rowprecioprod["tipoprov"];
    $cproveedor = $rowprecioprod["cproveedor"];
    $nref = $rowprecioprod["nref"];
    $fecven = $rowprecioprod["fecven"];
    $agrstock = $rowprecioprod["agrstock"];
    $tipo = $rowprecioprod["tipo"];
    $descuento = $rowprecioprod["descuento"];
    $pcondescu = $rowprecioprod["pcondescu"];
    $iibb_bsas = $rowprecioprod["iibb_bsas"];
    $iibb_caba = $rowprecioprod["iibb_caba"];
    $perc_iva = $rowprecioprod["perc_iva"];
    $iva = $rowprecioprod["iva"];
    $pbruto = $rowprecioprod["pbruto"];
    $desadi = $rowprecioprod["desadi"];
    $costo_total = $rowprecioprod["costo_total"];
    $costoxcaja = $rowprecioprod["costoxcaja"];


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
            $mkb = $mkb * $kilox;
        } else {
            $mkb = $rowprecioprod["mkb"];
        }
        if ($muc == '1') {
            $mkc = $mkc * $kilox;
        } else {
            $mkc = $rowprecioprod["mkc"];
        }
        if ($mud == '1') {
            $mkd = $mkd * $kilox;
        } else {
            $mkd = $rowprecioprod["mkd"];
        }
        if ($mue == '1') {
            $mke = $mke * $kilox;
        } else {
            $mke = $rowprecioprod["mke"];
        }


        if ($eub == '1') {
            $ekb = $ekb * $kilox;
        } else {
            $ekb = $rowprecioprod["ekb"];
        }
        if ($euc == '1') {
            $ekc = $ekc * $kilox;
        } else {
            $ekc = $rowprecioprod["ekc"];
        }
        if ($eud == '1') {
            $ekd = $ekd * $kilox;
        } else {
            $ekd = $rowprecioprod["ekd"];
        }
        if ($eue == '1') {
            $eke = $eke * $kilox;
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
        if ($cantidadds < $mkb) {
            if ($unidsx == "0") {
                $preciofin = $rowprecioprod["mpa"];
            } else {
                $preciofin = $rowprecioprod["mpa"] * $kilox;
            }
        } elseif ($cantidadds < $mkc && $omitempb != '1') {
            if ($unidsx == "0") {
                $preciofin = $rowprecioprod["mpb"];
            } else {
                $preciofin = $rowprecioprod["mpb"] * $kilox;
            }
        } elseif ($cantidadds < $mkd && $omitempc != '1') {
            if ($unidsx == "0") {
                $preciofin = $rowprecioprod["mpc"];
            } else {
                $preciofin = $rowprecioprod["mpc"] * $kilox;
            }
        } elseif ($cantidadds < $mke && $omitempd != '1') {
            if ($unidsx == "0") {
                $preciofin = $rowprecioprod["mpd"];
            } else {
                $preciofin = $rowprecioprod["mpd"] * $kilox;
            }
        } elseif ($cantidadds < $ekb && $omitempe != '1') {
            if ($unidsx == "0") {
                $preciofin = $rowprecioprod["mpe"];
            } else {
                $preciofin = $rowprecioprod["mpe"] * $kilox;
            }
        }

        //distri

        elseif ($cantidadds < $ekc && $omiteepb != '1') {
            if ($unidsx == "0") {
                $preciofin = $rowprecioprod["epb"];
            } else {
                $preciofin = $rowprecioprod["epb"] * $kilox;
            }
        } elseif ($cantidadds < $ekd && $omiteepc != '1') {
            if ($unidsx == "0") {
                $preciofin = $rowprecioprod["epc"];
            } else {
                $preciofin = $rowprecioprod["epc"] * $kilox;
            }
        } elseif ($cantidadds < $eke && $omiteepd != '1') {
            if ($unidsx == "0") {
                $preciofin = $rowprecioprod["epd"];
            } else {
                $preciofin = $rowprecioprod["epd"] * $kilox;
            }
        } elseif ($cantidadds >= $eke && $omiteepe != '1') {
            if ($unidsx == "0") {
                $preciofin = $rowprecioprod["epe"];
            } else {
                $preciofin = $rowprecioprod["epe"] * $kilox;
            }
        }
    }





    echo '' . $preciofin . '';
} else {
    echo '0';
}

mysqli_close($rjdhfbpqj);
