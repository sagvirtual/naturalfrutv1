<?php include('../f54du60ig65.php');
$id_usuario = $_SESSION['id_usuarioclav'];
$modobus = $_POST['modobus'];
$buscar = $_POST['buscar'];

$nref = 'Act.';

$descuento = $_POST['descuento'];
$iibb_bsas = $_POST['iibb_bsas'];
$iibb_caba = $_POST['iibb_caba'];
$perc_iva = $_POST['perc_iva'];
$iva = $_POST['iva'];
$desadi = $_POST['desadi'];


/* precio de venta */
$mka = $_POST["mka"];
$mga = $_POST["mga"];
$mpa = $_POST["mpa"];
$mkb = $_POST["mkb"];
$mub = $_POST["mub"];
$mgb = $_POST["mgb"];
$mpb = $_POST["mpb"];
$mkc = $_POST["mkc"];
$muc = $_POST["muc"];
$mgc = $_POST["mgc"];
$mpc = $_POST["mpc"];
$mkd = $_POST["mkd"];
$mud = $_POST["mud"];
$mgd = $_POST["mgd"];
$mpd = $_POST["mpd"];
$mke = $_POST["mke"];
$mue = $_POST["mue"];
$mge = $_POST["mge"];
$mpe = $_POST["mpe"];


$eka = $_POST["eka"];
$ega = $_POST["ega"];
$epa = $_POST["epa"];
$ekb = $_POST["ekb"];
$eub = $_POST["eub"];
$egb = $_POST["egb"];
$epb = $_POST["epb"];
$ekc = $_POST["ekc"];
$euc = $_POST["euc"];
$egc = $_POST["egc"];
$epc = $_POST["epc"];
$ekd = $_POST["ekd"];
$eud = $_POST["eud"];
$egd = $_POST["egd"];
$epd = $_POST["epd"];
$eke = $_POST["eke"];
$eue = $_POST["eue"];
$ege = $_POST["ege"];
$epe = $_POST["epe"];



date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME, "es_RA");
$fechahoyb = date("Y-m-d");

//update
$idcodw = $_POST["jfndhom"];
$idw = base64_decode($idcodw);


/* fecha anterior */
$sqlpreci3r = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idw'  and cerrado = '1' and confirmado = '1' and fecha < '$fechahoyb' ORDER BY fecha DESC, id DESC;");
if ($rowprecioprod = mysqli_fetch_array($sqlpreci3r)) {

    $costo_totalComp = $rowprecioprod["costo_total"];
    
    $mkbComp = $rowprecioprod["mkb"];
    $mkcComp = $rowprecioprod["mkc"];
    $mkdComp = $rowprecioprod["mkd"];
    $mkeComp = $rowprecioprod["mke"];

    $ekbComp = $rowprecioprod["ekb"];
    $ekcComp = $rowprecioprod["ekc"];
    $ekdComp = $rowprecioprod["ekd"];
    $ekeComp = $rowprecioprod["eke"];
    
    
    $mpaComp = $rowprecioprod["mpa"];
    $mpbComp = $rowprecioprod["mpb"];
    $mpcComp = $rowprecioprod["mpc"];
    $mpdComp = $rowprecioprod["mpd"];
    $mpeComp = $rowprecioprod["mpe"];

    $epaComp = $rowprecioprod["epa"];
    $epbComp = $rowprecioprod["epb"];
    $epcComp = $rowprecioprod["epc"];
    $epdComp = $rowprecioprod["epd"];
    $epeComp = $rowprecioprod["epe"];

    $mubComp = $rowprecioprod["mub"];
    $mucComp = $rowprecioprod["muc"];
    $mudComp = $rowprecioprod["mud"];
    $mueComp = $rowprecioprod["mue"];

    $eubComp = $rowprecioprod["eub"];
    $eucComp = $rowprecioprod["euc"];
    $eudComp = $rowprecioprod["eud"];
    $eueComp = $rowprecioprod["eue"];
}



