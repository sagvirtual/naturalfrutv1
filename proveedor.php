<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');
include('template/cabezal.php');
$buscar = $_POST['buscar'];

$sqlproveedoresa = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where whatsapp != ''  and rubro='0' ");
while ($rowproveedoresa = mysqli_fetch_array($sqlproveedoresa)) {
    $whatsappa = $rowproveedoresa["whatsapp"];
    if (!empty($whatsappa)) {
        $whs = "1";
    }
}


$sqlproveedoresad = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where 'address' != ''  and rubro='0'");
while ($rowproveedoresad = mysqli_fetch_array($sqlproveedoresad)) {
    $addressa = $rowproveedoresad["address"];
    if (!empty($addressa)) {
        $andr = "1";
    }
}

?>


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-2 col-lg-2">
            <h4 class="page-title"><i class="dripicons-user-group"></i>Proveedores Mercadería</h4>


        </div>

        <div class="col-md-4 col-lg-4">

            <form action="" method="post">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Name</label>
                        <input type="text" class="form-control mb-2" id="buscar" name="buscar" placeholder="Buscar"
                            style="width: 300px;">
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-primary">
                                    Buscar
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="widgetbar">

                <a href="proveedoresvarios"><button class="btn btn-dark"><i class="dripicons-user-group"></i>
                        Ir a Proveedores Varios</button></a>
                <a href="/lproveedores/?tipoproveedor=0"><button class="btn btn-primary"><i class="dripicons-user-group"></i> Agregar

                        Proveedor Mercadería</button></a>
            </div>
        </div>



    </div>
</div>

