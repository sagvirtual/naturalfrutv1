<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');

$buscarfe = $_POST['buscarfe'];
$buscarfeh = $_POST['buscarfeh'];

if (empty($buscarfe)) {
    $buscarfe = $fechahoy;
}

if (empty($buscarfeh)) {
    $buscarfeh = $fechahoy;
}
$_SESSION['jfnddhom']="sinprecio";
?>
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"> Productos sin Precios</h4>

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

               

                        <table id="datatable-buttons" class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <th style="width: 0px;"></th> 
                                    <th>Producto</th>
                                    <th style="text-align:center; width: 100px;">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    
                                  /*   $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT DISTINCT id_producto
                                    FROM precioprod 
                                    WHERE cerrado = '1' and id_producto!='0'
                                    ORDER BY fecha DESC, id DESC;");
                                     */

                                 
                                    $sqlprecioprod = mysqli_query($rjdhfbpqj,"SELECT * FROM productos WHERE  estado='0' ORDER BY nombre ASC");

                                    while ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
                                    
                                        $idpe=$rowprecioprod['id'];
                                        $nombrepro=$rowprecioprod['nombre'];
                                            $estado=$rowprecioprod['estado'];
                                        $idcodp = base64_encode($idpe);

                                        $sqlsoprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod WHERE id_producto = '$idpe'  and cerrado = '1' and confirmado = '1' ORDER BY fecha DESC, id DESC;");
                                      
                                        if ($rowprdoprod = mysqli_fetch_array($sqlsoprod)) {
                                     
                                        $idddspro=$rowprdoprod['id'];
                                        $costo_total=$rowprdoprod['costo_total'];
                                        $mpa=$rowprdoprod['mpa'];
                                                                  
                                      /*    $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos WHERE id='$idpe' and estado='0' ORDER BY nombre ASC");
                                    
                                        if ($rowordentd = mysqli_fetch_array($sqlordenr)) {
                                            $nombrepro=$rowordentd['nombre'];
                                            $estado=$rowordentd['estado'];
                                            $nover='0';

                                        }else{$nover='1';} */
                                    } else{$costo_total=0;}
                                            // if(){}
                                               if($costo_total >= $mpa || $costo_total =='0'){
                                                    $canverificafin = $canverificafin+1;
                                                echo '

                                                <tr>
                                                <td style="text-align:center;">' . $canverificafin . ' </td>
                                                <td>' . $nombrepro . ' </td>
                                                <td style="text-align:center;">
                                                
                                                <a href="../productos?buscar=' . $idpe . '&jfnddhom=sinprecio" target="_parent" class="btn btn-success-rgba" title="Editar Productos" tabindex="-1"><i class="ri-pencil-line"></i></a>
                                                
                                                
                                                </td>


                                                </tr>

                                                ';
                                            }
                                                                   
                                            
                                            }

                                                                    ?>

                            </tbody>
                        </table>
                        CONTIDAD DE PRODUCTOS SIN PRECIOS: <b><?=$canverificafin?> </b>
                    </div>
                </div>
            </div>
        </div>


        </div>
        </div>






        <?php include('../template/pie.php'); ?><!-- 
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> -->