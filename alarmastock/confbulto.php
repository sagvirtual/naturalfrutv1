<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');
$comilla = "'";
?>
<script>
    $('#datatable-buttons').DataTable({
        "order": [
            [1, "desc"]
        ],
        responsive: true
    });
</script>
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"> Productos Configurar Venta Bulto</h4>

        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">





        <div class="col-lg-10">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="table-responsive">




                        <table class="table table-striped table-bordered ">



                            <?php
                            //aca pruebo el otro

                            $sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias Where estado = '0' ORDER BY `categorias`.`position` ASC ");
                            while ($rowcategorias = mysqli_fetch_array($sqlcategorias)) {
                                $id_categoria = $rowcategorias["id"];
                                $nombrecate = strtoupper($rowcategorias["nombre"]);
                                $sqlproductosr = ${"sqlproductos" . $id_categoria};
                                $rowproductos = ${"rowproductos" . $id_categoria};
                                $rowproductosr = ${"rowproductosr" . $id_categoria};
                                $idproduff = ${"idproduff" . $id_categoria};
                                $sqlitem_orden = ${"sqlitem_orden" . $id_categoria};
                                $sqlitem_ordendis = ${"sqlitem_ordendis" . $id_categoria};


                                //fin



                                //pongo los item <tr>     

                                $cantidad = 0;
                                $sqlproductosrg = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' ORDER BY nombre ASC");
                                while ($rowproductosrg = mysqli_fetch_array($sqlproductosrg)) {
                                    $idproduc = $rowproductosrg['id'];
                                    //pruebo poner el producto
                                    $CantStocksbu = $CantStocks / $rowproductosrg["kilo"];
                                    $CantStocksbu = number_format($CantStocksbu, 0, '.', '');
                                    $unidadnom = $rowproductosrg['unidadnom'];
                                    $bulto = $rowproductosrg["file"];
                                    if ($bulto == "1") {
                                        $esbulcha = "checked";
                                    } else {
                                        $esbulcha = "";
                                    }


                                    $cantidad = $cantidad + 1;

                                    if ($cantidad <= 1) {


                                        echo '


                                            <tr>
                                            <td  style=" font-size: 20pt;text-align:left;background-color: #d5d5d5ff;color: #ffffff;"  colspan="2">
                                            <h5><b>' . $nombrecate . '  </b></h5>
                                            </td>
                                            <td style=" font-size: 10pt;text-align:left;background-color: #a9a7a7ff;color: #000000ff;"    class="text-center">Presentación</td>
                                            <td style="font-size: 10pt;text-align:left;background-color: #a9a7a7ff;color: #000000ff;"  class="text-center">Solo Bulto</td>
                                            </tr>
                                            
                                            
                                            ';
                                    }







                                    echo '
            <tr>
                        
            <td style="width: 20mm;text-align:center;">ID:' . $idproduc . '</td>
            <td style="text-align:left;">
                        ' . $rowproductosrg["nombre"] . ' 
                         (' . $rowproductosrg["modo_producto"] . ')
                        </td>
                                                    
                        <td style="width: 29mm;text-align:center;color:' . $colorve . ';">' . $rowproductosrg["kilo"] . ' ' . $rowproductosrg["unidadnom"] . '</td>
                        
                        <td style="width: 29mm;text-align:center;">
                   
                        <div class="custom-control custom-switch col-6"
                                style="text-align: center; position:relative; left:20px;">


                                <input type="checkbox" class="custom-control-input" id="bulto' . $idproduc . '"
                                    name="bulto' . $idproduc . '" value="1" onchange="showInput()"
                                    onclick="ajax_actuqlizabulto($(' . $comilla . 'input:checkbox[name=bulto' . $idproduc . ']:checked' . $comilla . ').val(),' . $comilla . '' . $idproduc . '' . $comilla . ');" ' . $esbulcha . '>

                                <label class="custom-control-label" for="bulto' . $idproduc . '"></label>
                            </div>
                        </td>

                       
                        </tr>
                     ';
                                }
                            }





                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<div id="muestroorden55"></div>
<script>
    function ajax_actuqlizabulto(bulto, id_producto) {
        var parametros = {
            'bulto': bulto,
            'id_producto': id_producto
        };
        $.ajax({
            data: parametros,
            url: 'actualizabulto.php',
            type: 'POST',
            beforeSend: function() {
                $('#muestroorden55').html('');
            },
            success: function(response) {
                $('#muestroorden55').html(response);
                console.error(response);
            },
            error: function(xhr, status, error) {
                console.error("Error en AJAX:", error);
            }
        });
    }
</script>


<?php include('../template/pie.php'); ?>