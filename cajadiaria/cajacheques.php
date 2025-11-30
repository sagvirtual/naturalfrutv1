  <br><br>                    
<?php
$cajantCh=saldoanteriorn($rjdhfbpqj,'4',$fechacja);
// Consultas de ingresos y egresos
$ingresosCh = mysqli_query($rjdhfbpqj, "SELECT id,idcuenta, id_orden, id_rubro, nota,nombre, ncheque, vencheque, valor, id_cliente, 'ingreso' as tipo FROM item_orden WHERE modo='1' AND tipopag='4' AND fecha ='$fechacja' ORDER BY idcuenta ASC");
$egresosCh = mysqli_query($rjdhfbpqj, "SELECT id, idcuenta, id_orden, id_rubro, tipocuneta, nota, ncheque, vencheque, valor, id_proveedor, 'egreso' as tipo FROM prodcom WHERE modopag='1' AND tipopag='4' AND fecha = '$fechacja' ORDER BY idcuenta ASC");

// Combina los resultados en un solo array
$movimientosCh = [];
while ($rowCh = mysqli_fetch_assoc($ingresosCh)) {
    $rowCh['valor'] = floatval($rowCh['valor']); // Asegura que sea numérico
    $movimientosCh[] = $rowCh;
}
while ($rowCh = mysqli_fetch_assoc($egresosCh)) {
    $rowCh['valor'] = -floatval($rowCh['valor']); // Chgresos en negativo
    $movimientosCh[] = $rowCh;
}

// Ordena por I
usort($movimientosCh, function ($aCh, $bCh) {
    return $aCh['idcuenta'] <=> $bCh['idcuenta'];
});

// Inicia el saldo y muestra la tabla
$saldoCh = $cajantCh;
?>
 <div id="cheques" class="collapse">        
  <table class="table table-bordered table-striped"> 
    <thead>
  <tr>
        <td  colspan="8" style="text-align:center;font-weight: bold;background-color: grey;color:white;cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#cheques" >Movimiento Cheque</td>
                      
                        
      </tr>
   
      <tr> 
      <th  style="width: 140px;text-align:center">Nº Orden</th>
      <th  style="width: 140px;text-align:center">Nº Cheque</th>
        <th  style="width: 140px;text-align:center">Fecha Cob.</th>       
        <th>Detalle</th>
        <th style="width: 140px;text-align:center;">Ingreso</th>
        <th style="width: 140px;text-align:center;">Egreso</th>
        <th style="width: 140px;text-align:center;">Saldo</th>
        <? //if($fechacja==$fechahoy){?>
        <th style="width: 90px; padding-left: 10px;text-align: center;">Acción</th>
        <? //}?>
      </tr>
    </thead>
    <tbody>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td style="text-align:right;font-weight: normal;"><i>Caja Anterior<i></td>
    <td></td>
    <td></td>
    <td style="text-align:right;font-weight: normal;"><i><?=number_format($cajantCh, 2, ',', '.')?><i></td>
    <? //if($fechacja==$fechahoy){?><td></td> <? //}?>
        </tr>
        <?php foreach ($movimientosCh as $movimientoCh): 
            $saldoCh += $movimientoCh['valor']; // Calcula el saldo actual
        ?>
        <tr>
            <td style="text-align:center;font-weight: normal;"><?php 
         
         
            if($movimientoCh['id_orden']=='0'){ echo ''; }else{

              if($movimientoCh['nombre']!=''){echo 'Nº'.$movimientoCh['nombre'].''; }else{echo 'Nº'.$movimientoCh['id_orden'].''; }

              
            }
            
            
            ?></td>
            <td style="font-weight: normal;text-align:center"><?=$movimientoCh['ncheque']?></td>
            <td style="font-weight: normal;text-align:center"><?=date('d/m/Y', strtotime($movimientoCh['vencheque']))?></td>

            <td style="font-weight: normal;">
              <?php if($movimientoCh['tipo'] == 'ingreso'){
                if($movimientoCh['id_orden']=='0'){ echo 'Cobro en Cheque'; }else{ 

                  echo 'Cobro en Cheque  '.nombreclien($rjdhfbpqj,$movimientoCh['id_cliente']).'';
                }
                
              
              }else{

                if($movimientoCh['id_orden']=='0'){ echo 'Pago en Cheque'; }else{

                  echo 'Pago en Cheque '.nombreproveedorn($rjdhfbpqj,$movimientoCh['id_proveedor']).'';
                }


                } ?>  <?=nombrerubro($movimientoCh['id_rubro'])?> <?=$movimientoCh['nota']?>
            </td>
            <td style="text-align:right;font-weight: normal;"><?php echo $movimientoCh['tipo'] == 'ingreso' ? number_format($movimientoCh['valor'], 2, ',', '.') : ''; ?></td>
            <td style="text-align:right;font-weight: normal;"><?php echo $movimientoCh['tipo'] == 'egreso' ? number_format(abs($movimientoCh['valor']), 2, ',', '.') : ''; ?></td>
            <td style="text-align:right;font-weight: normal;"><?php echo number_format($saldoCh, 2, ',', '.'); ?></td>
    
            

            <? //if($fechacja==$fechahoy){?>
          <td style="padding-right: 3mm; text-align: center; vertical-align: middle;">

          <?php
  
  if($movimientoCh['id_orden']=='0'){ 
  
 ?>
                        <button type="button" class="btn btn-danger btn-sm" style="width: 40px;"  ondblclick="ajax_eliminapag('<?=$movimientoCh['id']?>','<?=$movimientoCh['tipo']?>');" tabindex="-1">✕</button>
                        

                        <?php
  
    }else{ ?>

      <?php
if($movimientoCh['tipo'] == 'ingreso'){ ?>
        <a href="../deuda_clientes/debe_haber?jhduskdsa=<?=base64_encode($movimientoCh['id_cliente'])?>" target="_blank">
      <button type="button" class="btn btn-success btn-sm" >⌾ </button>
    </a>

    <? }else{ 
  ?>
   <a href="../deuda_proveedores/debe_haber?jhduskdsa=<?=base64_encode($movimientoCh['id_proveedor'])?>&modo=<?=$movimientoCh['tipocuneta']?>" target="_blank">
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
                    <button type="button" class="btn  btn-outline-dark btn-lg" data-bs-toggle="collapse" data-bs-target="#cheques" style="width:100%; font-weight: bold;">Total Cheques $<?php echo number_format($saldoCh, 2, ',', '.'); ?></button> 








