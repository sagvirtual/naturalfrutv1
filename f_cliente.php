<?php include('f54du60ig65.php');
include('template/cabezal.php');


$idclientecod=$_GET['jfndhdsccliom'];
$rubrocod=$_GET['jfndhom'];
$id_client=base64_decode($idclientecod);
$idrubror=base64_decode($rubrocod);






$sqlrubros=mysqli_query($rjdhfbpqj,"SELECT * FROM rubros Where id = '$idrubror'");
if ($rowrubros = mysqli_fetch_array($sqlrubros)){

$nombrerubro = $rowrubros["nombre"];
$position = $rowrubros["position"];
}





$sqlclientes=mysqli_query($rjdhfbpqj,"SELECT * FROM clientes Where id = '$id_client'");
if ($rowclientes = mysqli_fetch_array($sqlclientes)){
$nom_empr = $rowclientes["nom_empr"];
$nom_contac = $rowclientes["nom_contac"];
$address = $rowclientes["address"];
}





$comillas='"';
?>


<link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet">
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="ri-stack-line"></i> Productos en el rubro <?=$nombrerubro?> ->  <?=$address?></h4>


        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/lclientes/?jnnfsc=<?=$idclientecod?>"><button class="btn btn-primary"><i class="sl-icon-people"></i> Volder al Cliente</button></a>
            </div>
        </div>
    
    </div>
