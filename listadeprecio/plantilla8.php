

                <!-- muestra8 con tofo sola 100 ALTURA -->
                <?php 
 
 if($mpb !='0'){$colspan="2";$altofoto='95';}
 if($mpc !='0'){$colspan="3";$altofoto='120';}
 if($mpd !='0'){$colspan="4";$altofoto='160';}
 if($mpe !='0'){$colspan="5"; $altofoto='200';}   
echo'
                <table cellPadding="0" cellSpacing="0" style=" '.$anchotable.'  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;   border-top:  0.1mm solid black;   font-size: 12pt;">
                                <tr>
                                    <td rowspan="'.$colspan.'" style="text-align:left; background-color:'.$str.';  border: none;">
                                       
                                    
                                    <table border="0" cellPadding="0" cellSpacing="0" >
                                        <tr>
                                            <td border: none;vertical-align: bottom; >';
                                            
                                          

                                             if($rowproductos["file"]!=''){

                                                $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro'");
                                                if ($rowecartes = mysqli_fetch_array($sqlcartes)){
                                                  echo '
                                                  <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: 70px;  border: none;">';
                                                
                                                }else{

                                            
                                            echo' <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: '.$altofoto.'px; width: 190; border: none;">';}
                                        }

                                      
                    
                                        $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro' ORDER BY `editliscartel`.`position`");
                                        while ($rowecartes = mysqli_fetch_array($sqlcartes)){
                                          echo '
                                          <img src="../cartelitos/'.$rowecartes['id_cartel'].'" style="height: 70px; border: none; ">';
                                        
                                        }
              






                                            echo'

                                            </td>
                                        </tr>
                                    
                                    </table>



                                    </td>
                                    <td style="background-color:'.$str.'; text-align:right; padding-right: 10px; border: none; font-size: 16pt; padding: 3px;">
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
                                    <td style="width: 110px; background-color:'.$str.'; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 10pt;">
                                    Precio '.$pidt.' '.substr($rowproductos["unidadnom"], 0, -1).'
                                    </td>
                                    <td style="width: 180px; background-color:'.$str.'; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 14;">
                                    Precio '.$pidtb.' 
                
                                    '.$rowproductos["modo_producto"].'  x '.$kilopres.''.substr($rowproductos["unidadnom"], 0, -1).'
                                    </td>
                                </tr>';
                                
                                if($mpb !='0'){
                                echo'<tr>
                                    <td style="text-align:right; background-color:'.$str.'; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                    <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mkb.'</font>';if($mub=='1'){echo'<font style="color:#FF0000;">
                                    '.$rowproductos["modo_producto"].''.$pingos.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>

                                        
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color:'.$colorfonpre.'; color:'.$colorfonpretext.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">
                                    $ '.$mpb.'
                                    </td>
                                    <td style="text-align:right; background-color:'.$colorfonpre.'; color:'.$colorfonpretext.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">
                                    $ '.$mpbb.'
                                    </td>
                                </tr>';}
                                
                                if($mpc !='0'){
                                echo'<tr>
                                    <td style="text-align:right; background-color:'.$str.'; border: none;font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                    <font style="color:#974706;display: inline;">Por</font>&nbsp;<font style="color:#008000;display: inline;">'.$mkc.'</font>';

                                    if($muc=='1'){
                                    echo'<font style="color:#FF0000;display: inline;">                                    
                                    '.$rowproductos["modo_producto"].''.$pingosc.'</font>&nbsp;<font style="color:#974706;display: inline;">de</font>&nbsp;<font style="color:#008000;display: inline;">'.$rowproductos["kilo"].'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>

                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:'.$colorfonpretextb.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ '.$mpc.'
                                    </td>
                                    <td style="text-align:right; background-color: white; color:'.$colorfonpretextb.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ '.$mpcb.'</td>
                                </tr>';}


                                if($mpd !='0'){
                                    echo'<tr>
                                        <td style="text-align:right; background-color:'.$str.'; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mkd.'</font>';if($mud=='1'){echo'<font style="color:#FF0000;">
                                        '.$rowproductos["modo_producto"].''.$pingosd.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>
    
                                            
                                        </td>
                                        <td style="padding-top: 1px; text-align:center;background-color:'.$colorfonpre.'; color:'.$colorfonpretext.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">
                                        $ '.$mpd.'
                                        </td>
                                        <td style="text-align:right; background-color:'.$colorfonpre.'; color:'.$colorfonpretext.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">
                                        $ '.$mpdb.'
                                        </td>
                                    </tr>';}


                                    if($mpe!='0'){
                                        echo'<tr>
                                            <td style="text-align:right; background-color:'.$str.'; border: none;font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                            <font style="color:#974706;display: inline;">Por</font>&nbsp;<font style="color:#008000;display: inline;">'.$mke.'</font>';
        
                                            if($mue=='1'){
                                            echo'<font style="color:#FF0000;display: inline;">                                    
                                            '.$rowproductos["modo_producto"].''.$pingose.'</font>&nbsp;<font style="color:#974706;display: inline;">de</font>&nbsp;<font style="color:#008000;display: inline;">'.$rowproductos["kilo"].'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>
        
                                            </td>
                                            <td style="padding-top: 1px; text-align:center;background-color: white; color:'.$colorfonpretextb.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ '.$mpe.'
                                            </td>
                                            <td style="text-align:right; background-color: white; color:'.$colorfonpretextb.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ '.$mpeb.'</td>
                                        </tr>';}
        
        

                           echo' </table>
                        </td>
                    </tr>
                </table>';