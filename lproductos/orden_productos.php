<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');

if (isset($_POST['update'])) {
    foreach ($_POST['positions'] as $position) {
        $index = $position[0];
        $newPosition = $position[1];

        $rjdhfbpqj->query("UPDATE productos SET position = '$newPosition' WHERE id='$index'");
    }

    exit('success');
}
?>

          
<style>
.pagination-container {
    max-width: 20cm;
    margin: 0 auto;
}

/* Estilos de la paginación */
.pagination {  background-color: white;
    list-style-type: none;
    display: flex;
    flex-wrap: wrap; /* Esto permite que los elementos se muestren en varias líneas si es necesario */
    justify-content: center;
    padding: 0;
}

.pagination li {
    background-color: white;
    margin-right: 5px;
    margin-bottom: 20px; /* Añadimos un margen inferior para separar los elementos verticalmente */
    width: auto; /* Cambiamos el ancho a automático para que se adapten al contenido */
    white-space: nowrap; /* Evita que el texto se divida en varias líneas */
}

.pagination li a {
    color: #333;
    text-decoration: none;
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.pagination li.active a {
    background-color: #007bff;
    color: #fff;
    border: 1px solid #007bff;
}

</style>
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"> <i class="dripicons-checklist"></i> Ordenar Productos</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
            <a href=" 
            <?php
             
             echo'../listadeprecio/listaedit?jfndhom='.$_SESSION['jfnddhom'].'&pagina='.$_SESSION['pagina'].'&busquedads='.$_SESSION['busquedads'].'';
             
            ?>
            " 
            ><button type="button" class="btn btn-round btn-dark"><i class="fa fa-close"></i></button></a>
            </div>
        </div>
    </div>
    
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">

        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
       
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            
                            <tbody>
                                 <?php


/* paginacion */


$TAMANO_PAGINA = 1;

//examino la página a mostrar y el inicio del registro a mostrar

$pagina = $_GET["pagina"];

if (!$pagina) {

		$inicio = 0;

		$pagina=1;

}

else {

	$inicio = ($pagina - 1) * $TAMANO_PAGINA;

}


$sqlcategoriasba = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias ORDER BY `categorias`.`position` ASC");


$num_total = mysqli_num_rows($sqlcategoriasba);
$total_paginas = ceil($num_total / $TAMANO_PAGINA);
//construyo la sentencia SQL			  
$limit= " limit " . $inicio . "," . $TAMANO_PAGINA ;
   

    
    
    
    $sqlcategoriasb = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias ORDER BY `categorias`.`position` ASC  $limit");
while ($rowcategoriasb = mysqli_fetch_array($sqlcategoriasb)) {
    $id_categoria = $rowcategoriasb["id"];
    $nombrecate = strtoupper($rowcategoriasb["nombre"]);

 

     $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria'"); 
    if ($rowproductosv = mysqli_fetch_array($sqlproductosv)) {

           echo '<tr>  <td style="color: black;background-color: #F0F0F0;"> <a href="/categorias"><h4>' . $nombrecate . '  <div  style="float:right;>
          
           <button type="button" class="btn btn-round btn-secondary">

           <i class="dripicons-pencil"></i> </button><div></h4></a>
           
         
           </td></tr>';
        
    }
    


            $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' ORDER BY `productos`.`position` ASC");
       


        //fin


        //busco el produco por la categoria
        while ($rowproductos = mysqli_fetch_array($sqlproductos)) {

            $nombreproduc = strtolower($rowproductos["nombre"]);
            $estado = $rowproductos["estado"];
            if($estado=='1'){$fondo=" background-color: #ff9a9a;";}else{{$fondo=" background-color: white;";}}
            $nombreproduc = ucfirst($nombreproduc);
            echo '<tr data-index="' . $rowproductos['id'] . '" data-position="' . $rowproductos['position'] . '" style="cursor:move;">
            <td style="color: black;'.$fondo.'">' . $nombreproduc . '</td> 
            </tr>';
        }
        //fin producto
       

    
}


?>







                            </tbody>
                        </table>

                        <br>
<hr>




<div class="pagination-container">
    <ul class="pagination">
        <?php
        if(($pagina - 1) > 0) { 
            echo "<li><a class='pagination-item' href='orden_productos?pagina=".($pagina-1)."&busqueda=$busquedads#ancla'><</a></li>"; 
        }

        if ($total_paginas > 1){
            for ($i=1;$i<=$total_paginas;$i++){
                if ($pagina == $i) {
                    echo "<li class='active'><a class='pagination-item' href='orden_productos?pagina=" . $i . "&busqueda=$busquedads#ancla'>";
                     if($TAMANO_PAGINA=='1'){ $idsds=$i-1;
                        $sqlcatedxgorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias  ORDER BY `categorias`.`position` ASC limit $idsds,1");
                        while ($rowcatedsdrias = mysqli_fetch_array($sqlcatedxgorias)) {echo''.$rowcatedsdrias['nombre'].'</a></li>';}
                       }
                } else {
                    echo "<li><a class='pagination-item' href='orden_productos?pagina=" . $i . "&busqueda=$busquedads#ancla'>"  ;
                    if($TAMANO_PAGINA=='1'){ $idsds=$i-1;
                        $sqlcatedxgorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias  ORDER BY `categorias`.`position` ASC limit $idsds,1");
                        while ($rowcatedsdrias = mysqli_fetch_array($sqlcatedxgorias)) {echo''.$rowcatedsdrias['nombre'].'</a></li>';}
                       }
                }
            }
        }

        if(($pagina + 1) <= $total_paginas) { 
            echo "<li><a class='pagination-item' href='orden_productos?pagina=".($pagina+1)."&busqueda=$busquedads#ancla'>></a></li>"; 
        }
        ?>
    </ul>
</div>






                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->







<!-- lista productos fin -->
 

















        <?php include('../template/pie.php'); ?>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('table tbody').sortable({
                    update: function(event, ui) {
                        $(this).children().each(function(index) {
                            if ($(this).attr('data-position') != (index + 1)) {
                                $(this).attr('data-position', (index + 1)).addClass('updated');
                            }
                        });

                        saveNewPositions();
                    }
                });
            });

            function saveNewPositions() {
                var positions = [];
                $('.updated').each(function() {
                    positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                    $(this).removeClass('updated');
                });

                $.ajax({
                    url: 'orden_productos.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        update: 1,
                        positions: positions
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
        </script>