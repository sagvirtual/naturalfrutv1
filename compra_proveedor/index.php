<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');

function  elimnordold($rjdhfbpqj, $id_proveedor, $id_orden, $fechahoy)
{

    if ($id_orden != '0') {
        $sqlordee = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenprovee Where id_proveedor = '$id_proveedor' and  id = '$id_orden' and cerrado='0'");
        if ($roworddvee = mysqli_fetch_array($sqlordee)) {
            $fecha_mod = $roworddvee['fecha_mod'];
            //  echo 'No utilizar estoy corrigiendo99!';

            $sqlprprc = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden = '$id_orden'");
            if ($rowpprece = mysqli_fetch_array($sqlprprc)) {
                //  echo 'No utilizar estoy corrigiendo1!';
            } else {
                //  echo 'No utilizar estoy corrigiendo2!';
                if ($fechahoy != $fecha_mod) {
                    $sqlbordr = "delete from ordenprovee Where id='$id_orden' and id_proveedor = '$id_proveedor'";
                    mysqli_query($rjdhfbpqj, $sqlbordr) or die(mysqli_error($rjdhfbpqj));

                    echo ("<script language='JavaScript' type='text/javascript'>");
                    echo ("location.href='?ookdjfv=$id_proveedor&osert=1&borro'");
                    echo ("</script>");
                    exit;
                }
            }
        }
    }
}

//$id_proveedor = $_GET['ookdjfv'];
$osert = $_GET['osert'];
if (!empty($_GET['idcomopra'])) {
    $id_orden = $_GET['idcomopra'];
}

if (!empty($_GET['id_orden'])) {
    $id_orden = $_GET['id_orden'];
}
if (empty($_GET['idproducto'])) {

    unset($_SESSION['fecven']);
}

if ($_GET['ookdjfv'] != "") {
    $id_proveedor = $_GET['ookdjfv'];

    $sqlprovead = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_proveedor' ORDER BY `proveedores`.`empresa` ASC");
    if ($rowpreedoresad = mysqli_fetch_array($sqlprovead)) {
        $nombreproved = $rowpreedoresad['empresa'];
    }
} else {
    $id_cliente = $_GET['ookdfv'];
    $id_clientev = explode("@", $id_cliente);
    $id_proveedor = $id_clientev[1];
    $nombreproved = $id_clientev[0];

    /* $sqlordee= mysqli_query($rjdhfbpqj, "SELECT * FROM ordenprovee Where id_proveedor = '$id_proveedor' and cerrado='0'");
if ($roworddvee = mysqli_fetch_array($sqlordee)) {
    $id_orden=$roworddvee['id'];
    $fechacompra=$roworddvee['fecha'];
} */
}

if (empty($_GET['idcomopra'])) {

    $sqlordee = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenprovee Where id_proveedor = '$id_proveedor' and cerrado='0'");
    if ($roworddvee = mysqli_fetch_array($sqlordee)) {
        $id_orden = $roworddvee['id'];
        $fechacompra = $roworddvee['fecha'];
    }
} else {

    $id_orden = $_GET['idcomopra'];
}


if (!empty($_GET['seleccion'])) {
    /* buscador url */
    $idprodbex = explode("@", $_GET['seleccion']);
    $idproducto = $idprodbex[1];
} else {

    $idproducto =  $_GET['idproducto'];;
}
$producto = $_GET['producto'];
$numero = $_GET['numero'];
$focf = $_GET['focf'];
$editar = $_GET['editar'];


if (!empty($id_orden)) {
    $sqlabre = " and cerrado='1' and id=" . $id_orden;
} else {
    $sqlabre = " and cerrado='0'";
}



