<?php include('../f54du60ig65.php');
$idcod = $_POST["jfndhom"];
$fechalistar = $_POST["fechalistar"];
$id = base64_decode($idcod);
/* 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
$kilo = str_replace(',', '.',$_POST["kilo"]);
$costo_total = $_POST["costo_total"];
$ganancia_a = str_replace(',', '.',$_POST["ganancia_a"]);
$precio_kiloa = $_POST["precio_kiloa"];
$precio_cajaa = $_POST["precio_cajaa"];
$ganancia_b = str_replace(',', '.',$_POST["ganancia_b"]);
$precio_kilob = $_POST["precio_kilob"];
$precio_cajab = $_POST["precio_cajab"];
$ganancia_c =  str_replace(',', '.',$_POST["ganancia_c"]);
$precio_kiloc = $_POST["precio_kiloc"];
$precio_cajac = $_POST["precio_cajac"];
$costo = str_replace(',', '.',$_POST["costo"]);
$codigo = $_POST["codigo"];
$categoria = $_POST["categoria"];
$id_proveedor = $_POST["id_proveedor"];

/* $sqlprecdrod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$id'  and cerrado = '1' and confirmado = '1'  ORDER BY fecha DESC, id DESC;");
if ($rowprecrod = mysqli_fetch_array($sqlprecdrod)) {$iddoduc=$rowprecrod['id'];

    $sqlprdoprod = "Update precioprod Set id_proveedor='$id_proveedor' Where id = '$iddoduc'";
    mysqli_query($rjdhfbpqj, $sqlprdoprod) or die(mysqli_error($rjdhfbpqj));

} */



$nombre = $_POST["nombre"];
$nombreb = $_POST["nombreb"];
$fracionado = str_replace(',', '.',$_POST["fracionado"]);
$ventaminma = str_replace(',', '.',$_POST["ventaminma"]);
$estado = $_POST["estado"];
$detalle = $_POST["detalle"];
$id_marcas = $_POST["id_marcas"];
$id_rubro1 = $_POST["id_rubro1"];
$id_rubro2 = $_POST["id_rubro2"];
$id_rubro3 = $_POST["id_rubro3"];
$id_rubro4 = $_POST["id_rubro4"];
$id_rubro5 = $_POST["id_rubro5"];
$id_rubro6 = $_POST["id_rubro6"];
$id_rubro7 = $_POST["id_rubro7"];
$id_rubro8 = $_POST["id_rubro8"];
$id_rubro9 = $_POST["id_rubro9"];
$tipoprov = $_POST["id_proveedor"];
$exkilo = $_POST["exkilo"];
$cproveedor = $_POST["cproveedor"];
$modo_producto = $_POST["modo_producto"];
$ubicacion = $_POST["ubicacion"];
$mensaje = $_POST["mensaje"];

/* foto */
$sinfoto = $_POST["sinfoto"];

if($sinfoto=='1' && empty($_FILES["file"]["type"])){$file = '';}
else{
    if(!empty($_FILES["file"]["type"])){
        $file = $_FILES["file"]["type"];
    }
    else{

        $sqlproduos=mysqli_query($rjdhfbpqj,"SELECT * FROM productos Where id = '$id'");
if ($rowprodctos = mysqli_fetch_array($sqlproduos)){$filesds=$rowprodctos['file'];}
        $file =$filesds;
    }

}


$fileexten = $_FILES["file"]["type"];
$costoxcaj = $_POST["costoxcaj"];
$descuento = $_POST["descuento"];
$pcondescu = $_POST["pcondescu"];
$iibb_bsas = $_POST["iibb_bsas"];
$iibb_caba = $_POST["iibb_caba"];
$perc_iva = $_POST["perc_iva"];
$iva = $_POST["iva"];
$pbruto = $_POST["pbruto"];
$desadi = $_POST["desadi"];

$alarmaven=$_POST["alarmaven"];
$alarmastock=$_POST["alarmastock"];