</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar" style="position:relative; top:-100px;">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre Proveedor</th>


                                    <?php

                                    if ($andr == '1') {
                                        echo '<th>Dirección</th>';
                                    }

                                    ?>

                                    <?php

                                    if ($whs == '1') {
                                        echo '<th>WhatsApp</th>';
                                    }

                                    ?>





                                    <th style="text-align: center;">Banco</th>
                                    <th style="text-align: center;">IIBB BS AS</th>
                                    <th style="text-align: center;">IIBB CABA</th>
                                    <th style="text-align: center;">PERC. IVA</th>
                                    <th style="text-align: center;">IVA</th>

                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>

                                <script>
                                    window.onload = function() {
                                        document.getElementById('gananciaa1').select();
                                    }
                                </script>
                                <?php



                                $sqlproveedores = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores  Where  empresa LIKE '%$buscar%'  and rubro='0' ORDER BY `proveedores`.`empresa` ASC");
                                while ($rowproveedores = mysqli_fetch_array($sqlproveedores)) {
                                    $id = $rowproveedores["id"];
                                    $idcod = base64_encode($id);
                                    $idfila = 1 + $idfila;
                                    $empresa = $rowproveedores["empresa"];
                                    $whatsapp = $rowproveedores["whatsapp"];
                                    $telefono = $rowproveedores["telefono"];
                                    $email = $rowproveedores["email"];
                                    $web = $rowproveedores["web"];
                                    $estado = $rowproveedores["estado"];
                                    $tipo = $rowproveedores["tipo"];
                                    if ($tipo == '0') {
                                        $tipocal = "$";
                                    } else {
                                        $tipocal = "%";
                                    }
                                    $gananciaa = $rowproveedores["gananciaa"];
                                    $gananciab = $rowproveedores["gananciab"];
                                    $gananciac = $rowproveedores["gananciac"];
                                    $address = $rowproveedores["address"];


                                    //impuestos
                                    $iibb_bsas = $rowproveedores["iibb_bsas"];
                                    $iibb_caba = $rowproveedores["iibb_caba"];
                                    $perc_iva = $rowproveedores["perc_iva"];
                                    $iva = $rowproveedores["iva"];

                                    $razonsocial1 = $rowproveedores["razonsocial1"];
                                    $razonsocial2 = $rowproveedores["razonsocial2"];
                                    $razonsocial3 = $rowproveedores["razonsocial3"];
                                    $razonsocial4 = $rowproveedores["razonsocial4"];
                                    $razonsocial5 = $rowproveedores["razonsocial5"];

                                    $cuit1 = $rowproveedores["cuit1"];
                                    $cuit2 = $rowproveedores["cuit2"];
                                    $cuit3 = $rowproveedores["cuit3"];
                                    $cuit4 = $rowproveedores["cuit4"];
                                    $cuit5 = $rowproveedores["cuit5"];

                                    $cbu1 = $rowproveedores["cbu1"];
                                    $cbu2 = $rowproveedores["cbu2"];
                                    $cbu3 = $rowproveedores["cbu3"];
                                    $cbu4 = $rowproveedores["cbu4"];
                                    $cbu5 = $rowproveedores["cbu5"];

                                    $alias1 = $rowproveedores["alias1"];
                                    $alias2 = $rowproveedores["alias2"];
                                    $alias3 = $rowproveedores["alias3"];
                                    $alias4 = $rowproveedores["alias4"];
                                    $alias5 = $rowproveedores["alias5"];

                                    $orden = $rowproveedores["orden"];


                                    if (!empty($cbu1) || !empty($alias1) &&  $orden == 1) {
                                        $datoban1 = '<textarea id="fot1' . $id . '" style="display:none">' . $cbu1 . '</textarea>
                                        Banco: ' . $razonsocial1 . '<br>
                                        Nº Cuenta: ' . $alias1 . '<br>
                                        CUIT: ' . $cuit1 . '<br>
                                        CBU: ' . $cbu1 . '  <button type="button" class="btn btn-secondary  btn-sm" onclick="copyToClipboard(' . $comilla . '#fot1' . $id . '' . $comilla . ')"> Copiar CBU</button>
                                        <br><br>';
                                    } else {
                                        $datoban1 = '';
                                    }


                                    if (!empty($cbu2) || !empty($alias2) && $orden == 2) {
                                        $datoban2 = ' <textarea id="fot2' . $id . '" style="display:none">' . $cbu2 . '</textarea>
                                        Banco: ' . $razonsocial2 . '<br>
                                        CUIT: ' . $cuit2 . '<br>
                                         Nº Cuenta: ' . $alias2 . '<br>
                                        CBU: ' . $cbu2 . '
                                         <br>  <button type="button" class="btn btn-secondary  btn-sm" onclick="copyToClipboard(' . $comilla . '#fot2' . $id . '' . $comilla . ')"> Copiar CBU</button>
                                        <br><br>';
                                    } else {
                                        $datoban2 = '';
                                    }

                                    if (!empty($cbu3) || !empty($alias3) && $orden == 3) {
                                        $datoban3 = ' <textarea id="fot3' . $id . '" style="display:none">' . $cbu3 . '</textarea>
                                        Banco: ' . $razonsocial3 . '<br>
                                         Nº Cuenta: ' . $alias3 . '<br>
                                        CUIT: ' . $cuit3 . '<br>
                                        CBU: ' . $cbu3 . '<br> <button type="button" class="btn btn-secondary  btn-sm" onclick="copyToClipboard(' . $comilla . '#fot3' . $id . '' . $comilla . ')"> Copiar CBU</button>
                                        <br><br>';
                                    } else {
                                        $datoban3 = '';
                                    }

                                    if (!empty($cbu4) || !empty($alias4) && $orden == 4) {
                                        $datoban4 = ' <textarea id="fot4' . $id . '" style="display:none">' . $cbu4 . '</textarea>
                                        Banco: ' . $razonsocial4 . '<br>
                                         Nº Cuenta: ' . $alias4 . '<br>
                                        CUIT: ' . $cuit4 . '<br>
                                        CBU:' . $cbu4 . '<br><button type="button" class="btn btn-secondary btn-sm" onclick="copyToClipboard(' . $comilla . '#fot4' . $id . '' . $comilla . ')"> Copiar CBU</button>
                                        
                                        <br><br>';
                                    } else {
                                        $datoban4 = '';
                                    }


                                    if (!empty($cbu5) || !empty($alias5) && $orden == 5) {
                                        $datoban5 = ' <textarea id="fot5' . $id . '" style="display:none">' . $cbu5 . '</textarea>
                                        Banco: ' . $razonsocial5 . '<br>
                                         Nº Cuenta: ' . $alias5 . '<br>
                                        CUIT: ' . $cuit5 . '<br>
                                        CBU:' . $cbu5 . '<br> <button type="button" class="btn btn-secondary" onclick="copyToClipboard(' . $comilla . '#fot5' . $id . '' . $comilla . ')"> Copiar CBU</button>
                                    
                                        <br><br>';
                                    } else {
                                        $datoban5 = '';
                                    }


                                    if ($estado == '1') {
                                        $colorestado = 'background-color: #ffe6e6;';
                                    } else {
                                        $colorestado = 'background-color:white;';
                                    }

                                    //update
                                    echo '	<span id="resultado' . $rowproveedores["id"] . '"></span></td>';

                                    echo '        <script> 
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
                                    echo '/lproveedores/actuaparametros.php';
                                    echo "'";
                                    echo ',
                                            type:';
                                    echo "'";
                                    echo 'post';
                                    echo "'";
                                    echo ',
                                            beforeSend: function () {
                                                    $("#resultado' . $rowproveedores["id"] . '").html(';
                                    echo "'";
                                    echo '<div class="bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div>';
                                    echo "'";
                                    echo ');
                                            },
                                            success:  function (response) {
                                                    $("#resultado' . $rowproveedores["id"] . '").html(response);
                                            }
                                    });return;
                            }

                            </script>';


                                    //fin update 




                                    //muestro los <tr>
                                    echo '
                                    <tr style="' . $colorestado . '">
                                    <td scope="row">#' . $rowproveedores["id"] . '</td>
                                    <td style="color: black;">' . $rowproveedores["empresa"] . '</td>';

                                    if ($andr == '1') {
                                        echo '<td>';
                                        if (!empty($rowproveedores["address"])) {
                                            echo '<a href="https://www.google.com.ar/maps/place/' . $rowproveedores["address"] . '" target="blank"> <i class="socicon-googlemaps"></i> ' . $rowproveedores["address"] . '</a>';
                                        }
                                        echo '
                                        </td>';
                                    }

                                    if ($whs == '1') {
                                        echo '<td>';
                                        if (!empty($rowproveedores["whatsapp"])) {
                                            echo '<a href="https://api.whatsapp.com/send?phone=54' . $rowproveedores["whatsapp"] . '&text=Hola" target="_blank"><i class="socicon-whatsapp"></i> ' . $rowproveedores["whatsapp"] . '</a>';
                                        }
                                        echo '</td>';
                                    }

                                    echo '
                                    <td>';
                                    if ($orden == '1' || $orden == '0') {
                                        echo '' . $datoban1 . '';
                                    }
                                    if ($orden == '2') {
                                        echo '' . $datoban2 . '';
                                    }
                                    if ($orden == '3') {
                                        echo '' . $datoban3 . '';
                                    }
                                    if ($orden == '4') {
                                        echo '' . $datoban4 . '';
                                    }
                                    if ($orden == '5') {
                                        echo '' . $datoban5 . '';
                                    }

                                    echo '</td>
                                    
                                    
                                    
                                    ';
                                    echo '

                                        <td style="color:black; text-align: center;"> 


                                        ' . $rowproveedores["iibb_bsas"] . '%
                                        <input name="jfndhom' . ' . $idfila . ' . '" type="hidden" id="jfndhom' . $idfila . '" value="' . $idcod . '">
                                        <input type="hidden"  name="inputNumber"  value="' . $tipocal . '">
                                        
                                        </td>
                                        <td style="color:black; text-align: center;"> 


                                        ' . $rowproveedores["iibb_caba"] . '%
                                       
                                        
                                        
                                        </td>
                                        <td style="color:black; text-align: center;"> 


                                        ' . $rowproveedores["perc_iva"] . '%
                                       
                                        
                                        
                                        </td>
                                        <td style="color:black; text-align: center;"> 


                                        ' . $rowproveedores["iva"] . '%
                                       
                                        
                                        
                                        </td>




                                        <td>
                                            <div class="button-list">

                                                <a href="/lproveedores/?jfndhom=' . $idcod . '&tipoproveedor=0" target="_parent" class="btn btn-success-rgba" title="Editar Proveedor"><i class="ri-pencil-line"></i></a>';
                                    //aca me fijo si hay productos anula el boton borrar
                                    $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos WHERE id_proveedor='$id'");
                                    if ($rowproductos = mysqli_fetch_array($sqlproductos)) {
                                    } else {

                                        echo '  <a href="javascript:eliminar(' . "'/lproveedores/mlkdths?" . 'juhytm=' . $idcod . '' . "'" . ')" class="btn btn-danger-rgba">  <i class="ri-delete-bin-3-line"></i></a>';
                                    }


                                    echo ' </div>
                                        </td>
                                        </tr>
                                        ';
                                    //fin <tr>
                                }
                                mysqli_close($rjdhfbpqj);

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script language="JavaScript" type="text/JavaScript">
    function copyToClipboard(elemento) {
            var $temp = $("<textarea>");
            $("body").append($temp);
            $temp.val($(elemento).text()).select();
            document.execCommand("copy");
            $temp.remove();
            
            // Mostrar el mensaje "Dato copiado"
            var mensaje = document.getElementById("mensajeCopiado");
            mensaje.style.display = "block";
            
            // Ocultar el mensaje después de 2 segundos
            setTimeout(function() {
                mensaje.style.display = "none";
            }, 2000);
        }
    </script>


<?php include('template/pie.php'); ?>