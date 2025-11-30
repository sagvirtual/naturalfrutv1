<?php




/* sumo calculo */
$sqlcdaa = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden='$id_orden' and id_producto='$id_pdsroducto' ");

if ($rowcoemddpa = mysqli_fetch_array($sqlcdaa)) {

    $fecvend = $rowcoemddpa["fecven"];

    $fechacompra = $rowcoemddpa["fecha"];
}




/* me fijo si la cantida es mayor a 0 en la A */
$veoa = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden='$id_orden' and id_producto='$id_pdsroducto' and modo='0'");
if ($rowdcxddpa = mysqli_fetch_array($veoa)) {
    $idA = $rowdcxddpa["id"];
    $unid_bulto = $rowdcxddpa["unid_bulto"];
    $kilow = $rowdcxddpa["kilo"];



    $agcana = $rowdcxddpa["costo_total"];
    $deslisA = $rowdcxddpa["descuento"];
    $iibb_bsasA = $rowdcxddpa["iibb_bsas"];
    $iibb_cabaA = $rowdcxddpa["iibb_caba"];
    $perc_ivaA = $rowdcxddpa["perc_iva"];
    $ivaA = $rowdcxddpa["iva"];
    $desadiA = $rowdcxddpa["desadi"];
    $costolisA = $rowdcxddpa["costo"];
    $costoxcajA = $rowdcxddpa["costoxcaj"];

    //valores
    $pcondescuA = $rowdcxddpa["pcondescu"];
    $pbrutoA = $rowdcxddpa["pbruto"];
    $costo_totalA = $rowdcxddpa["costo_total"];
    $costoxcajaA = $rowdcxddpa["costoxcaja"];
    $agrstockA = $rowdcxddpa["agrstock"];


    //IIBB BSAS
    $iibbAporBs = $agrstockA * $iibb_bsasA;
    //IIBB CABA
    $iibbAporCaba = $agrstockA * $iibb_cabaA;
    //iva perc
    $ivaAporper = $agrstockA * $perc_ivaA;
    //iva
    $ivaApor = $agrstockA * $ivaA;


    // Calcular el valor total de cada compra
    $valor_unid_A = $agrstockA * $costolisA;
    $valor_total_A = $agrstockA * $agcana;
} else {
    $agcana = '0';
}

/* me fijo si la cantida es mayor a 0 en la R */
$veor = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden='$id_orden' and id_producto='$id_pdsroducto' and modo='1'");
if ($rowcddpr = mysqli_fetch_array($veor)) {
    $idR = $rowcddpr["id"];
    $unid_bulto = $rowcddpr["unid_bulto"];
    $kilow = $rowcddpr["kilo"];


    $agcanr = $rowcddpr["costo_total"];
    $deslisR = $rowcddpr["descuento"];
    $iibb_bsasR = $rowcddpr["iibb_bsas"];
    $iibb_cabaR = $rowcddpr["iibb_caba"];
    $perc_ivaR = $rowcddpr["perc_iva"];
    $ivaR = $rowcddpr["iva"];
    $desadiR = $rowcddpr["desadi"];
    $costolisR = $rowcddpr["costo"];
    $costoxcajR = $rowcddpr["costoxcaj"];

    //valores
    $pcondescuR = $rowcddpr["pcondescu"];
    $pbrutoR = $rowcddpr["pbruto"];
    $costo_totalR = $rowcddpr["costo_total"];
    $costoxcajaR = $rowcddpr["costoxcaja"];
    $agrstockR = $rowcddpr["agrstock"];


    //IIBB BSAS
    $iibbRporBs = $agrstockR * $iibb_bsasR;
    //IIBB CABA
    $iibbRporCaba = $agrstockR * $iibb_cabaR;
    //iva perc
    $ivaRporper = $agrstockR * $perc_ivaR;
    //iva
    $ivaRpor = $agrstockR * $ivaR;

    // Calcular el valor total de cada compra
    $valor_unid_R = $agrstockR * $costolisR;
    $valor_total_R = $agrstockR * $agcanr;
} else {
    $agcanr = '0';
}









/* $sqlprodcom = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_pdsroducto'");
if ($rowprdodtos = mysqli_fetch_array($sqlprodcom)) {

    $canxbule = $rowprdodtos["kilo"];
}
 */






if ($agcana == '0' || $agcana == '0' || $agcanr == '0' || $agcana == ' ' || $agcanr == ' ') {

    $canverificafin = '1';
} else {
    $canverificafin = '7';
}


/* fin */



