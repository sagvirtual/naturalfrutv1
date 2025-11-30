<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');
include('template/cabezal.php');

$sqlmarcasa = mysqli_query($rjdhfbpqj, "SELECT * FROM marcas Where whatsapp != ''");
while ($rowmarcasa = mysqli_fetch_array($sqlmarcasa)) {
    $whatsappa = $rowmarcasa["whatsapp"];
    if (!empty($whatsappa)) {
        $whs = "1";
    }
}


$sqlmarcasad = mysqli_query($rjdhfbpqj, "SELECT * FROM marcas Where 'address' != ''");
while ($rowmarcasad = mysqli_fetch_array($sqlmarcasad)) {
    $addressa = $rowmarcasad["address"];
    if (!empty($addressa)) {
        $andr = "1";
    }
}

?>
<link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="ri-stack-line"></i> Listado de Marcas</h4>


        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/lmarcas"><button class="btn btn-primary"><i class="ri-stack-line"></i> Agregar
                        Marca</button></a>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        document.getElementById('gananciaa1').select();
    }
</script>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-8">
            <div class="card m-b-30">

                <div class="card-body">

                <table id="default-datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre Marca</th>
                                <th>% Descuento</th>
                                <th>% Aumento Temporal</th>
                                <th>Productos</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                    <tbody>
                    <?php


$sqlmarcas = mysqli_query($rjdhfbpqj, "SELECT * FROM marcas  ORDER BY `marcas`.`empresa` ASC");
while ($rowmarcas = mysqli_fetch_array($sqlmarcas)) {
    $id = $rowmarcas["id"];
    $idcod = base64_encode($id);
    $idfila = 1 + $idfila;
    $empresa = $rowmarcas["empresa"];
    $whatsapp = $rowmarcas["whatsapp"];
    $telefono = $rowmarcas["telefono"];
    $email = $rowmarcas["email"];
    $web = $rowmarcas["web"];
    $estado = $rowmarcas["estado"];
    $tipo = $rowmarcas["tipo"];
    if ($tipo == '0') {
        $tipocal = "$";
    } else {
        $tipocal = "%";
    }
    $gananciaa = $rowmarcas["gananciaa"];
    $gananciab = $rowmarcas["gananciab"];
    $gananciac = $rowmarcas["gananciac"];
    $address = $rowmarcas["address"];
    if ($estado == '1') {
        $colorestado = 'background-color: #ffe6e6;';
    } else {
        $colorestado = 'background-color:white;';
    }
    $idfilas = $idfila + 1;
    //muestro los <tr>
    echo '
    <tr>
        <td>' . $rowmarcas["empresa"] . '';
                                                                //update
                                                                echo '	<span id="resultado' . $rowmarcas["id"] . '"></span>
                                                                    
                                                                    <script> 
                                function realizaProceso' . $idfila . '(jfndhom, gananciaa, gananciab, gananciac){
                                        var parametros = {
                                                "jfndhom" : jfndhom,
                                            "gananciaa" : gananciaa,
                                            "gananciab" : gananciab,
                                            "gananciac" : gananciac,
                                        };
                                        $.ajax({
                                                data:  parametros,
                                                url:';
                                                                echo "'";
                                                                echo '/lmarcas/actuaparametros.php';
                                                                echo "'";
                                                                echo ',
                                                type:';
                                                                echo "'";
                                                                echo 'post';
                                                                echo "'";
                                                                echo ',
                                                beforeSend: function () {
                                                        $("#resultado' . $rowmarcas["id"] . '").html(';
                                                                echo "'";
                                                                echo '<div class="bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div>';
                                                                echo "'";
                                                                echo ');
                                                },
                                                success:  function (response) {
                                                        $("#resultado' . $rowmarcas["id"] . '").html(response);
                                                }
                                        });return;
                                }

                                </script> </td>';


                                                                //fin update 
                                                            



                                                                echo '

                               
                                  <td> 
                                <input type="hidden" class="form-control" name="inputNumber"  value="' . $tipocal . '" style="width:80px; border:0px;' . $colorestado . '">
                                <input name="jfndhom' . ' . $idfila . ' . '" type="hidden" id="jfndhom' . $idfila . '" value="' . $idcod . '">';

                                //ganancia a
                                echo '<input id="gananciaa' . $idfila . '" class="form-control" type="text" value="' . $rowmarcas["gananciaa"] . '" onkeyup="realizaProceso' . $idfila . '';
                                echo "($('#jfndhom" . $idfila . "').val(),$('#gananciaa" . $idfila . "').val(),$('#gananciab" . $idfila . "').val(),$('#gananciac" . $idfila . "').val());return false;";
                                echo '" style="width:80px"  onFocus="nextFocus' . $idfila . '(';
                                echo "'gananciab" . $idfila . "', 'gananciaa" . $idfila . "', 'gananciab" . $idfila . "'";
                                echo ')"</td>';
                              
   //ganancia b
   echo '<td> <input id="gananciab' . $idfila . '" class="form-control" type="text" value="' . $rowmarcas["gananciab"] . '" onkeyup="realizaProceso' . $idfila . '';
   echo "($('#jfndhom" . $idfila . "').val(),$('#gananciaa" . $idfila . "').val(),$('#gananciab" . $idfila . "').val(),$('#gananciac" . $idfila . "').val());return false;";
   echo '" style="width:80px"  onFocus="nextFocus' . $idfila . '(';
   echo "'gananciac" . $idfila . "', 'gananciab" . $idfila . "', 'gananciac" . $idfila . "'";
   echo ')"</td>';
   echo " <td><script>
   function nextFocus" . $idfila . "(inputA" . $idfila . ", inputF" . $idfila . ", inputS" . $idfila . ") {

   document.getElementById(inputF" . $idfila . ").addEventListener('keydown', function(event) {
       
       
       if (event.keyCode == 13) {
       document.getElementById(inputS" . $idfila . ").select();
       
       }
       if (event.keyCode == 40) {
       document.getElementById(inputS" . $idfila . ").select();
       
       }
               if (event.keyCode == 38) {
       document.getElementById(inputA" . $idfila . ").select();
       
       }
   });
   } </script>";
$sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos WHERE id_marcas=' $id'");
if ($rowproductos = mysqli_fetch_array($sqlproductos)) {
echo '
<a href="/productos?productos=jhijdba&nombrepro=' . $rowmarcas["empresa"] . '" target="_parent"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleStandardModal"><i class="ion ion-ios-eye"></i> Ver</button></a></td>';
}
echo '
<td>
    <div class="button-list">

        <a href="/lmarcas/?jfndhom=' . $idcod . '" target="_parent" class="btn btn-success-rgba" title="Editar Marcas"><i class="ri-pencil-line"></i></a>';
                                //aca me fijo si hay productos anula el boton borrar
                                $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos WHERE id_marcas=' $id'");
                                if ($rowproductos = mysqli_fetch_array($sqlproductos)) {
                                } else {

                                    echo '  <a href="javascript:eliminar(' . "'/lmarcas/mlkdths?" . 'juhytm=' . $idcod . '' . "'" . ')" class="btn btn-danger-rgba">  <i class="ri-delete-bin-3-line"></i></a>';
                                }


                                echo ' </div>
</td>';
echo'</tr>
';
}

?>
                       
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        
        <?php include ('template/pie.php'); ?> 
   