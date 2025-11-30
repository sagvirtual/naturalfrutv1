<?php include('../f54du60ig65.php');

unset($_SESSION['idcliente']);
unset($_SESSION['dianoms']);
//unset($_SESSION['fecharepart']);
unset($_SESSION['id_rubro']);
unset($_SESSION['tipo_cliente']);
unset($_SESSION['id_orden']);
$buscar = $_POST['buscar'];

$sqlproveedoresa = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where whatsapp != ''");
while ($rowproveedoresa = mysqli_fetch_array($sqlproveedoresa)) {
    $whatsappa = $rowproveedoresa["whatsapp"];
    if (!empty($whatsappa)) {
        $whs = "1";
    }
}


$sqlproveedoresad = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where 'address' != ''");
while ($rowproveedoresad = mysqli_fetch_array($sqlproveedoresad)) {
    $addressa = $rowproveedoresad["address"];
    if (!empty($addressa)) {
        $andr = "1";
    }
}

?>



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
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Remito</th>
                                    <th>Fecha Reparto</th>
                                    <th>Cliente</th>
                                    <th class="text-center">$ Debe</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                
                               

                                $sqljoin = mysqli_query($rjdhfbpqj, "SELECT orden.fecha, orden.id, orden.id_cliente, orden.total, orden.subtotal, clientes.nom_empr, 
                                clientes.address
                                FROM orden 
                                INNER JOIN clientes ON orden.id_cliente = clientes.id
                                
                                Where  orden.fecha LIKE '%$buscar%' OR orden.id LIKE '%$buscar%' OR orden.id_cliente LIKE '%$buscar%'  OR orden.total LIKE '%$buscar%' OR orden.subtotal LIKE '%$buscar%' OR clientes.address LIKE '%$buscar%' OR clientes.nom_empr LIKE '%$buscar%' ORDER BY `orden`.`fecha` DESC");



                                while ($roworden = mysqli_fetch_array($sqljoin)) {
                                    $idorden = $roworden['id'];
                                    $idcod = base64_encode($idorden);
                                    $fecha = $roworden['fecha'];
                                    $idcli = $roworden['id_cliente'];
                                    $fechav = explode("-", $fecha);
                                    $fechavr = $fechav[2] . "/" . $fechav[1] . "/" . $fechav[0];

                                    $totalorden = number_format($roworden['subtotal'], 2, '.', '');
                                    $debetotal = number_format($roworden['total'], 2, '.', '');


                                    $sqlclientesi = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$idcli'");
                                    if ($rowclientesi = mysqli_fetch_array($sqlclientesi)) {

                                        $nombrecli = $rowclientesi["address"] . ', ' . $rowclientesi["nom_empr"];
                                    }

                                                                      //aca me fijo si hay productos anula el boton borrar
                                                                      $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM orden  Where fecha > '$fecha' and id_cliente = '$idcli'");
                                                                      if ($rowordenr = mysqli_fetch_array($sqlordenr)) {$verbo="1";
                                                                      } else {$verbo="0";}


                                    echo '
                                        <tr style="' . $colorestado . '">
                                        <td scope="row">#' . $roworden["id"] . '</td>
                                        <td scope="row">' . $fechavr . '</td>
                                        <td style="color: black;">' . $nombrecli . '</td>';

                                        if($verbo=="0"){
                                        echo'<td style="color: black;" class="text-center"> <button type="button" class="btn btn-outline-dark" style="min-width: 120px;">' . $debetotal . '</button></td>
                                        ';}else{echo'<td style="color: black;"> </td>';}

                                        echo'<td>
                                            <div class="button-list">
                                            <a href="print_orden?jfndhom=' . $idcod . '" target="_black" class="btn btn-dark-rgba" title="Imprimir"><i class="dripicons-print"></i></a>
                                            ';
                                                                            //aca me fijo si hay productos anula el boton borrar
                                                                            if($verbo=="0"){

                                                                                echo ' 
                                                    <a href="agregar_orden?jfndhom=' . $idcod . '" target="_parent" class="btn btn-success-rgba" title="Editar Remito"><i class="ri-pencil-line"></i></a>
                                                    <a href="javascript:eliminar(' . "'mlkdthsls?" . 'juhytm=' . $idcod . '' . "'" . ')" class="btn btn-danger-rgba">  <i class="ri-delete-bin-3-line"></i></a>';
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


        
    