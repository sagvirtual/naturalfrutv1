<? include('f54du60ig65.php');
include('lusuarios/login.php');

$id_categoria=$_GET['id_categoria'];
if($_POST['desde']){

   unset($_SESSION['desde']);
   unset($_SESSION['hasta']);
   unset($_SESSION['desdeant']);
   unset($_SESSION['hastaant']);
  // unset($_SESSION['idclientes']);
   //unset($_SESSION['id_clientevers']);


$_SESSION['desde'] = $_POST['desde'];
$_SESSION['hasta'] = $_POST['hasta'];
$_SESSION['desdeant'] = $_POST['desdeant'];
$_SESSION['hastaant'] = $_POST['hastaant'];
//$_SESSION['idclientes'] = $_POST['idclientes'];

}else{



}



if(empty($_SESSION['desde'])){
    $desde = "2023-01-01";
    $hasta = $fechahoy;
    
    
    $desdeant = "2023-01-01";
    $hastaant = "2024-06-30";

}else{

    $desde = $_SESSION['desde'];
    $hasta = $_SESSION['hasta'];
    
    
    $desdeant = $_SESSION['desdeant'];
    $hastaant = $_SESSION['hastaant'];

}

if(!empty($_GET['focf'])){
$id_cliente = $_GET['id_cliente'];
$id_clientev=explode("@",$id_cliente);
$id_clientevers = $id_clientev[0];

$id_clientevr=explode("(",$id_clientevers);
$id_clientever=$id_clientevr[0];

$id_clienteint = $id_clientev[1];
$_SESSION['idclientes'] = $id_clientev[1];
$_SESSION['id_clientevers'] = $id_clientev[0];



}else{
    
    $id_clienteint=$_SESSION['idclientes'];
    $id_clientevers=$_SESSION['id_clientevers'];

}




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Estadisticas - Natural Frut</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="js/chart.js"></script>
</head>
</script>
<body>
<style>

    
.zoom-85 {
    zoom: 85%;
    scroll-behavior: smooth;
}


        canvas {
            max-width: 1200px;
            margin: auto;
            border: 1px solid #ccc;
        }


</style>

<?php
 
function alcucompra($rjdhfbpqj, $idproducto, $desde, $hasta,$id_clienteint,$id_categoria){ //Where id_categoria='$idcategoria'

    if($id_clienteint > 0){$sqlo=" and id_cliente='".$id_clienteint."'";}

    $sqlcatedxgorias = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_producto='$idproducto' and id_categoria='$id_categoria' and modo='0' and fecha BETWEEN '$desde' and '$hasta' $sqlo");
    while ($rowcatedsdrias = mysqli_fetch_array($sqlcatedxgorias)) {
        $tipounidad=$rowcatedsdrias['tipounidad'];
        $id_producto=$rowcatedsdrias['id_producto'];
        //$comovinee=$rowcatedsdrias['kilo'];
        if($tipounidad=='0'){$modoun="Kg.";}else{$modoun="Unid.";}

    $sqlcadgorias = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$id_producto'");
    if ($rowcaddrias = mysqli_fetch_array($sqlcadgorias)) { 
        $unidadnom=$rowcaddrias['unidadnom'];
        $comovinee=$rowcaddrias['kilo'];
    }
   if($unidadnom=="Kg." && $tipounidad=='0'){

         $totalcaterori+=$rowcatedsdrias['kilos'];
    }
   // paso a kg la unidad
   else if($unidadnom=="Kg." && $tipounidad=='1'){

        $totalcaterori+=$rowcatedsdrias['kilos'] * $comovinee;
   }

   else if($unidadnom=="Uni." && $tipounidad=='1'){

    $totalcaterori+=$rowcatedsdrias['kilos']* $comovinee;
}
else if($unidadnom=="Uni." && $tipounidad=='0'){

    $totalcaterori+=$rowcatedsdrias['kilos'];
}






       
       
    
    }
    //return number_format($totalcaterori, 2, ',', '.');
  
    return array('totalcaterori' => $totalcaterori, 'modoun' => $unidadnom);
}



