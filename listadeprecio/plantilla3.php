
                <!-- muestra3 -->
                <?php 
           
 if($mpb !='0'){$colspan="3";$altofoto='75';}
 if($mpc !='0'){$colspan="4";$altofoto='120';}
 if($mpd !='0'){$colspan="5";$altofoto='160';}
 if($mpe !='0'){$colspan="6"; $altofoto='200';}

echo'
                <table cellPadding="0" cellSpacing="0" style=" '.$anchotable.'  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>
                                    <td colspan="2" style="width: 500px;height: 40px; background-color:'.$str.'; text-align:right; border: none; font-size: 18pt; padding: 3px; padding-right: 10px;">
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


                                    </td>';
                                    $sqlcartester=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartex Where fecha = '$fechalista' and tipolista = '0'  and id_producto='$idpro'");
                                    if ($rowecartestx = mysqli_fetch_array($sqlcartester)){
 
                                    $color1tex=$rowecartestx['id_color'];
                                    $id_cartelre=$rowecartestx['id_cartel'];
                                 
                                    $sqlbannertpro=mysqli_query($rjdhfbpqj,"SELECT * FROM carteltext  Where id = '$id_cartelre'");
                                    if ($rowbannertpro = mysqli_fetch_array($sqlbannertpro)){
                                     $textcar=$rowbannertpro['textcar'];
                                     if($color1tex=="1"){$colorcartes=$rowbannertpro['color1']; }
                                     if($color1tex=="2"){$colorcartes=$rowbannertpro['color2']; }
                                     if($color1tex=="3"){$colorcartes=$rowbannertpro['color3']; }
                                     if($color1tex=="4"){$colorcartes=$rowbannertpro['color4']; }
                                     if($color1tex=="5"){$colorcartes=$rowbannertpro['color5']; }
 
                                    }
                                 
                                 
                                 
                                 }else{$colorcartes="#006FE0";$textcar="Nuevo Ingreso";}
                                   
                                   echo'<td colspan="2" style=" background-color: '.$colorcartes.'; text-align:center; border: none; font-size: 16pt; padding: 10px;  color:white;">'.$textcar.'</td>';
                               
                               
                               echo'     </tr>
                                <tr>
                                    <td  rowspan="'.$colspan.'" style="width: 300px; background-color:'.$str.'; vertical-align: middle;">';


                                    if($rowproductos["file"]!='' ){

                                        $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro'");
                                        if ($rowecartes = mysqli_fetch_array($sqlcartes)){
                                          echo '
                                          <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: 70px;  border: none;">';
                                        
                                        }else{

                                    echo'
                                            <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: 70px;  auto; max-width: 180px; border: none;">';
                                }
                            }
                            $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro' ORDER BY `editliscartel`.`position`");
                            while ($rowecartes = mysqli_fetch_array($sqlcartes)){
                              echo '
                              <img src="../cartelitos/'.$rowecartes['id_cartel'].'" style="height: 70px; border: none; ">';
                            
                            }
        


                            
                                    
                                    
                                    echo'</td>



                                </tr>



                                <tr>



                                    <td style="padding-top: 0px; text-align:right;background-color:'.$str.'; color:white; padding-right: 0px; border-left: none; border-bottom: none; font-size: 14pt;">

                                        <table style="width: 100%; ">
                                            <tr>
                                                <td style="height: 30px; width:150px; text-align:right;  font-size: 16pt; ">
                                                    <font style="color:#83148E;">Precios:</font>
                                                </td>
                                                <td>
                                                    <font style="color:#83148E; font-size: 16pt;">
                                                    
                                                    Por '.substr($rowproductos["unidadnom"], 0, -1).':</font>
                                                </td>
                                                <td style="height:30px; text-align:center; background-color: '.$colorfonpre.'; color:'.$colorfonpretext.';  border-left: 0.1mm none black; border-bottom: none; font-size: 16pt;padding-right: 10px;padding-left: 10px; ">&nbsp;
                                                
                                               $ '.$mpa.'
                                                
                                                &nbsp;</td>

                                            </tr>
                                        </table>



                                    </td>
                                    <td style="height:0px; text-align:right; background-color:'.$str.'; color:white; border-left: none; border-bottom: none; font-size: 16pt; padding-right: 10px; border-bottom: none; padding-top: 0px;">
                                        <font style="color:#83148E;">Por</font>
                                        <font style="color:red;">'.$mkb.'</font>';


                                        if($mub=='0'){
    
                                           echo' <font style="color:#83148E;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>';
    
                                        }else{ echo' <font style="color:#83148E;">'.$rowproductos["modo_producto"].'</font>';}
    
                                       echo'</td>
                                    <td style="text-align:center;background-color: '.$colorfonpre.'; color:'.$colorfonpretext.';  border-left: none; border-bottom: none; font-size: 16pt;padding-right: 10px;padding-left: 10px; ">$ '.$mpb.'</td>
                                </tr>';


                            

                      

                            if($mpc !='0' && $mkc !='0'){
                                echo' <tr>
                                     <td style="text-align:right; background-color:'.$str.'; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                     <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mkc.'</font>';                                   
                                     
                                     if($muc=='1'){
                                     
                                     echo'
                                     <font style="color:#FF0000;">
                                     '.$rowproductos["modo_producto"].''.$pingosc.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).', '.$ella.'    '.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                     </td>
 
                                     <td colspan="3" style="text-align:center; background-color:white; color:'.$colorfonpretextb.'; border-left:none; border-bottom: none; font-size: 30pt;  border-bottom: none; padding-top: 1px;">&nbsp;$ '.$mpc.'&nbsp;</td>
                                 </tr>';
                             }

                             if($mpd !='0'&& $mkd !='0'){
                                echo' <tr>
                                     <td style="text-align:right; background-color:'.$str.'; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                     <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mkd.'</font>';                                   
                                     
                                     if($mud=='1'){
                                     
                                     echo'
                                     <font style="color:#FF0000;">
                                     '.$rowproductos["modo_producto"].''.$pingosd.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).', '.$ella.'    '.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                     </td>
 
                                     <td colspan="3" style="text-align:center; background-color:'.$colorfonpre.'; color:'.$colorfonpretext.'; border-left:none; border-bottom: none; font-size: 30pt;  border-bottom: none; padding-top: 1px;">&nbsp;$ '.$mpd.'&nbsp;</td>
                                 </tr>';
                             }
                             if($mpe !='0'&& $mke !='0'){
                                echo' <tr>
                                     <td style="text-align:right; background-color:'.$str.'; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                     <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mke.'</font>';                                   
                                     
                                     if($mue=='1'){
                                     
                                     echo'
                                     <font style="color:#FF0000;">
                                     '.$rowproductos["modo_producto"].''.$pingose.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).', '.$ella.'    '.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                     </td>
 
                                     <td colspan="3" style="text-align:center; background-color:white; color:'.$colorfonpretextb.'; border-left:none; border-bottom: none; font-size: 30pt;  border-bottom: none; padding-top: 1px;">&nbsp;$ '.$mpe.'&nbsp;</td>
                                 </tr>';
                             }

 

 

                            


                           echo' </table>
                        </td>
                    </tr>
                </table>';
