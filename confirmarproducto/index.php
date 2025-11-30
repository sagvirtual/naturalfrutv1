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
            <h4 class="page-title"> Confirmar Productos para la lista de Precios</h4>
<!-- <h1 style="color:red;"> NO!! USAR ESTOY CORRIGIENDO </h1> -->
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

               

                        <table id="datatable-buttons" class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <th style="width: 0px;"></th>
                                    <th>Productos</th>
                                    <th style="text-align:center; width: 100px;">Costo Actual</th>
                                    <th style="text-align:center; width: 100px;">Costo Nuevo</th>
                                    <th style="text-align:center; width: 100px; color:green;">Confirmar</th>
                                    <th style="text-align:center; width: 100px; color:red;">No Confirmar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    

                                        $sqlsoprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod WHERE  cerrado = '1' and confirmado='0' and nref='Compra' ORDER BY fecha DESC, id DESC;");
                                      
                                        while ($rowprdoprod = mysqli_fetch_array($sqlsoprod)) {
                                            
                                        $idddspro=$rowprdoprod['id'];
                                        $idpe=${"idpe".$idddspro};
                                        $costo_totalold=${"costo_totalold".$idddspro};
                                        $cosno=${"cosno".$idddspro};
                                        $fondoresa=${"fondoresa".$idddspro};
                                        //$costo_totalxbvi=${"costo_totalxbvi".$idddspro};
                                        $idpe=$rowprdoprod['id_producto'];
                                       
                                        $fecha=date('d/m/Y', strtotime($rowprdoprod['fecha']));
                                            $idfila=$idfila+1;
                                        /* me fijo valor anterior */
                                        $sqlsopd = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod WHERE id_producto='$idpe' and cerrado = '1' and confirmado='1' ORDER BY fecha DESC, id DESC;");
                                        if ($rowpdprod = mysqli_fetch_array($sqlsopd)) {
                                            $fechaold=date('d/m/Y', strtotime($rowpdprod['fecha']));
                                            $costo_totaloldxs=$rowpdprod['costo_total'];
                                            $costo_totalold=number_format($rowpdprod['costo_total'], 0, ',', '');}else{$cosno='9';}




                                                                  
                                            $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos WHERE id='$idpe' ORDER BY nombre ASC");
                                            
                                                if ($rowordentd = mysqli_fetch_array($sqlordenr)) {
                                                    $nombrepro=$rowordentd['nombre'];
                                                    $estado=$rowordentd['estado'];
                                                    $comovienecan=$rowordentd['kilo'];
                                                    $modo_producto=$rowordentd['modo_producto'];
                                                    $unidadnom=$rowordentd['unidadnom'];
                                                    $nover='0';

                                                } else{$nombrepro="No tacar";} 
                                                
                                                $canverificafin=$canverificafin+1;
                                                $costo_totalxb=$rowprdoprod['costo_total']* $comovienecan;
                                                if($cosno!='9'){
                                                $costo_totalxbvi=$costo_totaloldxs* $comovienecan;
                                                }else{$costo_totalxbvi=0;}
                                                $costo_total=$rowprdoprod['costo_total'];


                                            if($costo_total == $costo_totalold){

                                                $sqlordend = "Update precioprod Set confirmado='3' Where id = '$idddspro'";
                                                mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
                                            }


                                            if($costo_totalold > $costo_total){$fondoresaold="background-color: yellow;";$fondoresanew="";}
                                            else{$fondoresaold=""; $fondoresanew="background-color: yellow;";}
                                                 
                                    echo '

                                    <tr  id="fila-'.$idfila.'">
                                    <td style="text-align:center;">' . $canverificafin . ' </td>
                                    <td>';
                                    include('historialpro.php');
                                
                                    
                                    echo '</td>
                                    <td style="text-align:center; width: 100px; '.$fondoresaold.'"> 
                                     <i style="font-size: 8pt;">'.$fechaold.'</i> <br>
                                     <b style="color:green">
                                  
                                    $'.number_format($costo_totalold, 2, ',', '.').'</b><br>
                                     '.$modo_producto.' x '.$comovienecan.' '.$unidadnom.'<br>
                                    <b style="color:red">$'.number_format($costo_totalxbvi, 2, ',', '.').'</b></td>
                                    <td style="text-align:center; width: 100px; '.$fondoresanew.'">  <i style="font-size: 8pt;">
                                    '.$fecha.'
                                    </i> <br><b style="color:red">
                                    
                                    $'.number_format($costo_total, 2, ',', '.').'</b><br>
                                    '.$modo_producto.' x '.$comovienecan.' '.$unidadnom.'<br><b style="color:red">$'.number_format($costo_totalxb, 2, ',', '.').'</b>
                                    </td>
                                    <td style="text-align:center;">
                                    
                                    <a onclick="ajax_confirmarr('.$idddspro.',1); confirmAndHideRow(this,'.$idfila.')" class="btn btn-success-rgba" title="Confirmar" tabindex="-1"><i class="dripicons-checkmark"></i></a>
                                    
                                    
                                    </td>
                                          <td style="text-align:center;">
                                    
                                    <a onclick="ajax_confirmarr('.$idddspro.',3); confirmAndHideRow(this,'.$idfila.')" class="btn btn-danger-rgba" title="No Confirmar" tabindex="-1"><i class="dripicons-cross"></i></a>
                                    
                                    
                                    </td>



                                    </tr>

                                    ';
                                   
                                }
                                                                    

                                                                    ?>

                            </tbody>
                        </table>
                        CONTIDAD DE PRODUCTOS PARA CONFIRMAR: <b><? 
                        
                     
                        echo ''.$canverificafin.'';?> </b>
                    </div>
                </div>
            </div>
        </div>


        </div>
        </div>
<div id="confrmar">
                            </div>


        <script>
                function ajax_confirmarr(iditem,confirmado){
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
                 });}
             
             </script>
                  
                  <script>
function confirmAndHideRow(element, id) {
    // Llama a la función AJAX para confirmar
    ajax_confirmarr(id, 1);

    // Encuentra el elemento <tr> más cercano y lo oculta
    let row = element.closest('tr');
    if (row) {
        row.style.display = 'none';
    }
}
</script>           

        <?php 
        
       include('../template/pie.php'); 
        ?>