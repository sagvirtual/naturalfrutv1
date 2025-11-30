<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/funcNombrcliente.php');
include('../funciones/funcNombrProveedor.php');
include('../funciones/func_presentacion.php');
include('../funciones/StatusOrden.php');



function stockAnterior($rjdhfbpqj, $id_producto, $desde_date)
{
    $desde_dated = date('Y-m-d', strtotime($desde_date . ' -1 day'));
    $CantStocktotal = 0;
    //primera boleta stock
    $sqlsw = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_producto = '$id_producto' and fecha >='2025-03-01' ORDER BY id asc");
    if ($rowsdk = mysqli_fetch_array($sqlsw)) {
        $CantStocktotal = $rowsdk['stock'];
        $fechastos = $rowsdk['fecha'];
        //$CantStocktotal = 0;
    } else {
        $sqlswd = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto = '$id_producto'");
        while ($rowsdkd = mysqli_fetch_array($sqlswd)) {
            $CantStocktotal += $rowsdkd['CantStock'];
            //$CantStocktotal = 0;
        }
        $fechastos = '2025-03-01';
    }


    $sqdl = mysqli_query($rjdhfbpqj, "SELECT cantidad FROM stockinicial WHERE id_producto='$id_producto'");
    if ($rowstid = mysqli_fetch_array($sqdl)) {

        $cantstocanteror = $rowstid['cantidad'];
    }

    //total compra ingreso

    $sqlswcompra = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_producto = '$id_producto' and fecha >='2025-01-01' and id_orden!='0' ORDER BY id asc");
    if ($rowsdkcom = mysqli_fetch_array($sqlswcompra)) {
        $desde_dateini = $rowsdkcom['fecha'];
    }

    $resultsd = 0;
    $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_producto = '$id_producto'   AND fecha BETWEEN  '$desde_dateini' AND '$desde_dated' AND id_orden!='0'");
    while ($rowdd = mysqli_fetch_array($sqlcompra)) {
        $presentacion = $rowdd['kilo'];
        $unid_bulto = $rowdd['unid_bulto'];
        if ($unid_bulto > 0) {

            $resultsd += $rowdd['agrstock'] * $presentacion;
        } else {
            $resultsd += $rowdd['agrstock'];
        }
    }

    //total credito ingreso
    $result = 0;

    $sqlcreditod = mysqli_query($rjdhfbpqj, "SELECT * FROM item_credito Where id_producto = '$id_producto' AND fecha BETWEEN  '$desde_dateini' AND '$desde_dated' AND modo='0'");
    while ($rowddd = mysqli_fetch_array($sqlcreditod)) {
        $presentaciodnd = $rowddd['kilo'];
        $unid_budltod = $rowddd['tipounidad'];
        if ($unid_budltod > 0) {

            $result += $rowddd['kilos'] * $presentaciodnd;
        } else {
            $result += $rowddd['kilos'];
        }
    }

    //total egreso

    $resultdsdss = 0;

    $sqdlcreditdo = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_producto = '$id_producto' AND fecha BETWEEN  '$desde_dateini' AND '$desde_dated' AND modo='0'");
    $canverificafin = mysqli_num_rows($sqdlcreditdo);
    while ($rowddsds = mysqli_fetch_array($sqdlcreditdo)) {
        $presentaciond = $rowddsds['presentacion'];
        // $resultdsdss += $rowddsds['kilos'];
        $unid_bultod = $rowddsds['tipounidad'];
        if ($unid_bultod > 0) {

            $resultdsdss += $rowddsds['kilos'] * $presentaciond;
        } else {
            $resultdsdss += $rowddsds['kilos'];
        }
    }




    //$resultd = $resultdsdss;
    $resultd = ($resultsd + $result + $cantstocanteror) - $resultdsdss;

    return number_format($resultd, 0, '.', '');
}
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

if ($_GET['focf'] == 1) {
    $productods = $_GET['producto'];
} else {
    $productods = $_POST['idpropost'];
}



$productod = explode("@", $productods);
$producto = preg_replace('/\s+/', ' ', $productod[0]);

$id_producto = $productod[1];

