<?php 

 echo'<p>Para que funcionen estos precios<br>el cuadro Verde de la izquierda<br>tienen que estar completo</p>
 <table  style="text-align:center; width: 100%; background:white;">
                 <thead>
                 <tr>
                 <th   colspan="4" scope="col" style="background-color:#0FC8FF; text-align:center;" onclick="mostrarOcultarElemento' . $idfila . '(); mostrarOcultarElementob' . $idfila . '(); mostrarContenido(this);"><strong>Precios Venta </strong></th>
             </tr>
                     <tr  style="display:none;">
                         <th scope="col" style="width:70px; text-align:center;"></th>
                         <th scope="col" style="width:70px; text-align:center;"></th>
                         <th scope="col" style="width:50px; text-align:center;">Ganancia&nbsp;%</th>
                         <th scope="col" style="text-align:center;">Precio</th>
                     </tr>
                   </thead>
                   <tbody>
                   <tr style="display:none;">
                   <td style="text-align:center;">  
                   <input type="text" class="form-control" style="text-align:center;"                                           
                   name="eka' . $idfila . '" id="eka' . $idfila . '" value="1" disabled>
                   </td> 
                   <td style="text-align:center;">  
                   <input type="text" class="form-control"  style="text-align:center;"                                           
                    value="' . strtolower($unidadnom) . '" disabled>
                   </td>
                   <td style="text-align:center;">  
                   <input type="text" class="form-control" style="text-align:center;width:10px;"                                            
                   name="ega' . $idfila . '" id="ega' . $idfila . '" value="' . $ega . '" 
                   oninput="realizaProcesos' . $idfila . '(
  
                      $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
                      $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                      
                  ); ajax_precioespeciales' . $idfila . '( 
                      $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                      $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                             
                     )" onkeyup="handleKeyUp' . $idfila . '()" onclick="select()">
                       </td>
                       <td style="text-align:center;">
                   <input type="text" class="form-control" style="text-align:center; font-weight: bold; width: 100px;"                                            
                   name="epa' . $idfila . '" id="epa' . $idfila . '" value="' . $epa . '" 
                   oninput="ajax_precioesporsenta' . $idfila . '( 
                    $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                    $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                    $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                    $(' . $aster . '#epe' . $idfila . '' . $aster . ').val());  
                   
                   realizaProcesos' . $idfila . '(  $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
                      $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                      $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                      $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                      
                  )"  onkeyup="handleKeyUp' . $idfila . '()" onclick="select()">
               <tr>
               <th scope="col" colspan="4" style="width:70px; text-align:center; height: 10px; background:#E5E5E5;"><b>' . strtolower($modo_producto) . ' ' . $kilo . ' ' . $unidadnom . '</b></th>
                   <tr>
                   <tr>
                       <th scope="col" style="width:70px; text-align:center;">Cant.</th>
                       <th scope="col" style="width:70px; text-align:center;">Unid.</th>
                       <th scope="col" style="width:50px; text-align:center;">Ganancia&nbsp;%</th>
                       <th scope="col" style="text-align:center; width: 100px;">Precio $</th>
                   </tr>
               <tr>
               <td style="text-align:center;">  
               <input type="text" class="form-control" style="text-align:center; "                                           
               name="ekb' . $idfila . '" id="ekb' . $idfila . '" value="' . $ekb . '" 
               oninput="realizaProcesos' . $idfila . '(
  
                  $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
                  $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                  
              ); ajax_precioespeciales' . $idfila . '( 
                  $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                  $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                                
                  )" onkeyup="handleKeyUp' . $idfila . '()" onclick="select()">
               </td>
               <td style="text-align:center;">  


               <select class="custom-select"  name="eub' . $idfila . '" id="eub' . $idfila . '" 
               onchange="realizaProcesos' . $idfila . '(
  
                  $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
                  $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                  
              ); ajax_precioespeciales' . $idfila . '( 
                $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                                 
                  )";style="width: 80px;">
               <option value="1" '.$seleub.'>' .$modo_producto . ' </option>
               <option value="0" '.$seleub1.'>' . $unidadnom . '</option>
           </select>
               </td>
               <td style="text-align:center;">  
               <input type="text" class="form-control" style="text-align:center;"                                            
               name="egb' . $idfila . '" id="egb' . $idfila . '" value="' . $egb . '" 
               oninput="realizaProcesos' . $idfila . '(
  
                  $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
                  $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                  
              ); ajax_precioespeciales' . $idfila . '( 
                  $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                  $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                           
                  )" onkeyup="handleKeyUp' . $idfila . '()" onclick="select()">
                   </td>
                   <td style="text-align:center;">
               <input type="text" class="form-control" style="text-align:center;font-weight: bold; width: 100px;"                                            
               name="epb' . $idfila . '" id="epb' . $idfila . '" value="' . $epb . '" 
               oninput="ajax_precioesporsenta' . $idfila . '( 
                $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
                $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                $(' . $aster . '#epe' . $idfila . '' . $aster . ').val());  
               
               realizaProcesos' . $idfila . '(  $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
                  $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
                  $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
                  $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
                  
              )"  onkeyup="handleKeyUp' . $idfila . '()" onclick="select()">
                  
           </tr>
           <tr>
           <td style="text-align:center;">  
           <input type="text" class="form-control" style="text-align:center;"                                            
           name="ekc' . $idfila . '" id="ekc' . $idfila . '" value="' . $ekc . '" 
           oninput="realizaProcesos' . $idfila . '(
  
              $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
              $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
              
          ); ajax_precioespeciales' . $idfila . '( 
              $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
              $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                              
              )" onkeyup="handleKeyUp' . $idfila . '()" onclick="select()">
           </td>
           <td style="text-align:center;">  


           <select class="custom-select"  name="euc' . $idfila . '" id="euc' . $idfila . '" 
           onchange="realizaProcesos' . $idfila . '(

              $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
              $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
              
          ); ajax_precioespeciales' . $idfila . '( 
            $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
            $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                                 
              )";style="width: 80px;">
           <option value="1" '.$seleuc.'>' .$modo_producto . ' </option>
           <option value="0" '.$seleuc1.'>' . $unidadnom . '</option>
       </select>
           </td>
           <td style="text-align:center;">  
           <input type="text" class="form-control" style="text-align:center;"                                            
           name="egc' . $idfila . '" id="egc' . $idfila . '" value="' . $egc . '" 
           oninput="realizaProcesos' . $idfila . '(
  
              $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
              $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
              
          ); ajax_precioespeciales' . $idfila . '( 
              $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
              $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                             
              )" onkeyup="handleKeyUp' . $idfila . '()" onclick="select()">
               </td>
               <td style="text-align:center;">
           <input type="text" class="form-control" style="text-align:center; font-weight: bold; width: 100px;"                                           
           name="epc' . $idfila . '" id="epc' . $idfila . '" value="' . $epc . '" 
           oninput="ajax_precioesporsenta' . $idfila . '( 
            $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
            $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
            $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
            $(' . $aster . '#epe' . $idfila . '' . $aster . ').val());  
           
           realizaProcesos' . $idfila . '(  $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
              $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
              $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
              $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
              
          )"  onkeyup="handleKeyUp' . $idfila . '()" onclick="select()">
       </tr>
       <tr>
       <td style="text-align:center;">  
       <input type="text" class="form-control" style="text-align:center;"                                            
       name="ekd' . $idfila . '" id="ekd' . $idfila . '" value="' . $ekd . '" 
       oninput="realizaProcesos' . $idfila . '(
  
          $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
          $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
          
      ); ajax_precioespeciales' . $idfila . '( 
          $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
          $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                               
          )" onkeyup="handleKeyUp' . $idfila . '()" onclick="select()">
       </td>
       <td style="text-align:center;">  


       <select class="custom-select"  name="eud' . $idfila . '" id="eud' . $idfila . '" 
       onchange="realizaProcesos' . $idfila . '(

          $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
          $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
          
      ); ajax_precioespeciales' . $idfila . '( 
        $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
        $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
        $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
        $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
        $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
        $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                                 
          )";style="width: 80px;">
       <option value="1" '.$seleud.'>' .$modo_producto . ' </option>
       <option value="0" '.$seleud1.'>' . $unidadnom . '</option>
   </select>
       </td>
       <td style="text-align:center;">  
       <input type="text" class="form-control" style="text-align:center; "                                           
       name="egd' . $idfila . '" id="egd' . $idfila . '" value="' . $egd . '" 
       oninput="realizaProcesos' . $idfila . '(
  
          $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
          $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
          
      ); ajax_precioespeciales' . $idfila . '( 
          $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
          $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                            
          )" onkeyup="handleKeyUp' . $idfila . '()" onclick="select()">
           </td>
           <td style="text-align:center;">
       <input type="text" class="form-control" style="text-align:center; font-weight: bold; width: 100px;"                                           
       name="epd' . $idfila . '" id="epd' . $idfila . '" value="' . $epd . '" 
       oninput="ajax_precioesporsenta' . $idfila . '( 
        $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
        $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
        $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
        $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
        $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
        $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
        $(' . $aster . '#epe' . $idfila . '' . $aster . ').val());  
       
       realizaProcesos' . $idfila . '(  $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
          $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
          $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
          $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
          
      )"  onkeyup="handleKeyUp' . $idfila . '()" onclick="select()">
   </tr>
   <tr>
   <td style="text-align:center;">  
   <input type="text" class="form-control" style="text-align:center;"                                            
   name="eke' . $idfila . '" id="eke' . $idfila . '" value="' . $eke . '" 
   oninput="realizaProcesos' . $idfila . '(
  
      $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
      $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
      
  ); ajax_precioespeciales' . $idfila . '( 
      $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
      $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epe' . $idfila . '' . $aster . ').val())" onkeyup="handleKeyUp' . $idfila . '()" onclick="select()">
   </td>
   <td style="text-align:center;">  


   <select class="custom-select"  name="eue' . $idfila . '" id="eue' . $idfila . '" 
   onchange="realizaProcesos' . $idfila . '(

      $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
      $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
      
  ); ajax_precioespeciales' . $idfila . '( 
    $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
    $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
    $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
    $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
    $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
    $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                                 
      )";style="width: 80px;">
   <option value="1" '.$seleue.'>' .$modo_producto . ' </option>
   <option value="0" '.$seleue1.'>' . $unidadnom . '</option>