/* creo la orden de compra and id = '$id_orden'*/
$sqlordenprovee = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenprovee Where id_proveedor = '$id_proveedor' and  id = '$id_orden'");
if ($rowordenprovee = mysqli_fetch_array($sqlordenprovee)) {
    // $id_orden = $rowordenprovee["id"];
    $fechacompra = $rowordenprovee["fecha"];
    $numero = $rowordenprovee["numero"];
    $numeror = $rowordenprovee["numeror"];
    $cerrado = $rowordenprovee["cerrado"];

    if ($cerrado == 0) {
        $estadcom = "Cerrar";
        $botncerr = "success";
    } else {
        $estadcom = "Abrir";
        $verco = ' style="display: none;"';
        $botncerr = "light";
        $noinputd = "readonly";
    }


    if ($_GET['modofac_a'] != "") {
        $fac_a = $_GET['modofac_a'];
    } else {
        $fac_a = $rowordenprovee["fac_a"];
    }


    if ($_GET['modofac_r'] != "") {
        $fac_r = $_GET['modofac_r'];
    } else {
        $fac_r = $rowordenprovee["fac_r"];
    }
    if (!empty($id_proveedor)) {
        $hayord = '2';
    }
    /* xxx */
    if (!empty($osert) || !empty($focf) || $hayord == '2') {
        $nofocuis = 'tabindex="-1"';
    }

    if ($osert == "1") {
        echo " <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('busqueda').focus();
        });
    </script>
        ";
    } else {
        if ($_GET['seleccion'] == "") {
            echo " <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('id_cliente').focus();
        });
    </script>
        ";
        }
    }

    if (empty($_GET['modounid'])) {
        $modounid = $rowordenprovee["fac_unid"];
    } else {
        $modounid = $_GET['modounid'];
    }
    if ($id_orden != $_SESSION['id_orden']) {
        $_SESSION['id_orden'] = $id_orden;
    }


    if ($modounid == "1") {
        $destaca = "#EDEDED";
        $destacb = "#FEFEF2";
    }
    if ($modounid == "2") {
        $destaca = "#FEFEF2";
        $destacb = "#EDEDED";
    }
    $sqlcomraav = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where modo = '0' and id_orden='$id_orden'");
    if ($rowcompav = mysqli_fetch_array($sqlcomraav)) {
    } else {
        if ($estadcom == "Cerrar") {
            if ($fac_a == '0') {
                $facturaA = '<a href="?ookdjfv=' . $id_proveedor . '&idproducto=' . $roworden["id"] . '&modofac_a=1" tabindex="-1">
        <button type="button" class="btn btn-success btn-sm" style="width:71px; height: 39px;" tabindex="-1">Activo</button></a>';
            }
            if ($fac_a == '1') {
                $notipea = "disabled";
                $facturaA = '
        <a href="?ookdjfv=' . $id_proveedor . '&idproducto=' . $roworden["id"] . '&modofac_a=0" tabindex="-1">
        <button type="button" class="btn btn-danger btn-sm" style="width:71px;height: 39px;" tabindex="-1">Inactivo</button>
        </a>';
            }
        }
    }
    $sqlcomraav = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where modo = '1' and id_orden='$id_orden'");
    if ($rowcompav = mysqli_fetch_array($sqlcomraav)) {
    } else {
        if ($estadcom == "Cerrar") {
            if ($fac_r == "0") {
                $facturaR = '
        <a href="?ookdjfv=' . $id_proveedor . '&idproducto=' . $roworden["id"] . '&modofac_r=1" tabindex="-1">
        <button type="button" class="btn btn-success btn-sm" style="width:71px;height: 39px;" tabindex="-1">Activo</button>
        </a>';
            }
            if ($fac_r == "1") {
                $notiper = "disabled";
                $facturaR = '
        <a href="?ookdjfv=' . $id_proveedor . '&idproducto=' . $roworden["id"] . '&modofac_r=0" tabindex="-1">
        <button type="button" class="btn btn-danger btn-sm" style="width:71px;height: 39px;" tabindex="-1">Inactivo</button>
        </a>';
            }
        }
    }

    if (!empty($_GET['ookdjfv']) && !empty($_GET['fechacompra'])) {
        $fechacompra = $_GET['fechacompra'];

        $sqlordenee = "Update ordenprovee Set fecha='$fechacompra' Where id = '$id_orden' and cerrado='0'";
        mysqli_query($rjdhfbpqj, $sqlordenee) or die(mysqli_error($rjdhfbpqj));

        $sqlcomda = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden='$id_orden' and cerrado='0' and id_producto!='0'");
        if ($rowcoempa = mysqli_fetch_array($sqlcomda)) {
            $sqlordee = "Update prodcom Set fecha='$fechacompra' Where id_orden = '$id_orden' and cerrado='0' and id_producto!='0'";
            mysqli_query($rjdhfbpqj, $sqlordee) or die(mysqli_error($rjdhfbpqj));

            $sqlordeep = "Update precioprod Set fecha='$fechacompra' Where id_orden = '$id_orden' and cerrado='0'  and id_producto!='0'";
            mysqli_query($rjdhfbpqj, $sqlordeep) or die(mysqli_error($rjdhfbpqj));
        }
    }

    // echo 'si esta ' . $id_proveedor . ' orden: ' . $id_orden . ' fecha recibida: ' . $fechacompra . '';
} else {

    if (!empty($_GET['ookdjfv'])) {
        $timean = date("His");
        $fechaan = date("d-m-Y");
        $anclaje = $timean . $fechaan;
        $horas = date("H:i");
        $fechacomprad = $_GET['fechacompra'];
        /* proveedor */
        $sqlproores = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_proveedor'");
        if ($rowprovers = mysqli_fetch_array($sqlproores)) {
            $fac_av = $rowprovers["fac_a"];
            $fac_rv = $rowprovers["fac_r"];
            $fac_unidv = $rowprovers["fac_unid"];
            if ($fac_unidv == "0") {
                $fac_unidv = "2";
            }
        }
        if (!empty($id_proveedor)  && empty($id_orden)) {
            $sqlpees = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenprovee Where id_proveedor = '$id_proveedor' and cerrado='0'");
            if ($rdovers = mysqli_fetch_array($sqlpees)) {

                $id_ordend = $rdovers['id'];
            } else {
                if ($fechacomprad > '2022-01-01') {
                    $sqlordenr = "INSERT INTO `ordenprovee` (id_proveedor, anclaje, usuario, fac_a, fac_r, fac_unid,fecha,fecha_mod) VALUES ('$id_proveedor','$anclaje','$id_usuarioclav','$fac_av','$fac_rv', '$fac_unidv','$fechacomprad','$fechahoy');";
                    mysqli_query($rjdhfbpqj, $sqlordenr) or die(mysqli_error($rjdhfbpqj));
                    $id_ordend = mysqli_insert_id($rjdhfbpqj);
                }
            }
            echo ("<script language='JavaScript' type='text/javascript'>");
            echo ("location.href='?ookdjfv=$id_proveedor&id_orden=$id_ordend&osert=1&indesteo'");
            echo ("</script>");
        }
    }
}
/* fin */



$sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idproducto'");
if ($rowproductos = mysqli_fetch_array($sqlproductos)) {
    $categoria = $rowproductos["categoria"];
    $nombrev = $rowproductos["nombre"];
    $estado = $rowproductos["estado"];
    $detalle = $rowproductos["detalle"];
    $id_marcas = $rowproductos["id_marcas"];
    $modo_producto = $rowproductos["modo_producto"];
    $modo_productod = $rowproductos["modo_producto"];
    $position = $rowproductos["position"];
    $unidadventa = $rowproductos["unidadventa"];
    $unidadnom = $rowproductos["unidadnom"];
    $verkilo = $rowproductos["verkilo"];
    $vercaja = $rowproductos["vercaja"];
    $verunidad = $rowproductos["verunidad"];
    $unidadver = $rowproductos["unidadnom"];


    $vecor = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden='$id_orden' and id_producto='$idproducto' and modo='1'");
    if ($rowcddddpr = mysqli_fetch_array($vecor)) {
        $canxbul = $rowcddddpr["kilo"];
    } else {

        $canxbul = $rowproductos["kilo"];
    }






    if ($modo_producto == "0") {
        $unidadnomav = "Caja";
    }
    if ($modo_producto == "1") {
        $unidadnomav = "Bolsa";
    }
    if ($modo_producto == "2") {
        $unidadnomav = "Kg.";
    }
    if ($modo_producto == "3") {
        $unidadnomav = "Pack";
    }

    $nombre = $nombrev . " - " . $unidadnomav . " x " . $canxbul . " " . $unidadver;
}





$sqlordent = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden = '$id_orden'");
if ($rowordenre = mysqli_fetch_array($sqlordent)) {
    $veritemd = "1";
} else {
    $veritemd = "2";
}



if (!empty($modounid)) {
    $sqlproveeun = "Update proveedores Set fac_unid='$modounid' Where id = '$id_proveedor'";
    mysqli_query($rjdhfbpqj, $sqlproveeun) or die(mysqli_error($rjdhfbpqj));

    $sqlproeun = "Update ordenprovee Set fac_unid='$modounid' Where id = '$id_orden' and cerrado='0'";
    mysqli_query($rjdhfbpqj, $sqlproeun) or die(mysqli_error($rjdhfbpqj));
}
$modofacr_a = $_GET['modofac_a'];
if ($modofacr_a  != "" && $veritemd == '2') {
    $sqlproveeun = "Update proveedores Set fac_a='$modofacr_a' Where id = '$id_proveedor'";
    mysqli_query($rjdhfbpqj, $sqlproveeun) or die(mysqli_error($rjdhfbpqj));

    $sqlproeun = "Update ordenprovee Set fac_a='$modofacr_a' Where id = '$id_orden' and cerrado='0'";
    mysqli_query($rjdhfbpqj, $sqlproeun) or die(mysqli_error($rjdhfbpqj));
}

