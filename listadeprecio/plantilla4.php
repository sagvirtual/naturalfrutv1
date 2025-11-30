

                <!-- muestra4 varian 2 en una linea por 5 quilos-->
                <?php 
 

echo'
                <table cellPadding="0" cellSpacing="0" style=" '.$anchotable.'  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>
                                    <td colspan="3" style="height: 40px; background-color:'.$str.'; text-align:right; border: none; font-size: 18pt; padding: 3px; padding-right: 10px;">
                                    ';
                                    echo '<p>';
                                    if($palabras !=""){
                                    foreach ($palabras as $palabra) {
                                        // Seleccionar un color aleatorio de la lista de colores
                                        $color = $colores[array_rand($colores)];
                                        // Imprimir la palabra con el color seleccionado
                                        echo '<span style="color: ' . $color . ';">' . $palabra . '</span> ';
                                    }}else{echo' '.$nombreproduc.'';}
                                    echo '</p>';
                                   echo' 


                                    </td>
                                    <td style="width: 200px; background-color: #006FE0; text-align:center; border: none; font-size: 14pt; padding: 10px;  color:white;  ">Calidad&nbsp;Exportación</td>
                                </tr>
                                <tr>
                                    <td rowspan="4" style="background-color:'.$str.'; vertical-align: bottom;"> ';




                                    if($rowproductos["file"]!=''){

                                        $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro'");
                                        if ($rowecartes = mysqli_fetch_array($sqlcartes)){
                                          echo '
                                          <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: 70px;  border: none;">';
                                        
                                        }else{

                                    
                                    echo' <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: 110px; width: 200px; border: none;">';}
                                }
          
                    
                                $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro' ORDER BY `editliscartel`.`position`");
                                while ($rowecartes = mysqli_fetch_array($sqlcartes)){
                                  echo '
                                  <img src="../cartelitos/'.$rowecartes['id_cartel'].'" style="height: 70px; border: none; ">';
                                
                                }
            




                                    
                                   echo' </td>



                                </tr>
                                <tr>


                                    <td colspan="2" style="text-align:right;background-color:'.$str.'; color:white; padding-right: 10px; border-left: none; border-bottom: none; padding-top: 5px; padding-bottom: 5px;font-size: 18pt;">
                                    <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mkb.'</font>';                                   
                                    
                                    if($mub=='1'){
                                    
                                    echo'
                                    <font style="color:#FF0000;">
                                    '.$rowproductos["modo_producto"].''.$pingos.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).', el  '.substr($rowproductos["unidadnom"], 0, -1).'</font>


                                    </td>
                                    <td style="width: 80px; text-align:center; background-color: yellow;  color:'.$colorfonpretextb.'; border-left: none; border-bottom: none; font-size: 20pt;">
                                    $ '.$mpbb.'
                                    </td>
                                </tr>
                                <tr>


                                    <td colspan="2" style="text-align:right;background-color:'.$str.'; color:white; padding-right: 10px; border-left: none; border-bottom: none; padding-top: 5px; padding-bottom: 5px;font-size: 18pt;">
                                    <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mkc.'</font>';                                   
                                    
                                    if($muc=='1'){
                                    
                                    echo'
                                    <font style="color:#FF0000;">
                                    '.$rowproductos["modo_producto"].''.$pingos.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).', el  '.substr($rowproductos["unidadnom"], 0, -1).'</font>

                                    </td>
                                    <td style="text-align:center; background-color: white;  color:'.$colorfonpretextb.'; border-left: none; border-bottom: none; font-size: 20pt;">
                                    $ '.$mpcb.'
                                    </td>
                                </tr>
                                <tr>


                                    <td style="text-align:right; background-color:'.$str.'; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px "><font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mkd.'</font>';                                   
                                    
                                    if($mud=='1'){
                                    
                                    echo'
                                    <font style="color:#FF0000;">
                                    '.$rowproductos["modo_producto"].''.$pingos.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).', el  '.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                    </td>

                                    <td colspan="3" style="width: 200px; text-align:center; background-color: yellow;  color:'.$colorfonpretextb.'; border-left:none; border-bottom: none; font-size: 30pt;  border-bottom: none; padding-top: 1px; ">
                                    $ '.$mpdb.'
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>';
