<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');
require ('../salidas/mpdf.php');

$fechacja=$_GET['fechacja'];
if(empty($fechacja)){$fechacja=$fechahoy;}

$fechacjaver=date('d/m/Y', strtotime($fechacja));

function nombreclien($rjdhfbpqj,$idcliente){
$sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$idcliente'");
if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

    $nobrecliente="(".$rowclientes["nom_contac"].")";}

    return $nobrecliente;
}


function nombreproveedorn($rjdhfbpqj,$idproveedo){
    $sqloprov = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id='$idproveedo'");
    if ($rowprov = mysqli_fetch_array($sqloprov)) {
    
        $nobreprov="(".$rowprov["empresa"].")";}
    
        return $nobreprov;
    }


    function nombrerubro($id_rubro){

      switch ($id_rubro) {
          case '1':
              echo "Servicios";
              break;
          case '2':
              echo "Insumos";
              break;
          case '3':
              echo "Alquileres";
              break;
          case '4':
              echo "Reparaciones";
              break;
          case '5':
              echo "Otros";
              break;
          case '6':
              echo "Combustible";
              break;
          case '7':
              echo "Comida";
              break;
          default:
              echo "";
              break;
      }
      }

    function saldoanteriorn($rjdhfbpqj,$tipopagv,$fechacja){
        if($tipopagv=='77'){$sqloc=" AND (tipopag='2' OR tipopag='3')";}
        else{$sqloc=" AND tipopag='$tipopagv'";}
        //sumo la entrada de dinero
        $sqloprov = mysqli_query($rjdhfbpqj, "SELECT valor FROM item_orden Where  modo='1' AND fecha <'$fechacja' $sqloc");
        while ($rowprov = mysqli_fetch_array($sqloprov)) {
        
            $ingresoant+=$rowprov["valor"];
        
        }
             //sumo la entrada de dinero
             $sqloprova = mysqli_query($rjdhfbpqj, "SELECT valor FROM prodcom Where  modopag='1' AND fecha < '$fechacja' $sqloc");
             while ($rowprovd = mysqli_fetch_array($sqloprova)) {
             
                 $egresoant+=$rowprovd["valor"];
             
             }
             $totalsaldoant=$ingresoant-$egresoant;


            return $totalsaldoant;
    }

    ob_start(); ?>   
<style>

body {
    font-size: 10pt;
    font-family: Arial, sans-serif;
}
th, td {
        border-bottom: 1px solid #000000;
        border-left: 1px solid #000000;
        border-right: 1px solid #000000;
        padding: 2px;
    }

  
    .tdderechaf {
	border-right-width: 1pt;
	border-right-style: solid;
	border-right-color: #000000;
	border-bottom-width: 1pt;
	border-bottom-style: solid;
	border-bottom-color: #000000;
	width: 80px;

}


</style>

 <!DOCTYPE html>


<html lang="es">

<head>
    <title>Sistema de Caja Diaria </title>
    <meta charset="utf-8">





</head>

