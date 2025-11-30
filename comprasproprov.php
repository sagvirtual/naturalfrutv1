<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('template/cabezal.php');

?>


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="ri-book-read-line"></i> Listado Proveedor y Clientes </h4>

        </div>

    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">

        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>

                                    <th>Categorías</th>
                                   <!--  <th > <a href="../stockeo/stock_pdf?buscar=0"  target="_blank" class="btn btn-success-rgba" title="Descargar Categoría"><button type="button" class="btn btn-dark" tabindex="-1">Descargar Todos PDF</button></a></th> <th >
                                        
                                    <a href="../stockeo/stock_pdf?buscar=0&sincan=1"  target="_blank" class="btn btn-success-rgba" title="Descargar Categoría"><button type="button" class="btn btn-dark" tabindex="-1">Descargar los que consumen PDF  </button></a></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores where rubro = '0' ORDER BY `empresa` ASC");
                                while ($rowcategorias = mysqli_fetch_array($sqlcategorias)) {
                                    $id = $rowcategorias["id"];
                                    $fila = $fila + 1;
                                    $idcod = base64_encode($id);
                                    $ubicacion = $rowcategorias["ubicacion"];
                                    $estado = $rowcategorias["estado"];
                                    if ($estado == "0") {
                                        $estados = "Activo";
                                    } else {
                                        $estados = "Inactivo";
                                    }

                                    echo '<tr>
                                              
                                                <td style="color: black;">' . $rowcategorias["empresa"] . '</td>
                                                
                                                <td>
                                                    <div>
                                                        <a href="../lproveedores/clientescompran_pdf.php?buscar=' . $id . '"  target="_blank" class="btn btn-success-rgba" title="Descargar Categoría"><button type="button" class="btn btn-dark" tabindex="-1">Descargar Excel</button></a>';




                                                  echo'  </div>
                                                </td>

                                                             <td>
                                                  
                                                </td>
                                              </tr>';
                                }
                                mysqli_close($rjdhfbpqj);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->















        <?php include('template/pie.php'); ?>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

       