function categorias($rjdhfbpqj, $desde, $hasta,$id_clienteint,$desdeant,$hastaant,$id_categoria){


   $sqlcatedxgorias = mysqli_query($rjdhfbpqj, "SELECT * FROM `productos` WHERE `categoria` = '$id_categoria'  ORDER BY `productos`.`position` ASC ");
   
    while ($rowcatedsdrias = mysqli_fetch_array($sqlcatedxgorias)) {

        $idproducto=$rowcatedsdrias['id'];

        $totalcatde=alcucompra($rjdhfbpqj, $idproducto, $desde, $hasta,$id_clienteint,$id_categoria);
        $totalcatd=$totalcatde['totalcaterori']  | 0;
/* 
        $desdeant="2000-02-02";
        $hastaant="2024-06-15"; */
        $totalcatdeant=alcucompra($rjdhfbpqj, $idproducto, $desdeant, $hastaant,$id_clienteint,$id_categoria);
        $totalcatdant=$totalcatdeant['totalcaterori'] | 0;
        



        if($totalcatd > 0){$cantidacarte=$cantidacarte+1;


            $nomductod = $rowcatedsdrias['nombre']; 
            $elementoa = "(Frutas Glaseadas - Deshidroazucaradas)";
            $elementob = "(Sin marca)";
            $elementoc = "(Especias y condimentos)";    
            $elementod = "(Fruta Desecada)";
            $elementoe = "(Fruta Seca)";
            $elementof = "(Cultivo Avena)";
            $elementog = "(Nuez - Almendras - Castañas - Pasas Negras y Rubias - Maní)";
            $elementoh = "(Nuez, Almendras, Castañas, Avell)";
            $elementoi = "(Nuez-Almendras-Castañas-Pasas Rubias y Negras)";
            $elementoj = "(Semillas)";
            $elementok = "- Esencia";
            $elementol = "(Especias y Condimentos)";
          
            
            
            
            $nomductoa = str_replace($elementoa, '', $nomductod );
            $nomductob = str_replace($elementob, '', $nomductoa );     
            $nomductoc = str_replace($elementoc, '', $nomductob );
            $nomductod = str_replace($elementod, '', $nomductoc );
            $nomductof = str_replace($elementoe, '', $nomductod );      
            $nomductog = str_replace($elementof, '', $nomductof);
            $nomductoh = str_replace($elementog, '', $nomductog);
            $nomductoi = str_replace($elementoh, '', $nomductoh);
            $nomductoj = str_replace($elementoj, '', $nomductoi);
            $nomductok = str_replace($elementok, '', $nomductoj);
            $elementol = str_replace($elementol, '', $nomductok);
            
            $nomducto = str_replace($elementoi, '', $elementol);



        $categoria.="'".$nomducto." ".$totalcatde['modoun']."', ";
        $urld.="'".$nomducto." ".$totalcatde['modoun']."': '#',";
        $totalcatds.=$totalcatd.",";
        $totalcatdsant.=$totalcatdant.",";
        }
    }

        $totalcat = substr($totalcatds, 0, -1);
        $totalcatant = substr($totalcatdsant, 0, -1);
        
        $categoriar = substr($categoria, 0, -1);
        $urld = substr($urld, 0, -1);

    


    return array('categoria' => $categoriar, 'totalcat' => $totalcat, 'urld' => $urld, 'cantidacarte' => $cantidacarte, 'totalcatdant' => $totalcatant);
}

?>


<div>



    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Estadisticas Versión 1.0.0</p>
    </div>

    <style>
    .seleccionacld {
        background-color: #ccc;
         }
         .no-seleccionacld {
            background-color: #fff; 
        }

         

</style>





    <div class="container zoom-85" >
   
        <div class="row">
            <div class="col-2">

                <img src="/assets/images/logopc.png" style="width:38mm;" tabindex="-1">
            </div>

              

            <div class="col-4">
                <div style="padding-bottom:15px; width: 350px;">
            <b>Cliente</b> 
            <form id="formBusqucl">
 <input type="text" class="form-control" style="width: 350px;" id="id_cliente" name="id_cliente"  value="<?= $id_clientever ?>" autocomplete="off" onclick="select()" onkeypress="return event.keyCode != 13;">

