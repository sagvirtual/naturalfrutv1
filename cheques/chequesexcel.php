<?php include('../f54du60ig65.php');


$hasta_date = $_GET['hasta_date'];
$desde_date = $_GET['desde_date'];
$buscar = $_GET['buscar'];
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=clientes.xls");
header("Pragma: no-cache");
header("Expires: 0");

function datosche($rjdhfbpqj, $numcheque)
{


    $sqljoin = mysqli_query($rjdhfbpqj, "SELECT tipopag,id,fecha,nota,vencheque,valor,ncheque,id_proveedor,tipocuneta FROM prodcom Where ncheque='$numcheque'");

    if ($roworden = mysqli_fetch_array($sqljoin)) {
        $id_proveedor = $roworden['id_proveedor'];
        $fechapago = date('d/m/y', strtotime($roworden['fecha']));
        $tipocuneta = $roworden['tipocuneta'];
        if ($tipocuneta == "0") {
            $cuenta = 'Cuenta "A"';
        } else { {
                $cuenta = 'Cuenta "R"';
            }
        }

        $sqlproveedoresad = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_proveedor' ");
        if ($rowproveedoresad = mysqli_fetch_array($sqlproveedoresad)) {
            $nombrepro = $rowproveedoresad["empresa"];
        }
    }

    // Devuelve un array con ambos valores
    return array('nombrepro' => $nombrepro, 'cuenta' => $cuenta, 'fechapago' => $fechapago);
}

?>




<table id="default-datatable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">Fecha</th>
            <th>Cheque Cliente</th>
            <th class="text-center">Fecha&nbsp;de&nbsp;pago</th>
            <th class="text-center">Nº Cheque</th>
            <th class="text-center">Banco</th>
            <th class="text-center">Importe</th>
            <th class="text-center">Se paso</th>
        </tr>
    </thead>
    <tbody>

        <?php


        $sqljoin = mysqli_query($rjdhfbpqj, "SELECT item_orden.tipopag, item_orden.fecha,item_orden.nota,item_orden.vencheque, item_orden.id_orden, item_orden.id_cliente, item_orden.ncheque, item_orden.valor, 
                                clientes.nom_empr, clientes.address, clientes.nom_contac
                                FROM item_orden 
                                INNER JOIN clientes ON item_orden.id_cliente = clientes.id
                                
                                Where item_orden.tipopag='4' and(item_orden.fecha LIKE '%$buscar%' OR item_orden.id_orden LIKE '%$buscar%' OR item_orden.id_cliente LIKE '%$buscar%'  OR item_orden.valor LIKE '%$buscar%' OR item_orden.ncheque LIKE '%$buscar%' OR clientes.address LIKE '%$buscar%' OR clientes.nom_empr LIKE '%$buscar%' OR item_orden.nota LIKE '%$buscar%' OR clientes.nom_contac LIKE '%$buscar%') and item_orden.fecha BETWEEN '$desde_date' AND '$hasta_date' ORDER BY `item_orden`.`fecha` DESC");



        while ($roworden = mysqli_fetch_array($sqljoin)) {
            $idorden = $roworden['id_orden'];
            $idcod = base64_encode($idorden);
            $fecha = $roworden['fecha'];
            $vencheque = $roworden['vencheque'];
            $idcli = $roworden['id_cliente'];
            $ncheque = $roworden['ncheque'];
            $terserop = datosche($rjdhfbpqj, $ncheque);
            $nombrepro = $terserop['nombrepro'];
            $fechapago = $terserop['fechapago'];
            $cuenta = $terserop['cuenta'];
            $banco = $roworden['nota'];
            $fechav = explode("-", $fecha);
            $fechavr = $fechav[2] . "/" . $fechav[1] . "/" . $fechav[0];

            $valorche = number_format($roworden['valor'], 2, '.', ',');


            $sqlclientesi = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$idcli'");
            if ($rowclientesi = mysqli_fetch_array($sqlclientesi)) {

                $nombrecli = $rowclientesi["nom_contac"] . ', ' . $rowclientesi["nom_empr"];
            }

            $totalcher += $roworden['valor'];
            $totalcherv = number_format($totalcher, 2, '.', ',');


            echo '
                                        <tr style="' . $colorestado . '">
                               
                                        <td class="text-center" scope="row">' . $fechavr . '</td>
                                        <td style="color: black;">' . $nombrecli . '</td>
                                        <td class="text-center" style="color: black;">      <p style="display:none;"> ' . date('Y/m/d', strtotime($vencheque)) . '</p>
                                        ' . date('d/m/y', strtotime($vencheque)) . '</td>
                                        <td class="text-center" style="color: black;">Nº ' . $ncheque . '</td>
                                        <td style="color: black;">' . $banco . '</td>
                                        
                                        
                                        <td style="color: black;" class="text-center"> $' . $valorche . '</td><td>';




            echo '' . $nombrepro . ' ' . $cuenta . ' ' . $fechapago . '';


            echo '</td>
                                        </tr>
                                        ';
        }

        ?>
        <tr>
            <td colspan="7" style="text-align: center;">
                <h3>Total cheques $<?= $totalcherv ?></h3>
            </td>
        </tr>
    </tbody>
</table>