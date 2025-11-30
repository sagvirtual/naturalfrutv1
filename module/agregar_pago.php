<?php include('../f54du60ig65.php');
include('../template/cabezalcelu.php');

$idorden = base64_decode($_GET['jfndhom']);




/* $sqlitem_ordendis = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idorden'");
if ($rowitem_orden = mysqli_fetch_array($sqlitem_ordendis)) {
    $id_clienteitem = $rowitem_orden["id_cliente"];
    $id_clientecod = base64_encode($id_clienteitem);
} */



    $sqlitem_ordendis = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idorden' and modo='1'");
    if ($rowitem_orden = mysqli_fetch_array($sqlitem_ordendis)) {
        $nombreprod = $rowitem_orden["nombre"];


        $noverpagcl = $rowitem_orden["valor"];
        $id_clienteitem = $rowitem_orden["id_cliente"];
        $idite = $rowitem_orden["id"];
        $fecha = $rowitem_orden["fecha"];
        $modo = $rowitem_orden["modo"];
        $cliente_prov = $rowitem_orden["cliente_prov"];
        
        $kilos = $rowitem_orden["kilos"];
        

        $idcodp = base64_encode($idite);
        $id_clientecod = base64_encode($id_clienteitem);

    }else{$sqlorden=mysqli_query($rjdhfbpqj,"SELECT * FROM orden Where id = '$idorden'");
        if ($roworden = mysqli_fetch_array($sqlorden)){
            $id_clienteitem = $roworden["id_cliente"];
            $id_clientecod = base64_encode($id_clienteitem);
        
        
        }}







?>
<style>
    a {
        color: black;
    }
</style>

<div class="contentbar">


    <div class="col-lg-12">
        <a href="remito?jfndhom=<?=$_GET['jfndhom']?>">
    <h2 class="card-title"><strong>Remito  Nº<?=$idorden?></strong></h2></a>
        <!-- Start row -->
        <div class="row">
            
            <div class="col-lg-12" style="background-color: #ffffff; width:100%;">
            
                <table style="width:100%;">
                <tr>
                        <td><br>
                        <select name="tipopag" id="tipopag" class="form-control"  onchange="showInput()">

<option value="1">Efectivo</option>
<option value="4">Cheque</option>
</select>

<input type="number" id="ncheque" name="ncheque" class="form-control" placeholder="Nº Cheque" style="display: none;">

                            <input type="hidden" name="idorden" id="idorden" value="<?= $_GET['jfndhom'] ?>">
                            <input type="hidden" name="id_cliente" id="id_cliente" value="<?= $id_clientecod ?>">
                        </td>
                    </tr>
                    <tr>
                        <td> <br>
                            <div class="row">
                                <div class="input-group mb-3 col-lg-6">
                          
                                     
                                    <div class="input-group-prepend">
                                        <button class="btn btn-light" type="button" id="button-addon1" style="font-size:20pt;">$</button>
                                    </div>

                                
                                    <input type="number" name="pago_valor" id="pago_valor" class="form-control" style="font-weight: bold; color:black; font-size:30pt;" aria-label="Example text with button addon" aria-describedby="button-addon1" value="0" onclick="select()">
                                </div>
                             
                            </div>

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
                    <button type="button" class="btn btn-success btn-lg btn-block" onclick="ajax_carga($('#idorden').val(), $('#id_cliente').val(), $('#pago_valor').val(), $('#tipopag').val(), $('#ncheque').val());" style="font-size:20pt; padding-bottom: 10px; padding-top:10px; height:100px;"><b>CONFIRMAR PAGO</b></button>

                </div>
 <div id="muestrocarga"> </div>
            </div>
        </div>
    </div>
</div>

<script src="ajax_pago.js"></script>









<script>
 function showInput() {
    var selectValue = document.getElementById("tipopag").value;
    var ncheque = document.getElementById("ncheque");
  
  if (selectValue === "4") {
    ncheque.style.display = 'block';
    ncheque.style.display = 'block';
  } else {
    ncheque.style.display = 'none';
    ncheque.style.display = 'none';
  }
}
       
</script>



<?php
mysqli_close($rjdhfbpqj);


include('../template/piecelu.php'); ?>