</div>
<style>
  .custom-input {
    /* Estilos para el campo de entrada */
  }

  .custom-input:disabled {
    /* Estilos para el campo de entrada cuando está deshabilitado */
    opacity: 0.5;
    cursor: not-allowed;
  }

  .boton-bloqueado {
  pointer-events: none;
  opacity: 0.5; /* Opcional: puedes reducir la opacidad para indicar visualmente que está desactivado */
}
</style>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-10">
            <div class="card m-b-30">
 
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre Producto</th>
                                    <th class="text-center">Fraccionado</th>
                                    <th >Kg. Venta Minima</th>
                                    <th >Kg. Fraccionado</th>
                                    <th >Reset</th>
                                </tr>
                            </thead>
                            <tbody>

                                <script>
                                    window.onload = function() {
                                        document.getElementById('gananciaa1').select();
                                    }
                                </script>
                                <?php 
                                $comillas = "'";

                                $sqlproductos=mysqli_query($rjdhfbpqj,"SELECT * FROM productos Where id_rubro$position = '1' ORDER BY `productos`.`position` ASC");
                                while ($rowproductos = mysqli_fetch_array($sqlproductos)){
                                $idproducto = $rowproductos["id"];
                                $codigo = $rowproductos["codigo"];
                                $categoria = $rowproductos["categoria"];
                                $id_proveedor = $rowproductos["id_proveedor"];
                                $nombreprod = $rowproductos["nombre"];
                                $detalle = $rowproductos["detalle"];
                                $file = $rowproductos["file"];
                                $fecha = $rowproductos["fecha"];
                                $id_marcas = $rowproductos["id_marcas"];
                                $anclaje = $rowproductos["anclaje"];
                                $id_rubro1 = $rowproductos["id_rubro1"];
                                $id_rubro2 = $rowproductos["id_rubro2"];
                                $id_rubro3 = $rowproductos["id_rubro3"];
                                $id_rubro4 = $rowproductos["id_rubro4"];
                                $id_rubro5 = $rowproductos["id_rubro5"];
                                $id_rubro6 = $rowproductos["id_rubro6"];
                                $id_rubro7 = $rowproductos["id_rubro7"];
                                $id_rubro8 = $rowproductos["id_rubro8"];
                                $id_rubro9 = $rowproductos["id_rubro9"];
                                $gananciasper = $rowproductos["gananciasper"];
                                $modo_producto = $rowproductos["modo_producto"];
                                $position = $rowproductos["position"];

                                $idfila = $idfila + 1;
                                $sqlf_categoria=mysqli_query($rjdhfbpqj,"SELECT * FROM f_categoria Where id_categoria = '$categoria' and id_rubro='$idrubror' and fracionado='1'");
                                if ($rowf_categoria = mysqli_fetch_array($sqlf_categoria)){
                                 //me fijo en la categoria
                                 $sqlf_rubror=${"sqlf_rubror".$idproducto};
                                 $rowf_rubror=${"rowf_rubror".$idproducto};
                                 $sqlf_rubror=mysqli_query($rjdhfbpqj,"SELECT * FROM f_rubro Where id_proveedor = '$id_proveedor' and id_rubro='$idrubror' and id_producto='$idproducto' and fracionado='1'");
                                     if ($rowf_rubror = mysqli_fetch_array($sqlf_rubror)){
                                        $ventaminma = $rowf_rubror["r_ventamin"];
                                         $fracionadopro = $rowf_rubror["r_fraccionado"];
                                     }else{
                                           //fraccion producto
                                 $fracionadopro = $rowproductos["fracionado"];
                                 $ventaminma = $rowproductos["ventaminma"];
                                 //
 
                                     }
                                 //
                                    }else{              //fraccion producto
                                        $fracionadopro = $rowproductos["fracionado"];
                                        $ventaminma = $rowproductos["ventaminma"];
                                        //
                                    }

                                $sqlf_rubro=${"sqlf_rubro".$idproducto};
                                $rowf_rubro=${"rowf_rubro".$idproducto};
                                $r_ventamin=${"r_ventamin".$idproducto};
                                $r_fraccionado=${"r_fraccionado".$idproducto};
                                $fracionado=${"fracionado".$idproducto};
                                $checked=${"checked".$idproducto};
                                $enlaceper=${"enlaceper".$idproducto};
                                $blacbotton=${"blacbotton".$idproducto};


                                $sqlprecioprodr=mysqli_query($rjdhfbpqj,"SELECT * FROM precioprod Where id_producto = '$idproducto'  and cerrado = '1' and confirmado = '1'  ORDER BY `precioprod`.`fecha` DESC");
                                if ($rowprecioprod = mysqli_fetch_array($sqlprecioprodr)){
                                    $kilo = $rowprecioprod["kilo"];}

                                    //busco valores

                                    $sqlf_rubro=mysqli_query($rjdhfbpqj,"SELECT * FROM f_cliente Where id_proveedor = '$id_proveedor' and id_rubro='$idrubror' and id_producto='$idproducto'  and id_cliente='$id_client'");
                                    if ($rowf_rubro = mysqli_fetch_array($sqlf_rubro)){
                                        $r_ventamin = $rowf_rubro["r_ventamin"];
                                        $r_fraccionado = $rowf_rubro["r_fraccionado"];
                                        $fracionado = $rowf_rubro["fracionado"];
                                        $inputbol='style="font-weight: bold; width:20mm"';

                                        if ($fracionado == '1') {
                                            $checked = "checked";
                                            $enlaceper = 'fraccionado';
                                            $anularb = '" ';
                                            $anularc = '" ';
                                        } else {
                                            $checked = "";
                                            $enlaceper = 'nofrac';
                                            $anularb = 'custom-input" disabled';
                                            $anularc = 'custom-input" disabled';
                                            $blacbotton=" boton-bloqueado";
                                        }




                                    }else{
                                        $r_ventamin = $ventaminma;
                                        $r_fraccionado = $fracionadopro;
                                        $inputbol='style="font-weight: normal; width:20mm;"';
                                        $checked = "checked";
                                        $anularb = '" ';
                                        $anularc = '" ';
                                    }




                                    //




                                       //update
                                       echo '	<span id="resultado' . $rowproductos["id"] . '"></span></td>';

                                       echo '        <script> 
   function realizaProceso' . $idfila . '(jfndhom, idproducto, gananciab, gananciac, id_proveedor, id_cliente, fracionado){
           var parametros = {
                   "jfndhom" : jfndhom,
                   "idproducto" : idproducto,
                 "gananciab" : gananciab,
                 "gananciac" : gananciac,
                 "id_proveedor" : id_proveedor,
                 "id_cliente" : id_cliente,
			  "fracionado" : fracionado
           };
           $.ajax({
                   data:  parametros,
                   url:';
                                       echo "'";
                                       echo '/cliente_fraccionado/actuaparametros.php';
                                       echo "'";
                                       echo ',
                   type:';
                                       echo "'";
                                       echo 'post';
                                       echo "'";
                                       echo ',
                   beforeSend: function () {
                           $("#resultado' . $rowproductos["id"] . '").html(';
                                       echo "'";
                                       echo '<div class="bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div>';
                                       echo "'";
                                       echo ');
                   },
                   success:  function (response) {
                           $("#resultado' . $rowproductos["id"] . '").html(response);
                   }
           });return;
   }
   
   </script>';
   
   
                                       //fin update 




                                    //muestro los <tr>
                                    echo '
                                    <tr>
                                    <td scope="row">' . $rowproductos["codigo"] . '</td>
                                    <td style="color: black;">' . $nombreprod . '&nbsp;x&nbsp;'.$kilo.'kg.</td>
                                    <td style="color: black;">
                                   
                                    <div class="custom-control custom-switch text-center">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch' . $idfila . '"  name="customSwitch' . $idfila . '" value="1" onchange="showInput' . $idfila . '()"
                                   ';




                                    echo'  
                                    onclick="realizaProceso' . $idfila . '';

                                    echo "($('#jfndhom" . $idfila . "').val(),$('#idproducto" . $idfila . "').val(),$('#gananciab" . $idfila . "').val(),$('#gananciac" . $idfila . "').val(),$('#id_proveedor" . $idfila . "').val(),$('#id_cliente" . $idfila . "').val(), $('input:checkbox[name=customSwitch" . $idfila . "]:checked').val());";





                                    echo '" ' . $checked . '>





                                    
                                    <label class="custom-control-label text-center" for="customSwitch' . $idfila . '"></label>                                            
                                    </div>


                                  
                                    

                                    <script>



                                    
                                        function showInput' . $idfila . '() {
                                            var selectValue = document.getElementById("customSwitch' . $idfila . '").checked;
                                            var extraInputDiv = document.getElementById("extraInput' . $idfila . '");
                                            var boton' . $idfila . ' = document.getElementById("botreset' . $idfila . '");

                                            var gananciab' . $idfila . ' = document.getElementById("gananciab' . $idfila . '" );
                                            var gananciac' . $idfila . ' = document.getElementById("gananciac' . $idfila . '" );
                                            

                                            if (selectValue) {
                                            
                                                gananciab' . $idfila . '.disabled = false;
                                                gananciac' . $idfila . '.disabled = false;
                                                boton' . $idfila . '.disabled = false;
                                                boton' . $idfila . '.style.opacity = "1";
                                                boton' . $idfila . '.style.cursor = "auto";
                                                boton' . $idfila . '.style.cursor = "pointer";
                                                boton' . $idfila . '.style.pointerEvents = "auto";
                                            } else {
                                            
                                                gananciab' . $idfila . '.disabled = true;
                                                gananciac' . $idfila . '.disabled = true;
                                                boton' . $idfila . '.disabled = true;
                                                boton' . $idfila . '.style.opacity = "0.5";
                                                boton' . $idfila . '.style.cursor = "not-allowed";
                                                boton' . $idfila . '.style.pointerEvents = "none";
                                            }
                                        }
                                    </script>
                                    </td>
                                    <td class="text-center"> 
                                    <input name="jfndhom' . $idfila .  '" type="hidden" id="jfndhom' . $idfila . '" value="' . $idrubror . '">
                                    <input name="id_cliente' . $idfila .  '" type="hidden" id="id_cliente' . $idfila . '" value="' . $id_client . '">
                                    <input name="id_proveedor' . $idfila .  '" type="hidden" id="id_proveedor' . $idfila . '" value="' . $id_proveedor . '">
                                    <input name="idproducto' . $idfila .  '" type="hidden" id="idproducto' . $idfila . '" value="' . $idproducto . '">
                                  
                                    
                                    <input id="gananciab' . $idfila . '" class="form-control '.$anularb.' type="text" '.$inputbol.' value=" '.$r_ventamin.'" onkeyup="realizaProceso' . $idfila . '';
                                    echo "($('#jfndhom" . $idfila . "').val(),$('#idproducto" . $idfila . "').val(),$('#gananciab" . $idfila . "').val(),$('#gananciac" . $idfila . "').val(),$('#id_proveedor" . $idfila . "').val(),$('#id_cliente" . $idfila . "').val(), $('input:checkbox[name=customSwitch" . $idfila . "]:checked').val());return false;";
                                    echo '" style="width:80px"  onFocus="nextFocus' . $idfila . '(';
                                    echo "'gananciac" . $idfila . "', 'gananciab" . $idfila . "', 'gananciac" . $idfila . "'";
                                    echo ')">
                                    
                                    
                                    
                                    </td>';


                                    

                                    //fraccionado
                                  

                                    echo '<td class="text-center"> <input id="gananciac' . $idfila . '" class="form-control '.$anularc.' type="text" '.$inputbol.' value="'.$r_fraccionado.'" onkeyup="realizaProceso' . $idfila . '';
                                    echo "($('#jfndhom" . $idfila . "').val(),$('#idproducto" . $idfila . "').val(),$('#gananciab" . $idfila . "').val(),$('#gananciac" . $idfila . "').val(),$('#id_proveedor" . $idfila . "').val(),$('#id_cliente" . $idfila . "').val(), $('input:checkbox[name=customSwitch" . $idfila . "]:checked').val());return false;";
                                    echo '" style="width:80px"  onFocus="nextFocus' . $idfilas . '(';
                                    echo "'gananciab" . $idfila . "', 'gananciac" . $idfila . "', 'gananciab" . $idfilas . "'";
                                    echo ')"></td>
                                    <td>
                                    <button type="button" id="botreset' . $idfila . '" class="btn btn-dark'.$blacbotton.'" onclick="establecerValor';

                                        //reset

                                        echo''.$idfila.'(); realizaProceso' . $idfila . '';
    
                                        echo "($('#jfndhom" . $idfila . "').val(),$('#idproducto" . $idfila . "').val(),$('#gananciab" . $idfila . "').val(),$('#gananciac" . $idfila . "').val(),$('#id_proveedor" . $idfila . "').val(),$('#id_cliente" . $idfila . "').val(), $('input:checkbox[name=customSwitch" . $idfila . "]:checked').val());return false;";
                                    
                                    echo'">Defecto</button></td>';
                                    echo "<script>
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
                                            } </script>
                                            
                                            <script>function establecerValor".$idfila."() {
                                                var input = document.getElementById(".$comillas."gananciab".$idfila."".$comillas.");
                                                input.value = ".$comillas."".$ventaminma."".$comillas.";
                                                var input = document.getElementById(".$comillas."gananciac".$idfila."".$comillas.");
                                                input.value = ".$comillas."".$fracionadopro."".$comillas.";
                                              }
                                              </script>
                                            
                                            
                                            ";

                                    echo '

<td>

</tr>
';
                                    //fin <tr> 
                                }
                              

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="/assets/plugins/switchery/switchery.min.js"></script>
        <?php include('template/pie.php'); ?>