/* busco el ultimo producto de la fecha */
$sqlprecioprodr = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idw' and cerrado = '1' and confirmado = '1' ORDER BY fecha DESC, id DESC;");
if ($rowprecioprod = mysqli_fetch_array($sqlprecioprodr)) {

  
    $fecha = $rowprecioprod["fecha"];
    $idprofun = $rowprecioprod["id"];
    $id_proveedorc = $rowprecioprod["id_proveedor"];
    //$kilo = $rowprecioprod["kilo"];
    $id_orden = $rowprecioprod["id_orden"];
    $modopr = $rowprecioprod["modo"];

    $fecven = $rowprecioprod['fecven'];
    $agrstock = $rowprecioprod['agrstock'];

    $sqlprodwos=mysqli_query($rjdhfbpqj,"SELECT * FROM productos Where id = '$idw'");
    if ($rowpuctos = mysqli_fetch_array($sqlprodwos)){
    $id_proveedorcd = $rowpuctos["id_proveedor"];
    $kilo = $rowpuctos["kilo"];}
   

    //fech and diferent
    $id_producto = $rowprecioprod["id_producto"];

    $cproveedor = $rowprecioprod["cproveedor"];
    //fin date
    //estract gain
    $gananciaa = $rowprecioprod["ganancia_a"];
    $gananciab = $rowprecioprod["ganancia_b"];
    $gananciac = $rowprecioprod["ganancia_c"];
    $tipo = $rowprecioprod["tipo"];
    //$kilo = $rowprecioprod["kilo"];
    $costoxcaja = $costo_total * $kilo;

    $costov = number_format($costoxcaj, 2, '.', '');

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
}else{


    $sqlprodwos=mysqli_query($rjdhfbpqj,"SELECT * FROM productos Where id = '$idw'");
    if ($rowpuctos = mysqli_fetch_array($sqlprodwos)){
    $id_proveedorcd = $rowpuctos["id_proveedor"];
    $kiloc = $rowpuctos["kilo"];
    }

}







 /* me fijo si es seteo por bulto o por kilo */
 $sqlproveedores = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_proveedorc'");
 if ($rowproveedores = mysqli_fetch_array($sqlproveedores)) {
     $fac_unid = $rowproveedores["fac_unid"];
     if ($fac_unid != '1') {
         $costo = $_POST["costo"];
         $costo = trim($costo);
         $costoxcaj = $costo * $kilo;
     }
     if ($fac_unid == '1') {


         $costoxcaj = $_POST["costoxcaj"];
         $costoxcaj = trim($costoxcaj);

         $costo = $costoxcaj / $kilo;
         
     }
 }else{


    $costo = $_POST["costo"];
     $costo = trim($costo);
     $costoxcaj = $costo * $kiloc;

     $precio_kilocv = number_format($costo, 2, '.', '');
     $precio_cajacv = number_format($costoxcaj, 2, '.', '');
 }
/* PRECIO BASE */




/* $costovr=$costoxcaj/$kilo;
                $costo=number_format($costovr, 2, '.', ''); */

//$costo=number_format($costo, 2, '.', '');

/* PRECIO CON DESCUENTO */

/* precio con descuento ok */
$descccost = $costo - ($costo * ($descuento / 100));

$pcondescu = number_format($descccost, 2, '.', '');



/* PRECIO BRUTO */
$impuestos = $iibb_bsas + $iibb_caba + $perc_iva + $iva;
$roimp = $descccost + ($descccost * ($impuestos / 100));
$pbruto = number_format($roimp, 2, '.', '');
/* PRECIO COSTO FINAL */



/* PRECI POR BULTO FINAL */
$preciofinal = $roimp - ($roimp * ($desadi / 100));
$costo_totalv = number_format($preciofinal, 2, '.', '');


// actualizo precio
$costoxcajav = $costo_totalv * $kilo;

