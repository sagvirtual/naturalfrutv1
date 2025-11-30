<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../funciones/funcUbicProdHab.php');
$comillas="'";
if ($tipo_usuario == "0" || $tipo_usuario=="57" || $tipo_usuario=="33" || $tipo_usuario=="1"|| $tipo_usuario=="3" || $tipo_usuario=="30") {
    include ('../template/cabezal.php');


    $idcod = $_GET['jfndhom'];
    $idproduc = base64_decode($idcod);


    $sqlprd = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idproduc'");
    if ($rowpr = mysqli_fetch_array($sqlprd)) {
        $productosN = $rowpr["nombre"];
        $unidadnom = $rowpr["unidadnom"];
        $kilo = $rowpr["kilo"];
        $bulto=$rowpr['modo_producto'];

    /*     if($unidadnom=="Kg."){$bulto="Kg.";$comovie="Kilo";$kiloca=$rowpr['kilo']; }
            if($unidadnom=="Uni."){$kiloca=$rowpr['kilo']; $bulto=$rowpr['modo_producto']; $comovie=''.$bulto.' x '.$kilo.' '.$unidadnom.'';} */

            $kiloca=$rowpr['kilo']; $bulto=$rowpr['modo_producto']; $comovie=''.$bulto.' x '.$kilo.' '.$unidadnom.'';

        $sqlstok = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto = '$idproduc'");
        if ($rowstok = mysqli_fetch_array($sqlstok)) {
            $idstok = $rowstok["id"];
            $CantStock = $rowstok["CantStock"] / $kiloca;
           
            $fechastock = $rowstok["fecha"];
            $id_usuariosto = $rowstok["id_usuario"];
            $horastok = $rowstok["hora"];
            $fecven = $rowstok["fecven"];
        } else {
            $CantStock = '0';


        }
    } else {
        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("top.location.href='../control_de_stock'");
        echo ("</script>");
    }
    $Ubprod=ubicacionprohab($rjdhfbpqj,$idproduc);
    ?>


    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title"><i class="mdi mdi-chart-areaspline"></i> Editar Stock</h4>

            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="/control_de_stock"> <button class="btn btn-primary"><i class="mdi mdi-chart-areaspline"></i>
                            Volver a Control de Stock</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-8">
                <div class="card m-b-30">
                    <div class="card-body">

                        <div class="form-row">



                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Producto Id: <?=$idproduc?></label>
                                <input type="text" class="form-control" value="<?= $productosN ?>" disabled>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Presentación:</label>
                                <input type="text" class="form-control" value="<?= $comovie ?>" disabled>
                            </div>


                            <?php

                            $sqlsw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto = '$idproduc' and CantStock > 0 ORDER BY `stockhgz1`.`fecven` ASC");
                            while ($rowsdk = mysqli_fetch_array($sqlsw)) {

                                $fechaven = $rowsdk['fecven'];
                                $CantStockc = $rowsdk['CantStock'] / $kiloca;                                
                                
                                $decimaldsd = explode("E", $CantStockc);

                                // Ahora, limitar a dos decimales
                                $CantStockc = number_format((float)$decimaldsd[0], 2);


                                $CantStocktotal+= $rowsdk['CantStock'] / $kiloca;

                            
                                
                                $decimaldsdd = explode("E", $CantStocktotal);

                                // Ahora, limitar a dos decimales
                                $CantStocktotal = number_format((float)$decimaldsdd[0], 2);


                                $CantStocktotalu+= $rowsdk['CantStock'];
                                echo ' 
                            <div class="form-row col-md-12">
                                  <div class="form-group col-md-4 text-center">
                                <label for="inputEmail4">Cant. Unid.</label>
                                <input type="text" class="form-control text-center"
                                    value="' . $rowsdk['CantStock'] . '" disabled>
                                </div>
                                <div class="form-group col-md-4 text-center">
                                <label for="inputEmail4">Cant. Bult.</label>
                                <input type="text" class="form-control text-center"
                                    value="' . $CantStockc . '" disabled>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Fecha Vencimiento</label>
                                    <input type="date" class="form-control" value="' . $fechaven . '" disabled>
                                </div>

                                  <div class="form-group col-md-1">
                                    <label for="inputPassword4"></label>
                                      <button type="button" class="btn btn-danger" 
                                ondblclick="ajax_emiminarstok('.$comillas.''.$rowsdk['id'].''.$comillas.')" style="position:relative; top:30px;">X</button>
                                </div>
                            </div>
                            ';

                            }

                            ?>




                            <div class="col-sm-12">


                            </div>

                        </div>



                        <hr>


                        <div id="muestrostok"> </div>
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Cantidad Unidades</label>
                                    <input type="text" class="form-control" id="CantNuv" value="0" onclick="select()"
                                        require>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Fecha Vencimiento</label>
                                    <input type="date" class="form-control" id="fecven">
                                </div>
                            </div>
                            <button id="btnagregarstock" class="btn btn-primary " type="button"
                                ondblclick="ajax_stock($('#CantNuv').val(),$('#fecven').val(),'0')">Agregar Stock
                                +</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button id="btnquitarstock" class="btn btn-success" type="button"
                                ondblclick="ajax_stock($('#CantNuv').val(),$('#fecven').val(),'1')">Quitar Stock
                                -</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger" value="Cancelar"
                                onclick="location.href='/control_de_stock';">Cancelar</button>

                            <br> <br>
                            <p><small style="color:grey;">Funciona con Doble Click.</small></p>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 ">
                        <div class="card m-b-30 text-center">
                            <div class="card-body">   <h5 class="card-title mb-0">Stock Total Bulto</h5>                               
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-12">
                                        <div class="border-primary border rounded text-center py-3 mb-3">
                                            <h5 class="card-title text-primary mb-1" style=" font-size: 30pt;"><?=$CantStocktotal?></h5>
                                            <p class="text-primary mb-0"><?= $comovie ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card m-b-30">
                            <div class="card-body text-center">   <h5 class="card-title mb-0">Stock Total Unidades</h5>                               
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-12">
                                        <div class="border-primary border rounded text-center py-3 mb-3">
                                            <h5 class="card-title text-primary mb-1" style=" font-size: 30pt;"><?=$CantStocktotalu?></h5>
                                            <p class="text-primary mb-0">Unidades</p>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-12">
                                        <p class="font-15">Ubicacíon</p>
                                   
                                    <div class="alert alert-primary" role="alert">
                                    <h1><b><?=$Ubprod?></b> </h1>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    
        </div>
       
        <!-- End col -->





        <script>function ajax_stock(CantNuv, fecven, modo) {

                /* var CantNuvs = CantNuv * <?//=$kiloca?>; */

                var parametros = {
                    "CantNuv": CantNuv,
                    "fecven": fecven,
                    "modo": modo,
                    "idproduc": '<?= $idproduc ?>',
                    "idstok": '<?= $idstok ?>'
                };
                $.ajax({
                    data: parametros,
                    url: 'acualizarStock.php',
                    type: 'POST',
                    beforeSend: function () {
                        $("#muestrostok").html('<img src="../assets/images/loader.gif">');
                    },
                    success: function (response) {
                        $("#muestrostok").html(response);
                    }
                });
            }</script>


<script>function ajax_emiminarstok(idstok) {

var parametros = {
  "idstok": idstok,
  "idproduc": '<?= $idproduc ?>'
};
$.ajax({
    data: parametros,
    url: 'eliminarStock.php',
    type: 'POST',
    beforeSend: function () {
        $("#muestrostok").html('<img src="../assets/images/loader.gif">');
    },
    success: function (response) {
        $("#muestrostok").html(response);
    }
});

}
</script>



        <?php include ('../template/pie.php'); ?><?php

           } else {
               echo ("<script language='JavaScript' type='text/javascript'>");
               echo ("top.location.href='../control_de_stock'");
               echo ("</script>");
           }

           ?>