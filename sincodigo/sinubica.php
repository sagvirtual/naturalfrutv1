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
            <h4 class="page-title"> Productos sin Codigo</h4>

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
                                    <th><a href="../sincodigo/sinubica_pdf.php" class="btn btn-primary py-1 font-16"><i class="ri-printer-line mr-2"></i>PDF</a></th>
                                    <th>Producto</th>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Ubicacíon<br>
                                        <h7>Se Puede Poner sin usar el colector </h7>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

function inpunom($rjdhfbpqj,$pascol){

//selected

$sqlordd = mysqli_query($rjdhfbpqj, "SELECT * FROM picking ORDER BY `picking`.`position` DESC");
                                  
while ($rowordedntd = mysqli_fetch_array($sqlordd)) {
$nombase=$rowordedntd['nombre'];

   
echo'<option value="'.$rowordedntd['nombre'].'" ';if($pascol==$nombase){ echo 'selected';}echo'>'.$rowordedntd['nombre'].'</option>';

}

}



                            
$sqlcategoriasb = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias ORDER BY `categorias`.`position` ASC");
while ($rowcategoriasb = mysqli_fetch_array($sqlcategoriasb)) {
    $id_categoria = $rowcategoriasb["id"];
    $nombrecate = strtoupper($rowcategoriasb["nombre"]);

    $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  pascol=''  and estado='0' "); 
    if ($rowproductosv = mysqli_fetch_array($sqlproductosv)) {

           echo '<tr>  <td colspan="4" style="color: black;background-color: #F0F0F0;"><h4>' . $nombrecate . ' </h4>
           
         
           </td></tr>';
        
    }
    

                            
                                                                  
                                  $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos WHERE categoria='$id_categoria' and  pascol='' and estado='0' ORDER BY nombre ASC");
                                  
                                    while ($rowordentd = mysqli_fetch_array($sqlordenr)) {
                                        $nombrepro=$rowordentd['nombre'];
                                        $estado=$rowordentd['estado'];
                                        $codigodebarra=$rowordentd['codigo'];
                                        $idpr=$rowordentd['id'];
                                        $pascol=$rowordentd['pascol'];
                                        $nover='0';

                                        $canverificafin = $canverificafin+1;
                                    echo '

                                    <tr>
                                    <td>' . $canverificafin . ' </td>
                                    <td>' . $nombrepro . ' </td>
                                    <td class="text-center">' . $codigodebarra . ' </td>
                                    <td class="text-center">
                                    
                                                                                   <select name="col'.$idpr.'" id="col'.$idpr.'" class="form-control"  style="font-weight: bold;text-align:center;"

                                                  onchange="ajax_ssseguimiento($('.$comilla.'#col'.$idpr.''.$comilla.').val(), '.$comilla.''.$idpr.''.$comilla.');" tabindex="-1">
                                                   <option value="" '.$selred1.'>SIN UBICACION</option>';

                                                  inpunom($rjdhfbpqj,$pascol);


                                                  echo'
                     
                      </select>
                                    
                                    
                                    
                                    </td>


                                    </tr>

                                    ';}
}
                                                                    

                                                                    ?>

                            </tbody>
                        </table>
                        CONTIDAD DE PRODUCTOS SIN CODIGO: <b><?=$canverificafin?> </b>
                    </div>
                </div>
            </div>
        </div>


        </div>
        </div>


        <script>
          function ajax_ssseguimiento(col,idorden) {
            var parametros = {
                "col": col,
                "idorden": idorden
            };
            $.ajax({
                data: parametros,
                url: '../lproductos/guardasubi.php',
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

<div id="muestroorden4"><div>


        <?php include('../template/pie.php'); ?><!-- 
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> -->