$modofacr_r = $_GET['modofac_r'];
if ($modofacr_r  != "" && $veritemd == '2') {
    $sqlproveeund = "Update proveedores Set fac_r='$modofacr_r' Where id = '$id_proveedor'";
    mysqli_query($rjdhfbpqj, $sqlproveeund) or die(mysqli_error($rjdhfbpqj));

    $sqlproeund = "Update ordenprovee Set fac_r='$modofacr_r' Where id = '$id_orden' and cerrado='0'";
    mysqli_query($rjdhfbpqj, $sqlproeund) or die(mysqli_error($rjdhfbpqj));
}




if ($modounid == "1" || empty($modounid)) {
    $inputunidb = "text";
    $inputunid = "hidden";
    $vercuenc = 'style="display:none;"';
    $vercuen = 'style="position: relative; top:9px;"';
    $cantunidver = $unidadnomav;
} else {
    $inputunidb = "hidden";
    $inputunid = "text";
    $vercuen = 'style="display:none;"';
    $vercuenc = 'style="position: relative; top:9px;"';
    $cantunidver = $unidadver;
}


/* ver si fue cargado  ?ookdjfv=64&editar=1&iditem=317&idproducto=1 */
if (empty($editar) && !empty($idproducto)) {
    /* controlo si no esta */
    $sqlpsrod = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden='$id_orden' and id_producto = '$idproducto'");
    if ($rowpreciod = mysqli_fetch_array($sqlpsrod)) {

        $idprod = $rowpreciod['id'];
        $asterh = "'";
        echo '<script>
        alert("El producto ya fue cargado lo puede modificar si desea!!");

     
    </script>
        ';

        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='?ookdjfv=$id_proveedor&editar=1&iditem=$idprod&idproducto=$idproducto&focf=1&id_orden=$id_orden'");
        echo ("</script>");
    }
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <title>Compras Proveedor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="../assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
    <style>
        .seleccionado {
            background-color: #ccc;
        }

        .no-seleccionado {
            background-color: #fff;
            /* Fondo blanco */
        }
    </style>

</head>
<style>
    body {
        zoom: 80%;
        /* Escala la página al 80% del tamaño original ; onclick="ajax_buscar('dsdssddds');" */
    }
</style>

<?php

if (empty($idproducto)) {
    echo '<body>';
} else {
    echo '<body onload="calculocosto(); calculocostor()"  onmousemove="calculocosto(); calculocostor(); calculopromedio()">';
}

?>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>




<div class="bg-secondary text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
    <p style=" font-size: 10pt; color: white;">Sistema de Compra Proveedor Versión 1.0.0 &nbsp;&nbsp;&nbsp;&nbsp;Usuario: <?= $nombrenegocio ?> <?= $id_orden ?></p>
</div>
<!-- <h1>No Usar..</h1> -->
<div class="container-fluid px-5 mt-3">

    <div class="row">
        <div class="col-md-3 mb-1">
            <a onclick="cerrarVentana()"> <img src="/assets/images/logopc.png" style="width:38mm;"></a>

        </div>
        <div class="col-md-5">




            <div class="input-group mb-1">

                <?php

                include('inputprov.php');


                ?>

                <div style="display:none;">
                    <select class="form-control" id="id_proveedor" name="id_proveedor" style="color: black;" onchange="enviar_valoresb(this.value);" <?= $nofocuis ?>>
                        <option value="">Eliga el Proveedor...</option>
                        <?php
                        // extraigo el proveedor para el producto
                        $sqlproveedoresad = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where estado = '0' ORDER BY `proveedores`.`empresa` ASC");
                        while ($rowproveedoresad = mysqli_fetch_array($sqlproveedoresad)) {
                            echo '<option value="' . $rowproveedoresad["id"] . '"';

                            if ($id_proveedor == $rowproveedoresad["id"]) {
                                echo 'selected';
                            }
                            echo '>' . $rowproveedoresad["empresa"] . '</option>';
                        }

                        ?>
                    </select>
                </div>


            </div>



            <? if (!empty($id_proveedor)) { ?>

                <div class="row">
                    <div class="col-6">
                        <div class="input-group" style="width:75mm;">
                            <span class="input-group-text" style="width: 38mm;"><strong>Fecha Recibida:</strong></span>
                            <input type="date" class="form-control " id="fechacompra" name="fechacompra" value="<?= $fechacompra ?>" onchange="enviar_valoresf(this.value);" onkeydown="return false;" <?= $nofocuis ?> <?= $noinputd ?>>
                        </div>
                    </div>
                    <div class="col-3" style="height: 40px;">
                        <div class="alert alert-secondary" style="height: 40px; text-align:center;">
                            <sa style="position: relative; top:-8px"> <?php

                                                                        if (!empty($id_orden)) {
                                                                            echo ' <strong>Compra Nº ' . $id_orden . ' </strong>';
                                                                        }

                                                                        ?></sa>
                        </div>
                    </div>
                    <div class="col-3" style="height: 40px;">
                        <div class="alert alert-secondary" style="height: 40px; text-align:right;">
                            <sa style="position: relative; top:-8px"> <strong>Saldo:</strong> $ 0,00</sa>
                        </div>
                    </div>

                </div>
            <? } ?>








        </div>


        <?php

        if (!empty($id_orden) && $fechacompra != "0000-00-00") {

            if ($fac_r == "1") {
                $fosva = 'producto';
            } else {
                $fosva = 'numeror';
            }
            $explnumera = explode("-", $numero);

        ?>
            <div class="col-md-4">

                <div class="input-group mb-1">
                    <span class="input-group-text"><strong>A</strong></span>
                    <input type="text" id="numsuc" placeholder="00000 - " class="form-control" value="<?= $explnumera[0] ?>" onclick="select()" style="width: 6px;"

                        <?= $noinputd ?>>
                    <p style="position:relative; top:8px;">&nbsp;-&nbsp;</p>
                    <input type="text" id="numsucb" placeholder="00000000" value="<?= $explnumera[1] ?>" class="form-control" onclick="select()"

                        <?= $noinputd ?>

                        style="width: 65%;">


                    <input type="hidden" name="numero" id="numero" value="<?= $numero ?>">
                    <?= $facturaA ?>
                </div>

                <div class="input-group">
                    <span class="input-group-text"><strong>R</strong></span>
                    <input type="text" name="numeror" id="numeror" value="<?= $numeror ?>" class="form-control" placeholder="Número Ref." onkeyup="ajax_numerofac($('#numero').val(), $('#numeror').val());" onkeydown="siguienteCampo(event, 'producto')" <?= $noinputd ?> <?= $notiper ?>>
                    <?= $facturaR ?>
                </div>

            </div>

        <?php }

        ?>
        <hr class="mt-3">
        <?php

        if (!empty($id_orden) && $fechacompra != "0000-00-00") {

        ?>
            <div class="col-lg-3" <?= $verco ?>>

                <div class="alert alert-secondary" style="height: 38px; text-align:center;">
                    <strong style="position:relative; top:-10px;">
                        <a href="/" onclick="cerrarVentana()" style="cursor: pointer; text-decoration: none; color:black;" tabindex="-1">Salir</a>
                    </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <strong style="position:relative; top:-10px;">
                        <a href="/lproductos/" style="cursor: pointer; text-decoration: none; color:black;" target="_blank" tabindex="-1">Nuevo Producto</a>
                    </strong>
                </div>

            </div>
            <div class="col-lg-5" <?= $verco ?>>
                <!-- prueba productos xxx -->

                <form id="formBusqueda">
                    <input type="text" class="form-control" id="busqueda" name="busqueda" value="<?= $nombre ?>" autocomplete="off" onclick="select()" onkeypress="return event.keyCode != 13;">
                </form>

                <div id="resultado"></div>


                <!-- fin prueba -->



                <input type="hidden" name="id_producto" id="id_producto" value="<?= $idproducto ?>">


                <!--  
                    <div class="list-group" id="muestrobus" tabindex="0"></div>


                    <script>
                        document.getElementById('producto').addEventListener('keydown', function(event) {
                            // Verificar si la tecla presionada es la flecha hacia abajo
                            if (event.keyCode === 40) {
                                // Evitar el comportamiento predeterminado del evento
                                event.preventDefault();

                                // Enfocar el elemento <div>
                                document.getElementById('muestrobus').focus();
                            }


                        });
                    </script> -->
            </div>
            <div class="col-md-3">
                <? if (!empty($idproducto)) {

                    $sqlcovence = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden='$id_orden' and id_producto= '$idproducto'");
                    if ($rowcomven = mysqli_fetch_array($sqlcovence)) {
                        $fecvetrn = $rowcomven['fecven'];
                    } else {
                        $fecvetrn =  $_SESSION['fecven'];
                    }


                ?>
                    <div class="input-group mb-1" id="oculvence" style="width:75mm;">
                        <span class="input-group-text"><strong>VENCIMIENTO</strong></span>
                        <input type="date" class="form-control" id="fecven" name="fecven" value="<?= $fecvetrn ?>" min="<?= $fecvetrn ?>" onkeydown="if(event.keyCode===13)event.keyCode=9" onchange="ajax_vencimientor($('#fecven').val())">
                    </div>
                <? } ?>



            </div>
            <div id="ocultasinpro" name="ocultasinpro">
                <?
                if (!empty($idproducto)) { ?>

                    <div class=" rwd-table">
                        <table id="tech-companies-1" class="table table-bordered ">
                            <thead>
                                <tr style="background-color: #EBEDEF;">

                                    <th class="text-center" style="width:60px; ">
                                    </th>

                                    <th class="text-center" style="width:80px;">
                                        <ps style="position: relative; top:-8px">Cant</ps>
                                    </th>
                                    <th class="text-center" style="width:100px; cursor: pointer;" onclick="redirigira()">Precio<br><?= $modo_productod ?> <?= $canxbul ?> <?= $unidadver ?>

                                    </th>
                                    <th class="text-center" style="width:100px; cursor: pointer;" onclick="redirigirb()">Precio <br><?= $unidadver ?>
                                    </th>
                                    <th class="text-center" style="width:60px;">
                                        <pa style="position: relative; top:-8px">Desc.</pa>
                                    </th>
                                    <th class="text-center" style="width:100px;">Precio<br>C/Desc.</th>
                                    <th class="text-center" style="width:60px;">IIBB<br>BS&nbsp;AS</th>
                                    <th class="text-center" style="width:60px;">IIBB<br>CABA</th>
                                    <th class="text-center" style="width:60px;">Perc.<br>IVA</th>
                                    <th class="text-center" style="width:60px;">
                                        <pa style="position: relative; top:-8px">IVA</pa>
                                    </th>
                                    <th class="text-center" style="width:100px;">Precio<br>Bruto</th>
                                    <th class="text-center" style="width:60px;">Desc.<br>Adicional</th>
                                    <th class="text-center" style="width:60px;">Precio<br>Final&nbsp;<?= $unidadver ?>

                                    </th>
                                    <th class="text-center" style="width:60px;">Precio<br>Final&nbsp;<?= $unidadnomav ?>
                                    </th>
                                    <th class="text-center" style="width:60px;">Compra<br>Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-center">Modo</th>
                                    <th class="text-center">
                                        <hu id="useleccionbB"><?= $cantunidver ?></hu>
                                    </th>
                                    <th class="text-center">$</th>
                                    <th class="text-center">$</th>
                                    <th class="text-center">%</th>
                                    <th class="text-center">$</th>
                                    <th class="text-center">%</th>
                                    <th class="text-center">%</th>
                                    <th class="text-center">%</th>
                                    <th class="text-center">%</th>
                                    <th class="text-center">$</th>
                                    <th class="text-center">%</th>
                                    <th class="text-center">$</th>
                                    <th class="text-center">$</th>
                                    <th class="text-center">$/<?= $cantunidver ?></th>

                                </tr>

                                <?
                                include('inputcargapro.php');
                                include('inputcargapror.php');


                                if (!empty($idproducto)) {


                                    $sqlproxdd = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden = '$id_orden' and id_producto = '$idproducto'");

                                    while ($rowproxdd = mysqli_fetch_array($sqlproxdd)) {

                                        $agrstddksdv += $rowproxdd["agrstock"];
                                    }
                                    $sddlhxs = "UPDATE prodcom SET oldagrstock = '$agrstddksdv' WHERE id_producto = '$idproducto' and id_orden='$id_orden'";
                                    mysqli_query($rjdhfbpqj, $sddlhxs);

                                    // echo '.'.$agrstddksdv.'';
                                }


                                ?>




                            </tbody>
                        </table>
                    </div>

                    <?php

                    if ($fac_a == "1" || $fac_r == "1") {
                        $nopudssfar = 'style="display: none;"';
                    }

                    ?>
                    <div class="container" style="display: none;">
                        <div class="row">
                            <div class="col-lg-3">
                            </div>
                            <div class="col-lg-3 text-center " style="padding-top: 10px; ">

                                <div class="input-group" style="width: 260px;">
                                    <span class="input-group-text"><strong>Promedio Precio Final Unitario</strong></span>
                                </div>
                                <div class="alert alert-success" name="promcosunid" id="promcosunid" style="font-size: 20pt;width: 260px; font-weight: 900;">
                                    $ 0,00
                                </div>
                            </div>
                            <div class="col-lg-3 text-center" style="padding-top: 10px;">

                                <div class="input-group" style="width: 260px;">
                                    <span class="input-group-text"><strong>Promedio Precio Final </strong></span>
                                </div>
                                <div class="alert alert-success" name="promcoscaja" id="promcoscaja" style="font-size: 20pt; width: 240px; font-weight: 900;">
                                    $ 0,00
                                </div>
                            </div>
                            <div class="col-lg-3">
                            </div>
                        </div>
                    </div>

                    <script>
                        function calculopromedio() {
                            var agrstocktr = document.formda.agrstock.value;
                            var agrstockrr = document.formdar.agrstockr.value;

                            var costopro = document.formda.costo_total.value;
                            var costopror = document.formdar.costo_totalr.value;

                            var costdopro = document.formda.costoxcaja.value;
                            var costdopror = document.formdar.costoxcajar.value;


                            var cancom = eval(agrstocktr) + eval(agrstockrr);


                            var cantidapr = eval(agrstocktr) + eval(agrstockrr);

                            /* por unidad */

                            var sumototdapr = eval(costopro) + eval(costopror);

                            if (costopror > 0 && costopro > 0) {
                                var porsenuni = sumototdapr / 2;
                            } else {
                                var porsenuni = sumototdapr;
                            }

                            /* por  */
                            var sumotbuapr = eval(costdopro) + eval(costdopror);

                            if (costdopror > 0 && costdopro > 0) {
                                var porsenbult = sumotbuapr / 2;
                            } else {
                                var porsenbult = sumotbuapr;
                            }




                            document.getElementById('promcosunid').textContent = '$ ' + porsenuni.toLocaleString('es-ES', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                            document.getElementById('promcoscaja').textContent = '$ ' + porsenbult.toLocaleString('es-ES', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });

                        }
                    </script>

                    <!-- boton guardar -->

                    <div id="muestroordenfp" style="text-align:center;">
                        <!-- End col -->
                        <div class="col-12 text-center"><br>
                            <input type="button" name="submit" class="btn btn-dark" value="<?= $axaxmod ?> producto " onclick="ajax_precioprod<?= $axax ?>($('#id_usuario').val(),$('#modo').val(),$('#id_producto').val(),$('#id_proveedor').val(),$('#id_orden').val(),$('#fechacompra').val(),$('#kilo').val(),$('#numero').val(),$('#agrstock').val(),$('#costoxcaj').val(),$('#costo').val(),$('#tipo').val(),$('#descuento').val(),$('#pcondescu').val(),$('#iibb_bsas').val(),$('#iibb_caba').val(),$('#perc_iva').val(),$('#iva').val(),$('#pbruto').val(),$('#desadi').val(),$('#costo_total').val(),$('#costoxcaja').val(),$('#unid_bulto').val(),$('#comtotal').val(),$('#iditem').val());
            
            
            
            
            ajax_precioprodr<?= $axax ?>($('#id_usuarior').val(),$('#modor').val(),$('#id_productor').val(),$('#id_proveedorr').val(),$('#id_ordenr').val(),$('#fechacompra').val(),$('#kilor').val(),$('#numeror').val(),$('#agrstockr').val(),$('#costoxcajr').val(),$('#costor').val(),$('#tipor').val(),$('#descuentor').val(),$('#pcondescur').val(),$('#iibb_bsasr').val(),$('#iibb_cabar').val(),$('#perc_ivar').val(),$('#ivar').val(),$('#pbrutor').val(),$('#desadir').val(),$('#costo_totalr').val(),$('#costoxcajar').val(),$('#unid_bultor').val(),$('#comtotalr').val(),$('#iditemr').val());

            delayedAjax();
            
            
            
            
            
            
            
            
            " />
                            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<a href="?ookdjfv=<?= $id_proveedor ?>&id_orden=<?= $id_orden ?>"><input type="button" name="submit" class="btn btn-danger" value="Cancelar"></a>


                        </div>


                    </div>

            </div>
    </div>
    <br>



<?php


                }




                include('facturas.php');
                include('facturasr.php');


                $comgeneral = $cpratotal_comvr + $cpratotal_comv;
                $comgeneralv = number_format($comgeneral, 2, ',', '.');
                if ($comgeneral > '0') {
                    echo '<table class="table table-bordered" style="width: 500px; position:relative; float:right; " >

                <tr>
                    <td style="text-align: right; color:grey;" ><h4>TOTAL GENERAL</h4></td>
                    <td style="text-align: right;color:grey;"><h4>$' . $comgeneralv . '</h4></td>
                  
                </tr>
        
            </tbody>
        </table>';
                }


                $sqlchrdaap = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where  id_orden='$id_orden' ");
                if ($rowcompa = mysqli_fetch_array($sqlchrdaap)) {
                    $haypr = "1";
                }

                if (empty($idproducto) && $haypr == "1") {

                    $sqlprsad = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_proveedor'");
                    if ($rowproveosad = mysqli_fetch_array($sqlprsad)) {


                        echo '   <div class="container mt-3 text-center">
                   <button type="button" onclick="ajax_cerrarorden()" class="btn btn-' . $botncerr . '">' . $estadcom . ' compra realizada a <strong>' . $nombreprov = $rowproveosad["empresa"] . '</strong></button>
               </div>';
                    }
                }

?>


<?php

            include('costoprome.php');


?>
<div id="muestroorden2"> </div>
<div id="muestroorden2r"> </div>
<div id="muestroordenc"> </div>
<div id="muestroordenf"> </div>
<div id="muestroorden"> </div>
<div id="muestroordenr"> </div>
<div id="muestroordenv"> </div>
<div id="muestroordenvr"> </div>
<div id="muestroordenfprs"> </div>
<div id="muestroorden8r"> </div>




</div>

<?php

            elimnordold($rjdhfbpqj, $id_proveedor, $id_orden, $fechahoy);

?>
<script>
    function ajax_precioprod(id_usuario, modo, id_producto, id_proveedor, id_orden, fechacompra, kilo, numero, agrstock, costoxcaj, costo, tipo, descuento, pcondescu, iibb_bsas, iibb_caba, perc_iva, iva, pbruto, desadi, costo_total, costoxcaja, unid_bulto, comtotal) {





        if (document.getElementById('fecven').value >= "<?= $fechahoy ?>") { // Verifica si numero tiene datos
            var parametros = {
                "id_usuario": id_usuario,
                "modo": modo,
                "id_producto": id_producto,
                "id_proveedor": id_proveedor,
                "id_orden": id_orden,
                "fecha": fechacompra,
                "kilo": kilo,
                "nref": numero,
                "agrstock": agrstock,
                "costoxcaj": costoxcaj,
                "costo": costo,
                "tipo": tipo,
                "descuento": descuento,
                "pcondescu": pcondescu,
                "iibb_bsas": iibb_bsas,
                "iibb_caba": iibb_caba,
                "perc_iva": perc_iva,
                "iva": iva,
                "pbruto": pbruto,
                "desadi": desadi,
                "costo_total": costo_total,
                "costoxcaja": costoxcaja,
                "unid_bulto": unid_bulto,
                "cpratotal_prod": comtotal,
                "fecven": document.getElementById('fecven').value
            };
            $.ajax({
                data: parametros,
                url: 'insert_item.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden").html('');
                },
                success: function(response) {
                    $("#muestroorden").html(response);
                }
            });
        } else {
            alert("No se puede carga el Stock esta mal el Vencimiento!");
            document.getElementById('fecven').focus();

        }
    }



    /* R */
    function ajax_precioprodr(id_usuarior, modor, id_productor, id_proveedorr, id_ordenr, fechacompra, kilor, numeror, agrstockr, costoxcajr, costor, tipor, descuentor, pcondescur, iibb_bsasr, iibb_cabar, perc_ivar, ivar, pbrutor, desadir, costo_totalr, costoxcajar, unid_bultor, comtotalr) {
        if (document.getElementById('fecven').value != "") { // Verifica si numero tiene datos
            var parametros = {
                "id_usuario": id_usuarior,
                "modo": modor,
                "id_producto": id_productor,
                "id_proveedor": id_proveedorr,
                "id_orden": id_ordenr,
                "fecha": fechacompra,
                "kilo": kilor,
                "nref": numeror,
                "agrstock": agrstockr,
                "costoxcaj": costoxcajr,
                "costo": costor,
                "tipo": tipor,
                "descuento": descuentor,
                "pcondescu": pcondescur,
                "iibb_bsas": iibb_bsasr,
                "iibb_caba": iibb_cabar,
                "perc_iva": perc_ivar,
                "iva": ivar,
                "pbruto": pbrutor,
                "desadi": desadir,
                "costo_total": costo_totalr,
                "costoxcaja": costoxcajar,
                "unid_bulto": unid_bultor,
                "cpratotal_prod": comtotalr,
                "fecven": document.getElementById('fecven').value,
            };
            $.ajax({
                data: parametros,
                url: 'insert_itemr.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroordenr").html('');
                },
                success: function(response) {
                    $("#muestroordenr").html(response);
                }
            });
        } else {

            document.getElementById('fecven').focus();

        }
    }