//costoproducto
$cproveedor = $_POST["cproveedor"];
$costoxcaja = str_replace(',', '.',$_POST["costoxcaja"]);
$id_producto = $_POST["id_producto"];
$unidadventa = str_replace(',', '.',$_POST["unidadventa"]);
$unidadnom = $_POST["unidadnom"];

$verkilo = $_POST["verkilo"];
$vercaja = $_POST["vercaja"];
$verunidad = $_POST["verunidad"];
$kgaprox = $_POST["kgaprox"];

$nref = $_POST["nref"];
$fecven = $_POST["fecven"];
$agrstock = $_POST["agrstock"];

$fecha = $fechahoy;
$costoxcaja = $kilo * $costo_total;


//aca me fijo si tildo ganancias distintas
$sqlmarcas = mysqli_query($rjdhfbpqj, "SELECT * FROM marcas Where id = '$id_marcas'");
if ($rowmarcas = mysqli_fetch_array($sqlmarcas)) {
    $midmarcas = $rowmarcas["id"];
    $mtipo = $rowmarcas["tipo"];
    $mgananciaa = $rowmarcas["gananciaa"];
    $mgananciab = $rowmarcas["gananciab"];
    $mgananciac = $rowmarcas["gananciac"];
}
if ($mgananciaa == $ganancia_a && $mgananciab && $ganancia_b && $mgananciac && $ganancia_c) {
    $gananciasper = "0";
} else {
    $gananciasper = "1";
}

//fin



