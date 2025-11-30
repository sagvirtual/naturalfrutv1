

                <!-- muestra13 varian c en una linea por 5 quilos-->
                <?php 
 
 if($mpb !='0'){$colspan="3";$altofoto='140';}
 if($mpc !='0'){$colspan="4";$altofoto='140';}
 if($mpd !='0'){$colspan="5";$altofoto='140';}
 if($mpe !='0'){$colspan="6"; $altofoto='200';}

echo'
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>
                                    <td colspan="2" style="width: 540px; height: 50px; background-color:'.$str.'; text-align:right; border: none; font-size: 18pt; padding: 3px; padding-right: 10px;">
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
                                    <td colspan="3" style=" height: 50px;background-color: #006FE0; text-align:center; border: none; font-size: 16pt;   color:white;">Calidad&nbsp;Exportación</td>
                                </tr>
                                <tr>
                                    <td rowspan="'.$colspan.'" style=" height: 50px;background-color:'.$str.'; vertical-align: bottom;"> 
                                    <table border="0" cellPadding="0" cellSpacing="0">
    <tr>
        <td rowspan="2" border: none; vertical-align: bottom;>';
        if($rowproductos["file"]!=''){echo'
        <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: '.$altofoto.'px;width: 150px;  border: none;">';}
        echo'
    
        </td>';

                                    

        $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro' ORDER BY `editliscartel`.`position` ASC ");
        while ($rowecartes = mysqli_fetch_array($sqlcartes)){
          echo '

          <td  style="text-align:center;">
          <img src="../cartelitos/'.$rowecartes['id_cartel'].'" style="height: 70px; border: none; ">
          </td></tr>';
        }

      



            echo'</tr>
    </table>
                                    </td>



                                </tr>
                                <tr>




                                    <td colspan="3" style="text-align:right; background-color:'.$str.'; color:white; border-left: none; border-bottom: none; font-size: 16pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">
                                        <font style="color:#83148E;">Por</font>
                                        <font style="color:red;">1</font>
                                        <font style="color:#83148E;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>

                                    </td>
                                    <td style="text-align:center; background-color: '.$colorfonpre.'; color:'.$colorfonpretext.';  border-left: 0.1mm solid black; border-bottom: none; font-size: 20pt; "> $ '.$mpa.'</td>
                                </tr>';
                                if($mpb !='0'){

                                echo'<tr>
                                    <td style="text-align:right; background-color:'.$str.'; border: none; font-size: 20pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                    <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mkb.'</font>'; 
                                                                      
                                    
                                    if($mub=='1'){
                                    
                                    echo'
                                    <font style="color:#FF0000;">
                                    '.$rowproductos["modo_producto"].''.$pingos.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).', el '.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                       
                                    </td>

                                    <td colspan="3" style="text-align:center; background-color: white; color:'.$colorfonpretextb.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 30pt;  border-bottom: none; padding-top: 1px;"> $ '.$mpb.'</td>
                                </tr>';
                                    }
                                    if($mpc !='0'){

                                echo'
                                <tr>


                                    <td style="text-align:right; background-color:'.$str.'; border: none; font-size: 20pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                    <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mkc.'</font>';                                   
                                    
                                    if($muc=='1'){
                                    
                                    echo'
                                    <font style="color:#FF0000;">
                                    '.$rowproductos["modo_producto"].''.$pingosc.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).', el '.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                    </td>

                                    <td colspan="3" style="text-align:center; background-color: '.$colorfonpre.'; color:'.$colorfonpretext.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 30pt;  border-bottom: none; padding-top: 1px;"> $ '.$mpc.'</td>
                                </tr>';}

                                if($mpd !='0'){

                                    echo'<tr>
                                        <td style="text-align:right; background-color:'.$str.'; border: none; font-size: 20pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mkd.'</font>'; 
                                                                          
                                        
                                        if($mud=='1'){
                                        
                                        echo'
                                        <font style="color:#FF0000;">
                                        '.$rowproductos["modo_producto"].''.$pingosd.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).', el '.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                           
                                        </td>
    
                                        <td colspan="3" style="text-align:center; background-color: white; color:'.$colorfonpretextb.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 30pt;  border-bottom: none; padding-top: 1px;"> $ '.$mpd.'</td>
                                    </tr>';
                                        }

                                        if($mpe !='0'){

                                            echo'
                                            <tr>
            
            
                                                <td style="text-align:right; background-color:'.$str.'; border: none; font-size: 20pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                                <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mke.'</font>';                                   
                                                
                                                if($mue=='1'){
                                                
                                                echo'
                                                <font style="color:#FF0000;">
                                                '.$rowproductos["modo_producto"].''.$pingose.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).', el '.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                                </td>
            
                                                <td colspan="3" style="text-align:center; background-color: '.$colorfonpre.'; color:'.$colorfonpretext.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 30pt;  border-bottom: none; padding-top: 1px;"> $ '.$mpe.'</td>
                                            </tr>';}
            


                                echo'

                            </table>
                        </td>
                    </tr>
                </table>';