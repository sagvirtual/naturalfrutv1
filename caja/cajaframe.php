<?php include('../f54du60ig65.php');

$hasta_date = $_GET['hasta_date'];
$IdCamioneta = $_GET['IdCamioneta'];

?>
<link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>


<!-- Touchspin css -->
<link href="/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css">

<!-- Apex css -->
<link href="/assets/plugins/apexcharts/apexcharts.css" rel="stylesheet">
<!-- Slick css -->
<link href="/assets/plugins/slick/slick.css" rel="stylesheet">
<link href="/assets/plugins/slick/slick-theme.css" rel="stylesheet">

<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="/assets/css/flag-icon.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
<link href="/assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">



<div class="table-responsive m-b-30">
    <table class="table table-bordered" style="background-color: #fff; ">


        <tbody>
            <?php
            $sqlitem_ordena = mysqli_query($rjdhfbpqj, "SELECT orden.id_cliente, orden.fecha,  orden.id as idorden, orden.total, orden.position, orden.camioneta,
            
            clientes.id, clientes.address, clientes.nom_empr, clientes.camioneta 
            FROM orden INNER JOIN clientes ON orden.id_cliente = clientes.id 
            
            Where  orden.fecha = '$hasta_date' and orden.camioneta='$IdCamioneta'  ORDER BY `orden`.`position` ASC");
            while ($rowclientes = mysqli_fetch_array($sqlitem_ordena)) {
                $idite = $idite + 1;

                $IdOrdenCliente=$rowclientes["idorden"];
                $sqlitem_ordenPaid=${"sqlitem_ordenPaid".$rowclientes["idorden"]};
                $pagosOrden=${"pagosOrden".$rowclientes["idorden"]};
                $rowitem_ordenPaid=${"rowitem_ordenPaid".$rowclientes["idorden"]};

                      //I extract thes paid
                      $sqlitem_ordenPaid = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$IdOrdenCliente' and tipopag='1'");
                      while ($rowitem_ordenPaid = mysqli_fetch_array($sqlitem_ordenPaid)) {
                          $pagosOrden+=$rowitem_ordenPaid['valor'];

                      }
                      //


                if (($idite % 2) == 0) {
                    //Es un número par
                    $par = 'background-color: #E7E7E7;';
                } else {
                    //Es un número impar
                    $par = 'background-color: #F9F9F9;';
                }
                if(!empty($pagosOrden)){
                echo '<tr>
                            <td  style="width: 3cm; padding-left: 10; text-align:center; ' . $par . '">' . $rowclientes["idorden"] . '</td>
                            <td  style="padding-left: 10;  text-align:left; ' . $par . '">' . $rowclientes["address"] . ' (' . $rowclientes["nom_empr"] . ')</td>
                            <td  style="width: 3cm; padding-right: 10;  text-align:right; ' . $par . '">' . number_format($pagosOrden, 0, '', '.') . '</td>                     
                      </tr>';
            }}
            ?>



        </tbody>
    </table>