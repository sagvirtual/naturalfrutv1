<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');
include('template/cabezal.php');
require_once('funciones/funcionAlaVenc.php');

unset($_SESSION["jfnddhom"]);
unset($_SESSION["pagina"]);
unset($_SESSION["busquedads"]);
unset($_SESSION["ookdjfv"]);


function prosinpre($rjdhfbpqj)
{
    $canverificafin = 0;

    $sql = "
                        SELECT p.id AS id_producto, p.nombre, pp.costo_total, pp.mpa
                        FROM productos p
                        LEFT JOIN (
                            SELECT pr1.*
                            FROM precioprod pr1
                            INNER JOIN (
                                SELECT id_producto, MAX(CONCAT(fecha, LPAD(id, 10, '0'))) AS max_fecha_id
                                FROM precioprod
                                WHERE cerrado = '1' AND confirmado = '1'
                                GROUP BY id_producto
                            ) pr2 ON pr1.id_producto = pr2.id_producto 
                                AND CONCAT(pr1.fecha, LPAD(pr1.id, 10, '0')) = pr2.max_fecha_id
                        ) pp ON p.id = pp.id_producto
                        WHERE p.estado = '0'
                        ORDER BY p.nombre ASC
                    ";

    $result = mysqli_query($rjdhfbpqj, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $costo_total = isset($row['costo_total']) ? $row['costo_total'] : 0;
        $mpa = isset($row['mpa']) ? $row['mpa'] : 0;

        if ($costo_total >= $mpa || $costo_total == 0) {
            $canverificafin++;
        }
    }

    if ($canverificafin > 0) {
        echo '<span class="badge badge-pill badge-danger" style="position: absolute; top:20px; left:300px; font-size: 20pt;">' . $canverificafin . '</span>';
    }
}


function vercantfactur($rjdhfbpqj, $fechahoy, $modo)
{


    $fechaObj = new DateTime($fechahoy);
    // Restar un mes
    $fechaObj->modify('-3 month');
    // Obtener la fecha modificada
    $fechaini = $fechaObj->format("Y-m-d");

    if ($fechaini < '2025-04-01') {
        $fechaini = '2025-04-01';
    } else {
        $fechaini = $fechaObj->format("Y-m-d");
    }

    $cantiparfac = 0;
    $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT id,totalivas,fecha,ivaporsen FROM orden Where ivaporsen >= '4' and fecha>='$fechaini' ");
    while ($rowordenx = mysqli_fetch_array($sqlordenx)) {

        $id_orden = $rowordenx['id'];


        $sqlordendx = mysqli_query($rjdhfbpqj, "SELECT id_orden,emitida FROM facturacion Where id_orden='$id_orden'");
        if ($roworded = mysqli_fetch_array($sqlordendx)) {

            $emitida = $roworded['emitida'];
        } else {
            $emitida = 0;
        }

        if ($emitida != 1) {
            $cantiparfac = $cantiparfac + 1;
        }
    }

    echo '<span class="badge badge-pill badge-danger" style="position: absolute; top:20px; left:300px; font-size: 20pt;">' . $cantiparfac . '</span>';
    // return $cantiparfac + 0;

}
function ordecomccant($rjdhfbpqj, $id_usuarioclav)
{

    $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT fecha,enviado,id FROM ordencompra WHERE enviado = '0' and quien='$id_usuarioclav'");

    $canverificafin = mysqli_num_rows($sqlordenr);
    if ($canverificafin != '0') {
        echo '
                        <span class="badge badge-pill badge-danger" style="position: absolute; top:20px; left:300px; font-size: 20pt;">
                        ' . $canverificafin . '
                        </span>';
    }
}
function devolucionese($rjdhfbpqj)
{

    $canverificafin = 0;
    $sqlfeinicioveriin = mysqli_query($rjdhfbpqj, "SELECT destino FROM item_devolu WHERE  destino='0'");
    $canverificafin = mysqli_num_rows($sqlfeinicioveriin);


    if ($canverificafin != '0') {

        echo '<span class="badge badge-pill badge-danger" style="position: absolute; top:20px; left:300px; font-size: 20pt;">' . $canverificafin . '</span>';
    }
}

