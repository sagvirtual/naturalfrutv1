<br><br>                    
<?php
$cajantECh=saldoanteriorn($rjdhfbpqj,'6',$fechacja);
// Consultas de ingresos y egresos
$ingresosECh = mysqli_query($rjdhfbpqj, "SELECT id,idcuenta, id_orden, id_rubro, nota,nombre, ncheque, vencheque, valor, id_cliente, 'ingreso' as tipo FROM item_orden WHERE modo='1' AND tipopag='6' AND fecha ='$fechacja' ORDER BY idcuenta ASC");
$egresosECh = mysqli_query($rjdhfbpqj, "SELECT id, idcuenta, id_orden,  id_rubro,tipocuneta, nota, ncheque, vencheque, valor, id_proveedor, 'egreso' as tipo FROM prodcom WHERE modopag='1' AND tipopag='6' AND fecha = '$fechacja' ORDER BY idcuenta ASC");

// Combina los resultados en un solo array
$movimientosECh = [];
while ($rowECh = mysqli_fetch_assoc($ingresosECh)) {
    $rowECh['valor'] = floatval($rowECh['valor']); // Asegura que sea numérico
    $movimientosECh[] = $rowECh;
}
while ($rowECh = mysqli_fetch_assoc($egresosECh)) {
    $rowECh['valor'] = -floatval($rowECh['valor']); // EChgresos en negativo
    $movimientosECh[] = $rowECh;
}

// Ordena por I
usort($movimientosECh, function ($aECh, $bECh) {
    return $aECh['idcuenta'] <=> $bECh['idcuenta'];
});

// Inicia el saldo y muestra la tabla
$saldoECh = $cajantECh;
?>
 <div id="echeques" class="collapse">        
  <table class="table table-bordered table-striped"> 
    <thead>
  <tr>
        <td  colspan="8" style="text-align:center;font-weight: bold;background-color: grey;color:white;cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#echeques" >Movimiento ECheq</td>
                      
                        
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
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td style="text-align:right;font-weight: normal;"><i>Caja Anterior<i></td>
    <td></td>
    <td></td>
    <td style="text-align:right;font-weight: normal;"><i><?=number_format($cajantECh, 2, ',', '.')?><i></td>
    <? //if($fechacja==$fechahoy){?><td></td> <? //}?>
        </tr>

    <tbody>
        <?php foreach ($movimientosECh as $movimientoECh): 
            $saldoECh += $movimientoECh['valor']; // Calcula el saldo actual
        ?>
        <tr>
            <td style="text-align:center;font-weight: normal;"><?php 
          

            if($movimientoECh['id_orden']=='0'){ echo ''; }else{

              if($movimientoECh['nombre']!=''){echo 'Nº'.$movimientoECh['nombre'].''; }else{echo 'Nº'.$movimientoECh['id_orden'].''; }

              
            }
            
            
            
            ?></td>
            <td style="font-weight: normal;text-align:center"><?=$movimientoECh['ncheque']?></td>
            <td style="font-weight: normal;text-align:center"><?=date('d/m/Y', strtotime($movimientoECh['vencheque']))?></td>

            <td style="font-weight: normal;">
              <?php if($movimientoECh['tipo'] == 'ingreso'){
                if($movimientoECh['id_orden']=='0'){ echo 'Cobro en ECheque'; }else{ 

                  echo 'Cobro en ECheque  '.nombreclien($rjdhfbpqj,$movimientoECh['id_cliente']).'';
                }
                
              
              }else{

                if($movimientoECh['id_orden']=='0'){ echo 'Pago en ECheque'; }else{

                  echo 'Pago en ECheque '.nombreproveedorn($rjdhfbpqj,$movimientoECh['id_proveedor']).'';
                }


                } ?>  <?=nombrerubro($movimientoECh['id_rubro'])?> <?=$movimientoECh['nota']?>
            </td>
            <td style="text-align:right;font-weight: normal;"><?php echo $movimientoECh['tipo'] == 'ingreso' ? number_format($movimientoECh['valor'], 2, ',', '.') : ''; ?></td>
            <td style="text-align:right;font-weight: normal;"><?php echo $movimientoECh['tipo'] == 'egreso' ? number_format(abs($movimientoECh['valor']), 2, ',', '.') : ''; ?></td>
            <td style="text-align:right;font-weight: normal;"><?php echo number_format($saldoECh, 2, ',', '.'); ?></td>
    
            

            <? //if($fechacja==$fechahoy){?>
          <td style="padding-right: 3mm; text-align: center; vertical-align: middle;">

          <?php
  
  if($movimientoECh['id_orden']=='0'){ 
  
 ?>
                        <button type="button" class="btn btn-danger btn-sm" style="width: 40px;"  ondblclick="ajax_eliminapag('<?=$movimientoECh['id']?>','<?=$movimientoECh['tipo']?>');" tabindex="-1">✕</button>
                        

                        <?php
  
    }else{ ?>

      <?php
if($movimientoECh['tipo'] == 'ingreso'){ ?>
        <a href="../deuda_clientes/debe_haber?jhduskdsa=<?=base64_encode($movimientoECh['id_cliente'])?>" target="_blank">
      <button type="button" class="btn btn-success btn-sm" >⌾ </button>
    </a>

    <? }else{ 
  ?>
   <a href="../deuda_proveedores/debe_haber?jhduskdsa=<?=base64_encode($movimientoECh['id_proveedor'])?>&modo=<?=$movimientoECh['tipocuneta']?>" target="_blank">
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
                    <button type="button" class="btn  btn-outline-dark btn-lg" data-bs-toggle="collapse" data-bs-target="#echeques" style="width:100%; font-weight: bold;">Movimiento ECheq </button> 








