<?php include('../../f54du60ig65.php');
include('../../template/cabezalcelu.php');


$fechadecod = $fechahoy;




$fechaexplo = explode("-", $fechadecod);
$diaymes = $fechaexplo[2] . "/" . $fechaexplo[1];

$fechats = strtotime($fechadecod);
$dayver = date('w', $fechats);

$diaselec = $fechaexplo[2];

//extrigo nombre de la camioneta
$sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM camionetas Where id = ' $idcamioneta'");
if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
    $nombrecamio = $rowcamionetas["nombre"];
    $idcamioneta = $rowcamionetas["id"];
}
//




if (!empty($diaselec)) {
    if ($dayver == '1') {
        $activla1 = "active";
        $selectearial1 = "true";
        $dianombr = "Lunes";
        $diasql = "position1";
    } else {
        $selectearial1 = "false";
    }
    if ($dayver == '2') {
        $activla2 = "active";
        $selectearial2 = "true";
        $dianombr = "Martes";
        $diasql = "position2";
    } else {
        $selectearial2 = "false";
    }
    if ($dayver == '3') {
        $activla3 = "active";
        $selectearial3 = "true";
        $dianombr = "Miercoles";
        $diasql = "position3";
    } else {
        $selectearial3 = "false";
    }
    if ($dayver == '4') {
        $activla4 = "active";
        $selectearial4 = "true";
        $dianombr = "Jueves";
        $diasql = "position4";
    } else {
        $selectearial4 = "false";
    }
    if ($dayver == '5') {
        $activla5 = "active";
        $selectearial5 = "true";
        $dianombr = "Viernes";
        $diasql = "position5";
    } else {
        $selectearial5 = "false";
    }
    if ($dayver == '6') {
        $activla6 = "active";
        $selectearial6 = "true";
        $dianombr = "Sábados";
        $diasql = "position6";
    } else {
        $selectearial6 = "false";
    }
    if ($dayver == '0') {
        $activla0 = "active";
        $selectearial0 = "true";
        $dianombr = "Domingos";
        $diasql = "position0";
    } else {
        $selectearial5 = "false";
    }
}





?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    function ajax_buscar(buscar,fechaorden) {
        var parametros = {
            "buscar": buscar,
            "fechaorden": fechaorden

        };
        $.ajax({
            data: parametros,
            url: 'buscarremito.php',
            type: 'POST',
            beforeSend: function() {
                $("#resultadobuscar").html('<img src="../../assets/images/loader.gif"style="width: 60px; height:60px;">');
            },
            success: function(response) {
                $("#resultadobuscar").html(response);
            }
        });
    }
</script>

<style>
    a {
        color: black;
    }
</style>

<div class="contentbar">


    <div class="col-lg-12">


        <div class="row">
            <div class="card m-b-30" style="width:100%;">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-12">


                            <input type="date" id="fechaorden" name="fechaorden" value="<?= $fechahoy ?>"  
                            onkeyup="ajax_buscar($('#buscar').val(),$('#fechaorden').val());"
                            onChange="ajax_buscar($('#buscar').val(),$('#fechaorden').val());" 
                            onKeyPress="ajax_buscar($('#buscar').val(),$('#fechaorden').val());" 
                            onKeyDown="ajax_buscar($('#buscar').val(),$('#fechaorden').val());" 
                            onKeyUp="ajax_buscar($('#buscar').val(),$('#fechaorden').val());" 
                            
                            
                            class="form-control" />
                        </div>
                        <div class="col-md-12 col-lg-12">


                            <input type="text" id="buscar"  name="buscar" placeholder="Buscar Cliente/Remito" onkeyup="ajax_buscar($('#buscar').val(),$('#fechaorden').val());return false;" class="form-control" />
                        </div>
                      

                    </div>  
              
            </div>     
            
             <div class="col-md-12 col-lg-12">

                            <div id="resultadobuscar">
                            </div>

                        </div>
                </div>
        </div>


    </div>




</div>
<!-- End col -->






</div>








<?php include('../../template/piecelu.php');
?>

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>