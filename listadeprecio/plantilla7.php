    <!-- muestra7 con tofo sola --> 
    <?php 
  if($mpb !='0'){$colspan="1";$altofoto='75';}
  if($mpc !='0'){$colspan="2";$altofoto='120';}
  if($mpd !='0'){$colspan="3";$altofoto='120';}
  if($mpe !='0'){$colspan="4"; $altofoto='200';}        echo'
    <table cellPadding="0" cellSpacing="0" style=" '.$anchotable.'  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;   border-top:  0.1mm solid black;   font-size: 12pt;">
                                <tr>
                                    <td colspan="2" style=" background-color:'.$str.'; text-align:right; padding-right: 10px; border: none; font-size: 20pt; padding: 3px;">
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
                                    <td style=" background-color:'.$str.'; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 10pt;">
                                    Precio '.$pidt.' '.substr($rowproductos["unidadnom"], 0, -1).'
                                    </td>
                                    <td style=" background-color:'.$str.'; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 14;">
                                    Precio x Bulto
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="'.$colspan.'" style="text-align:left; background-color:'.$str.';  border: none;">
                                       
                                       
                                         <div id="#muestrocartel'.$idpro.'"></div>
                                         <div id="muestroaca'.$idpro.'">
                                         <table border="0" cellPadding="0" cellSpacing="0" style="width: 230px;">
                                         <tr>
                                         <td rowspan="'.$colspan.'" style="background-color:'.$str.'; vertical-align: bottom;"> ';



                                         if($rowproductos["file"]!=''){
     
                                             $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro'");
                                             if ($rowecartes = mysqli_fetch_array($sqlcartes)){
                                               echo '
                                               <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height:  '.$altofoto.'px; width: auto; max-width: 180px; border: none;">';
                                             
                                             }else{
     
                                         
                                         echo' <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: '.$altofoto.'px;  auto; max-width: 180px; border: none;">';}
                                     }
     
                                  
                 
                 
                                         echo'</td>';
                                         
                                         $cartels=${"cartels".$idpro};
                                         $altocartel=${"altocartel".$idpro};
                                         $canverificafin=${"canverificafin".$idpro};
                                         $fonttam=${"fonttam".$idpro};
                                         $cartels=1;
                                         $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro' ORDER BY `editliscartel`.`position`");
                                         $canverificafin = mysqli_num_rows($sqlcartes); 
                                         if($canverificafin=='1'){$altocartel="85"; $fonttam='22';}
                                             if($canverificafin=='2'){$altocartel="85";$fonttam='22';}
                                             if($canverificafin=='3'){$altocartel="85";$fonttam='15';}
                                             if($canverificafin=='0'){$fonttam='22';}

                                         while ($rowecartes = mysqli_fetch_array($sqlcartes)){
                                             $cartels=$cartels+1;
                                            
                                             
                                           echo '
                                           <td rowspan="2"  style="background-color:'.$str.'; "><img src="../cartelitos/'.$rowecartes['id_cartel'].'" style="height: '.$altocartel.'px; border: none; "></td>';
                                         
                                         }
                                        

                                           echo'  
                                         </tr>
                                        
                                     </table> </div>
                                    </td>
                                    <td style="width: 270px; text-align:right; background-color:'.$str.'; border: none; font-size:'.$fonttam.'pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">

                                    <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mkb.'</font>';                                   
                                    
                                    if($mub=='1'&& $mkb !='0'){
                                    
                                    echo'
                                    <font style="color:#FF0000;">
                                    '.$rowproductos["modo_producto"].''.$pingos.'</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">'.$kilopres.'</font>';}
                                    echo'&nbsp;<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>

                                        
                                    </td>
                                        <td style="width: 115px;padding-top: 1px; text-align:center;background-color:'.$colorfonpre.'; color:'.$colorfonpretext.'; border-top: 0.1mm solid black; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">

                                        &nbsp;$&nbsp;'.$mpb.'&nbsp;
                                    
                                    </td>
                                   <td style="width: 165px;text-align:center; background-color: '.$colorfonpre.'; color:'.$colorfonpretext.'; border-top: 0.1mm solid black; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">
                                    $&nbsp;'.$mpbb.'
                                    </td>
                                </tr>
                       

                                ';
                                if($mpc !='0' && $mkc !='0'){
                                echo'<tr>
                                    <td style="text-align:right; background-color: '.$str.'; border: none;font-size:'.$fonttam.'pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">'.$mkc.'</font>&nbsp;';
                    
                                                        if($muc=='1'){
                                                        echo'<font style="color:#FF0000;">'.$rowproductos["modo_producto"].''.$pingosc.'</font>&nbsp;<font style="color:#974706;">de&nbsp;</font><font style="color:#008000;">'.$kilopres.'</font>';}echo'&nbsp;<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>


                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:'.$colorfonpretextb.';border-top: 0.1mm solid black;  border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">
                                    $&nbsp;'.$mpc.'</td>
                                    <td style="text-align:center; background-color: white; color:'.$colorfonpretextb.'; border-top: 0.1mm solid black; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">
                                    $&nbsp;'.$mpcb.'</td>
                                </tr>';}
                    
                                if($mpd  !='0' && $mkd !='0'){
                                    echo'<tr>
                                        <td style="text-align:right; background-color: '.$str.'; border: none;font-size:'.$fonttam.'pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                            <font style="color:#974706;">Por</font>
                                            <font style="color:#008000;">'.$mkd.'</font>
                                            ';
                        
                                                            if($mud=='1'){
                                                            echo'
                                            <font style="color:#FF0000;">'.$rowproductos["modo_producto"].''.$pingosd.'</font>
                                            <font style="color:#974706;">de</font>
                                            <font style="color:#008000;">'.$kilopres.'</font>';}echo'&nbsp;<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                        </td>
                                        <td style="padding-top: 1px; text-align:center;background-color:'.$colorfonpre.'; color:'.$colorfonpretext.';border-top: 0.1mm solid black;  border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">
                                        $&nbsp;'.$mpd.'</td>
                                        <td style="text-align:center;background-color:'.$colorfonpre.'; color:'.$colorfonpretext.'; border-top: 0.1mm solid black; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">
                                        $&nbsp;'.$mpdb.'</td>
                                    </tr>';}
                    
                                    if($mpe !='0' && $mke !='0'){
                                        echo'<tr>
                                            <td style="text-align:center; background-color: '.$str.'; border: none;font-size:'.$fonttam.'pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                                <font style="color:#974706;">Por</font>
                                                <font style="color:#008000;">'.$mke.'</font>
                                                ';
                            
                                                                if($mue=='1'){
                                                                echo'
                                                <font style="color:#FF0000;">'.$rowproductos["modo_producto"].''.$pingose.'</font>
                                                <font style="color:#974706;">de</font>
                                                <font style="color:#008000;">'.$kilopres.'</font>';}echo'&nbsp;<font style="color:#974706;">'.substr($rowproductos["unidadnom"], 0, -1).'</font>
                                            </td>
                                            <td style="padding-top: 1px; text-align:center;background-color: white; color:'.$colorfonpretextb.';border-top: 0.1mm solid black;  border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">
                                            $&nbsp;'.$mpe.'</td>
                                            <td style="text-align:center; background-color: white; color:'.$colorfonpretextb.'; border-top: 0.1mm solid black; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">
                                            $&nbsp;'.$mpeb.'</td>
                                        </tr>';}



echo'
                            </table>
                        </td>
                    </tr>
                </table>

                ';
                ?>