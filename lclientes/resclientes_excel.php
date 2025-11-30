<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');

include('../nota_de_pedido/funcion_saldoanterior.php');
include('../funciones/funcZonas.php');
include('../funciones/funcContarVencimiento.php');


function ultimaboleta($rjdhfbpqj, $id_clienteint)
{

    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where  id_cliente = '$id_clienteint' and col !='8' and col !='31' and col !='32' ORDER BY `orden`.`id` ASC");
    if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
        $totalresta = $rowpagdeufp["id"];
    } else {
        $totalresta = '99999999999999';
    }
    return $totalresta;
}


header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=clientes.xls");
header("Pragma: no-cache");
header("Expires: 0");


?>

<table>

    <tr>
        <!-- <th>Foto</th> -->
        <th style="width: 50px;" class="text-center">Zona</th>
        <th>Nombre</th>
        <th class="text-center">Ult. Compra</th>
        <th class="text-center">Dias Venc.</th>
        <th class="text-center">Saldo</th>
    </tr>

    <?php


    $sqlclientes = mysqli_query($rjdhfbpqj, "SELECT nom_empr,address,id,nom_contac FROM clientes Where  estado='0'  ORDER BY nom_contac ASC");

    while ($rowclientes = mysqli_fetch_array($sqlclientes)) {

        $id_clienteint = $rowclientes["id"];
        $salgral = ${"salgral" . $id_clienteint};
        $idorden = ${"salgral" . $id_clienteint};
        $id_clientecod = base64_encode($id_clienteint);

        $totalresta = ultimaboleta($rjdhfbpqj, $id_clienteint);
        $salgral = calculodeuda($rjdhfbpqj, $id_clienteint, $totalresta);
        if ($tipo_usuario == "0") {
            $salgraltotal += calculodeuda($rjdhfbpqj, $id_clienteint, $totalresta);
        }
        $fechaven = Vencimiento($rjdhfbpqj, $id_clienteint);
        $nombrezona = NombreZona($rjdhfbpqj, $id_clienteint);
        $diasven = diasvencitotal($rjdhfbpqj, $id_clienteint);
        if (!empty($fechaven)) {
            $fechave = date('d/m/Y', strtotime($fechaven));
        } else {
            $fechave = "";
        }

        if ($salgral > 0) {
            echo '
                                          <tr>
                                          <td style="color: black;"  class="text-center">' . $nombrezona . '</td>   
                                          <td style="color: black;">' . $rowclientes["nom_contac"] . ' (' . $rowclientes["nom_empr"] . ')</td>   
                                           <td scope="row"  class="text-center">' . $fechave . '</td>
                                           <td scope="row"  class="text-center">' . intval($diasven) . '</td>
                                          
                                            <td  class="text-center">$ ' . number_format($salgral, 0, ',', '.') . '</td>
                                         
                                        </tr>';
        }
    }

    ?>

    </tbody>
</table>
<?php

if ($tipo_usuario == "110") {

?>
    <table style="float:right;">
        <tr>
            <td><b>Deuda Total</b> &nbsp;</td>
            <td><b>$<?= number_format($salgraltotal, 2, '.', ',') ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td style="width:105;"></td>
        </tr>
    </table>
<?php

}
mysqli_close($rjdhfbpqj);
?>