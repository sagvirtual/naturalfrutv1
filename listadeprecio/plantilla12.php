
                <!-- muestra12 varian C-->
                <?php 
 if($mpb !='0'){$colspan="3";$altofoto='170';}
 if($mpc !='0'){$colspan="4";$altofoto='170';}
 if($mpd !='0'){$colspan="5";$altofoto='200';}
 if($mpe !='0'){$colspan="6"; $altofoto='235';} 

echo'
                <table cellPadding="0" cellSpacing="0" style=" '.$anchotable.'  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>
                                    <td rowspan="'.$colspan.'" style="background-color:'.$str.'; vertical-align: bottom;">';
                                    if($rowproductos["file"]!=''){

                                        $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro'");
                                        if ($rowecartes = mysqli_fetch_array($sqlcartes)){
                                          echo '
                                          <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: 70px;  border: none;">';
                                        
                                        }else{

                                    
                                    echo' <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: '.$altofoto.'px; width: 220; border: none;">';}
                                }

                             
            
                                $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro' ORDER BY `editliscartel`.`position`");
                                while ($rowecartes = mysqli_fetch_array($sqlcartes)){
                                  echo '
                                  <img src="../cartelitos/'.$rowecartes['id_cartel'].'" style="height: 70px; border: none; ">';
                                
                                }
            
                                    echo'
                                    </td>

                                    <td colspan="2" style="background-color:'.$str.'; text-align: right; border: none; overflow: hidden; font-size: 15pt; padding: 3px; padding-right: 10px;">
                                    ';
                                    echo '<p>';
                                    if($palabras !=""){
                                        foreach ($palabras as $palabra) {
                                            // Seleccionar un color aleatorio de la lista de colores
                                            $color = $colores[array_rand($colores)];
                                            // Imprimir la palabra con el color seleccionado
                                            echo '<span style="color: ' . $color . ';">' . $palabra . '</span> ';
                                        }}else{echo' '.$nombreproduc.'';}
                                    echo '<br><font style="color:green; font-size: 16pt;">'.$cosecha.'</font></p>';
                                        
                                   echo' 

                                      
                                    </td>
                                    <td style="width: 110px; background-color:'.$str.'; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 10pt;">
                                    Precio '.$pidt.' '.substr($rowproductos["unidadnom"], 0, -1).'
                                    </td>
                                    <td style="width: 180px; background-color:'.$str.'; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 14;">
                                    Precio '.$pidtb.' '.$rowproductos["modo_producto"].'  x '.$kilopres.''.substr($rowproductos["unidadnom"], 0, -1).'
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="'.$colspan.'" style="background-color:'.$str.'; vertical-align: top;"></td>

                                    <td style="text-align:right; background-color: #ffffff; border: none; color:#000099; font-size: 16pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        Nueva Campaña
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color:'.$colorfonpre.'; color:'.$colorfonpretext.';  border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">
                                    $ '.$mpa.'
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

                                    echo'<td style="text-align:center; background-color: '.$colorcartes.'; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt; border-bottom: none; padding-top: 1px;">'.$textcar.'</td>';
                                
                                
                                echo'    </tr>';

                                if($mpb !='0'&& $mkb !='0'){
                                echo'<tr>
                                    <td style="text-align:right; background-color:'.$str.'; border: none;font-size: 16pt; padding-right: 9px; border-bottom: none; border-top: none;padding-top: 1px ">
                                    <font style="color:#974706;">Por</font>
                                    <font style="color:#008000;">'.$mkb.'</font>
                
                                    ';
                                                    
                                                    
                                                    if($mub=='1'){
                                                    
                                                    echo'
                                    <font style="color:#FF0000;">'.$rowproductos["modo_producto"].''.$pingos.'</font>
                                    <font style="color:#974706;">de</font>
                                    <font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>
                              





                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:'.$colorfonpretextb.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;"> $ '.$mpb.'</td>
                                    <td style="text-align:right; background-color: white; color:'.$colorfonpretextb.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ '.$mpbb.'</td>
                                </tr>';}

                                if($mpc !='0'&& $mkc !='0'){
                                echo'<tr>


                                    <td style="text-align:right; background-color:'.$str.'; border: none; font-size: 16pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                    <font style="color:#974706;">Por</font>
                                    <font style="color:#008000;">'.$mkc.'</font>
                                    ';
                
                                                    if($muc=='1'){
                                                    echo'
                                    <font style="color:#FF0000;">'.$rowproductos["modo_producto"].''.$pingosc.'</font>
                                    <font style="color:#974706;">de</font>
                                    <font style="color:#008000;">'.$rowproductos["kilo"].'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color:'.$colorfonpre.'; color:'.$colorfonpretext.';  border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ '.$mpc.'</td>
                                    <td style="text-align:right; background-color:'.$colorfonpre.'; color:'.$colorfonpretext.';  border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;"> $ '.$mpcb.'</td>
                                </tr>';}


                                if($mpd !='0'&& $mkd !='0'){
                                    echo'<tr>
                                        <td style="text-align:right; background-color:'.$str.'; border: none;font-size: 16pt; padding-right: 9px; border-bottom: none; border-top: none;padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">'.$mkd.'</font>
                    
                                        ';
                                                        
                                                        
                                                        if($mud=='1'){
                                                        
                                                        echo'
                                        <font style="color:#FF0000;">'.$rowproductos["modo_producto"].''.$pingosd.'</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">'.$kilopres.'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                  
    
    
    
    
    
                                        </td>
                                        <td style="padding-top: 1px; text-align:center;background-color: white; color:'.$colorfonpretextb.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;"> $ '.$mpd.'</td>
                                        <td style="text-align:right; background-color: white; color:'.$colorfonpretextb.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ '.$mpdb.'</td>
                                    </tr>';}

                                    if($mpe !='0'&& $mke !='0'){
                                        echo'<tr>
        
        
                                            <td style="text-align:right; background-color:'.$str.'; border: none; font-size: 16pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                            <font style="color:#974706;">Por</font>
                                            <font style="color:#008000;">'.$mke.'</font>
                                            ';
                        
                                                            if($mue=='1'){
                                                            echo'
                                            <font style="color:#FF0000;">'.$rowproductos["modo_producto"].''.$pingose.'</font>
                                            <font style="color:#974706;">de</font>
                                            <font style="color:#008000;">'.$rowproductos["kilo"].'</font>&nbsp;';}echo'<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                            </td>
                                            <td style="padding-top: 1px; text-align:center;background-color: black; color:'.$colorfonpretext.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ '.$mpe.'</td>
                                            <td style="text-align:right; background-color: black; color:'.$colorfonpretext.'; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;"> $ '.$mpe.'</td>
                                        </tr>';}

                           echo' </table>
                        </td>
                    </tr>
                </table>';