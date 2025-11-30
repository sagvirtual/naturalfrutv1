<?php include('f54du60ig65.php');
include('lusuarios/login.php');
$aster = "'";
if ($tipo_usuario != '0') {
    $nomostrar = ' display: none;';
}
/* $modobus = $_POST['modobus'];
$buscar = $_POST['buscar'];
 */
include('control_stock/funcionStockSnot.php');
//update
$idcodw = $_POST["jfndhom"];
$idw = base64_decode($idcodw);
//$costo = $_POST["costo"];


$modobus = $_POST['modobus'];
$buscar = $_POST['buscar'];
$buscar = str_replace(' ', '%', $buscar);
$_SESSION["buscar"] = $_POST['buscar'];
//
//nuevo buscador
$busquedadds = $_POST['buscar'];
$busquedads = mysqli_real_escape_string($rjdhfbpqj, $busquedadds);

// Dividir la cadena de búsqueda en palabras
$palabras = explode(' ', $busquedads);

// Crear un array para almacenar las condiciones de búsqueda para cada palabra
$condiciones = array();

foreach ($palabras as $palabra) {
    // Reemplazar espacios con comodines para que coincida con cualquier palabra
    $termino = '%' . str_replace(' ', '%', $palabra) . '%';
    // Agregar la condición para esta palabra al array
    $condiciones[] = "productos.nombre LIKE '$termino'";
}

// Unir todas las condiciones con el operador AND para asegurarse de que todas las palabras estén presentes
$condicion_final = implode(' AND ', $condiciones);

//




if (is_numeric($buscar)) {
    $sqlbusuer = "productos.id = '$buscar'";
} else {
    $sqlbusuer = $condicion_final . " OR marcas.empresa LIKE '%$buscar%' OR productos.codigo LIKE '%$buscar%' OR proveedores.empresa LIKE '%$buscar%' ";
    //$sqlbusuer="productos.nombre LIKE '%$buscar%' OR marcas.empresa LIKE '%$buscar%' OR productos.codigo LIKE '%$buscar%' OR proveedores.empresa LIKE '%$buscar%' ";


}



$error = $_GET['error'];
$id = base64_decode($idcod);
$timean = date("His");