</script>


<script>
    function ajax_precioprodmod(id_usuario, modo, id_producto, id_proveedor, id_orden, fechacompra, kilo, numero, agrstock, costoxcaj, costo, tipo, descuento, pcondescu, iibb_bsas, iibb_caba, perc_iva, iva, pbruto, desadi, costo_total, costoxcaja, unid_bulto, comtotal, iditem) {
        if (document.getElementById('fecven').value != "") {
            var parametros = {
                "id_usuario": id_usuario,
                "modo": modo,
                "id_producto": id_producto,
                "id_proveedor": id_proveedor,
                "id_orden": id_orden,
                "fecha": fechacompra,
                "kilo": kilo,
                "nref": numero,
                "agrstock": agrstock,
                "costoxcaj": costoxcaj,
                "costo": costo,
                "tipo": tipo,
                "descuento": descuento,
                "pcondescu": pcondescu,
                "iibb_bsas": iibb_bsas,
                "iibb_caba": iibb_caba,
                "perc_iva": perc_iva,
                "iva": iva,
                "pbruto": pbruto,
                "desadi": desadi,
                "costo_total": costo_total,
                "costoxcaja": costoxcaja,
                "unid_bulto": unid_bulto,
                "cpratotal_prod": comtotal,
                "editar": 1,
                "iditem": iditem,
                "fecven": document.getElementById('fecven').value,

            };
            $.ajax({
                data: parametros,
                url: 'insert_item.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroordenv").html('');
                },
                success: function(response) {
                    $("#muestroordenv").html(response);
                }
            });
        } else {

            document.getElementById('fecven').focus();
        }

    }

    /* Mod R */
    function ajax_precioprodrmod(id_usuarior, modor, id_productor, id_proveedorr, id_ordenr, fechacompra, kilor, numeror, agrstockr, costoxcajr, costor, tipor, descuentor, pcondescur, iibb_bsasr, iibb_cabar, perc_ivar, ivar, pbrutor, desadir, costo_totalr, costoxcajar, unid_bultor, comtotalr, iditemr) {
        if (document.getElementById('fecven').value != "") {
            var parametros = {
                "id_usuario": id_usuarior,
                "modo": modor,
                "id_producto": id_productor,
                "id_proveedor": id_proveedorr,
                "id_orden": id_ordenr,
                "fecha": fechacompra,
                "kilo": kilor,
                "nref": numeror,
                "agrstock": agrstockr,
                "costoxcaj": costoxcajr,
                "costo": costor,
                "tipo": tipor,
                "descuento": descuentor,
                "pcondescu": pcondescur,
                "iibb_bsas": iibb_bsasr,
                "iibb_caba": iibb_cabar,
                "perc_iva": perc_ivar,
                "iva": ivar,
                "pbruto": pbrutor,
                "desadi": desadir,
                "costo_total": costo_totalr,
                "costoxcaja": costoxcajar,
                "unid_bulto": unid_bultor,
                "cpratotal_prod": comtotalr,
                "editar": 1,
                "iditemr": iditemr,
                "fecven": document.getElementById('fecven').value,


            };
            $.ajax({
                data: parametros,
                url: 'insert_itemr.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroordenvr").html('');
                },
                success: function(response) {
                    $("#muestroordenvr").html(response);
                }
            });
        } else {

            document.getElementById('fecven').focus();
        }

    }