</select>
   </td>
   <td style="text-align:center;">  
   <input type="text" class="form-control" style="text-align:center;"                                            
   name="ege' . $idfila . '" id="ege' . $idfila . '" value="' . $ege . '" 
   oninput="realizaProcesos' . $idfila . '(
  
      $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
      $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
      
  ); ajax_precioespeciales' . $idfila . '( 
      $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
      $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()                                             
      )" onkeyup="handleKeyUp' . $idfila . '()" onclick="select()">
   </td>
   <td style="text-align:center;">
   <input type="text" class="form-control" style="text-align:center;font-weight: bold; width: 100px;"                                            
   name="epe' . $idfila . '" id="epe' . $idfila . '" value="' . $epe . '"
   oninput="ajax_precioesporsenta' . $idfila . '( 
    $(' . $aster . '#idcosto' . $idfila . '' . $aster . ').val(),           
    $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
    $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
    $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
    $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
    $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
    $(' . $aster . '#epe' . $idfila . '' . $aster . ').val());  
   
   realizaProcesos' . $idfila . '(  $(' . $aster . '#jfndhom' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#costoxcaj' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#costo' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#modobus' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#buscar' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#nref' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#fecven' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#agrstock' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#descuento' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#iibb_bsas' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#iibb_caba' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#perc_iva' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#iva' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#desadi' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#costo_final' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mka' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mga' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpa' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mkb' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#mub' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#mgb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mkc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#muc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#mgc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mkd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mud' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mgd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mke' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mue' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mge' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#mpe' . $idfila . '' . $aster . ').val(),                    
      $(' . $aster . '#eka' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ega' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epa' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekb' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#eub' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#egb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epb' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#euc' . $idfila . '' . $aster . ').val(),            
      $(' . $aster . '#egc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epc' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ekd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eud' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#egd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epd' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eke' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#eue' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#ege' . $idfila . '' . $aster . ').val(),
      $(' . $aster . '#epe' . $idfila . '' . $aster . ').val()
      
  )"  onkeyup="handleKeyUp' . $idfila . '()" onclick="select()">
       </td>
</tr>
           </tbody>
       </table>   
';
/* ajax inserta */



echo '<script> window.onload =ajax_precioespeciales' . $idfila . ';
                                  function ajax_precioespeciales' . $idfila . '(                                                
                                  idcosto' . $idfila . ', 
                                  jfndhom' . $idfila . ', 
                                  costo_final' . $idfila . ',
                                  eka' . $idfila . ',
                                  ega' . $idfila . ',
                                  epa' . $idfila . ',
                                  ekb' . $idfila . ',            
                                  eub' . $idfila . ',            
                                  egb' . $idfila . ',
                                  epb' . $idfila . ',
                                  ekc' . $idfila . ',            
                                  euc' . $idfila . ',            
                                  egc' . $idfila . ',
                                  epc' . $idfila . ',
                                  ekd' . $idfila . ',
                                  eud' . $idfila . ',
                                  egd' . $idfila . ',
                                  epd' . $idfila . ',
                                  eke' . $idfila . ',
                                  eue' . $idfila . ',
                                  ege' . $idfila . ',
                                  epe' . $idfila . '
                                  ){';
                                      /* saco los calculos */
                                      echo "

                                      var costo_bulto" . $idfila . " =" . $kilo . " * costo_final" . $idfila . ";

                                  var eka" . $idfila . " = eka" . $idfila . ";
                                  var ekb" . $idfila . " = ekb" . $idfila . ";
                                  var ekc" . $idfila . " = ekc" . $idfila . ";
                                  var ekd" . $idfila . " = ekd" . $idfila . ";
                                  var eke" . $idfila . " = eke" . $idfila . ";

                                  var ega" . $idfila . " = ega" . $idfila . ";
                                  var egb" . $idfila . " = egb" . $idfila . ";
                                  var egc" . $idfila . " = egc" . $idfila . ";
                                  var egd" . $idfila . " = egd" . $idfila . ";
                                  var ege" . $idfila . " = ege" . $idfila . ";

                                  
                                  var valorega" . $idfila . " = (costo_final" . $idfila . " *  ega" . $idfila . ") / 100;
                                  var valoregb" . $idfila . " = (costo_final" . $idfila . " *  egb" . $idfila . ") / 100;
                                  var valoregc" . $idfila . " = (costo_final" . $idfila . " *  egc" . $idfila . ") / 100;
                                  var valoregd" . $idfila . " = (costo_final" . $idfila . " *  egd" . $idfila . ") / 100;
                                  var valorege" . $idfila . " = (costo_final" . $idfila . " *  ege" . $idfila . ") / 100;
                                  
                                  var epa" . $idfila . " = parseFloat(valorega" . $idfila . ") +  parseFloat(costo_final" . $idfila . ");
                                  var epb" . $idfila . " = parseFloat(valoregb" . $idfila . ") +  parseFloat(costo_final" . $idfila . ");
                                  var epc" . $idfila . " = parseFloat(valoregc" . $idfila . ") +  parseFloat(costo_final" . $idfila . ");
                                  var epd" . $idfila . " = parseFloat(valoregd" . $idfila . ") +  parseFloat(costo_final" . $idfila . ");
                                  var epe" . $idfila . " = parseFloat(valorege" . $idfila . ") +  parseFloat(costo_final" . $idfila . ");
                                  
                                  
                                  if (ega" . $idfila . ".trim() !== '0') {
                                  document.getElementById('epa" . $idfila . "').value = epa" . $idfila . ".toFixed(0);
                                  document.getElementById('epafinal" . $idfila . "').textContent = epa" . $idfila . ".toFixed(0);
                                  }

                                  if (ekb" . $idfila . ".trim() !== '0' && egb" . $idfila . ".trim() !== '0') {
                                  document.getElementById('epb" . $idfila . "').value = epb" . $idfila . ".toFixed(0);
                                  }
                                  else{ document.getElementById('epb" . $idfila . "').value = '0';}

                                  if (ekc" . $idfila . ".trim() !== '0' && egc" . $idfila . ".trim() !== '0') {
                                  document.getElementById('epc" . $idfila . "').value = epc" . $idfila . ".toFixed(0);
                                  }
                                  else{ document.getElementById('epc" . $idfila . "').value = '0';}

                                  if (ekd" . $idfila . ".trim() !== '0' && egd" . $idfila . ".trim() !== '0') {
                                  document.getElementById('epd" . $idfila . "').value = epd" . $idfila . ".toFixed(0);
                                  }
                                  else{ document.getElementById('epd" . $idfila . "').value = '0';}

                                  if (eke" . $idfila . ".trim() !== '0' && ege" . $idfila . ".trim() !== '0') {
                                  document.getElementById('epe" . $idfila . "').value = epe" . $idfila . ".toFixed(0);}
                                  else{ document.getElementById('epe" . $idfila . "').value = '0';}
                                  ";

                                            $aster5='"';
                                            echo "
                                                
                                            var costoxcajar" . $idfila . " = mpa" . $idfila . ";
                                            var costoxcajavie" . $idfila . " = ". $preciomayorvie .";
                                        
                                            
                                        
                                            
                                            var variakb" . $idfila . " = eval(costoxcajar" . $idfila . ") - eval(costoxcajavie" . $idfila . ");
                                            var variaporbv" . $idfila . " = 100 * eval(costoxcajar" . $idfila . ") / eval(costoxcajavie" . $idfila . ");
                                            var varkporb" . $idfila . " = eval(variaporbv" . $idfila . ") - 100;
                                        
                                            document.getElementById('variakb". $idfila ."').innerHTML = variakb" . $idfila . ".toFixed(0);
                                            document.getElementById('varkporb". $idfila ."').innerHTML = varkporb" . $idfila . ".toFixed(0);
                                            if (variakb" . $idfila . " > 0) {
                                                document.getElementById('flechab". $idfila ."').innerHTML = '<i class=".$aster5."feather icon-arrow-up".$aster5."></i>';
                                            } else {
                                                document.getElementById('flechab". $idfila ."').innerHTML = '<i class=".$aster5."feather icon-arrow-down".$aster5."></i>';
                                            }
                                                             }
                                </script>
                                ";



                                echo '<script> 
                                  function ajax_precioesporsenta' . $idfila . '(                                                
                                  idcosto' . $idfila . ', 
                                  jfndhom' . $idfila . ', 
                                  costo_final' . $idfila . ',
                                  eka' . $idfila . ',
                                  ega' . $idfila . ',
                                  epa' . $idfila . ',
                                  ekb' . $idfila . ',            
                                  eub' . $idfila . ',            
                                  egb' . $idfila . ',
                                  epb' . $idfila . ',
                                  ekc' . $idfila . ',            
                                  euc' . $idfila . ',            
                                  egc' . $idfila . ',
                                  epc' . $idfila . ',
                                  ekd' . $idfila . ',
                                  eud' . $idfila . ',
                                  egd' . $idfila . ',
                                  epd' . $idfila . ',
                                  eke' . $idfila . ',
                                  eue' . $idfila . ',
                                  ege' . $idfila . ',
                                  epe' . $idfila . '
                                  ){';
                                      /* saco los calculos */
                                      echo "

                                      var costo_bulto" . $idfila . " =" . $kilo . " * costo_final" . $idfila . ";

                                  var eka" . $idfila . " = eka" . $idfila . ";
                                  var ekb" . $idfila . " = ekb" . $idfila . ";
                                  var ekc" . $idfila . " = ekc" . $idfila . ";
                                  var ekd" . $idfila . " = ekd" . $idfila . ";
                                  var eke" . $idfila . " = eke" . $idfila . ";

                                  var epa" . $idfila . " = epa" . $idfila . ";
                                  var epb" . $idfila . " = epb" . $idfila . ";
                                  var epc" . $idfila . " = epc" . $idfila . ";
                                  var epd" . $idfila . " = epd" . $idfila . ";
                                  var epe" . $idfila . " = epe" . $idfila . ";

                                  
                                  var valorega" . $idfila . " = (epa" . $idfila . " / costo_final" . $idfila . ") * 100;
                                  var valoregb" . $idfila . " = (epb" . $idfila . " / costo_final" . $idfila . ") * 100;
                                  var valoregc" . $idfila . " = (epc" . $idfila . " / costo_final" . $idfila . ") * 100;
                                  var valoregd" . $idfila . " = (epd" . $idfila . " / costo_final" . $idfila . ") * 100;
                                  var valorege" . $idfila . " = (epe" . $idfila . " / costo_final" . $idfila . ") * 100;


                                  
                                 rsulegaega" . $idfila . " = valorega" . $idfila . " - 100;
                                 rsulegaegb" . $idfila . " = valoregb" . $idfila . "  - 100;
                                 rsulegaegc" . $idfila . "  = valoregc" . $idfila . "  - 100;
                                 rsulegaegd" . $idfila . "  = valoregd" . $idfila . "  - 100;
                                 rsulegaege" . $idfila . "  = valorege" . $idfila . "  - 100;



                                  document.getElementById('ega" . $idfila . "').value  = rsulegaega" . $idfila . ".toFixed(2);
                                  document.getElementById('egb" . $idfila . "').value  = rsulegaegb" . $idfila . ".toFixed(2);
                                  document.getElementById('egc" . $idfila . "').value  = rsulegaegc" . $idfila . ".toFixed(2);
                                  document.getElementById('egd" . $idfila . "').value  = rsulegaegd" . $idfila . ".toFixed(2);
                                  document.getElementById('ege" . $idfila . "').value  = rsulegaege" . $idfila . ".toFixed(2);
                                  }
                                </script>
                                ";


                                  

                                                          

 ?>