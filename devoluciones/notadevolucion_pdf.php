<? include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../nota_de_pedido/func_nombreunid.php');


$hasta_date = $_GET['hasta_date'];
$desde_date = $_GET['desde_date'];
$buscar = $_GET['buscar'];
$busproveedor = $_GET['busproveedor'];
$busproveedorb = $_GET['busproveedorb'];
$modo = $_GET['modo'];
$comilla = "'";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Generar PDF </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
    </style>
    <div class="container">
        <?php
        /* $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM devoluciones Where id='$idorden'");
if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

    $id_clienteint = $rowordenx['id_cliente'];
    $fechaord = $rowordenx['fecha'];
    $horaord = $rowordenx['hora'];
    $idordendev = $rowordenx['id_orden'];
    if ($idordendev == 0) {
        $idordendev = "Int.";
    } else {
        $idordendev = "Nº" . $rowordenx['id_orden'];
    }
} */



        /* $sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$id_clienteint'");
if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

    $proveedor = $rowclientes["nom_contac"];
    $direccion = $rowclientes['nom_empr'];
}
 */






        ?>




        <div style="width: 100%; text-align: center;background-color: grey; color:white;"><!--  <img src="/assets/images/logopc.png" style="width:38mm;"> -->
            <h2>ORDEN DE DEVOLUCION</h2>

        </div>
        <hr>


        <table style="width:100%;" class="table table-striped">
            <thead>
                <tr>
                    <th style=" text-align:center; width:15mm;">Fecha</th>
                    <th style="text-align:center;">Id Dev</th>
                    <!-- <th>Foto</th> -->
                    <th style="text-align:left;">Proveedor</th>
                    <th style="text-align:left;">Produtos</th>
                    <th style="text-align:center;">Unid.</th>
                    <th style="text-align:center;">Cant.</th>
                    <th style="text-align:center;">Motivo</th>
                    <th style="text-align:center;">En PDF</th>


                </tr>
            </thead>
            <tbody>
                <?php

                $comilla = "'";
                //join and precioprod.fecha BETWEEN '$desde_date' and '$hasta_date' 
                //Consulta SQL
                // Separar la entrada del usuario en palabras individuales

                $busquedads = mysqli_real_escape_string($rjdhfbpqj, $buscar);

                // Dividir la cadena de búsqueda en palabras
                $palabras = explode(' ', $busquedads);

                // Crear un array para almacenar las condiciones de búsqueda para cada palabra
                $condiciones = array();

                foreach ($palabras as $palabra) {
                    // Reemplazar espacios con comodines para que coincida con cualquier palabra
                    $termino = '%' . str_replace(' ', '%', $palabra) . '%';
                    // Agregar la condición para esta palabra al array
                    $condiciones[] = "item_devolu.nombre LIKE '$termino'";
                }

                // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabras estén presentes
                $condicion_final = implode(' AND ', $condiciones);
                // Eliminar el "AND" adicional al final de las condiciones de búsqueda AND orden.col>='1'  // AND orden.col!='0' AND orden.col!='32' 


                //clente busqueda


                // Dividir la cadena de búsqueda en palabrascl
                $palabrascl = explode(' ', $busproveedor);

                // Crear un array para almacenar las condiciones de búsqueda para cada palabra
                $condicioncl = array();

                foreach ($palabrascl as $palabracl) {
                    // Reemplazar espacios con comodines para que coincida con cualquier palabra
                    $terminocl = '%' . str_replace(' ', '%', $palabracl) . '%';
                    // Agregar la condición para esta palabra al array
                    $condicioncl[] = "CONCAT(clientes.nom_empr, ' ', clientes.nom_contac) LIKE '$terminocl'";
                }

                // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabrascl estén presentes
                $condicion_fincl = implode(' AND ', $condicioncl);

                //proveedorr

                // Dividir la cadena de búsqueda en palabrascl
                $palabrasclb = explode(' ', $busproveedorb);

                // Crear un array para almacenar las condiciones de búsqueda para cada palabra
                $condicioncl = array();

                foreach ($palabrasclb as $palabraclb) {
                    // Reemplazar espacios con comodines para que coincida con cualquier palabra
                    $terminoclb = '%' . str_replace(' ', '%', $palabraclb) . '%';
                    // Agregar la condición para esta palabra al array
                    $condicionclb[] = "empresa LIKE '$terminoclb'";
                }

                // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabrascl estén presentes
                $condicion_finclb = implode(' AND ', $condicionclb);





                // Construir la consulta SQL completa

                //devoluciones

                if ($modo == "" || $modo == "undefined") {
                    $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT 
    clientes.id, clientes.nom_empr, clientes.nom_contac, 
    item_devolu.nombre, item_devolu.kilos,  item_devolu.id_producto, item_devolu.modo, item_devolu.tipounidad,item_devolu.fecha as fechacom, item_devolu.id_orden, item_devolu.presentacion,item_devolu.id_proveedor,item_devolu.motivo,item_devolu.destino,item_devolu.idordendev,item_devolu.nota,item_devolu.id as iditem,
    devoluciones.id as idcompra, devoluciones.fecha, devoluciones.id_cliente,item_devolu.verpdf,devoluciones.id_orden as estado, 
    proveedores.empresa
    FROM clientes
    INNER JOIN item_devolu ON clientes.id = item_devolu.id_cliente 
    INNER JOIN devoluciones ON item_devolu.id_orden = devoluciones.id 
    INNER JOIN proveedores ON proveedores.id = item_devolu.id_proveedor
    WHERE ($condicion_final) AND item_devolu.fecha BETWEEN '$desde_date' AND '$hasta_date'  AND item_devolu.modo='0' and ($condicion_fincl)  and ($condicion_finclb) 
    ORDER BY devoluciones.fecha ASC");
                } else {

                    if ($modo == 99) {
                        $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT 
    clientes.id, clientes.nom_empr, clientes.nom_contac, 
    item_devolu.nombre, item_devolu.kilos,  item_devolu.id_producto, item_devolu.modo, item_devolu.tipounidad,item_devolu.fecha as fechacom, item_devolu.id_orden, item_devolu.presentacion,item_devolu.id_proveedor,item_devolu.motivo,item_devolu.destino,item_devolu.verpdf,item_devolu.idordendev,item_devolu.nota,item_devolu.id as iditem,
    devoluciones.id as idcompra, devoluciones.fecha, devoluciones.id_cliente,devoluciones.id_orden as estado, 
    proveedores.empresa
    FROM clientes
    INNER JOIN item_devolu ON clientes.id = item_devolu.id_cliente 
    INNER JOIN devoluciones ON item_devolu.id_orden = devoluciones.id 
    INNER JOIN proveedores ON proveedores.id = item_devolu.id_proveedor
    WHERE  item_devolu.destino='0'
    ORDER BY devoluciones.fecha ASC");
                    } else {

                        $sqles = "item_devolu.motivo='" . $modo . "'";

                        $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT 
    clientes.id, clientes.nom_empr, clientes.nom_contac, 
    item_devolu.nombre, item_devolu.kilos,  item_devolu.id_producto, item_devolu.modo, item_devolu.tipounidad,item_devolu.fecha as fechacom, item_devolu.id_orden, item_devolu.presentacion,item_devolu.id_proveedor,item_devolu.motivo,item_devolu.destino,item_devolu.verpdf,item_devolu.idordendev,item_devolu.nota,item_devolu.id as iditem,
    devoluciones.id as idcompra, devoluciones.fecha, devoluciones.id_cliente,devoluciones.id_orden as estado, 
    proveedores.empresa
    FROM clientes
    INNER JOIN item_devolu ON clientes.id = item_devolu.id_cliente 
    INNER JOIN devoluciones ON item_devolu.id_orden = devoluciones.id 
    INNER JOIN proveedores ON proveedores.id = item_devolu.id_proveedor
     WHERE ($condicion_final) AND item_devolu.fecha BETWEEN '$desde_date' AND '$hasta_date'  AND item_devolu.modo='0' and ($condicion_fincl)  and ($condicion_finclb)  AND $sqles
    ORDER BY devoluciones.fecha ASC");
                    }
                }

                while ($rowcompra = mysqli_fetch_array($sqlcompra)) {
                    $id_producto = $rowcompra["id_producto"];
                    $idorden = $rowcompra["id_orden"];
                    $tipounidad = $rowcompra["tipounidad"];
                    $total = $rowcompra["total"];
                    $descuenun = $rowcompra["descuenun"];
                    $verpdf = $rowcompra["verpdf"];

                    if ($verpdf == 0) {
                        $pnepdf = "checked";
                    } else {
                        $pnepdf = "";
                    }

                    $presentacion = $rowcompra["presentacion"];
                    $id_ordencod = base64_encode($rowcompra["id_orden"]);
                    $id_clientecod = base64_encode($rowcompra["id_cliente"]);
                    $nombreuns = nombrunid($rjdhfbpqj, $id_producto);
                    $nombrebult = nombrbult($rjdhfbpqj, $id_producto);
                    $motivo = $rowcompra['motivo'];
                    $destinos = $rowcompra['destino'];
                    $estado = $rowcompra['estado'];
                    $idordendev = $rowcompra['idordendev'];
                    if ($rowcompra['nota'] != "") {
                        $notaver = '<br><i style="color:blue">Nota: ' . $rowcompra['nota'] . '</i>';
                    } else {
                        $notaver = "";
                    }


                    //$status = StatusOrden($rjdhfbpqj, $idorden);
                    if ($presentacion != '0') {
                        $bulto = $rowcompra["presentacion"];
                    } else {
                        $bulto = cantbult($rjdhfbpqj, $id_producto);
                    }


                    if ($tipounidad == "0") {
                        $cantidsk = $rowcompra["kilos"];
                        $unidvien = $nombreuns;
                    } else {
                        $cantidsk = $rowcompra["kilos"];
                        $unidvien = $nombrebult . " x " . $presentacion . '' . $nombreuns;
                    }
                    //destino
                    switch ($destinos) {
                        case 0:
                            $detdestino = "Esperando";
                            break;
                        case 1:
                            $detdestino = 'Vuelve Stock';
                            break;
                        case 2:
                            $detdestino = 'Limpieza';
                            break;
                        case 3:
                            $detdestino = 'Reembasado';
                            break;
                        case 4:
                            $detdestino = 'Proveedor';
                            break;
                        case 5:
                            $detdestino = 'Descarte';
                            break;
                    }


                    //motivo
                    switch ($motivo) {
                        case 0:
                            $detmotivo = "Sin motivo";
                            break;
                        case 1:
                            $detmotivo = 'Vencido';
                            break;
                        case 2:
                            $detmotivo = 'Venc. Corto';
                            break;
                        case 3:
                            $detmotivo = 'Roto';
                            break;
                        case 4:
                            $detmotivo = 'Mal estado';
                            break;
                        case 5:
                            $detmotivo = 'Equivocado';
                            break;
                        case 6:
                            $detmotivo = 'Bichos';
                            break;
                        case 7:
                            $detmotivo = 'Rechazado';
                            break;
                        default:
                            $detmotivo = "Sin motivo";
                            break;
                    }

                    $descuento = ($precioOriginal * $descuenun) / 100;
                    $preciounit = $precioOriginal - $descuento;
                    $totalventa += $rowcompra["total"];
                    echo '
                                          <tr>
                                           <td scope="row" style="text-align:center;"> 
                                          
                                           ' . date('d/m/y', strtotime($rowcompra["fecha"])) . '
                                           </td>
                                           <td style="text-align:center;">
                                             Nº ' . $rowcompra["id_orden"] . '
                                            
                                            
                                            
                                            </td>
                                         
                                             
                                            <td>' . $rowcompra["empresa"] . '
                                          </td>
                                             
                                          <td style="color: black;">' . $rowcompra["nombre"] . '
                                             
                                             
                                             </td>
                                                
                                             <td style="text-align:center;">' . $unidvien . '</td>
                                             <td style="text-align:center;">' . $cantidsk . '</td>
                                              <td style="text-align:center;">' . $detmotivo . '</td>
                                              <td style="text-align:center;">
                                              <input type="checkbox" name="verpdf' . $rowcompra["iditem"] . '"  value="1" onclick="ajax_ponerPdf(' . $comilla . '' . $rowcompra["iditem"] . '' . $comilla . ',$(' . $comilla . 'input:checkbox[name=verpdf' . $rowcompra["iditem"] . ']:checked' . $comilla . ').val())" ' . $pnepdf . ' ></td>
                                   
                                             ';

                    echo '   
                                             
                                            
                                         
                                        </tr>';
                }
                ?>

            </tbody>
        </table>




        <table style="width:100%; height: 17mm;  font-size: 14px;">
            <tr>

                <td style="width:50%">
                    <table style="width:100%;">
                        <tr>
                            <td style="width:250px">


                            </td>
                            <td style="vertical-align: top;line-height: 1.5;  text-align:right;">


                            </td>
                            <!--    <td style="vertical-align: top;line-height: 1.5;text-align:right;">
                        Total Bulto/s:&nbsp;<? //= $catbul 
                                            ?>

                    </td> -->

                    </table>
                </td>
            </tr>
        </table>

    </div>
    <div style="width: 100%; text-align:center;cursor: pointer;">
        <a href="notadevolucionp_pdf.php?desde_date=<?= $hasta_date ?>&hasta_date=<?= $desde_date ?>&buscar=<?= $buscar ?>&busproveedor=<?= $busproveedor ?>&busproveedorb=<?= $busproveedorb ?>&modo=<?= $hasmodota_date ?>" target="_blank"><button type="button" class="btn btn-success" style="cursor: pointer;">Generar Pdf</button></a>
    </div>
    <div id="muestroorden55"></div>
    <script>
        function ajax_ponerPdf(id_devol, verpdf) {
            var parametros = {
                'id_devol': id_devol,
                'verpdf': verpdf
            };
            $.ajax({
                data: parametros,
                url: 'devpdf.php',
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
</body>


</html>