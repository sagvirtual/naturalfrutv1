<?php include('f54du60ig65.php');
$aster="'";
/* $modobus = $_POST['modobus'];
$buscar = $_POST['buscar'];
 */

//update
$idcodw = $_POST["jfndhom"];
$idw = base64_decode($idcodw);
//$costo = $_POST["costo"];


$modobus = $_POST['modobus'];
$buscar = $_POST['buscar'];
$_SESSION["buscar"] = $_POST['buscar'];
//




$error = $_GET['error'];
$id = base64_decode($idcod);
$timean = date("His");

/* if (!empty($idw) && !empty($costo)) {
    $sqlprecioprod = "Update precioprod Set costo='$costo' Where id = '$idw'";
    mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));
} */


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
$pag=2;

$CantidadMostrar=3000;
//Conexion  al servidor mysql

                    // Validado  la variable GET
    $compag = (int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
	$TotalReg =$rjdhfbpqj->query("SELECT productos.id_marcas, productos.id as idproducto, productos.codigo, productos.modo_producto, productos.nombre, productos.gananciasper, productos.categoria, productos.id_proveedor,productos.detalle, productos.estado, productos.unidadnom, marcas.empresa FROM productos INNER JOIN marcas 
    ON productos.id_marcas = marcas.id 
    Where  productos.nombre LIKE '%$buscar%' OR marcas.empresa LIKE '%$buscar%' OR productos.codigo LIKE '%$buscar%' OR productos.categoria LIKE '%$buscar%'");
	//Se divide la cantidad de registro de la BD con la cantidad a mostrar 
	$TotalRegistro =ceil($TotalReg->num_rows/$CantidadMostrar);
	
	 //Operacion matematica para mostrar los siquientes datos.
	$IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):0;

//fin esto es lo que calcula el paginado

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
                             <th style="vertical-align: middle;  background-color:#C8C8C8">Nombre Producto</th>
                             <th style="vertical-align: middle;  background-color:#F3F3F3; text-align:center;">Referencia</th>
                             <th style="vertical-align: middle; background-color:#C8C8C8; text-align:center;">Producto<br>Vencimiento</th>
                             <th style="vertical-align: middle;  background-color:#F3F3F3; text-align:center;">Agregar<br>Bul/Stock</th>
                                 <th style="text-align:center; vertical-align: middle;  background-color:#C8C8C8"">Actualización<br>Precio</th>
                                 <th style="vertical-align: middle; text-align:center; background-color:#FCBF61">Precio base<br>Bulto</th>
                                 <th style="text-align:center; vertical-align: middle;background-color:#F3F3F3;" onclick="mostrarContenido(this);">Precio&nbsp;Base<br>Unitario</th>
                                 <th style="text-align:center;vertical-align: middle; background-color: #C8C8C8;" class="contenidoOculto">Desc.</th>
                                 <th style="text-align:center;vertical-align: middle; background-color: #F3F3F3; " class="contenidoOculto">Precio<br>c/Desc.</th>
                                 <th style="text-align:center;vertical-align: middle; background-color: #C8C8C8;" class="contenidoOculto">IIBB<br>BS&nbsp;AS</th>
                                 <th style="text-align:center;vertical-align: middle;background-color: #F3F3F3; " class="contenidoOculto">IIBB<br>CABA</th>
                                 <th style="text-align:center;vertical-align: middle;background-color: #C8C8C8;" class="contenidoOculto">PERC<br>IVA</th>
                                 <th style="text-align:center;vertical-align: middle;background-color: #F3F3F3; " class="contenidoOculto">IVA</th>
                                 <th style="text-align:center;vertical-align: middle;background-color: #C8C8C8;" class="contenidoOculto">Precio<br>Bruto</th>
                                 <th style="text-align:center;vertical-align: middle;background-color: #F3F3F3; " class="contenidoOculto">Desc.<br>Adicional</th>
                                
                                <th style="text-align:center; background-color:#DAF7A6;">Precio&nbsp;Costo<br><strong>Unitario&nbsp;Final</strong></th>
                                 <th style="text-align:center; background-color:#CFE9EC;">Precio&nbsp;Costo<br><strong>Bulto&nbsp;Final</strong></th>
                                 <th>Acción</th>
                             </tr>
                         </thead>
                         <tbody>';
   // if (!empty($buscar) && $buscar != " ") {#F3F3F3;
        //buscadorgeneral
        $sqljoin = mysqli_query($rjdhfbpqj, "SELECT productos.id_marcas, productos.id as idproducto, productos.codigo, productos.modo_producto, productos.nombre, productos.gananciasper, productos.categoria, productos.id_proveedor,productos.detalle, productos.estado, productos.unidadnom, marcas.empresa FROM productos INNER JOIN marcas 
    ON productos.id_marcas = marcas.id Where  productos.nombre LIKE '%$buscar%' OR marcas.empresa LIKE '%$buscar%' OR productos.codigo LIKE '%$buscar%' ORDER BY `productos`.`position` ASC 

    LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar);

   // }

    while ($rowproductos = mysqli_fetch_array($sqljoin)) {
        
    

        $idcategoria = $rowproductos["categoria"];
        $id_proveedor = $rowproductos["id_proveedor"];
        $gananciasper = $rowproductos["gananciasper"];
        $id = $rowproductos["idproducto"];
        $estado = $rowproductos["estado"];
        $idcodp = base64_encode($id);
        $id_marcas = $rowproductos["id_marcas"];
        $modo_producto = $rowproductos["modo_producto"];
        $unidadnom = $rowproductos["unidadnom"];

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

        //me fijo el porcentaje ganancia provvedor
        $sqlproveedores = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_proveedor'");
        if ($rowproveedores = mysqli_fetch_array($sqlproveedores)) {
            $porprovver = $rowproveedores["gananciaa"];
            $tipocomision = $rowproveedores["tipo"];
            if ($tipocomision == "0") {
                $tipov = "$";
            } else {
                $tipov = "%";
            }
            
        }
        //miro el precio anterior del producto

        $sqlpreciodant = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$id' ORDER BY `precioprod`.`fecha` DESC limit 1,1");
        if ($rowprecrodant = mysqli_fetch_array($sqlpreciodant)) {/* 
            $costo_totalvie = $rowprecrodant["costo_total"];
            $precio_kiloavie = $rowprecrodant["precio_kiloa"];
            $precio_kilobvie = $rowprecrodant["precio_kilob"]; */
            $costo_totalvie = $rowprecrodant["costo_total"];
            $costoxcajavie = $rowprecrodant["costoxcaja"];

        } else {
            $nohayante = "1";
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
        $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$id' ORDER BY `precioprod`.`fecha` DESC");
        if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
            $id = $rowprecioprod["id"];
            $idcod = base64_encode($id);
            $id_producto = $rowprecioprod["id_producto"];
            $kilo = $rowprecioprod["kilo"];
            //$cproveedor = $rowprecioprod["cproveedor"];
            $costo = $rowprecioprod["costo"];

            $tipoprov = $rowprecioprod["tipoprov"];
            $cproveedor = $rowprecioprod["cproveedor"];
            
            //paranuevos
            $nref = $rowprecioprod["nref"];
            $fecven = $rowprecioprod["fecven"];
            $agrstock = $rowprecioprod["agrstock"];
            $costoxcaj = $rowprecioprod["costoxcaj"];
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

            //me fijo si esta la ganancia de porveedor personalizada
            if($cproveedor > 0 && $cproveedor!=$porprovver){
                $porprovver = $cproveedor;
                $tipocomision = $tipoprov;
                if ($tipocomision == "0") {
                    $tipov = "$";
                } else {
                    $tipov = "%";
                }
            }

          /*   if ($tipocomision == "0") {
                $costo_total = $rowprecioprod["costo"] + $porprovver;
            }
            if ($tipocomision == "1") {
                $costo_total = $rowprecioprod["costo"] / 100 * $porprovver + $rowprecioprod["costo"];
            } */


            if ($gananciasper == "1") {
                $texga = "danger";
                $tipo = $rowprecioprod["tipo"];
                $gananciaa = $rowprecioprod["ganancia_a"];
                $gananciab = $rowprecioprod["ganancia_b"];
                $gananciac = $rowprecioprod["ganancia_c"];
            }
            // $costoxcaja = $rowprecioprod["costoxcaja"];

            if ($tipo == "0") {
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
            $precio_cajab = number_format($precio_cajabr, 2, '.', '');





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
        
              
               <td style="color: black;' . $colorestado . '"><strong>' . $rowproductos["nombre"] . '</strong>
               <br>
               <h9 style="color:grey;font-size:8pt;">Marca: ' . $marcaempre . '</h9>
               </td>
               <td style="text-align:center;">'; 
               if($nover=="0"){ 
              echo' <input name="nref' . $idfila . '" type="text" id="nref' . $idfila . '" value="' . $nref . '" style="text-align:center; width:100px; margin: 0 auto;"
              
              onkeyup="realizaProcesos' . $idfila . '(
            
                $('.$aster.'#jfndhom' . $idfila . ''.$aster.').val(),
                $('.$aster.'#costoxcaj' . $idfila . ''.$aster.').val(),
                $('.$aster.'#modobus' . $idfila . ''.$aster.').val(),
                $('.$aster.'#buscar' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#nref' . $idfila . ''.$aster.').val(),
                $('.$aster.'#fecven' . $idfila . ''.$aster.').val(),
                $('.$aster.'#agrstock' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#descuento' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_bsas' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_caba' . $idfila . ''.$aster.').val(),
                $('.$aster.'#perc_iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#desadi' . $idfila . ''.$aster.').val()
                
                )"; return false; 
                        
              
              onclick="select()">';
                    }else{
                        echo' <input name="nref' . $idfila . '" type="text" id="nref' . $idfila . '" value="" style="text-align:center; width:100px; margin: 0 auto;">';
                    }
               echo'</td>   
                <td style="text-align:center;">  
                '; 
                if($nover=="0"){ 
               echo' 
               <input type="date" class="form-control text-center" id="fecven' . $idfila . '" name="fecven' . $idfila . '" value="'.$fecven.'" style="width:130px; margin: 0 auto;"
               
               
                 
            onkeyup="realizaProcesos' . $idfila . '(
            
                $('.$aster.'#jfndhom' . $idfila . ''.$aster.').val(),
                $('.$aster.'#costoxcaj' . $idfila . ''.$aster.').val(),
                $('.$aster.'#modobus' . $idfila . ''.$aster.').val(),
                $('.$aster.'#buscar' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#nref' . $idfila . ''.$aster.').val(),
                $('.$aster.'#fecven' . $idfila . ''.$aster.').val(),
                $('.$aster.'#agrstock' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#descuento' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_bsas' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_caba' . $idfila . ''.$aster.').val(),
                $('.$aster.'#perc_iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#desadi' . $idfila . ''.$aster.').val()
                
                )"; return false; 

                onchange="realizaProcesos' . $idfila . '(
            
                    $('.$aster.'#jfndhom' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#costoxcaj' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#modobus' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#buscar' . $idfila . ''.$aster.').val(),            
                    $('.$aster.'#nref' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#fecven' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#agrstock' . $idfila . ''.$aster.').val(),            
                    $('.$aster.'#descuento' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#iibb_bsas' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#iibb_caba' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#perc_iva' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#iva' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#desadi' . $idfila . ''.$aster.').val()
                    
                    )"; return false; 
               
               
               
               >';
            }else{echo' <input type="date" class="form-control text-center" id="fecven" name="fecven" value="" style="width:130px; margin: 0 auto;">';}
            
       echo'
               </td>
               <td style="text-align:center;">'; 
               if($nover=="0"){ 
              echo'   <input name="agrstock' . $idfila . '" type="text" id="agrstock' . $idfila . '" value="' . $agrstock . '" style="text-align:center; color:blue; font-weight: 900; width:60px; margin: 0 auto;" 
              
                
            onkeyup="realizaProcesos' . $idfila . '(
            
                $('.$aster.'#jfndhom' . $idfila . ''.$aster.').val(),
                $('.$aster.'#costoxcaj' . $idfila . ''.$aster.').val(),
                $('.$aster.'#modobus' . $idfila . ''.$aster.').val(),
                $('.$aster.'#buscar' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#nref' . $idfila . ''.$aster.').val(),
                $('.$aster.'#fecven' . $idfila . ''.$aster.').val(),
                $('.$aster.'#agrstock' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#descuento' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_bsas' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_caba' . $idfila . ''.$aster.').val(),
                $('.$aster.'#perc_iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#desadi' . $idfila . ''.$aster.').val()
                
                )"; return false; 
              
              onclick="select()">';}else
              { 
                echo'   <input name="agrstock' . $idfila . '" type="text" id="agrstock' . $idfila . '" value="0" style="text-align:center;color:blue; font-weight: 900; width:60px; margin: 0 auto;" onclick="select()">';}
               

                $idfilaback = $idfila - 1;
                $idfilaup = $idfila + 1;
              echo' </td>


               <td style="text-align:center;"> <b id="fechaactual' . $idfila . '"></b></td>
              
               <td align="center" style="background-color:#FFE2B5;">
               
               
               <input name="jfndhom' . $idfila . '" type="hidden" id="jfndhom' . $idfila . '" value="' . $idcodp . '">
               <input name="modobus" type="hidden" id="modobus' . $idfila . '" value="' . $_SESSION["modobus"] . '">
               <input name="buscar" type="hidden" id="buscar' . $idfila . '" value="' . $_SESSION["buscar"] . '">
               
               <div style="position:relative; top:-12px;  font-size:8pt;"> <strong>'.$unidadver.' x ' . $kilo . ' ' . $unidadnom . '</strong></div>
            <input 
            type="text"  
            name="costoxcaj' . $idfila . '" 
            id="costoxcaj' . $idfila . '" 
            value="' . $rowprecioprod["costoxcaj"] . '"  
            
            onkeyup="realizaProcesos' . $idfila . '(
            
            $('.$aster.'#jfndhom' . $idfila . ''.$aster.').val(),
            $('.$aster.'#costoxcaj' . $idfila . ''.$aster.').val(),
            $('.$aster.'#modobus' . $idfila . ''.$aster.').val(),
            $('.$aster.'#buscar' . $idfila . ''.$aster.').val(),            
            $('.$aster.'#nref' . $idfila . ''.$aster.').val(),
            $('.$aster.'#fecven' . $idfila . ''.$aster.').val(),
            $('.$aster.'#agrstock' . $idfila . ''.$aster.').val(),            
            $('.$aster.'#descuento' . $idfila . ''.$aster.').val(),
            $('.$aster.'#iibb_bsas' . $idfila . ''.$aster.').val(),
            $('.$aster.'#iibb_caba' . $idfila . ''.$aster.').val(),
            $('.$aster.'#perc_iva' . $idfila . ''.$aster.').val(),
            $('.$aster.'#iva' . $idfila . ''.$aster.').val(),
            $('.$aster.'#desadi' . $idfila . ''.$aster.').val()
            
            )"; return false; 
            
            onkeypress="nextFocus('.$aster.'costoxcaj' . $idfila . ''.$aster.', '.$aster.'costoxcaj' . $idfilaup . ''.$aster.')"  
            
            onclick="select()" 
            
            style="width: 100px; text-align: center; color:blue; font-weight: 900; position:relative; top:-8px; "
            
            >
            
           
        </td>

   <td style="background-color:#FCFCFC; text-align: center;" onclick="mostrarContenido(this)">
            <strong>$</strong>
             <b style="color:black; "  id="costo' . $idfila . '">' . $costo . '<b>
             
             
             </td>

               <td  style="text-align:center; background-color: #F7F7F7; " class="contenidoOculto">
               <div style="position:relative; top:-11px; text-align: center;"><p style="font-size:8pt; position:relative; top:10px;">
               <strong>%</strong></p>
              
                 <input type="text"  style="width: 60px; color:blue; font-weight: 900; text-align: center;" name="descuento' . $idfila . '" id="descuento' . $idfila . '" value="' . $descuento . '"  
                 
                 onkeyup="realizaProcesos' . $idfila . '(
            
                    $('.$aster.'#jfndhom' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#costoxcaj' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#modobus' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#buscar' . $idfila . ''.$aster.').val(),            
                    $('.$aster.'#nref' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#fecven' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#agrstock' . $idfila . ''.$aster.').val(),            
                    $('.$aster.'#descuento' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#iibb_bsas' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#iibb_caba' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#perc_iva' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#iva' . $idfila . ''.$aster.').val(),
                    $('.$aster.'#desadi' . $idfila . ''.$aster.').val()
                    
                    )"; return false; 
                 
                 onclick="select()">
               
               </div>
               </td>
               <td style="text-align:center; background-color: #FCFCFC;" class="contenidoOculto"><b style="color:black; "  id="pcondescu' . $idfila . '">$' . $pcondescu . '<b>
               
               
               </td>

               <td  style="text-align:center; background-color: #F7F7F7; " class="contenidoOculto">
               <div style="position:relative; top:-11px; text-align: center;"><p style="font-size:8pt; position:relative; top:10px;">
               <strong>%</strong></p>
              
                 <input type="text"  style="width: 60px; color:blue; font-weight: 900; text-align: center;" name="iibb_bsas' . $idfila . '" id="iibb_bsas' . $idfila . '" value="' . $iibb_bsas . '" 
                 
                   
            onkeyup="realizaProcesos' . $idfila . '(
            
                $('.$aster.'#jfndhom' . $idfila . ''.$aster.').val(),
                $('.$aster.'#costoxcaj' . $idfila . ''.$aster.').val(),
                $('.$aster.'#modobus' . $idfila . ''.$aster.').val(),
                $('.$aster.'#buscar' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#nref' . $idfila . ''.$aster.').val(),
                $('.$aster.'#fecven' . $idfila . ''.$aster.').val(),
                $('.$aster.'#agrstock' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#descuento' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_bsas' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_caba' . $idfila . ''.$aster.').val(),
                $('.$aster.'#perc_iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#desadi' . $idfila . ''.$aster.').val()
                
                )"; return false; 
                 
                 onclick="select()">
               
               </div>
               </td>

               
               <td  style="text-align:center; background-color: #FCFCFC; " class="contenidoOculto">
               <div style="position:relative; top:-11px; text-align: center;"><p style="font-size:8pt; position:relative; top:10px;">
               <strong>%</strong></p>
              
                 <input type="text"  style="width: 60px; color:blue; font-weight: 900; text-align: center;" name="iibb_caba' . $idfila . '" id="iibb_caba' . $idfila . '" value="' . $iibb_caba . '" 
                 
                   
            onkeyup="realizaProcesos' . $idfila . '(
            
                $('.$aster.'#jfndhom' . $idfila . ''.$aster.').val(),
                $('.$aster.'#costoxcaj' . $idfila . ''.$aster.').val(),
                $('.$aster.'#modobus' . $idfila . ''.$aster.').val(),
                $('.$aster.'#buscar' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#nref' . $idfila . ''.$aster.').val(),
                $('.$aster.'#fecven' . $idfila . ''.$aster.').val(),
                $('.$aster.'#agrstock' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#descuento' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_bsas' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_caba' . $idfila . ''.$aster.').val(),
                $('.$aster.'#perc_iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#desadi' . $idfila . ''.$aster.').val()
                
                )"; return false; 
                 
                 onclick="select()">
               
               </div>
               </td>
               
               
              
               <td  style="text-align:center; background-color: #F7F7F7; " class="contenidoOculto">
               <div style="position:relative; top:-11px; text-align: center;"><p style="font-size:8pt; position:relative; top:10px;">
               <strong>%</strong></p>
              
                 <input type="text"  style="width: 60px; color:blue; font-weight: 900; text-align: center;" name="perc_iva' . $idfila . '" id="perc_iva' . $idfila . '" value="' . $perc_iva . '" 
                 
                   
            onkeyup="realizaProcesos' . $idfila . '(
            
                $('.$aster.'#jfndhom' . $idfila . ''.$aster.').val(),
                $('.$aster.'#costoxcaj' . $idfila . ''.$aster.').val(),
                $('.$aster.'#modobus' . $idfila . ''.$aster.').val(),
                $('.$aster.'#buscar' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#nref' . $idfila . ''.$aster.').val(),
                $('.$aster.'#fecven' . $idfila . ''.$aster.').val(),
                $('.$aster.'#agrstock' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#descuento' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_bsas' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_caba' . $idfila . ''.$aster.').val(),
                $('.$aster.'#perc_iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#desadi' . $idfila . ''.$aster.').val()
                
                )"; return false; 
                 
                 
                 
                 onclick="select()">
               
               </div>
               </td>

               
               <td  style="text-align:center; background-color: #FCFCFC; " class="contenidoOculto">
               <div style="position:relative; top:-11px; text-align: center;"><p style="font-size:8pt; position:relative; top:10px;">
               <strong>%</strong></p>
              
                 <input type="text"  style="width: 60px; color:blue; font-weight: 900; text-align: center;" name="iva' . $idfila . '" id="iva' . $idfila . '" value="' . $iva . '" 
                 
                   
            onkeyup="realizaProcesos' . $idfila . '(
            
                $('.$aster.'#jfndhom' . $idfila . ''.$aster.').val(),
                $('.$aster.'#costoxcaj' . $idfila . ''.$aster.').val(),
                $('.$aster.'#modobus' . $idfila . ''.$aster.').val(),
                $('.$aster.'#buscar' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#nref' . $idfila . ''.$aster.').val(),
                $('.$aster.'#fecven' . $idfila . ''.$aster.').val(),
                $('.$aster.'#agrstock' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#descuento' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_bsas' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_caba' . $idfila . ''.$aster.').val(),
                $('.$aster.'#perc_iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#desadi' . $idfila . ''.$aster.').val()
                
                )"; return false; 
                 
                 
                 onclick="select()">
               
               </div>
               </td>
               
               
               
               
               
               
               
               <td style="text-align:center; background-color: #F7F7F7;" class="contenidoOculto">
               
               <b style="color:black; "  id="pbruto' . $idfila . '">$' . $pbruto . '<b>
               
               
               </td>


               </td>

               
               <td  style="text-align:center; background-color: #FCFCFC; " class="contenidoOculto">
               <div style="position:relative; top:-11px; text-align: center;"><p style="font-size:8pt; position:relative; top:10px;">
               <strong>%</strong></p>
              
                 <input type="text"  style="width: 60px; color:blue; font-weight: 900; text-align: center;" name="desadi' . $idfila . '" id="desadi' . $idfila . '" value="' . $desadi . '" 
                 
                   
            onkeyup="realizaProcesos' . $idfila . '(
            
                $('.$aster.'#jfndhom' . $idfila . ''.$aster.').val(),
                $('.$aster.'#costoxcaj' . $idfila . ''.$aster.').val(),
                $('.$aster.'#modobus' . $idfila . ''.$aster.').val(),
                $('.$aster.'#buscar' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#nref' . $idfila . ''.$aster.').val(),
                $('.$aster.'#fecven' . $idfila . ''.$aster.').val(),
                $('.$aster.'#agrstock' . $idfila . ''.$aster.').val(),            
                $('.$aster.'#descuento' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_bsas' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iibb_caba' . $idfila . ''.$aster.').val(),
                $('.$aster.'#perc_iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#iva' . $idfila . ''.$aster.').val(),
                $('.$aster.'#desadi' . $idfila . ''.$aster.').val()
                
                )"; return false; 
                 
                 
                 onclick="select()">
               
               </div>
               </td>
               
               




             

                <td style="display:none;" ><i id="simblal' . $idfila . '"></i>$<b id="variacostop' . $idfila . '"></b><br> %<b id="variacostopor' . $idfila . '"></b></td> 
               

                <td style="text-align:center; background-color:#ECFCEE;" id="listasa"><b style="color:black;">
                   <div onclick="mostrarOcultarElemento' . $idfila . '()">                        
                <span class="badge badge-pill badge-' . $texga . '" style="display:none;">Gan. x  Kg. ' . $sibolo . '<b id="gananciaa' . $idfila . '"></b></span>

      

                                                                           

<span class="badge badge-pill badge-' . $texga . '">Por 1 ' .  strtolower($unidadnom) . '</span><br>
<h2> <span class="badge badge-success"> <b style="color:black;">$<b id="costo_total' . $idfila . '">' . $costo_total . '</b></span></h2>


                
                <div  id="miSpan' . $idfila . '" style="display:none;">
                <span class="badge badge-pill badge-primary" title="Diferencia">%<b id="varkpora' . $idfila . '"></b> 
                <i id="flechaa' . $idfila . '"></i><b id="variaka' . $idfila . '"></b>$</span>
                <br>
                <input type="text" class="badge badge-pill" name="inputNumber" id="inputNumber" value="20">
                <span class="badge badge-pill badge-light">Stock 30.300 ' .  strtolower($unidadnom) . ' <b id="stokuni' . $idfila . '"></b></span>
                </div></div>
                </td>





                <td style="text-align:center;background-color:#ECF9FC;">
                <div onclick="mostrarOcultarElementob' . $idfila . '()">                          
                <span class="badge badge-pill badge-' . $texga . '" style="display:none;">Gan. x  Kg. ' . $sibolo . '<b id="gananciab' . $idfila . '"></b></span>
      


                                
<span class="badge badge-pill badge-' . $texga . '">'.$unidadver.' x ' . $kilo . ' ' . strtolower($unidadnom) . '</span><br>
<h2> <span class="badge badge-info"> <b style="color:black;">$<b id="costoxcaja' . $idfila . '">' . $costoxcaja . '</b></span></h2>




               
                <div  id="miSpanb' . $idfila . '" style="display:none;">
                <span class="badge badge-pill badge-primary" title="Diferencia">%<b id="varkporb' . $idfila . '"></b> 
                <i id="flechab' . $idfila . '"></i>
                <b id="variakb' . $idfila . '"></b> $</span>
                <br>
              
                <input type="text" class="badge badge-pill" name="inputNumber" id="inputNumber" value="20">
                
                
                <span class="badge badge-pill badge-light">Stock 400 '.$unidadver.'s<b id="stokbul' . $idfila . '"></b></span>
                </div> </div>
                </td>





               
                                 
               
                <td><div class="button-list">

                <a  data-toggle="modal" data-target="#exampleStandardModal' . $rowprecioprod["id"] . '"" target="_parent" class="btn btn-success-rgba" title="HISTORIAL">H</a>

                <a href="/lproductos/?jfndhom=' . $idcodp . '&kkfnuhtf=' . $rowprecioprod["id_marcas"] . '" target="_parent" class="btn btn-success-rgba" title="Editar Productos"><i class="ri-pencil-line"></i></a>
                <a href="javascript:eliminar(' . "'/lproductos/mlkdths?" . 'juhytm=' . $idcodp . '' . "'" . ')" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                </div>
                </td>
               
            </tr>';


        //modal
        echo '
                                                
        <div class="modal fade" id="exampleStandardModal' . $rowprecioprod["id"] . '" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleStandardModalLabel">Historial ' . $rowproductos["nombre"] . ' </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="row">
                            <div class="container">
                             <div class="col-lg-12">';
        $idproductohis = $rowproductos["idproducto"];
        $sqlprecioprodr = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idproductohis' ORDER BY `precioprod`.`fecha` DESC limit 1,24");
        while ($rowprecioprodr = mysqli_fetch_array($sqlprecioprodr)) {
            $fechay = $rowprecioprodr["fecha"];
            $fechays = explode("-", $fechay);
            $fechaysw = $fechays[2] . "/" . $fechays[1] . "/" . $fechays[0];
            echo '<br> <p style="color:black;"> FECHA:  ' . $fechaysw . ' <br> 
            COSTO x  '. $rowproductos["unidadnom"] . ': <strong>$' . $rowprecioprodr["costo_total"] . ' </strong><br>
            COSTO x  '. $unidadver . ' de '. $rowprecioprodr["kilo"] . ' '. $rowproductos["unidadnom"] . ': <strong>$' . $rowprecioprodr["costoxcaja"] . ' </strong> <br>
            
            
            
            <p> <hr>
                             
                             ';
        }





        echo ' </div>
                             </div>
                             </div>
                             </div>
                    
        
                </div>
            </div>
        </div>
        
       
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


	//Validmos el incrementador par que no genere error
	//de consulta.  
    if($IncrimentNum<=0){}else {
        echo "<a href=\"productos?pag=".$IncrimentNum."\">Seguiente</a>";
        }
        

    ?>





    </table>


    <script>

function nextFocus(inputF, inputS) {
  document.getElementById(inputF).addEventListener('keydown', function(event) {
    if (event.keyCode == 13) {
      document.getElementById(inputS).select();
    }
  });
}
</script>



</div>
<script>
    let contenidoVisible = false;

    function mostrarContenido() {
        const elementosOcultos = document.querySelectorAll('.contenidoOculto');

        if (contenidoVisible) {
            elementosOcultos.forEach(elemento => {
                elemento.style.display = 'none';
            });
        } else {
            elementosOcultos.forEach(elemento => {
                elemento.style.display = 'table-cell';
            });
        }

        contenidoVisible = !contenidoVisible;
    }

    let contenidoVisibleb = false;



</script>