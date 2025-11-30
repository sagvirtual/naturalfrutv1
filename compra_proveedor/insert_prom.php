<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');

$id_proveedor = $_POST["id_proveedor"];
$id_orden = $_POST["id_orden"];
$id_pdsroducto = $_POST["id_producto"];

unset($_SESSION['fecven']);

include('CalPromedio.php');

/* $unid_bulto = $rowdcxddpa["unid_bulto"];
$kilow = $rowdcxddpa["kilo"]; */

if ($kilow > 0) {

  /* me fijo si hay parametros de ventas anteriores */
  $sqlprecrod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where fecha<='$fechacompra' and id_producto = '$id_pdsroducto'  and cerrado = '1' and confirmado = '1'  ORDER BY fecha DESC, id DESC;");
  if ($rowprecioprod = mysqli_fetch_array($sqlprecrod)) {


    /* prewcios mayoristas */
    $mka = $rowprecioprod["mka"];
    $mua = $rowprecioprod["mua"];
    $mga = $rowprecioprod["mga"];
    $mpa = $rowprecioprod["mpa"];

    $mkb = $rowprecioprod["mkb"];
    $mub = $rowprecioprod["mub"];
    $mgb = $rowprecioprod["mgb"];
    $mpb = $rowprecioprod["mpb"];

    $mkc = $rowprecioprod["mkc"];
    $muc = $rowprecioprod["muc"];
    $mgc = $rowprecioprod["mgc"];
    $mpc = $rowprecioprod["mpc"];

    $mkd = $rowprecioprod["mkd"];
    $mud = $rowprecioprod["mud"];
    $mgd = $rowprecioprod["mgd"];
    $mpd = $rowprecioprod["mpd"];

    $mke = $rowprecioprod["mke"];
    $mue = $rowprecioprod["mue"];
    $mge = $rowprecioprod["mge"];
    $mpe = $rowprecioprod["mpe"];

    /* precios especiales */
    $eka = $rowprecioprod["eka"];
    $eua = $rowprecioprod["eua"];
    $ega = $rowprecioprod["ega"];
    $epa = $rowprecioprod["epa"];

    $ekb = $rowprecioprod["ekb"];
    $eub = $rowprecioprod["eub"];
    $egb = $rowprecioprod["egb"];
    $epb = $rowprecioprod["epb"];

    $ekc = $rowprecioprod["ekc"];
    $euc = $rowprecioprod["euc"];
    $egc = $rowprecioprod["egc"];
    $epc = $rowprecioprod["epc"];

    $ekd = $rowprecioprod["ekd"];
    $eud = $rowprecioprod["eud"];
    $egd = $rowprecioprod["egd"];
    $epd = $rowprecioprod["epd"];

    $eke = $rowprecioprod["eke"];
    $eue = $rowprecioprod["eue"];
    $ege = $rowprecioprod["ege"];
    $epe = $rowprecioprod["epe"];




    /* precios mayoristas */
    $mpav =  $costdsunldsdv / 100 * $mga + $costdsunldsdv;
    $mpa = number_format($mpav, 0, '.', '');

    $mpbv =  $costdsunldsdv / 100 * $mgb + $costdsunldsdv;
    $mpb = number_format($mpbv, 0, '.', '');


    $mpcv =  $costdsunldsdv / 100 * $mgc + $costdsunldsdv;
    $mpc = number_format($mpcv, 0, '.', '');

    $mpdv =  $costdsunldsdv / 100 * $mgd + $costdsunldsdv;
    $mpd = number_format($mpdv, 0, '.', '');

    $mpev =  $costdsunldsdv / 100 * $mge + $costdsunldsdv;
    $mpe = number_format($mpev, 0, '.', '');

    /* precios especiales */
    $epav =  $costdsunldsdv / 100 * $ega + $costdsunldsdv;
    $epa = number_format($epav, 0, '.', '');

    $epbv =  $costdsunldsdv / 100 * $egb + $costdsunldsdv;
    $epb = number_format($epbv, 0, '.', '');


    $epcv =  $costdsunldsdv / 100 * $egc + $costdsunldsdv;
    $epc = number_format($epcv, 0, '.', '');

    $epdv =  $costdsunldsdv / 100 * $egd + $costdsunldsdv;
    $epd = number_format($epdv, 0, '.', '');

    $epev =  $costdsunldsdv / 100 * $ege + $costdsunldsdv;
    $epe = number_format($epev, 0, '.', '');
  }

  $costoxcajldis = $costolis * $kilow;
  $costoxcajlis = number_format($agrstockdsdbult, 0, '.', '');

  /* controlo si no esta */
  $sqlpreispr = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_orden='$id_orden' and id_producto = '$id_pdsroducto'");
  if ($rortus = mysqli_fetch_array($sqlpreispr)) {
    if ($agrstocksd > 0) {
      $sqlprecioprod = "Update precioprod Set fecha='$fechacompra', kilo='$kilow', tipoprov='$id_proveedor', cproveedor='$cproveedor', fecven='$fecvend', agrstock='$agrstocksd', costoxcaj='$costoxcajlis', costo='$costolis', tipo='$tipo', descuento='$desclis', pcondescu='$predesclisv', iibb_bsas='$iibb_bsaslisv', iibb_caba='$iibb_cabalisv', perc_iva='$perc_ivalisv', iva='$ivalisv', pbruto='$pbruto', desadi='$descadilisv ', costo_total='$costdsunldsdv', mka='$mka', mga='$mga', mpa='$mpa',mkb='$mkb', mgb='$mgb', mpb='$mpb',mkc='$mkc', mgc='$mgc', mpc='$mpc',mkd='$mkd', mgd='$mgd', mpd='$mpd',mke='$mke', mge='$mge', mpe='$mpe', eka='$eka', ega='$ega', epa='$epa',ekb='$ekb', egb='$egb', epb='$epb',ekc='$ekc', egc='$egc', epc='$epc',ekd='$ekd', egd='$egd', epd='$epd',eke='$eke', ege='$ege', epe='$epe', mub='$mub', muc='$muc', mud='$mud', mue='$mue', eub='$eub', euc='$euc', eud='$eud', eue='$eue', confirmado='0' Where id_orden='$id_orden' and id_producto = '$id_pdsroducto' and  cerrado='0'";
      mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));
    }


    /* actualizo el stok */


    $sqlproxdd = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden = '$id_orden' and id_producto = '$id_pdsroducto'");

    if ($rowproxdd = mysqli_fetch_array($sqlproxdd)) {

      $agrstddksdv = $rowproxdd["oldagrstock"];
      if ($unid_bulto == '2') {
        $agrstddksdv = $rowproxdd["oldagrstock"];
      } else {
        $agrstddksdv = $agrstddksdv * $kilow;
      }
    }


    if ($agrstocksd > 0 && $fecvend > '2001-01-01') {

      $sqldd = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 WHERE id_producto = '$id_pdsroducto' and fecven='$fecvend'");
      if ($rowcadtol = mysqli_fetch_array($sqldd)) { // si encuentro con el mismo vencimiento aupdate
        $idstock = $rowcadtol['id'];
        if ($rowcadtol['CantStock'] > 0) {
          $CantStockd = $rowcadtol['CantStock'] - $agrstddksdv;
        } else {
          $CantStockd = 0;
        }
        $agrstocksd = $agrstocksd + $CantStockd;



        $sddlh = "UPDATE stockhgz1 SET CantStock = '$agrstocksd' WHERE id_producto = '$id_pdsroducto' and id='$idstock'";
        mysqli_query($rjdhfbpqj, $sddlh);
      } else {

        $sqleh = "INSERT INTO stockhgz1 (id_producto, CantStock, fecven, id_usuario,hora,fecha,origen,id_compra) VALUES ('$id_pdsroducto', '$agrstocksd', '$fecvend', '$id_usuarioclav','$horasin','$fechahoy','1','$id_orden')";
        mysqli_query($rjdhfbpqj, $sqleh);
      }
    }
  } else {/* inserto */
    if (!empty($id_orden) && !empty($id_pdsroducto)  && $fecvend > '2001-01-01') {

      $sqlprecioprod = "INSERT INTO `precioprod` (id_usuario, modo, id_producto, id_proveedor, id_orden, fecha, kilo, tipoprov, cproveedor, nref, fecven, agrstock, costoxcaj, costo, tipo, descuento, pcondescu, iibb_bsas, iibb_caba, perc_iva, iva, pbruto, desadi, costo_total, costoxcaja, cerrado, mka, mga, mpa, mkb, mgb, mpb, mkc, mgc, mpc, mkd, mgd, mpd, mke, mge, mpe, eka, ega, epa, ekb, egb, epb, ekc, egc, epc, ekd, egd, epd, eke, ege, epe, mub, muc, mud, mue, eub, euc, eud, eue) VALUES ('$id_usuarioclav', '$modo', '$id_pdsroducto', '$id_proveedor', '$id_orden', '$fechacompra', '$kilow', '$id_proveedor', '$cproveedor', 'Compra', '$fecvend', '$agrstocksd', '$costoxcajlis', '$costolis', '$tipo', '$desclis', '$predesclisv', '$iibb_bsaslisv', '$iibb_cabalisv', '$perc_ivalisv', '$ivalisv', '$pbruto', '$descadilisv ', '$costdsunldsdv', '$costdsunldsdvt', '$cerrado','$mka','$mga','$mpa','$mkb','$mgb','$mpb','$mkc','$mgc','$mpc','$mkd','$mgd','$mpd','$mke','$mge','$mpe','$eka','$ega','$epa','$ekb','$egb','$epb','$ekc','$egc','$epc','$ekd','$egd','$epd','$eke','$ege','$epe','$mub','$muc','$mud', '$mue','$eub','$euc','$eud','$eue');";
      mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));
    }
    /* cargo stock */

    if ($agrstocksd > 0 && $fecvend > '2001-01-01') {


      $sqlproxdd = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden = '$id_orden' and id_producto = '$id_pdsroducto'");

      if ($rowproxdd = mysqli_fetch_array($sqlproxdd)) {

        $agrstddksdv = $rowproxdd["oldagrstock"];
        if ($unid_bulto == '2') {
          $agrstddksdv = $rowproxdd["oldagrstock"];
        } else {
          $agrstddksdv = $agrstddksdv * $kilow;
        }
      }


      $sqldd = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 WHERE id_producto = '$id_pdsroducto' and fecven='$fecvend'");
      if ($rowcadtol = mysqli_fetch_array($sqldd)) { // si encuentro con el mismo vencimiento aupdate
        $idstock = $rowcadtol['id'];
        if ($rowcadtol['CantStock'] > 0) {
          $CantStockd = $rowcadtol['CantStock'] - $agrstddksdv;
        } else {
          $CantStockd = 0;
        }
        $agrstocksd = $agrstocksd + $CantStockd;

        $sddlh = "UPDATE stockhgz1 SET CantStock = '$agrstocksd' WHERE id_producto = '$id_pdsroducto' and id='$idstock'";
        mysqli_query($rjdhfbpqj, $sddlh);
      } else {

        $sqleh = "INSERT INTO stockhgz1 (id_producto, CantStock, fecven, id_usuario,hora,fecha,origen,id_compra) VALUES ('$id_pdsroducto', '$agrstocksd', '$fecvend', '$id_usuarioclav','$horasin','$fechahoy','1','$id_orden')";
        mysqli_query($rjdhfbpqj, $sqleh);
      }
    }
  }

  //actualizao el proveedor
  /*   if ($id_proveedor > 0 && $id_pdsroducto > 0) {
    $sddlhprov = "UPDATE productos SET id_proveedor = '$id_proveedor' WHERE id = '$id_pdsroducto'";
    mysqli_query($rjdhfbpqj, $sddlhprov);
  } */
}
//echo 'Un momento <img src="../assets/images/loader.gif">';

echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='?ookdjfv=$id_proveedor&osert=1&id_orden=$id_orden&prom=$agrstocksd&bult=$kilow&uni=$unid_bulto&donde=$donde'");
echo ("</script>");

// echo 'acaaa '.$id_pdsroducto.' es: '.$canverificafin.' costo: '.$agcanr.' el otros A '.$agcana.' stock: '.$agrstocksd.'';