</form>
         <div id="resultadocl"></div>

        </div>
        <form action="../estadisticas.php" method="post">
        <div style="padding-bottom:15px; width: 350px;">
        <b>Fecha desde</b>     
        <input type="date"  id="desde" name="desde" class="form-control" value="<?= $desde ?>" style="width: 350px;" ><br>

        <b>Comparación desde</b>     
        <input type="date"  id="desdeant" name="desdeant" class="form-control" value="<?= $desdeant ?>" style="width: 350px;" >
        </div>
        
            </div>
            <div class="col-2" style="width: auto;  position: relative; float: left;">
              
            </div>

            <div class="col-4">
            <div style="position:relative; top:80px;">
        
                   
        
                    <b>Fecha Hasta</b>     
                    <input type="date" id="hasta" name="hasta"  class="form-control" value="<?= $hasta ?>" style="width: 350px;" >
                    <br>
                    <b>Comparación Hasta</b>     
                    <input type="date" id="hastaant" name="hastaant"  class="form-control" value="<?= $hastaant ?>" style="width: 350px;" >
           
           
            </div> 
            </div> 
            
            
            <div class="col-2" style="width: auto;  position: relative; float: left;"><a href="debe_haber?jhduskdsa=Mw==" tabindex="-1">
                <button type="submit" class="btn btn-success" style="position: absolute; bottom: 16px; left: 0px;" tabindex="-1">Ver</button></a>
            </div>


                     
        </div>
      </form>
      
      </div>
      <hr>
      <div class="container text-center" >
       <?php
     
    $extraecdfa=categorias($rjdhfbpqj, $desde, $hasta,$id_clienteint,$desdeant,$hastaant,$id_categoria);
     $cantidad=$extraecdfa['cantidacarte'];

     if($cantidad > 3){$cantidad=$extraecdfa['cantidacarte']*50;}else{$cantidad=$extraecdfa['cantidacarte']*150;}
     
    ?>
 <? 
 
 $sqlcatedxgdas = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias WHERE id='$id_categoria' ");
 if ($rowcatdrias = mysqli_fetch_array($sqlcatedxgdas)) {

     $nombrecat=$rowcatdrias['nombre'];
    
 } 

 
 
 ?> 
  <h4 style="position:relative; top:0px;"><button type="submit" class="btn btn-dark btn-sm"  tabindex="-1" onClick="window.history.back();" style="position:relative; top:-3px;">< Atras</button> &nbsp;&nbsp;&nbsp;Ventas por Categoría <?=$nombrecat?> - Cliente: <?=$id_clientevers?> <br> <br>
    <canvas id="horizontalBarChart" width="1400" height="<?=$cantidad?>"></canvas></h4> 



<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datos de ventas en miles
        const ventas = [<?=$extraecdfa['totalcat']?>];
        const ventasant = [<?=$extraecdfa['totalcatdant']?>];

        // Datos de categorías (etiquetas)
        const categorias = [<?=$extraecdfa['categoria']?>];

          // Definir las URLs para cada categoría
    const urls = {<?=$extraecdfa['urld']?>};
// Ordenar ventas en orden descendente y alinear categorías
const sortedData = ventas.map((venta, index) => ({ venta, categoria: categorias[index] }))
                            .sort((a, b) => b.venta - a.venta);

    // Extraer los datos ordenados
    const ventasOrdenadas = sortedData.map(item => item.venta);