function sinstoccant($rjdhfbpqj, $fechahoy)
{

    $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT producto,fecha,id_orden,id FROM itembajar WHERE fecha = '$fechahoy' AND sinstock = '1' ORDER BY producto ASC");

    $canverificafin = mysqli_num_rows($sqlordenr);
    if ($canverificafin != '0') {
        echo '
                    <span class="badge badge-pill badge-danger" style="position: absolute; top:20px; left:300px; font-size: 20pt;">
                    ' . $canverificafin . '
                    </span>';
    }
}


function canconf($rjdhfbpqj)
{
    $query = "
                    SELECT 
                        a.id, 
                        a.id_producto, 
                        a.costo_total AS costo_actual, 
                        (
                            SELECT costo_total 
                            FROM precioprod b 
                            WHERE b.id_producto = a.id_producto 
                            AND b.cerrado = '1' 
                            AND b.confirmado = '1' 
                            ORDER BY b.fecha DESC, b.id DESC 
                            LIMIT 1
                        ) AS costo_anterior
                    FROM precioprod a
                    WHERE a.cerrado = '1' 
                    AND a.confirmado = '0' 
                    AND a.nref = 'Compra'
                    ORDER BY a.fecha DESC, a.id DESC
                ";

    $resultado = mysqli_query($rjdhfbpqj, $query);

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $id = $fila['id'];
        $costo_actual = number_format($fila['costo_actual'], 0, ',', '');
        $costo_anterior = number_format($fila['costo_anterior'], 0, ',', '');

        if ($costo_actual === $costo_anterior) {
            $update = "UPDATE precioprod SET confirmado = '3' WHERE id = '$id'";
            mysqli_query($rjdhfbpqj, $update);
        }
    }

    $verificacion = mysqli_query($rjdhfbpqj, "
                        SELECT COUNT(*) AS cantidad 
                        FROM precioprod 
                        WHERE cerrado = '1' AND confirmado = '0' AND nref = 'Compra'
                    ");

    $fila_verificacion = mysqli_fetch_assoc($verificacion);
    $canverificafin = $fila_verificacion['cantidad'];

    if ($canverificafin != 0) {
        echo '<span class="badge badge-pill badge-danger" style="position: absolute; top:20px; left:300px; font-size: 20pt;">' . $canverificafin . ' </span>';
    }
}

function canconfold($rjdhfbpqj)
{

    $sqlsoprod = mysqli_query($rjdhfbpqj, "SELECT costo_total,id_producto,fecha,confirmado,id FROM precioprod WHERE  cerrado = '1' and confirmado='0' and nref='Compra' ORDER BY fecha DESC, id DESC;");

    while ($rowprdoprod = mysqli_fetch_array($sqlsoprod)) {

        $idddspro = $rowprdoprod['id'];
        $idpe = $rowprdoprod['id_producto'];
        $costo_total = number_format($rowprdoprod['costo_total'], 0, ',', '');

        /* me fijo valor anterior */
        $sqlsopd = mysqli_query($rjdhfbpqj, "SELECT costo_total,id_producto,fecha,confirmado,cerrado FROM precioprod WHERE id_producto='$idpe' and cerrado = '1' and confirmado='1' ORDER BY fecha DESC, id DESC;");
        if ($rowpdprod = mysqli_fetch_array($sqlsopd)) {
            $costo_totalold = number_format($rowpdprod['costo_total'], 0, ',', '');
        }



        if ($costo_total == $costo_totalold) {

            $sqlordend = "Update precioprod Set confirmado='3' Where id = '$idddspro'";
            mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
        }
    }


    $sqlsoprod = mysqli_query($rjdhfbpqj, "SELECT nref,fecha,confirmado,id,cerrado FROM precioprod WHERE  cerrado = '1' and confirmado='0' and nref='Compra'");
    $canverificafin = mysqli_num_rows($sqlsoprod);
    if ($canverificafin != '0') {
        echo '<span class="badge badge-pill badge-danger" style="position: absolute; top:20px; left:300px; font-size: 20pt;">' . $canverificafin . ' </span>';
    }
}
?>
<style>
    a.enlace-negro {
        color: black !important;
        text-decoration: none;
    }

    a.enlace-negro:hover {
        color: #333;
        /* un gris oscuro al pasar el mouse */
    }
