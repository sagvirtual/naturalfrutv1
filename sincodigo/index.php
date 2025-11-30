<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');

$buscarfe = $_POST['buscarfe'];
$buscarfeh = $_POST['buscarfeh'];
$estado = $_GET['estado'];

if (empty($buscarfe)) {
    $buscarfe = $fechahoy;
}

if (empty($buscarfeh)) {
    $buscarfeh = $fechahoy;
}
$_SESSION['jfnddhom'] = "sinprecio";
?>
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"> Productos sin Codigo</h4>

        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">





        <div class="col-lg-10">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="table-responsive">
                        <a href="../sincodigo/?estado=0" class="btn btn-dark py-1 font-16" target="parent">Falta Codificar</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="../sincodigo/?estado=2" class="btn btn-warning py-1 font-16" target="parent">Si Stock</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="../sincodigo/?estado=1" class="btn btn-danger py-1 font-16" target="parent">No lleva codigo</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="../sincodigo/sincodigo_pdf" class="btn btn-primary py-1 font-16" target="_blank"><i class="ri-printer-line mr-2"></i>Descargar PDF de los que falta codificar</a>

                        <table id="datatable-buttons" class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th>Producto</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Ubicacíon</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($estado == 0) {
                                    $sql = " and id_rubro9='0' ";
                                } elseif ($estado == 1) {
                                    $sql = " and id_rubro9='1' ";
                                } elseif ($estado == 2) {
                                    $sql = " and id_rubro9='2' ";
                                } else {
                                    $sql = "";
                                }

                                $sqlcategoriasb = mysqli_query($rjdhfbpqj, "SELECT id,nombre FROM categorias ORDER BY `categorias`.`position` ASC");
                                while ($rowcategoriasb = mysqli_fetch_array($sqlcategoriasb)) {
                                    $id_categoria = $rowcategoriasb["id"];
                                    $nombrecate = strtoupper($rowcategoriasb["nombre"]);

                                    $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria'  and  codigo='0' and estado='0' $sql ");
                                    if ($rowproductosv = mysqli_fetch_array($sqlproductosv)) {

                                        echo '<tr>  <td colspan="4" style="color: black;background-color: #F0F0F0;"><h4>' . $nombrecate . ' </h4>
           
         
           </td></tr>';
                                    }



                                    $comilla = "'";
                                    $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT id,nombre,estado,codigo,pascol,id_rubro9 FROM productos WHERE categoria='$id_categoria' and  codigo='0' and estado='0' $sql ORDER BY nombre ASC");

                                    while ($rowordentd = mysqli_fetch_array($sqlordenr)) {
                                        $idpr = $rowordentd['id'];
                                        $nombrepro = $rowordentd['nombre'];
                                        $estado = $rowordentd['estado'];
                                        $codigodebarra = $rowordentd['codigo'];
                                        $pascol = $rowordentd['pascol'];
                                        $id_rubro9 = $rowordentd['id_rubro9'];


                                        if ($id_rubro9 == 0) {
                                            $selred0 = "selected";
                                            $selred1 = "";
                                        } elseif ($id_rubro9 == 1) {
                                            $selred1 = "selected";
                                            $selred0 = "";
                                        } else {
                                            $selred2 = "selected";
                                            $selred0 = "";
                                        }
                                        $nover = '0';

                                        $canverificafin = $canverificafin + 1;
                                        echo '

                                    <tr>
                                    <td class="text-center">ID ' . $idpr . ' </td>
                                    <td>' . $nombrepro . ' </td>
                                       <td>
                                                                           <select name="col' . $idpr . '" id="col' . $idpr . '" class="form-control"  style="font-weight: bold;text-align:center;"
                                                  onchange="ajax_ssseguimiento($(' . $comilla . '#col' . $idpr . '' . $comilla . ').val(), ' . $comilla . '' . $idpr . '' . $comilla . ');" tabindex="-1">
                                                  
                                                  <option value="0" ' . $selred0 . '>FALTA CODIFICAR</option>
                                                  <option value="1" ' . $selred1 . '>No lleva Codigo</option>
                                                  <option value="2" ' . $selred2 . '>Sin Stock</option>
                     
                      </select>
                                        </td>
                                    <td class="text-center">' . $pascol . ' </td>
       

                                    </tr>

                                    ';
                                    }
                                }


                                ?>

                            </tbody>
                        </table>
                        CONTIDAD DE PRODUCTOS: <b><?= $canverificafin ?> </b>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<div id="muestroorden4"></div>

<script>
    function ajax_ssseguimiento(col, idorden) {
        var parametros = {
            "col": col,
            "idorden": idorden
        };
        $.ajax({
            data: parametros,
            url: '../lproductos/nopediecodigo.php',
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




<?php include('../template/pie.php'); ?><!-- 
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> -->