<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');

/* agregar */
$idproedit=$_GET['idproedit'];
$id_pallet=$_GET['id_pallet'];
$odoin=$_GET['odoin'];
 if(!$idproedit){
 $productods=$_GET['producto'];

 $productod=explode("@",$productods);
 $producto = preg_replace('/\s+/', ' ', $productod[0]);

 $unidsx = $productod[1];
 $ediyes='0';

 }else{
    
    $sqen = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$idproedit'");
    if ($rowod = mysqli_fetch_array($sqen)) {
             
             $nodrevpro=$rowod["nombre"];
             $kildpro=$rowod["kilo"];
            }
            $producto=$nodrevpro;
    
    $unidsx=$_GET['idproedit']; $ediyes='1';}


    $id_palletb = substr($id_pallet, 0, 12);
    $rowrdep = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito where id_pallet='$id_palletb' and fin='0'");
    if ($rowrdep = mysqli_fetch_array($rowrdep)) {
        $id_palletv=$rowrdep['id_pallet'];
        $id_destiins=$rowrdep['id_destino'];
        $blockpallet="disabled";

                 
        $sqldub = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi where codigo='$id_destiins'");
        if ($rowrubrnom = mysqli_fetch_array($sqldub)) {
            $nombreubi=$rowrubrnom['nombre'];
         
        }
     }
?>

<?php
        
     function nombrub($rjdhfbpqj,$id_destino){ 
        $sqwen = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi Where codigo='$id_destino'");
        if ($rowod = mysqli_fetch_array($sqwen)) {
                 
                 $nombreubic=$rowod["nombre"];
                  }else{$nombreubic="No se Asigno Ubicación!";}

     return $nombreubic;
            }
        ?> 

 <!DOCTYPE html>


<html lang="es">

<head>
    <title>Sistema de Informacíon de Stock </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




</head>

<body>




    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Informacíon de Stock&nbsp;&nbsp; Usuario:&nbsp;<strong> <?=$nombrenegocio?></p>
    </div>

  
    <div class="container">

        <div class="row">
        <div class="col-lg-2">
            <a onclick="window.close()">
            <img src="/assets/images/logopc.png" style="width:38mm;">
      </a>
        </div>
         
                <div class="col-lg-8" style="padding-top: 10px;">
                <input type="hidden"  class="form-control" id="numero"  name="numero" value="999">
                                <input type="hidden"  class="form-control" id="cantidad"  name="cantidad" value="999">
                                <input type="hidden"  class="form-control" id="unidad"  name="unidad" value="999">
                                <input type="hidden"  class="form-control" id="suminstr"  name="suminstr" value="999">
                                <input type="hidden"  class="form-control" id="id_deposito"  name="id_deposito" value="<?=$id_deposito?>">
                        <?php
        
                            include('inpubuscado.php');
                         

                         

                            ?>  </div>
                            <div class="col-lg-2" style="padding-top: 10px;">
                            <a href="infodeposito">  <button type="button" class="btn btn-success">
        Nueva Busqueda
                            </button> </a>
        </div> </div>
                            <br>

                            <?php
        
        $sqwen = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito Where id_producto='$unidsx' and fin='0' ORDER BY `fecha_venc` ASC");
        $canverificafin = mysqli_num_rows($sqwen);
        while ($rowod = mysqli_fetch_array($sqwen)) {
                 
                 $id_dep=$rowod["id"];
                 $id_palletd=$rowod["id_pallet"];
                 $id_destino=$rowod["id_destino"];
                 $nombreubi=nombrub($rjdhfbpqj,$id_destino);
                
                    $block=$rowod["block"];
                 $fecha_ing=$rowod["fecha_ing"];
                 $fecha_venc=$rowod["fecha_venc"];
                 
                 $sqwwen = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi Where codigo='$id_destino' and fraccionar='1'");
                 if ($rowdod = mysqli_fetch_array($sqwwen)) {
                    
                   
                    
                    $colorbla='success';$notca='<p style="color:green">Habilitado</p>';}
                 
                 
                 else{ $idcont+=1;
                 
                
                if($idcont!='1'){$block='1';}

                 if($block=='0'){
                    $colorbla='success';
                    $notca='<p style="color:green">Habilitado</p>';
                }
                 else{
                    
                    $colorbla='danger'; $notca='<p style="color:red">No tocar</p>';}
                }




                echo '
                                            <button type="button" class="btn btn-'.$colorbla.'" data-bs-toggle="collapse" data-bs-target="#pallets'.$id_dep.'" style="width: 100%;height: 70px; font-size: 20pt;">
                                
                            <strong>'.$nombreubi.'</strong><br><p style="font-size: 12pt;">Fecha vencimiento: '.date('d/m/Y', strtotime($fecha_venc)).'</p>
                           
                                                           </button>
                                                           <br> <br>
  <div id="pallets'.$id_dep.'" class="collapse">
  <div class="alert alert-light alert-dismissible text-center">
  <p><strong>Cod.'.$id_palletd.'#</strong></p>
</div>
<div class="alert alert-light alert-dismissible text-center">
  <strong>Fecha Ingreso: '.date('d/m/Y', strtotime($fecha_ing)).'</strong>
</div>';

if($fecha_venc!='3000-00-00' && $fecha_venc!='0000-00-00' && $fecha_venc!=''){
echo'
<div class="alert alert-light alert-dismissible text-center">
 <h2> <strong>Fecha vencimiento: '.date('d/m/Y', strtotime($fecha_venc)).'</strong></h2>
</div>';
}
echo '<div class="text-center">
<img src="../deposito/estado'.$block.'.png" style="width: 100px;">'.$notca.'<br>';


echo'</div>

<hr>   <br> <br>     <br> <br>     <br> <br>     <br> <br>     <br> <br>     <br> <br>
  </div>

                
                
                
                ';



                }

     
                if( $canverificafin == '0' && $productods!=""){

                    echo '
                    <div class="row">
<div class="col-2">
                            </div>
<div class="col-8">
  <button type="button" class="btn btn-dark"  style="width: 100%;height: 70px; font-size: 20pt;">  
  <strong>No se encontro el Producto</strong><br><p style="font-size: 12pt;">Puede ser por motivo de no ser subido a la base de datos o sin stock</p>
                                               
                                                                              </button>
                </div>
                <div class="col-2">
                </div>
                </div>
                            </div>
                    
                  
                                                                               <br> <br>';
                                        
                                    }
                    
        ?>  
                                    


  <br>
 
  
            </div>
        </div>
    
    </div> 

  <br><br><br><br><br><br><br><br><br><br><br>
<div class="row">
<div class="col-4">
                            </div>
<div class="col-4">
   <a href="/index.php">
                    <button type="button" id="suminstr2" class="btn btn-danger" style="width: 100%;">Salir</button>
                </a>

                </div>
                <div class="col-4">
                </div>
                </div>
                            </div>




   
            
            



            
        </div>
   


</body>

</html>