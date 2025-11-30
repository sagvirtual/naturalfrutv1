 <!-- muestra2 varian B sin nueva campaña-->
 <?php 
 
 if($mpb !='0'){$colspan="3";}
 if($mpc !='0'){$colspan="4";}
 if($mpd !='0'){$colspan="5";}
 if($mpe !='0'){$colspan="6";}


 if($mpb !='0'){$colspan="3";$altofoto='130';}
 if($mpc !='0'){$colspan="4";$altofoto='138';}
 if($mpd !='0'){$colspan="5";$altofoto='172';}
 if($mpe !='0'){$colspan="6"; $altofoto='207';}  

echo'
 <table cellPadding="0" cellSpacing="0" style=" '.$anchotable.'  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" '.$anchotable.' border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>
                                    <td rowspan="'.$colspan.'" style="background-color:'.$str.'; vertical-align: bottom;"> ';



                                    if($rowproductos["file"]!=''){

                                        $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro'");
                                        if ($rowecartes = mysqli_fetch_array($sqlcartes)){
                                          echo '
                                          <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height:  '.$altofoto.'px; width: auto; max-width: 200px; border: none;">';
                                        
                                        }else{

                                    
                                    echo' <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: '.$altofoto.'px;  auto; max-width: 200px; border: none;">';}
                                }

                             
            
            
                                    echo'</td>';
                                    
                                    $cartels=${"cartels".$idpro};
                                    $cartels=1;
                                    $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro' ORDER BY `editliscartel`.`position`");
                                    while ($rowecartes = mysqli_fetch_array($sqlcartes)){
                                        $cartels=$cartels+1;
                                      echo '
                                      <td rowspan="2"  style="background-color:'.$str.'; "><img src="../cartelitos/'.$rowecartes['id_cartel'].'" style="height: 65px; border: none; "></td>';
                                    
                                    }
                                   

                                    echo'<td rowspan="2" style="background-color:'.$str.'; text-align:right; border: none; font-size: 20pt; padding: 3px; padding-right: 10px;">
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
                                    <td style="height: 28px; width: 110px; background-color:'.$str.'; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 10pt;">
                                    Precio '.$pidt.' '.substr($rowproductos["unidadnom"], 0, -1).'
                                    </td>
                                    <td style="width: 180px; background-color:'.$str.'; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 14;">
                                    Precio '.$pidtb.' '.$rowproductos["modo_producto"].'  x '.$kilopres.''.substr($rowproductos["unidadnom"], 0, -1).'
                                    </td>
                                </tr>
                                <tr>



                                    <td style="padding-top: 1px; text-align:center;background-color:'.$colorfonpre.'; color:'.$colorfonpretext.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">
                                    $ '.$mpa.'
                                    </td>
                                    <td style="text-align:right; background-color:'.$colorfonpre.'; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td  colspan="'.$cartels.'" style="text-align:right; background-color:'.$str.'; border: none;font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                    <font style="color:#974706;">Por</font>
                                    <font style="color:#008000;">'.$mkb.'</font>
                
                                    ';
                                                    
                                                    
                                                    if($mub=='1' && $mkb !='0'){
                                                    
                                                    echo'
                                    <font style="color:#FF0000;">'.$rowproductos["modo_producto"].''.$pingos.'</font>
                                    <font style="color:#974706;">de</font>
                                    <font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>
                              


                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:'.$colorfonpretextb.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">
                                    $ '.$mpb.'
                                    </td>
                                    <td style="text-align:right; background-color: white; color:'.$colorfonpretextb.';border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">
                                    $ '.$mpbb.'
                                    </td>
                                </tr>';

                                if($mpc !='0' && $mkc !='0'){
                                echo'<tr>


                                    <td colspan="'.$cartels.'" style="text-align:right; background-color:'.$str.'; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                    <font style="color:#974706;">Por</font>
                                    <font style="color:#008000;">'.$mkc.'</font>
                                    ';
                
                                                    if($muc=='1'){
                                                    echo'
                                    <font style="color:#FF0000;">'.$rowproductos["modo_producto"].''.$pingosb.'</font>
                                    <font style="color:#974706;">de</font>
                                    <font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color:'.$colorfonpre.'; color:'.$colorfonpretext.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">
                                    $ '.$mpc.'
                                    </td>
                                    <td style="text-align:right; background-color:'.$colorfonpre.'; color:'.$colorfonpretext.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">
                                    $ '.$mpcb.'
                                    </td>
                                </tr>';}


                           
                                if($mpd !='0'&& $mkd !='0'){
                                    echo'<tr>
    
    
                                        <td colspan="'.$cartels.'" style="text-align:right; background-color:'.$str.'; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">'.$mkd.'</font>
                                        ';
                    
                                                        if($mud=='1'){
                                                        echo'
                                        <font style="color:#FF0000;">'.$rowproductos["modo_producto"].''.$pingosd.'</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                        </td>
                                        <td style="padding-top: 1px; text-align:center;background-color: white; color:'.$colorfonpretextb.';border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">
                                        $ '.$mpd.'
                                        </td>
                                        <td style="text-align:right; background-color: white; color:'.$colorfonpretextb.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">
                                        $ '.$mpdb.'
                                        </td>
                                    </tr>';}



                                if($mpe !='0'&& $mke !='0'){
                                    echo'<tr>
    
    
                                        <td colspan="'.$cartels.'" style="text-align:right; background-color:'.$str.'; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">'.$mke.'</font>
                                        ';
                    
                                                        if($mue=='1'){
                                                        echo'
                                        <font style="color:#FF0000;">'.$rowproductos["modo_producto"].''.$pingose.'</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                        </td>
                                        <td style="padding-top: 1px; text-align:center;background-color: black; color:'.$colorfonpretext.';border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">
                                        $ '.$mpe.'
                                        </td>
                                        <td style="text-align:right; background-color: black; color:'.$colorfonpretext.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">
                                        $ '.$mpeb.'
                                        </td>
                                    </tr>';}

                           echo' </table>
                        </td>
                    </tr>
                </table>';