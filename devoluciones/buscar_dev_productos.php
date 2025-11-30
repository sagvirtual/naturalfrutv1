<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../nota_de_pedido/func_nombreunid.php');
//include('../funciones/StatusOrden.php');
//include('../control_stock/funcionStockS.php');
$hasta_date = $_POST['hasta_date'];
$desde_date = $_POST['desde_date'];
$buscar = $_POST['buscar'];
$busproveedor = $_POST['busproveedor'];
$busproveedorb = $_POST['busproveedorb'];
$modo = $_POST['modo'];
$comilla = "'";

if ($tipo_usuario != '33') {
    $blonota = "disabled";
} else {
    $blonota = "";
}

?>


<script>
    $('#default-datatable').DataTable({
        "order": [
            [1, "desc"]
        ],
        responsive: true
    });
</script>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">

                <div class="card-body" style="position:relative; top:-40px;">
                    <div class="table-responsive">

                        <f class="form-inline">

                            <button type="button" class="btn btn-danger" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),$('#busproveedorb').val(),1)" style="position:relative; top:40px;"> Vencido</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-success" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),$('#busproveedorb').val(),2)" style="position:relative; top:40px;"> Venc. Corto</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),$('#busproveedorb').val(),3)" style="position:relative; top:40px;"> Roto</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),$('#busproveedorb').val(),4)" style="position:relative; top:40px;"> Mal estado</button> &nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-success" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),$('#busproveedorb').val(),5)" style="position:relative; top:40px;"> Equivocado</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),$('#busproveedorb').val(),6)" style="position:relative; top:40px;"> Bichos</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-success" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),$('#busproveedorb').val(),7)" style="position:relative; top:40px;"> Rechazado</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),$('#busproveedorb').val(),0)" style="position:relative; top:40px;"> Sin Motivo</button>


                        </f>
                        <table id="default-datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Id Dev</th>
                                    <th class="text-center">Id Orden</th>
                                    <!-- <th>Foto</th> -->
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Produtos</th>
                                    <th class="text-center">Unid.</th>
                                    <th class="text-center">Cant.</th>
                                    <th class="text-center">Motivo</th>
                                    <th class="text-center">Resolucíon</th>
                                    <th class="text-center">Descuento</th>
                                    <th class="text-center">Realizado</th>
                                    <th class="text-center">Proveedor</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
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

                                if ($modo == "") {
                                    $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT 
    clientes.id, clientes.nom_empr, clientes.nom_contac, 
    item_devolu.nombre, item_devolu.kilos,  item_devolu.id_producto, item_devolu.modo, item_devolu.tipounidad,item_devolu.fecha as fechacom, item_devolu.id_orden, item_devolu.presentacion,item_devolu.id_proveedor,item_devolu.motivo,item_devolu.destino,item_devolu.idordendev,item_devolu.fechaold,item_devolu.nota,item_devolu.id as iditem,item_devolu.descuento as desnento,
    devoluciones.id as idcompra, devoluciones.fecha, devoluciones.id_cliente,item_devolu.rproveedor,devoluciones.realizado,devoluciones.id_orden as estado, 
    proveedores.empresa
    FROM clientes
    INNER JOIN item_devolu ON clientes.id = item_devolu.id_cliente 
    INNER JOIN devoluciones ON item_devolu.id_orden = devoluciones.id 
    INNER JOIN proveedores ON proveedores.id = item_devolu.id_proveedor
    WHERE ($condicion_final) AND item_devolu.fecha BETWEEN '$desde_date' AND '$hasta_date'  AND item_devolu.modo='0' and ($condicion_fincl)  and ($condicion_finclb) 
    ORDER BY devoluciones.fecha ASC");
                                } else {

                                    if ($modo == 99 || $modo == 4 || $modo == 5) {
                                        if ($modo == 99) {
                                            $dest = 0;
                                        } else {
                                            $dest = 4;

                                            if ($modo == 4) {

                                                $sqlbuspro = " AND item_devolu.rproveedor='0'";
                                            } else {

                                                $sqlbuspro = "AND item_devolu.rproveedor!='0'";
                                            }
                                        }
                                        $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT 
                                        clientes.id, clientes.nom_empr, clientes.nom_contac, 
                                        item_devolu.nombre, item_devolu.kilos,  item_devolu.id_producto, item_devolu.modo, item_devolu.tipounidad,item_devolu.fecha as fechacom, item_devolu.id_orden, item_devolu.presentacion,item_devolu.id_proveedor,item_devolu.motivo,item_devolu.destino,item_devolu.idordendev,item_devolu.fechaold,item_devolu.nota,item_devolu.id as iditem,item_devolu.descuento as desnento,
                                        devoluciones.id as idcompra, devoluciones.fecha, devoluciones.id_cliente,item_devolu.rproveedor,devoluciones.realizado,devoluciones.id_orden as estado, 
                                        proveedores.empresa
                                        FROM clientes
                                        INNER JOIN item_devolu ON clientes.id = item_devolu.id_cliente 
                                        INNER JOIN devoluciones ON item_devolu.id_orden = devoluciones.id 
                                        INNER JOIN proveedores ON proveedores.id = item_devolu.id_proveedor
                                        WHERE  item_devolu.destino='$dest' $sqlbuspro
                                        ORDER BY devoluciones.fecha ASC");
                                    } else {
                                        if ($modo == 88) {


                                            $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT 
                                        clientes.id, clientes.nom_empr, clientes.nom_contac, 
                                        item_devolu.nombre, item_devolu.kilos,  item_devolu.id_producto, item_devolu.modo, item_devolu.tipounidad,item_devolu.fecha as fechacom, item_devolu.id_orden, item_devolu.presentacion,item_devolu.id_proveedor,item_devolu.motivo,item_devolu.destino,item_devolu.idordendev,item_devolu.nota,item_devolu.fechaold,item_devolu.id as iditem,item_devolu.descuento as desnento,
                                        devoluciones.id as idcompra, devoluciones.fecha, devoluciones.id_cliente,devoluciones.realizado,item_devolu.rproveedor,devoluciones.id_orden as estado, 
                                        proveedores.empresa
                                        FROM clientes
                                        INNER JOIN item_devolu ON clientes.id = item_devolu.id_cliente 
                                        INNER JOIN devoluciones ON item_devolu.id_orden = devoluciones.id 
                                        INNER JOIN proveedores ON proveedores.id = item_devolu.id_proveedor
                                        WHERE ($condicion_final) AND item_devolu.fecha BETWEEN '01-01-2000' AND '$hasta_date'  AND item_devolu.modo='0' and ($condicion_fincl)  and ($condicion_finclb)  AND item_devolu.descuento='0' AND item_devolu.id_cliente!='762'
                                        ORDER BY devoluciones.fecha ASC");
                                        } else {
                                            $sqles = "item_devolu.motivo='" . $modo . "'";

                                            $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT 
                                        clientes.id, clientes.nom_empr, clientes.nom_contac, 
                                        item_devolu.nombre, item_devolu.kilos,  item_devolu.id_producto, item_devolu.modo, item_devolu.tipounidad,item_devolu.fecha as fechacom, item_devolu.id_orden, item_devolu.presentacion,item_devolu.id_proveedor,item_devolu.motivo,item_devolu.destino,item_devolu.idordendev,item_devolu.nota,item_devolu.fechaold,item_devolu.id as iditem,item_devolu.descuento as desnento,
                                        devoluciones.id as idcompra, devoluciones.fecha, devoluciones.id_cliente,devoluciones.realizado,item_devolu.rproveedor,devoluciones.id_orden as estado, 
                                        proveedores.empresa
                                        FROM clientes
                                        INNER JOIN item_devolu ON clientes.id = item_devolu.id_cliente 
                                        INNER JOIN devoluciones ON item_devolu.id_orden = devoluciones.id 
                                        INNER JOIN proveedores ON proveedores.id = item_devolu.id_proveedor
                                        WHERE ($condicion_final) AND item_devolu.fecha BETWEEN '$desde_date' AND '$hasta_date'  AND item_devolu.modo='0' and ($condicion_fincl)  and ($condicion_finclb)  AND $sqles
                                        ORDER BY devoluciones.fecha ASC");
                                        }
                                    }
                                }

                                while ($rowcompra = mysqli_fetch_array($sqlcompra)) {
                                    $id_producto = $rowcompra["id_producto"];
                                    $realizado = $rowcompra["realizado"];
                                    $rproveedor = $rowcompra["rproveedor"];
                                    $idorden = $rowcompra["id_orden"];
                                    $tipounidad = $rowcompra["tipounidad"];
                                    $fechaold = $rowcompra["fechaold"];
                                    if ($fechaold == "0000-00-00") {
                                        $vencimient = "";
                                    } else {
                                        $vencimient = "- Vec. " . date('d/m/y', strtotime($fechaold));
                                    }
                                    if ($realizado == "1") {
                                        $terminad = '<b style="color:green">OK</b>';
                                    } else {
                                        $terminad = "";
                                    }
                                    $total = $rowcompra["total"];
                                    $descuenun = $rowcompra["descuenun"];
                                    $presentacion = $rowcompra["presentacion"];
                                    $id_ordencod = base64_encode($rowcompra["id_orden"]);
                                    $id_clientecod = base64_encode($rowcompra["id_cliente"]);
                                    $nombreuns = nombrunid($rjdhfbpqj, $id_producto);
                                    $nombrebult = nombrbult($rjdhfbpqj, $id_producto);
                                    $motivo = $rowcompra['motivo'];
                                    $destinos = $rowcompra['destino'];
                                    $descunc = $rowcompra['desnento'];
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
                                    if ($rowcompra["idordendev"] != '0') {
                                        $idordendevd = '<a href="../nota_de_pedido/nota_de_pedido_pdf?jdhsknc=' . base64_encode($idordendev) . '" target="_blank">Nº' . $idordendev . '</a>';
                                    } else {
                                        $idordendevd = "";
                                    }

                                    if ($tipounidad == "0") {
                                        $cantidsk = $rowcompra["kilos"];
                                        $unidvien = $nombreuns;
                                    } else {
                                        $cantidsk = $rowcompra["kilos"];
                                        $unidvien = $nombrebult . " x " . $presentacion . '' . $nombreuns;
                                    }

                                    //destino
                                    if ($destinos == '0') {
                                        $selec0 = "selected";
                                        $selec0e = "Esperando";
                                    } else {
                                        $selec0 = "";
                                    }
                                    if ($destinos == '1') {
                                        $selec1 = "selected";
                                        $selec0e = "Vuelve Stock";
                                    } else {
                                        $selec1 = "";
                                    }
                                    if ($destinos == '2') {
                                        $selec2 = "selected";
                                        $selec0e = "Limpieza";
                                    } else {
                                        $selec2 = "";
                                    }
                                    if ($destinos == '3') {
                                        $selec3 = "selected";
                                        $selec0e = "Reembasado";
                                    } else {
                                        $selec3 = "";
                                    }
                                    if ($destinos == '4') {
                                        $selec4 = "selected";
                                        $selec0e = "Proveedor";
                                    } else {
                                        $selec4 = "";
                                    }
                                    if ($destinos == '5') {
                                        $selec5 = "selected";
                                        $selec0e = "Descarte";
                                    } else {
                                        $selec5 = "";
                                    }
                                    if ($destinos == '6') {
                                        $selec6 = "selected";
                                        $selec0e = "Oferta";
                                    } else {
                                        $selec6 = "";
                                    }

                                    //descuento
                                    if ($descunc == '0') {
                                        $selec0d = "selected";
                                        $selec0rd = "Esperando";
                                    } else {
                                        $selec0d = "";
                                    }
                                    if ($descunc == '1') {
                                        $selec1d = "selected";
                                        $selec0rd = "NOTA PEDIDO";
                                    } else {
                                        $selec1d = "";
                                    }
                                    if ($descunc == '2') {
                                        $selec2d = "selected";
                                        $selec0rd = "NOTA CREDITO";
                                    } else {
                                        $selec2d = "";
                                    }
                                    if ($descunc == '3') {
                                        $selec3d = "selected";
                                        $selec0rd = "No Descontado";
                                    } else {
                                        $selec3d = "";
                                    }

                                    //proveedor
                                    if ($rproveedor == '0') {
                                        $selec0p = "selected";
                                        $selec0rp = "Esperando";
                                    } else {
                                        $selec0p = "";
                                    }
                                    if ($rproveedor == '1') {
                                        $selec1p = "selected";
                                        $selec0rp = "Enviado";
                                    } else {
                                        $selec1p = "";
                                    }

                                    if ($rproveedor == '2') {
                                        $selec2p = "selected";
                                        $selec0rp = "Recibido";
                                    } else {
                                        $selec2p = "";
                                    }

                                    if ($rproveedor == '3') {
                                        $selec3p = "selected";
                                        $selec0rp = "Descontado";
                                    } else {
                                        $selec3p = "";
                                    }
                                    //motivo
                                    switch ($motivo) {
                                        case 0:
                                            $detmotivo = "Sin motivo";
                                            break;
                                        case 1:
                                            $detmotivo = '<b style="color:red">Vencido</b>';
                                            break;
                                        case 2:
                                            $detmotivo = '<b style="color:green">Venc. Corto</b>';
                                            break;
                                        case 3:
                                            $detmotivo = '<b style="color:orange">Roto</b>';
                                            break;
                                        case 4:
                                            $detmotivo = '<b style="color:red">Mal estado</b>';
                                            break;
                                        case 5:
                                            $detmotivo = '<b style="color:green">Equivocado</b>';
                                            break;
                                        case 6:
                                            $detmotivo = '<b style="color:blue">Bichos</b>';
                                            break;
                                        case 7:
                                            $detmotivo = '<b style="color:green">Rechazado</b>';
                                            break;
                                        default:
                                            $detmotivo = "<b>Sin motivo</b>";
                                            break;
                                    }

                                    $descuento = ($precioOriginal * $descuenun) / 100;
                                    $preciounit = $precioOriginal - $descuento;
                                    $totalventa += $rowcompra["total"];
                                    echo '
                                          <tr>
                                           <td scope="row" class="text-center"> 
                                            <p style="display:none;"> ' . date('Y/m/d', strtotime($rowcompra["fecha"])) . '</p>
                                           ' . date('d/m/y', strtotime($rowcompra["fecha"])) . '
                                           </td>
                                           <td class="text-center">
                                            
                                             <a href="../devoluciones/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '&admdmin=1" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="' . $titleno . '">    Nº ' . $rowcompra["id_orden"] . '</a>
                                            
                                            
                                            
                                            </td>
                                               <td class="text-center">
                                          ' . $idordendevd . ' </td>
                                            
                                             
                                             </td>
                                             
                                            <td>
                                          ' . $rowcompra["nom_empr"] . ' ' . $rowcompra["nom_contac"] . '</td>
                                             <td style="color: black;">' . $rowcompra["nombre"] . ' ' . $vencimient . '
                                             <br><i style="color:grey">' . $rowcompra["empresa"] . '</i>' . $notaver . '
                                             
                                             </td>
                                                
                                             <td class="text-center">' . $unidvien . '</td>
                                             <td class="text-center">' . $cantidsk . '</td>
                                             <td class="text-center">' . $detmotivo . '</td>
                                                                             <td style="padding-left: 2mm;' . $fondotd . '"><i style="display:none">' . $selec0e . '</i>
                      <select  id="destino' . $rowcompra["iditem"] . '"  name="destino' . $rowcompra["iditem"] . '" class="form-control text-center" tabindex="-1" onchange="ajax_destino($(' . $comilla . '#destino' . $rowcompra["iditem"] . '' . $comilla . ').val(), ' . $comilla . '' . $rowcompra["iditem"] . '' . $comilla . ',$(' . $comilla . '#descuento' . $rowcompra["iditem"] . '' . $comilla . ').val());"  style="font-weight: bold; ">
                       
                              <option value="0" ' . $selec0 . '>Esperando...</option>
                                                <option value="1" ' . $selec1 . '>Vuelve Stock</option>
                                                <option value="2" ' . $selec2 . '>Limpieza</option>
                                                <option value="3" ' . $selec3 . '>Reembasado</option>
                                                <option value="4" ' . $selec4 . '>Proveedor</option>
                                                <option value="5" ' . $selec5 . '>Descarte</option>
                                                <option value="6" ' . $selec6 . '>Oferta</option>
                     </select>
                 </td>
                
                                                                                     <td style="padding-left: 2mm;' . $fondotd . '">';

                                    if ($rowcompra["id"] != '762') {
                                        echo ' <i style="display:none">' . $selec0rd . '</i>
                      <select  id="descuento' . $rowcompra["iditem"] . '"  name="descuento' . $rowcompra["iditem"] . '" class="form-control text-center" tabindex="-1" onchange="ajax_destino($(' . $comilla . '#destino' . $rowcompra["iditem"] . '' . $comilla . ').val(), ' . $comilla . '' . $rowcompra["iditem"] . '' . $comilla . ',$(' . $comilla . '#descuento' . $rowcompra["iditem"] . '' . $comilla . ').val());"  style="font-weight: bold; " ' . $blonota . '>
                       
                              <option value="0" ' . $selec0d . '>Esperando...</option>
                              <option value="2" ' . $selec2d . ' >NOTA CREDITO</option>
                                                <option value="1" ' . $selec1d . '>NOTA PEDIDO</option>
                                                <option value="3" ' . $selec3d . '>No Descontado</option>
                     </select>';
                                    }
                                    echo '</td>                                                                         
            
                 <td>' . $terminad . '</td>
                 <td style="padding-left: 2mm;' . $fondotd . '">
                 
                 ';

                                    if ($destinos == '4') {
                                        echo '
                 <i style="display:none">' . $selec0rp . '</i>
                      <select  id="rproveedor' . $rowcompra["iditem"] . '"  name="rproveedor' . $rowcompra["iditem"] . '" class="form-control text-center" tabindex="-1" onchange="ajax_rproveedor($(' . $comilla . '#rproveedor' . $rowcompra["iditem"] . '' . $comilla . ').val(), ' . $comilla . '' . $rowcompra["iditem"] . '' . $comilla . ');"  style="font-weight: bold; ">
                       
                              <option value="0" ' . $selec0p . '>Esperando...</option>
                              <option value="1" ' . $selec1p . ' >Enviado</option>
                                                <option value="2" ' . $selec2p . '>RECIBIDO</option>
                                                <option value="3" ' . $selec3p . '>DESCONTADO</option>
                     </select>          ';
                                    }
                                    echo '
                 </td>
                        
                                             ';


                                    echo '   
                                             
                                            
                                         
                                        </tr>';
                                }
                                ?>

                            </tbody>
                        </table>

                        <?php
                        /* 
                        $cantidsktbul = $cantidskt / $bulto;




                        
                        if ($tipo_usuario == "0") {

                            echo ' <br><div style="position:relative;  float:right; text-align:right">
                                   <p>desde ' . date('d/m/Y', strtotime($desde_date)) . ' al ' . date('d/m/Y', strtotime($hasta_date)) . '</p>';
                            echo ' <span class="badge badge-primary-inverse">
                                   <h4 style="position:relative;">Total $:' . number_format($totalventa, 2, ',', '.') . '  </h4></span>';
                        }

                        echo '
                                   <span class="badge badge-primary-inverse"><h4 style="position:relative;">Cantidad: ' . $cantidskt . '  &nbsp;📦 ' . number_format($cantidsktbul, 2, '.', ',') . '</span></h4>
                                   </div>'; */

                        mysqli_close($rjdhfbpqj);
                        ?>
                    </div>
                </div>
            </div>

        </div>

        <div id="muestroorden4"></div>
        <script>
            function ajax_destino(destino, id_orden, descuento) {


                var parametros = {
                    "estadoh": destino,
                    "idorden": id_orden,
                    "descuento": descuento,
                };
                $.ajax({
                    data: parametros,
                    url: '../devoluciones/resolucion.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestroorden4").html('');
                    },
                    success: function(response) {
                        $("#muestroorden4").html(response);
                    }
                });
            }
        </script>

        <script>
            function ajax_rproveedor(destino, id_orden) {


                var parametros = {
                    "estadoh": destino,
                    "idorden": id_orden
                };
                $.ajax({
                    data: parametros,
                    url: '../devoluciones/rproveedor.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestroorden4").html('');
                    },
                    success: function(response) {
                        $("#muestroorden4").html(response);
                    }
                });
            }
        </script>
        <script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
        <script src="../assets/js/custom/custom-table-datatable.js"></script>
        <!-- End col -->