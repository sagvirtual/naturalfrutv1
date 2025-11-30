<?php
include('../listadeprecio/func_fechalista.php');


function func_VeriInsert($rjdhfbpqj, $fechaorden, $idprodu, $cantidadds, $unidsx, $descuenun, $presentacion, $improteun, $importtot, $iditem)
{

    //$fechaorden='2024-09-30';
    //$fechaorden='2025-03-24';
    /*  $omitempb = $omitempc = $omitempd = $omitempe = '0';
    $omiteepb = $omiteepc = $omiteepd = $omiteepe = '0'; */
    $preciofin = 0;
    $totalres = 0;

    if ($unidsx == '0') {
        $cantidadds = $cantidadds;
    } else {
        $cantidadds = $cantidadds * $presentacion;
    }


    if (!empty($fechaorden) && !empty($iditem)) {
        $fechalista = $fechaorden;
    } else {

        $fechalista = fechalista($rjdhfbpqj);
    }


    $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idprodu' and fecha <='$fechalista' and cerrado = '1'  and confirmado = '1' ORDER BY fecha DESC, id DESC;");
    if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
        $idcosto = $rowprecioprod["id"];
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
            if ($cantidadds < $mkb) {
                $preciofin = $rowprecioprod["mpa"];
            } elseif ($cantidadds < $mkc && $omitempb != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["mpb"];
                } else {
                    $preciofin = $rowprecioprod["mpb"] * $presentacion;
                }
            } elseif ($cantidadds < $mkd && $omitempc != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["mpc"];
                } else {
                    $preciofin = $rowprecioprod["mpc"] * $presentacion;
                }
            } elseif ($cantidadds < $mke && $omitempd != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["mpd"];
                } else {
                    $preciofin = $rowprecioprod["mpd"] * $presentacion;
                }
            } elseif ($cantidadds < $ekb && $omitempe != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["mpe"];
                } else {
                    $preciofin = $rowprecioprod["mpe"] * $presentacion;
                }
            }

            //distri

            elseif ($cantidadds < $ekc && $omiteepb != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["epb"];
                } else {
                    $preciofin = $rowprecioprod["epb"] * $presentacion;
                }
            } elseif ($cantidadds < $ekd && $omiteepc != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["epc"];
                } else {
                    $preciofin = $rowprecioprod["epc"] * $presentacion;
                }
            } elseif ($cantidadds < $eke && $omiteepd != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["epd"];
                } else {
                    $preciofin = $rowprecioprod["epd"] * $presentacion;
                }
            } elseif ($cantidadds >= $eke && $omiteepe != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["epe"];
                } else {
                    $preciofin = $rowprecioprod["epe"] * $presentacion;
                }
            }
        }
    } else {
        $preciofin = 0;
    }
    //verifico claculos
    if ($descuenun == '0' && $importtot == '0') {
        $result = "2";
    } else {

        /* if($unidsx=='1'){ 
$totalres=$preciofin*$presentacion;
}else{
    $totalres=$preciofin;
}
 */

        if ($unidsx == '1') {
            $totalresd = $preciofin / $presentacion * $cantidadds;
        } else {
            $totalresd = $preciofin * $cantidadds;
        }

        $totalresfin = round($totalresd);


        if ($descuenun != 0) {

            $totalresv = $totalresd - ($totalresd * ($descuenun / 100));
            $totalresfin = round($totalresv);
        }

        $totalresfinv = explode(".", $totalresfin);
        $importtotv = explode(".", $importtot);


        //comparo totales
        if ($totalresfinv[0] == $importtotv[0]) {
            $result = "1"; //correcto

        } else {
            $result = "2";
            if (
                $idprodu == '403' || $idprodu == '1252' || $idprodu == '2045' || $idprodu == '2108' || $idprodu == '2177' || $idprodu == '1883' || $idprodu == '654'
                || $idprodu == '535' || $idprodu == '860'  || $idprodu == '103' || $idprodu == '1672'
            ) {
                $result = "1";
            }
        } //incorrecto

    }

    return $result;

    mysqli_free_result($rjdhfbpqj); // Liberar memoria del resultado
    mysqli_close($rjdhfbpqj);
}
