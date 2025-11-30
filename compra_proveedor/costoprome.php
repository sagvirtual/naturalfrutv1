<?php

include('../control_stock/funcionStockSnot.php');
$sqlchrdaa = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where  id_orden='$id_orden' ");
if ($rowcoempa = mysqli_fetch_array($sqlchrdaa)) {

?>


    <hr><br>
    <div class="container text-center">
        <table class="table table-bordered">
            <h4><strong>Costo Productos para lista de precios</strong></h4>
            <thead>
                <tr>
                <th style="text-align: center;">Id Prod.</th>
                    <th style="text-align: center;">
                        <ds style="text-align: center; position: relative; top:-8px">Vencimiento</ds>
                    </th>
                    <th style="text-align: center;">Stock Agregado</th>

                    <th style="text-align: center;">
                        <ds style="text-align: center; position: relative; top:-8px">Detalle</ds>
                    </th>
                    <th style="text-align: center; display:none;">Precio<br>Unidad</th>

                    <th style="text-align: center; display:none;">
                        <ns style="position: relative; top:-8px">Desc.</ns>
                    </th>
                    <th style="text-align: center; display:none;">Precio<br>C/Desc.</th>
                    <th style="text-align: center; display:none;">IIBB<br>BS&nbsp;AS</th>
                    <th style="text-align: center; display:none;">IIBB<br>CABA</th>
                    <th style="text-align: center; display:none;">Perc.<br>IVA</th>
                    <th style="text-align: center; display:none;">
                        <ns style="position: relative; top:-8px">IVA</ns>
                    </th>
                    <th style="text-align: center; display:none;">Precio<br>Brut.</th>
                    <th style="text-align: center; display:none;">Desc.<br>Adic.</th>


                    <th style="text-align: center;">Precio&nbsp;Final<br>Unidad</th>
                    <th style="text-align: center;">&nbsp;&nbsp;</th>
                    <th style="text-align: center;">Presentación </th>
                    <th style="text-align: center;">Precio&nbsp;Final</th>
                    <th style="text-align: center;">Stock Hoy<br><?=date('d/m/y', strtotime($fechahoy))?></th>
                </tr>
            </thead>
            <tbody>





<?php

                 //esxtraifgo del dato verdadero
                  $vecor = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_orden='$id_orden' and modo='0'");
                  while ($rowcddddpr = mysqli_fetch_array($vecor)) {
                      $id_pdsroducto = $rowcddddpr["id_producto"];
                      $canxbule = $rowcddddpr["kilo"];
                      $fecvend = $rowcddddpr["fecven"];

                      $precio_unid_ponderado=$rowcddddpr['costo_total'];
                      $precio_promedio_bulto=$rowcddddpr['costo_total']*$rowcddddpr["kilo"];
                      $agrstocksd = $rowcddddpr["agrstock"];
                      $agrstockdsdbult = $agrstocksd / $canxbule;
                      $agrstocksdbult = number_format($agrstockdsdbult, 0, '.', '');

                  
$sqlprodcom = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_pdsroducto'");
if ($rowprdodtos = mysqli_fetch_array($sqlprodcom)) {

    $nombreproea = $rowprdodtos["nombre"];
    $unidadnomave = $rowprdodtos["unidadnom"];
    $modo_productoe = $rowprdodtos["modo_producto"];
    $unidadnavds = $rowprdodtos["modo_producto"];
    //$canxbule = $rowprdodtos["kilo"];

 
   
}
 

                  $costolisv = number_format($precio_unid_ponderado, 2, ',', '.');
                  //$costdsunldsdv = number_format($precio_promedio_ponderado, 2, ',', '.');
                  
                  //$precio_promedio_bulto=$precio_promedio_ponderado * $canxbule;
                  
                  $costdsunldsdvt = number_format($precio_promedio_bulto, 2, ',', '.');

                  // Mostrar el resultado
               
                 // $costolisv = number_format($costolis, 2, ',', '.');display:none;
              
              if ($modounid == '2') {

                  $unidavds = $unidadnomave;

                  $nombredpro = $nombreproea;
              }
              if ($modounid == '1') {
                  $unidavds = $unidadnavds;

                  $nombredpro = $nombreproea . " - " . $unidadnavds . " x " . $canxbule . " " . $unidadnomave;
              }
              
              $nombreded=$unidadnavds . " x " . $canxbule . " " . $unidadnomave;

              $stockdispom= SumaStock($rjdhfbpqj,$id_pdsroducto);
              $buldoshdoy=$stockdispom / $canxbule;
              $bultoshoy= number_format($buldoshdoy, 0, '.', '');
              $bultoshoyc=$bultoshoy.' '.$unidadnavds;

 echo '
 <tr>
 <td style="text-align: center; width: 30mm;">' . $id_pdsroducto . '</td>
 <td style="text-align: center; width: 30mm;">' . date("d-m-Y", strtotime($fecvend)) . '</td>
 <td style="text-align: center; width: 30mm;">'.$agrstocksdbult.' '.$unidadnavds.' <br>' . $agrstocksd . ' ' . $unidadnomave . '</td>

 <td style="text-align: left;">' . $nombredpro . '</td>
 <td style="text-align: right;  width: 30mm; display:none;">$' . $costolisv . '</td>
 <td style="text-align: center;  width: 30mm; display:none;">% ' . $desclis . '</td>
 <td style="text-align: right; width: 30mm; display:none;">$' . $predesclisv . '</td>
 <td style="text-align: center; width: 30mm; display:none;">% ' . $iibb_bsaslisv . '</td>
 <td style="text-align: center; width: 30mm; display:none;">% ' . $iibb_cabalisv . '</td>
 <td style="text-align: center; width: 30mm; display:none;">% ' . $perc_ivalisv . '</td>
 <td style="text-align: center; width: 30mm; display:none;">% ' . $ivalisv . '</td>
 <td style="text-align: right; width: 30mm; display:none;">$' . $tolimldresv . '</td>
 <td style="text-align: center; width: 30mm; display:none;">% ' . $descadilisv . '</td>


 <td style="text-align: right; width: 30mm;"><strong>$' . $costolisv . '</strong></td>
 <td style="text-align: right; width: 5mm;"></td>
 <td style="text-align: center; width: 40mm;">' . $nombreded . '</td>
 <td style="text-align: right; width: 30mm;"><strong>$' . $costdsunldsdvt . '</strong></td>
 <td style="text-align: center; width: 30mm;">'.$bultoshoyc.'<br>' . $stockdispom . ' '.$unidadnomave.'</td>


     </tr>';
    
    }
 
?>





            
            </tbody>
        </table>




        <br>
    </div>

<?php

} ?>

<br>
<br>
<br>
<br>
<br>