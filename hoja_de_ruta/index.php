<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');


unset($_SESSION['hojaderut']);
unset($_SESSION['fecharepart']);
unset($_SESSION['idcliente']);
unset($_SESSION['idcamioneta']);

if(!empty($_POST['buscar'])){
    $_SESSION['fechabus'] = $_POST['buscar'];
}
//else{$_SESSION['fechabus'] = $_GET['buscar'];}



$buscar=$_SESSION['fechabus'];


if(empty($buscar)){$buscar = $fechahoy;}
if (isset($_POST['update'])) {
    foreach ($_POST['positions'] as $position) {
        $index = $position[0];
        $newPosition = $position[1];

        $rjdhfbpqj->query("UPDATE hoja SET position = '$newPosition' WHERE id='$index'");
    }

    exit('success');
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-2 col-lg-2">
            <h4 class="page-title"><i class="fa fa-file-text"></i> Hojas de Ruta </h4>


        </div>


        <div class="col-md-4 col-lg-2">
            <div class="input-group" style="background-color: white;">

                <input id="modobus" name="modobus" type="hidden">


            <form action="index.php"  id="miFormulario"  method="post">
                    
               
                    <input type="date" name="buscar" id="buscar" value="<?=$buscar?>" onchange="enviarformul();"   class="form-control">

                   </form>
                    

            </div>





        </div>


     <div class="col-md-2 col-lg-2">
        <a onclick="enviarformul()" style="cursor: pointer;">
                <h4 class="page-title"><i class="fa fa-file-text"></i> Buscar</h4>
            </a>



        </div>
        <div class="col-md-4 col-lg-4">
                                <div class="widgetbar" style="text-align: right;">
                                    <a href="print_hoja_de_ruta?hdnsbloekdjgsd=<?= base64_encode($buscar) ?>&ijkfndt=<?= $dayver ?>&hdnskdjjgsd=<?= $idcamcod ?>" target="_black" title="Imprimir hoja de ruta">
                                        <button class="btn btn-primary"><i class="dripicons-print"></i> Imprimir hoja de Ruta</button></a>
                                </div>
                            </div>
   

                </div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">

        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
       
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>Día</th>
                                    <th>Fecha</th>
                                    <th class="text-center">Carga</th>
                                    <th>Camioneta</th>
                                    <th>Chofer</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sqlhoja = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja Where fecha = '$buscar' ORDER BY `hoja`.`position` ASC Limit 10");
                                while ($rowhoja = mysqli_fetch_array($sqlhoja)) {
                                    $id = $rowhoja["id"];
                                    $idhoja = $rowhoja["id"];
                                    $enruta = $rowhoja["enruta"];
                                    $idcod = base64_encode($id);
                                    $fecha = $rowhoja["fecha"];
                                    $fechacod = base64_encode($fecha);
                                    $fin = $rowhoja["fin"];
                                    $camioneid = $rowhoja["camioneta"];
                                    $filasum = $filasum +1;
                                    
                                    $idchofer = $rowhoja["chofer"];
                                    $idcamcod = base64_encode($camioneid);

                                    if($rowhoja['position']=='0'){
                                        $sqlclied = "Update hoja Set position='$filasum' Where id = '$idhoja'";
                                        mysqli_query( $rjdhfbpqj, $sqlclied ) or die( mysqli_error( $rjdhfbpqj ) );
                                      }
                                      if($enruta==1){$selred1="selected"; $selred0="";
                                        }elseif($enruta==0){$selred0="selected"; $selred1="";}

                                    $fechav = explode("-", $fecha);
                                    $fechavr = $fechav[2] . "/" . $fechav[1] . "/" . $fechav[0];

                                    //extrigo nombre de la camioneta
                                    $sqlcamiodtas=mysqli_query($rjdhfbpqj,"SELECT * FROM usuarios Where id = ' $idchofer'");
                                    if ($rowcam23 = mysqli_fetch_array($sqlcamiodtas)){
                                    $nomchofer = $rowcam23["nom_contac"];
                                    $positioncarga = $filasum;
                                    }else{$nomchofer = 'Sin Chofer';
                                        $positioncarga = '';
                                    }

                                    $fechats = strtotime($fecha); //pasamos a timestamp
                                     
                                     //el parametro w en la funcion date indica que queremos el dia de la semana
                                     //lo devuelve en numero 0 domingo, 1 lunes,....
                                     
                                     
                                     switch (date('w', $fechats)){
                                         case 0: $quedia="Domingo"; break;
                                         case 1: $quedia="Lunes"; break;
                                         case 2: $quedia="Martes"; break;
                                         case 3: $quedia="Miercoles"; break;
                                         case 4: $quedia="Jueves"; break;
                                         case 5: $quedia="Viernes"; break;
                                         case 6: $quedia="Sabado"; break;
                                     }
                                     

                                    //aca me fijo si hay ordenes posteriores
                                    $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM orden  Where fecha = '$fecha'");
                                    if ($rowordenr = mysqli_fetch_array($sqlordenr)) {
                                        $verbo = "1";
                                    } else {
                                        $verbo = "0";
                                    }
                                    if($fecha< $fechahoy){$colorfecha='style="color:#cccccc;"'; $cobof="light";
                                    
                                    $verhoja="print_hoja_de_ruta";$blaked="disabled"; 
                                    
                                    }else{$cobof="primary";$verhoja="ver_hoja_de_ruta"; $blaked="";}

                                    $comilla="'";
                                    //extrigo nombre de la camioneta
                                    $sqlcamiodas=mysqli_query($rjdhfbpqj,"SELECT * FROM camionetas Where id = '$camioneid'");
                                    if ($rowcamionds = mysqli_fetch_array($sqlcamiodas)){
                                        $idcamcom = $rowcamionds["id"];
                                    }else{$idcamcom = '';}
                                    //
                                    echo '
                                        <tr data-index="' . $rowhoja['id'] . '" data-position="' . $rowhoja['position'] . '" style="cursor:move;">
                                        <td scope="row" '.$colorfecha.'>' . $quedia . '</td>
                                        <td scope="row" '.$colorfecha.'>' . $fechavr . '</td>
                                        <td scope="row" '.$colorfecha.' class="text-center">' . $positioncarga . '</td>
                                        <td scope="row" '.$colorfecha.'>';
                                        if($camioneid !="0" || $idchofer !="0"){
                                        echo '
                                         <select class="select2-multi-select form-control" id="camioneid'.$idhoja.'" name="camioneid'.$idhoja.'"                                         
                                        onchange="ajax_camionet'.$idhoja.'($('.$comilla.'#camioneid'.$idhoja.''.$comilla.').val());"                                       
                                        '.$blaked.'>
                                        <option value="MA==">Sin Camioneta</option>';
                                        
                    
                    
                                        $sqlcamionetas=mysqli_query($rjdhfbpqj,"SELECT * FROM camionetas Where estado = '0'");
                                        while ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)){
                                            $nombrecamio = $rowcamionetas["nombre"];
                                        $iddntedeca = $rowcamionetas["id"];
                    
                    
                                            echo ' <option value="' .  $iddntedeca . '" ';
                    
                                            if ($idcamcom == $rowcamionetas["id"]) {
                                                echo "selected";
                                            }
                    
                    
                                            echo '>' . $rowcamionetas["nombre"] . '</option>
                                            
                                            
                                                                                   
                                            
                                            
                                            ';
                                        }
                    
                    
                                        
                                        
                    
                                  
                                        
                                        
                                        echo '  </select>';
                                        
                                        
                                    }else{echo 'Retiro en el local o sin ubicación asignada';}
                                        echo '
                                        </td>
                                        <td scope="row" '.$colorfecha.'>';
                                        if($camioneid !="0" || $idchofer !="0"){
                                        echo '
                                        <select class="select2-multi-select form-control" id="choferes'.$idhoja.'" name="choferes'.$idhoja.'"                                         
                                        onchange="ajax_choferes'.$idhoja.'($('.$comilla.'#choferes'.$idhoja.''.$comilla.').val());"                                       
                                        '.$blaked.'>
                                        <option value="MA==">Sin Chofer</option>';
                                        
                    
                    
                    
                                        $sqlcamiodtas=mysqli_query($rjdhfbpqj,"SELECT * FROM usuarios Where tipo_cliente = '27' and estado='0' ORDER BY `usuarios`.`nom_contac` ASC");
                                        while ($rowcam23 = mysqli_fetch_array($sqlcamiodtas)){
                                        $nomchofer = $rowcam23["nom_contac"];
                                        $iddntedec = $rowcam23["id"];
                    
                    
                                            echo ' <option value="' .  $iddntedec . '" ';
                    
                                            if ($idchofer == $rowcam23["id"]) {
                                                echo "selected";
                                            }
                    
                    
                                            echo '>' . $rowcam23["nom_contac"] . '</option>
                                            
                                            
                                                                                   
                                            
                                            
                                            ';
                                        }
                    
                    
                                        
                                        
                    
                                  
                                        
                                        
                                        echo '  </select>
                                        
                                        
                                            <script>
                                            function ajax_choferes'.$idhoja.'(choferes'.$idhoja.') {
                                            var parametros = {
                                                "idchof": choferes'.$idhoja.',
                                                "camioneid": '.$camioneid.',
                                                "idhoja": '.$idhoja.'
                                            };
                                            $.ajax({
                                                data: parametros,
                                                url: '.$comilla.'camchof.php'.$comilla.',
                                                type: '.$comilla.'POST'.$comilla.',
                                                beforeSend: function() {
                                                    $("#muestroorden4'.$idhoja.'").html('.$comilla.''.$comilla.');
                                                },
                                                success: function(response) {
                                                    $("#muestroorden4'.$idhoja.'").html(response);
                                                     location.reload();
                                                }
                                            });
                                        }
                                               </script>

                                               </select>
                                        
                                        
                                            <script>
                                            function ajax_camionet'.$idhoja.'(camioneid'.$idhoja.') {
                                            var parametros = {
                                                "camioneid": camioneid'.$idhoja.',
                                                "idhoja": '.$idhoja.'
                                            };
                                            $.ajax({
                                                data: parametros,
                                                url: '.$comilla.'camcmione.php'.$comilla.',
                                                type: '.$comilla.'POST'.$comilla.',
                                                beforeSend: function() {
                                                    $("#muestroorden44'.$idhoja.'").html('.$comilla.''.$comilla.');
                                                },
                                                success: function(response) {
                                                    $("#muestroorden44'.$idhoja.'").html(response);
                                                     location.reload();
                                                }
                                            });
                                        }
                                               </script>';
                                            
                                            
                                    }
                     

                                        echo '
                                        <div id="muestroorden4'.$idhoja.'"></div></td>
                                        <div id="muestroorden44'.$idhoja.'"></div></td>
                                        <td>
                                         <select name="estado'.$idhoja.'" id="estado'.$idhoja.'" class="form-control"  style="font-weight: bold;text-align:center;"
                                                  onchange="ajax_ssseguimiento'.$idhoja.'($('.$comilla.'#estado'.$idhoja.''.$comilla.').val());" tabindex="-1">
                                                  
                                                  <option value="0" '.$selred0.'>Abierta</option>
                                                  <option value="1" '.$selred1.'>RUTA DE ENTREGA</option>
                     
                      </select>

                      <script>
          function ajax_ssseguimiento'.$idhoja.'(estado'.$idhoja.') {
            var parametros = {
                "estado": estado'.$idhoja.',
                "idhoja": '.$comilla.''.$idhoja.''.$comilla.',
                "fechaidhoja": '.$comilla.''.$fecha.''.$comilla.'
            };
            $.ajax({
                data: parametros,
                url: '.$comilla.'guardaresta.php'.$comilla.',
                type: '.$comilla.'POST'.$comilla.',
                beforeSend: function() {
                    $("#muestroorden423").html('.$comilla.''.$comilla.');
                },
                success: function(response) {
                    $("#muestroorden423").html(response);
                }
            });
        }
             
             </script>
                                        
                                        
                                        
                                        
                                        </td>
                                        <td>
                                            <div class="button-list">
                                         
                                            <a href="'.$verhoja.'?hdnsbloekdjgsd=' . $fechacod . '&hdnskdjjgsd=' . $idcamcod . '&hidjjhdho=' . $idhoja . '" title="Ver hoja de ruta">

                                            
                                            
                                            <button type="button" class="btn btn-'.$cobof.'"><i class="feather icon-send mr-2"></i> VER HOJA DE RUTA</button></a>


                                    <a href="print_hoja_de_rutaC?hdnsbloekdjgsd='.$fechacod.'&ijkfndt='.$dayver.'&hdnskdjjgsd='.$idcamcod .'&idhoja='.$idhoja.'" target="_black" title="Imprimir hoja de ruta">
                                        <button class="btn btn-dark"><i class="dripicons-print"></i></button></a>

                                            ';
                                    //aca me fijo si hay productos anula el boton borrar
                                    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_hoja='$idhoja'");//and dia_repart$dayver = '1' 
                                    if ($rowclorden = mysqli_fetch_array($sqlclorden)) {}else{

                                        echo ' 
                                               
                                                    <a href="javascript:eliminar(' . "'mlkdthsls?" . 'juhytm=' . $idcod . '&hdnsbloekdjgsd=' . $fechacod . '' . "'" . ')" class="btn btn-danger-rgba" title="Para borrar hay que poner inactivo la Camioneta">  <i class="ri-delete-bin-3-line"></i></a>';
                                    }


                                    echo ' </div>
                                        </td>
                                        </tr>
                                        ';
                                }

                                ?>


                                                        </tbody>
                        </table>

                        <table class="table" style="width: 900px;">
                        <tr>
                        <td>

