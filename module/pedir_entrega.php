<?php include('../f54du60ig65.php');
include('../template/cabezalcelu.php');

$idorden = base64_decode($_GET['jfndhom']);
$IdProducto = base64_decode($_GET['jjdfngh']);


    $sqlitem_ordendis = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechahoy'  and id_producto='$IdProducto' and modo='0' and id_orden='0' and stock='1'");
    while ($rowitem_orden = mysqli_fetch_array($sqlitem_ordendis)) {
        $nombreprod = $rowitem_orden["nombre"];


        $noverpagcl = $rowitem_orden["valor"];
        $id_clienteitem = $rowitem_orden["id_cliente"];
        $idite = $rowitem_orden["id"];
        $fecha = $rowitem_orden["fecha"];
        $modo = $rowitem_orden["modo"];
        $cliente_prov = $rowitem_orden["cliente_prov"];
        
        $kilos+= $rowitem_orden["kilos"];
        

        $idcodp = base64_encode($idite);
    }





    //estraigo los kilos por el cual viene el cajon
    $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$IdProducto' ORDER BY `precioprod`.`id` DESC");
    if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
        $kilocajon = $rowprecioprod["kilo"];
    }




?>
<style>
    a {
        color: black;
    }
</style>

<div class="contentbar">


    <div class="col-lg-12">
        <a href="remito?jfndhom=<?=$_GET['jfndhom']?>?>">
    <h2 class="card-title"><strong>Agregar al Remito  Nº<?=$idorden?></strong></h2></a>
        <!-- Start row -->
        <div class="row">
            
            <div class="col-lg-12" style="background-color: #ffffff; width:100%;">
            
                <table style="width:100%;">
                    <tr>
                        <td> <br>
                            <div class="row">
                                <div class="input-group mb-3 col-lg-6">
                                    <h2 style="text-align: center;"><?= $nombreprod ?></h2>
                                    
                                    
                                    <div class="input-group-prepend">
                                        <button class="btn btn-light" type="button" id="button-addon1">Stock: <?=$kilos?> <br>KILOS </button>
                                    </div>
                                    <input type="number" name="kilos" id="kilos" class="form-control" style="font-weight: bold; color:black; font-size:30pt;" aria-label="Example text with button addon" aria-describedby="button-addon1" value="1" onclick="select()" max="<?=$kilos?>" min="1">
                                </div>
                             
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>

                            <input type="hidden" name="idorden" id="idorden" value="<?= $_GET['jfndhom'] ?>">
                            <input type="hidden" name="id_producto" id="id_producto" value="<?= $_GET['jjdfngh'] ?>">
                        </td>
                    </tr>


                </table>
                
            </div>
        </div>
        <br>
        <!-- Start row -->
        <div class="row">
            <div class="col-lg-12" style="background-color: #ffffff; width:100%;">

               
                <div style="padding-bottom: 10px; padding-top:10px;">
                    <button type="button" class="btn btn-success btn-lg btn-block" onclick="ajax_carga($('#id_producto').val(), $('#idorden').val(), $('#kilos').val());" style="font-size:20pt; padding-bottom: 10px; padding-top:10px; height:100px;" ><b>CONFIRMAR</b></button>

                </div>
 <div id="muestrocarga"> </div>
            </div>
        </div>

    </div>
</div>

<script src="ajax_pedir.js"></script>













<?php
mysqli_close($rjdhfbpqj);


include('../template/piecelu.php'); ?>