<body>




  
    <div >
 
             <div >

                            <h2>Caja Diaria <?=$fechacjaver?>
                            </h2>

                        <?php
                        
                        if($tipo_usuario=="0" || $tipo_usuario=="37"){ ?>
                                                 
<?php
$cajantEfe=saldoanteriorn($rjdhfbpqj,'1',$fechacja);

// Consultas de ingresos y egresos
$ingresosE = mysqli_query($rjdhfbpqj, "SELECT id,idcuenta, id_rubro,id_orden, nota,nombre, valor, id_cliente, 'ingreso' as tipo FROM item_orden WHERE modo='1' AND tipopag='1' AND fecha ='$fechacja' ORDER BY idcuenta ASC");
$egresosE = mysqli_query($rjdhfbpqj, "SELECT  id,idcuenta, id_rubro, id_orden, tipocuneta, nota, valor, id_proveedor, 'egreso' as tipo FROM prodcom WHERE modopag='1' AND tipopag='1' AND fecha = '$fechacja' ORDER BY idcuenta ASC");

// Combina los resultados en un solo array
$movimientosE = [];
while ($rowE = mysqli_fetch_assoc($ingresosE)) {
    $rowE['valor'] = floatval($rowE['valor']); // Asegura que sea numérico
    $movimientosE[] = $rowE;
}
while ($rowE = mysqli_fetch_assoc($egresosE)) {
    $rowE['valor'] = -floatval($rowE['valor']); // Egresos en negativo
    $movimientosE[] = $rowE;
}

// Ordena por I
usort($movimientosE, function ($aE, $bE) {
    return $aE['idcuenta'] <=> $bE['idcuenta'];
});

// Inicia el saldo y muestra la tabla
$saldoE = $cajantEfe;
?>
 <div id="efectivo">        
  <table border="0" align="center" cellpadding="0" cellspacing="0" style="width:100%;"> 
    <thead>
  <tr>
        <td  colspan="5" style="text-align:center;font-weight: bold;background-color: black;color:white;cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#efectivo" >Caja Efectivo</td>
                      
                        
      </tr>
   
      <tr>
        <th  style="width: 140px;text-align:center">Nº Orden</th>
        <th >Detalle</th>
        <th style="width: 140px;text-align:center;">Ingreso</th>
        <th style="width: 140px;text-align:center;">Egreso</th>
        <th style="width: 140px;text-align:center;">Saldo</th>
 
      </tr>
    </thead>
    <tbody>

    <tbody>
    <tr>
    <td></td>
    <td style="text-align:right;font-weight: normal;"><i>Caja Anterior<i></td>
    <td></td>
    <td></td>
    <td style="text-align:right;font-weight: normal;"><i><?=number_format($cajantEfe, 2, ',', '.')?><i></td>

        </tr>
        <?php foreach ($movimientosE as $movimientoE): 
            $saldoE += $movimientoE['valor']; // Calcula el saldo actual
        ?>
        <tr>
            <td style="text-align:center;font-weight: normal;"><?php 
        
            if($movimientoE['id_orden']=='0'){ echo ''; }else{

              if($movimientoE['nombre']!=''){echo 'Nº'.$movimientoE['nombre'].''; }else{echo 'Nº'.$movimientoE['id_orden'].''; }

              
            }
            
            
            ?></td>
            <td style="font-weight: normal;">
              <?php if($movimientoE['tipo'] == 'ingreso'){
                if($movimientoE['id_orden']=='0'){ echo 'Cobro en Efectivo'; }else{ 

                  echo 'Cobro en Efectivo  '.nombreclien($rjdhfbpqj,$movimientoE['id_cliente']).'';
                }
                
              
              }else{

                if($movimientoE['id_orden']=='0'){ echo 'Pago en Efectivo'; }else{

                  echo 'Pago en Efectivo '.nombreproveedorn($rjdhfbpqj,$movimientoE['id_proveedor']).'';
                }


                } ?> <?=nombrerubro($movimientoE['id_rubro'])?> <?=$movimientoE['nota']?>
            </td>
            <td style="text-align:right;font-weight: normal;"><?php echo $movimientoE['tipo'] == 'ingreso' ? number_format($movimientoE['valor'], 2, ',', '.') : ''; ?></td>
            <td style="text-align:right;font-weight: normal;"><?php echo $movimientoE['tipo'] == 'egreso' ? number_format(abs($movimientoE['valor']), 2, ',', '.') : ''; ?></td>
            <td style="text-align:right;font-weight: normal;"><?php echo number_format($saldoE, 2, ',', '.'); ?></td>




        </tr>
        <?php endforeach; ?>

        <tr>
                <td  colspan="5" style="text-align:center;">
           <h3> Total Efectivo $<?php echo number_format($saldoE, 2, ',', '.'); ?> </h3>
            </td>

            </tr>
    </tbody>


  </table>
                    </div>
                        
                        
                        <?
                        }
                        if($tipo_usuario=="0"){ ?>
                            
                            
                            <br>                     
<br>                     
<?php
$cajantBan=saldoanteriorn($rjdhfbpqj,'77',$fechacja);
// Consultas de ingresos y egresos
$ingresosB = mysqli_query($rjdhfbpqj, "SELECT id,idcuenta, id_rubro,id_orden, nombre,nota, valor, id_cliente, 'ingreso' as tipo FROM item_orden WHERE modo='1' AND (tipopag='2' OR tipopag='3') AND fecha ='$fechacja' ORDER BY idcuenta ASC");
$egresosB = mysqli_query($rjdhfbpqj, "SELECT  id,idcuenta, id_rubro, id_orden, tipocuneta, nota, valor, id_proveedor, 'egreso' as tipo FROM prodcom WHERE modopag='1' AND (tipopag='2' OR tipopag='3') AND fecha = '$fechacja' ORDER BY idcuenta ASC");

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
 <div id="banco">        
 <table border="0" align="center" cellpadding="0" cellspacing="0" style="width:100%;"> 
    <thead>
  <tr>
        <td  colspan="5" style="text-align:center;font-weight: bold;background-color: black;color:white;cursor: pointer;" >Caja Banco</td>
                      
                        
      </tr>
   
      <tr>
        <th  style="width: 140px;text-align:center">Nº Orden</th>
        <th >Detalle</th>
        <th style="width: 140px;text-align:center;">Ingreso</th>
        <th style="width: 140px;text-align:center;">Egreso</th>
        <th style="width: 140px;text-align:center;">Saldo</th>
      
      </tr>
    </thead>
    <tbody>
    <tr>
    <td></td>
    <td style="text-align:right;font-weight: normal;"><i>Caja Anterior<i></td>
    <td></td>
    <td></td>
    <td style="text-align:right;font-weight: normal;"><i><?=number_format($cajantBan, 2, ',', '.')?><i></td>
  
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


                } ?> <?=nombrerubro($movimientoB['id_rubro'])?> <?=$movimientoB['nota']?>
            </td>
            <td style="text-align:right;font-weight: normal;"><?php echo $movimientoB['tipo'] == 'ingreso' ? number_format($movimientoB['valor'], 2, ',', '.') : ''; ?></td>
            <td style="text-align:right;font-weight: normal;"><?php echo $movimientoB['tipo'] == 'egreso' ? number_format(abs($movimientoB['valor']), 2, ',', '.') : ''; ?></td>
            <td style="text-align:right;font-weight: normal;"><?php echo number_format($saldoB, 2, ',', '.'); ?></td>
    
            

      


        </tr>
        <?php endforeach; ?>

        <tr>
            <td  colspan="5" style="text-align:center;">
                
            
           <h3> Total Banco $<?php echo number_format($saldoB, 2, ',', '.'); ?> </h3>
            </td>
            </tr>
    </tbody>


  </table>
                    </div>
                  
                        
                        
                        
                     <?   }
                            if($tipo_usuario=="0" || $tipo_usuario=="37") { ?>
                            
                            <br><br>                    
<?php
$cajantCh=saldoanteriorn($rjdhfbpqj,'4',$fechacja);
// Consultas de ingresos y egresos
$ingresosCh = mysqli_query($rjdhfbpqj, "SELECT id,idcuenta, id_rubro,id_rubro,id_orden,nombre, nota, ncheque, vencheque, valor, id_cliente, 'ingreso' as tipo FROM item_orden WHERE modo='1' AND tipopag='4' AND fecha ='$fechacja' ORDER BY idcuenta ASC");
$egresosCh = mysqli_query($rjdhfbpqj, "SELECT  id,idcuenta, id_rubro, id_orden, tipocuneta, nota, ncheque, vencheque, valor, id_proveedor, 'egreso' as tipo FROM prodcom WHERE modopag='1' AND tipopag='4' AND fecha = '$fechacja' ORDER BY idcuenta ASC");

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
 <div id="cheques" >        
 <table border="0" align="center" cellpadding="0" cellspacing="0" style="width:100%;"> 
    <thead>
  <tr>
        <td  colspan="8" style="text-align:center;font-weight: bold;background-color: black;color:white;cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#cheques" >Caja Cheque</td>
                      
                        
      </tr>
   
      <tr> 
      <th  style="width: 140px;text-align:center">Nº Orden</th>
      <th  style="width: 140px;text-align:center">Nº Cheque</th>
        <th  style="width: 140px;text-align:center">Fecha Cob.</th>       
        <th style="width: 210px;">Detalle</th>
        <th style="width: 140px;text-align:center;">Ingreso</th>
        <th style="width: 140px;text-align:center;">Egreso</th>
        <th style="width: 140px;text-align:center;">Saldo</th>

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


                } ?> <?=nombrerubro($movimientoCh['id_rubro'])?> <?=$movimientoCh['nota']?>
            </td>
            <td style="text-align:right;font-weight: normal;"><?php echo $movimientoCh['tipo'] == 'ingreso' ? number_format($movimientoCh['valor'], 2, ',', '.') : ''; ?></td>
            <td style="text-align:right;font-weight: normal;"><?php echo $movimientoCh['tipo'] == 'egreso' ? number_format(abs($movimientoCh['valor']), 2, ',', '.') : ''; ?></td>
            <td style="text-align:right;font-weight: normal;"><?php echo number_format($saldoCh, 2, ',', '.'); ?></td>
    
            



        </tr>
        <?php endforeach; ?>

        <tr>
            <td  colspan="7" style="text-align:center;">
                
            
           <h3>Total Cheques $<?php echo number_format($saldoCh, 2, ',', '.'); ?> </h3>
            </td>
            </tr>
    </tbody>


  </table>
                    </div>








                            
                            
                            
                        <?    } 
                                if($tipo_usuario=="0"){ ?>
                                    
                                    
                                    <br><br>   
                                    <br><br> 
                                    <br><br> 
                                    <br><br> 
                                    <br><br> 
                                    <br><br> 
                                    <br><br> 
                                    <br><br>                  
                                    <?php
$cajantECh=saldoanteriorn($rjdhfbpqj,'6',$fechacja);
// Consultas de ingresos y egresos
$ingresosECh = mysqli_query($rjdhfbpqj, "SELECT id,idcuenta, id_orden, id_rubro,nombre, nota, ncheque, vencheque, valor, id_cliente, 'ingreso' as tipo FROM item_orden WHERE modo='1' AND tipopag='6' AND fecha ='$fechacja' ORDER BY idcuenta ASC");
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
 <div id="echeques" >        
 <table border="0" align="center" cellpadding="0" cellspacing="0" style="width:100%;"> 
    <thead>
  <tr>
        <td  colspan="8" style="text-align:center;font-weight: bold;background-color: black;color:white;cursor: pointer;" >Caja ECheq</td>
                      
                        
      </tr>
   
      <tr> 
      <th  style="width: 140px;text-align:center">Nº Orden</th>
      <th  style="width: 140px;text-align:center">Nº Cheque</th>
        <th  style="width: 140px;text-align:center">Fecha Cob.</th>       
        <th  style="width: 210px;">Detalle</th>
        <th style="width: 140px;text-align:center;">Ingreso</th>
        <th style="width: 140px;text-align:center;">Egreso</th>
        <th style="width: 140px;text-align:center;">Saldo</th>
    
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
    
            


        </tr>
        <?php endforeach; ?>
        <tr>
            <td  colspan="7" style="text-align:center;">
                
            
           <h3>Total ECheq $<?php echo number_format($saldoECh, 2, ',', '.'); ?> </h3>
            </td>
            </tr>
    </tbody>


  </table>
                    </div>
                 








 
                                
                                
                                
                              <?  }
                        
                        ?>


</div>
  

            
            



          </div>  
          
        
   

   
  

  

</body>

</html>

<?  //envio de PDF

$html = ob_get_contents();
ob_end_clean();
$mpdf->shrink_tables_to_fit = 0;
$mpdf->ignore_table_widths = false;
$mpdf = new mPDF('c', 'A4-L');
$mpdf->writeHTML($css, 1);


//$mpdf->SetHTMLFooter('<p style="font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Haga su pedido al 4709-3075 // 15-2415-0520 o 15-5429-6101 Num venta: 615252</p>');
$mpdf->AddPageByArray([
    "margin-left" => "10mm",
    "margin-right" => "10mm",
    "margin-top" => "5mm",
    "margin-bottom" => "15mm"
]);

$mpdf->writeHTML($html);
$mpdf->Output('Caja_Diaria_' . $fechacja . '.pdf', 'D'); //D




?>