                      
<?php

$id_producto="824";
$unidadpro=funcunidProd($rjdhfbpqj,$id_producto);
$cantidadstok=calculostock($rjdhfbpqj,$id_producto,$fechacja);
// Consultas de ingresos y egresos
$ingresosE = mysqli_query($rjdhfbpqj, "SELECT id,nombre,idcuenta, id_orden, id_rubro, tipounidad, fecha, presentacion, kilos as cantidad, id_cliente, 'ingreso' as tipo FROM item_orden WHERE id_producto='$id_producto' ORDER BY fecha ASC");
$egresosE = mysqli_query($rjdhfbpqj, "SELECT id, idcuenta, id_orden, kilo, tipocuneta, fecha, agrstock as cantidad, unid_bulto, valor, id_proveedor, 'egreso' as tipo FROM prodcom WHERE id_producto='$id_producto'  ORDER BY fecha ASC");

// Combina los resultados en un solo array
$movimientosE = [];
while ($rowE = mysqli_fetch_assoc($egresosE)) {

    if($rowE['unid_bulto']=='1'){
    $rowE['cantidad'] = floatval($rowE['cantidad']) * $rowE['kilo']; // Asegura que sea numérico
    
}else{
    $rowE['cantidad'] = floatval($rowE['cantidad']); // Asegura que sea numérico
}
$movimientosE[] = $rowE;
    }
   
while ($rowE = mysqli_fetch_assoc($ingresosE)) {
    if($rowE['tipounidad']=='1'){
    $rowE['cantidad'] = -floatval($rowE['cantidad']) * $rowE['presentacion']; // Egresos en negativo
    }else{

        $rowE['cantidad'] = -floatval($rowE['cantidad']); // Egresos en negativo
    }
    $movimientosE[] = $rowE;
}

// Ordena por I
usort($movimientosE, function ($aE, $bE) {
    return $aE['fecha'] <=> $bE['fecha'];
});

// Inicia el saldo y muestra la tabla
$saldoE = 0;//$cantidadstok;
?>
 <div id="efectivo" >        
  <table class="table table-bordered table-striped"> 
    <thead>
  <tr>
        <td  colspan="7" style="text-align:center;font-weight: bold;background-color: grey;color:white;cursor: pointer;"  >Movimiento Stock Harina de Garbanzo Puro</td>
                      
                        
      </tr>
   
      <tr>
        <th  style="width: 140px;text-align:center">Fecha</th>
        <th  style="width: 140px;text-align:center">Nº Orden</th>
        <th class="text-center">Detalle</th>
        <th style="width: 140px;text-align:center;">Ingreso</th>
        <th style="width: 140px;text-align:center;">Egreso</th>
        <th style="width: 140px;text-align:center;">Saldo</th>
        <? //if($fechacja==$fechahoy){?>
        <th style="width: 90px; padding-left: 10px;text-align: center;">Acción</th>
        <? //}?>
      </tr>
    </thead>
    <tbody>

    <tbody>
    <tr>
    <td></td>
    <td></td>
    <td style="text-align:right;font-weight: normal;"><i>Stock Anterior<i></td>
    <td></td>
    <td></td>
    <td style="text-align:right;font-weight: normal;"><i><?=number_format($cantidadstok, 2, '.', '') ?><? echo ' '.$unidadpro.'';?><i></td>
    <? //if($fechacja==$fechahoy){?><td></td> <?// }?>
        </tr>
        <?php foreach ($movimientosE as $movimientoE): 
            $saldoE += $movimientoE['cantidad']; // Calcula el saldo actual
        ?>
        <tr>
            <td class="text-center"><?=date('d/m/Y', strtotime($movimientoE['fecha']))?></td>
            <td style="text-align:center;font-weight: normal;"><?php 
            if($movimientoE['id_orden']=='0'){ echo ''; }else{

              echo 'Nº'.$movimientoE['id_orden'].''; 
            }
            
            
            
            ?></td>
            <td style="font-weight: normal;">
              <?php if($movimientoE['tipo'] == 'ingreso'){
                if($movimientoE['id_orden']=='0'){ echo 'Cobro en Efectivo'; }else{ 

                  echo ''.nombreclien($rjdhfbpqj,$movimientoE['id_cliente']).'';
                }
                
              
              }else{

                if($movimientoE['id_orden']=='0'){ echo 'Pago en Efectivo'; }else{

                  echo ''.nombreproveedorn($rjdhfbpqj,$movimientoE['id_proveedor']).'';
                }


                } ?>
            </td>
            <td style="text-align:right;font-weight: normal;"><?php echo $movimientoE['tipo'] == 'egreso' ? number_format($movimientoE['cantidad'], 2, ',', '.') : ''; 
            ?><?
            if($movimientoE['tipo'] == 'egreso'){
                    echo ' '.$unidadpro.'';
            }
            
            ?></td>
            <td style="text-align:right;font-weight: normal;"><?php echo $movimientoE['tipo'] == 'ingreso' ? number_format(abs($movimientoE['cantidad']), 2, ',', '.') : ''; ?>
            <?
            if($movimientoE['tipo'] == 'ingreso'){
                    echo ' '.$unidadpro.'';
            }
            
            ?>
        
        </td>
            <td style="text-align:right;font-weight: normal;"><?php echo number_format($saldoE, 2, '.', '');  echo ' '.$unidadpro.'';?></td>
         <!--    
            <td style="text-align:center;font-weight: normal;">
                <button type="button" class="btn btn-primary btn-sm" ondblclick="ajax_eliminapag('<?php echo $movimientoE['id']; ?>');">⌾</button>
                </td>
 -->
            

 <? //if($fechacja==$fechahoy){?>
          <td style="padding-right: 3mm; text-align: center; vertical-align: middle;">

          <?php
  
  if($movimientoE['id_orden']=='0'){ 
  
 ?>
                        <button type="button" class="btn btn-danger btn-sm" style="width: 40px;"  ondblclick="ajax_eliminapag('<?=$movimientoE['id']?>','<?=$movimientoE['tipo']?>');" tabindex="-1">✕</button>
                        

                        <?php
  
    }else{ ?>

      <?php
if($movimientoE['tipo'] == 'ingreso'){ ?>
        <a href="#?jhduskdsa=<?=base64_encode($movimientoE['id_cliente'])?>" target="_blank">
      <button type="button" class="btn btn-success btn-sm" >⌾ </button>
    </a>

    <? }else{ 
  ?>
   <a href="#?jhduskdsa=<?=base64_encode($movimientoE['id_proveedor'])?>&modo=<?=$movimientoE['tipocuneta']?>" target="_blank">
      <button type="button" class="btn btn-primary btn-sm" >⌾</button>
    </a>
    <?}
   }
  
 ?>
            </td>
            <? //}?>


        </tr>
        <?php endforeach; ?>
    </tbody>


  </table>
                    </div>
                    <button type="button" class="btn  btn-outline-dark btn-lg" style="width:100%; font-weight: bold;">Stock Total <?php echo number_format($saldoE, 2, ',', '.'); echo ''.$unidadpro.'';?></button> 