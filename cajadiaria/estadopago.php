<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');




if(!empty($_POST['fechacja'])){

    $_SESSION['fechacja']=$_POST['fechacja'];

    $fechacja=$_SESSION['fechacja'];
}else{

    if(empty($_SESSION['fechacja'])){
        $fechacja=$fechahoy;
    
    }else{
 $fechacja=$_SESSION['fechacja'];

    }
   

}










$fechacjaver=date('d/m/Y', strtotime($fechacja));


if( $tipo_usuario=="0" ||  $tipo_usuario=="37" ||  $tipo_usuario=="1"){ ?>



 <!DOCTYPE html>


<html lang="es">

<head>
    <title>Sistema de Estado de Cobros </title>
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
        <p style=" font-size: 10pt; color: white;">Sistema de Sistema de Estado de Cobros&nbsp;&nbsp; Usuario:&nbsp;<strong> <?=$nombrenegocio?></p>
    </div>

  
    <div class="container">
  <form action="../cajadiaria/estadopago.php" method="post">
             <div class="row">

                    <div class="col-lg-2 col-6">
                        
                        <a href="../">
                        <img src="/assets/images/logopc.png" style="width:38mm;">
                        </a> 
                    </div>
                        <div class="col-lg-2 col-6" style="padding-top: 10px; float:right;">
                        <a href="javascript:location.reload()">
                        <a href="index">
                    <h3><span class="badge bg-primary">Caja Diaria</span></h3>
                </a>

           
                   
                 
                   
                    </div>
                  
                <div class="col-lg-8 col-12" style="padding-top: 10px;">
                
                                   
                        <div class="col">
                        <input type="date" class="form-control"  name="fechacja"  id="fechacja" value="<?=$fechacja?>" style="width: 350px; float:right;" max="<?=$fechahoy?>">
                                
                        </div>
                        <div class="col">
                        <button  type="submit" class="btn btn-success" style=" float:right;">
                            Ver Hojas 
                                                </button>
                        </div>
              



         
            </div> </div>  </form>
                            <hr>
                            <h2>Hojas de Ruta <?=$fechacjaver?>
                            </h2>

                

      
</div>
  


  <br>





            
            



          </div>  
          
        
   




  <div class="container">
<? include('../cajadiaria/hojarutaordn.php')
?>
  </div>


  <div class="container mt-3 text-center"> 

<a href="../"><button  type="button" class="btn btn-danger" tabindex="-1">Salir</button><br><br><br><br><br>



</div>
</body>

</html>

<?php
 } 
 mysqli_close($rjdhfbpqj);
 
?>