</style>
<META HTTP-EQUIV="REFRESH" CONTENT="1600000;">
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-12">
            <a href="/">
                <h4 class="page-title"><i class="feather icon-package"></i>Inicio</h4>
            </a>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<div class="contentbar">



    <!-- Start row -->


    <?
    if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "30" || $tipo_usuario == "3" || $tipo_usuario == "1"  || $tipo_usuario == "37") {
    ?>

        <div class="alert alert-dark" role="alert" class="col-12" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer;">
            VENTAS
        </div>

        <div id="collapseExample1" class="row collapse show">

            <? if ($tipo_usuario == '30') { ?>

                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="/preparacionpedidos" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-primary text-white rounded align-self-center mr-3">
                                            <i class="fa fa-file-text"></i>
                                        </span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Preparación de Pedidos</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>



            <?
            }
            ?>

            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "3" || $tipo_usuario == "1"  || $tipo_usuario == "30") {
            ?>
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <li class="media">
                                    <span class="iconbar iconbar-md bg-warning text-white rounded align-self-center mr-3"> <i class="feather icon-package "></i></span>
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 font-16 enlace-negro">Lista de Precios

                                            <a href="/lista_de_precios/excel_lista" target="_parent">
                                                <button type="button" class="btn btn-rounded btn-success" style="float:right;">Excel</button>
                                            </a>
                                        </h5>

                                        <a href="/lista_de_precios/" target="_parent">
                                            <p class="mb-0">Ingresar</p>
                                        </a>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
            <?php

            }
            ?>


            <?
            if ($tipo_usuario == "3") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/nota_de_pedido/" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-primary text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Nueva Orden</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>
            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "3" || $tipo_usuario == "37" || $tipo_usuario == "1" || $tipo_usuario == "30") {
            ?>

                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/notadepedido.php" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-info text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Notas de pedidos</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
            <?
            if ($tipo_usuario == "0") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/ofertas_productos/" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-warning text-white rounded align-self-center mr-3"><i class="feather icon-package "></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Ofertas Productos</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>
            <?
            if ($tipo_usuario == "0") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/cliente_ofertas/" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-danger text-white rounded align-self-center mr-3"><i class="feather icon-package "></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Ofertas Clientes</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>
            <?
            if ($tipo_usuario == "0") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/listado_presupuesto" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-success text-white rounded align-self-center mr-3"><i class="feather icon-package "></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Presupuestos</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>

            <? } ?>
        </div>
    <? }
    ?>


    <?
    if ($tipo_usuario == "0"  || $tipo_usuario == '3') {
    ?>


        <div class="alert alert-dark" role="alert" class="col-12" data-toggle="collapse" href="#collapseExample6" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer;">

            REPORTES
        </div>
        <div id="collapseExample6" class="row collapse">


            <? if ($tipo_usuario == '0' || $tipo_usuario == '3') { ?>

                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="/tiempo_compra.php" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-success text-white rounded align-self-center mr-3">
                                            <i class="fa fa-file-text"></i>
                                        </span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Flujo de Compra Clientes</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>



                <?
            }
                ?><? if ($tipo_usuario == '0') { ?>

                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="/facturacion/reporteFacturacion" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-primary text-white rounded align-self-center mr-3">
                                            <i class="fa fa-file-text"></i>
                                        </span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Reporte Facturación</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>



            <?
                    }
            ?>

        </div>
    <?
    }
    ?>


    <?php
    if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "3" || $tipo_usuario == "1" || $tipo_usuario == "37") {

    ?>


        <div class="alert alert-dark" role="alert" class="col-12" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer;">
            SEGUIMIENTO CONTROLES CONFIRMACIONES
        </div>

        <div id="collapseExample2" class="row collapse">


            <?php
            if ($tipo_usuario == "0" || $tipo_usuario == "33"  || $tipo_usuario == "1") {

            ?>
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/control" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-warning text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Control Deposito/Envasado</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>





            <? if ($tipo_usuario == '0') { ?>
                <!-- Start col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="/confirmarproducto/" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-info text-white rounded align-self-center mr-3"> <i class="feather dripicons-document"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Confirmar Precios Prod.</h5>
                                            <p class="mb-0">Ingresar</p>

                                            <?php

                                            canconf($rjdhfbpqj);

                                            ?>

                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>

            <? } ?>


            <? if ($tipo_usuario == '0'  || $tipo_usuario == "33" || $tipo_usuario == "1") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="/alarmastock/" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-success text-white rounded align-self-center mr-3"> <i class="feather dripicons-document"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Alarma de Stock</h5>
                                            <p class="mb-0">Ingresar</p>

                                            <?php

                                            // alarmavencicanti($rjdhfbpqj);


                                            ?>

                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="/alrmavencimientos/" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-success text-white rounded align-self-center mr-3"> <i class="feather dripicons-document"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Alarma de Vencimientos</h5>
                                            <p class="mb-0">Ingresar</p>

                                            <?php

                                            alarmavencicanti($rjdhfbpqj, $fechahoy);


                                            ?>

                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>


            <?





            if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "1") {
            ?>
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="/sinstok" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-danger text-white rounded align-self-center mr-3"> <i class="feather icon-package "></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Productos Sin Stock</h5>

                                            <p class="mb-0">Ingresar</p>

                                            <?
                                            sinstoccant($rjdhfbpqj, $fechahoy);
                                            ?>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
            <?php

            if ($tipo_usuario == "0"  || $tipo_usuario == "33"  || $tipo_usuario == "1" || $tipo_usuario == "3" || $tipo_usuario == "1" || $tipo_usuario == "37") {

            ?>

                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="/profaltantes/" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-primary text-white rounded align-self-center mr-3"> <i class="feather icon-package "></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Productos Faltantes</h5>

                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>



            <? if ($tipo_usuario == '0'  || $tipo_usuario == "1") { ?>



                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="/sinprecio" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-danger text-white rounded align-self-center mr-3"> <i class="feather icon-package "></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Productos Sin Precio</h5>
                                            <p class="mb-0">Ingresar</p>
                                            <?php
                                            prosinpre($rjdhfbpqj);
                                            ?>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>

            <? } ?>
            <?
            if ($tipo_usuario == "0" || $tipo_usuario == "33" || $tipo_usuario == "3" || $tipo_usuario == "1" || $tipo_usuario == "30") {
            ?>

                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/seguimiento" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-primary text-white rounded align-self-center mr-3"><i class="dripicons-clipboard"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Seguimientos Ordenes</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33") {
            ?>
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="/resumenes/repprod_pa" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-info text-white rounded align-self-center mr-3"> <i class="feather icon-package "></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Productos Repetidos</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>

            <?
            if ($tipo_usuario == "0" || $tipo_usuario == "33") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/statusorden/" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-primary text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Progreso Ordenes</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>
            <?
            if ($tipo_usuario == "0" || $tipo_usuario == "37") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/cajadiaria/" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-success text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Caja Diaria</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>

            <?
            if ($tipo_usuario == "0") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/gastos/" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-warning text-white rounded align-self-center mr-3"> <i class="ri-wallet-line"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Gastos</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>



            <?
            if ($tipo_usuario == "0") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/estadisticas.php" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-dark text-white rounded align-self-center mr-3"><i class="dripicons-graph-line"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Estadisticas Ventas</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?> <? if ($tipo_usuario == "0") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/produccionenva/" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-primary text-white rounded align-self-center mr-3"><i class="dripicons-graph-line"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Producción Envasado</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>
            <? if ($tipo_usuario == "0") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/balanceingreosno/" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-primary text-white rounded align-self-center mr-3"><i class="dripicons-graph-line"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Balance de Carg. Pedidos</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>

            <? if ($tipo_usuario == "0") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/registroordenes" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-danger text-white rounded align-self-center mr-3"><i class="dripicons-graph-line"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Actividades Pedidos</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>
            <? if ($tipo_usuario == "0") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/estadisticas/productos_eliminados" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-danger text-white rounded align-self-center mr-3"><i class="dripicons-graph-line"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Productos ELiminados en Pedidos</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/picking_error/lista_errores" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-danger text-white rounded align-self-center mr-3"><i class="dripicons-graph-line"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Productos C/Errores en Pedidos</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>

            <? } ?>
        </div>

    <?php
    }

    ?>


    <?php
    if ($tipo_usuario == "0"  || $tipo_usuario == "33" ||  $tipo_usuario == "30" || $tipo_usuario == "3" || $tipo_usuario == "1") {

    ?>

        <div class="alert alert-dark" role="alert" class="col-12" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer;">
            PRODUCTOS
        </div>

        <div id="collapseExample3" class="row collapse">




            <? if ($tipo_usuario == '0'  || $tipo_usuario == "33" || $tipo_usuario == '1') {

                if ($tipo_usuario == '0' || $tipo_usuario == "33") {
                    $nompro = 'Precios';
                }

            ?>
                <!-- Start col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="/productos" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-success text-white rounded align-self-center mr-3"> <i class="feather icon-package "></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16"><?= $nompro ?> Productos</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?       }   ?>




            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "57" || $tipo_usuario == "3" || $tipo_usuario == "1" || $tipo_usuario == "30") {
            ?>
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/control_de_stock" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-warning text-white rounded align-self-center mr-3"><i class="mdi mdi-chart-areaspline"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Control de Stock</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "57" || $tipo_usuario == "3" || $tipo_usuario == "1" || $tipo_usuario == "30") {
            ?>
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/stockeo/ingreso_egreso_stock" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-danger text-white rounded align-self-center mr-3"><i class="mdi mdi-chart-areaspline"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Ingreso Egreso Stock</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>

            <?
            if ($tipo_usuario == "30" || $tipo_usuario == "38") {
            ?>
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/preparacionpedidos/" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-primary text-white rounded align-self-center mr-3"><i class="mdi mdi-chart-areaspline"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Seguimiento Envasado y Deposito</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>

            <?
            if ($tipo_usuario == "022"  || $tipo_usuario == "30" || $tipo_usuario == "33") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="ordendevoluciones" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-warning text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Orden Devolución</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>

            <?
            if ($tipo_usuario == "0" || $tipo_usuario == "33" || $tipo_usuario == "1" || $tipo_usuario == "30") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/devoluciones/ordendevoladmin" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-success text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Devoluciones <?
                                                                                        if ($tipo_usuario == "0" || $tipo_usuario == "33" || $tipo_usuario == "1") {
                                                                                            devolucionese($rjdhfbpqj);
                                                                                        }

                                                                                        ?></h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>





            <? if ($tipo_usuario == '0' || $tipo_usuario == "33") { ?>
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="/deposito/infodeposito" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-dark text-white rounded align-self-center mr-3"> <i class="feather icon-package "></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Ubicación Pro. Deposito</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>


            <? } ?>


            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "3" || $tipo_usuario == "1" || $tipo_usuario == "30") {
            ?>
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/categoriasstock" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-warning text-white rounded align-self-center mr-3"><i class="mdi mdi-chart-areaspline"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Pdf Stock Productos</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "3" || $tipo_usuario == "1" || $tipo_usuario == "30") {
            ?>
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/categoriasstockSinStock.php" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-warning text-white rounded align-self-center mr-3"><i class="mdi mdi-chart-areaspline"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Pdf Productos sin Stock</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>

            <?php

            }
            ?>

        </div>
    <?php
    }

    ?>
    <?php
    if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "1"  || $tipo_usuario == "37" || $tipo_usuario == "30" || $id_usuarioclav == "83") {

    ?>


        <div class="alert alert-dark" role="alert" class="col-12" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer;">

            CLIENTES
        </div>
        <div id="collapseExample4" class="row collapse">



            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "37" ||  $tipo_usuario == "1") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/resumen_de_cuenta" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-success text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Resumen de Cuenta</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>


            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "1") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/concretadas" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-danger text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Ordenes Concretadas</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>




            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33" ||  $tipo_usuario == "37") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/ingreso_cobros" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-info text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Ingreso de Cobros</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>
            <?
            if ($tipo_usuario == "0"  ||  $tipo_usuario == "37") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="cajadiaria/estadopago" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-danger text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Estado de Cobros</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>
            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "1") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/notasdecredito" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-warning text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Nota de Crédito</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>







            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "1" || $tipo_usuario == "30") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/nota_de_pedido/" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-primary text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Nueva Orden</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>

            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "37") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/cheques" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-success text-white rounded align-self-center mr-3"><i class="ti-layout-cta-btn-right"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Cheques</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>
            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $id_usuarioclav == "83" || $tipo_usuario == "1") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/facturacion/?todas=1" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-primary text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Facturación</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                        <? vercantfactur($rjdhfbpqj, $fechahoy, $modo); ?>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <? } ?>

            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "1" || $tipo_usuario == "3") { ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/estadisticas/ventasproductos" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-warning text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Ventas Productos</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>

            <? } ?>

        </div>
    <?php
    }
    ?>
    <?
    if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "1"  || $tipo_usuario == "37") {
    ?>


        <div class="alert alert-dark" role="alert" class="col-12" data-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer;">
            PROVEEDORES
        </div>

        <div id="collapseExample5" class="row collapse">






            <?
            if ($tipo_usuario == "0" || $tipo_usuario == "1") {
            ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/compras_prov" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-info text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Compras Proveedor</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "37" || $tipo_usuario == "1") {
            ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/ordendecompra" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-primary text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Ordenes de Compra</h5>
                                            <p class="mb-0">Ingresar</p>
                                            <?
                                            ordecomccant($rjdhfbpqj, $id_usuarioclav);
                                            ?>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
            <?
            if ($tipo_usuario == "0"  || $tipo_usuario == "37" ||  $tipo_usuario == "1") {
            ?>


                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="/resumen_de_cuenta_prov" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-warning text-white rounded align-self-center mr-3"><i class="ri-calendar-event-line align-unset"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Resumen de Cuenta</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>

            <?php

            }
            ?>
        </div>
    <?
    }
    ?>
    <?
    if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "33") {
    ?>


        <div class="alert alert-dark" role="alert" class="col-12" data-toggle="collapse" href="#collapseExample6" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer;">

            GESTION OPERATIVA
        </div>
        <div id="collapseExample6" class="row collapse">


            <? if ($tipo_usuario == '0'  || $tipo_usuario == "33" || $tipo_usuario == "37" ||  $tipo_usuario == "1") { ?>

                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="/hoja_de_ruta/" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-success text-white rounded align-self-center mr-3">
                                            <i class="fa fa-file-text"></i>
                                        </span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Hoja de Ruta</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>



            <?
            }
            ?>


            <? if ($tipo_usuario == '0'  || $tipo_usuario == "33") { ?>

                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="/listasdeprecios" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-danger text-white rounded align-self-center mr-3"> <i class="feather dripicons-document"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Editar de Precios</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>

            <? } ?> <? if ($tipo_usuario == '0'  || $tipo_usuario == "33") { ?>

                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="/comprasproprov" target="_parent">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-primary text-white rounded align-self-center mr-3"> <i class="feather dripicons-document"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Lista Prove/Clientes</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>


            <? } ?>
        </div>

    <?
    }
    ?>



    <?php

    if ("1" == "2") {
        $fechadecod = $fechahoy;



        $fechaexplo = explode("-", $fechadecod);
        $diaymes = $fechaexplo[2] . "/" . $fechaexplo[1];

        $fechats = strtotime($fechadecod);
        $dayver = date('w', $fechats);

        $diaselec = $fechaexplo[2];

        if (!empty($diahoy)) {
            if ($dayver == '1') {
                $activla1 = "active";
                $selectearial1 = "true";
                $dianombr = "Lunes";
                $diasql = "position1";
            } else {
                $selectearial1 = "false";
            }
            if ($dayver == '2') {
                $activla2 = "active";
                $selectearial2 = "true";
                $dianombr = "Martes";
                $diasql = "position2";
            } else {
                $selectearial2 = "false";
            }
            if ($dayver == '3') {
                $activla3 = "active";
                $selectearial3 = "true";
                $dianombr = "Miercoles";
                $diasql = "position3";
            } else {
                $selectearial3 = "false";
            }
            if ($dayver == '4') {
                $activla4 = "active";
                $selectearial4 = "true";
                $dianombr = "Jueves";
                $diasql = "position4";
            } else {
                $selectearial4 = "false";
            }
            if ($dayver == '5') {
                $activla5 = "active";
                $selectearial5 = "true";
                $dianombr = "Viernes";
                $diasql = "position5";
            } else {
                $selectearial5 = "false";
            }
            if ($dayver == '6') {
                $activla6 = "active";
                $selectearial6 = "true";
                $dianombr = "Sábados";
                $diasql = "position6";
            } else {
                $selectearial6 = "false";
            }
            if ($dayver == '0') {
                $activla0 = "active";
                $selectearial0 = "true";
                $dianombr = "Domingos";
                $diasql = "position0";
            } else {
                $selectearial5 = "false";
            }
        }

        //hoja de ruta
        $sqlhoja = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja Where fecha = '$fechadecod'");
        while ($rowhoja = mysqli_fetch_array($sqlhoja)) {
            $ididcamioneta = $rowhoja['camioneta'];





            $querycliordn = mysqli_query($rjdhfbpqj, "SELECT e.id_cliente, e.finalizada, e.id as idorden, u.id, u.address, u.nom_empr, u.position1, u.position2, u.position3, u.position4, u.position5, u.position6, u.position0, u.dia_repart1, u.dia_repart2, u.dia_repart3, u.dia_repart4, u.dia_repart5, u.dia_repart6, u.dia_repart0, u.estado, e.camioneta FROM orden e INNER JOIN clientes u ON e.id_cliente = u.id WHERE e.fecha='$fechadecod' and u.estado='0'  and e.finalizada='0' and e.camioneta='$ididcamioneta' ORDER BY `position$dayver` ASC");
            if ($rowcategorias = mysqli_fetch_array($querycliordn)) {
                $idus = $rowcategorias["id_cliente"];
                $nuncamioneta = $rowcategorias["camioneta"];

                $idorden = $rowcategorias["idorden"];
                $idordencod = base64_encode($idorden);
                $cliente = $rowcategorias["address"] . ', (' . $rowcategorias["nom_empr"] . ')';
                $clientev = strtoupper($cliente);
            } else {
                $finrecorr = '1';
                $clientev = "no";
            }



            $sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM camionetas Where id = '$nuncamioneta'");
            if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
                $nombre = $rowcamionetas["nombre"];
            }

            if ($finrecorr != '122') {
    ?>
                <!-- Start col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Progreso Entrega <?= $fechahoyver ?> <?= $nombre ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6 col-lg-3">
                                    <div class="border-primary border rounded text-center py-3 mb-3">
                                        <h5 class="card-title text-primary mb-1">#<?= $idorden ?></h5>
                                        <p class="text-primary mb-0">Remito</p>
                                    </div>

                                </div>
                                <div class="col-6 col-lg-9">
                                    <p><?= $clientev ?></p>
                                    <?php

                                    //CANTIDAD TOTAL DE ORDENES
                                    $sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha = '$fechadecod' and camioneta='$ididcamioneta'");
                                    $cantidadordens = mysqli_num_rows($sqlorden);

                                    //CANTIDAD DE ORDENES FINALIZADAS
                                    $sqlordenF = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha = '$fechadecod'  and camioneta='$ididcamioneta' AND finalizada='1'");
                                    $cantidadordensF = mysqli_num_rows($sqlordenF);


                                    $portola = $cantidadordensF * 100 / $cantidadordens;
                                    $portolav = number_format($portola, 0, '', '');


                                    if ($portolav != '100') {

                                        echo '
                                    <span class="float-right" style="position:relative; top:-9px;">' . $portolav . '%</span>
                                    <div class="progress mb-3" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: ' . $portolav . '%;" aria-valuenow="' . $portolav . '" aria-valuemin="0" aria-valuemax="100"> </div>
                                    </div>


                                    ';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <? }
        }
    } ?>
    <!-- End col -->






</div>
</div>

</div>
</div>
</div>

<!-- End col -->

<!-- acaaaaa -->












<?php
mysqli_close($rjdhfbpqj);


include('template/pie.php'); ?>