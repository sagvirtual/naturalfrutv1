<?php include('f54du60ig65.php');
include('template/cabezal.php');
$diaselec = $_GET['hdnsbloekdjgsd'];
$dayver = $_GET['day'];

if ($dayver!="") {
    if ($dayver == '1') {
        $activla1 = "active";
        $selectearial1 = "true";
        $dianombr="Lunes";
    } else {
        $selectearial1 = "false";
    }
    if ($dayver == '2') {
        $activla2 = "active";
        $selectearial2 = "true";
        $dianombr="Martes";
    } else {
        $selectearial2 = "false";
    }
    if ($dayver == '3') {
        $activla3 = "active";
        $selectearial3 = "true";
        $dianombr="Miercoles";
    } else {
        $selectearial3 = "false";
    }
    if ($dayver == '4') {
        $activla4 = "active";
        $selectearial4 = "true";
        $dianombr="Jueves";
    } else {
        $selectearial4 = "false";
    }
    if ($dayver == '5') {
        $activla5 = "active";
        $selectearial5 = "true";
        $dianombr="Viernes";
    } else {
        $selectearial5 = "false";
    }
    if ($dayver == '6') {
        $activla6 = "active";
        $selectearial6 = "true";
        $dianombr="Sábados";
    } else {
        $selectearial6 = "false";
    }
    if ($dayver == '0') {
        $activla0 = "active";
        $selectearial0 = "true";
        $dianombr="Domingos";
    } else {
        $selectearial0 = "false";
    }
} else {
    $activla1 = "active";
    $selectearial1 = "true";
    $dayver = '1';
    $dianombr="Lunes";
}





if (isset($_POST['update1'])) {
    foreach ($_POST['positions1'] as $position1) {
        $index1 = $position1[0];
        $newPosition1 = $position1[1];

        
        $rjdhfbpqj->query("UPDATE clientes SET position$dayver = '$newPosition1', poscol$dayver = '0' WHERE id='$index1'");
        
    }

    exit('success');
}