</script>

<script>
    function ajax_numerofac(numero, numeror) {

        var parametros = {
            "numero": numero,
            "numeror": numeror,
            "id_orden": <?= $id_orden ?>
        };
        $.ajax({
            data: parametros,
            url: 'numerofac.php',
            type: 'POST',
            beforeSend: function() {
                $("#muestroordenf").html('');
            },
            secondary: function(response) {
                $("#muestroordenf").html(response);
            }
        });

    }
</script>

<? if (!empty($idproducto)) { ?>
    <script>
        function ajax_proenllista() {

            var parametros = {
                "id_producto": <?= $idproducto ?>,
                "id_proveedor": <?= $id_proveedor ?>,
                "id_orden": <?= $id_orden ?>
            };
            $.ajax({
                data: parametros,
                url: 'insert_prom.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroordenfprs").html('');
                },
                success: function(response) {
                    $("#muestroordenfprs").html(response);
                }
            });

        }

        // Verifica si numero tiene datos
        function delayedAjax() {
            if (document.getElementById('fecven').value != "") {
                $("#muestroordenfp").html('<img src="../assets/images/loader.gif"><br>Un momento...');
                // Agrega un retardo de 3 segundos (3000 milisegundos) antes de llamar a ajax_proenllista()

                setTimeout(function() {
                    ajax_proenllista();
                }, 1000);
            }
        }
    </script>
