<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');

$id_pallet=$_GET['id_pallet'];

   $id_palletb = substr($id_pallet, 0, 12);
    $rowrdep = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito where id_pallet='$id_palletb' and fin='0'");
    if ($rowrdep = mysqli_fetch_array($rowrdep)) {
        $id_palletv=$rowrdep['id_pallet'];
        $id_destiins=$rowrdep['id_destino'];
        $idproedit=$rowrdep['id_producto'];
        $fecha_ing=$rowrdep['fecha_ing'];
        $fecha_venc=$rowrdep['fecha_venc'];
        if($fecha_ing==""){$fecha_ing=$fechahoy;}
        if($fecha_ing==$fecha_venc || "3000-00-00"==$fecha_venc){$fecha_venc="0000-00-00";}
       

                 
        $sqldub = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi where codigo='$id_destiins'");
        if ($rowrubrnom = mysqli_fetch_array($sqldub)) {$nombreubi=$rowrubrnom['nombre'];}

     }   
    $sqen = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$idproedit'");
    if ($rowod = mysqli_fetch_array($sqen)) {
             
             $nodrevpro=$rowod["nombre"];
             $kildpro=$rowod["kilo"];
            }
            $producto=$nodrevpro;
    
    $unidsx=$idproedit;


    
    $sqwden = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito Where id_producto='$unidsx' and fin='0' ORDER BY `fecha_ing` ASC");
    if ($rodwod = mysqli_fetch_array($sqwden)) {
             $id_palletdfeh=$rodwod["id_pallet"];
             $idcont+=1;
            

             if($id_palletdfeh==$id_palletb){$colorbla='success';$block='<img src="../deposito/estado0.png" style="width: 100px;"><p style="color:green">Habilitado</p';}else{$colorbla='danger';$block='<img src="../deposito/estado1.png" style="width: 100px;"><p style="color:red">No tocar</p>';}
           
    }
?>

 <!DOCTYPE html>


<html lang="es">

<head>
    <title>Sistema de Gestión Deposito </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>

<body>




    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Gestión Deposito&nbsp;&nbsp; Usuario:&nbsp;<strong> <?=$nombrenegocio?></p>
    </div>

  
    <div class="container">

        <div class="row">
         
                <div class="col-lg-12" style="padding-top: 10px;">
                <input type="hidden"  class="form-control" id="numero"  name="numero" value="999">
                                <input type="hidden"  class="form-control" id="cantidad"  name="cantidad" value="999">
                                <input type="hidden"  class="form-control" id="unidad"  name="unidad" value="999">
                                <input type="hidden"  class="form-control" id="suminstr"  name="suminstr" value="999">
                                <input type="hidden"  class="form-control" id="id_deposito"  name="id_deposito" value="<?=$id_destiins?>">
                     
                               
                        <?php
        
                            
                            $sqwen = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$unidsx'");
                            if ($rowod = mysqli_fetch_array($sqwen)) {
                                     
                                     $nombrevpro=$rowod["nombre"];
                                    }

                         

                            ?> 
                            
                            <input type="text"  class="form-control" id="producto" name="producto" value="<?=$nombrevpro?>" disabled>
                            
                            
                         <br>
                            <div class="input-group">
                                <span class="input-group-text" style="width: 120px;">Pallets Cod.</span>
                                <input type="number" min="13"  max="13" class="form-control" id="id_pallet"  name="id_pallet" value="" 
                                oninput="ajax_pallets($('#id_pallet').val());" autocomplete="off" onclick="select()">
                   
                            </div>
    <?php
                             
                             if($id_palletdfeh!=''){
 
                                 echo '<br>
                                 <div class="alert alert-'.$colorbla.'">
                                 Producto: <strong>'.$nombrevpro.'</strong><br> Cod. '.$id_pallet.'
                                 </div>
                                 
                                 ';
 
                             }
                              
                             ?>

                               <br>          
                            <div class="input-group">
                            <span class="input-group-text" style="width: 120px;">Ubicación</span>
                            <div  class="form-control">
                                
                            <b><?=$nombreubi?></b>
                            </div>
                           
                            </div>

                            
                            <script>
                                document.getElementById('id_pallet').focus();
                            </script>   

                            <br>

                            <div class="input-group">
                                <span class="input-group-text" style="width: 120px;">Fecha Ingreso</span>
                                <input type="date"  class="form-control"  value="<?= $fecha_ing ?>"  disabled>
                                </div>   <br>
                                <div class="input-group">
                                <span class="input-group-text" style="width: 120px;">Fecha Venc.</span>
                                <input type="date" id="fecha_venc" name="fecha_venc" class="form-control"  value="<?= $fecha_venc ?>" disabled>
                                </div>   <br>
                                <div style="width: 100%; text-align:center;">


                                <?=$block?> 
                                
                            </div>
                            <br> 
                              
                        
                            </div>
                           
                           

                          
                        <hr>     
            </div>
        </div>
   
    </div>  <div class="container" style="max-width: 360px;">
        <div class="row"> <div class="col-12" style="padding-top: 10px;">
                <a href="../deposito/index.php?idproedit=<?=$unidsx?>">
                    <button type="button" id="suminstr2" class="btn btn-success" style="width: 100%;">Atras</button>
                </a>
            </div><br><br>  <br><br>

            
           
        </div>
    </div>
                             <br><br>
                             <br><br>
                             <br><br>
    <div class="mt-5 p-4 text-center">
    <a href="../lusuarios/logincerrar.php"><button type="button" class="btn btn-secondary btn-xs btnGoToTop" >Cerrar usuario</button></a><br><br>
</div>

</body>
<script>
        function ajax_pallets(id_pallet) {

            var parametros = id_pallet;
            location.href='../deposito/verinfo?id_pallet='+parametros;



        }




</script>
</html>