//calculo
/* 
if ($canverificafin == '1') {
    $costolis = ($costolisA + $costolisR);
    $costoxcajlis = ($costoxcajA + $costoxcajR);

    // sumo los porsentajes de descuentos y lo divido para el promedio
    $desclisv = ($deslisA + $deslisR);
    $desclis = number_format($desclisv, 2, '.', '');

    //resultado con el descuento
    $pcondescu = ($pcondescuA + $pcondescuR);
    $predesclisv = number_format($pcondescu, 2, '.', '');

    // impuestos
    $iibb_bsasv = ($iibb_bsasA + $iibb_bsasR);
    $iibb_cabav = ($iibb_cabaA + $iibb_cabaR);
    $perc_ivav = ($perc_ivaA + $perc_ivaR);
    $ivav = ($ivaA + $ivaR);
    $iibb_bsaslisv = number_format($iibb_bsasv, 2, '.', '');
    $iibb_cabalisv = number_format($iibb_cabav, 2, '.', '');
    $perc_ivalisv = number_format($perc_ivav, 2, '.', '');
    $ivalisv = number_format($ivav, 2, '.', '');

    //sumo impuestos                            
    $pbruto = ($pbrutoA + $pbrutoR);
    $tolimldresv = number_format($pbruto, 2, '.', '');
    //descuento aicional
    $descadilis = ($desadiA + $desadiR);
    $descadilisv = number_format($descadilis, 2, '.', '');

    //costo final unidad
    $costo_total = ($costo_totalA + $costo_totalR);
    $costdsunldsdv = number_format($costo_total, 2, '.', '');

    // costo final bulto
    $costoxcaja = ($costoxcajaA + $costoxcajaR);
    $costdsunldsdvt = number_format($costoxcaja, 2, '.', '');
} else {
    $costolis = ($costolisA + $costolisR) / 2;
    $costoxcajlis = ($costoxcajA + $costoxcajR) / 2;
    // sumo los porsentajes de descuentos y lo divido para el promedio
    $desclisv = ($deslisA + $deslisR) / 2;
    $desclis = number_format($desclisv, 2, '.', '');
    //resultado con el descuento
    $pcondescu = ($pcondescuA + $pcondescuR) / 2;
    $predesclisv = number_format($pcondescu, 2, '.', '');
    // impuestos
    $iibb_bsasv = ($iibb_bsasA + $iibb_bsasR) / 2;
    $iibb_cabav = ($iibb_cabaA + $iibb_cabaR) / 2;
    $perc_ivav = ($perc_ivaA + $perc_ivaR) / 2;
    $ivav = ($ivaA + $ivaR) / 2;
    $iibb_bsaslisv = number_format($iibb_bsasv, 2, '.', '');
    $iibb_cabalisv = number_format($iibb_cabav, 2, '.', '');
    $perc_ivalisv = number_format($perc_ivav, 2, '.', '');
    $ivalisv = number_format($ivav, 2, '.', '');
    //sumo impuestos                            
    $pbruto = ($pbrutoA + $pbrutoR) / 2;
    $tolimldresv = number_format($pbruto, 2, '.', '');
    //descuento aicional
    $descadilis = ($desadiA + $desadiR) / 2;
    $descadilisv = number_format($descadilis, 2, '.', '');

    //costo final unidad
    $costo_total = ($costo_totalA + $costo_totalR) / 2;
    $costdsunldsdv = number_format($costo_total, 2, '.', '');

    // costo final bulto
    $costoxcaja = ($costoxcajaA + $costoxcajaR) / 2;
    $costdsunldsdvt = number_format($costoxcaja, 2, '.', '');
} */

if ($deslisA <= 0) {

    $deslisA = $deslisR;
}

if ($deslisR <= 0) {

    $deslisR = $deslisA;
}


$desclisv = ($deslisA + $deslisR) / 2;
$desclis = number_format($desclisv, 2, '.', '');

$agrstocksd = $agrstockA + $agrstockR;


$valor_unid_general = $valor_unid_A + $valor_unid_R;
$valor_total_general = $valor_total_A + $valor_total_R;




/* por IIBB BSAS */
$iibbPorpeBs = $iibbAporBs + $iibbRporBs;
$iibb_bsaslisv = $iibbPorpeBs / $agrstocksd;

/* por IIBB CABA */
$iibbPorCaba = $iibbAporCaba + $iibbRporCaba;
$iibb_cabalisv = $iibbPorCaba / $agrstocksd;

/* por Perc.IVA */
$ivaPorper = $ivaAporper + $ivaRporper;
$perc_ivalisv = $ivaPorper / $agrstocksd;

/* por iva */
$ivaPor = $ivaApor + $ivaRpor;
$ivalisv = $ivaPor / $agrstocksd;


// Calcular el precio promedio ponderado
$precio_unid_ponderado = $valor_unid_general / $agrstocksd;
$precio_promedio_ponderado = $valor_total_general / $agrstocksd;

$costolisv = number_format($precio_unid_ponderado, 2, '.', '');
$costolis = number_format($precio_unid_ponderado, 2, '.', '');
$costdsunldsdv = number_format($precio_promedio_ponderado, 2, '.', '');

$precio_promedio_bulto = $precio_promedio_ponderado * $kilow;

$costdsunldsdvt = number_format($precio_promedio_bulto, 2, '.', '');





if ($unid_bulto == '2') {
    $agrstocksd = $agrstocksd;
} else {
    $agrstocksd = $agrstocksd * $kilow;
}
