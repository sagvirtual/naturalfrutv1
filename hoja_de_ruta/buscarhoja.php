<?php 

$buscar = $_POST['buscar'];


?>



<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-10">
            <div class="card m-b-30">

                <div class="card-body">
                    <div >
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Día</th>
                                    <th>Fecha</th>
                                    <th class="text-center">Carga</th>
                                    <th>Camioneta</th>
                                    <th>Chofer</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sqlhoja = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja Where fecha LIKE '%$buscar%' ORDER BY `hoja`.`position` DESC Limit 10");
                                while ($rowhoja = mysqli_fetch_array($sqlhoja)) {
                                    $id = $rowhoja["id"];
                                    $idcod = base64_encode($id);
                                    $fecha = $rowhoja["fecha"];
                                    $fechacod = base64_encode($fecha);
                                    $fin = $rowhoja["fin"];
                                    $camioneid = $rowhoja["camioneta"];
                                    $positioncarga = $rowhoja["position"];
                                    $idchofer = $rowhoja["chofer"];
                                    $idcamcod = base64_encode($camioneid);

                                    //extrigo nombre de la camioneta
                                    $sqlcamionetas=mysqli_query($rjdhfbpqj,"SELECT * FROM camionetas Where id = ' $camioneid'");
                                    if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)){
                                        $nombrecamio = $rowcamionetas["nombre"];
                                    }
                                    //

                                    $fechav = explode("-", $fecha);
                                    $fechavr = $fechav[2] . "/" . $fechav[1] . "/" . $fechav[0];

                                    //extrigo nombre de la camioneta
                                    $sqlcamiodtas=mysqli_query($rjdhfbpqj,"SELECT * FROM usuarios Where id = ' $idchofer'");
                                    if ($rowcam23 = mysqli_fetch_array($sqlcamiodtas)){
                                    $nomchofer = $rowcam23["nom_contac"];
                                    }else{$nomchofer = 'Sin Chofer';}

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
                                    
                                    $verhoja="print_hoja_de_ruta";
                                    
                                    }else{$cobof="primary";$verhoja="ver_hoja_de_ruta";}


                                    echo '
                                        <tr data-index="' . $rowhoja['id'] . '" data-position="' . $rowhoja['position'] . '" style="cursor:move;">
                                        <td scope="row" '.$colorfecha.'>' . $quedia . '</td>
                                        <td scope="row" '.$colorfecha.'>' . $fechavr . '</td>
                                        <td scope="row" '.$colorfecha.' class="text-center">' . $positioncarga . '</td>
                                        <td scope="row" '.$colorfecha.'>' . $nombrecamio . '</td>
                                        <td scope="row" '.$colorfecha.'>' . $nomchofer . '</td>
                                        <td>
                                            <div class="button-list">
                                         
                                            <a href="'.$verhoja.'?hdnsbloekdjgsd=' . $fechacod . '&hdnskdjjgsd=' . $idcamcod . '" title="Ver hoja de ruta">
                                            
                                            <button type="button" class="btn btn-'.$cobof.'"><i class="feather icon-send mr-2"></i> VER HOJA DE RUTA</button></a>
                                            ';
                                    //aca me fijo si hay productos anula el boton borrar
                                    if ($verbo == "0") {

                                        echo ' 
                                               
                                                    <a href="javascript:eliminar(' . "'mlkdthsls?" . 'juhytm=' . $idcod . '' . "'" . ')" class="btn btn-danger-rgba" title="Para borrar hay que poner inactivo la Camioneta">  <i class="ri-delete-bin-3-line"></i></a>';
                                    }


                                    echo ' </div>
                                        </td>
                                        </tr>
                                        ';
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>