// Ordenar ventas en orden descendente y alinear categorías
const sortedDataa = ventasant.map((ventasant, index) => ({ ventasant, categoria: categorias[index] }))
                            .sort((a, b) => b.ventasant - a.ventasant);

    // Extraer los datos ordenados
    const ventasOrdenadasa = sortedDataa.map(item => item.ventasant);



    const categoriasOrdenadas = sortedData.map(item => item.categoria);

    // Asegurarse de que las categorías sean únicas
    const categoriasUnicas = [...new Set(categoriasOrdenadas)];

    // Crear el gráfico
    const ctx = document.getElementById('horizontalBarChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: categoriasUnicas,  // Utiliza las categorías únicas
            datasets: [
                {
                    label: 'Ventas',
                    data: ventasOrdenadas,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    yAxisID: 'y',
                    
                },
                {
                    label: 'Ventas Comparación',
                    data:  ventasOrdenadasa, // Este arreglo lo puedes ajustar según necesites
                    backgroundColor: '#000000',
                    yAxisID: 'y1',
                }
            ]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            onHover: function(evt, elements) {
                 evt.native.target.style.cursor = elements.length ? 'pointer' : 'default';
                 },

            onClick: function(evt) {
                const activePoints = chart.getElementsAtEventForMode(evt, 'nearest', { intersect: true }, true);
                if (activePoints.length > 0) {
                    const index = activePoints[0].index;
                    const categoria = categoriasUnicas[index];
                    const url = urls[categoria];
                    if (url) {
            window.open(url, '_parent');  // Abrir en la misma ventana con _parent
        }
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Valores'
                    },
                    ticks: {
                        callback: function(value) {
                            return '' + value.toLocaleString(); // Agrega el símbolo de dólar
                        }
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Productos'
                    }
                },
                y1: {
                    position: 'none',
                    grid: {
                        drawOnChartArea: false
                    },
                    title: {
                        display: false,
                        text: 'Valores'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
});
</script>


</div>
    
    
  





<!-- 
        <br><div class="container mt-3 text-center"> 
    
            <a href="debe_haber_pdf.php?jhduskdsa=MTU2&desde_date=2024-01-09&hasta_date=2024-12-09" target="_blank" tabindex="-1"> <button type="button" class="btn btn-dark" tabindex="-1">Descargar PDF</button></a> 

    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    <a onclick="window.close()"><button  type="button" class="btn btn-danger" tabindex="-1">Salir</button></a>



        </div>
    
     -->



     <script>
$(document).ready(function(){
    var indiceseleccionacld = -1;


    // Manejar el evento keyup para buscar mientras se escribe
    $('#id_cliente').on('keyup', function(e) {
        if (event.key === 'Escape') { // Escape
            $('#resultadocl').empty(); // Vaciar el listado de resultadcl
           
        } 
    });
    

  $(document).on('click', function(e) {
        if (!$(e.target).closest('#resultadocl').length && !$(e.target).is('#id_cliente')) {
            $('#resultadocl').empty();
        }
    }); 

    

    // Manejar el evento keydown para buscar mientras se escribe
    $('#id_cliente').on('keyup', function(e) {
        var $resultadcl = $('#resultadocl p');

        
        if (e.keyCode === 38) { // Flecha arriba
            e.preventDefault();
            if (indiceseleccionacld > 0) {
                indiceseleccionacld--;
                actualizarSeleccion($resultadcl);
            }
        } else if (e.keyCode === 40) { // Flecha abajo
            e.preventDefault();
            if (indiceseleccionacld < $resultadcl.length - 1) {
                indiceseleccionacld++;
                actualizarSeleccion($resultadcl);
            }
        } else if (e.keyCode === 9 || event.key === 'Enter') { // Enter

           
            e.preventDefault();
            if (indiceseleccionacld !== -1) {
                // Aquí puedes hacer lo que necesites con el resultado seleccionacld, por ejemplo:



                     // Construir la URL con el parámetro seleccionacld
                     var seleccionacld = $($resultadcl[indiceseleccionacld]).text();
                var url = "estadisticas.php?&focf=1&id_cliente=" + encodeURIComponent(seleccionacld) ;
                // Redireccionar a la URL
                window.location.href = url;

                
            }

            


            
        } else {
            // Si se presiona otra tecla, realizar la búsqueda
            realizarBusqucl();
        }
    });

    // Manejar el evento click en los resultadcl de la búsqueda
  $(document).on('click', '#resultadocl p', function() {
        indiceseleccionacld = $(this).index();
         actualizarSeleccion($('#resultadocl p'));
        $('#id_cliente').focus(); // Mantener el foco en el campo de búsqueda

     
        var seleccionacld = $(this).text();
        var url = "estadisticas.php?&focf=1&id_cliente=" + encodeURIComponent(seleccionacld) ;
        window.location.href = url;

    });
 


    function realizarBusqucl() {
        // Obtener los datos del formulario
        var formData = $('#formBusqucl').serialize();

        
        // Realizar la solicitud AJAX       
        $.ajax({
            type: "POST",
            url: "../lestadisticas/buscarcli.php",
            data: formData,
            success: function(response) {
                $('#resultadocl').html(response); // Actualizar los resultadcl en la página
                indiceseleccionacld = -1; // Reiniciar el índice seleccionacld
            }
        });
    }

    function actualizarSeleccion($resultadcl) {
        $resultadcl.removeClass('seleccionacld');
        $($resultadcl[indiceseleccionacld]).addClass('seleccionacld');
    }

    
});
</script>

<br><hr>

<?php
 

// ultima compra estadisticas
function alcucompraul($rjdhfbpqj, $idproducto, $desde, $hasta,$id_clienteint,$id_categoria){ 
    if($id_clienteint > 0){$sqlo=" and item_orden.id_cliente='".$id_clienteint."'";}
   
    $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idproducto'");
    if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
    $comovinee=$rowpdaod['kilo'];
    $unidadnom=$rowpdaod['unidadnom'];
}
   


   $sqlcatedxgorias = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_producto='$idproducto' and id_categoria='$id_categoria' $sqlo  ORDER BY `item_orden`.`fecha` DESC");
   $cantidadecompras = mysqli_num_rows($sqlcatedxgorias);
    if ($rowcatedsdrias = mysqli_fetch_array($sqlcatedxgorias)) {
        $tipounidad=$rowcatedsdrias['tipounidad'];
        $id_producto=$rowcatedsdrias['id_producto'];
        $id_orden=$rowcatedsdrias['id_orden'];
        $fhechaorden=$rowcatedsdrias['fecha'];
        if($tipounidad=='0'){$modoun="Kg.";}else{$modoun="Unid.";}

        $fechaFin = date("Y-m-d");

        $diasDiferencia = (new DateTime($fhechaorden))->diff(new DateTime($fechaFin))->days;




  
   if($unidadnom=="Kg." && $tipounidad=='0'){

         $totalcaterori+=$rowcatedsdrias['kilos'];
    }
   // paso a kg la unidad
   else if($unidadnom=="Kg." && $tipounidad=='1'){

        $totalcaterori+=$rowcatedsdrias['kilos'] * $comovinee;
   }

   else if($unidadnom=="Uni." && $tipounidad=='1'){

    $totalcaterori+=$rowcatedsdrias['kilos'];
        }

        $totalcaterori=$totalcaterori." ".$unidadnom;




       
       
    
    }
  
    return array('totalcaterori' => $totalcaterori, 'modoun' => $unidadnom, 'fhechaorden' => $fhechaorden, 'diasDiferencia' => $diasDiferencia, 'cantidadecompras' => $cantidadecompras, 'id_orden' => $id_orden);
}