<input type="date" id="fechah" name="fechah" value="<?=$buscar?>" class="form-control" style="width: 150px;">
                                </td>
                        <td>

<?php
 
echo'
 <select class="select2-multi-select form-control" id="camioneta" name="camioneta" style="width: 250px;">';
 



 $sqlcamids=mysqli_query($rjdhfbpqj,"SELECT * FROM camionetas Where estado='0' ORDER BY `position` ASC");
 while ($rowcaf = mysqli_fetch_array($sqlcamids)){
 $nomccam = $rowcaf["nombre"];
 $idddec = $rowcaf["id"];


     echo ' <option value="' .  $idddec . '">' . $rowcaf["nombre"] . '</option>
     ';
 }


 
 


 
 
 echo '  </select>';
 
?>


                                
                                </td>

                        
                                <td>
<?php
 echo'
 
 <select class="select2-multi-select form-control" id="choferd" name="choferd" style="width: 250px;">
 <option value="MA==">Sin Chofer</option>';
 



 $sqlcamiodtas=mysqli_query($rjdhfbpqj,"SELECT * FROM usuarios Where tipo_cliente = '27' and estado='0' ORDER BY `usuarios`.`nom_contac` ASC");
 while ($rowcam23 = mysqli_fetch_array($sqlcamiodtas)){
 $nomchofer = $rowcam23["nom_contac"];
 $iddntedec = $rowcam23["id"];


     echo ' <option value="' .  $iddntedec . '">' . $rowcam23["nom_contac"] . '</option>
     
     
                                            
     
     
     ';
 }


 
 


 
 
 echo '  </select>';
 
