<?php
$comilla = "'";
// Obtener la URL completa del archivo actual
$currentUrl = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


if ($currentUrl == "softwarenatfrut.com/") {

    $titulopes = "Panel general";
} elseif ($currentUrl == "softwarenatfrut.com/sinstok/") {

    $titulopes = "Sin Stock";
} elseif ($currentUrl == "softwarenatfrut.com/sinstok/index.php") {

    $titulopes = "Sin Stock";
} elseif ($currentUrl == "softwarenatfrut.com/resumenes/repprod_pa") {

    $titulopes = "Prod. Repetidos";
} elseif ($currentUrl == "softwarenatfrut.com/compras_prov") {

    $titulopes = "Com. Proveedor";
} elseif ($currentUrl == "softwarenatfrut.com/notadepedido.php") {

    $titulopes = "Not. Pedidos";
} elseif ($currentUrl == "softwarenatfrut.com/control_de_stock") {

    $titulopes = "Stock";
} elseif ($currentUrl == "softwarenatfrut.com/productos") {

    $titulopes = "Productos";
} elseif ($currentUrl == "softwarenatfrut.com/hoja_de_ruta/") {

    $titulopes = "Hoja Ruta";
} elseif ($currentUrl == "softwarenatfrut.com/sinprecio/") {

    $titulopes = "Sin Precio";
} elseif ($currentUrl == "softwarenatfrut.com/listasdeprecios") {

    $titulopes = "Listas Precios";
} elseif ($currentUrl == "softwarenatfrut.com/confirmarproducto/") {

    $titulopes = "Conf. Precios";
} elseif ($currentUrl == "softwarenatfrut.com/alrmavencimientos/") {

    $titulopes = "Alarm. vencimientos";
}


/* function isMobileDevice() {
    return preg_match('/(android|iphone|ipad|ipod|blackberry|windows phone)/i', $_SERVER['HTTP_USER_AGENT']);
}

if (isMobileDevice()) {
    header("Location: ../module/");
    exit;
} 
    
include($_SERVER['DOCUMENT_ROOT'] . '/f54du60ig65.php');
include($_SERVER['DOCUMENT_ROOT'] . '/lusuarios/login.php');

*/
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?= $titulopes ?> - Natural Frut</title>
    <meta name="robots" content="noindex">
    <!--   <link rel="manifest" href="manifest.json"> -->
    <!-- Fevicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <!-- Start css -->
    <!-- Switchery css -->
    <!--  <link href="../../assets/plugins/switchery/switchery.min.css" rel="stylesheet"> -->
    <!--    <META HTTP-EQUIV="REFRESH" CONTENT="12"> -->

    <!-- Touchspin css -->
    <!--   <link href="../assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css"> -->

    <!-- Apex css -->
    <!-- <link href="../../assets/plugins/apexcharts/apexcharts.css" rel="stylesheet"> -->
    <!-- Slick css -->
    <!-- <link href="../../assets/plugins/slick/slick.css" rel="stylesheet">
    <link href="../assets/plugins/slick/slick-theme.css" rel="stylesheet"> -->

    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/icons.css" rel="stylesheet" type="text/css">
    <!--  <link href="../../assets/css/flag-icon.min.css" rel="stylesheet" type="text/css"> -->
    <link href="../../assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />


    <style>
        /* --- CELULAR / MOBILE --- */
        @media (max-width: 1023px) {
            body {
                zoom: 100%;
            }
        }

        /* --- ESCRITORIO / PC --- */
        @media (min-width: 1024px) {
            body {
                zoom: 85%;
            }
        }
    </style>
    <!-- End css -->
</head>

<?php

if (!empty($_GET['jfnddhom'])) {
    echo '<body class="vertical-layout toggle-menu" onload="ajax_buscars();">';
} else {
    echo '<body class="vertical-layout toggle-menu">';
}

?>
<style>
    @media (min-width: 1024px) {
        .alturas {
            position: relative;
            top: -90px;
        }
    }

    #mensajeActualizado {
        display: none;
        position: fixed;
        top: 35%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(0, 128, 0, 0.9);
        color: white;
        padding: 20px 40px;
        font-size: 24px;
        font-family: sans-serif;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        z-index: 9999;
        animation: fadeOut 2s forwards;
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }

        80% {
            opacity: 1;
        }

        100% {
            opacity: 0;
            display: none;
        }
    }
</style>
<div id="mensajeActualizado"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffffff">
        <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q65 0 123 19t107 53l-58 59q-38-24-81-37.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160q133 0 226.5-93.5T800-480q0-18-2-36t-6-35l65-65q11 32 17 66t6 70q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-56-216L254-466l56-56 114 114 400-401 56 56-456 457Z" />
    </svg> Actualizado...</div>
