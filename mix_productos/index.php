<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/funcNomProd.php');
include('../control_stock/funcionStockS.php');
include('../listadeprecio/func_fechalista.php');



$id_probasedec = $_GET['jfndhom'];
$id_probase = base64_decode($id_probasedec);
$nombrepro = funcNomProd($rjdhfbpqj, $id_probase);
$fechalista = fechalista($rjdhfbpqj);

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



    <style>
        body {
            zoom: 85%;
        }
    </style>

    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Mix Productos&nbsp;&nbsp; Usuario:&nbsp;<strong> <?= $nombrenegocio ?></p>
    </div>


    <div class="container">

        <div class="row">
            <div class="col-lg-2">
                <a onclick="window.close()">
                    <img src="/assets/images/logopc.png" style="width:38mm;">
                </a>
            </div>
            <div class="col-10 text-center">
                <div class="alert alert-success">
                    <h1><?= $nombrepro ?></h1>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-12" style="padding-top: 10px;">

                <?php

                include('inpubuscado.php');




                ?>
            </div>

            <!--                            <div class="col-lg-2" style="padding-top: 10px;">
                            <a href="index.php">  <button type="button" class="btn btn-success">
       Agregar al Mix
                            </button> 
                          </a>
        </div>  -->

        </div>

    </div>
    </div>
    </div>

    <br>
    <div class="container">
        <div id="resultado"></div>

    </div>
    <hr>
    <?php

    $comilla = "'";
    $sqlormix = mysqli_query($rjdhfbpqj, "SELECT * FROM dbmix Where id_mix = '$id_probase'");
    $canverificafin = mysqli_num_rows($sqlormix);
    if ($canverificafin > 0) {
    ?>
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producto en el Mix (<?= $canverificafin ?>)</th>
                        <th class="text-center">Stock</th>
                        <th class="text-center">Costo x Kg.</th>
                        <th class="text-center">Cantidad Kg.</th>
                        <th class="text-center">Costo Util.</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($rowormix = mysqli_fetch_array($sqlormix)) {
                        $id_produc = $rowormix["id_producto"];
                        $kg_utiliz = $rowormix["kg_utiliz"];

                        $nombrepro = funcNomProd($rjdhfbpqj, $id_produc);
                        $bultof = detallebulto($rjdhfbpqj, $id_produc);
                        $stockdispomd = SumaStock($rjdhfbpqj, $id_produc);
                        $cant_kg = $rowormix["cant_kg"] * $kg_utiliz;

                        $cant_kg = number_format($cant_kg, 1, '.', '');




                        $cant_kgdt += $rowormix["cant_kg"];
                        $cant_kgt = $cant_kgdt * $kg_utiliz;
                        if ($stockdispomd > 0) {

                            $stockdispom = number_format($stockdispomd, 0, '.', ',') . ' Kg.';
                        } else {
                            $stockdispom = '0 Kg.';
                        }


                        $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT costo_total FROM precioprod Where id_producto = '$id_produc' and fecha <='$fechalista' and cerrado = '1' and confirmado = '1' ORDER BY fecha DESC, id DESC;");
                        if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {


                            $costo_totald = $rowprecioprod["costo_total"];
                            $costo_total = '$' . number_format($costo_totald, 2, ',', '.');
                            $costutild = $cant_kg * $costo_totald;
                        }
                        $costoslver += $costutild;
                        $sumofi = $sumofi + 1;

                        echo '

    <tr>
<td>' . $nombrepro . '<br><i style="color:grey;">' . $bultof['bulto'] . ' x ' . $bultof['kilo'] . ' ' . $bultof['unidadnom'] . '</i></td>

<td class="text-center">
<input type="text" class="form-control text-center"  value="' . $stockdispom . '" style="width: 100px;" disabled>    

</td>
<td class="text-center">
<input type="text" class="form-control text-center" id="costotal' . $sumofi . '" name="costotal' . $sumofi . '" value="' . $costo_total . '"  disabled>    

</td>
<td class="text-center">
    <input type="text" class="form-control text-center" placeholder="0"  id="cantidad' . $sumofi . '" name="cantidad' . $sumofi . '" oninput="ajax_sumo' . $sumofi . '();ajax_sumo()" onclick="select()" value="' . number_format($cant_kg, 1, '.', '') . '" style="width: 100px;">
</td>

<td class="text-center">
<input type="text" class="form-control text-center" id="costutil' . $sumofi . '" name="costutil' . $sumofi . '"  value="' . number_format($costutild, 2, '.', '') . '"  disabled>    
    

</td>


<td>
<button type="button" class="btn btn-danger" onclick="ajax_emiminar(' . $comilla . '' . $rowormix["id_producto"] . '' . $comilla . ')" tabindex="-1">Borrar</button>



<script>
        function ajax_sumo' . $sumofi . '(){
               var costotal' . $sumofi . ' = ' . $costo_totald . ' || 1; 
               var cantidad' . $sumofi . ' = document.getElementById(' . $comilla . 'cantidad' . $sumofi . '' . $comilla . ').value || 1; 
               var costutil' . $sumofi . '= eval(cantidad' . $sumofi . ') * eval(costotal' . $sumofi . ');
               
               document.getElementById(' . $comilla . 'costutil' . $sumofi . '' . $comilla . ').value = costutil' . $sumofi . '.toFixed(2);
   
            } 
               
    </script>
    <script>
    function ajax_guardarmix' . $sumofi . '(){
         
                var parametros = {
                "cant_kg": document.getElementById(' . $comilla . 'cantidad' . $sumofi . '' . $comilla . ').value || 1,                    
                "kg_utiliz": document.getElementById(' . $comilla . 'utilkg' . $comilla . ').value || 1,                    
                "id_producto": ' . $comilla . '' . $rowormix["id_producto"] . '' . $comilla . ',                    
                "id_mix": ' . $comilla . '' . $id_probase . '' . $comilla . '                  
                };
                $.ajax({
                    data: parametros, 
                    url: ' . $comilla . 'guardarmix.php' . $comilla . ',
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

</td>

</tr>



';
                        $botguardar .= 'ajax_guardarmix' . $sumofi . '();';



                        $idsumoinpu .= "var cantidad" . $sumofi . "= document.getElementById('cantidad" . $sumofi . "').value || 0; ";
                        $sumato .= "eval(cantidad" . $sumofi . ") + ";

                        $costutil .= "var costutil" . $sumofi . "= document.getElementById('costutil" . $sumofi . "').value || 0; ";
                        $sumatocosto .= "eval(costutil" . $sumofi . ") + ";
                    }



                    ?>

                    <script>
                        function ajax_sumo() {
                            <?= $costutil ?>
                            <?= $idsumoinpu ?>
                            <?= $cosuti ?>
                            var tolli = <?= $sumato ?>0;
                            var costosum = <?= $sumatocosto ?>0;

                            document.getElementById('utilkg').value = tolli.toFixed(1);
                            document.getElementById('costosum').value = costosum.toFixed(2);

                            var costosum = costosum.toFixed(2) / tolli.toFixed(1);

                            document.getElementById('costokg').value = costosum.toFixed(2);



                        }
                    </script>


                    <tr>

                        <td>

                        </td>
                        <td>

                        </td>

                        <td style="text-align:right;">
                        </td>
                        <td class="text-center"> Util. Kg.<br>
                            <input type="text" class="form-control text-center" id="utilkg" name="utilkg" value="<?= number_format($cant_kgt, 1, '.', '') ?>" style="width: 100px;" disabled>
                        </td>
                        <td class="text-center"> Costo Total<br>
                            <input type="text" class="form-control text-center" id="costosum" name="costosum" value="<?= number_format($costoslver, 2, '.', '') ?>" disabled>
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>



                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td class="text-center">
                        </td>
                        <td class="text-center"> Costo x kilo<br>
                            <?php

                            $costokgver = $costoslver / $cant_kgt;

                            ?>
                            <input type="text" class="form-control text-center" id="costokg" name="costokg" value="<?= number_format($costokgver, 2, '.', '') ?>" style="font-weight: bold;" disabled>
                        </td>
                        <td>

                        </td>

                    </tr>



                </tbody>
            </table>

        </div>
    <? } ?>
    <div class="row">
        <div class="col-sm-12 text-center">

            <button type="submit" class="btn btn-primary" onclick="<?= $botguardar ?> navigateWithDebounce();">Guardar Producto</button>&nbsp;&nbsp;&nbsp;&nbsp;

            <button type="button" class="btn btn-danger" value="Cancelar" onclick="location.href='../lproductos/?jfndhom=<?= $id_probasedec ?>';">Cancelar</button>

        </div>
    </div>


    <br><br><br>
    </div>









    </div>

    <script>
        function ajax_insermix(id_producto) {

            var parametros = {
                "id_producto": id_producto,
                "id_mix": '<?= $id_probase ?>'
            };
            $.ajax({
                data: parametros,
                url: 'insertarmix.php',
                type: 'POST',
                beforeSend: function() {
                    $("#resultado").html('');
                },
                success: function(response) {
                    $("#resultado").html(response);
                }
            });

        }
    </script>



    <script>
        function ajax_emiminar(id_producto) {

            var parametros = {
                "id_producto": id_producto,
                "id_mix": '<?= $id_probase ?>'
            };
            $.ajax({
                data: parametros,
                url: 'mlkdths.php',
                type: 'POST',
                beforeSend: function() {
                    $("#resultado").html('');
                },
                success: function(response) {
                    $("#resultado").html(response);
                }
            });

        }
    </script>



    <script>
        function navigateWithDebounce() {

            var parametros = {
                "costokg": document.getElementById('costokg').value,
                "id_producto": '<?= $id_probase ?>'
            };
            $.ajax({
                data: parametros,
                url: 'inserprecio.php',
                type: 'POST',
                beforeSend: function() {
                    $("#resultado").html('');
                },
                success: function(response) {
                    $("#resultado").html(response);
                }
            });

            setTimeout(() => {

                location.href = '../lproductos/?jfndhom=<?= $id_probasedec ?>';
            }, 2000); // 3000 milisegundos = 3 segundos
        }
    </script>

</body>

</html>