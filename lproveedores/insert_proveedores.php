<?php include('../f54du60ig65.php');
$idcod = $_POST["jfndhom"];
$id = base64_decode($idcod);
$empresa = $_POST["empresa"];
$whatsapp = $_POST["whatsapp"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$web = $_POST["web"];
$tipoiva = $_POST["tipoiva"];
$cuit = $_POST["cuit"];
$estado = $_POST["estado"];
$tipo = $_POST["tipo"];
$gananciaa = $_POST["gananciaa"];
$gananciab = $_POST["gananciab"];
$gananciac = $_POST["gananciac"];
$address = $_POST["address"];
$address = $_POST["address"];
$saldoini = $_POST["saldoini"];
$saldoiniR = $_POST["saldoiniR"];
$tipoproveedor = $_POST["tipoproveedor"];


$razonsocial1 = $_POST["razonsocial1"];
$razonsocial2 = $_POST["razonsocial2"];
$razonsocial3 = $_POST["razonsocial3"];
$razonsocial4 = $_POST["razonsocial4"];
$razonsocial5 = $_POST["razonsocial5"];

$cuit1 = $_POST["cuit1"];
$cuit2 = $_POST["cuit2"];
$cuit3 = $_POST["cuit3"];
$cuit4 = $_POST["cuit4"];
$cuit5 = $_POST["cuit5"];

$cbu1 = $_POST["cbu1"];
$cbu2 = $_POST["cbu2"];
$cbu3 = $_POST["cbu3"];
$cbu4 = $_POST["cbu4"];
$cbu5 = $_POST["cbu5"];

$alias1 = $_POST["alias1"];
$alias2 = $_POST["alias2"];
$alias3 = $_POST["alias3"];
$alias4 = $_POST["alias4"];
$alias5 = $_POST["alias5"];

$orden = $_POST["orden"];

if ($tipoproveedor == '0') {
    $urlpro = 'proveedor';
} else {
    $rubro = $_POST["rubro"];
    $urlpro = 'proveedoresvarios';
}
$iibb_bsas = $_POST["iibb_bsas"];
$iibb_caba = $_POST["iibb_caba"];
$perc_iva = $_POST["perc_iva"];
$iva = $_POST["iva"];


if (!empty($id)) {
    if (!empty($empresa)) {
        $sqlproveedores = "Update proveedores Set empresa='$empresa', whatsapp='$whatsapp', telefono='$telefono', email='$email', web='$web', estado='$estado', tipo='$tipo', gananciaa='$gananciaa', gananciab='$gananciab', gananciac='$gananciac', address='$address', tipoiva='$tipoiva', cuit='$cuit', iibb_bsas='$iibb_bsas', iibb_caba='$iibb_caba', perc_iva='$perc_iva', iva='$iva', rubro='$rubro', saldoini='$saldoini', saldoiniR='$saldoiniR', razonsocial1='$razonsocial1', cuit1='$cuit1', cbu1='$cbu1', alias1='$alias1', razonsocial2='$razonsocial2', cuit2='$cuit2', cbu2='$cbu2', alias2='$alias2', razonsocial3='$razonsocial3', cuit3='$cuit3', cbu3='$cbu3', alias3='$alias3', razonsocial4='$razonsocial4', cuit4='$cuit4', cbu4='$cbu4', alias4='$alias4', razonsocial5='$razonsocial5', cuit5='$cuit5', cbu5='$cbu5', alias5='$alias5', orden='$orden' Where id = '$id'";
        mysqli_query($rjdhfbpqj, $sqlproveedores) or die(mysqli_error($rjdhfbpqj));




        //actualizo produtos




        /*    $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id_proveedor = 'as78778d'"); //$id
        while ($rowproductos = mysqli_fetch_array($sqlproductos)) {
            $idprod = $rowproductos['id'];


            $sqlprecioprodr = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idprod'  ORDER BY `precioprod`.`fecha` DESC");
            if ($rowprecioprod = mysqli_fetch_array($sqlprecioprodr)) {


                $cproveedorr = $rowprecioprod["cproveedor"];
                if ($cproveedorr != $gananciaa) {


                    $cproveedor = $gananciaa;

                    $fecha = $rowprecioprod["fecha"];
                    $idprofun = $rowprecioprod["id"];



                    $costorigi = $rowprecioprod["costo"];
                    $costo = $rowprecioprod["costo"];

                    //fech and diferent
                    $id_producto = $rowprecioprod["id_producto"];
                    $kilo = $rowprecioprod["kilo"];

                    //fin date
                    //estract gain
                    $gananciaaf = $rowprecioprod["ganancia_a"];
                    $gananciab = $rowprecioprod["ganancia_b"];
                    $gananciac = $rowprecioprod["ganancia_c"];
                    $kilo = $rowprecioprod["kilo"];
                    $costo_total = $costo + $cproveedor;
                    $costoxcaja = $costo_total * $kilo;

                    $costov = number_format($costo, 2, '.', '');

                    $costo_totalv = number_format($costo_total, 2, '.', '');
                    $costoxcajav = number_format($costoxcaja, 2, '.', '');

                    //precio minorista
                    if ($tipo == "0") {
                        $precio_kiloa = $costo_total + $gananciaaf;
                    } else {
                        $precio_kiloa =  $costo_total / 100 * $gananciaaf + $costo_total;
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


                    //acapara precio producto

                    $sqlprecioprod = "Update precioprod Set kilo='$kilo', cproveedor='$cproveedor', costo_total='$costo_total', costoxcaja='$costoxcaja', precio_kiloa='$precio_kiloa', precio_cajaa='$precio_cajaav', precio_kilob='$precio_kilob', precio_cajab='$precio_cajabv', precio_kiloc='$precio_kiloc', precio_cajac='$precio_cajacv', tipo='$tipo' Where id = '$idprofun'";
                    mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));
                }
            }
        } */



        //fin actualizo
        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../" . $urlpro . "?jfndhom=" . $idcod . "&dmcnfg=1&tipoproveedor=" . $rubro . "'");
        echo ("</script>");
    } else {
        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='?jfndhom=" . $idcod . "&error=1&tipoproveedor=" . $rubro . "'");
        echo ("</script>");
    }
} else {
    if (!empty($empresa)) {
        $sqlproveedores = "INSERT INTO `proveedores` (empresa, whatsapp, telefono, email, web, estado, tipo, gananciaa, gananciab, gananciac, address, tipoiva, cuit, iibb_bsas, iibb_caba, perc_iva, iva, rubro, saldoini, saldoiniR,razonsocial1,razonsocial2,razonsocial3,razonsocial4,razonsocial5,cuit1,cuit2,cuit3,cuit4,cuit5,cbu1,cbu2,cbu3,cbu4,cbu5,alias1,alias2,alias3,alias4,alias5,orden) VALUES ('$empresa', '$whatsapp', '$telefono', '$email', '$web', '$estado', '$tipo', '$gananciaa', '$gananciab', '$gananciac', '$address', '$tipoiva', '$cuit','$iibb_bsas', '$iibb_caba', '$perc_iva', '$iva', '$rubro', '$saldoini', '$saldoiniR','$razonsocial1','$razonsocial2','$razonsocial3','$razonsocial4','$razonsocial5','$cuit1','$cuit2','$cuit3','$cuit4','$cuit5','$cbu1','$cbu2','$cbu3','$cbu4','$cbu5','$alias1','$alias2','$alias3','$alias4','$alias5','$orden');";
        mysqli_query($rjdhfbpqj, $sqlproveedores) or die(mysqli_error($rjdhfbpqj));
        mysqli_close($rjdhfbpqj);
        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../$urlpro'");
        echo ("</script>");
    } else {
        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='?&error=1'");
        echo ("</script>");
    }
}