if (!empty($id)) {
    unset($_SESSION["tipoprov"]);
    unset($_SESSION["cproveedor"]);
    unset($_SESSION["fracionado"]);
    unset($_SESSION["unidadventa"]);
    unset($_SESSION["unidadnom"]);
    unset($_SESSION['kkfnuhtf']);
    unset($_SESSION["kilo"]);
    unset($_SESSION["costo"]);
    unset($_SESSION["codigo"]);
    unset($_SESSION["categoria"]);
    unset($_SESSION["id_proveedor"]);
    unset($_SESSION["nombre"]);
    unset($_SESSION["nombreb"]);
    unset($_SESSION["estado"]);
    unset($_SESSION["detalle"]);
    unset($_SESSION["id_rubro1"]);
    unset($_SESSION["id_rubro2"]);
    unset($_SESSION["id_rubro3"]);
    unset($_SESSION["id_rubro4"]);
    unset($_SESSION["id_rubro5"]);
    unset($_SESSION["id_rubro6"]);
    unset($_SESSION["id_rubro7"]);
    unset($_SESSION["id_rubro8"]);
    unset($_SESSION["id_rubro9"]);
    unset($_SESSION["id_marcas"]);
    unset($_SESSION["modo_producto"]);
    unset($_SESSION["ventaminma	"]);
    unset($_SESSION["verkilo"]);
    unset($_SESSION["vercaja"]);
    unset($_SESSION["verunidad"]);
    unset($_SESSION["kgaprox"]);
    unset($_SESSION["costoxcaj"]);
    unset($_SESSION["nref"]);
    unset($_SESSION["fecven"]);
    unset($_SESSION["agrstock"]);
    unset($_SESSION["ubicacion"]);
    unset($_SESSION["alarmaven"]);
    unset($_SESSION["alarmastock"]);
    unset($_SESSION["mensaje"]);


   
    if (!empty($nombre) && !empty($categoria)) {

        $sqlmarcasa = mysqli_query($rjdhfbpqj, "SELECT * FROM marcas Where id = '$id_marcas'");
        if ($rowmarcasa = mysqli_fetch_array($sqlmarcasa)) {
            $texto_original=$rowmarcasa['empresa'];
            $texto_minusculas = strtolower($texto_original);
            $texto_modificado = ucfirst($texto_minusculas);
            
            $nombre=$nombre." (".$texto_modificado.")";
        
        
        }
//kilo='$kilo',
        $sqlproductos = "Update productos Set codigo='$codigo', categoria='$categoria', id_proveedor='$id_proveedor', nombre='$nombre', nombreb='$nombreb', fracionado='$fracionado',kilo='$kilo', estado='$estado', detalle='$detalle', file='$file', fecha='$fecha', id_marcas='$id_marcas', anclaje='$anclaje', id_rubro='$id_rubro', id_rubro1='$id_rubro1', id_rubro2='$id_rubro2', id_rubro3='$id_rubro3', id_rubro4='$id_rubro4', id_rubro5='$id_rubro5', id_rubro6='$id_rubro6', id_rubro7='$id_rubro7', id_rubro8='$id_rubro8', id_rubro9='$id_rubro9', gananciasper='$gananciasper', modo_producto='$modo_producto', ventaminma='$ventaminma', unidadventa='$unidadventa', unidadnom='$unidadnom', verkilo='$verkilo', vercaja='$vercaja', verunidad='$verunidad', kgaprox='$kgaprox', ubicacion='$ubicacion',  alarmaven='$alarmaven', alarmastock='$alarmastock', mensaje='$mensaje' , exkilo='$exkilo'  Where id = '$id'";
        mysqli_query($rjdhfbpqj, $sqlproductos) or die(mysqli_error($rjdhfbpqj));


       

            /*
        if ($fechalistar == "") { //me fijo si es que modifico un precio viejo

            //acapara precio producto
            $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$id' and fecha='$fecha'");
            if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
                $idproduc = $rowprecioprod["id"];

                $sqlprecioprod = "Update precioprod Set kilo='$kilo', cproveedor='$cproveedor', tipoprov='$id_proveedor', costo_total='$costo_total', costoxcaja='$costoxcaja', ganancia_a='$ganancia_a', precio_kiloa='$precio_kiloa', precio_cajaa='$precio_cajaa', ganancia_b='$ganancia_b', precio_kilob='$precio_kilob', precio_cajab='$precio_cajab', ganancia_c='$ganancia_c', precio_kiloc='$precio_kiloc', precio_cajac='$precio_cajac', costo='$costo', tipo='$mtipo', descuento='$descuento', pcondescu='$pcondescu', iibb_bsas='$iibb_bsas', iibb_caba='$iibb_caba', perc_iva='$perc_iva', iva='$iva', pbruto='$pbruto', desadi='$desadi', costoxcaj='$costoxcaj', nref='$nref', fecven='$fecven', agrstock='$agrstock' Where id = '$idproduc'";
                mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));

                include('../orden/pactualizo_pre_remito.php');
            } else {
                $sqlprecioprodr = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$id' ORDER BY `precioprod`.`fecha` DESC");
                if ($rowprecioprodr = mysqli_fetch_array($sqlprecioprodr)) {
                    $kilov = $rowprecioprodr['kilo'];
                    $costov = $rowprecioprodr['costo'];
                    $ganancia_av = $rowprecioprodr['ganancia_a'];
                    $ganancia_bv = $rowprecioprodr['ganancia_b'];
                    $ganancia_cv = $rowprecioprodr['ganancia_c'];
                    $cproveedor = $rowprecioprodr['cproveedor'];
                    $tipoprov = $rowprecioprodr['tipoprov'];
                }
                if ($kilov != $kilo || $costov != $costo) {

                    $sqlprecioprod = "INSERT INTO `precioprod` (nref, fecven, agrstock, costoxcaj, id_producto, kilo, cproveedor, tipoprov, costo_total, costoxcaja, ganancia_a, precio_kiloa, precio_cajaa, ganancia_b, precio_kilob, precio_cajab, ganancia_c, precio_kiloc, precio_cajac, costo, fecha, tipo, descuento, pcondescu, iibb_bsas, iibb_caba, perc_iva, iva, pbruto, desadi) VALUES ('$nref', '$fecven', '$agrstock', '$costoxcaj' ,'$id', '$kilo', '$cproveedor', '$id_proveedor', '$costo_total', '$costoxcaja', '$ganancia_a', '$precio_kiloa', '$precio_cajaa', '$ganancia_b', '$precio_kilob', '$precio_cajab', '$ganancia_c', '$precio_kiloc', '$precio_cajac', '$costo', '$fecha', '$mtipo', '$descuento', '$pcondescu', '$iibb_bsas', '$iibb_caba', '$perc_iva', '$iva', '$pbruto', '$desadi');";
                    mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));

                    include('../orden/actualizo_pre_remito.php');
                }
            }
        }  else {
            $sqlprecioprod = "Update precioprod Set kilo='$kilo', cproveedor='$cproveedor', tipoprov='$id_proveedor', costo_total='$costo_total', costoxcaja='$costoxcaja', ganancia_a='$ganancia_a', precio_kiloa='$precio_kiloa', precio_cajaa='$precio_cajaa', ganancia_b='$ganancia_b', precio_kilob='$precio_kilob', precio_cajab='$precio_cajab', ganancia_c='$ganancia_c', precio_kiloc='$precio_kiloc', precio_cajac='$precio_cajac', costo='$costo', tipo='$mtipo' , descuento='$descuento', pcondescu='$pcondescu', iibb_bsas='$iibb_bsas', iibb_caba='$iibb_caba', perc_iva='$perc_iva', iva='$iva', pbruto='$pbruto', desadi='$desadi', costoxcaj='$costoxcaj', nref='$nref', fecven='$fecven', agrstock='$agrstock' Where id = '$fechalistar'";
            mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));
            include('../orden/actualizo_pre_remito.php');
        } */

        ///fin

        //cargo toto

        $idfoto = "foto" . $id;
        $filev = $_FILES["file"]["tmp_name"];
        if ($fileexten == "image/png" || $fileexten == "image/jpg" || $fileexten == "image/jpeg") {
        move_uploaded_file($filev, $idfoto);
        chmod($idfoto, 0777);
        }
        
        if ($fileexten == "image/jpg" || $fileexten == "image/jpeg") {
            $image = imagecreatefrompng($idfoto);

            $original = imagecreatefromjpeg($idfoto);
            $ancho = imagesx($original);
            $alto = imagesy($original);
            $porcen = 500 * 100 / $ancho;
            $altopro =  $alto * $porcen / 100;
            $thumb = imagecreatetruecolor(500, $altopro); // Lo haremos de un  150x150
            imagecopyresampled($thumb, $original, 0, 0, 0, 0, 500, $altopro, $ancho, $alto);
            imagejpeg($image, $idfoto, 100);
            imagedestroy($image);
        }
       
        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../lproductos?jfndhom=$idcod&kkfnuhtf=$id_marcas&dmcnfg=1'");
        echo ("</script>");
    } else {
        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../lproductos?error=7&jfndhom=$idcod&kkfnuhtf=$id_marcas'");
        echo ("</script>");
    }
} else { //nuevo registro

    //sesion  $_SESSION

    $_SESSION["kilo"] = $_POST["kilo"];
    $_SESSION["costo"] = $_POST["costo"];
    $_SESSION["codigo"] = $_POST["codigo"];
    $_SESSION["categoria"] = $_POST["categoria"];
    $_SESSION["id_proveedor"] = $_POST["id_proveedor"];
    $_SESSION["nombre"] = $_POST["nombre"];
    $_SESSION["nombreb"] = $_POST["nombreb"];
    $_SESSION["estado"] = $_POST["estado"];
    $_SESSION["detalle"] = $_POST["detalle"];
    $_SESSION["id_marcas"] = $_POST["id_marcas"];
    $_SESSION["id_rubro1"] = $_POST["id_rubro1"];
    $_SESSION["id_rubro2"] = $_POST["id_rubro2"];
    $_SESSION["id_rubro3"] = $_POST["id_rubro3"];
    $_SESSION["id_rubro4"] = $_POST["id_rubro4"];
    $_SESSION["id_rubro5"] = $_POST["id_rubro5"];
    $_SESSION["id_rubro6"] = $_POST["id_rubro6"];
    $_SESSION["id_rubro7"] = $_POST["id_rubro7"];
    $_SESSION["id_rubro8"] = $_POST["id_rubro8"];
    $_SESSION["id_rubro9"] = $_POST["id_rubro9"];
    $_SESSION["modo_producto"] = $_POST["modo_producto"];
    $_SESSION["unidadventa"] = $_POST["unidadventa"];
    $_SESSION["unidadnom"] = $_POST["unidadnom"];
    $_SESSION["ventaminma"] = $_POST["ventaminma"];
    $_SESSION["fracionado"] = $_POST["fracionado"];
    $_SESSION["cproveedor"] = $_POST["cproveedor"];
    $_SESSION["tipoprov"] = $_POST["tipoprov"];    
    $_SESSION["verkilo"] = $_POST["verkilo"];
    $_SESSION["vercaja"] = $_POST["vercaja"];
    $_SESSION["verunidad"] = $_POST["verunidad"];
    $_SESSION["kgaprox"] = $_POST["kgaprox"];
    $_SESSION["costoxcaj"] = $_POST["costoxcaj"];    
    $_SESSION["nref"] = $_POST["nref"];
    $_SESSION["fecven"] = $_POST["fecven"];
    $_SESSION["agrstock"] = $_POST["agrstock"];
    $_SESSION["ubicacion"] = $_POST["ubicacion"];
    $_SESSION["alarmaven"] = $_POST["alarmaven"];
    $_SESSION["alarmastock"] = $_POST["alarmastock"];
    $_SESSION["mensaje"] = $_POST["mensaje"];



    




    $timean = date("His");
    $fechaan = date("d-m-Y");
    $anclaje = $timean . $fechaan;

    if (!empty($nombre)) {

        $sqlmarcasa = mysqli_query($rjdhfbpqj, "SELECT * FROM marcas Where id = '$id_marcas'");
        if ($rowmarcasa = mysqli_fetch_array($sqlmarcasa)) {
            $texto_original=$rowmarcasa['empresa'];
            $texto_minusculas = strtolower($texto_original);
            $texto_modificado = ucfirst($texto_minusculas);
            
            $nombre=$nombre." (".$texto_modificado.")";
        
        
        }
        if (!empty($nombre) && !empty($categoria)) {
        $sqlproductos = "INSERT INTO `productos` (codigo, categoria, nombre, nombreb, estado, detalle, file, fecha, id_marcas, anclaje, id_rubro, id_rubro1, id_rubro2, id_rubro3, id_rubro4, id_rubro5, id_rubro6, id_rubro7, id_rubro8, id_rubro9, gananciasper, modo_producto, fracionado, ventaminma, unidadventa, unidadnom, verkilo, vercaja, verunidad, kgaprox, ubicacion, kilo, alarmaven, alarmastock,mensaje) VALUES ('$codigo', '$categoria', '$nombre', '$nombreb', '$estado', '$detalle', '$file', '$fecha', '$id_marcas', '$anclaje', '$id_rubro', '$id_rubro1', '$id_rubro2', '$id_rubro3', '$id_rubro4', '$id_rubro5', '$id_rubro6', '$id_rubro7', '$id_rubro8', '$id_rubro9', '$gananciasper', '$modo_producto', '$fracionado', '$ventaminma','$unidadventa','$unidadnom', '$verkilo', '$vercaja', '$verunidad', '$kgaprox', '$ubicacion', '$kilo', '$alarmaven', '$alarmastock', '$mensaje');";
        mysqli_query($rjdhfbpqj, $sqlproductos) or die(mysqli_error($rjdhfbpqj));

        } else {
            echo ("<script language='JavaScript' type='text/javascript'>");
            echo ("location.href='../lproductos?error=7'");
            echo ("</script>");
        }
    


        $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where anclaje = '$anclaje'");
        if ($rowproductos = mysqli_fetch_array($sqlproductosr)) {
            $idfoto = "foto" . $rowproductos['id'];
            $id_productonew = $rowproductos['id'];
            //cargo toto
            if (!empty($_FILES["file"]["tmp_name"])) {

                $file = $_FILES["file"]["tmp_name"];
                if ($fileexten == "image/png" || $fileexten == "image/jpg" || $fileexten == "image/jpeg") {
                move_uploaded_file($file, $idfoto);
                chmod($idfoto, 0777);
                }
                if ($_FILES["file"]["type"] == "image/jpg") {
                    $image = imagecreatefrompng($idfoto);

                    $original = imagecreatefromjpeg($idfoto);
                    $ancho = imagesx($original);
                    $alto = imagesy($original);
                    $porcen = 500 * 100 / $ancho;
                    $altopro =  $alto * $porcen / 100;
                    $thumb = imagecreatetruecolor(500, $altopro); // Lo haremos de un  150x150
                    imagecopyresampled($thumb, $original, 0, 0, 0, 0, 500, $altopro, $ancho, $alto);
                    imagejpeg($image, $idfoto, 100);
                    imagedestroy($image);
                }
            }
        }

        //aca paraprecioproucto
     /*    $sqlprecioprod = "INSERT INTO `precioprod` (nref, fecven, agrstock, costoxcaj, id_producto, kilo, cproveedor, tipoprov, costo_total, costoxcaja, ganancia_a, precio_kiloa, precio_cajaa, ganancia_b, precio_kilob, precio_cajab, ganancia_c, precio_kiloc, precio_cajac, costo, fecha, tipo, descuento, pcondescu, iibb_bsas, iibb_caba, perc_iva, iva, pbruto, desadi) VALUES ( '$nref', '$fecven', '$agrstock', '$costoxcaj','$id_productonew', '$kilo', '$cproveedor', '$id_proveedor', '$costo_total', '$costoxcaja', '$ganancia_a', '$precio_kiloa', '$precio_cajaa', '$ganancia_b', '$precio_kilob', '$precio_cajab', '$ganancia_c', '$precio_kiloc', '$precio_cajac', '$costo', '$fecha', '$mtipo', '$descuento', '$pcondescu', '$iibb_bsas', '$iibb_caba', '$perc_iva', '$iva', '$pbruto', '$desadi');";
        mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj)); */
        //actualizo precios en los remitos
        //include('../orden/actualizo_pre_remito.php');
        //
        unset($_SESSION['kkfnuhtf']);
        unset($_SESSION["kilo"]);
        unset($_SESSION["costo"]);
        unset($_SESSION["codigo"]);
        unset($_SESSION["categoria"]);
        unset($_SESSION["id_proveedor"]);
        unset($_SESSION["nombre"]);
        unset($_SESSION["nombreb"]);
        unset($_SESSION["estado"]);
        unset($_SESSION["detalle"]);
        unset($_SESSION["id_marcas"]);
        unset($_SESSION["id_rubro1"]);
        unset($_SESSION["id_rubro2"]);
        unset($_SESSION["id_rubro3"]);
        unset($_SESSION["id_rubro4"]);
        unset($_SESSION["id_rubro5"]);
        unset($_SESSION["id_rubro6"]);
        unset($_SESSION["id_rubro7"]);
        unset($_SESSION["id_rubro8"]);
        unset($_SESSION["id_rubro9"]);
        unset($_SESSION["id_marcas"]);
        unset($_SESSION["modo_producto"]);
        unset($_SESSION["unidadventa"]);
        unset($_SESSION["unidadnom"]);
        unset($_SESSION["tipoprov"]);
        unset($_SESSION["cproveedor"]);
        unset($_SESSION["verkilo"]);
        unset($_SESSION["vercaja"]);
        unset($_SESSION["verunidad"]);
        unset($_SESSION["kgaprox"]);
        unset($_SESSION["costoxcaj"]);
        unset($_SESSION["nref"]);
        unset($_SESSION["fecven"]);
        unset($_SESSION["agrstock"]);
        unset($_SESSION["ubicacion"]);
        unset($_SESSION["mensaje"]);

        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../productos'");
        echo ("</script>");

        
    } else {
        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../lproductos?error=7'");
        echo ("</script>");
    }
}