<? } ?>









<script>
    function ajax_elimina(iditem) {
        var parametros = {
            "iditem": iditem,
            "id_proveedor": <?= $id_proveedor ?>
        };
        $.ajax({
            data: parametros,
            url: 'eliminar.php',
            type: 'POST',
            beforeSend: function() {
                $("#muestroorden2").html('');
            },
            success: function(response) {
                $("#muestroorden2").html(response);
            }
        });
    }
</script>

<script>
    function ajax_eliminar(iditem) {
        var parametros = {
            "iditem": iditem,
            "id_proveedor": <?= $id_proveedor ?>
        };
        $.ajax({
            data: parametros,
            url: 'eliminar.php',
            type: 'POST',
            beforeSend: function() {
                $("#muestroorden2r").html('');
            },
            success: function(response) {
                $("#muestroorden2r").html(response);
            }
        });
    }
</script>

<script>
    function ajax_cerrarorden() {
        var parametros = {
            "cerrado": <?= $cerrado ?>,
            "id_proveedor": <?= $id_proveedor ?>,
            "id_orden": <?= $id_orden ?>,
        };
        $.ajax({
            data: parametros,
            url: 'CerrarOrden.php',
            type: 'POST',
            beforeSend: function() {
                $("#muestroorden8r").html('');
            },
            success: function(response) {
                $("#muestroorden8r").html(response);
            }
        });
    }