?>


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="ri-book-read-line"></i> Configuracíon Hoja de Ruta </h4>

        </div>


        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="javascript:location.reload()">
                    <button class="btn btn-primary"><i class="ri-refresh-line mr-2"></i>Actualizar</button></a>
            </div>
        </div>

    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">


    <div class="row">
        <div class="col-lg-12 col-xl-4">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="nav flex-column nav-pills" id="v-pills-product-tab" role="tablist" aria-orientation="vertical">
                        <a href="/hoja_ruta_config?day=1" class="nav-link mb-2 <?= $activla1 ?>" aria-selected="<?= $selectearial1 ?>">
                            <i class="ri-remixicon-line mr-2"></i>Hoja de Ruta LUNES</a>
                        <a  href="/hoja_ruta_config?day=2" class="nav-link mb-2 <?= $activla2 ?>" aria-selected="<?= $selectearial2 ?>">
                            <i class="ri-remixicon-line mr-2"></i>Hoja de Ruta MARTES</a>
                        <a href="/hoja_ruta_config?day=3"  class="nav-link mb-2 <?= $activla3 ?>" aria-selected="<?= $selectearial3 ?>">
                            <i class="ri-remixicon-line mr-2"></i>Hoja de Ruta MIERCOLES</a>
                        <a href="/hoja_ruta_config?day=4"  class="nav-link mb-2 <?= $activla4 ?>"  aria-selected="<?= $selectearial4 ?>">
                            <i class="ri-remixicon-line mr-2"></i>Hoja de Ruta JUEVES</a>
                            <a href="/hoja_ruta_config?day=5"  class="nav-link mb-2 <?= $activla5 ?>"  aria-selected="<?= $selectearial5 ?>">
                            <i class="ri-remixicon-line mr-2"></i>Hoja de Ruta VIERNES</a>
                            <a href="/hoja_ruta_config?day=6"  class="nav-link mb-2 <?= $activla6 ?>"  aria-selected="<?= $selectearial6 ?>">
                            <p style="color:gray"> <i class="ri-remixicon-line mr-2"></i>Hoja de Ruta SABADOS</p></a>
                            <!-- <a href="/hoja_ruta_config?day=0"  class="nav-link mb-2 <?//= $activla0 ?>"  aria-selected="<?//= $selectearial0 ?>">
                            <p style="color:gray"><i class="ri-remixicon-line mr-2"></i>Hoja de Ruta DOMINGOS</p></a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-8">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="tab-content" id="v-pills-product-tabContent">
                        <!-- hoja1 -->
                        <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">

                            <div class="row">

                                <!-- Start col -->
                                <div class="col-lg-12">
                                    <div class="card m-b-30">

                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table ">
                                                    <thead>
                                                        <tr>

                                                            <th>Orden</th>
                                                            <th>Clientes <? echo ''.$dianombr.'';?></th>
                                                            <!-- <th>Acción</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where estado='0' and poscol$dayver = '0'  ORDER BY `position$dayver` ASC");
                                                        while ($rowcategorias = mysqli_fetch_array($sqlcategorias)) {
                                                            $id = $rowcategorias["id"];
                                                            $fila = $fila + 1;
                                                            $idcod = base64_encode($id);
                                                            $cliente = $rowcategorias["address"];
                                                            $clientev = strtoupper($cliente);
                                                            $nom_empr = $rowcategorias["nom_empr"];
                                                            $nom_emprv = ucfirst(strtolower($nom_empr));
                                                            if (($fila % 2) == 0) {
                                                                //Es un número par
                                                                $colorf = '#fff';
                                                            } else {
                                                                //Es un número impar
                                                                $colorf = '#F1F1F1';
                                                            }

                                                            echo '<tr data-index="' . $rowcategorias['id'] . '" data-position="' . $rowcategorias['position'.$dayver] . '" style="cursor:move; ">
                            <td class="text-center">' . $fila . ' </td>
                                      
                                        <td style="color: black;"><b>' . $clientev . '</b> (' . $nom_emprv . ')</td>';
                                        
                                      /*   <td>
                                            <div class="button-list">
                                   
                                                <a  href="javascript:eliminar(' . "'/hoja_de_ruta/mlkdths?" . 'juhytm=' . $idcod . '&day=1' . "'" . ')" title="Quitar de hoja">
                                                <button type="button" class="btn btn-round btn-outline-danger"><i class="feather icon-trash-2"></i></button>
                                               </a> </div>
                                        </td> */
                                      echo'</tr>';
                                                        }
                                                        /* aca sin ordenar */

                                                        $sqlordenarclien = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where estado='0' and poscol$dayver= '1' ORDER BY `position1` ASC");
                                                        while ($rowordenarclien = mysqli_fetch_array($sqlordenarclien)) {
                                                            $idg = $rowordenarclien["id"];
                                                            $filag = $filag + 1;
                                                            $idcodg = base64_encode($idg);
                                                            $clienteg = $rowordenarclien["address"];
                                                            $clientevg = strtoupper($clienteg);
                                                            $nom_emprg = $rowordenarclien["nom_empr"];
                                                            $nom_emprvg = ucfirst(strtolower($nom_emprg));

                                                            echo '<tr data-index="' . $rowordenarclien['id'] . '" data-position="' . $rowordenarclien['position'.$dayver] . '" style="cursor:move;">
                            <td class="text-center"><i class="ion ion-md-arrow-round-up"></i></td>
                                      
                                        <td style="color: red;"><b>' . $clientevg . '</b> (' . $nom_emprvg . ')</td>
                                        
                                        <td>
                                    
                                       
                                       
                                                </td>
                                      </tr>';
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
                        <!-- fin hoja 1 -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->















    <?php include('template/pie.php'); ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('table tbody').sortable({
                update: function(event, ui) {
                    $(this).children().each(function(index1) {
                        if ($(this).attr('data-position') != (index1 + 1)) {
                            $(this).attr('data-position', (index1 + 1)).addClass('updated');
                        }
                    });

                    saveNewPositions1();
                }
            });
        });

        function saveNewPositions1() {
            var positions1 = [];
            $('.updated').each(function() {
                positions1.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                $(this).removeClass('updated');
            });

            $.ajax({
                url: 'hoja_ruta_config.php?day=<?=$dayver?>',
                method: 'POST',
                dataType: 'text',
                data: {
                    update1: 1,
                    positions1: positions1
                },
                success: function(response) {
                    console.log(response);
                }
            });
        }
/* fin1 */
       

         
    </script>