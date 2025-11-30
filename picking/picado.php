<?php include('../f54du60ig65.php');
include('../funciones/funcextrKgCod.php');
$codigods = $_POST['codigo'];
$id_ordenr = $_POST['id_orden'];
$idproducto = $_POST['idproducto'];
$sumapican = $_POST['sumapican'];
$cantidadrd = $_POST['cantidadrd'];
$kilosPresent = $_POST['kilosPresent'];
$tipoesbulto = $_POST['tipoesbulto'];
if (empty($kilosPresent)) {
    $kilosPresent = 1;
} else {
    $kilosPresent = $_POST['kilosPresent'];
}

if ($sumapican == '9') {
    /*     
    if($kilosPresent=='1'){ 
        $sumapicand=extrikg($codigods);
        if($sumapicand < 10){
            $sumapican=$sumapicand;
        }else{$idproducto='02020202';}
    }
    else{$sumdan=extrikg($codigods);0
        if($sumdan >=$kilosPresent){
        $sumapican=$kilosPresent;
    }else{
     //$idproducto='02020202';
    }
    } */

    if ($codigods != "manual") {

        if (preg_match('/^\d{13}$/', $codigods)) {
        } else {
            $codigods = $codigods . "1";
        }

        $intdo = substr($codigods, 8, -1);
        $sqlbusque = "id = '" . $intdo . "' and ";
    } else {
        $sqlbusque = "";
    }
}
if ($sumapican == '1') {
    if ($codigods != "manual") {
        $codigo = $_POST['codigo'];
        if ($tipoesbulto == 1) {
            $sqlbusque = "codigobulto='" . $codigo . "' and ";
        } else {

            $sqlbusque = "codigo='" . $codigo . "' and ";
        }
    } else {
        $sqlbusque = "";
    }
}

//echo 'asi '.$sqlbusque.'';

$sqen = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where  $sqlbusque id='$idproducto'");
if ($rowod = mysqli_fetch_array($sqen)) {

    $presentacion = $rowod["kilo"];
    // echo 'ok';

    $sqenordi = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden='$id_ordenr' and id_producto='$idproducto' and picking='0' ");
    //$canverificafin = mysqli_num_rows($sqenordi);


    if ($rowodedi = mysqli_fetch_array($sqenordi)) {
        $iditem = $rowodedi["id"];
        $kilos = $rowodedi["kilos"];
        $kilosconrte = $rowodedi["piccant"];
        if ($sumapican == '1') {
            $sumapican = $rowodedi["kilos"];
        }
        //   echo 'ok2';
        //$kilosconere = $cantidadrd;
        //$kiloscone = $kiloscon + $sumapican;

        /* if ($sumapican == '9' && $kilosPresent=='1') {

            if( $cantidadrd <= $presentacion){

                $sqlordend = "Update item_orden Set picking='1',pickinfin='$hora' Where id='$iditem'";
                mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));

            }else{

            $sqlordend = "Update item_orden Set piccant='$cantidadrd' Where id_orden='$id_ordenr' and id_producto='$idproducto' and picking='0'";
            mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
            }

                            echo '
                <div class="alert alert-success text-center">
                <strong>Verificando!!</strong> 
                </div>
                ';

            echo ("<script language='JavaScript' type='text/javascript'>");
            echo ("location.href='index.php?kiloscone=$presentacion'");
            echo ("</script>");

            exit;

        } else { */
        //   echo 'ok3';

        $sqlordend = "Update item_orden Set picking='1',pickinfin='$hora' Where id='$iditem'";
        mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));

        /* busco si hay dejar para depues lo activo */
        /*  $sqlddend = "Update item_orden Set picking='0' Where id_orden='$id_ordenr' and picking='2'";
            mysqli_query($rjdhfbpqj, $sqlddend) or die(mysqli_error($rjdhfbpqj)); */



        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='index.php'");
        echo ("</script>");
        exit;
    }

    //echo 'ok4';
    $_SESSION['picaincorrcto'] = '0';
} else {
    $picaincorrcto = $_SESSION['picaincorrcto'] + 1;

    echo '
    <div class="alert alert-danger text-center">
    <strong><h1>Producto Picado Incorrecto!!</h1></strong>Codigo no correspondiente al pedido
    </div>
    ';
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='index.php?picaincorrcto=$picaincorrcto'");
    echo ("</script>");
}
