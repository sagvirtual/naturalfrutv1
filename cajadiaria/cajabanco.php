<br>                     
<br>                     
<?php
$cajantBan=saldoanteriorn($rjdhfbpqj,'77',$fechacja);
// Consultas de ingresos y egresos
$ingresosB = mysqli_query($rjdhfbpqj, "SELECT id,idcuenta, id_orden, id_rubro, nota, nombre, valor, id_cliente, 'ingreso' as tipo FROM item_orden WHERE modo='1' AND (tipopag='2' OR tipopag='3') AND fecha ='$fechacja' ORDER BY idcuenta ASC");
$egresosB = mysqli_query($rjdhfbpqj, "SELECT id, idcuenta, id_orden, id_rubro, tipocuneta, nota, valor, id_proveedor, 'egreso' as tipo FROM prodcom WHERE modopag='1' AND (tipopag='2' OR tipopag='3') AND fecha = '$fechacja' ORDER BY idcuenta ASC");

// Combina los resultados en un solo array
$movimientosB = [];
while ($rowB = mysqli_fetch_assoc($ingresosB)) {
    $rowB['valor'] = floatval($rowB['valor']); // Asegura que sea numérico
    $movimientosB[] = $rowB;
}
while ($rowB = mysqli_fetch_assoc($egresosB)) {
    $rowB['valor'] = -floatval($rowB['valor']); // Bgresos en negativo
    $movimientosB[] = $rowB;
}

// Ordena por I
usort($movimientosB, function ($aB, $bB) {
    return $aB['idcuenta'] <=> $bB['idcuenta'];
});

// Inicia el saldo y muestra la tabla
$saldoB = $cajantBan;
?>
 <div id="banco" class="collapse">        
  <table class="table table-bordered table-striped"> 
    <thead>
  <tr>
        <td  colspan="6" style="text-align:center;font-weight: bold;background-color: grey;color:white;cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#banco" >Movimiento Banco</td>
                      
                        
      </tr>
   
      <tr>
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
    <tr>
    <td></td>
    <td style="text-align:right;font-weight: normal;"><i>Caja Anterior<i></td>
    <td></td>
    <td></td>
    <td style="text-align:right;font-weight: normal;"><i><?=number_format($cajantBan, 2, ',', '.')?><i></td>
    <? //if($fechacja==$fechahoy){?><td></td> <? //}?>
        </tr>
        <?php foreach ($movimientosB as $movimientoB): 
            $saldoB += $movimientoB['valor']; // Calcula el saldo actual
        ?>
        <tr>
            <td style="text-align:center;font-weight: normal;"><?php 
         
            if($movimientoB['id_orden']=='0'){ echo ''; }else{

              if($movimientoB['nombre']!=''){echo 'Nº'.$movimientoB['nombre'].''; }else{echo 'Nº'.$movimientoB['id_orden'].''; }

              
            }
            
            
            
            ?></td>
            <td style="font-weight: normal;">
              <?php if($movimientoB['tipo'] == 'ingreso'){
                if($movimientoB['id_orden']=='0'){ echo 'Cobro en Banco'; }else{ 

                  echo 'Cobro en Banco  '.nombreclien($rjdhfbpqj,$movimientoB['id_cliente']).'';
                }
                
              
              }else{

                if($movimientoB['id_orden']=='0'){ echo 'Pago en Banco'; }else{

                  echo 'Pago en Banco '.nombreproveedorn($rjdhfbpqj,$movimientoB['id_proveedor']).'';
                }


                } ?>  <?=nombrerubro($movimientoB['id_rubro'])?> <?=$movimientoB['nota']?>
            </td>
            <td style="text-align:right;font-weight: normal;"><?php echo $movimientoB['tipo'] == 'ingreso' ? number_format($movimientoB['valor'], 2, ',', '.') : ''; ?></td>
            <td style="text-align:right;font-weight: normal;"><?php echo $movimientoB['tipo'] == 'egreso' ? number_format(abs($movimientoB['valor']), 2, ',', '.') : ''; ?></td>
            <td style="text-align:right;font-weight: normal;"><?php echo number_format($saldoB, 2, ',', '.'); ?></td>
    
            

            <? //if($fechacja==$fechahoy){?>
          <td style="padding-right: 3mm; text-align: center; vertical-align: middle;">

          <?php
  
  if($movimientoB['id_orden']=='0'){ 
  
 ?>
                        <button type="button" class="btn btn-danger btn-sm" style="width: 40px;"  ondblclick="ajax_eliminapag('<?=$movimientoB['id']?>','<?=$movimientoB['tipo']?>');" tabindex="-1">✕</button>
                        

                        <?php
  
    }else{ ?>

      <?php
if($movimientoB['tipo'] == 'ingreso'){ ?>
        <a href="../deuda_clientes/debe_haber?jhduskdsa=<?=base64_encode($movimientoB['id_cliente'])?>" target="_blank">
      <button type="button" class="btn btn-success btn-sm" >⌾ </button>
    </a>

    <? }else{ 
  ?>
   <a href="../deuda_proveedores/debe_haber?jhduskdsa=<?=base64_encode($movimientoB['id_proveedor'])?>&modo=<?=$movimientoB['tipocuneta']?>" target="_blank">
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
                    <button type="button" class="btn  btn-outline-dark btn-lg" data-bs-toggle="collapse" data-bs-target="#banco" style="width:100%; font-weight: bold;">Movimiento Banco </button> 