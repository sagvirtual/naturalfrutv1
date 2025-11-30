<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');



if(empty($_GET['ubica'])){$ubica = '0';}else {
    $ubica = $_GET['ubica'];
}


if($ubica=='0'){$nombrelugar="ENVASADO PLANTA ALTA";}
if($ubica=='1'){$nombrelugar="DEPOSITO PLANTA ALTA";}
if($ubica=='2'){$nombrelugar="ENVASADO PLANTA BAJA";}
if($ubica=='3'){$nombrelugar="DEPOSITO PLANTA BAJA";}
if($ubica=='9'){$nombrelugar="SIN UBICACION";}
?>
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"> Ubicacion de productos</h4>

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
 <a href="../ubicaciones/index.php?ubica=9" class="btn btn-danger py-1 font-16"><i class="ri-printer-line mr-2"></i>PRODUCTOS SIN UBICACION</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      <a href="../ubicaciones/index.php?ubica=1" class="btn btn-primary py-1 font-16"><i class="ri-printer-line mr-2"></i>DEPOSITO PLANTA ALTA</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="../ubicaciones/index.php?ubica=0" class="btn btn-primary py-1 font-16"><i class="ri-printer-line mr-2"></i>ENVASADO PLANTA ALTA</a>&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="../ubicaciones/index.php?ubica=2" class="btn btn-primary py-1 font-16"><i class="ri-printer-line mr-2"></i>ENVASADO PLANTA BAJA</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              
                    <a href="../ubicaciones/index.php?ubica=3" class="btn btn-primary py-1 font-16"><i class="ri-printer-line mr-2"></i>DEPOSITO PLANTA BAJA</a>


                        <table id="datatable-buttons" class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <th><a href="../ubicaciones/ubicaciones_pdf.php?ubica=<?=$ubica?>" class="btn btn-primary py-1 font-16"><i class="ri-printer-line mr-2"></i>PDF</a></th>
                                    <th>PRODUCTOS <?=$nombrelugar?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                            
    $sqlcategoriasb = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias ORDER BY `categorias`.`position` ASC");
    while ($rowcategoriasb = mysqli_fetch_array($sqlcategoriasb)) {
        $id_categoria = $rowcategoriasb["id"];
        $nombrecate = strtoupper($rowcategoriasb["nombre"]);
    
        $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and ubicacion='$ubica' and estado='0' "); 
        if ($rowproductosv = mysqli_fetch_array($sqlproductosv)) {
    
               echo '<tr>  <td colspan="7" style="color: black;background-color: #F0F0F0;"><h4>' . $nombrecate . ' </h4>
               
             
               </td></tr>';
            
        }
        
                                                                  
                                  $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos WHERE ubicacion='$ubica' and estado='0' and categoria='$id_categoria' ORDER BY nombre ASC");
                                  
                                    while ($rowordentd = mysqli_fetch_array($sqlordenr)) {
                                        $nombrepro=$rowordentd['nombre'];
                                        $idpr=$rowordentd['id'];
                                        $estado=$rowordentd['estado'];
                                        $ubicacion=$rowordentd['ubicacion'];
                                        $pascol=$rowordentd['pascol'];
                                        $nover='0';
                                        $idcodp=base64_encode($idpr);
                                        $canverificafin = $canverificafin+1;

                                        if($ubicacion=='0'){$selred0="selected";}else{$selred0="";}
                                        if($ubicacion=='1'){$selred1="selected";}else{$selred1="";}
                                        if($ubicacion=='2'){$selred2="selected";}else{$selred2="";}
                                        if($ubicacion=='3'){$selred3="selected";}else{$selred3="";}
                                        if($ubicacion=='9'){$selred9="selected";}else{$selred9="";}

                                    echo '

                                    <tr>
                                    <td style="width: 50px; text-align:center;">' . $canverificafin . ' </td>
                                    <td class="text-center" style="width: 5px;">Id: '.$rowordentd['id'].'</td>
                                    <td>' . $nombrepro . ' &nbsp;
                                    
                                    </td>
                                    <td class="text-center">'.$rowordentd['codigo'].'</td>
                                        <td class="text-center">'.$pascol.'</td>
                                        <td>
                                                                           <select name="col'.$idpr.'" id="col'.$idpr.'" class="form-control"  style="font-weight: bold;text-align:center;"
                                                  onchange="ajax_ssseguimiento($('.$comilla.'#col'.$idpr.''.$comilla.').val(), '.$comilla.''.$idpr.''.$comilla.');" tabindex="-1">
                                                  
                                                  <option value="1" '.$selred1.'>DEPOSITO PLANTA ALTA</option>
                                                  <option value="0" '.$selred0.'>ENVASADO PLANTA ALTA</option>
                                                  <option value="2" '.$selred2.'>ENVASADO PLANTA BAJA</option>
                                                  <option value="3" '.$selred3.'>DEPOSITO PLANTA BAJA</option>
                                                  <option value="9" '.$selred9.'>Sin Ubicación..</option>
                     
                      </select>
                                        </td>

                                     <td class="text-center">
                                     <a href="/lproductos/?jfndhom=' . $idcodp . '&kkfnuhtf=' . $rowordentd["id_marcas"] . '"  class="btn btn-success-rgba" title="Editar Ubicación" tabindex="-1" target="_blank"><i class="ri-pencil-line"></i></a>
                                    
                                    </td>


                                    </tr>

                                    ';}
                                                                    

                                    }                                ?>

                            </tbody>
                        </table>
                        CONTIDAD DE PRODUCTOS: <b><?=$canverificafin?> </b>
                    </div>
                </div>
            </div>
        </div>


        </div>
        </div>

<div id="muestroorden4"></div>

        <script>
          function ajax_ssseguimiento(col,idorden) {
            var parametros = {
                "col": col,
                "idorden": idorden
            };
            $.ajax({
                data: parametros,
                url: '../lproductos/guardasubia.php',
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


        <?php include('../template/pie.php'); ?><!-- 
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> -->