if($costo_totalComp != $costo_totalv || $mpaComp != $mpa || $mpbComp != $mpb || $mpcComp != $mpc || $mpdComp != $mpd || $mpeComp != $mpe || $epaComp != $epa || $epbComp != $epb || $epcComp != $epc || $epdComp != $epd || $epeComp != $epe || $mubComp != $mub || $mucComp != $muc || $mudComp != $mud || $mueComp != $mue || $eubComp != $eub || $eucComp != $euc || $eudComp != $eud || $eueComp != $eue || $mkbComp != $mkb || $mkcComp != $mkc || $mkdComp != $mkd || $mkeComp != $mke || $ekbComp != $ekb || $ekcComp != $ekc || $ekdComp != $ekd || $ekeComp != $eke){


        /* precios mayoristas */
       /*  $mpav =  $costo_totalv / 100 * $mga + $costo_totalv;
        $mpa = number_format($mpav, 0, '.', '');

        $mpbv =  $costo_totalv / 100 * $mgb + $costo_totalv;
        $mpb = number_format($mpbv, 0, '.', '');


        $mpcv =  $costo_totalv / 100 * $mgc + $costo_totalv;
        $mpc = number_format($mpcv, 0, '.', '');

        $mpdv =  $costo_totalv / 100 * $mgd + $costo_totalv;
        $mpd = number_format($mpdv, 0, '.', '');

        $mpev =  $costo_totalv / 100 * $mge + $costo_totalv;
        $mpe = number_format($mpev, 0, '.', ''); */

        /* precios especiales */
       /*  $epav =  $costo_totalv / 100 * $ega + $costo_totalv;
        $epa = number_format($epav, 0, '.', '');

        $epbv =  $costo_totalv / 100 * $egb + $costo_totalv;
        $epb = number_format($epbv, 0, '.', '');


        $epcv =  $costo_totalv / 100 * $egc + $costo_totalv;
        $epc = number_format($epcv, 0, '.', '');

        $epdv =  $costo_totalv / 100 * $egd + $costo_totalv;
        $epd = number_format($epdv, 0, '.', '');

        $epev =  $costo_totalv / 100 * $ege + $costo_totalv;
        $epe = number_format($epev, 0, '.', ''); */


        if (!empty($idprofun) && !empty($costov)) {

            if ($fecha == $fechahoyb) {

        /* si hay sero no pone valor */
        if ($mkb == "0" || $mgb == "0") {
            $mpb = '0';
        }
        if ($mkc == "0" || $mgc == "0") {
            $mpc = '0';
        }
        if ($mkd == "0" || $mgd == "0") {
            $mpd = '0';
        }
        if ($mke == "0" || $mge == "0") {
            $mpe = '0';
        }
        if ($ekb == "0" || $egb == "0") {
            $epb = '0';
        }
        if ($ekc == "0" || $egc == "0") {
            $epc = '0';
        }
        if ($ekd == "0" || $egd == "0") {
            $epd = '0';
        }
        if ($eke == "0" || $ege == "0") {
            $epe = '0';
        }
        /* fin calculo de venta */

        
        


                /* calculo precio final venta kilo='$kilo', */
        $costo_final = $_POST["costo_final"];



        if($id_orden=='0'){
        $sqlprecioprod = "Update precioprod Set id_usuario='$id_usuario', id_proveedor='$id_proveedorc', id_orden='0', modo='$modopr', tipoprov='$id_proveedorc',costo_total='$costo_totalv', costoxcaja='$costoxcajav', precio_kiloa='$precio_kiloav', precio_cajaa='$precio_cajaav', precio_kilob='$precio_kilobv', precio_cajab='$precio_cajabv',  precio_kiloc='$precio_kilocv', precio_cajac='$precio_cajacv', costoxcaj='$costoxcaj', nref='$nref', fecven='$fecven', agrstock='$agrstock', costo='$costo', descuento='$descuento', pcondescu='$pcondescu', iibb_bsas='$iibb_bsas', iibb_caba='$iibb_caba', perc_iva='$perc_iva', iva='$iva', pbruto='$pbruto', desadi='$desadi', tipo='$tipo', mka='$mka', mga='$mga', mpa='$mpa',mkb='$mkb', mgb='$mgb', mpb='$mpb',mkc='$mkc', mgc='$mgc', mpc='$mpc',mkd='$mkd', mgd='$mgd', mpd='$mpd',mke='$mke', mge='$mge', mpe='$mpe', eka='$eka', ega='$ega', epa='$epa',ekb='$ekb', egb='$egb', epb='$epb',ekc='$ekc', egc='$egc', epc='$epc',ekd='$ekd', egd='$egd', epd='$epd',eke='$eke', ege='$ege', epe='$epe', mub='$mub', muc='$muc', mud='$mud', mue='$mue', eub='$eub', euc='$euc',eud='$eud',eue='$eue', confirmado='1' Where id = '$idprofun' and nref='Act.'";
        mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));
        }else{
            $sqlprecioprodx = "INSERT INTO `precioprod` (id_usuario, id_proveedor, id_orden, modo, tipoprov, id_producto, kilo, cproveedor, costo_total, costoxcaja, ganancia_a, precio_kiloa, precio_cajaa, ganancia_b, precio_kilob, precio_cajab, ganancia_c, precio_kiloc, precio_cajac, costoxcaj, fecha, tipo, nref, fecven, agrstock, descuento, iibb_bsas, iibb_caba, perc_iva, iva, desadi, costo, pcondescu, pbruto, cerrado, mka, mga, mpa, mkb, mgb, mpb, mkc, mgc, mpc, mkd, mgd, mpd, mke, mge, mpe, eka, ega, epa, ekb, egb, epb, ekc, egc, epc, ekd, egd, epd, eke, ege, epe, mub, muc, mud, mue, eub, euc, eud, eue, confirmado) VALUES ('$id_usuario', '$id_proveedorc', '0', '$modopr', '$id_proveedorc', '$id_producto', '$kilo', '$cproveedor', '$costo_totalv', '$costoxcajav', '$gananciaa', '$precio_kiloav', '$precio_cajaav', '$gananciab', '$precio_kilobv', '$precio_cajabv', '$gananciac', '$precio_kilocv', '$precio_cajacv', '$costoxcaj', '$fechahoyb', '$tipo', '$nref', '$fecven', '$agrstock', '$descuento', '$iibb_bsas', '$iibb_caba', '$perc_iva', '$iva', '$desadi', '$costo', '$pcondescu', '$pbruto','1','$mka','$mga','$mpa','$mkb','$mgb','$mpb','$mkc','$mgc','$mpc','$mkd','$mgd','$mpd','$mke','$mge','$mpe','$eka','$ega','$epa','$ekb','$egb','$epb','$ekc','$egc','$epc','$ekd','$egd','$epd','$eke','$ege','$epe','$mub','$muc','$mud','$mue','$eub','$euc','$eud','$eue','1');";
            mysqli_query($rjdhfbpqj, $sqlprecioprodx) or die(mysqli_error($rjdhfbpqj));

        }
  
    } else {
        $sqlprecioprodx = "INSERT INTO `precioprod` (id_usuario, id_proveedor, id_orden, modo, tipoprov, id_producto, kilo, cproveedor, costo_total, costoxcaja, ganancia_a, precio_kiloa, precio_cajaa, ganancia_b, precio_kilob, precio_cajab, ganancia_c, precio_kiloc, precio_cajac, costoxcaj, fecha, tipo, nref, fecven, agrstock, descuento, iibb_bsas, iibb_caba, perc_iva, iva, desadi, costo, pcondescu, pbruto, cerrado, mka, mga, mpa, mkb, mgb, mpb, mkc, mgc, mpc, mkd, mgd, mpd, mke, mge, mpe, eka, ega, epa, ekb, egb, epb, ekc, egc, epc, ekd, egd, epd, eke, ege, epe, mub, muc, mud, mue, eub, euc, eud, eue, confirmado) VALUES ('$id_usuario', '$id_proveedorc', '0', '$modopr', '$id_proveedorc', '$id_producto', '$kilo', '$cproveedor', '$costo_totalv', '$costoxcajav', '$gananciaa', '$precio_kiloav', '$precio_cajaav', '$gananciab', '$precio_kilobv', '$precio_cajabv', '$gananciac', '$precio_kilocv', '$precio_cajacv', '$costoxcaj', '$fechahoyb', '$tipo', '$nref', '$fecven', '$agrstock', '$descuento', '$iibb_bsas', '$iibb_caba', '$perc_iva', '$iva', '$desadi', '$costo', '$pcondescu', '$pbruto','1','$mka','$mga','$mpa','$mkb','$mgb','$mpb','$mkc','$mgc','$mpc','$mkd','$mgd','$mpd','$mke','$mge','$mpe','$eka','$ega','$epa','$ekb','$egb','$epb','$ekc','$egc','$epc','$ekd','$egd','$epd','$eke','$ege','$epe','$mub','$muc','$mud','$mue','$eub','$euc','$eud','$eue','1');";
        mysqli_query($rjdhfbpqj, $sqlprecioprodx) or die(mysqli_error($rjdhfbpqj));


     
    }
    //actualizo precios en los remitos
    //include('../orden/actualizo_pre_remito.php');
}else{ if($costo!='0'){
    $sqlprecioprodx = "INSERT INTO `precioprod` (id_usuario, id_proveedor, id_orden, modo, tipoprov, id_producto, kilo, cproveedor, costo_total, costoxcaja, ganancia_a, precio_kiloa, precio_cajaa, ganancia_b, precio_kilob, precio_cajab, ganancia_c, precio_kiloc, precio_cajac, costoxcaj, fecha, tipo, nref, fecven, agrstock, descuento, iibb_bsas, iibb_caba, perc_iva, iva, desadi, costo, pcondescu, pbruto, cerrado, mka, mga, mpa, mkb, mgb, mpb, mkc, mgc, mpc, mkd, mgd, mpd, mke, mge, mpe, eka, ega, epa, ekb, egb, epb, ekc, egc, epc, ekd, egd, epd, eke, ege, epe, mub, muc, mud, mue, eub, euc, eud, eue, confirmado) VALUES ('$id_usuario', '$id_proveedorcd', '$id_orden', '$modopr', '$id_proveedorcd ', '$idw', '$kiloc', '$cproveedor', '$costo_totalv', '$costoxcajav', '$gananciaa', '$precio_kiloav', '$precio_cajaav', '$gananciab', '$precio_kilobv', '$precio_cajabv', '$gananciac', '$precio_kilocv', '$precio_cajacv', '$costoxcaj', '$fechahoyb', '$tipo', 'Act.', '$fecven', '$agrstock', '$descuento', '$iibb_bsas', '$iibb_caba', '$perc_iva', '$iva', '$desadi', '$costo', '$pcondescu', '$pbruto','1','$mka','$mga','$mpa','$mkb','$mgb','$mpb','$mkc','$mgc','$mpc','$mkd','$mgd','$mpd','$mke','$mge','$mpe','$eka','$ega','$epa','$ekb','$egb','$epb','$ekc','$egc','$epc','$ekd','$egd','$epd','$eke','$ege','$epe','$mub','$muc','$mud','$mue','$eub','$euc','$eud','$eue','1');";
    mysqli_query($rjdhfbpqj, $sqlprecioprodx) or die(mysqli_error($rjdhfbpqj));
}
}}else{

if($costo_totalComp == $costo_totalv || $mpaComp == $mpa || $mpbComp == $mpb || $mpcComp == $mpc || $mpdComp == $mpd || $mpeComp == $mpe || $epaComp == $epa || $epbComp == $epb || $epcComp == $epc || $epdComp == $epd || $epeComp == $epe || $mubComp == $mub || $mucComp == $muc || $mudComp == $mud || $mueComp == $mue || $eubComp == $eub || $eucComp == $euc || $eudComp == $eud || $eueComp == $eue || $mkbComp == $mkb || $mkcComp == $mkc || $mkdComp == $mkd || $mkeComp == $mke || $ekbComp == $ekb || $ekcComp == $ekc || $ekdComp == $ekd || $ekeComp == $eke){
    $sqlborr ="delete from precioprod Where id = '$idprofun' and nref='Act.' and fecha='$fechahoyb'";
mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));}
}