</script>







<!--     <script>
        function ajax_buscar(producto) {
            var parametros = {
                "producto": producto,
                "id_proveedor": <? //= $id_proveedor 
                                ?>
            };
            $.ajax({
                data: parametros,
                url: 'buscar.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestrobus").html('');
                },
                success: function(response) {
                    $("#muestrobus").html(response);
                }

            });

        }
    </script> -->


<script>
    function detectarEnter(event) {
        if (event.key === 'Enter') {
            ajax_ordenprovee($('#producto').val(), $('#unidad').val(), $('#cantidad').val(), $('#numero').val());
        }
    }

    function detectarEnterb(event) {
        if (event.key === 'Enter') {
            document.getElementById('producto').focus();
        }
    }
</script>
<?php } ?>
</div>

<script>
    function enviar_bsuqueda(valor) {
        //Pasa los parámetros a la pagina buscar
        location.href = '?ookdjfv=' + valor;



    }

    function enviar_valoresb(valor) {
        //Pasa los parámetros a la pagina buscar
        location.href = '?ookdjfv=' + valor;



    }


    function enviar_valoresf(valor) {
        //Pasa los parámetros a la pagina buscar
        location.href = '?ookdjfv=<?= $id_proveedor ?>&id_orden=<?= $id_orden ?>&fechacompra=' + valor;

    }

    function ocultarpara() {
        document.getElementById('ocultasinpro').style.display = 'none';
        document.getElementById('oculvence').style.display = 'none';
    }
    <? if ($focf == '1') { ?>
        document.getElementById('fecven').focus();
    <? } ?>


    function focuscant() {
        document.getElementById('agrstock').focus();
        document.getElementById('agrstock').select();
    }



    <? if (!empty($_GET['fechacompra'])) { ?>
        document.getElementById('numero').focus();
    <? } ?>

    function siguienteCampo(event, siguienteCampoId) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById(siguienteCampoId).focus();
        }
    }
</script>



<script>
    <? if (!empty($idproducto)) { ?>
        // Función que se llama cuando se presiona la tecla F
        function handleF5KeyPress(event) {
            if (event.key === 'Alt' || event.key === 'Control' || event.key === 'ControlLeft' || event.key === 'ControlRight') {

                if (document.getElementById('fecven').value === "") {
                    alert("¡Ingrese la fecha de vencimiento!");
                    document.getElementById('fecven').focus();
                } else {

                    ajax_precioprod<?= $axax ?>($('#id_usuario').val(), $('#modo').val(), $('#id_producto').val(), $('#id_proveedor').val(), $('#id_orden').val(), $('#fechacompra').val(), $('#kilo').val(), $('#numero').val(), $('#agrstock').val(), $('#costoxcaj').val(), $('#costo').val(), $('#tipo').val(), $('#descuento').val(), $('#pcondescu').val(), $('#iibb_bsas').val(), $('#iibb_caba').val(), $('#perc_iva').val(), $('#iva').val(), $('#pbruto').val(), $('#desadi').val(), $('#costo_total').val(), $('#costoxcaja').val(), $('#unid_bulto').val(), $('#comtotal').val(), $('#iditem').val());

                    ajax_precioprodr<?= $axax ?>($('#id_usuarior').val(), $('#modor').val(), $('#id_productor').val(), $('#id_proveedorr').val(), $('#id_ordenr').val(), $('#fechacompra').val(), $('#kilor').val(), $('#numeror').val(), $('#agrstockr').val(), $('#costoxcajr').val(), $('#costor').val(), $('#tipor').val(), $('#descuentor').val(), $('#pcondescur').val(), $('#iibb_bsasr').val(), $('#iibb_cabar').val(), $('#perc_ivar').val(), $('#ivar').val(), $('#pbrutor').val(), $('#desadir').val(), $('#costo_totalr').val(), $('#costoxcajar').val(), $('#unid_bultor').val(), $('#comtotalr').val(), $('#iditemr').val());

                    delayedAjax();
                }
            }
            if (e.keyCode === 27 || event.key === 'Escape') {
                location.href = '?ookdjfv=<?= $id_proveedor ?>&osert=1';
            }

        }




        // Agrega un event listener para el evento 'keydown' (tecla presionada)
        document.addEventListener('keydown', handleF5KeyPress);

    <? } ?>
</script>


<!-- Select2 js -->
<!-- <script src="../assets/plugins/select2/select2.min.js"></script>
<script src="../assets/js/custom/custom-form-select.js"></script> -->
<script>
    // Obtener todos los elementos con la clase 'autoReplace'
    var inputElements = document.querySelectorAll('.autoReplace');

    // Agregar un event listener a cada elemento input
    inputElements.forEach(function(inputElement) {
        inputElement.addEventListener("input", function() {
            // Obtener el valor actual del input
            var inputValue = inputElement.value;

            // Reemplazar puntos por comas
            var newValue = inputValue.replace(/\./g, ",");

            // Actualizar el valor del input con el nuevo valor
            inputElement.value = newValue;
        });
    });
