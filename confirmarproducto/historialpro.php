
                                
                                <div class="accordion" id="accordionExample">
                                  <div class="card">
                                    <div class="card-header" id="headingOne">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne<?=$idpe?>" aria-expanded="true" aria-controls="collapseOne"><?=$nombrepro?> </button>
                                      </h2>
                                    </div>
                                    <div id="collapseOne<?=$idpe?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                      <div class="card-body">
                      



             
                     

                                                                <?php
                                                                 
                                                                if(empty($unidadnomav)){$unidadnomav="Kg.";}
                                                                if(empty($unidadver)){$unidadver="Caja";}
                                                                 
                                                                ?>




                                <table id="tech-companies-1" class="table table-bordered ">
                                    <thead>
                                        <tr style="background-color: #EBEDEF;">
                                        <th class="text-center" style="width:100px; background-color: #C8C8C8;">FECHA
                                            </th>
                                            <th class="text-center" style="width:100px; background-color: #C8C8C8;">MODO
                                            </th>
                                            <th class="text-center" style="width:100px;">PRECIO<br>POR&nbsp;<lrt id="seleccionb"><?= $unidadnomav ?></lrt>
                                            </th>
                                            <th class="text-center" style="width:60px;">
                                                <pa style="position: relative; top:-8px">DESC.</pa>
                                            </th>
                                            <th class="text-center" style="width:100px;">PRECIO<br>C/DESC.</th>
                                            <th class="text-center" style="width:60px;">IIBB<br>BS&nbsp;AS</th>
                                            <th class="text-center" style="width:60px;">IIBB<br>CABA</th>
                                            <th class="text-center" style="width:60px;">PERC<br>IVA</th>
                                            <th class="text-center" style="width:60px;">
                                                <pa style="position: relative; top:-8px">IVA</pa>
                                            </th>
                                            <th class="text-center" style="width:100px;">PRECIO<br>BRUTO</th>
                                            <th class="text-center" style="width:60px;">DESC.<br>ADICIONAL</th>
                                            <th class="text-center" style="background-color: #C8C8C8;">COSTO<br>FINAL&nbsp;X&nbsp;<ltr for="inputEmail4" id="seleccionc"><?= $unidadnom ?> 
                              
                                            </th>
                                        </tr>
                                    </thead>
                                    <tr>
                                            
                                            <th class="text-center"></th>
                                            <th class="text-center"></hu>
                                            </th>
                                            <th class="text-center">$</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center">$</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center">$</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center">$</th>


                                        </tr>
                                    <tbody>
                                       

                                        <?php
                          

                          //fecha
                          $sqlprecioprodf = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idpe' ORDER BY `precioprod`.`fecha` DESC");
                          while ($rowprecioprodf = mysqli_fetch_array($sqlprecioprodf)) {
                              $fechalist = $rowprecioprodf["fecha"];
                              $idpreciolis = $rowprecioprodf["id"];
                              $id_orden = $rowprecioprodf["id_orden"];
                              $nref = $rowprecioprodf["nref"];

                              if($nref=="Compra"){ 
                                $liknumero='<br><a href="/compra_proveedor?ookdjfv='.$rowprecioprodf["id_proveedor"].'&idcomopra='.$rowprecioprodf["id_orden"].'" target="_blank"><span class="badge badge-dark">Nº '.$rowprecioprodf["id_orden"].'</span> </a>';
                            }else{$liknumero='';}
                              $nreflis = $rowprecioprodf["nref"];
                              $costoxcajlis = $rowprecioprodf["costoxcaj"];
                              $costolis = $rowprecioprodf["costo"];
                              $descuentolis = $rowprecioprodf["descuento"];
                              $pcondesculis = $rowprecioprodf["pcondescu"];
                              $iibb_bsaslis = $rowprecioprodf["iibb_bsas"];
                              $iibb_cabalis = $rowprecioprodf["iibb_caba"];
                              $perc_ivalis = $rowprecioprodf["perc_iva"];
                              $ivalis = $rowprecioprodf["iva"];
                              $pbrutolsi = $rowprecioprodf["pbruto"];
                              $desadilis = $rowprecioprodf["desadi"];
                              $confirmado = $rowprecioprodf["confirmado"];
                              if($confirmado=='3' && $nref=="Compra"){$colorcon='style="background-color: red;"';$colorconb='';}                              
                              else if($confirmado=='0'){$colorconb='style="background-color: yellow;"';$colorcon='';}
                              else if($confirmado=='1' && $nref=="Compra"){$colorconb='style="background-color: yellow;"';$colorcon='style="background-color: #A4EB8C;"';}
                              else{$colorconb='style="background-color: yellow;"';$colorcon='';}
                              
                              /* precio ventas */
                              $mpalis = $rowprecioprodf["mpa"];
                              $mpblis = $rowprecioprodf["mpb"];
                              $mpclis = $rowprecioprodf["mpc"];
                              $mpdlis = $rowprecioprodf["mpd"];
                              $mpelis = $rowprecioprodf["mpe"];
                              /*  */
                              $costo_totallis = $rowprecioprodf["costo_total"];
                              $fechalistl = explode("-", $fechalist);
                            $cantd=$cantd + 1;
                              echo '
                              <tr '.$colorcon.'>
                              <td class="text-center">
                              <!-- fecha -->
                              '.date('d/m/Y', strtotime($fechalist)).'

                          </td>
                              <td class="text-center">
                                  <!-- modo -->
                                  '.$nreflis.'
                                  '.$liknumero.'

                              </td>    
                              <td class="text-center">
                                  <!-- PRECIO UNITARIO -->
                                  <strong>
                                  '.number_format($costolis, 2, ',', '.').'
                                  </strong>
                              </td>
                              <td class="text-center">

                                  <!-- decuento -->
                                  '.$descuentolis.'

                              </td>
                              <td class="text-center">

                                  <!-- precio con descuento -->

                                  <strong>
                                  '. number_format($pcondesculis, 2, ',', '.').'
                                  </strong>


                              </td>
                              <td class="text-center">
                                  <!-- iibb_bsas -->
                                  '. $iibb_bsaslis.'

                              </td>
                              <td class="text-center">

                                  <!-- iibb_caba -->
                                  '. $iibb_cabalis.'


                              </td>
                              <td class="text-center">
                                  <!-- perc_iva -->
                                  '. $perc_ivalis.'

                              </td>
                              <td class="text-center">
                                  <!-- iva -->
                                '.$ivalis.'
                              </td>
                              <td class="text-center">
                                  <!-- precio bruto -->
                                  <strong>'. number_format($pbrutolsi, 2, ',', '.').'  </strong>

                              </td>
                              <td class="text-center">

                                  <!-- descuentos adicionales -->
                                  '.$desadilis.'

                              </td>
                              <td class="text-center" '.$colorconb.'">
                              <strong>  '.number_format($costo_totallis, 2, ',', '.').'  </strong>
                                
                              </td>      
                              

                          </tr>

                      
                          ';
                          }
                          ?>
                                    </tbody>
                                </table>
                            
                            <!-- End col number_format($costo_totalold, 2, ',', '.') -->










                                      </div>
                                    </div>
                                  </div>
                               
                           
                                </div> 