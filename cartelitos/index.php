<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');
$jfndhxzzom=$_GET['jfndhxzzom'];
$textodr=$_GET['textodr'];

if(empty($textodr)){$botds="Nuevo Cartelito";}else{$botds="Guardar";}

if (isset($_POST['update'])) {
    foreach ($_POST['positions'] as $position) {
        $index = $position[0];
        $newPosition = $position[1];

        $rjdhfbpqj->query("UPDATE cartelitos SET position = '$newPosition' WHERE id='$index'");
    }

    exit('success');
}



?>



<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"> <i class="mdi mdi-camera-burst"></i> Cartelitos para Lista de Precios</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
            <a href=" 
            <?php
             
             echo'../listadeprecio/listaedit?jfndhom='.$_SESSION['jfnddhom'].'&pagina='.$_SESSION['pagina'].'&busquedads='.$_SESSION['busquedads'].'';
             
            ?>
            " 
            ><button type="button" class="btn btn-round btn-dark"><i class="fa fa-close"></i></button></a>
            </div>
        </div>


    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row"><div class="col-lg-12">
            <div class="card m-b-30">
                
                <div class="card-body">

                    <div class="form-row">

                       <table>
                        <?php
                         
                         $sqlbannert=mysqli_query($rjdhfbpqj,"SELECT * FROM carteltext ORDER BY `carteltext`.`id` ASC  limit 2,10000");
                         while ($rowbannert = mysqli_fetch_array($sqlbannert)){
                            $idcodget=$rowbannert['id'];
                            $idcodet=base64_encode($rowbannert['id']);

                            echo '
                            <tr>
                           
                            <td>
                          
                            <a href="?jfndhxzzom=' . $idcodet . '&textodr='.$rowbannert['textcar'].'"  title="Editar '.$rowbannert['textcar'].'">
                            <div style="font-size:14pt; font-family: cambria;color:white; width: 200px; height: 50px; background-color: '.$rowbannert['color1'].'; display: flex; justify-content: center; align-items: center;">
                            '.$rowbannert['textcar'].'
                            </div>
                            </a>
                            </td>
                            <td>
                                <a href="?jfndhxzzom=' . $idcodet . '&textodr='.$rowbannert['textcar'].'"  title="Editar '.$rowbannert['textcar'].'">
                            <div style="font-size:14pt; font-family: cambria;color:white; width: 200px; height: 50px; background-color: '.$rowbannert['color2'].'; display: flex; justify-content: center; align-items: center;">
                            '.$rowbannert['textcar'].'
                            </div></a>
                            </td>
                            <td>
                              <a href="?jfndhxzzom=' . $idcodet . '&textodr='.$rowbannert['textcar'].'"  title="Editar '.$rowbannert['textcar'].'">
                            <div style="font-size:14pt; font-family: cambria;color:white; width: 200px; height: 50px; background-color: '.$rowbannert['color3'].'; display: flex; justify-content: center; align-items: center;">
                            '.$rowbannert['textcar'].'
                            </div></a>
                            </td>
                            <td>
                               <a href="?jfndhxzzom=' . $idcodet . '&textodr='.$rowbannert['textcar'].'"  title="Editar '.$rowbannert['textcar'].'">
                            <div style="font-size:14pt; font-family: cambria;color:white; width: 200px; height: 50px; background-color: '.$rowbannert['color4'].'; display: flex; justify-content: center; align-items: center;">
                            '.$rowbannert['textcar'].'
                            </div></a>
                            </td>
                            <td>
                            
                            <div style="font-size:14pt; font-family: cambria;color:white; width: 200px; height: 50px; background-color: '.$rowbannert['color5'].'; display: flex; justify-content: center; align-items: center;">
                            '.$rowbannert['textcar'].'
                            </div></a>
                            </td>
                          
                    


                            

                    
                            </td>
                            <td> &nbsp;&nbsp;&nbsp;
                            <a href="?jfndhxzzom=' . $idcodet . '&textodr='.$rowbannert['textcar'].'"  title="Editar" class="btn btn-success-rgba"><i class="ri-pencil-line"></i></a>';
                            
                            $sqlcartester=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartex Where id_cartel = '$idcodget'");
                                   if ($rowecartestx = mysqli_fetch_array($sqlcartester)){}else{
                           echo' &nbsp;&nbsp;&nbsp;
                            <a href="javascript:eliminar(' . "'../cartelitos/mlkdthst?" . 'juhytm=' . $idcodet . '' . "'" . ')" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>';
                                   }
                            echo'</td>
                            </tr>';}
                         
                         
                        ?>
                     </table>
                  




                    </div>
                </div>
                <form action="insert_text.php" id="formda" name="formda" method="post" enctype="multipart/form-data" target="_parent">
                <div class="col-lg-4">
                    <div class="card m-b-30">
                  
                        <div class="card-body">
                          
                            <div class="form-group mb-0"><h5 class="card-title">Texto (Maximo 19 caracteres)</h5>
                                <input type="text" class="form-control-file" id="textcar" name="textcar" value="<?= $textodr ?>" maxlength="19" style="width: 200px;">
                                <br> <input name="jfndhom" type="hidden" id="jfndhom" value="<?= $jfndhxzzom ?>">
                                <input type="submit" name="submit" class="btn btn-primary" value="<?=$botds?>" />
                            </div>
                        </div>
                    </div>
                </div>

                </form>







            </div>
        </div>
        <!-- Start col -->
        <div class="col-lg-4">
            <div class="card m-b-30">
                
                <div class="card-body">

                    <div class="form-row">

                        <table>
                        <?php
                         
                         $sqlbanner=mysqli_query($rjdhfbpqj,"SELECT * FROM cartelitos ORDER BY `cartelitos`.`position` ASC");
                         while ($rowbanner = mysqli_fetch_array($sqlbanner)){
                            $idcod=base64_encode($rowbanner['id']);

                            echo '
                            <tr  data-index="' . $rowbanner['id'] . '" data-position="' . $rowbanner['position'] . '" style="cursor:move;">
                            <td>
                            <div class="form-group col-md-12"><br>
                            <img src="../cartelitos/'.$rowbanner['id'].'" style="width: 150px; height:auto;"><br>
                            <a href="javascript:eliminar(' . "'../cartelitos/mlkdths?" . 'juhytm=' . $idcod . '' . "'" . ')" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                            </div>
                            </td>
                            </tr>
                            
                            ';
                         }
                         
                        ?>
                     
                        </table>




                    </div>
                </div>
                <form action="insert_banner.php" id="formda" name="formda" method="post" enctype="multipart/form-data" target="_parent">
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Cargar Cartelitos para usar en la lista de Precios</h5>
                        </div>
                        <div class="card-body">
                          
                            <div class="form-group mb-0">
                                <input type="file" class="form-control-file" id="file" name="file">
                                <br> <input name="jfndhom" type="hidden" id="jfndhom" value="<?= $idcod ?>">
                                <input type="submit" name="submit" class="btn btn-primary" value="Guardar Cartelito" />
                            </div>
                        </div>
                    </div>
                </div>

                </form>







            </div>
        </div>
        


        </div>
        </div>
        <!-- End col -->




        <script src="ajax_camionetas.js"></script>
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
                    }
                });
            }
        </script>