/* if (!empty($idw) && !empty($costo)) {
    $sqlprecioprod = "Update precioprod Set costo='$costo' Where id = '$idw'";
    mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));
} */
$comilla = "'";

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<!-- Start Contentbar -->
<div class="contentbar">
    <style>
        tr:hover {
            background-color: #E7E6E6;
            cursor: pointer;
        }

        .contenidoOculto {
            display: none;
        }
    </style>

    <?php


    echo ' 
            <div class="row"> 
     <!-- Start col -->
     <div class="col-lg-12">
         <div class="card m-b-30">

             <div class="card-body">
                 <div class="table-responsive">

                     <table class="table table-borderless">
                         <thead>
                             <tr>
                             <th style="vertical-align: middle;  background-color:#C8C8C8; text-align:center;" class="contenidoOcultob">Stock</th>
                             <th style="vertical-align: middle;  background-color:#F3F3F3; text-align:center;" >Nombre Producto</th>
                             <th style="text-align:center; vertical-align: middle;  background-color:#C8C8C8; ' . $nomostrar . '">Actualización<br>Precio</th>
                             <th style="text-align:center; vertical-align: middle;background-color:#F3F3F3;" class="contenidoOculto" onclick="mostrarContenidob(this); ">Costo Bulto</th>
                             <th style="text-align:center; vertical-align: middle;background-color:#F3F3F3;" class="contenidoOculto" onclick="mostrarContenidob(this); ">Costo.</th>
                             <th style="text-align:center;vertical-align: middle; background-color: #C8C8C8;" class="contenidoOculto" onclick="mostrarContenidob(this); ">Desc.</th>
                             <th style="text-align:center;vertical-align: middle; background-color: #F3F3F3; " class="contenidoOculto" onclick="mostrarContenidob(this); ">Precio<br>c/Desc.</th>
                             <th style="text-align:center;vertical-align: middle; background-color: #C8C8C8;" class="contenidoOculto" onclick="mostrarContenidob(this); ">IIBB<br>BS&nbsp;AS</th>
                             <th style="text-align:center;vertical-align: middle;background-color: #F3F3F3; " class="contenidoOculto" onclick="mostrarContenidob(this); ">IIBB<br>CABA</th>
                             <th style="text-align:center;vertical-align: middle;background-color: #C8C8C8;" class="contenidoOculto" onclick="mostrarContenidob(this); ">PERC<br>IVA</th>
                             <th style="text-align:center;vertical-align: middle;background-color: #F3F3F3; " class="contenidoOculto" onclick="mostrarContenidob(this); ">IVA</th>
                             <th style="text-align:center;vertical-align: middle;background-color: #C8C8C8;" class="contenidoOculto" onclick="mostrarContenidob(this); ">Precio<br>Bruto</th>
                             <th style="text-align:center;vertical-align: middle;background-color: #F3F3F3; " class="contenidoOculto" onclick="mostrarContenidob(this); ">Desc.<br>Adicional</th>
                             <th style="text-align:center;vertical-align: middle;background-color: #F3F3F3; width: 150px; ' . $nomostrar . '" onclick="mostrarContenidob(this);">Costo Final</th>
                             
                             <th style="text-align:center; background-color:#DAF7A6; ' . $nomostrar . '">Precio&nbsp;Venta<br><strong></strong></th>
                             <th style="text-align:center; background-color:#CFE9EC;' . $nomostrar . '">Precio&nbsp;Venta<br><strong></strong></th>
                             <th style="vertical-align: middle; background-color:#C8C8C8; text-align:center;width: 90px;">Desc.%<br>Cliente</th>
                             <th style="vertical-align: middle; background-color:#CFE9EC; text-align:center;"  class="contenidoOcultob">Acción</th>
                             </tr>
                         </thead>
                          <tbody>';
    // if (!empty($buscar) && $buscar != " ") {#F3F3F3;
    //buscadorgeneral


    $sqljoin = mysqli_query($rjdhfbpqj, "SELECT 
                            productos.id_marcas, productos.id as idproducto, productos.id_proveedor, productos.codigo, productos.modo_producto, productos.nombre, productos.gananciasper, productos.categoria, productos.detalle, productos.estado, productos.unidadnom, productos.descuento, productos.kilo, 
                            proveedores.id, proveedores.empresa as empresapro,
                            marcas.empresa, 
                            categorias.nombre as nomcate

                            FROM 
                            productos 
                            INNER JOIN marcas ON productos.id_marcas = marcas.id 
                            INNER JOIN proveedores ON productos.id_proveedor = proveedores.id
                            INNER JOIN categorias ON productos.categoria = categorias.id
                            
                            
                            Where  $sqlbusuer ORDER BY `productos`.`nombre` ASC ");





    while ($rowproductos = mysqli_fetch_array($sqljoin)) {


        $idcategoria = $rowproductos["categoria"];
        //$id_proveedor = $rowproductos["id_proveedor"];
        $gananciasper = $rowproductos["gananciasper"];
        $id = $rowproductos["idproducto"];
        $id_producto = $rowproductos["idproducto"];
        $estado = $rowproductos["estado"];
        $idcodp = base64_encode($id);
        $id_marcas = $rowproductos["id_marcas"];
        $modo_producto = $rowproductos["modo_producto"];
        $unidadnom = $rowproductos["unidadnom"];
        $kilo = $rowproductos["kilo"];
        $descuentopro = $rowproductos["descuento"];




        $sqlprecioprod = ${"sqlprecioprod" . $rowproductos["idproducto"]};
        $rowprecioprod = ${"rowprecioprod" . $rowproductos["idproducto"]};

        $comoviene = $modo_producto . "&nbsp;x&nbsp;" . $kilo . "&nbsp;" . $unidadnom;


        /* par aque no repita */
        $id_producto = ${"id_producto" . $rowproductos["idproducto"]};
        $id_proveedor = ${"id_proveedor" . $rowproductos["idproducto"]};

        $costoxcaj = ${"costoxcaj" . $rowproductos["idproducto"]};
        $costo = ${"costo" . $rowproductos["idproducto"]};
        $tipoprov = ${"tipoprov" . $rowproductos["idproducto"]};
        $cproveedor = ${"cproveedor" . $rowproductos["idproducto"]};
        $nref = ${"nref" . $rowproductos["idproducto"]};
        $fecven = ${"fecven" . $rowproductos["idproducto"]};
        $agrstock = ${"agrstock" . $rowproductos["idproducto"]};
        $tipo = ${"tipo" . $rowproductos["idproducto"]};
        $descuento = ${"descuento" . $rowproductos["idproducto"]};
        $pcondescu = ${"pcondescu" . $rowproductos["idproducto"]};
        $iibb_bsas = ${"iibb_bsas" . $rowproductos["idproducto"]};
        $iibb_caba = ${"iibb_caba" . $rowproductos["idproducto"]};
        $perc_iva = ${"perc_iva" . $rowproductos["idproducto"]};
        $iva = ${"iva" . $rowproductos["idproducto"]};
        $pbruto = ${"pbruto" . $rowproductos["idproducto"]};
        $desadi = ${"desadi" . $rowproductos["idproducto"]};
        $costo_total = ${"costo_total" . $rowproductos["idproducto"]};
        $costoxcaja = ${"costoxcaja" . $rowproductos["idproducto"]};
        $fac_unid = ${"fac_unid" . $rowproductos["idproducto"]};
        $bulcosto = ${"bulcosto" . $rowproductos["idproducto"]};
        $sqlproveedores = ${"sqlproveedores" . $rowproductos["idproducto"]};
        $rowproveedores = ${"rowproveedores" . $rowproductos["idproducto"]};
        $avbul = ${"avbul" . $rowproductos["idproducto"]};
        $avkilo = ${"avkilo" . $rowproductos["idproducto"]};

        $sqlpreciodant = ${"sqlpreciodant" . $rowproductos["idproducto"]};
        $rowprecrodant = ${"rowprecrodant" . $rowproductos["idproducto"]};
        $preciomayorvie = ${"preciomayorvie" . $rowproductos["idproducto"]};
        $precioespevie = ${"precioespevie" . $rowproductos["idproducto"]};
        $fecheok = ${"fecheok" . $rowproductos["idproducto"]};



        /* listas de precios */
        /* prewcios mayoristas */
        $mka = ${"mka" . $rowproductos["idproducto"]};
        $mga = ${"mga" . $rowproductos["idproducto"]};
        $mpa = ${"mpa" . $rowproductos["idproducto"]};

        $mkb = ${"mkb" . $rowproductos["idproducto"]};
        $mub = ${"mub" . $rowproductos["idproducto"]};
        $mgb = ${"mgb" . $rowproductos["idproducto"]};
        $mpb = ${"mpb" . $rowproductos["idproducto"]};

        $mkc = ${"mkc" . $rowproductos["idproducto"]};
        $muc = ${"muc" . $rowproductos["idproducto"]};
        $mgc = ${"mgc" . $rowproductos["idproducto"]};
        $mpc = ${"mpc" . $rowproductos["idproducto"]};

        $mkd = ${"mkd" . $rowproductos["idproducto"]};
        $mud = ${"mud" . $rowproductos["idproducto"]};
        $mgd = ${"mgd" . $rowproductos["idproducto"]};
        $mpd = ${"mpd" . $rowproductos["idproducto"]};

        $mke = ${"mke" . $rowproductos["idproducto"]};
        $mue = ${"mue" . $rowproductos["idproducto"]};
        $mge = ${"mge" . $rowproductos["idproducto"]};
        $mpe = ${"mpe" . $rowproductos["idproducto"]};

        /* precios especiales */
        $eka = ${"eka" . $rowproductos["idproducto"]};
        $ega = ${"ega" . $rowproductos["idproducto"]};
        $epa = ${"epa" . $rowproductos["idproducto"]};

        $ekb = ${"ekb" . $rowproductos["idproducto"]};
        $eub = ${"eub" . $rowproductos["idproducto"]};
        $egb = ${"egb" . $rowproductos["idproducto"]};
        $epb = ${"epb" . $rowproductos["idproducto"]};

        $ekc = ${"ekc" . $rowproductos["idproducto"]};
        $euc = ${"euc" . $rowproductos["idproducto"]};
        $egc = ${"egc" . $rowproductos["idproducto"]};
        $epc = ${"epc" . $rowproductos["idproducto"]};

        $ekd = ${"ekd" . $rowproductos["idproducto"]};
        $eud = ${"eud" . $rowproductos["idproducto"]};
        $egd = ${"egd" . $rowproductos["idproducto"]};
        $epd = ${"epd" . $rowproductos["idproducto"]};

        $eke = ${"eke" . $rowproductos["idproducto"]};
        $eue = ${"eue" . $rowproductos["idproducto"]};
        $ege = ${"ege" . $rowproductos["idproducto"]};
        $epe = ${"epe" . $rowproductos["idproducto"]};

        $selmub = ${"selmub" . $rowproductos["idproducto"]};
        $selmuc = ${"selmuc" . $rowproductos["idproducto"]};
        $selmud = ${"selmud" . $rowproductos["idproducto"]};
        $selmue = ${"selmue" . $rowproductos["idproducto"]};

        $selmub1 = ${"selmub1" . $rowproductos["idproducto"]};
        $selmuc1 = ${"selmuc1" . $rowproductos["idproducto"]};
        $selmud1 = ${"selmud1" . $rowproductos["idproducto"]};
        $selmue1 = ${"selmue1" . $rowproductos["idproducto"]};

        $seleub1 = ${"seleub1" . $rowproductos["idproducto"]};
        $seleuc1 = ${"seleuc1" . $rowproductos["idproducto"]};
        $seleud1 = ${"seleud1" . $rowproductos["idproducto"]};
        $seleue1 = ${"seleue1" . $rowproductos["idproducto"]};



        /* fin  */


        if ($modo_producto == "0") {
            $unidadver = "Caja";
        }
        if ($modo_producto == "1") {
            $unidadver = "Bolsa";
        }
        if ($modo_producto == "2") {
            $unidadver = "Kg.";
        }
        if ($modo_producto == "3") {
            $unidadver = "Pack";
        }

        if ($estado == '1') {
            $colorestado = 'background-color: #ffe6e6;';
        } else {
            $colorestado = '';
        }
        $idfila = 1 + $idfila;

        //fin esto es lo que calcula el paginado
        $CantStocks = SumaStock($rjdhfbpqj, $id);

        if ($CantStocks > '0') {
            $CantStock = $CantStocks . " " . $unidadnom;
        } else {
            $CantStock = '<i style="color:red;">0 ' . $unidadnom . '</i>';
        }

        //miro el precio anterior del producto

        $sqlpreciodant = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$id' and cerrado = '1' and confirmado = '1' ORDER BY `precioprod`.`fecha` DESC limit 1,1");
        if ($rowprecrodant = mysqli_fetch_array($sqlpreciodant)) {/* 
            $costo_totalvie = $rowprecrodant["costo_total"];
            $precio_kiloavie = $rowprecrodant["precio_kiloa"];
            $precio_kilobvie = $rowprecrodant["precio_kilob"]; */
            $costo_totalvie = $rowprecrodant["costo_total"];
            $costoxcajavie = $rowprecrodant["costoxcaja"];
            $preciomayorvie = $rowprecrodant["mpa"];
            $precioespevie = $rowprecrodant["epa"];
        } else {
            $nohayante = "1";
            $preciomayorvie = '0';
            $precioespevie = '0';
        }





        //nombre de la marca
        $sqlmarcasb = mysqli_query($rjdhfbpqj, "SELECT * FROM marcas Where id = '$id_marcas' ");
        if ($rowmarcasb = mysqli_fetch_array($sqlmarcasb)) {
            $marcaempre = $rowmarcasb["empresa"];
            if ($gananciasper == "0") {
                $texga = "dark";
                $tipo = $rowmarcasb["tipo"];
                $gananciaa = $rowmarcasb["gananciaa"];
                $gananciab = $rowmarcasb["gananciab"];
                $gananciac = $rowmarcasb["gananciac"];
            }
        }

        //aca saco el precio


        $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$id'  and cerrado = '1' and confirmado = '1'  ORDER BY fecha DESC, id DESC;");
        if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
            $idcosto = $rowprecioprod["id"];

            //$idcod = base64_encode($id);
            //$cproveedor = $rowprecioprod["cproveedor"];
            $id_producto = $rowprecioprod["id_producto"];
            $id_proveedor = $rowprecioprod["id_proveedor"];
            $kilox = $rowprecioprod["kilo"];
            $costoxcaj = $rowprecioprod["costoxcaj"];
            $costo = $rowprecioprod["costo"];
            $tipoprov = $rowprecioprod["tipoprov"];
            $cproveedor = $rowprecioprod["cproveedor"];
            $nref = $rowprecioprod["nref"];
            $fecven = $rowprecioprod["fecven"];
            $agrstock = $rowprecioprod["agrstock"];
            $tipo = $rowprecioprod["tipo"];
            $descuento = $rowprecioprod["descuento"];
            $pcondescu = $rowprecioprod["pcondescu"];
            $iibb_bsas = $rowprecioprod["iibb_bsas"];
            $iibb_caba = $rowprecioprod["iibb_caba"];
            $perc_iva = $rowprecioprod["perc_iva"];
            $iva = $rowprecioprod["iva"];
            $pbruto = $rowprecioprod["pbruto"];
            $desadi = $rowprecioprod["desadi"];
            $costo_total = $rowprecioprod["costo_total"];
            $costoxcaja = $rowprecioprod["costoxcaja"];

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

            /* selecte unidad */
            if ($mub == "1") {
                $selmub = "selected";
            } else {
                $selmub1 = "selected";
            }
            if ($muc == "1") {
                $selmuc = "selected";
            } else {
                $selmuc1 = "selected";
            }
            if ($mud == "1") {
                $selmud = "selected";
            } else {
                $selmud1 = "selected";
            }
            if ($mue == "1") {
                $selmue = "selected";
            } else {
                $selmue1 = "selected";
            }
            if ($eub == "1") {
                $seleub = "selected";
            } else {
                $seleub1 = "selected";
            }
            if ($euc == "1") {
                $seleuc = "selected";
            } else {
                $seleuc1 = "selected";
            }
            if ($eud == "1") {
                $seleud = "selected";
            } else {
                $seleud1 = "selected";
            }
            if ($eue == "1") {
                $seleue = "selected";
            } else {
                $seleue1 = "selected";
            }



            //me fijo el porcentaje ganancia provvedor
            $sqlproveedores = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_proveedor'");
            if ($rowproveedores = mysqli_fetch_array($sqlproveedores)) {
                $fac_unid = "0"; //$rowproveedores["fac_unid"];
                if ($fac_unid != '1') {
                    $avbul = "disabled";
                } else {
                    $inpucosbr = 'background-color: #F7FF98';
                }
                if ($fac_unid == '1') {
                    $avkilo = "disabled";
                } else {
                    $inpucoskr = 'background-color: #F7FF98';
                }
            } else {
                $avbul = "disabled";
                $inpucosk = 'background-color: #F7FF98';
            }


            echo "<style> 
            input:focus {
                background-color: #F7FF98;
                outline: none; 
            }
            </style>";
            //me fijo si esta la ganancia de porveedor personalizada
            /*      if ($cproveedor > 0 && $cproveedor != $porprovver) {
                $porprovver = $cproveedor;
                $tipocomision = $tipoprov;
                if ($tipocomision == "0") {
                    $tipov = "$";
                } else {
                    $tipov = "%";
                }
            } */

            /*   if ($tipocomision == "0") {
                $costo_total = $rowprecioprod["costo"] + $porprovver;
            }
            if ($tipocomision == "1") {
                $costo_total = $rowprecioprod["costo"] / 100 * $porprovver + $rowprecioprod["costo"];
            } */


            if ($gananciasper == "1") {
                $texga = "dark";
                $tipo = $rowprecioprod["tipo"];
                $gananciaa = $rowprecioprod["ganancia_a"];
                $gananciab = $rowprecioprod["ganancia_b"];
                $gananciac = $rowprecioprod["ganancia_c"];
            }
            // $costoxcaja = $rowprecioprod["costoxcaja"];

            /* if ($tipo == "0") {
                                    $sibolo = "$";
                                    $precio_cajaar = $costo_total + $gananciaa;
                                    $precio_kiloa = number_format($precio_cajaar, 2, '.', '');
                                } else {
                                    $sibolo = "%";
                                    $precio_kiloar =  $costo_total / 100 * $gananciaa + $costo_total;
                                    $precio_kiloa = number_format($precio_kiloar, 2, '.', '');
                                }
                                $precio_cajaar = $precio_kiloa * $kilo;
                                $precio_cajaa = number_format($precio_cajaar, 2, '.', '');

                                if ($tipo == "0") {
                                    $precio_kilob = $costo_total + $gananciab;
                                } else {
                                    $precio_kilobr = $costo_total / 100 * $gananciab + $costo_total;
                                    $precio_kilob = number_format($precio_kilobr, 2, '.', '');
                                }
                                $precio_cajabr = $precio_kilob * $kilo;
                                $precio_cajab = number_format($precio_cajabr, 2, '.', ''); */





            $fechex = $rowprecioprod["fecha"];



            $fechexs = explode("-", $fechex);
            $fecheok = $fechexs[2] . "/" . $fechexs[1] . "/" . $fechexs[0];

            if ($fechex == $fechahoy) {
                $sticolr = 'style="color:green"';
                $nover = '0';
            } else { {
                    $sticolr = 'style="color:red"';
                    $nover = '1';
                }
            }
        } else {
            $idcosto = '0';
            $id_producto = $id;
            $costo = '122';
            $tipoprov = '0';
            $cproveedor = '0';
            $nref = 'Actu.';
            $fecven = '0000-00-00';
            $agrstock = '0';
            $costoxcaj = '0';
            $costo = '0';
            $tipo = '0';
            $descuento = '0';
            $pcondescu = '0';
            $iibb_bsas = '0';
            $iibb_caba = '0';
            $perc_iva = '0';
            $iva = '0';
            $pbruto = '0';
            $desadi = '0';
            $costo_total = '0';
            $costoxcaja = '0';
            $fac_unid = '0';
            $avbul = "disabled";

            /* prewcios mayoristas */
            $mka = '0';
            $mga = '0';
            $mpa = '0';

            $mkb = '0';
            $mgb = '0';
            $mpb = '0';

            $mkc = '0';
            $mgc = '0';
            $mpc = '0';

            $mkd = '0';
            $mgd = '0';
            $mpd = '0';

            $mke = '0';
            $mge = '0';
            $mpe = '0';

            /* precios especiales */
            $eka = '0';
            $ega = '0';
            $epa = '0';

            $ekb = '0';
            $egb = '0';
            $epb = '0';

            $ekc = '0';
            $egc = '0';
            $epc = '0';

            $ekd = '0';
            $egd = '0';
            $epd = '0';

            $eke = '0';
            $ege = '0';
            $epe = '0';

            $fechex = '0000-00-00';
        }
        $nombreprodu = $rowproductos["nombre"];

        //$palabra_escapada = preg_quote($palabra, '/');

        $texto_modificado = preg_replace('/\(\s*' . $marcaempre . '\s*\)/i', '', $nombreprodu);
        if ($fecven != '0000-00-00' && $fecven != "") {

            $fecven = date('d/m/Y', strtotime($fecven));
        } else {
            $fecven = '<img src="../assets/images/sinvencimiento.png" title="No tiene fecha de vencimiento">';
        }
        //fin 
        if ($nohayante == "1") {
            //aca si no hay anterior
            $costo_totalvie = $costo_total;
            $costoxcajavie = $costoxcaja;
        }


        include('lproductos/calcucoswhile.php');


        // listaproducto
        echo '<tr scope="row"> 
        
        <td style="text-align:center;" class="contenidoOcultob">
        <a href="/control_stock/?jfndhom=' . $idcodp . '&kkfnuhtf=' . $idcodp . '" target="_parent" class="btn btn-dark-rgba" title="Editar Stock" tabindex="-1">
        ' . $CantStock . '</a><br>ID: ' . $id . '
        </td>
               <td style="color: black;' . $colorestado . '"><strong>' . $texto_modificado . '</strong>
               <input name="idocsto" type="hidden" id="idcosto' . $idfila . '" value="' . $idcosto . '">
               <br>
               <h9 style="color:black;font-size:10pt;">Bulto: ' . $comoviene . '</h9><br>
               <h9 style="color:black;font-size:8pt;">Categoría: ' . $rowproductos["nomcate"] . '</h9><br>
               <h9 style="color:grey;font-size:8pt;">Marca: ' . $marcaempre . '</h9><br>
               <h9 style="color:grey;font-size:8pt;">Proveedor: ' . $rowproductos["empresapro"] . '</h9>
               <input name="nref' . $idfila . '" type="hidden" id="nref' . $idfila . '" value="' . $nref . '">
               </td>  ';

        $idfilaback = $idfila - 1;
        $idfilaup = $idfila + 1;
        echo ' 
            
            
            </td>


               <td style="text-align:center;' . $nomostrar . '"> <b id="fechaactual' . $idfila . '" style="color:red">' . $fecheok . '</b>
                           <input name="jfndhom' . $idfila . '" type="hidden" id="jfndhom' . $idfila . '" value="' . $idcodp . '">
               <input name="modobus" type="hidden" id="modobus' . $idfila . '" value="' . $_SESSION["modobus"] . '">
               <input name="buscar" type="hidden" id="buscar' . $idfila . '" value="' . $_SESSION["buscar"] . '">
              
               </td>



               <td style="background-color:#FCFCFC; text-align: center;" class="contenidoOculto">
               
              
               <strong style="position:relative; top:-6px;font-size:8pt; ">$/' . $modo_producto . ' ' . $kilo . ' ' . $unidadnom . '</strong><br>
                <input 
                type="text"  
                name="costoxcaj' . $idfila . '" 
                id="costoxcaj' . $idfila . '" 
                value="' . $costoxcaj . '"  
                
                oninput="realizaProcesos' . $idfila . '(                
                    $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                    $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                    
                ); ajax_preciomayorista' . $idfila . '(            
            $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val()                                                
            ); 
            ajax_precioespeciales' . $idfila . '( 
                $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                               
            ); realizaProcesos' . $idfila . '(                
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                
            )"
                
                 
                
                onclick="select()" 
                
                style="width: 100px; text-align: center; color:black; font-weight: 900; position:relative; top:-6px; ' . $inpucosb . '" tabindex="-1"
                
                disabled>
                
                
                </td>
           

               <td style="background-color:#FCFCFC; text-align: center;" class="contenidoOculto">
               
              
                        <strong style="position:relative; top:-6px;font-size:8pt; ">$/' . $unidadnom . '</strong><br>
                         <input 
                         type="text"  
                         name="costo' . $idfila . '" 
                         id="costo' . $idfila . '" 
                         value="' . $costo . '"  
                         
                          
                         oninput="realizaProcesos' . $idfila . '(                
                            $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                            $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                            
                        ); ajax_preciomayorista' . $idfila . '(            
                    $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val()                                                
                    ); 
                    ajax_precioespeciales' . $idfila . '( 
                        $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                        $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                               
                    );  realizaProcesos' . $idfila . '(                
                        $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                        $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                        
                    )"

                    onkeyup="realizaProcesos' . $idfila . '(                
                            $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                            $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                            $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                            $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                            
                        ); ajax_preciomayorista' . $idfila . '(            
                    $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val()                                                
                    ); 
                    ajax_precioespeciales' . $idfila . '( 
                        $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                        $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                               
                    );  realizaProcesos' . $idfila . '(                
                        $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                        $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                        $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                        $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                        
                    ); handleKeyUp' . $idfila . '()"
                          
                         
                         onclick="select()" 
                         
                         style="width: 100px; text-align: center; color:black; font-weight: 900; position:relative; top:-6px; ' . $inpucosk . ' "
                         
                        >
                         
                         
                         </td>
             <td  style="text-align:center; background-color: #F7F7F7; " class="contenidoOculto">
             <div style="position:relative; top:-11px; text-align: center;"><p style="font-size:8pt; position:relative; top:10px;">
             <strong>%</strong></p>
            
               <input type="text"  style="width: 60px; color:grey; font-weight: 900; text-align: center;" name="descuento' . $idfila . '" id="descuento' . $idfila . '" value="' . $descuento . '"  
               
               oninput="realizaProcesos' . $idfila . '(                
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                
            ); ajax_preciomayorista' . $idfila . '(            
        $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
        $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
        $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
        $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
        $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val()                                                
        ); 
        ajax_precioespeciales' . $idfila . '( 
            $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
            $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                               
        );  realizaProcesos' . $idfila . '(                
            $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
            $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
            
        )" onkeyup="handleKeyUp' . $idfila . '()" 
               onclick="select()" tabindex="-1">
             
             </div>
             </td>
               <td style="text-align:center; background-color: #FCFCFC;" class="contenidoOculto" onclick="mostrarContenidob(this);">
               <b style="color:grey; "  id="pcondescu' . $idfila . '">$' . $pcondescu . '<b>
               
               
               </td>
               <td  style="text-align:center; background-color: #F7F7F7; " class="contenidoOculto">
               <div style="position:relative; top:-11px; text-align: center;"><p style="font-size:8pt; position:relative; top:10px;">
               <strong>%</strong></p>
              
                 <input type="text"  style="width: 60px; color:grey; font-weight: 900; text-align: center;" name="iibb_bsas' . $idfila . '" id="iibb_bsas' . $idfila . '" value="' . $iibb_bsas . '" 
                 
                 oninput="realizaProcesos' . $idfila . '(                
                    $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                    $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                    
                ); ajax_preciomayorista' . $idfila . '(            
            $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val()                                                
            ); 
            ajax_precioespeciales' . $idfila . '( 
                $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                               
            );  realizaProcesos' . $idfila . '(                
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                
            )" onkeyup="handleKeyUp' . $idfila . '()" 
                 
                 onclick="select()" tabindex="-1">
               
               </div>
               </td>

               
               <td  style="text-align:center; background-color: #FCFCFC; " class="contenidoOculto">
               <div style="position:relative; top:-11px; text-align: center;"><p style="font-size:8pt; position:relative; top:10px;">
               <strong>%</strong></p>
              
                 <input type="text"  style="width: 60px; color:grey; font-weight: 900; text-align: center;" name="iibb_caba' . $idfila . '" id="iibb_caba' . $idfila . '" value="' . $iibb_caba . '" 
                 
                   
                 oninput="realizaProcesos' . $idfila . '(                
                    $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                    $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                    
                ); ajax_preciomayorista' . $idfila . '(            
            $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val()                                                
            ); 
            ajax_precioespeciales' . $idfila . '( 
                $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                               
            );  realizaProcesos' . $idfila . '(                
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                
            )" onkeyup="handleKeyUp' . $idfila . '()" 
                 
                 onclick="select()" tabindex="-1">
               
               </div>
               </td>
               
               
              
               <td  style="text-align:center; background-color: #F7F7F7; " class="contenidoOculto">
               <div style="position:relative; top:-11px; text-align: center;"><p style="font-size:8pt; position:relative; top:10px;">
               <strong>%</strong></p>
              
                 <input type="text"  style="width: 60px; color:grey; font-weight: 900; text-align: center;" name="perc_iva' . $idfila . '" id="perc_iva' . $idfila . '" value="' . $perc_iva . '" 
                 
                   
                 oninput="realizaProcesos' . $idfila . '(                
                    $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                    $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                    
                ); ajax_preciomayorista' . $idfila . '(            
            $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val()                                                
            ); 
            ajax_precioespeciales' . $idfila . '( 
                $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                               
            );  realizaProcesos' . $idfila . '(                
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                
            )" onkeyup="handleKeyUp' . $idfila . '()" 
                 
                 
                 onclick="select()" tabindex="-1">
               
               </div>
               </td>

               
               <td  style="text-align:center; background-color: #FCFCFC; " class="contenidoOculto">
               <div style="position:relative; top:-11px; text-align: center;"><p style="font-size:8pt; position:relative; top:10px;">
               <strong>%</strong></p>
              
                 <input type="text"  style="width: 60px; color:grey; font-weight: 900; text-align: center;" name="iva' . $idfila . '" id="iva' . $idfila . '" value="' . $iva . '" 
                 
                   
                 oninput="realizaProcesos' . $idfila . '(                
                    $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                    $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                    
                ); ajax_preciomayorista' . $idfila . '(            
            $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val()                                                
            ); 
            ajax_precioespeciales' . $idfila . '( 
                $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                               
            );  realizaProcesos' . $idfila . '(                
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                
            )" onkeyup="handleKeyUp' . $idfila . '()" 
                 
                 
                 onclick="select()" tabindex="-1">
               
               </div>
               </td>
               
               
               
               
               
               <td style="text-align:center; background-color: #F7F7F7;" class="contenidoOculto" onclick="mostrarContenidob(this);">
               
               <b style="color:grey; "  id="pbruto' . $idfila . '">$' . $pbruto . '<b>
               
               
               </td>



               
               <td  style="text-align:center; background-color: #FCFCFC; " class="contenidoOculto">
               <div style="position:relative; top:-11px; text-align: center;"><p style="font-size:8pt; position:relative; top:10px;">
               <strong>%</strong></p>
              
                 <input type="text"  style="width: 60px; color:grey; font-weight: 900; text-align: center;"  value="' . $desadi . '" name="desadi' . $idfila . '" id="desadi' . $idfila . '"  oninput="realizaProcesos' . $idfila . '(                
                    $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                    $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                    
                ); ajax_preciomayorista' . $idfila . '(            
            $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val()                                                
            ); 
            ajax_precioespeciales' . $idfila . '( 
                $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                               
            );  realizaProcesos' . $idfila . '(                
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                
            )" onkeyup="handleKeyUp' . $idfila . '()" 
                 
                 onclick="select()" tabindex="-1">
               
               
               </div>
               </td>


               <td style="text-align:center; background-color: #F7F7F7; ' . $nomostrar . '">
               <input type="text" class="form-control" id="costo_final' . $idfila . '" value="' . $costo_total . '" style="color:black; font-weight: 900; text-align: center;" onclick="select()" autocomplete="off"
               
               oninput="realizaProcesosf' . $idfila . '(                
                    $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),                   
                    $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                    $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                    
                ); ajax_preciomayorista' . $idfila . '(            
            $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val()                                                
            ); 
            ajax_precioespeciales' . $idfila . '( 
                $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                               
            );  realizaProcesosf' . $idfila . '(                
                    $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),                   
                    $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                    $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                    
                )" 
                 onkeyup="ajax_preciomayorista' . $idfila . '(            
            $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val()                                                
            ); 
            ajax_precioespeciales' . $idfila . '( 
                $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                               
            );  realizaProcesosf' . $idfila . '(                
                    $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),                   
                    $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                         
                    $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                    
                ); handleKeyUp' . $idfila . '()"
                
                >

               
              
               <b style="display:none;">$<b><b style="display:none;" id="costo_total' . $idfila . '">' . $costo_total . '</b>
               </td>
               
               




                <td style="display:none;" ><i id="simblal' . $idfila . '"></i>$<b id="variacostop' . $idfila . '"></b><br> %<b id="variacostopor' . $idfila . '"></b></td> 
               

                <td style="text-align:center; background-color:#ECFCEE; ' . $nomostrar . '" id="listasa"><b style="color:black;">
                   <div>                        
                <span class="badge badge-pill badge-' . $texga . '" style="display:none;">Gan. x  Kg. ' . $sibolo . '<b id="gananciaa' . $idfila . '"></b></span>

      

                                                                           

                <span class="badge badge-pill badge-' . $texga . '" >Por 1 ' .  strtolower($unidadnom) . '</span><br>
                <h2> <span class="badge badge-success"  onclick="mostrarOcultarElemento' . $idfila . '(); mostrarOcultarElementob' . $idfila . '();  mostrarContenido(this);"> <b style="color:black;">$<b id="mpafinal' . $idfila . '" >' . $mpa . '</b></span></h2>


                
                <div  id="miSpan' . $idfila . '" style="display:none;"><div style="display:none;">
                <span class="badge badge-pill badge-primary" title="Diferencia">%<b id="varkpora' . $idfila . '"></b> 
                <i id="flechaa' . $idfila . '"></i><b id="variaka' . $idfila . '"></b>$</span>
                <br></div>
                <div style="text-align:center;">
                <input type="text" class="badge badge-pill" name="inputNumber" id="inputNumber" value="20">';



        include('lproductos/preciomayorista.php');

        echo '</div>
                </td>





                <td style="text-align:center;background-color:#ECF9FC;' . $nomostrar . '">
                <div>         
                                 
                <span class="badge badge-pill badge-' . $texga . '">Precios<b id="gananciab' . $idfila . '"></b></span>

                
      



                <h2 onclick="mostrarOcultarElementob' . $idfila . '(); mostrarOcultarElemento' . $idfila . '(); mostrarContenido(this);"> 
               <span class="badge badge-info"> <b style="color:black;">Info<b id="epafinal' . $idfila . '" >
           </h2>




               
                <div  id="miSpanb' . $idfila . '" style="display:none;"><div style="display:none;">
                <span class="badge badge-pill badge-primary" title="Diferencia">%<b id="varkporb' . $idfila . '"></b> 
                <i id="flechab' . $idfila . '"></i>
                <b id="variakb' . $idfila . '"></b> $</span> <br></div>
               
              
                <input type="text" class="badge badge-pill" name="inputNumber" id="inputNumber" value="20">';



        include('lproductos/precioespecial.php');





        echo '  </div> </div>


                                    
                                    </td>

                                    <td style="text-align:center;">  
                              <input type="text" class="form-control"  id="descuentopro' . $id . '" value="' . $descuentopro . '" onclick="select()" style=" color:grey; font-weight: 900; text-align: center;" oninput="ajax_decProduc(' . $comilla . '' . $id . '' . $comilla . ',$(' . $comilla . '#descuentopro' . $id . '' . $comilla . ').val())" tabindex="-1">
                                </td>



               
                                 
                            
                                <td style="vertical-align: middle; text-align:center;"  class="contenidoOcultob"><div class="button-list" tabindex="-1">


                                <a href="/lproductos/?jfndhom=' . $idcodp . '&kkfnuhtf=' . $rowprecioprod["id_marcas"] . '" target="_parent" class="btn btn-success-rgba" title="Editar Productos" tabindex="-1"><i class="ri-pencil-line"></i></a>';
        $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_producto='$id'");
        if ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
        } else {
            echo '<a href="javascript:eliminar(' . "'/lproductos/mlkdths?" . 'juhytm=' . $idcodp . '' . "'" . ')" class="btn btn-danger-rgba" tabindex="-1"><i class="ri-delete-bin-3-line"></i></a>';
        }
        echo ' </div>
                                </td>
                            
                                    </tr>';





        echo '
                                                                        </div>
                                                                        </div>
                                                                        </div>
                                                                
                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <script>
        function handleKeyUp' . $idfila . '() {
            setTimeout(function realizaupdate' . $idfila . '(){
      
    var jfndhom' . $idfila . ' = document.getElementById(' . $aster . 'jfndhom' . $idfila . '' . $aster . ').value;
    var costoxcaj' . $idfila . ' = document.getElementById(' . $aster . 'costoxcaj' . $idfila . '' . $aster . ').value;
    var costo' . $idfila . ' = document.getElementById(' . $aster . 'costo' . $idfila . '' . $aster . ').value;
    var descuento' . $idfila . ' = document.getElementById(' . $aster . 'descuento' . $idfila . '' . $aster . ').value;
    var iibb_bsas' . $idfila . ' = document.getElementById(' . $aster . 'iibb_bsas' . $idfila . '' . $aster . ').value;
    var iibb_caba' . $idfila . ' = document.getElementById(' . $aster . 'iibb_caba' . $idfila . '' . $aster . ').value;
    var perc_iva' . $idfila . ' = document.getElementById(' . $aster . 'perc_iva' . $idfila . '' . $aster . ').value;
    var iva' . $idfila . ' = document.getElementById(' . $aster . 'iva' . $idfila . '' . $aster . ').value;
    var desadi' . $idfila . ' = document.getElementById(' . $aster . 'desadi' . $idfila . '' . $aster . ').value;                                                        
    var costo_final' . $idfila . ' = document.getElementById(' . $aster . 'costo_final' . $idfila . '' . $aster . ').value;                                                        
    var mka' . $idfila . ' = document.getElementById(' . $aster . 'mka' . $idfila . '' . $aster . ').value;
    var mga' . $idfila . ' = document.getElementById(' . $aster . 'mga' . $idfila . '' . $aster . ').value;
    var mpa' . $idfila . ' = document.getElementById(' . $aster . 'mpa' . $idfila . '' . $aster . ').value;
    var mkb' . $idfila . ' = document.getElementById(' . $aster . 'mkb' . $idfila . '' . $aster . ').value;            
    var mub' . $idfila . ' = document.getElementById(' . $aster . 'mub' . $idfila . '' . $aster . ').value;            
    var mgb' . $idfila . ' = document.getElementById(' . $aster . 'mgb' . $idfila . '' . $aster . ').value;
    var mpb' . $idfila . ' = document.getElementById(' . $aster . 'mpb' . $idfila . '' . $aster . ').value;
    var mkc' . $idfila . ' = document.getElementById(' . $aster . 'mkc' . $idfila . '' . $aster . ').value;            
    var muc' . $idfila . ' = document.getElementById(' . $aster . 'muc' . $idfila . '' . $aster . ').value;            
    var mgc' . $idfila . ' = document.getElementById(' . $aster . 'mgc' . $idfila . '' . $aster . ').value;
    var mpc' . $idfila . ' = document.getElementById(' . $aster . 'mpc' . $idfila . '' . $aster . ').value;
    var mkd' . $idfila . ' = document.getElementById(' . $aster . 'mkd' . $idfila . '' . $aster . ').value;
    var mud' . $idfila . ' = document.getElementById(' . $aster . 'mud' . $idfila . '' . $aster . ').value;
    var mgd' . $idfila . ' = document.getElementById(' . $aster . 'mgd' . $idfila . '' . $aster . ').value;
    var mpd' . $idfila . ' = document.getElementById(' . $aster . 'mpd' . $idfila . '' . $aster . ').value;
    var mke' . $idfila . ' = document.getElementById(' . $aster . 'mke' . $idfila . '' . $aster . ').value;
    var mue' . $idfila . ' = document.getElementById(' . $aster . 'mue' . $idfila . '' . $aster . ').value;
    var mge' . $idfila . ' = document.getElementById(' . $aster . 'mge' . $idfila . '' . $aster . ').value;
    var mpe' . $idfila . ' = document.getElementById(' . $aster . 'mpe' . $idfila . '' . $aster . ').value;
    var eka' . $idfila . ' = document.getElementById(' . $aster . 'eka' . $idfila . '' . $aster . ').value;
    var ega' . $idfila . ' = document.getElementById(' . $aster . 'ega' . $idfila . '' . $aster . ').value;
    var epa' . $idfila . ' = document.getElementById(' . $aster . 'epa' . $idfila . '' . $aster . ').value;
    var ekb' . $idfila . ' = document.getElementById(' . $aster . 'ekb' . $idfila . '' . $aster . ').value;            
    var eub' . $idfila . ' = document.getElementById(' . $aster . 'eub' . $idfila . '' . $aster . ').value;            
    var egb' . $idfila . ' = document.getElementById(' . $aster . 'egb' . $idfila . '' . $aster . ').value;
    var epb' . $idfila . ' = document.getElementById(' . $aster . 'epb' . $idfila . '' . $aster . ').value;
    var ekc' . $idfila . ' = document.getElementById(' . $aster . 'ekc' . $idfila . '' . $aster . ').value;            
    var euc' . $idfila . ' = document.getElementById(' . $aster . 'euc' . $idfila . '' . $aster . ').value;            
    var egc' . $idfila . ' = document.getElementById(' . $aster . 'egc' . $idfila . '' . $aster . ').value;
    var epc' . $idfila . ' = document.getElementById(' . $aster . 'epc' . $idfila . '' . $aster . ').value;
    var ekd' . $idfila . ' = document.getElementById(' . $aster . 'ekd' . $idfila . '' . $aster . ').value;
    var eud' . $idfila . ' = document.getElementById(' . $aster . 'eud' . $idfila . '' . $aster . ').value;
    var egd' . $idfila . ' = document.getElementById(' . $aster . 'egd' . $idfila . '' . $aster . ').value;
    var epd' . $idfila . ' = document.getElementById(' . $aster . 'epd' . $idfila . '' . $aster . ').value;
    var eke' . $idfila . ' = document.getElementById(' . $aster . 'eke' . $idfila . '' . $aster . ').value;
    var eue' . $idfila . ' = document.getElementById(' . $aster . 'eue' . $idfila . '' . $aster . ').value;
    var ege' . $idfila . ' = document.getElementById(' . $aster . 'ege' . $idfila . '' . $aster . ').value;
    var epe' . $idfila . ' = document.getElementById(' . $aster . 'epe' . $idfila . '' . $aster . ').value;   


var parametros = {
   "jfndhom" : jfndhom' . $idfila . ',
   "costoxcaj" : costoxcaj' . $idfila . ',
   "costo" : costo' . $idfila . ',
   "descuento" : descuento' . $idfila . ',
   "iibb_bsas" : iibb_bsas' . $idfila . ',
   "iibb_caba" : iibb_caba' . $idfila . ',
   "perc_iva" : perc_iva' . $idfila . ',
   "iva" : iva' . $idfila . ',
   "desadi" : desadi' . $idfila . ',                                                        
   "costo_final" : costo_final' . $idfila . ',                                                        
   "mka" : mka' . $idfila . ',
   "mga" : mga' . $idfila . ',
   "mpa" : mpa' . $idfila . ',
   "mkb" : mkb' . $idfila . ',            
   "mub" : mub' . $idfila . ',            
   "mgb" : mgb' . $idfila . ',
   "mpb" : mpb' . $idfila . ',
   "mkc" : mkc' . $idfila . ',            
   "muc" : muc' . $idfila . ',            
   "mgc" : mgc' . $idfila . ',
   "mpc" : mpc' . $idfila . ',
   "mkd" : mkd' . $idfila . ',
   "mud" : mud' . $idfila . ',
   "mgd" : mgd' . $idfila . ',
   "mpd" : mpd' . $idfila . ',
   "mke" : mke' . $idfila . ',
   "mue" : mue' . $idfila . ',
   "mge" : mge' . $idfila . ',
   "mpe" : mpe' . $idfila . ',
   "eka" : eka' . $idfila . ',
   "ega" : ega' . $idfila . ',
   "epa" : epa' . $idfila . ',
   "ekb" : ekb' . $idfila . ',            
   "eub" : eub' . $idfila . ',            
   "egb" : egb' . $idfila . ',
   "epb" : epb' . $idfila . ',
   "ekc" : ekc' . $idfila . ',            
   "euc" : euc' . $idfila . ',            
   "egc" : egc' . $idfila . ',
   "epc" : epc' . $idfila . ',
   "ekd" : ekd' . $idfila . ',
   "eud" : eud' . $idfila . ',
   "egd" : egd' . $idfila . ',
   "epd" : epd' . $idfila . ',
   "eke" : eke' . $idfila . ',
   "eue" : eue' . $idfila . ',
   "ege" : ege' . $idfila . ',
   "epe" : epe' . $idfila . '
};
$.ajax({
      data:  parametros,
      url:';
        echo "'";
        echo 'lproductos/updateproducto.php';
        echo "'";
        echo ',
      type:';
        echo "'";
        echo 'post';
        echo "'";
        echo ',
       beforeSend: function () {
              $("#resultadocuenta' . $idfila . '").html(';
        echo "'";
        echo '';
        echo "'";
        echo ');
      },
      success:  function (response) {
              $("#resultadocuenta' . $idfila . '").html(response);
      }




});return;}

, 1000);
        }
    </script>
                                                
                                                    ';


        echo " <script>
                                function mostrarOcultarElemento" . $idfila . "() {
                                const miSpan" . $idfila . " = document.getElementById('miSpan" . $idfila . "');
                            
                                const isVisible" . $idfila . " = miSpan" . $idfila . ".style.display !== 'none';
                            
                                if (isVisible" . $idfila . ") {
                                    miSpan" . $idfila . ".style.display = 'none'; 
                                } else {
                                    miSpan" . $idfila . ".style.display = 'inline'; 
                                }
                                }        
                                
                                function mostrarOcultarElementob" . $idfila . "() {
                                const miSpanb" . $idfila . " = document.getElementById('miSpanb" . $idfila . "');
                            
                                const isVisible" . $idfila . " = miSpanb" . $idfila . ".style.display !== 'none';
                            
                                if (isVisible" . $idfila . ") {
                                    miSpanb" . $idfila . ".style.display = 'none'; 
                                } else {
                                    miSpanb" . $idfila . ".style.display = 'inline'; 
                                }
                                }

                                        
                                function mostrarOcultarElementoc" . $idfila . "() {
                                    const miSpanc" . $idfila . " = document.getElementById('miSpanc" . $idfila . "');
                                
                                    const isVisible" . $idfila . " = miSpanc" . $idfila . ".style.display !== 'none';
                                
                                    if (isVisible" . $idfila . ") {
                                    miSpanc" . $idfila . ".style.display = 'none'; 
                                    } else {
                                    miSpanc" . $idfila . ".style.display = 'inline'; 
                                    }
                                }
                                </script>
                                ";
    } //fin producto





    ?>





    </table>


    <script>
        /*     function nextFocus(inputF, inputS) {
            document.getElementById(inputF).addEventListener('keydown', function(event) {
                if (event.key === 'Enter' || event.keyCode == 13) {
                    document.getElementById(inputS).select().focus();
                }
            });
        } */
    </script>