</script>

<script>
    $(document).ready(function() {
        var indiceSeleccionado = -1;


        // Manejar el evento keyup para buscar mientras se escribe
        $('#busqueda').on('keyup', function(e) {
            if (event.key === 'Escape') { // Escape
                $('#resultado').empty(); // Vaciar el listado de resultados
                location.href = '?ookdjfv=<?= $id_proveedor ?>&osert=1';
            }
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('#resultado').length && !$(e.target).is('#busqueda')) {
                $('#resultado').empty();
            }
        });



        // Manejar el evento keydown para buscar mientras se escribe
        $('#busqueda').on('keyup', function(e) {
            var $resultados = $('#resultado p');
            var $idprov = <?= $id_proveedor ?>;

            if (e.keyCode === 38) { // Flecha arriba
                e.preventDefault();
                if (indiceSeleccionado > 0) {
                    indiceSeleccionado--;
                    actualizarSeleccion($resultados);
                }
            } else if (e.keyCode === 40) { // Flecha abajo
                e.preventDefault();
                if (indiceSeleccionado < $resultados.length - 1) {
                    indiceSeleccionado++;
                    actualizarSeleccion($resultados);
                }
            } else if (event.key === 'Enter') { // Enter


                e.preventDefault();
                if (indiceSeleccionado !== -1) {
                    // Aquí puedes hacer lo que necesites con el resultado seleccionado, por ejemplo:



                    // Construir la URL con el parámetro seleccionado
                    var seleccionado = $($resultados[indiceSeleccionado]).text();
                    var url = "?&focf=1&seleccion=" + encodeURIComponent(seleccionado) + '&ookdjfv=' + $idprov + '&id_orden=<?= $id_orden ?>';
                    // Redireccionar a la URL
                    window.location.href = url;


                }





            } else {
                // Si se presiona otra tecla, realizar la búsqueda
                realizarBusqueda();
            }
        });

        // Manejar el evento click en los resultados de la búsqueda
        $(document).on('click', '#resultado p', function() {
            indiceSeleccionado = $(this).index();
            actualizarSeleccion($('#resultado p'));
            $('#busqueda').focus(); // Mantener el foco en el campo de búsqueda


            var seleccionado = $(this).text();
            var $idprov = <?= $id_proveedor ?>;
            var url = "?&focf=1&seleccion=" + encodeURIComponent(seleccionado) + '&ookdjfv=' + $idprov + '&id_orden=<?= $id_orden ?>';
            window.location.href = url;

        });



        function realizarBusqueda() {
            // Obtener los datos del formulario
            var formData = $('#formBusqueda').serialize();

            // Realizar la solicitud AJAX
            $.ajax({
                type: "POST",
                url: "buscar.php",
                data: formData,
                success: function(response) {
                    $('#resultado').html(response); // Actualizar los resultados en la página
                    indiceSeleccionado = -1; // Reiniciar el índice seleccionado
                }
            });
        }

        function actualizarSeleccion($resultados) {
            $resultados.removeClass('seleccionado');
            $($resultados[indiceSeleccionado]).addClass('seleccionado');
        }


    });
</script>

<script>
    function completarConCeros() {
        var numsuc = document.getElementById("numsuc").value.trim(); // Obtener el valor del input y eliminar espacios en blanco
        var numsucb = document.getElementById("numsucb").value; // Obtener el valor del otro input

        // Verificar si el número ingresado tiene menos de 5 dígitos
        if (numsuc.length < 5) {
            numsuc = numsuc.padStart(5, "0"); // Completar con ceros a la izquierda si tiene menos de 5 dígitos
        }

        // Añadir guion después de los primeros 5 dígitos
        numsuc = numsuc.substring(0, 5);

        document.getElementById("numsuc").value = numsuc; // Mostrar el número completo en el input
        document.getElementById("numero").value = numsuc + '-' + numsucb; // Mostrar el número completo en el input

    }

    // Detectar cuando el campo pierde el enfoque
    document.getElementById("numsuc").addEventListener('blur', completarConCeros);
</script>

<script>
    let inputLostFocus = false;

    function completarConCeros9() {
        var numeros = document.getElementById("numsuc").value;
        var numsucb = document.getElementById("numsucb").value.trim(); // Obtener el valor del input y eliminar espacios en blanco

        // Verificar si el número ingresado tiene menos de 8 dígitos
        if (numsucb.length < 8) {
            numsucb = numsucb.padStart(8, "0"); // Completar con ceros a la izquierda si tiene menos de 8 dígitos
        }

        // Añadir guion después de los primeros 8 dígitos
        numsucb = numsucb.substring(0, 8);

        document.getElementById("numsucb").value = numsucb; // Mostrar el número completo en el input
        document.getElementById("numero").value = numeros + '-' + numsucb; // Mostrar el número completo en el input
        numero = numeros + '-' + numsucb; // Mostrar el número completo en el input

        ajax_numerofac(numero, $('#numeror').val());
    }

    // Detectar cambios en el campo de entrada
    document.getElementById("numsucb").addEventListener('input', function() {
        if (inputLostFocus) {
            completarConCeros9();
            inputLostFocus = false; // Resetear el estado
        }
    });

    // Detectar cuando el campo pierde el enfoque
    document.getElementById("numsucb").addEventListener('blur', function() {
        inputLostFocus = true;
        // Llamar a la función para completar el número
        completarConCeros9();
    });
</script>

<script>
    // Obtener todos los inputs
    var inputs = document.querySelectorAll('input[type="text"]');

    // Iterar sobre cada input y establecer autocomplete en "off"
    inputs.forEach(function(input) {
        input.setAttribute('autocomplete', 'off');
    });


    function cerrarVentana() {
        // Intentar cerrar la ventana actual
        window.close();
    }
</script>
<div id="venciminediv"></div>

<script>
    function ajax_vencimientor(fecven) {
        var parametros = {
            "fecven": fecven
        };
        $.ajax({
            data: parametros,
            url: 'vencimientoses.php',
            type: 'POST',
            beforeSend: function() {
                $("#venciminediv").html('');
            },
            success: function(response) {
                $("#venciminediv").html(response);
            }
        });
    }
</script>

<br>
<br>
<div class="container">
    <div class="row" style="position: relative; top: 50px; width: 100%;">
        <div class="col-4">
        </div>
        <div class="col-4 "><a onclick="cerrarVentana()" tabindex="-1">
                <button type="button" class="btn btn-danger" tabindex="-1">Salir</button>
            </a>
        </div>

        <div class="col-4">
        </div>
    </div>

</div>
<script>
    function cerrarVentana() {
        window.close();
    }
</script>
</body>

</html>