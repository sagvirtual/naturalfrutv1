<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');

/* agregar */
$buscarubis = $_POST['buscarubi'];
$buscarubi = substr($buscarubis, 0, 12);

$sqwen = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi Where codigo='$id_destino'");
if ($rowod = mysqli_fetch_array($sqwen)) {

    $nombreubic = $rowod["nombre"];
}

?>

<!DOCTYPE html>


<html lang="es">

<head>
    <title>Sistema de Gestión Deposito </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




</head>

<body>




    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Gestión Deposito&nbsp;&nbsp; Usuario:&nbsp;<strong> <?= $nombrenegocio ?></p>
    </div>
    <div id="aviso-pedido"></div>

    <br>


    <div class="container text-center">
        <h1>Ver que producto hay en la Ubicación</h1> <br>
        <div class="input-group">
            <span class="input-group-text">Ubicación Cod.</span>


            <form action="buscarubicacion.php" method="post" id="buscarForm">



                <input type="number" min="13" max="13" class="form-control" id="buscarubi" name="buscarubi" value="" style="width: 200px;" autocomplete="off" onclick="select()" oninput="checkLength()">
            </form>


        </div><br>
        <?php

        $sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi where codigo='$buscarubi'");
        while ($rowrubros = mysqli_fetch_array($sqlrubros)) {

            $codigopalle = $rowrubros['codigo'];

            $sqwf = ${"sqwf" . $codigopalle};
            $rowod = ${"rowod" . $codigopalle};


            $sqwf = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito Where id_destino='$buscarubi'");
            $canverificafin = mysqli_num_rows($sqwf);
            if ($canverificafin != '0') {
                echo '   <div class="alert alert-danger text-center">
                            <strong>  ' . $rowrubros['nombre'] . ' </strong>';
                echo '(' . $canverificafin . ')';
                while ($rowod = mysqli_fetch_array($sqwf)) {
                    echo '                                    
                            <br> <br>
                            <div class="alert alert-light">
                            ' . $rowod['nombre'] . ' <br>
                            Cod. ' . $rowod['id_pallet'] . '<br>
                                 <strong>Ingreso: ' . date('d/m/Y', strtotime($rowod['fecha_ing'])) . '</strong><br>
                                 <strong>Vencimiento: ' . date('d/m/Y', strtotime($rowod['fecha_venc'])) . '</strong>
 
                                 </div><img src="pallets.png" style="width: 100%; position:relative; top:-20px">
                                
                              ';
                }

                echo '  </div>';
            }
        }
        ?>

















        <br><br>
        <br><br>

        <a href="../deposito/">
            <button type="button" id="suminstr2" class="btn btn-success" style="width: 100%;">Volver</button>
        </a>





        <div class="mt-5 p-4 text-center">
            <a href="../lusuarios/logincerrar.php"><button type="button" class="btn btn-secondary btn-xs btnGoToTop">Cerrar usuario</button></a><br><br>
        </div>

    </div>
    <script>
        function checkLength() {
            var inputField = document.getElementById('buscarubi');
            if (inputField.value.length === 13) {
                document.getElementById('buscarForm').submit();
            }
        }
    </script>
    <script>
        document.getElementById('buscarubi').focus();
    </script>



    <script>
        function verificarPedido() {
            fetch('func_avisoorden')
                .then(response => response.text())
                .then(data => {
                    document.getElementById("aviso-pedido").innerHTML = data;
                })
                .catch(error => console.error('Error al verificar el pedido:', error));
        }
        // Ejecutar al cargar la página
        verificarPedido();

        // Verificar cada 10 segundos
        setInterval(verificarPedido, 10000);
    </script>
    <script>
        function verificarPedido() {
            fetch('func_avisoorden')
                .then(response => response.text())
                .then(data => {
                    document.getElementById("aviso-pedido").innerHTML = data;
                })
                .catch(error => console.error('Error al verificar el pedido:', error));
        }
        // Ejecutar al cargar la página
        verificarPedido();

        // Verificar cada 10 segundos
        setInterval(verificarPedido, 10000);
    </script>
</body>

</html>