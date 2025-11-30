
                <!-- muestra3 -->
                <?php 
                $rounfo=${"rounfo".$idpro};
                $colcar=${"colcar".$idpro};
                $altocoartso=${"altocoartso".$idpro};
                $altotdfot=${"altotdfot".$idpro};
                $altoctdfot=${"altoctdfot".$idpro};
                $altofoto=${"altofoto".$idpro};
                $sinfo=${"sinfo".$idpro};
                $sinfo3=${"sinfo3".$idpro};
 if($mpb !='0'){$colspan="3";$altofoto='156'; $altofont='18'; $altofontcaja='22';}
 if($mpc !='0'){$colspan="4";$altofoto='156';  $altofont='18';$altofontcaja='22'; $altotdfot='height:114px;'; $altoctdfot='height:114px;';}
 if($mpd !='0'){$colspan="5";$altofoto='156';$altofont='17';$altofontcaja='22';$altotdfot='height:155px;';$altoctdfot='height:155px;';}
 if($mpe !='0'){$colspan="6"; $altofoto='156';$altofont='18';$altofontcaja='22';$altotdfot='height:195px;';$altoctdfot='height:195px;';}

 if($rowproductos["file"]!=''){
    
    $rounfo="rowspan=".$colspan;
    $altofont='17';
    $altofontcaja='16';
    $altoansin='width:500px;';


        $rounfo='rowspan="'.$colspan.'"';
        $colcar='colspan="3" ';
        $altocoartso=$altoctdfot;}else{$sinfo3="1";}
 $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro'");
 $canveriddin = mysqli_num_rows($sqlcartes);
 if ($rowecartes = mysqli_fetch_array($sqlcartes)){
    
    $haycar='1';
    $rounfo='rowspan="'.$colspan.'"';
    if($canveriddin=='1'){ $altofont='17';if($sinfo3=="1"){$sinfo=" width: 115px;";};}else{ $altofont='16';if($sinfo3=="1"){$sinfo=" width: 215px;";};}
    
    $altofontcaja='16';
    $colcar='colspan="3" ';
    $altocoartso=$altotdfot;

}
 

