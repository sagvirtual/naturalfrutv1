<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');
include('../control_stock/funcionStockSnot.php');
include('../funciones/StatusOrden.php');
include('../funciones/funccanpallet.php');

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
            <h4 class="page-title"> Productos pedidos por clientes faltantes</h4>

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

                                        <form action="/profaltantes/index.php" method="post">




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
                                    <th style="text-align:center; width: 100px;">Fecha</th>
                                    <th style="text-align:center; width: 100px;">Estado</th>
                                    <th style="text-align:center; width: 100px;">Ingreso</th>
                                    <th style="text-align:center;width: 0px;">Nº&nbsp;Orden</th>
                                    <th style="text-align:center;width: 0px;">Cliente</th>
                                    <th style="width: 0px;">ID&nbsp;Pro.</th>
                                    <th>Producto</th>
                                    <th class="text-center">Cantidad Pedida</th>
                                    <th class="text-center">Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php



                                    $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT faltantes.id_orden, faltantes.id_producto, faltantes.id_cliente, faltantes.tipounidad, faltantes.cantidad, 
                                    orden.id, orden.fecha, orden.col,  orden.id_cliente ,  orden.responsable 

                                    FROM faltantes INNER JOIN orden 
                                    ON faltantes.id_orden = orden.id 

                                    WHERE orden.fecha BETWEEN '$buscarfe' and '$buscarfeh'  ORDER BY orden.fecha ASC");
                                    // }



                                while ($rowordentd = mysqli_fetch_array($sqlordenr)) {
                                    $idproduc = $rowordentd['id_producto'];
                                    $sqlpdro=mysqli_query($rjdhfbpqj,"SELECT id,nombre,modo_producto,unidadnom FROM productos Where id='$idproduc' ");
                                    if ($rownoombdsr = mysqli_fetch_array($sqlpdro)){
                                        $nombrprods=$rownoombdsr['nombre'];
                                        $modo_productofal=$rownoombdsr['modo_producto'];
                                        $unidadnomfal=$rownoombdsr['unidadnom'];

                                        
                                    }
                                    $id_ordden = $rowordentd['id_orden'];
                                    $responsable = $rowordentd['responsable'];
                                    $idproduccon = $rowordentd['id_producto'];
                                    $nohayfecha = $rowordentd['fecha'];
                                    $id_cliente = $rowordentd['id_cliente'];
                                    $tipounidad = $rowordentd['tipounidad'];
                                    $cantidad = $rowordentd['cantidad'];
                                    $id_ordencod = base64_encode($id_ordden);
                                    $id_clientecod = base64_encode($id_cliente);
                                    $idproducd = base64_encode($idproduccon);
                                    $status=StatusOrden($rjdhfbpqj,$id_ordden);
                                    $CantStocks=SumaStock($rjdhfbpqj,$idproduc);
                                    if($CantStocks == 0){
                                        $CantStocks='<p style="color:red;">Sin Stock</p>';
                                    }else{
                                        $CantStocks='<p style="color:green;">Ingreso!<br>'.$CantStocks.' '.$unidadnomfal.'</p>';

                                    }
                                    
                                    $sqllogdins = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios WHERE  id= '$responsable'");
                                    if ($rowudden = mysqli_fetch_array($sqllogdins)) {$mbeusuario=$rowudden['nom_contac'];}
                                  
                                    
                                    if( $tipounidad =='0'){
                                                $veruni= $unidadnomfal;

                                        }else{$veruni= $modo_productofal;}

                                    $sqlpro=mysqli_query($rjdhfbpqj,"SELECT id,nom_contac FROM clientes Where id='$id_cliente' ");
                                    if ($rownoombr = mysqli_fetch_array($sqlpro)){
                                        $nom_contac=$rownoombr['nom_contac'];
                                    }
                            
                                      echo'
                                           <tr>
                                           <td scope="row" class="text-center">'.date('d/m/y', strtotime($nohayfecha)).'</td>
                                           <td scope="row" class="text-center">'.$status.'</td>
                                           <td scope="row" class="text-center">'.$mbeusuario.'</td>
       <td scope="row" class="text-center">
       
        <a href="../nota_de_pedido/?jhduskdsa='.$id_clientecod.'&orjndty='.$id_ordencod.'" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="'.$titleno.'">  '.$id_ordden.'</a>
       
       
      </td>
       <td scope="row" class="text-center">'.$nom_contac.'</td>
       <td scope="row" class="text-center">'.$idproduc.'</td>
       <td scope="row" class="text-left">'.$nombrprods.'</td>
       <td scope="row" class="text-center">'.$cantidad.' '.$veruni.'</td>
       <td scope="row" class="text-center"> ';

       
           if($tipo_usuario=="0"){
       echo'<a href="../control_stock/?jfndhom='.$idproducd.'&kkfnuhtf='.$idproducd.'" target="_blank">';
                                    
       } 
       echo''.$CantStocks.'&nbsp;' . $rowordentd['unidad'] . '';
         
                                    
       if($tipo_usuario=="0"){   echo' </a>';}
                                    
                                  echo'  </td>
    </tr>';
                                      
                                      
                                      
                                     
                                
                                }
                                                                    

                                                                    ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        </div>





        <?php include('../template/pie.php'); ?><!-- 
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> -->