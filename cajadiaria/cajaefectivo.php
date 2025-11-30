                      <?php

                      function totalingreo($rjdhfbpqj, $fechacja)
                      {
                        $totalingreso = 0;

                        $sqlingreso = mysqli_query($rjdhfbpqj, "SELECT id, modo, tipopag, fecha,valor FROM item_orden WHERE modo='1' AND tipopag='1' AND fecha ='$fechacja'");
                        while ($rowingreso = mysqli_fetch_array($sqlingreso)) {

                          $totalingreso += $rowingreso['valor'];
                        }
                        return $totalingreso;
                      }

                      function totaliegreso($rjdhfbpqj, $fechacja)
                      {
                        $totalinegreso = 0;

                        $sqlingefr = mysqli_query($rjdhfbpqj, "SELECT id, modopag, tipopag, fecha,valor FROM prodcom WHERE modopag='1' AND tipopag='1' AND fecha ='$fechacja'");
                        while ($rowiegreso = mysqli_fetch_array($sqlingefr)) {

                          $totalinegreso += $rowiegreso['valor'];
                        }
                        return $totalinegreso;
                      }






                      $cajantEfe = saldoanteriorn($rjdhfbpqj, '1', $fechacja);

                      // Consultas de ingresos y egresos
                      $ingresosE = mysqli_query($rjdhfbpqj, "SELECT id,idcuenta, id_orden, id_rubro, nombre, nota, valor,fecha_accion, id_cliente, 'ingreso' as tipo FROM item_orden WHERE modo='1' AND tipopag='1' AND fecha ='$fechacja' ORDER BY idcuenta ASC");
                      $egresosE = mysqli_query($rjdhfbpqj, "SELECT id, idcuenta, id_orden, id_rubro, tipocuneta, nota, valor,fecha_accion, id_proveedor, 'egreso' as tipo FROM prodcom WHERE modopag='1' AND tipopag='1' AND fecha = '$fechacja' ORDER BY idcuenta ASC");

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

                      $totalingreso = totalingreo($rjdhfbpqj, $fechacja);
                      $totalegreso = totaliegreso($rjdhfbpqj, $fechacja);
                      ?>
                      <div id="efectivo" class="collapse">
                        <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <td colspan="6" style="text-align:center;font-weight: bold;background-color: grey;color:white;cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#efectivo">Caja Efectivo</td>
                              <td class="text-center" style="cursor: pointer;">
                                <a href="#id301" onclick="document.getElementById('id301').focus();">
                                  ⬇︎
                                </a>
                              </td>

                            </tr>

                            <tr>
                              <?php if ($tipo_usuario == "0") { ?>
                                <th style="width: 40px;text-align:center">Hora</th>
                              <?php } ?>
                              <th style="width: 140px;text-align:center">Nº Orden</th>
                              <th class="text-center">Detalle</th>
                              <th style="width: 140px;text-align:center;">Ingreso</th>
                              <th style="width: 140px;text-align:center;">Egreso</th>
                              <th style="width: 140px;text-align:center;">Saldo</th>
                              <? //if($fechacja==$fechahoy){
                              ?>
                              <th style="width: 90px; padding-left: 10px;text-align: center;">Acción</th>
                              <? //}
                              ?>
                            </tr>
                          </thead>
                          <tbody>

                          <tbody>
                            <tr>
                              <td></td>
                              <td></td>
                              <td style="text-align:right;font-weight: normal;"><i>Caja Anterior<i></td>
                              <td></td>
                              <td></td>
                              <td style="text-align:right;font-weight: normal;"><i><?= number_format($cajantEfe, 2, ',', '.') ?><i></td>
                              <? //if($fechacja==$fechahoy){
                              ?><td></td> <? // }
                                          ?>
                            </tr>
                            <?php foreach ($movimientosE as $movimientoE):
                              $saldoE += $movimientoE['valor']; // Calcula el saldo actual
                            ?>
                              <tr>
                                <?php if ($tipo_usuario == "0") { ?>
                                  <td style="text-align:center;font-weight: normal;width: 50px;"><?= date("H:i", strtotime($movimientoE['fecha_accion'])) ?>hs.</td>
                                <?php } ?>
                                <td style="text-align:center;font-weight: normal;"><?php
                                                                                    if ($movimientoE['id_orden'] == '0') {
                                                                                      echo '';
                                                                                    } else {

                                                                                      if ($movimientoE['nombre'] != '') {
                                                                                        echo 'Nº' . $movimientoE['nombre'] . '';
                                                                                      } else {
                                                                                        echo 'Nº' . $movimientoE['id_orden'] . '';
                                                                                      }
                                                                                    }



                                                                                    ?></td>
                                <td style="font-weight: normal;">
                                  <?php if ($movimientoE['tipo'] == 'ingreso') {
                                    if ($movimientoE['id_orden'] == '0') {
                                      echo 'Cobro en Efectivo';
                                    } else {

                                      echo 'Cobro en Efectivo  ' . nombreclien($rjdhfbpqj, $movimientoE['id_cliente']) . '';
                                    }
                                  } else {

                                    if ($movimientoE['id_orden'] == '0') {
                                      echo 'Pago en Efectivo';
                                    } else {

                                      echo 'Pago en Efectivo ' . nombreproveedorn($rjdhfbpqj, $movimientoE['id_proveedor']) . '';
                                    }
                                  } ?> <?= nombrerubro($movimientoE['id_rubro']) ?> <?= $movimientoE['nota'] ?>
                                </td>
                                <td style="text-align:right;font-weight: normal;"><?php echo $movimientoE['tipo'] == 'ingreso' ? number_format($movimientoE['valor'], 2, ',', '.') : ''; ?></td>
                                <td style="text-align:right;font-weight: normal;"><?php echo $movimientoE['tipo'] == 'egreso' ? number_format(abs($movimientoE['valor']), 2, ',', '.') : ''; ?></td>
                                <td style="text-align:right;font-weight: normal;"><?php echo number_format($saldoE, 2, ',', '.'); ?></td>
                                <!--    
            <td style="text-align:center;font-weight: normal;">
                <button type="button" class="btn btn-primary btn-sm" ondblclick="ajax_eliminapag('<?php echo $movimientoE['id']; ?>');">⌾</button>
                </td>
 -->


                                <? //if($fechacja==$fechahoy){
                                ?>
                                <td style="padding-right: 3mm; text-align: center; vertical-align: middle;">

                                  <?php

                                  if ($movimientoE['id_orden'] == '0' && $movimientoE['id_proveedor'] == '0') {

                                  ?>
                                    <button type="button" class="btn btn-danger btn-sm" style="width: 40px;" ondblclick="ajax_eliminapag('<?= $movimientoE['id'] ?>','<?= $movimientoE['tipo'] ?>');" tabindex="-1">✕</button>


                                  <?php

                                  } else { ?>

                                    <?php
                                    if ($movimientoE['tipo'] == 'ingreso') { ?>
                                      <a href="../deuda_clientes/debe_haber?jhduskdsa=<?= base64_encode($movimientoE['id_cliente']) ?>" target="_blank">
                                        <button type="button" class="btn btn-success btn-sm">⌾ </button>
                                      </a>

                                    <? } else {
                                    ?>
                                      <a href="../deuda_proveedores/debe_haber?jhduskdsa=<?= base64_encode($movimientoE['id_proveedor']) ?>&modo=<?= $movimientoE['tipocuneta'] ?>" target="_blank">
                                        <button type="button" class="btn btn-primary btn-sm">⌾</button>
                                      </a>
                                  <? }
                                  }

                                  ?>
                                </td>
                                <? //}
                                ?>


                              </tr>
                            <?php endforeach; ?>
                          </tbody>


                        </table>
                      </div>

                      <button type="button" class="btn  btn-outline-dark btn-lg" data-bs-toggle="collapse" data-bs-target="#efectivo" style="width:100%; font-weight: bold;">
                        <?php echo '<span class="badge rounded-pill bg-secondary">Caja Anterior: $' . number_format($cajantEfe, 2, ',', '.') . '</span>
                      
                      
                      <span class="badge rounded-pill bg-success">Ingreso: $' . number_format($totalingreso, 2, ',', '.') . ' </span>
                      
                      <span class="badge rounded-pill bg-danger">Egreso: $' . number_format($totalegreso, 2, ',', '.') . ' </span>
                      '; ?><br>

                        Total


                        Efectivo $<?php echo number_format($saldoE, 2, ',', '.'); ?></button>