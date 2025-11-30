<?php
function totalremitos ($hasta_date, $IdCamioneta, $rjdhfbpqj){
        $sqlitem_ordena = mysqli_query($rjdhfbpqj, "SELECT item_orden.id_cliente, item_orden.modo, item_orden.fecha,  item_orden.id_orden, item_orden.tipopag, item_orden.valor, clientes.id, clientes.address, clientes.nom_empr, clientes.camioneta FROM item_orden INNER JOIN clientes ON item_orden.id_cliente = clientes.id 
        
        Where item_orden.fecha = '$hasta_date' and clientes.camioneta='$IdCamioneta' and (item_orden.tipopag='1' or item_orden.tipopag='4') and item_orden.modo='1' ORDER BY `item_orden`.`fecha` ASC");
        
        while ($rowclientes = mysqli_fetch_array($sqlitem_ordena)) {

            $totalremito+=$rowclientes["valor"];


        }
        
        $totalremitod = number_format($totalremito, 0, '', '.');
   echo ''.$totalremitod.'';
   
    }

 
 
?>