echo'
                <table cellPadding="0" cellSpacing="0" style=" '.$anchotable.';  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style="background-color:'.$str.'; padding: 0px; width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                
                                <tr>
                                    <td  '.$rounfo.' style="'.$sinfo.' '.$altocoartso.' padding: 0px; background-color:'.$str.'; vertical-align: middle; padding:0px;">';


                                    if($rowproductos["file"]!='' ){

                                     
                                        $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro'");
                                        if ($rowecartes = mysqli_fetch_array($sqlcartes)){

                                            $anchofoto='140';
                                          echo '
                                          <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: '.$altofoto.'px; width: '.$anchofoto.'px; border: 0px;">';
                                        
                                        }else{
                                            $anchofoto='180';

                                    echo'
                                            <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: '.$altofoto.'px; width: '.$anchofoto.'px; border: none;">';
                                }
                            }else{  
                                if($haycar!='1'){
                                $altoansin='width:100%;';
                                $altofont='20'; 
                                $altofontcaja='22';
                                $colcar='colspan="3" ';
                            }else{$colcar='colspan="3" ';}
                            }
                            $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro' ORDER BY `editliscartel`.`position`");
                            while ($rowecartes = mysqli_fetch_array($sqlcartes)){
                                
                              echo '
                              <img src="../cartelitos/'.$rowecartes['id_cartel'].'" style="height: 70px;  border: 0px; ">';
                            
                            }
        


                            
                            
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
                             $tdtitu="3";$tdtitub="2";

                            }else{$colorcartes="";$textcar="";$notdca="1";$tdtitu="5";$tdtitub="2";}
                         
                         
                         
                         }else{$colorcartes="#006FE0";$textcar="";$notdca="1";$tdtitu="5";$tdtitub="2";}
                                    
                                    
                                    echo'</td>



                                </tr>

                                <tr>
                                <td colspan="'.$tdtitu.'" style="height: 40px; background-color:'.$str.'; text-align:right; border: none; font-size: '.$altofont.'pt;  padding-right: 10px;">
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

                                echo'</td>';

                              
                                    if($notdca!="1"){
                              echo' <td colspan="'.$tdtitub.'" style=" height: 50px;background-color: '.$colorcartes.'; text-align:center; border: none; font-size: 16pt;   color:white;">'.$textcar.'</td>';
                            }
                              
                            echo'</tr>

                                <tr>



                                    <td colspan="3"  style="padding-top: 0px; background-color:'.$str.'; color:white; padding-right: 0px; border-left: none; border-bottom: none; font-size: 14pt;">

                                        <table style=" width:100%;">
                                            <tr>
                                             
                                                <td style="text-align: right;">
                                                 </td>

                                            </tr>
                                        </table>


                                    </td>
                                    <td  style="width:105px; text-align:right; background-color:'.$str.'; color:white; border-left: none; border-bottom: none; font-size: 16pt; padding-right: 10px; border-bottom: none; padding-top: 0px;">
                                        <font style="color:#83148E;">Por</font>
                                        <font style="color:red;">'.$mkb.'</font>';


                                        if($mub=='0'){
    
                                           echo' <font style="color:#83148E;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>';
    
                                        }else{ echo' <font style="color:#83148E;">'.$rowproductos["modo_producto"].'</font>';}
    
                                       echo' </td>
                                    <td style="width:108px; text-align:center;background-color: '.$colorfonpre.'; color:'.$colorfonpretext.';  border-left: none; border-bottom: none; font-size: 16pt;padding-right: 10px;padding-left: 10px; ">$ '.$mpb.'</td>
                                </tr>';


                            

                      

                            if($mpc !='0'&& $mkc !='0'){
                                echo' <tr>
                                     <td '.$colcar.' style="text-align:right; background-color:'.$str.'; border: none; font-size: '.$altofontcaja.'pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                     <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mkc.'</font>';                                   
                                     
                                     if($muc=='1'){
                                     
                                     echo'
                                     <font style="color:#FF0000;">
                                     '.$rowproductos["modo_producto"].''.$pingosc.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;"> '.substr($rowproductos["unidadnom"], 0, -1).', '.$ella.'  '.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                     </td>
 
                                     <td colspan="2" style="text-align:center; background-color:white; color:'.$colorfonpretextb.'; border-left:none; border-bottom: none; font-size: 30pt;  border-bottom: none; padding-top: 1px;">&nbsp;$ '.$mpc.'&nbsp;</td>
                                 </tr>';
                             }

                             if($mpd !='0'&& $mkd !='0'){
                                echo' <tr>
                                     <td '.$colcar.' style="text-align:right; background-color:'.$str.'; border: none; font-size: '.$altofontcaja.'pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                     <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mkd.'</font>';                                   
                                     
                                     if($mud=='1'){
                                     
                                     echo'
                                     <font style="color:#FF0000;">
                                     '.$rowproductos["modo_producto"].''.$pingosd.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;"> '.substr($rowproductos["unidadnom"], 0, -1).', '.$ella.'  '.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                     </td>
 
                                     <td colspan="2" style="text-align:center; background-color:'.$colorfonpre.'; color:'.$colorfonpretext.'; border-left:none; border-bottom: none; font-size: 30pt;  border-bottom: none; padding-top: 1px;">&nbsp;$ '.$mpd.'&nbsp;</td>
                                 </tr>';
                             }
                             if($mpe !='0'&& $mke !='0'){
                                echo' <tr>
                                     <td '.$colcar.' style="text-align:right; background-color:'.$str.'; border: none; font-size: '.$altofontcaja.'pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                     <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mke.'</font>';                                   
                                     
                                     if($mue=='1'){
                                     
                                     echo'
                                     <font style="color:#FF0000;">
                                     '.$rowproductos["modo_producto"].''.$pingose.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;"> '.substr($rowproductos["unidadnom"], 0, -1).', el  '.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                     </td>
 
                                     <td colspan="2" style="text-align:center; background-color:white; color:'.$colorfonpretextb.'; border-left:none; border-bottom: none; font-size: 30pt;  border-bottom: none; padding-top: 1px;">&nbsp;$ '.$mpe.'&nbsp;</td>
                                 </tr>';
                             }

 

 

                            


                           echo' </table>
                        </td>
                    </tr>
                </table>';
