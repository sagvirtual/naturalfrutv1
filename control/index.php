<?php
include('../f54du60ig65.php');

include('../lusuarios/login.php');
include('../lusuarios/redirecon.php');


$ordensalp = " ORDER BY `itembajar`.`producto` ASC";




$id_orden = $_SESSION['id_orden'];
$producto = $_GET['producto'];
$numero = $_GET['numero'];



if ($_GET[1] == "1") {
    $editd = "";
    $tiempore = "60000";
} else {
    $editd = "?1=1";
    $tiempore = "60000";
}

if($tipo_usuario=="0" || $tipo_usuario=="33" || $id_usuarioclav=="40" || $tipo_usuario=="1"){
?>
<script>
    // Función para recargar la página
    function recargarPagina() {
        location.reload();
    }

    // Configura la recarga automática cada 1 minuto (60,000 milisegundos)
    setInterval(recargarPagina, <?= $tiempore ?>);
</script>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Orden Para Envasado</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

<body>

<style>@media only screen and (max-width: 768px) {

   
  /* Aquí colocamos estilos para pantallas más pequeñas, como smartphones */
  body {
    zoom: 30%;
    margin: 0 auto; /* Centrar el contenido en la pantalla */
  }
  .botver{font-size: 56px;}
}
</style>



    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Control Versión 1.0.0&nbsp;&nbsp;&nbsp;&nbsp;Usuario: <?= $nombrenegocio ?></p>
    </div>

    <div class="container mt-3">

        <div class="row">
            <div class="col-6">
            <a href="../../"  style="cursor: pointer; text-decoration: none; color:black;" tabindex="-1">  <img src="/assets/images/logopc.png" style="width:38mm;"></a>

            </div>


            <div class="col-6">

                <ul class="list-group">
                    <li class="list-group-item">Sector: <strong>Deposito PA, Envasado PA, Envasado PB</strong></li>
                 
                 <? if($id_usuarioclav=="40"){
 
 ?>
 <li class="list-group-item"><a href="/depositoplantaalta/"><button type="button" class="btn btn-dark"><strong style="font-size: 60pt;">DEPOSITO PA</strong></button></a></li><br>
 <li class="list-group-item"><a href="/deposito/"><button type="button" class="btn btn-dark"><strong style="font-size: 60pt;">Picking Depo.</strong></button></a></li>
 <?php
 }
  
 ?>
                    <li class="list-group-item">Fecha: <strong><?= $fechahoyver ?></strong></li>
                </ul>


            </div>


        </div>




    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-4">

                <?php
    $sectors="29";
    include('../mensajes/index.php');
                include('../depositoplantaalta/proseso.php');
                include('../depositoplantaalta/historial.php');

                ?>


            </div>
            <div class="col-4">
                <?php
                   $sectors="22";
                   include('../mensajes/index.php');
                include('../envasadopa/proseso.php');
                include('../envasadopa/historial.php');

                ?>


            </div>
            <div class="col-4">
                <?php
                $sectors="21";
                include('../mensajes/index.php');
                include('../envasadopb/proseso.php');
                include('../envasadopb/historial.php');

                ?>


            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="../lusuarios/logincerrar.php"><button type="button" class="btn btn-secondary botver" >Cerrar usuario</button></a><br><br>
        </div>


    </div>











    <div id="muestromenPA"> </div>



<script>function ajax_mensaje(mensajes,tipo_cliente) {
        var parametros = {
            "mensajes": mensajes,
            "tipo_cliente": tipo_cliente
        };
        $.ajax({
            data: parametros,
            url: '../mensajes/insert_mensajes.php',
            type: 'POST',
            beforeSend: function () {
                $("#muestromenPA").html('');
            },
            success: function (response) {
                $("#muestromenPA").html(response);
            }
        });
    }
    function cerrarVentana() {
    // Intentar cerrar la ventana actual
    window.close();
}
    </script>




</body>

</html>
<?php
 
 mysqli_close($rjdhfbpqj);
}else{
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='../'");
    echo ("</script>"); 

 }
 
?>