function utimacom($rjdhfbpqj, $desde, $hasta,$id_clienteint,$desdeant,$hastaant,$id_categoria){


    $sqlcatedxgorias = mysqli_query($rjdhfbpqj, "SELECT * FROM `productos` WHERE `categoria` = '$id_categoria'  ORDER BY `productos`.`position` ASC ");
    
     while ($rowcatedsdrias = mysqli_fetch_array($sqlcatedxgorias)) {
 
         $idproducto=$rowcatedsdrias['id'];

         $totalcatde=alcucompraul($rjdhfbpqj, $idproducto, $desde, $hasta,$id_clienteint,$id_categoria);
         $totalcatd=$totalcatde['totalcaterori']  | 0;
         $fecharde=$totalcatde['fhechaorden'];
         $id_ord=$totalcatde['id_orden'];
         $id_ordencod = base64_encode($id_ord);



         $urleul='<a href="../nota_de_pedido/presupuesto_pdf?jdhsknc=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="Ultima Compra '.$rowcatedsdrias['nombre'].'">Nº'.$id_ord.' </a>';

         
 
 
 
         if($totalcatd > 0){$cantidacarte=$cantidacarte+1;
 
 
         $categoria.="'".$rowcatedsdrias['nombre']." ".$totalcatde['modoun']."', ";
         
        if($totalcatde['cantidadecompras'] == 1){$ves="ves";}else{$ves="veces";}
        echo '
          <tr>
        <td>'.$rowcatedsdrias['nombre'].'</td>
        <td class="text-center">'.$urleul.'</td>
        <td class="text-center">'.date('d/m/Y', strtotime($fecharde)).'</td>
        <td class="text-center">'.$totalcatde['totalcaterori'].'</td>
        <td class="text-center">'.$totalcatde['diasDiferencia'].' días</td>
        <td class="text-center">'.$totalcatde['cantidadecompras'].' '.$ves.'</td>
      </tr>
        
        ';
        
        
        
        
        }
     }
 
         
 
     
 }
 
?>
<div class="container">
  <h2>Estadistica de Productos</h2>   
  <p>La ultima compra productos</p>        
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Producto</th>
        <th  class="text-center">Orden</th>
        <th  class="text-center">Se compro</th>
        <th class="text-center">Cantidad</th>
        <th  class="text-center">Días que pasarón</th>
        <th  class="text-center">Compra</th>
      </tr>
    </thead>
    <tbody>
      <?php
       
       utimacom($rjdhfbpqj, $desde, $hasta,$id_clienteint,$desdeant,$hastaant,$id_categoria);
       
      ?>
    </tbody>
  </table><br><br>
  <div style="width: 100%;" class="text-center">
  <button type="submit" class="btn btn-dark"  tabindex="-1" onClick="window.history.back();">Atras</button>
</div><br>
</body>

</html>