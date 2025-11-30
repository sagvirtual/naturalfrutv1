<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');

/* agregar */
$idproedit=$_GET['idproedit'];
$id_pallet=$_GET['id_pallet'];
$modbaja=$_GET['modbaja'];

if($modbaja=='1' || $modbaja=='3'){$nover='style="display:none;"';}

$error=$_GET['error'];
$odoin=$_GET['odoin'];
 if(!$idproedit){
 $productods=$_GET['producto'];

 $productod=explode("@",$productods);
 $producto = preg_replace('/\s+/', ' ', $productod[0]);

 $unidsx = $productod[1];
 $ediyes='0';

 }else{
    
    $sqen = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$idproedit'");
    if ($rowod = mysqli_fetch_array($sqen)) {
             
             $nodrevpro=$rowod["nombre"];
             $kildpro=$rowod["kilo"];
            }
            $producto=$nodrevpro;
    
    $unidsx=$_GET['idproedit']; $ediyes='1';}


    $id_palletb = substr($id_pallet, 0, 12);
    $rowrdep = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito where id_pallet='$id_palletb' and fin='0'");
    if ($rowrdep = mysqli_fetch_array($rowrdep)) {
        $id_palletv=$rowrdep['id_pallet'];
        $id_destiins=$rowrdep['id_destino'];
        $fecha_ing=$rowrdep['fecha_ing'];
        $fecha_venc=$rowrdep['fecha_venc'];

        $fecha_encar=$rowrdep['fecha_encar'];
        $encarpado=$rowrdep['encarpado'];
        if($encarpado=='0'){$encarpador='1';$botonnom='Encarpar';$fecha_encar=$fechahoy;}else{$encarpador='0';$botonnom='Quitar Encarpado'; $nodver='style="display:none;"';}
        if($rowrdep['fecha_encar']!='0000-00-00' && $encarpado=='1'){$hitorienca='
            <div class="alert alert-success">
                <strong>'."
            
            Utimo encarpado: ".date('d/m/Y', strtotime($fecha_encar))."</strong>
                </div>";}
        if($fecha_ing==""){$fecha_ing=$fechahoy;}
       // if($fecha_ing==$fecha_venc || "3000-00-00"==$fecha_venc){$fecha_venc="0000-00-00";}
        $blockpallet="disabled";

                 
        $sqldub = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi where codigo='$id_destiins'");
        if ($rowrubrnom = mysqli_fetch_array($sqldub)) {$nombreubi=$rowrubrnom['nombre'];}

     }
     if($odoin=='2'){$blainp='disabled';}
?>

 <!DOCTYPE html>


<html lang="es">

<head>
    <title>Sistema de Gestión Deposito </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>

<body>




    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Gestión Deposito&nbsp;&nbsp; Usuario:&nbsp;<strong> <?=$nombrenegocio?> </p>
    </div>

  
    <div class="container">

        <div class="row">
         
                <div class="col-lg-12" style="padding-top: 10px;">
                <input type="hidden"  class="form-control" id="numero"  name="numero" value="999">
                                <input type="hidden"  class="form-control" id="cantidad"  name="cantidad" value="999">
                                <input type="hidden"  class="form-control" id="unidad"  name="unidad" value="999">
                                <input type="hidden"  class="form-control" id="suminstr"  name="suminstr" value="999">
                                <input type="hidden"  class="form-control" id="id_deposito"  name="id_deposito" value="<?=$id_destiins?>">
                                
                               
                        <?php
        
                            
                            $sqwen = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$unidsx'");
                            if ($rowod = mysqli_fetch_array($sqwen)) {
                                     
                                     $nombrevpro=$rowod["nombre"];
                                    }

                         

                            ?> 
                            
                            <input type="text"  class="form-control" id="producto" name="producto" value="<?=$nombrevpro?>" disabled>
                            
                            
                            <?php if($unidsx!=''){
                             
                           /*  if($codigo=='0' || $ediyes=='1' && $odoin=='3'){ */
                             
                            ?><br>
                            <div class="input-group">
                                <span class="input-group-text" style="width: 120px;">Pallets Cod.</span>
                                <input type="number" min="13"  max="13" class="form-control" id="id_pallet"  name="id_pallet" value="<?=$id_palletv?>" 
                                oninput="ajax_pallets($('#id_pallet').val());" autocomplete="off" <?=$blockpallet?>>
                            <script>
                                document.getElementById('id_pallet').focus();
                            </script>
                            </div>

<!-- manual -->
<!-- <div class="input-group">
                                <span class="input-group-text" style="width: 120px;">Cod. Manual</span>
                                <input type="number" min="13"  max="13" class="form-control" id="codmanual"  name="codmanual">
                                <button class="btn btn-success"  onclick="ajax_pallets($('#codmanual').val());" >OK</button>
                                </div> -->
                            <?php
                          /*   } */?>
                           
<div id="muestroorden4"></div>
<div id="muestroorden5"></div>
<div id="muestroorden7"></div>

<!--<br> <div class="input-group">
                                <span class="input-group-text" style="width: 120px;">Lug.</span>
                                <select class="form-control" name="" id="" onchange="ajax_focusdes()"> -->
                               
                                <?php
                                 
                 /*                 $sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi  ORDER BY `position` ASC");
                                 while ($rowrubros = mysqli_fetch_array($sqlrubros)) {

                                    $codigopalle=$rowrubros['codigo'];

                                    $sqwf=${"sqwf".$codigopalle};
                                    $rowod=${"rowod".$codigopalle};
                                            
                            $sqwf = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito Where id_destino='$codigopalle' and fin='0'");
                            $canverificafin = mysqli_num_rows($sqwf);
                          echo ' <option value>'.$rowrubros['nombre'].' ('.$canverificafin.')</opcion>';
                                 } */
                                ?>
                        <!--      </select>
                             </div> -->
                             <?php
                              
                             if($error=='2'){
                                echo '<br><div class="alert alert-danger text-center">
                                    <h1><strong>No se puede!</strong></h1>El codigo ya fue utilizado por otro producto.</a>.
                                    </div>';
                             }
                             if($error=='3'){
                                echo '<br><div class="alert alert-danger text-center">
                                    <h1><strong>No se puede!</strong></h1>El codigo no esta Habilitado.</a>.
                                    </div>';
                             }
                              
                             ?>
                            <?php
                             
                             //if($id_destino!='0' && $odoin!='2' ){
                             if($id_destiins!='0' && $odoin!='2'){
                              
                             ?>     <br>          
                            <div class="input-group">
                            <span class="input-group-text">Ubic.</span>
                            <div  class="form-control">
                                
                            <b><?=$nombreubi?></b>
                            </div>
                            <a href="../deposito/ingreso.php?idproedit=<?=$unidsx?>&odoin=2&idproedit=<?=$unidsx?>&id_pallet=<?=$id_palletv?>'"> <span class="input-group-text"><img src="../assets/images/editar.png" style="height: 25px; width: auto;"></span></a>
                            </div>
                          
                            <?php
                             
                              } 
                               //if($id_destino=='0' || $ediyes=='1' && $odoin=='2'){
                               if($id_destiins=='0' || $odoin=='2'){
                              
                             ?> <br>
                            <div class="input-group" <?=$nover?>>
                                <span class="input-group-text" style="width: 120px;">Ubicación</span>
                                <input type="text"  class="form-control" id="id_destino"  name="id_destino"  oninput="ajax_destino($('#id_destino').val());" autocomplete="off">
                    
                     <script>
                                document.getElementById('id_destino').focus();

                                function ajax_destino(id_destino) {
                                var parametros = {
                                    "id_destino": id_destino,
                                    "idproducto": '<?= $unidsx?>',
                                    "id_pallet": <?=$id_palletv?>
                                };
                                $.ajax({
                                    data: parametros,
                                    url: 'destino.php',
                                    type: 'POST',
                                    beforeSend: function() {
                                        $("#muestroorden5").html('');
                                    },
                                    success: function(response) {
                                        $("#muestroorden5").html(response);
                                    }
                                });
                            }
                            </script>
                         
                                
                            </div>


<?php
                             
                            }
                            
                           ?>

                            <br>

                            <div class="input-group" <?=$nover?>>
                                <span class="input-group-text" style="width: 120px;">Fecha Ingreso</span>
                                <input type="date"  class="form-control"  value="<?= $fecha_ing ?>"  disabled>
                                </div>   <br>
                                <div class="input-group" <?=$nover?>>
                                <span class="input-group-text" style="width: 120px;">Fecha Venc.</span>
                                <input type="date" id="fecha_venc" name="fecha_venc" class="form-control"  value="<?= $fecha_venc ?>" onchange="ajax_fechaven($('#fecha_venc').val())" <?=$blainp?>>
                                <?php
                             
                             //if($id_destino!='0' && $odoin!='2' ){
                             if($id_destiins!='0' && $odoin!='2' && $id_palletv!='' && $fecha_venc=='0000-00-00'){
                              
                             ?> 
                             
                                <script> document.getElementById('fecha_venc').focus(); 

                                var fechaVenc = document.getElementById('fecha_venc');
                                if (!fechaVenc.value){
                                    fechaVenc.focus();
                                  alert('El campo Fecha de vencimiento es obligatorio.');
                                }
                                </script>
                                
                                <?php
                             }
                              
                             ?> 
                                </div>   <br><div <?=$nover?>>
                                <div style="width: 100%; text-align:center;">
                                <img src="../deposito/estado0.png" style="width: 100px; "> 
                                </div>
                                </div>
                            <br> 
                              
                        
                            </div>
                           
                           

                          
                        <hr <?=$nover?>>     
            </div>
        </div>
   
    </div>  <div class="container" style="max-width: 360px;">
        <div class="row"> 
 <div class="col-12" style="padding-top: 10px;">
    <? if(!empty($id_palletv) && $modbaja=='1'){?>
  <a href="#" onclick="ajax_bajapall()" >
                    <button type="button" id="suminstr1" class="btn btn-danger" style="width: 100%;font-size: 30pt; font-weight: bold;">Dar de Baja</button>
                </a><br><br>  <br><br><?}?>    
                
                <? if(!empty($id_palletv) && $modbaja=='3'){?>
 
    <div class="input-group mb-3" <?=$nodver?>>

  <span class="input-group-text">Fecha Encarpado</span>

  <input type="date"id="fecha_encar" value="<?=$fecha_encar?>" class="form-control">
  
 
</div>  
                    <button type="button" id="suminstr1" class="btn btn-dark" style="width: 100%;font-size: 30pt; font-weight: bold;"  onclick="ajax_encarpar()"><?=$botonnom?></button>
         
                
                
                <br><?=$hitorienca?><br>  <br><br>
                
                <script>

function ajax_encarpar() {
                          var parametros = {
                              "fecha_encar": document.getElementById('fecha_encar').value,
                              "id_pallet": <?=$id_palletv?>,
                              "encarpado": <?=$encarpador?>
                          };
                          $.ajax({
                              data: parametros,
                              url: 'encarpado.php',
                              type: 'POST',
                              beforeSend: function() {
                                  $("#muestroorden4").html('');
                              },
                              success: function(response) {
                                  $("#muestroorden4").html(response);
                              }
                          });
                      }
</script>   
                
                
                <?}?>
            </div>



        <?if($fecha_venc!='0000-00-00'){?>    
        <div class="col-12" style="padding-top: 10px;">
                <a href="../deposito/index.php?idproedit=<?=$unidsx?>">
                    <button type="button" id="suminstr2" class="btn btn-success" style="width: 100%;">Atras</button>
                </a>
            </div> <? } ?>
 
            
           
        </div>
    </div><?}?>
                             <br><br>
                             <br><br>
                             <br><br>
    <div class="mt-5 p-4 text-center">
    <a href="../lusuarios/logincerrar.php"><button type="button" class="btn btn-secondary btn-xs btnGoToTop" >Cerrar usuario</button></a><br><br>
</div>

<script>
        function ajax_pallets(id_pallet) {
            var parametros = {
                "id_pallet": id_pallet,
                "idproducto": '<?= $unidsx?>',
                "nombre": '<?= $producto?>'
            };
            $.ajax({
                data: parametros,
                url: 'codific.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden4").html('');
                },
                success: function(response) {
                    $("#muestroorden4").html(response);
                }
            });
        }




