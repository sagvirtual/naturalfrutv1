<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/funcunidadProd.php');
include('../funciones/func_stockanterior.php');
$idproedit=$_GET['idproedit'];
$productods=$_GET['producto'];
$fechacja=$_POST['fechacja'];
if(empty($fechacja)){
    
    $fechacja=$fechahoy;


}
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
   
   
      

$fechacjaver=date('d/m/Y', strtotime($fechacja));

function nombreclien($rjdhfbpqj,$idcliente){
$sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$idcliente'");
if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

    $nobrecliente="(".$rowclientes["nom_contac"].")";}

    return $nobrecliente;
}


function nombreproveedorn($rjdhfbpqj,$idproveedo){
    $sqloprov = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id='$idproveedo'");
    if ($rowprov = mysqli_fetch_array($sqloprov)) {
    
        $nobreprov="(".$rowprov["empresa"].")";}
    
        return $nobreprov;
    }


 

?>

 <!DOCTYPE html>


<html lang="es">

<head>
    <title>Movimiento Stock </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




</head>

<body>

<style>

    
    body {
        zoom:90%;
        scroll-behavior: smooth;
        /* Escala la página al 80% del tamaño original ; onclick="ajax_buscar('dsdssddds');" */
    }

  


</style>


    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Movimiento Stock&nbsp;&nbsp; Usuario:&nbsp;<strong> <?=$nombrenegocio?></p>
    </div>

  
    <div class="container">
  <form action="../movimientostock/" method="post">
             <div class="row">

                    <div class="col-lg-2 col-6">
                        
                    <a href="../">
                        <img src="/assets/images/logopc.png" style="width:38mm;">
                        </a> 
                        
                    </div>
                        <div class="col-lg-2 col-6" style="padding-top: 10px; float:right;">
                       
                   <?php
                    
                    include('inpubuscado.php');
                    
                   ?>
                    </div>
                  
                <div class="col-lg-8 col-12" style="padding-top: 10px;">
                
                                   
                        <div class="col">
                        <input type="date" class="form-control"  name="fechacja"  id="fechacja" value="<?=$fechacja?>" style="width: 350px; float:right;" max="<?=$fechahoy?>">
                                
                        </div>
                        <div class="col">
                        <button  type="submit" class="btn btn-success" style=" float:right;">
                            Ver Caja 
                                                </button>
                        </div>
              



         
            </div> </div>  </form>
                            <hr>

                        <?php
                        
                        if($tipo_usuario=="0"){include('stockmovi.php');}
              
                               
                        
                        ?>

<?php
                        
                        
                        ?>
         <br><br><br>
</div>
  


  <br>





                            <div class="container mt-3 text-center"> 
    
  
<a href="../"><button  type="button" class="btn btn-danger" tabindex="-1">Salir</button></a>



</div>
            
            



          </div>  
          
        
   




</body>

</html>

<?php
 
 mysqli_close($rjdhfbpqj);
 
?>