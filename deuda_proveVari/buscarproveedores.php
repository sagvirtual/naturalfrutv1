<?php include('../f54du60ig65.php');
include('../orden_de_compra/funcion_saldoanterior.php');
include('../funciones/funcContarVenc_prov.php');

 $buscar = $_POST['buscar'];
?>
<!-- End Breadcrumbbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default-datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <!-- <th>Foto</th> -->
                                    <th>Nombre Proveedor</th>
                                    <th  class="text-center">Ult. Compra</th>
                                    <th  class="text-center">Días Venc.</th>
                                    <th  class="text-center">Saldo</th>
                                    <th  class="text-center">Resumen de Cuenta</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php




                                $sqlclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where empresa LIKE '%$buscar%' or address LIKE '%$buscar%' ORDER BY `proveedores`.`empresa` ASC");
                                while ($rowclientes = mysqli_fetch_array($sqlclientes)) {
                                    
                                    $id_clienteint=$rowclientes["id"];
                                    $salgral=${"salgral".$id_clienteint};
                                    $id_clientecod=base64_encode($id_clienteint);
                                    $salgral=calculodeuda($rjdhfbpqj,$id_clienteint,99999999999);
                                    $salgraltotal+=calculodeuda($rjdhfbpqj,$id_clienteint,99999999999);
                                    $fechaven=Vencimiento($rjdhfbpqj,$id_clienteint);
                                    $diasven=diasvencitotal($rjdhfbpqj,$id_clienteint);
                                    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenprovee Where id_proveedor = '$id_clienteint' and cerrado='1'");
                                    if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {

                                        echo '
                                          <tr>  
                                          <td style="color: black;">'.$rowclientes["empresa"].' </td>   
                                           <td scope="row"  class="text-center">'.date('d/m/Y', strtotime($fechaven)).'</td>
                                           <td scope="row"  class="text-center">'.$diasven.'</td>
                                          
                                            <td  class="text-center">$'. number_format($salgral, 2, '.', ',').'</td>
                                            <td  class="text-center">
                                            <a href="../deuda_proveedores/debe_haber?jhduskdsa='.$id_clientecod.'&modo=0" target="_blank">
                                            <button type="button" class="btn btn-outline-primary">Cuenta "A" </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                        </a>
                                          <a href="../deuda_proveedores/debe_haber?jhduskdsa='.$id_clientecod.'&modo=1" target="_blank">
                                            <button type="button" class="btn btn-outline-dark">Cuenta "R" </button></td>
                                        </a>
                                        </tr>';
                                         }}
                                         mysqli_close($rjdhfbpqj);
                                ?>

                            </tbody>
                        </table>
                    <table style="float:right;">
                    <tr>
                                           <td><b>Deuda Total</b> &nbsp;</td>
                                           <td><b>$<?=number_format($salgraltotal, 2, '.', ',')?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                           <td style="width:105;"></td>
                                        </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>   <script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
        <script src="../assets/js/custom/custom-table-datatable.js"></script>
        <!-- End col -->