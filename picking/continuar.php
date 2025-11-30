<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
?>
<!DOCTYPE html>


<html lang="es">

<head>
    <title>Sistema de Preparación de Pedidos 1.0</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>

<body>




    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;"
        style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Preparación de Pedidos&nbsp;&nbsp;
            Usuario:&nbsp;<strong><?= $nombrenegocio ?></p>
    </div>

    <style>
        .circle-button {
            width: 265px;
            height: 265px;
            background-color: green;
            text-decoration: none;
            border: none;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 65px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            outline: none;
            transition: background-color 0.3s ease;
        }

        .circle-button:hover {
            background-color: darkgreen;
        }

        .circle-button:active {
            background-color: lightgreen;
        }
    </style> <br><br>
    <br><br>

    <div class="row" id="muestroinic">
        <div class="col-2">


        </div>
        <div class="col-8">
            <div class="circle-button" onclick="ajax_continuar()">Proximo</div>

        </div>
        <div class="col-2">


        </div>
    </div>






    <br><br>
    <br><br>
    <?php if ($pikiusuario == 1) { ?>
        <div class="mt-5 p-4 text-center">
            <a href="../deposito/"><button type="button"
                    class="btn btn-dark btn-xs btnGoToTop">Gestión Deposito</button></a><br><br>
        </div>
    <?php } ?>
    <div class="mt-5 p-4 text-center">
        <a href="../lusuarios/logincerrar.php">
            <button type="button" class="btn btn-secondary btn-xs btnGoToTop">Cerrar usuario</button>
        </a><br><br>
    </div>



    </div>
    <script>
        function ajax_continuar() {
            window.location.href = 'proxima.php';
        }
    </script>
</body>

</html>