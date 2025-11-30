<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/funcNomProd.php');
include('../control_stock/funcionStockS.php');
$comilla = "'";


$id_probasedec = $_GET['jfndhom'];
$esmix = $_GET['esmix'];

if ($esmix == '0') {
    $vermis = "style=display:none;";
    $formula = "";
} else {
    $formula = "Formula para el ";
    $vermis = "";
}
$id_probase = base64_decode($id_probasedec);
$nombrepro = funcNomProd($rjdhfbpqj, $id_probase);
?>



<!DOCTYPE html>


<html lang="es">

<head>
    <title>Sistema de Mix Producto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




</head>

<body>




    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Mix Productos&nbsp;&nbsp; Usuario:&nbsp;<strong> <?= $nombrenegocio ?></p>
    </div>


    <div class="container">

        <div class="row">
            <div class="col-lg-4">
                <a onclick="window.close()">
                    <img src="/assets/images/logopc.png" style="width:38mm;">
                </a>
            </div>
            <div class="col-4 text-center">
                <span>CANTIDAD DE KILOS A PREPARAR</span>
                <input type="text" class="form-control text-center" id="kilosprepa" name="kilosprepa" value="20" style="font-size: 30pt;font-weight: bold;" oninput="ajax_sumo()" onclick="select()">

            </div>
            <div class="col-lg-4">

            </div>

        </div>



    </div>

    </div>
    </div>
    </div>

    <br>
    <div class="container">
        <div id="resultado"></div>

    </div>

    <?php

    $comilla = "'";
    $sqlormix = mysqli_query($rjdhfbpqj, "SELECT * FROM dbmix Where id_mix = '$id_probase'");
    $canverificafin = mysqli_num_rows($sqlormix);

    ?>
    <div class="container">
        <div class="alert alert-secondary text-center">
            <strong><?= $formula ?> <?= $nombrepro ?> </strong>
        </div>
        <table class="table table-bordered" <?= $vermis ?>>
            <thead>
                <tr>
                    <th class="text-center" style="width: 170px;">Stock Kg.</th>
                    <th>Producto en el Mix (<?= $canverificafin ?>)</th>
                    <th class="text-center">Cantidad Kg.</th>
            </thead>
            <tbody>
                <?php

                while ($rowormix = mysqli_fetch_array($sqlormix)) {
                    $id_produc = $rowormix["id_producto"];

                    $nombrepro = funcNomProd($rjdhfbpqj, $id_produc);
                    $bultof = detallebulto($rjdhfbpqj, $id_produc);
                    $stockdispomd = SumaStockunid($rjdhfbpqj, $id_produc);
                    $cant_kgorg = $rowormix["cant_kg"];
                    $cant_kg = $rowormix["cant_kg"] * 20;


                    $cant_kg = number_format($cant_kg, 1, '.', '');
                    $cant_kg = number_format($cant_kg, 3, '.', '');
                    /* 
  $cant_kgorg=number_format($cant_kgorg, 2, '.', ''); 
    $cant_kgorg=number_format($cant_kgorg, 3, '.', '');  */


                    if ($stockdispomd > 0) {

                        $stockdispom = number_format($stockdispomd, 3, '.', '') . '';
                        $colorfon = "";
                        $nocargar += "0";
                    } else {
                        $stockdispom = '0';
                        $colorfon = 'style="background-color: red;"';
                        $nocargar = "7872";
                    }


                    $sumofi = $sumofi + 1;

                    echo '

    <tr><td class="text-center"  ' . $colorfon . '>
<input type="text" class="form-control text-center"  value="' . $stockdispom . '" id="stock' . $sumofi . '" name="stock' . $sumofi . '"   disabled>    

</td>
<td  ' . $colorfon . '>' . $nombrepro . '</td>



<td class="text-center"  ' . $colorfon . '>
    <input type="text" class="form-control text-center" placeholder="0"  id="cantidad' . $sumofi . '" name="cantidad' . $sumofi . '"  onclick="select()" value="' . $cant_kg . '" disabled>
</td>




</tr>



';



                    $idsumoinpu .= "cantidadt" . $sumofi . " =  kilosprepa * " . $cant_kgorg . ".toFixed(2); ";

                    if ($stockdispom > 0) {
                        $stokidcal .= "cantidaddst" . $sumofi . " =  " . $stockdispom . " - cantidadt" . $sumofi . ".toFixed(3);  ";
                        $stokid .= "document.getElementById('stock" . $sumofi . "').value =  cantidaddst" . $sumofi . ".toFixed(3); ";
                    }

                    $idsumoinpub .= "document.getElementById('cantidad" . $sumofi . "').value =  cantidadt" . $sumofi . ".toFixed(3); ";

                    if ($esmix == '1') {
                        $botonitema .= 'actualstokitem' . $sumofi . '(); ';

                        echo '
<script>
        function actualstokitem' . $sumofi . '(){
         
                var parametros = {
                "kilosprepa": document.getElementById(' . $comilla . 'cantidad' . $sumofi . '' . $comilla . ').value,                    
                "id_producto": ' . $comilla . '' . $id_produc . '' . $comilla . '                  
                };
                $.ajax({
                    data: parametros,
                    url: ' . $comilla . 'actualstokitem.php' . $comilla . ',
                    type: ' . $comilla . 'POST' . $comilla . ',
                    beforeSend: function() {
                        $("#resultado' . $sumofi . '").html(' . $comilla . '' . $comilla . ');
                    },
                    success: function(response) {
                        $("#resultado' . $sumofi . '").html(response);
                    }
                });
                
            } 
    </script>

    <div id="resultado' . $sumofi . '"></div>
';
                    }
                }



                ?>

                <script>
                    function ajax_sumo() {
                        var kilosprepa = document.getElementById('kilosprepa').value || 0;

                        <?= $idsumoinpu ?>
                        <?= $idsumoinpub ?>
                        <?= $stokidcal ?>
                        <?= $stokid ?>



                    }
                </script>





            </tbody>
        </table>

    </div>

    <div class="row">
        <div class="col-sm-12 text-center">
            <? if ($nocargar == 0) {
                echo '<button type="submit" class="btn btn-primary" id="btnEnviar" onclick="ajax_insstock(); ' . $botonitema . '">TERMINE DE PREPARA LO CARGO AL STOCK</button>';
            } else {

                echo '<div class="alert alert-danger">
                    <strong>¡No se puede stockear!</strong> Se debe pedir que reemplacen el producto "Sin Stock".
                    </div>';
            }
            ?>
            <br><br><br><br> <br><br><br><br>
            <button type="button" class="btn btn-danger" value="Cancelar" onclick="location.href='../etiquetas/buscadoreti';">Cancelar</button>

        </div>
    </div>


    <br><br><br><br>

    </div>









    </div>


    <script>
        $(document).ready(function() {

            ajax_sumo();
        });
    </script>
    <script>
        function ajax_insstock() {

            var btn = document.getElementById("btnEnviar");
            btn.disabled = true; // Deshabilita el botón
            // Preguntar al usuario si está seguro
            if (confirm("¿Estás seguro de que deseas agregarlo al stock?")) {
                var parametros = {
                    "id_producto": '<?= $id_probase ?>',
                    "kilosprepa": document.getElementById('kilosprepa').value,
                    "esmix": '<?= $esmix ?>'
                };
                $.ajax({
                    data: parametros,
                    url: 'insertstockmix.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#resultado").html('');
                    },
                    success: function(response) {
                        $("#resultado").html(response);
                    }
                });
            } else {
                // Opcional: Mensaje si el usuario cancela
                console.log("Operación cancelada por el usuario.");
            }


            setTimeout(() => {
                btn.disabled = false; // Reactiva el botón después de unos segundos (opcional)
            }, 8000);
        }
    </script>


</body>

</html>