$unidadprdiuc = funcPresenatcion($rjdhfbpqj, $id_producto);
$unidadprdd = $unidadprdiuc['NombreUnidad'];
//me fijo la primer compra
$sqlswcompra = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_producto = '$id_producto' and fecha >='2025-01-01' and id_orden!='0' ORDER BY id asc");
if ($rowsdkcom = mysqli_fetch_array($sqlswcompra)) {
    $desde_dateini = $rowsdkcom['fecha'];
}

//if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "57" || $tipo_usuario == "3" || $tipo_usuario == "1" || $tipo_usuario == "30") {
if ($tipo_usuario == "0" || $tipo_usuario == "1") {
    if (!empty($_POST['desde_date']) && !empty($_POST['hasta_date'])) {
        $_SESSION['desde_date'] = $_POST['desde_date'];
        $_SESSION['hasta_date'] = $_POST['hasta_date'];
    } else {
        $_SESSION['desde_date'] = $desde_dateini;
        $_SESSION['hasta_date'] = $fechahoy;
    }





    $desde_date = $_SESSION['desde_date'];
    $hasta_date = $_SESSION['hasta_date'];

    $cantstocktotal = stockAnterior($rjdhfbpqj, $id_producto, $desde_date);

    if ($id_producto <= 0) {
        $id_producto = 999999999999999;
    }

    //  $cantstocktotal = 0;




?>



    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Ingreso y Egreso de Stock - Natural Frut</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    </head>
    </script>

    <body>
        <style>
            body {
                zoom: 85%;
                scroll-behavior: smooth;
                /* Escala la página al 80% del tamaño original ; onclick="ajax_buscar('dsdssddds');" */
            }
        </style>

        <div>



            <div class="bg-dark text-white text-center" style="padding-left: 10px; padding: 0; flex-shrink: 0;">
                <p style=" font-size: 10pt; color: white;">Sistema de Ingreso y Egreso de Stock Versión 1.0.0</p>
            </div>


            <div class="container">
                <!--  <h1 style="color:red;"> NO!! USAR ESTOY CORRIGIENDO </h1> -->
                <form action="ingreso_egreso_stock" method="post">
                    <div class="row">
                        <div class="col-2">
                            <a href="../../">
                                <img src="/assets/images/logopc.png" style="width:38mm;" tabindex="-1"></a>
                        </div>



                        <div class="col-4">
                            <div style="padding-bottom:15px; width: 350px;">
                            </div>

                            <div style="padding-bottom:15px; width: 350px;">
                                <b>Fecha desde</b>
                                <input type="date" id="desde_date" name="desde_date" class="form-control" value="<?= $desde_date ?>" style="width: 350px;" min="<?= $desde_dateini ?>">
                            </div>

                        </div>
                        <div class="col-2" style="width: auto;  position: relative; float: left;">

                        </div>

                        <div class="col-4">

                            <div style="padding-bottom:15px; width: 350px;">
                            </div>

                            <b>Fecha Hasta</b>
                            <input type="date" id="hasta_date" name="hasta_date" class="form-control" value="<?= $hasta_date ?>" style="width: 350px;" min="<?= $desde_dateini ?>">

                        </div>


                        <div class="col-2" style="width: auto;  position: relative; float: left;"><a href="debe_haber?jhduskdsa=Mw==" tabindex="-1">
                                <button type="submit" class="btn btn-success" style="position: absolute; bottom: 16px; left: 0px;" tabindex="-1">Ver</button></a>
                        </div>

                        <input type="hidden" id="idpropost" name="idpropost" value="<?= $productods ?>">

                    </div>
                </form>


                <div class="row">



                    <div class="container">








                        <div>
                            <table class="table table-bordered table-sm" style="bottom: 300px; <?= $noverpro ?>">
                                <thead>
                                    <tr>
                                        <th style="text-align: left;height: 0px;" colspan="8">&nbsp;&nbsp;
                                            <label for="producto">Producto <?
                                                                            if ($id_producto != "999999999999999") {
                                                                                echo '' . $id_producto . '';
                                                                            } ?>:</label>

                                            <?php
                                            include('../produccionenva/inpubuscado.php');


                                            ?>

                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #8a8a8aff; " colspan="8">

                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="width: 100px; text-align: center;vertical-align: middle;">Estado</th>
                                        <th style="width: 100px; text-align: center;vertical-align: middle;">Fecha</th>
                                        <th style="width: 60px; text-align: center;vertical-align: middle;">Tipo</th>
                                        <th style="text-align: left; padding-left: 10px;vertical-align: middle;">Proveedores / Clientes / Otros</th>
                                        <th style="width: 150px; padding-left: 10px;text-align: center; color:green;">Ingreso Stock<br><?= $unidadprdd ?></th>
                                        <th style="width: 150px; padding-left: 10px;text-align: center;color:red;">Egreso Stock<br><?= $unidadprdd ?></th>
                                        <th style="width: 150px; padding-left: 10px;text-align: center;">Total Stock<br><?= $unidadprdd ?></th>
                                        <th style="width: 90px; padding-left: 10px;text-align: center;vertical-align: middle;">Ver</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    echo '                      
                                                        <tr>

                                            
                                            <td style="text-align: center;vertical-align: middle;">        
                                              
                                            </td>  
                                            <td style="text-align: center; vertical-align: middle;color:red;">        
                                               
                                            </td>
                                            <td style="padding-left: 3mm; vertical-align: middle;text-align: left;color:grey;">   
                                          Anterior 
                                            </td>
                                            <td style=" text-align: center; vertical-align: middle;"> 
             
                                            </td>
                                            <td style=" text-align: center; vertical-align: middle;color:grey;">
                                                   
                                            </td>
                                            <td style=" text-align: center; vertical-align: middle;color:grey;">
                                             
                                                <span class="editable" data-valor="' . $cantstocktotal . '">
                                            <b>' . $cantstocktotal . '</b>
                                        </span>
                                            </td>
                                            <td style=" text-align: center; vertical-align: middle;color:grey;">
                                             
                                            </td>
                                        </tr>  ';


                                    // Consulta unificada para "Ingreso" y "Egreso" con prioridad
                                    $sql = mysqli_query($rjdhfbpqj, "
                      
                                
                                SELECT 
                                id, 
                                fecha, 
                                agrstock AS cantstock, 
                                'ingreso' AS tipo, 
                                1 AS prioridad, 
                                '0' AS modo,
                                id_proveedor AS idnombre,
                                id_orden,
                                id_producto,
                                fecha_accion as hora,
                                kilo AS presentacion,
                                unid_bulto AS bulto
                                FROM prodcom 
                                WHERE id_producto='$id_producto' AND id_orden >=1 AND fecha BETWEEN '$desde_date' AND '$hasta_date' 


                                UNION ALL
                                
                                SELECT 
                                id, 
                                fecha, 
                                kilos AS cantstock, 
                                'egreso' AS tipo, 
                                2 AS prioridad, 
                                modo,
                                id_cliente AS idnombre,
                                id_orden,
                                id_producto,
                                fecha_accion as hora,
                                presentacion,
                                tipounidad AS bulto
                                FROM item_orden 
                                WHERE modo = '0' and id_producto='$id_producto'
                                AND fecha BETWEEN '$desde_date' AND '$hasta_date' 


                                       UNION ALL
                                
                                SELECT 
                                id, 
                                fecha, 
                                kilos AS cantstock, 
                                'ingresocredito' AS tipo, 
                                3 AS prioridad, 
                                modo,
                                id_cliente AS idnombre,
                                id_orden,
                                id_producto,
                                fecha_accion as hora,
                                presentacion,
                                tipounidad AS bulto
                                FROM item_credito 
                                WHERE  id_producto='$id_producto'
                                AND fecha BETWEEN '$desde_date' AND '$hasta_date' 
                                
                                ORDER BY hora ASC, prioridad ASC
                                    ");
                                    //Ingreso Stock
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $id_orden = $row["id"];
                                        $idpago = $row["id_orden"];
                                        $fechaad = $row["fecha"];
                                        $cantstock = $row["cantstock"];
                                        $tipo = $row["tipo"];
                                        $idnombre = $row["idnombre"];
                                        $hora = $row["hora"];
                                        $presentacion = $row["presentacion"];
                                        $bulto = $row["bulto"];
                                        if ($bulto == 1) {
                                            $cantstockd = $row["cantstock"] * $presentacion;
                                            $cantstock = number_format($cantstockd, 2, '.', '');
                                        }
                                        $status = StatusOrden($rjdhfbpqj, $idpago);
                                        // Calcular el saldo dinámico
                                        if ($tipo == 'ingreso') {
                                            $cantstocktotal += $cantstock; // Sumar al saldo en caso de "Ingreso"
                                            $ingreso = $cantstock;
                                            $egreso = 0;
                                        } elseif ($tipo == 'ingresocredito') {
                                            $cantstocktotal += $cantstock; // Sumar al saldo en caso de "credito"
                                            $ingreso = $cantstock;
                                            $egreso = 0;
                                        } elseif ($tipo == 'egreso') {
                                            $cantstocktotal -= $cantstock; // Restar del saldo en caso de "Egreso"
                                            $ingreso = 0;
                                            $egreso = $cantstock;
                                        }

                                        $horac = explode(" ", $hora);

                                        $encourl = base64_encode($idpago);

                                        $cantstocktotal_formateado = number_format($cantstocktotal, 2, '.', '');
                                        if (substr($cantstocktotal_formateado, -3) === '.00') {
                                            $cantstocktotal = number_format($cantstocktotal, 0, '.', '');
                                        }

                                        $cantstocktotal_formdo = number_format($cantstock, 2, '.', '');
                                        if (substr($cantstocktotal_formdo, -3) === '.00') {
                                            $cantstock = number_format($cantstock, 0, '.', '');
                                        }


                                        if ($tipo == "egreso") {

                                            $egfresstotos += $cantstock;



                                            echo '                      
                                                        <tr>

                                            
                                            <td style="text-align: center;vertical-align: middle;">        
                                                ' . $status . '
                                            </td>  <td style="text-align: center;vertical-align: middle;">        
                                                ' . date('d/m/y', strtotime($fechaad)) . '<br><pd style="color: grey">' . $horac[1] . '</pd>
                                            </td>  
                                            <td style="text-align: center; vertical-align: middle;color:red;">        
                                                Venta<br>Nº' . $idpago . '
                                            </td>
                                            <td style="padding-left: 3mm; vertical-align: middle;">   
                                           id' . $idnombre . ' - ' . NomCliente($rjdhfbpqj, $idnombre) . '
                                            <td style=" text-align: center; vertical-align: middle;"> 
             
                                            </td>
                                            <td style=" text-align: center; vertical-align: middle;color:red;">
                                                <b> ' . $cantstock . ' </b>             
                                            </td>
                                            <td style=" text-align: center; vertical-align: middle;">
                                                <b>' . $cantstocktotal . '</b>
                                            </td>
                                            <td style=" text-align: center; vertical-align: middle;">

                                            <a href="../nota_de_pedido/nota_de_pedido_pdf.php?jdhsknc=' . $encourl . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="PDF Nota de Pedido">
                                            <button type="button" class="btn btn-success btn-sm" style="width: 40px;" tabindex="-1">⌾</button></a>
                                            </td>
                                        </tr>  ';
                                        } elseif ($tipo == "ingreso") {
                                            //Egreso Stock
                                            $ingrestotos += $cantstock;

                                            echo '                      
                                
                                            <tr>
                                                   <td style="text-align: center;vertical-align: middle;">        
                                       
                                            </td> 
                                                  <td style="text-align: center;vertical-align: middle;">        
                                                    ' . date('d/m/y', strtotime($fechaad)) . '<br><pd style="color: grey">' . $horac[1] . '</pd>
                                                  </td>
                                                       <td style="text-align: center;vertical-align: middle;color:green;">        
                                                    Compra<br>Nº' . $idpago . '
                                                  </td>
                                                  <td style="padding-left: 3mm;text-align:left;vertical-align: middle;color:green;">        
                                                    ' . NomProveedor($rjdhfbpqj, $idnombre) . '
                                                  </td>
                                                  <td style="vertical-align: middle;text-align: center;color:green;"> 
                                                      <b> ' . $cantstock . '  </b>           
                                                    </td>
                                                       <td> 
                                                                 
                                                    </td>
                                               
                                            <td style="text-align: center; vertical-align: middle;">
                                                <b>  ' . $cantstocktotal . '  </b>
                                            </td>
                                                <td style=" text-align: center; vertical-align: middle;">

                                        <a href="../compra_proveedor/?ookdjfv=' . $idnombre . '&idcomopra=' . $idpago . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="Ver Compra">
                                        <button type="button" class="btn btn-primary btn-sm" style="width: 40px;" tabindex="-1">⌾</button></a>
                                        </td>';
                                        } elseif ($tipo == "ingresocredito") {
                                            //Egreso Stock
                                            $id_ordencod = base64_encode($idpago);
                                            $idnombrec = base64_encode($idnombre);
                                            $ingrestotoscred += $cantstock;

                                            echo '                      
                                
                                            <tr>
                                                   <td style="text-align: center;vertical-align: middle;">        
                                              
                                            </td> 
                                                  <td style="text-align: center;vertical-align: middle;">        
                                                    ' . date('d/m/y', strtotime($fechaad)) . '<br><pd style="color: grey">' . $horac[1] . '</pd>
                                                  </td>
                                                       <td style="text-align: center;vertical-align: middle;color:green;">        
                                                    Credito<br>Nº' . $idpago . '
                                                  </td>
                                                  <td style="padding-left: 3mm;text-align:left;vertical-align: middle;color:green;">        
                                                    ' . NomCliente($rjdhfbpqj, $idnombre) . '
                                                  </td>
                                                  <td style="vertical-align: middle;text-align: center;color:green;"> 
                                                      <b> ' . $cantstock . '  </b>           
                                                    </td>
                                                       <td> 
                                                                 
                                                    </td>
                                               
                                            <td style="text-align: center; vertical-align: middle;">
                                                <b>  ' . $cantstocktotal . '       </b>
                                            </td>
                                                <td style=" text-align: center; vertical-align: middle;">

                                        <a href="../nota_de_credito/?jhduskdsa=' . $idnombrec . '&orjndty=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="Ver Compra">
                                        <button type="button" class="btn btn-primary btn-sm" style="width: 40px;" tabindex="-1">⌾</button></a>
                                        </td>';
                                        }
                                        echo ' </td>


                                </tr> ';
                                    }


                                    $ingdstotos = $ingrestotos +  $ingrestotoscred;
                                    echo '                      
                                
                                            <tr>
                                                     <td style="text-align: center;vertical-align: middle;color:green;" colspan="4">        
                                                  
                                                  </td>
                                                  
                                                       <td style="text-align: center;vertical-align: middle;color:green;" >        
                                                   Ingreso<br>  <b> ' . $ingdstotos . ' ' . $unidadprdd . '</b>  
                                                  </td>
                                                  <td style="padding-left: 3mm;text-align:center;vertical-align: middle;color:red;">        
                                                  Egreso   <br><b> ' . $egfresstotos . ' ' . $unidadprdd . '</b>  
                                                  </td>
                                          
                                               
                                            <td style="text-align: center; vertical-align: middle;">
                                                <b>Total<br>  ' . $cantstocktotal . '       </b>
                                            </td>
                                                <td style=" text-align: center; vertical-align: middle;">
                                        </td> </tr> ';

                                    ?>


                                </tbody>
                            </table>


                        </div>

                    </div>










                </div>


            </div>
        </div>










        <style>
            /* Estilos del botón flotante */
            .btnGoToTop {
                position: fixed;
                bottom: 20px;
                /* Distancia desde la parte inferior */
                right: 20px;
                /* Distancia desde la derecha */
                z-index: 99;
            }
        </style>







    </body>

    </html>
<? } else {
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='../index.php?error=1232'");
    echo ("</script>");
} ?>

<script>
    // Al hacer clic, cambio <b> por <input>
    $(document).on("click", ".editable", function() {
        if ($(this).find("input").length > 0) return;

        var val = $(this).data("valor");
        $(this).html('<input type="number" step="0.001" id="cantistok" class="edit-stock" value="' + val + '" style="width:100px;text-align:center;">');
        $(this).find("input").focus().select();
    });

    // Guardar al perder foco o Enter
    $(document).on("blur", ".edit-stock", function() {
        actualizarStock(this);
    });
    $(document).on("keypress", ".edit-stock", function(e) {
        if (e.which === 13) actualizarStock(this);
    });


    function actualizarStock() {
        let cantidad = $("#cantistok").val();
        let id_producto = '<?= $id_producto ?>'

        $.ajax({
            type: "POST",
            url: "actualizar_stock.php",
            data: {
                cantidad: cantidad,
                id_producto: id_producto
            },
            beforeSend: function() {
                console.log("Actualizando...");
                location.reload();
            },
            success: function(respuesta) {
                if (respuesta == "ok") {
                    console.log("Stock actualizado correctamente");
                    location.reload();
                } else {
                    console.log("Error: " + respuesta);
                }
            }
        });
    }
</script>