</div>
<script>
    let contenidoVisible = false;

    function mostrarContenidob() {
        const elementosOcultos = document.querySelectorAll('.contenidoOculto');

        if (contenidoVisible) {
            elementosOcultos.forEach(elementoa => {
                elementoa.style.display = 'none';
            });
        } else {
            elementosOcultos.forEach(elementoa => {
                elementoa.style.display = 'table-cell';
            });
        }

        contenidoVisible = !contenidoVisible;
    }


    let contenidoVisibl = false;

    function mostrarContenido() {
        const contenidoOcultob = document.querySelectorAll('.contenidoOcultob');

        if (contenidoVisibl) {
            contenidoOcultob.forEach(elementoa => {
                elementoa.style.display = 'table-cell';
            });
        } else {
            contenidoOcultob.forEach(elementoa => {
                elementoa.style.display = 'none';
            });
        }

        contenidoVisibl = !contenidoVisibl;
    }
</script>


<script>
    function ajax_decProduc(id_producto, descproducto) {
        var parametros = {
            'id_producto': id_producto,
            'descproducto': descproducto
        };
        $.ajax({
            data: parametros,
            url: '../lproductos/ActualizaDesc.php',
            type: 'POST',
            beforeSend: function() {
                $('#muestroorden55').html('');
            },
            success: function(response) {
                $('#muestroorden55').html(response);
            }
        });
    }
</script>