<!-- Start Containerbar -->
<div id="containerbar">
    <!-- Start Leftbar -->
    <div class="leftbar">
        <!-- Start Sidebar -->
        <div class="sidebar">
            <!-- Start Logobar -->
            <div class="logobar">
                <a href="../" class="logo-large"><img src="/assets/images/logo.png" class="img-fluid" alt="logo" style="padding: 3px;"></a>
                <!--   <a href="index" class="logo logo-small"><img src="assets/images/small_logo.png" class="img-fluid" alt="logo"></a> -->
            </div>
            <!-- End Logobar -->
            <!-- Start Navigationbar -->
            <div class="navigationbar">

                <ul class="vertical-menu">

                    <!-- 
                        <li class="vertical-header">Organizacion</li>
                        <li>
                            <a href="javaScript:void();">
                                <i class="ti-map-alt"></i><span>Planiamiento</span><i class="ri-arrow-right-s-line"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="/hoja_de_ruta">Hoja de Ruta</a></li>
                                <li><a href="/orden">Remitos Clientes</a></li>
                                <li><a href="/orden_de_compra">Orden de Proveedor </a></li>
                                <li><a href="/caja">Caja Diaria</a></li>

                            </ul>
                        </li> -->
                    <li>
                        <a href="../">
                            <i class="dripicons-home"></i><span>Inicio</span>
                        </a>

                    </li>
                    <li class="vertical-header">Administrativo</li>

                    <li>
                        <a href="javaScript:void();">
                            <i class="sl-icon-people"></i><span>Clientes</span><i class="ri-arrow-right-s-line"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <? if ($tipo_usuario == '0'  || $tipo_usuario == "33" || $tipo_usuario == '3'  || $tipo_usuario == '1') { ?>
                                <li><a href="/clientes">Datos Clientes</a></li>
                            <? } ?>
                            <? if ($tipo_usuario == '0' || $tipo_usuario == "33" || $tipo_usuario == '3' || $tipo_usuario == '1') { ?>
                                <li><a href="/notadepedido">Notas de Pedidos</a></li>
                            <? } ?>
                            <? if ($tipo_usuario == '0' || $tipo_usuario == "33" || $tipo_usuario == '3' || $tipo_usuario == '1') { ?>
                                <li><a href="/hoja_de_ruta/">Hoja de Ruta</a></li>
                            <? } ?>
                            <? if ($tipo_usuario == '0'   || $tipo_usuario == "33" || $tipo_usuario == '1'  || $tipo_usuario == '37') { ?>
                                <li><a href="/resumen_de_cuenta">Resumen de Cuenta</a></li>
                            <? } ?>

                            <? if ($tipo_usuario == '0'  || $tipo_usuario == "33" || $tipo_usuario == '1' || $tipo_usuario == '3') { ?>
                                <li><a href="/concretadas">Notas Concretadas</a></li>
                            <? } ?>

                            <? if ($tipo_usuario == '0'  || $tipo_usuario == "33" || $tipo_usuario == '1') { ?>
                                <li><a href="/notasdecredito">Nota de credito</a></li>
                            <? } ?>
                            <?
                            if ($tipo_usuario == '0'  || $tipo_usuario == "33" || $tipo_usuario == '37') { ?>
                                <li><a href="/ingreso_cobros">Ingreso de Cobros</a></li>
                            <? } ?>

                            <? if ($tipo_usuario == '0'  || $tipo_usuario == "33" || $tipo_usuario == '1' || $tipo_usuario == '3') { ?>
                                <li><a href="/estadisticas/ventasproductos">Ventas Productos</a></li>
                            <? } ?>
                            <? if ($tipo_usuario == '0'  || $tipo_usuario == "33" || $tipo_usuario == '1' || $tipo_usuario == '3') { ?>
                                <li><a href="/estadisticas/nota_credito_productos">Crédito Productos</a></li>
                            <? } ?>
                            <? if ($tipo_usuario == '0'  || $tipo_usuario == "33" || $tipo_usuario == '1' || $tipo_usuario == '3') { ?>
                                <li><a href="/estadisticas/faltantesproductos">Faltantes Prod/Precio</a></li>
                            <? } ?>
                            <? if ($tipo_usuario == '0' || $tipo_usuario == "33") { ?>
                                <li><a href="/estadisticas/ventasordenes">⁠Total Ventas</a></li>
                            <? } ?>
                            <? if ($tipo_usuario == '0' || $tipo_usuario == "33") { ?>
                                <li><a href="/estadisticas/total_notas_creditos">⁠Total N/Créditos</a></li>
                            <? } ?>
                            <!--  <li><a href="/deuda_clientes">Deuda Clientes</a></li>
                                <li><a href="/cuenta_clientes">Reporte Clientes</a></li>
                                <li><a href="/cheques">Cheques</a></li> -->
                        </ul>
                    </li>


                    <? if ($tipo_usuario == '0'  || $tipo_usuario == "33" || $tipo_usuario == '1' || $tipo_usuario == '37') { ?>


                        <li>

                            <a href="javaScript:void();">
                                <i class="dripicons-user-group"></i><span>Proveedores</span><i class="ri-arrow-right-s-line"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <? if ($tipo_usuario == '0'  || $tipo_usuario == "33" || $tipo_usuario == '1') { ?>
                                    <li><a href="/compra_proveedor" target="_blank">Cargar Compras</a></li>
                                <? } ?>
                                <? if ($tipo_usuario == '0'   || $tipo_usuario == "33" || $tipo_usuario == '1') { ?>
                                    <li><a href="/compras_prov">Compras Proveedores</a></li>
                                <? } ?>
                                <? if ($tipo_usuario == '0'  || $tipo_usuario == "33" || $tipo_usuario == '1') { ?>
                                    <li><a href="/compras_realizadas">Compras Productos</a></li>

                                <? } ?>
                                <? if ($tipo_usuario == '0'   || $tipo_usuario == "33" || $tipo_usuario == '1' || $tipo_usuario == '37') { ?>
                                    <li><a href="/resumen_de_cuenta_prov">Resumen de Cuenta</a></li>
                                <? } ?>
                                <? if ($tipo_usuario == '0'   || $tipo_usuario == "33" || $tipo_usuario == '1' || $tipo_usuario == '37') { ?>
                                    <li><a href="/ordendecompra">Ordenes de Compra</a></li>
                                <? } ?>
                                <? if ($tipo_usuario == '0'   || $tipo_usuario == "33" || $tipo_usuario == '1' || $tipo_usuario == '37') { ?>
                                    <li><a href="/ordenesconcretadas">Ordenes Concretadas</a></li>
                                <? } ?>
                                <? if ($tipo_usuario == '0'   || $tipo_usuario == "33" || $tipo_usuario == '1') { ?>
                                    <li><a href="/proveedor">Datos Proveedores</a></li>
                                <? } ?>
                            </ul>
                        </li>
                    <? }
                    if ($tipo_usuario == '0'  || $tipo_usuario == "33") { ?>
                        <!--  <li>
                            <a href="javaScript:void();">
                                <i class="mdi mdi-chart-line"></i><span>Balance</span><i class="ri-arrow-right-s-line"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="/balances/">Ganancias Ventas</a></li>
                            </ul>
                        </li>-->
                    <? } ?>
                    <li style="display: none;">
                        <a href="javaScript:void();">
                            <i class="dripicons-checklist"></i><span>Lista de Precios</span><i class="ri-arrow-right-s-line"></i>
                        </a>
                        <ul class="vertical-submenu">

                            <?php

                            $sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM rubros Where estado = '0' ORDER BY `rubros`.`id` ASC");
                            while ($rowrubros = mysqli_fetch_array($sqlrubros)) {
                                $filaidr = $filaidr + 1;


                                $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id_rubro$filaidr='1'");
                                if ($rowproductosv = mysqli_fetch_array($sqlproductosv)) {
                                    echo '
                                     <li>
                                    <p style="padding-left:23px;">' . $rowrubros["nombre"] . ' </p>
                                     <a href="/salidas/listadeprecios?list=1&modolist=1&listaid=' . $rowrubros["id"] . '&ordenrub=' . $filaidr . '" target="_blank">Minorista</a>
                                     <a href="/salidas/listadeprecios?list=2&modolist=2&listaid=' . $rowrubros["id"] . '&ordenrub=' . $filaidr . '" target="_blank">Mayorista</a>
                                     <a href="/salidas/listadeprecios?list=3&modolist=3&listaid=' . $rowrubros["id"] . '&ordenrub=' . $filaidr . '" target="_blank">Distribuidor</a><hr></li>
                                     ';
                                }
                            }
                            ?>
                        </ul>
                    </li>
                    <!-- <li>
                            <a href="javaScript:void();">
                                <i class="ri-bar-chart-line"></i><span>Balances</span><i class="ri-arrow-right-s-line"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="#">Ventas</a></li>
                                <li><a href="#">Gastos</a></li>
                            </ul>
                        </li> -->

                    <? if ($tipo_usuario == '0' || $tipo_usuario == "33" || $tipo_usuario == '3' || $tipo_usuario == '1') { ?>
                        <li class="vertical-header">Base de datos</li>
                        <li>
                            <a href="javaScript:void();">
                                <i class="dripicons-stack"></i><span>Datos</span><i class="ri-arrow-right-s-line"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <? if ($tipo_usuario == '0'  || $tipo_usuario == "33" || $tipo_usuario == '3' || $tipo_usuario == '1') { ?>
                                    <li><a href="/control_de_stock">Control de Stock</a></li>
                                <? } ?>

                                <? if ($tipo_usuario == '0'  || $tipo_usuario == "33" || $tipo_usuario == '3' || $tipo_usuario == '1') { ?>
                                    <li><a href="/lista_de_precios/datos_ban.php" target="_blank">Datos Bancarios</a></li>
                                <? } ?>

                                <? if ($tipo_usuario == '0' || $tipo_usuario == "33") { ?> <li><a href="/marcas">Marcas</a></li>
                                    <li><a href="/productos">Productos</a></li> <? } ?>

                                <? if ($tipo_usuario == '0' || $tipo_usuario == "33") { ?>
                                    <li><a href="/sinprecio/">Sin Precio</a></li> <? } ?>

                                <? if ($tipo_usuario == '0' || $tipo_usuario == "33") { ?>
                                    <li><a href="/sincodigo/">Sin Codigo</a></li> <? } ?>

                                <? if ($tipo_usuario == '0' || $tipo_usuario == "33") { ?>
                                    <li><a href="/sincodigo/sinubica">Sin Ubicación</a></li> <? } ?>

                                <? if ($tipo_usuario == '0' || $tipo_usuario == "33") { ?>
                                    <li><a href="/ubicaciones/">Ubicación</a></li> <? } ?>

                                <? if ($tipo_usuario == '0' || $tipo_usuario == "33") { ?>
                                    <li><a href="/stockeo/index.php?ubicacion=2" target="_blank">Stokeo Env. PB</a></li>
                                    <li><a href="/stockeo/index.php?ubicacion=0" target="_blank">Stokeo Env. PA</a></li>


                                <? } ?>

                            </ul>
                        </li>
                    <? } ?>






                    <li class="vertical-header">Configuración</li>
                    <li>
                        <a href="javaScript:void();">
                            <i class="dripicons-gear"></i><span>Configuración</span><i class="ri-arrow-right-s-line"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <? if ($tipo_usuario == '0' || $tipo_usuario == '33' || $tipo_usuario == '1' || $tipo_usuario == '30') { ?>

                                <li> <a href="/usuarios">Usuarios</a></li>
                            <? } ?>
                            <? if ($tipo_usuario == '0') { ?>
                                <li> <a href="/categorias">Cartegorías</a></li>
                                <li><a href="/lproductos/orden_productos">Orden Productos</a></li>
                                <li><a href="/cartelitos/">Cartelitos Lista</a></li>
                                <li><a href="/camionetas">Camionetas</a></li>
                                <li><a href="/zonas">Zonas</a>
                                <li><a href="/nomubpicking">Nombres Ubic.</a>
                                <li><a href="/nomubdeposito">Nombres Ubic. Dep.</a>
                                <li><a href="/alarmastock/confalarma">Al.Stock/Vent.Min.</a><? } ?>
                                <? if ($tipo_usuario != '37') { ?>
                                <li><a href="/alarmastock/confbulto">Config. Bulto Prod.</a>
                                <? } ?>


                                <? if ($tipo_usuario == '0' || $tipo_usuario == '33') { ?>
                                    <!--      <li><a href="/rubros">Rubros</a></li>
                               <li><a href="/fracionado">Fracionado</a></li>
                                <li><a href="/feriados">Feriados</a></li> -->
                                <li><a href="/banner-ofertas">Banner Ofertas</a></li>
                                <!--    <li><a href="/hoja_ruta_config">Orden H/Ruta</a></li> --> <? } ?>
                            <a class="dropdown-item text-danger" href="../lusuarios/logincerrar.php"><i class="ri-shut-down-line"></i> Cerrar Sesion<br><i style="padding-left:20px;"></i> <?= $nombrenegocio ?></a>
                        </ul>

                    </li>




                </ul>
                </li>
                </ul>
            </div>
            <!-- End Navigationbar -->
        </div>
        <!-- End Sidebar -->
    </div>
    <!-- End Leftbar -->

    <div class="rightbar">

        <div class="topbar-mobile">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="mobile-logobar">
                        <a href="index.html" class="mobile-logo"><img src="/assets/images/logo.png" class="img-fluid" alt="logo"></a>
                    </div>
                    <div class="mobile-togglebar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="topbar-toggle-icon">
                                    <a class="topbar-toggle-hamburger" href="javascript:void();">
                                        <span class="iconbar">
                                            <i class="ri-more-fill menu-hamburger-horizontal"></i>
                                            <i class="ri-more-2-fill menu-hamburger-vertical"></i>
                                        </span>
                                    </a>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="menubar">
                                    <a class="menu-hamburger" href="javascript:void();">
                                        <span class="iconbar">
                                            <i class="ri-menu-2-line menu-hamburger-collapse"></i>
                                            <i class="ri-close-line menu-hamburger-close"></i>
                                        </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="alturas">