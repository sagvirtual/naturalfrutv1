<?php include('../f54du60ig65.php');
include('../nota_de_pedido/func_nombreunid.php');
$buscar = $_POST['buscar'];
$pagina = $_POST['col'];
$todos = $_POST['col'];

$desde_date = $_POST['desde_date'];
$hasta_date = $_POST['hasta_date'];

$comilla = "'";



function itemdevolu($rjdhfbpqj, $idorden)
{
    $catbul = 0;

    $sqlorden = mysqli_query($rjdhfbpqj, "SELECT e.id_producto, e.id_categoria, e.modo,  e.id_orden,  e.destino, e.fechaold,  e.hora,  e.nombre,  e.kilos,  e.tipounidad, u.id, u.nombre as nomcatego
            FROM item_devolu e 
            INNER JOIN categorias u 
            ON e.id_categoria = u.id
            Where e.id_orden = '$idorden' and e.modo='0' ORDER BY `nomcatego` ASC");

    $cant = 0;

    //$sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idorden' and modo='0' ORDER BY `u.nombre` ASC");
    while ($roworden = mysqli_fetch_array($sqlorden)) {
        $tipounidad = $roworden['tipounidad'];
        $id_producto = $roworden['id_producto'];
        $destinos = $roworden['destino'];
        $catbul += $roworden['kilos'];

        $nombreunid = nombrunid($rjdhfbpqj, $id_producto);
        $nombrebult = nombrbult($rjdhfbpqj, $id_producto);
        $cantidadbiene = cantbult($rjdhfbpqj, $id_producto);

        if ($tipounidad == '0') {
            $seled0 =  $nombreunid;
            $comoviene = "";
        } else {
            $seled0 = $nombrebult;
            $comoviene = "- " . $nombrebult . "&nbsp;x&nbsp;" . $cantidadbiene . "&nbsp;" . $nombreunid;
        }
        $cant = $cant + 1;
        if ($cant % 2 == 0) {
            $colorfondo = "white";
        } else {
            $colorfondo = "#E2E2E2";
        }
        switch ($destinos) {
            case 0:
                $detdestino = '<i style="color:red;"> Esperando</i>';
                break;
            case 1:
                $detdestino =  '<b style="color:green;">Vuelve Stock</i>';
                break;
            case 2:
                $detdestino = '<b style="color:green;">Limpieza</i>';
                break;
            case 3:
                $detdestino = '<b style="color:green;">Reembasado</i>';
                break;
            case 4:
                $detdestino = '<b style="color:green;">Proveedor</i>';
                break;
            case 5:
                $detdestino = '<b style="color:green;">Descarte</i>';
                break;
        }



        echo '
    <table style="vertical-align: top; width:100%; font-size: 12px; border-collapse: collapse; ">
<tr style="vertical-align: top;line-height: 1.5; background-color: ' . $colorfondo . '; padding-top: 10px;">
<td style="text-align:left; padding-top: 5px; padding-bottom: 5px;">' . $roworden['nombre'] . '' . $comoviene . ' </td>
<td style="width:50px;text-align:center;padding-top: 5px; padding-bottom: 5px;width:50px;">' . $roworden['kilos'] . '</td>
<td style="width:50px;text-align:center;padding-top: 5px; padding-bottom: 5px;width:50px;">' . $seled0 . '</td>
<td style="text-align:left; padding-top: 5px; padding-bottom: 5px; width:90px;text-align:center">' .  $detdestino . ' </td>
</tr>
</table>

';
    }
}


function funcMOtivo($motivos)
{

    switch ($motivos) {
        case 1:
            $textoMotivo = "Vencido";
            break;
        case 2:
            $textoMotivo = "Venc. Corto";
            break;
        case 3:
            $textoMotivo = "Roto";
            break;
        case 4:
            $textoMotivo = "Mal estado";
            break;
        case 5:
            $textoMotivo = "Equivocado";
            break;
        case 6:
            $textoMotivo = "Bichos";
            break;
        case 7:
            $textoMotivo = "Rechazado";
            break;
        default:
            $textoMotivo = "";
            break;
    }

    return $textoMotivo;
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
<style>
    .pagination-container {
        max-width: 20cm;
        margin: 0 auto;
    }

    /* Estilos de la paginación */
    .pagination {
        background-color: white;
        list-style-type: none;
        display: flex;
        flex-wrap: wrap;
        /* Esto permite que los elementos se muestren en varias líneas si es necesario */
        justify-content: center;
        padding: 0;
        cursor: pointer;
    }

    .pagination li {
        background-color: white;
        margin-right: 5px;
        margin-bottom: 20px;
        /* Añadimos un margen inferior para separar los elementos verticalmente */
        width: auto;
        /* Cambiamos el ancho a automático para que se adapten al contenido */
        white-space: nowrap;
        /* Evita que el texto se divida en varias líneas */
    }

    .pagination li a {
        color: #333;
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .pagination li.active a {
        background-color: #007bff;
        color: #fff;
        border: 1px solid #007bff;
    }
</style>
<link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-10">
            <div class="card m-b-30">

                <div class="card-body" style="position:relative; top:-40px;">
                    <div class="table-responsive">
                        <table id="default-datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>


                                    <th style="width: 80px;" class="text-center">Fecha</th>
                                    <th style="width: 80px;" class="text-center">Nº&nbsp;Dev</th>
                                    <th>Cliente</th>
                                    <th style="width: 80px;" class="text-center">Nº Orden</th>
                                    <th style="width: 180px;" class="text-center">Estado</th>
                                    <th style="width: 80px;" class="text-center">Pdf</th>
                                    <th style="width: 180px;" class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php



                                if (is_numeric($buscar)) {
                                    $qlovus = "e.id = '$buscar'";
                                } else {
                                    $qlovus = "u.nom_contac LIKE '%$buscar%' and e.fecha BETWEEN '$desde_date' and '$hasta_date'";
                                }






                                $sqlcategoriasba = mysqli_query($rjdhfbpqj, "SELECT e.id,e.id_orden, e.fecha, e.id_cliente, e.realizado, u.nom_contac, u.nom_empr, u.id as nuncliente
                                FROM devoluciones e 
                                INNER JOIN clientes u 
                                ON e.id_cliente = u.id
                                Where $qlovus");

                                if (!$sqlcategoriasba) {
                                    die('Error en la consulta: ' . mysqli_error($rjdhfbpqj));
                                }
                                while ($rowuorden = mysqli_fetch_array($sqlcategoriasba)) {

                                    $id_orden = $rowuorden["id"];
                                    $realizado = $rowuorden["realizado"];
                                    $estadoh = $rowuorden["id_orden"];

                                    if ($estadoh != 0 && $estadoh != 1) {
                                        $estadohid = "Nº " . $rowuorden["id_orden"];
                                    } else {
                                        $estadohid = "";
                                    }

                                    $id_cliente = $rowuorden["id_cliente"];

                                    $saldo = $rowuorden["saldo"];
                                    $id_ordencod = base64_encode($rowuorden["id"]);
                                    $id_clientecod = base64_encode($rowuorden["id_cliente"]);

                                    $colestado = $rowuorden['finalizada'];

                                    if ($colestado == '0') {
                                        $estadocol = '<span class="badge" style="background-color:grey; color:white;text-aling:center;">Ingresando</span>';
                                    } else {
                                        $estadocol = '<span class="badge" >Ingresado</span>';
                                    }

                                    $nomproveedores = $rowuorden['nom_contac'] . " " . $rowuorden['nom_empr'];

                                    if ($realizado == '0') {
                                        $selec0 = "selected";
                                    } else {
                                        $selec0 = "";
                                    }
                                    if ($realizado == '1') {
                                        $selec1 = "selected";
                                    } else {
                                        $selec1 = "";
                                    }
                                    /*    if ($realizado == '2') {
                                        $selec2 = "selected";
                                    } else {
                                        $selec2 = "";
                                    } */


                                    $sqlpagdeufp = ${"sqlpagdeufp" . $id_cliente};
                                    $rowpagdeufp = ${"rowpagdeufp" . $id_cliente};
                                    $Idordenultima = ${"Idordenultima" . $id_cliente};
                                    /* me fijo la ultima orden para anular el edide las anteriores */
                                    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM devoluciones Where id_cliente = '$id_cliente' and finalizada='1' ORDER BY `devoluciones`.`id` DESC");
                                    if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
                                        $Idordenultima = $rowpagdeufp['id'];
                                    }

                                    echo '
                                          <tr>
                                          <td style="color: black;" class="text-center">' . date('d/m/Y', strtotime($rowuorden["fecha"])) . '</td>
                                          <td class="text-center" style="color: black;">';


                                    if ($Idordenultima == $Idordenultima) {
                                        echo '<a href="../devoluciones/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '&ref=1">';
                                    } else {
                                        echo '<a href="../devoluciones/reportedevoluciones?jdhsknc=' . $id_ordencod . '"  target="_blank" tabindex="-1" title="PDF Orden de devolución">';
                                    }

                                    echo ' <button type="button" class="btn btn-secondary" style="background-color: #EAE9E9;color: black; font-weight: bold;">Nº&nbsp;' . str_pad($id_orden, 8, '0', STR_PAD_LEFT) . '</button>    </a></td>   
                                         
                                              <td data-toggle="collapse" href="#collapseExample' . $id_orden . '" role="button" aria-expanded="false" aria-controls="collapseExample">
                                              <b>' . $nomproveedores . '</b>';


                                    //item
                                    echo '
               
                     
                               
                             
                                <div class="collapse show" id="collapseExample' . $id_orden . '">';

                                    itemdevolu($rjdhfbpqj, $id_orden);
                                    echo ' </div>


';






                                    echo ' </td>            
                                           <td class="text-center">
                                              ' . $estadohid . '
                                             
                                           </td>    
                                                  <td style="padding-left: 2mm;' . $fondotd . '">
                      <select  id="detmotivo' . $rowuorden['id'] . '" class="form-control text-center" tabindex="-1" onchange="ajax_quien($(' . $comilla . '#detmotivo' . $rowuorden['id'] . '' . $comilla . ').val(), ' . $comilla . '' . $id_orden . '' . $comilla . ');"  style="font-weight: bold; ">
                          <option value="0" ' . $selec0 . '>Esperando</option>
                         <option value="1" ' . $selec1 . '>REALIZADO</option>
                     </select>
                 </td>
                   
                                              <td class="text-center"><a href="/devoluciones/reportedevoluciones?jdhsknc=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="PDF Orden de devolución"><i class="dripicons-print"></i></a></td>
                                              
                                            <td class="text-center">
                                                <div class="button-list">';
                                    if ($Idordenultima == $Idordenultima) {
                                        echo '
                                              
                                                    <a href="../devoluciones/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '&ref=1" class="btn btn-success-rgba" title="Editar"><i class="ri-pencil-line"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    
                                                    
                                                      <a href="javascript:void(0);" ondblclick="eliminar(' . "'/devoluciones/mlkdths?" . 'jnnfsc=' . $id_ordencod . '' . "'" . ')" class="btn btn-danger-rgba">
                                                        
                                                        <i class="ri-delete-bin-3-line"></i></a>
                                                    
                                                    ';
                                    }

                                    echo ' </div>
                                            </td>
                                        </tr>';
                                }
                                ?>

                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
            <div id="muestroorden4"></div>
            <script>
                function ajax_quien(detmotivo, id_orden) {


                    var parametros = {
                        "estadoh": detmotivo,
                        "idorden": id_orden
                    };
                    $.ajax({
                        data: parametros,
                        url: '../devoluciones/seenvioquin.php',
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
            <!-- End col -->
            <script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
            <script src="../assets/js/custom/custom-table-datatable.js"></script>