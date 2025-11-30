<?php include('../f54du60ig65.php');
include('../template/cabezalcelu.php');

$idorden = base64_decode($_GET['jfndhom']);
$IdProducto = base64_decode($_GET['jjdfngh']);


$sqlitem_ordendis = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idorden'  and id_producto='$IdProducto'");
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
        <a href="remito?jfndhom=<?= $_GET['jfndhom'] ?>">
            <h2 class="card-title"><strong>Remito Nº<?= $idorden ?></strong></h2>
        </a>
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
                                        <button class="btn btn-light" type="button" id="button-addon1">KILOS</button>
                                    </div>
                                    <input type="number" name="kilos" id="kilos" class="form-control" style="font-weight: bold; color:black; font-size:30pt;" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?= $kilos ?>" max="<?= $kilos ?>" min="1" onclick="select()" require>
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
        <div class="row" id='ocultar-y-mostrar'>
            <div class="col-lg-12" style="background-color: #ffffff; width:100%;">
                <div style="padding-bottom: 10px; padding-top:10px;">
                    <button type="button" class="btn btn-success btn-lg btn-block" onclick="ajax_carga($('#id_producto').val(), $('#idorden').val(), $('#kilos').val());" style="font-size:20pt; padding-bottom: 10px; padding-top:10px; height:100px;"><b>CONFIRMAR</b></button>

                </div>


            </div>
            <br>
        </div>
        <div id="muestrocarga"></div>



        <div class="row">
            <div class="col-lg-12" style="background-color: #ffffff; width:100%;">

                <div style="padding-bottom: 10px; padding-top:10px;">
                    <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <button type="button" class="btn btn-danger btn-lg btn-block" id='ocultar-mostrar'><b>NO ENTREGADO</b></button>
                    </a>
                </div>
                <div class="collapse" id="collapseExample">




                    <fieldset class="form-group">
                        <div class="row">


                            <div class="col-sm-8">
                                <div class="form-check" style="font-weight: bold; color:black; font-size:15pt; padding-bottom:10px;padding-top:10px;">
                                    <input class="form-check-input" type="radio" name="gridRadios1" id="gridRadios1" value="1">
                                    <label class="form-check-label" for="gridRadios1">
                                        Producto Faltante
                                    </label>
                                </div>
                                <div class="col-auto">
                                <select class=" form-control" name="id_productof" id="id_productof">

<?php
 echo '<option value="' . $_GET['jjdfngh'] . '|' . $_GET['jjdfngh'] . '">' . $nombreprod . ' </option>';

$sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias Where estado = '0' ORDER BY `categorias`.`position` ASC");
while ($rowcategorias = mysqli_fetch_array($sqlcategorias)) {
    $id_categoria = $rowcategorias["id"];
    $nombrecate = strtoupper($rowcategorias["nombre"]);
    $sqlproductosr = ${"sqlproductos" . $id_categoria};
    $rowproductos = ${"rowproductos" . $id_categoria};




    $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' ");
    if ($rowproductos = mysqli_fetch_array($sqlproductosr)) {

        $fracionado = $rowproductos["fracionado"];
        $kilosv = $rowproductos["kilos"];
        if ($fracionado == "0") {
            $fraci = 'step="' . $rowproductos["kilos"] . '" min="' . $rowproductos["kilos"] . '"';
        }

       

        //mcargo productos      

        $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' ORDER BY `productos`.`position` ASC");

        while ($rowproductos = mysqli_fetch_array($sqlproductosr)) {
           

            echo '<option value="' . base64_encode($rowproductos["id"]) . '|'.$_GET['jjdfngh'].'">' . $rowproductos["nombre"] . ' </option>';
        }

        //fin producto


    }
}

?>

</select>
                                </div><br>
                                <div class="form-check" style="font-weight: bold; color:black; font-size:15pt;">
                                    <input class="form-check-input" type="radio" name="gridRadios1" id="gridRadios1" value="2">
                                    <label class="form-check-label" for="gridRadios2">
                                        No lo pidio/No lo quiere
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nota" placeholder="Observación">
                            <input type="hidden" class="form-control" id="noenterga" value="1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary btn-block" onclick="ajax_cargadev($('#id_productof').val(), $('#idorden').val(), $('#kilos').val(), $('input:radio[name=gridRadios1]:checked').val(), $('#nota').val(), $('#noenterga').val());">Enviar</button>
                        </div>
                    </div>

                </div>
            </div>





            <!-- End col -->
        </div>
    </div>
</div>

<script src="ajax_remito.js"></script>
<script src="ajax_remito_dev.js"></script>

<script>
    window.addEventListener('load', inita, false);

    function inita() {
        let div = document.querySelector('#ocultar-y-mostrar');
        div.style.display = 'block';
        let boton = document.querySelector('#ocultar-mostrar');
        boton.addEventListener('click', function(e) {
            if (div.style.display === 'block') {
                div.style.display = 'none';
            } else {
                div.style.display = 'block';
            }
        }, false);
    }
</script>




<?php
mysqli_close($rjdhfbpqj);


include('../template/piecelu.php'); ?>