</script>
<script>
                               

                                function ajax_fechaven(fecha_venc) {
                                var parametros = {
                                    "fecha_venc": fecha_venc,
                                    "idproducto": '<?= $unidsx?>',
                                    "id_pallet": <?=$id_palletv?>
                                };
                                $.ajax({
                                    data: parametros,
                                    url: 'vencimiento.php',
                                    type: 'POST',
                                    beforeSend: function() {
                                        $("#muestroorden7").html('');
                                    },
                                    success: function(response) {
                                        $("#muestroorden7").html(response);
                                    }
                                });
                            }
                            </script>


<script>
                               

                                function ajax_bajapall() {


// Muestra un cuadro de confirmación y guarda la respuesta del usuario
var userResponse = confirm("¿Estás seguro de que deseas Dar de baja?");

if (userResponse) {



                                var parametros = {
                                    "idproducto": '<?= $unidsx?>',
                                    "id_pallet": <?=$id_palletv?>
                                };
                                $.ajax({
                                    data: parametros,
                                    url: 'bajaoallet.php',
                                    type: 'POST',
                                    beforeSend: function() {
                                        $("#muestroorden7").html('');
                                    },
                                    success: function(response) {
                                        $("#muestroorden7").html(response);
                                    }
                                });}
                            }
                            </script>

                            <script>

function ajax_focusdes() {

    document.getElementById('id_destino').focus();
}
                            </script>
    <script>
        // Función que se ejecuta cuando se carga la página
        window.onload = function() {
            // Deshabilita la posibilidad de volver atrás usando la caché del navegador
            window.history.pushState(null, "", window.location.href);
            window.onpopstate = function() {
                // Cuando se intenta volver atrás, redirige de nuevo a esta página
                window.history.pushState(null, "", window.location.href);
            };
        };
    </script>

</body>

</html>