?>




                                </td>
                              
                                <td>
<bottom onclick="ajax_agerghoja($('#fechah').val(),$('#camioneta').val(),$('#choferd').val())"  class="btn btn-primary" style="width: 250px;">Agregar Hoja de Ruta
</bottom>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div id="muestroorden4"></div>
            <div id="muestroorden7"></div>
        </div>
        <script src="/assets/plugins/switchery/switchery.min.js"></script>
        <!-- End col -->













</div>

        <?php include('../template/pie.php'); ?>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('table tbody').sortable({
                    update: function(event, ui) {
                        $(this).children().each(function(index) {
                            if ($(this).attr('data-position') != (index + 1)) {
                                $(this).attr('data-position', (index + 1)).addClass('updated');
                            }
                        });

                        saveNewPositions();
                    }
                });
            });

            function saveNewPositions() {
                var positions = [];
                $('.updated').each(function() {
                    positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                    $(this).removeClass('updated');
                });

                $.ajax({
                    url: 'index.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        update: 1,
                        positions: positions
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    }
                });
            }


        </script>

<script>
                                            function ajax_agerghoja(fechah,camioneta,choferd) {
                                            var parametros = {
                                                "fechah": fechah,
                                                "camioneta": camioneta,
                                                "choferd": choferd
                                            };
                                            $.ajax({
                                                data: parametros,
                                                url: 'agregarhoja.php',
                                                type: 'POST',
                                                beforeSend: function() {
                                                    $("#muestroorden7").html('');
                                                },
                                                success: function(response) {
                                                    $("muestroorden7").html(response);
                                                    window.location.href = window.location.pathname + '?buscar=' + encodeURIComponent(fechah);
                                               
                                                }
                                            });
                                        }
                                               </script>



<script>
function enviarformul() {
    document.getElementById('miFormulario').submit();
}

function eliminar(id) {
    var statusConfirm = confirm("Realmente lo desea borrar?");
    if (statusConfirm == true) {
            window.location.href = id;
    } else {
            ("Haces otra cosa");
    }
}
</script>



             <div id="muestroorden423"> <div>