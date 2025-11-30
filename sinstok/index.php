<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');
include('../control_stock/funcionStockSnot.php');
include('../funciones/StatusOrden.php');
include('../funciones/funccanpallet.php');
include('../funciones/funcunidadProd.php');
include('../funciones/funcNombrePicking.php');

$buscarfe = $_POST['buscarfe'];
$buscarfeh = $_POST['buscarfeh'];

if (empty($buscarfe)) {
    $buscarfe = $fechahoy;
}

if (empty($buscarfeh)) {
    $buscarfeh = $fechahoy;
}
?>
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"> Productos sin stock</h4>

        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">





        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="table-responsive">

                        <form action="/sinstok/index.php" method="post">




                            <div class="form-row align-items-center">

                                <div class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Fecha Desde </div>
                                        </div>
                                        <input type="date" name="buscarfe" id="buscarfe" value="<?= $buscarfe ?>" class="form-control">
                                    </div>
                                </div>


                                <div class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">hasta</div>
                                        </div>
                                        <input type="date" name="buscarfeh" id="buscarfeh" value="<?= $buscarfeh ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary" style="position: relative; top:-5px;">Buscar</button>
                                </div>

                            </div>


                        </form>

                        <table id="datatable-buttons" class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <th style="text-align:center; width: 100px;">Estado</th>
                                    <th style="text-align:center; width: 100px;">Fecha</th>
                                    <th>Producto</th>
                                    <th style="text-align:center; width: 0px;">Pallet</th>
                                    <th style="text-align:center; width: 0px;">Stock</th>
                                    <th style="text-align:center;">Cantidad</th>
                                    <th style="text-align:center;">Nº Orden</th>
                                    <th style="text-align:center;">Hora</th>
                                    <th style="text-align:center;">Usuario</th>
                                    <th style="text-align:center;">Picker</th>
                                    <th style="text-align:center; width: 100px; color:Red;">No hay Stock</th>
                                    <th style="text-align:center; width: 100px; color:green;">Hay Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php



                                $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM itembajar WHERE fecha BETWEEN '$buscarfe' and '$buscarfeh' AND sinstock = '1' ORDER BY producto ASC");



                                while ($rowordentd = mysqli_fetch_array($sqlordenr)) {




                                    $sinstockd = $rowordentd['sinstock'];
                                    $id_ordden = $rowordentd['id_orden'];
                                    $numerod = $rowordentd['numero'];
                                    $idproduc = $rowordentd['id_producto'];
                                    $fechaproduc = $rowordentd['fecha'];
                                    $idproduccon = $rowordentd['id_producto'];
                                    $CantStocks = SumaStock($rjdhfbpqj, $idproduc);
                                    $idproducd = base64_encode($idproduc);
                                    $status = StatusOrden($rjdhfbpqj, $numerod);
                                    $novr = '';
                                    if ($hapdalds > 0) {
                                        $hapadts = '&nbsp;&nbsp;<w style="color:red;">' . $hapdalds . ' Pallets encontrado.</w>';
                                    } else {
                                        $hapadts = "";
                                    }
                                    $NombrePicking = NombrePicking($rjdhfbpqj, $numerod);
                                    echo '

                                    <tr>
                                     <td stDyle="text-align:center;">' . $status . '</td>
                                    <td style="text-align:center;">' . date('d/m/Y', strtotime($rowordentd['fecha'])) . '</td>
                                    <td>ID:' . $idproduc . ' - ' . $rowordentd['producto'] . '</td>
                                    <td>' . $hapadts . '</td>
                                    <td  style="text-align:center;">';

                                    if (!empty($CantStocks)) {
                                        $sqlor2 = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto and connohay='$fechahoy' and id_producto='$idproduccon'");
                                        if ($rowsen = mysqli_fetch_array($sqlor2)) {
                                            $nohayfecha = $rowsen['connohay'];
                                            $id_usdrio = $rowsen['iduscon'];
                                            $novr = '1';

                                            echo '<h6><span class="badge bg-secondary">Hay Stock</span></h6>';
                                        }

                                        $hapdalds = ubicacionprohab($rjdhfbpqj, $idproduc);


                                        echo '<t style="color:blue;">
                                                <a href="../control_stock/?jfndhom=' . $idproducd . '&kkfnuhtf=' . $idproducd . '" target="_blank">
                                                ' . $CantStocks . '&nbsp;' . funcunidProd($rjdhfbpqj, $idproduc) . '</a></t>';

                                        $sinbot = '0';
                                    } else {
                                        $sinbot = '1';
                                        $sqlor2 = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto LIKE '9.$idproduccon' and  fecha >='$fechaproduc'");
                                        if ($rowsen = mysqli_fetch_array($sqlor2)) {
                                            $nohayfecha = $rowsen['connohay'];
                                            $id_usdrio = $rowsen['iduscon'];

                                            $novr = '1';

                                            $sqddd = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where id='$id_usdrio'");
                                            if ($rowsddn = mysqli_fetch_array($sqddd)) {
                                                $nombrus = $rowsddn['nom_contac'];
                                            }

                                            echo '<t style="color:green;"> <a href="../control_stock/?jfndhom=' . $idproducd . '&kkfnuhtf=' . $idproducd . '" target="_blank" style="color:green;">Confirmado <br>' . $nombrus . '<br>' . $rowsen['horacon'] . ' hs.<br>' . date('d/m/Y', strtotime($nohayfecha)) . '</a></t>';
                                        } else {
                                            echo '<t style="color:black;"> <a href="../control_stock/?jfndhom=' . $idproducd . '&kkfnuhtf=' . $idproducd . '" target="_blank" style="color:red;">Sin Stock</a></t>';
                                        }
                                    }

                                    echo '
                                    </td>
                                    <td style="text-align:center; color:red;">' . $rowordentd['cantidad'] . ' ' . $rowordentd['unidad'] . '</td>
                                    
                                    ';

                                    $sqlordenrs = mysqli_query($rjdhfbpqj, "SELECT id,numero,usuario,horaentrega FROM ordenbajar WHERE id = '$id_ordden'");

                                    if ($roworddentd = mysqli_fetch_array($sqlordenrs)) {

                                        echo ' <td style="text-align:center;">Nº ' . $roworddentd['numero'] . ' </td> <td style="text-align:center;">' . $roworddentd['horaentrega'] . ' </td> <td style="text-align:center;">' . $roworddentd['usuario'] . '</td>';
                                    } else {
                                        $se2 = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where  id='$numerod'");
                                        if ($rowsen = mysqli_fetch_array($se2)) {

                                            $id_usdo = $rowsen['id_usuarioclav'];
                                            $sqdd = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where id='$id_usdo'");
                                            if ($rodddn = mysqli_fetch_array($sqdd)) {
                                                $nomdbrus = $rodddn['nom_contac'];
                                            }
                                        }




                                        echo ' <td style="text-align:center;">Nº ' . $numerod . ' </td>
                                            <td style="text-align:center;"><b>Dep Abajo</b> </td> 
                                            <td style="text-align:center;">' . $nomdbrus . '</td>';
                                    }


                                    echo ' <td style="text-align:center;">' . $NombrePicking . '</td>';

                                    //confirmo que no hay
                                    echo '<td style="text-align:center;">';
                                    if ($novr != '1' && $sinbot != "1") {
                                        echo ' <a ondblclick="ajax_confirmarr(' . $idproduc . ',1)" class="btn btn-danger-rgba" title="No Hay en Stock" tabindex="-1"><i class="dripicons-checkmark"></i></a>';
                                    }
                                    echo '</td>
                                    
                                    <td style="text-align:center;">';
                                    if ($novr != '1' && $sinbot != "1") {
                                        echo ' <a ondblclick="ajax_hay(' . $idproduc . ',1)" class="btn btn-success-rgba" title="Hay en Stock" tabindex="-1"><i class="dripicons-checkmark"></i></a>';
                                    }

                                    echo '
                                    
                                    <div id="confrmar"></div>
                                    </td>
                                    
                                    
                                    ';

                                    echo '</tr>

                                    ';
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>



<script>
    function ajax_confirmarr(iditem, confirmado) {
        var parametros = {
            "iditem": iditem,
            "confirmado": confirmado
        };
        $.ajax({
            data: parametros,
            url: 'confirmar.php',
            type: 'POST',
            beforeSend: function() {
                $("#confrmar").html('');
            },
            success: function(response) {
                $("#confrmar").html(response);
            }
        });
    }
</script>
<script>
    function ajax_hay(iditem, confirmado) {
        var parametros = {
            "iditem": iditem,
            "confirmado": confirmado
        };
        $.ajax({
            data: parametros,
            url: 'haystok.php',
            type: 'POST',
            beforeSend: function() {
                $("#confrmar").html('');
            },
            success: function(response) {
                $("#confrmar").html(response);
            }
        });
    }
</script>




<?php include('../template/pie.php'); ?><!-- 
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> -->