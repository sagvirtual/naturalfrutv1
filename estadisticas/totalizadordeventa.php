<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 include('../funciones/StatusOrden.php');
 $hasta_date = $_POST['hasta_date'];
$desde_date = $_POST['desde_date'];
 $buscar = $_POST['buscar'];
unset($_SESSION['id_orden']);
?>
<script>

 $('#default-datatable').DataTable( {
        "order": [[ 0, "desc" ]],
        responsive: false
    } );  

</script>
  <link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default-datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 100px;"  >Estado</th>
                                    <th class="text-center" style="width: 100px;"  >Fecha</th>
                                    <!-- <th>Foto</th> -->
                                    <th class="text-center"  style="width: 150px;" >Nº Orden</th>
                                    <th class="text-center">Clientes</th>
                                   <?php
                                    
                                    if($tipo_usuario =='0'){
                                    
                                   ?>
                                    <th class="text-center">Total Ventas</th>
                                    <?php
                                     
                                    }
                                     
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //join and precioprod.fecha BETWEEN '$desde_date' and '$hasta_date' 
                                //Consulta SQL
                      // Separar la entrada del usuario en palabras individuales
$palabras = explode(' ', $buscar);

// Inicializar la parte de la consulta para la búsqueda de palabras
$condiciones_busqueda = "";

// Construir dinámicamente las condiciones de búsqueda para cada palabra
foreach ($palabras as $palabra) {
    $condiciones_busqueda .= "(clientes.nom_contac LIKE '%$palabra%' OR orden.id LIKE '%$palabra%' OR clientes.nom_empr LIKE '%$palabra%' ) AND ";
}

// Eliminar el "AND" adicional al final de las condiciones de búsqueda
$condiciones_busqueda = rtrim($condiciones_busqueda, " AND ");

// Construir la consulta SQL completa
$sqlcompra = mysqli_query($rjdhfbpqj, "SELECT 
    clientes.nom_contac, clientes.nom_empr, 
    orden.id, orden.total, orden.fecha, orden.col,orden.id_cliente
    FROM clientes
    INNER JOIN orden ON orden.id_cliente = clientes.id 
    WHERE ($condiciones_busqueda) AND orden.fecha BETWEEN '$desde_date' AND '$hasta_date'  
    ORDER BY `orden`.`fecha` ASC");

    /* 
    WHERE ($condiciones_busqueda) AND orden.fecha BETWEEN '$desde_date' AND '$hasta_date'  AND orden.col>='2' 
    ORDER BY `orden`.`fecha` ASC");
    */
    $canverificafin = mysqli_num_rows($sqlcompra);
                                while ($rowcompra = mysqli_fetch_array($sqlcompra)) {


                                    //$idprovdr=$rowcompra["id"];
                                    $idprodsdr=$rowcompra["id"];

                                     $sqlcamionetas=${"sqlcamionetas".$idprodsdr};
                                    $rowcamionetas=${"rowcamionetas".$idprodsdr};
                                    $cuatie=${"cuatie".$idprodsdr};
                                    $totalcom=${"totalcom".$idprodsdr};
                                    $status=StatusOrden($rjdhfbpqj,$idprodsdr);
                                     $cuatie+=$rowcompra['total'];
                                    $totalcom=number_format($cuatie, 2, '.', ','); 

                                   
                                    $cuatiesss+=$cuatie; 
                                    


                                        echo '
                                          <tr>
                                           <td style="text-align:center;">'.$status.'</td>
                                           <td scope="row" class="text-center">
                                           <i style="display:none;">'.date('Y/m/d', strtotime($rowcompra["fecha"])).'</i> 
                                           <span class="badge badge-primary-inverse" style="text-align:left;">
                                           
                                           '.date('d/m/Y', strtotime($rowcompra["fecha"])).'</span></td>
                                              <td class="text-center">
                                              Nº '.$rowcompra["id"].'
                                              </td>
                                            <td><b>'.$rowcompra["nom_contac"].'</b> - '.$rowcompra["nom_empr"].'  </td>';
                                             
                                           
                                            if($tipo_usuario =='0'){
                                            echo '
                                             <td class="text-center"><h4 style="position:relative; top:4px;"><span class="badge badge-primary-inverse">$'.$totalcom.'</span></h4>
                                           </td>';}
                                       echo ' </tr>';
                                         }
                                ?>

                            </tbody>
                        </table>
<?      
                                    if($tipo_usuario =='0'){
                                   echo' <br><div style="position:relative;  float:right; text-align:right; padding-right:100px;">
                                   <p>desde '.date('d/m/Y', strtotime($desde_date)).' al '.date('d/m/Y', strtotime($hasta_date)).'</p>

                                    <span class="badge badge-primary-inverse">
                                   <h4 style="position:relative;">Cantidad de Ventas:  '.$canverificafin.'
                                   </h4></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                   <span class="badge badge-primary-inverse">
                                   <h4 style="position:relative;">Total: $ '.number_format($cuatiesss, 2, ',', '.').'
                                   </h4></span>
                                   </div>';
                                    }
                                    ?>
                                    
                    </div>   
                </div>
            </div>
        </div>
   <script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
  <script src="../assets/js/custom/custom-table-datatable.js"></script>
        <!-- End col -->