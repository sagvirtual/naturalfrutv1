
                <!-- lista muestra20-->
                <?php 
 
  
       if ($nomostitu % 2 == 0) {
           // Es par
           $colorfondo='background-color: white;';
           $colorfondop='background-color: yellow;';
       } else{$colorfondo='background-color: #EBEAEA;';$colorfondop='background-color: #DDDD00;';}


       $sqleditlissapro=mysqli_query($rjdhfbpqj,"SELECT * FROM editlispro Where tipolist = '0' and id_plantilla = '20' and fecha = '$fechalista'");
       $canverificdd = mysqli_num_rows($sqleditlissapro);
       if($notable!='1'){
       $notitulo="red;";
       }
     
                  echo'
                   <table cellPadding="0" cellSpacing="0" style=" '.$anchotable.';  border: none; ">';
                           
                 

                   echo'
                 <tr>


                                <td style="width: 310px; border-bottom: 0.1mm solid black;background-color: '.$notitulo.' text-align:center;  font-size: 20pt; padding: 3px; ">
                                <p style="'.$noverer.'">
                                <font style="color:#ffffff;">'.mb_strtoupper($nombrecate, 'UTF-8').'</font>  </p>';


                                   echo'  </td>
                                    
                            <td style="width: 190px; border-bottom: 0.1mm solid black; color:#ffffff;   background-color:  '.$notitulo.' text-align:center; border-left: 0.1mm solid black; padding-left: 2px; ; font-size: 12pt;">
                        <p style="'.$noverer.'">
                                    Precio <br>Unitario
                               
                                      </p>
                                    </td>';

                                    if($mpb !='0'&& $mkb !='0'){
                                    echo'
                                    <td style="width: 190px; border-bottom: 0.1mm solid black; color:#ffffff;  background-color:  '.$notitulo.' text-align:center; border-left: 0.1mm solid black; padding-left: 2px; padding-right: 2px; font-size: 14;">
                                        <p style="'.$noverer.'">
                                    Precio <br>Unitario <br>x '.$mkb.' '.substr($rowproductos["unidadnom"], 0, -1).'
                                        </p>

                                        </td>';
                                    }


                                    if($mpc !='0'&& $mkc !='0'){
                                        echo'
                                        <td style="width: 190px; border-bottom: 0.1mm solid black; color:#ffffff;  background-color:  '.$notitulo.' text-align:center; border-left: 0.1mm solid black; padding-left: 2px; padding-right: 2px; font-size: 14;">
      <p style="'.$noverer.'">
                                        Precio <br>Unitario <br>x '.$mkc.' '.substr($rowproductos["unidadnom"], 0, -1).'
     </p>

    
                                            </td>';
                                        }

                                        if($mpd !='0'&& $mkd !='0'){
                                            echo'
                                            <td style="width: 190px; border-bottom: 0.1mm solid black; color:#ffffff;  background-color:  '.$notitulo.' text-align:center; border-left: 0.1mm solid black; padding-left: 2px; padding-right: 2px; font-size: 16;">
        
                                            Precio <br>Unitario <br>x '.$mkd.' '.substr($rowproductos["unidadnom"], 0, -1).'
        
        
                                                </td>';
                                            }

                                            if($mpe !='0'&& $mke !='0'){
                                                echo'
                                                <td style="width: 190px; border-bottom: 0.1mm solid black; color:#ffffff;  background-color:  '.$notitulo.' text-align:center; border-left: 0.1mm solid black; padding-left: 2px; padding-right: 2px; font-size: 16;">
            
                                                Precio <br>Unitario <br>x '.$mke.' '.substr($rowproductos["unidadnom"], 0, -1).'
            
            
                                                    </td>';
                                                }

                                echo'</tr>';
                            


                            $nombreproduc = $rowproductos["nombre"];

                              echo  '<tr>

                                    <td  style=" height: 35px;padding-left: 2px; font-size: 13pt; border-bottom: 0.1mm none black; '.$colorfondo.'">
                                        <font style="color:#000000;">'.$nombreproduc.' '.$nomostitu.' '.$canverificdd.'</font>';

                                       
                                        if($mubvx!='9'){
                                            echo'
                                        <font style="color:#FF0000;">'.$rowproductos["modo_producto"].''.$pingosb.'
                                        x '.$rowproductos["kilo"].'&nbsp;';}echo''.substr($rowproductos["unidadnom"], 0, -1).'</font>';

                                          
                                        if($rowproductos["file"]!=''){

                                            $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro'");
                                            if ($rowecartes = mysqli_fetch_array($sqlcartes)){
                                              echo '
                                             <br> <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: 70px; width: auto; border: none;">';
                                            
                                            }else{
    
                                        
                                        echo'<br> <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: 70px; width: auto; border: none;">';}
                                    }
    
                                 
                
                                    $sqlcartes=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalistaca' and tipolista = '0'  and id_producto='$idpro' ORDER BY `editliscartel`.`position`");
                                    while ($rowecartes = mysqli_fetch_array($sqlcartes)){
                                      echo '
                                      <img src="../cartelitos/'.$rowecartes['id_cartel'].'" style="height: 70px; border: none; ">';
                                    
                                    }
                                        /* modal */

                                 
            
                                    echo'</td>
                                    
                                    <td style="width: 190px; padding-top: 1px; text-align:center;background-color: white; color:#000099; border-left: 0.1mm solid black; border-bottom: 0.1mm none black; font-size: 12pt; '.$colorfondo.'"> 
                                    $&nbsp;'.$mpa.'
                                    </td>';

                                    if($mpb !='0'&& $mkb !='0'){
                                    echo'
                                    <td style="width: 190px; text-align:center; '.$colorfondop.' color:#9400E1; border-left: 0.1mm solid black; border-bottom: 0.1mm none black; font-size: 20pt; padding-top: 1px;">
                                    $&nbsp;'.$mpb.'
                                    </td>';
                                    }

                                    if($mpc !='0'&& $mkc !='0'){
                                        echo'
                                        <td style="width: 190px; text-align:center; '.$colorfondop.' color:#9400E1; border-left: 0.1mm solid black; border-bottom: 0.1mm none black; font-size: 20pt; padding-top: 1px;">
                                        $&nbsp;'.$mpc.'
                                        </td>';
                                        }

                                        if($mpd !='0'&& $mkd !='0'){
                                            echo'
                                            <td style="width: 190px; text-align:center; '.$colorfondop.' color:#9400E1; border-left: 0.1mm solid black; border-bottom: 0.1mm none black; font-size: 20pt; padding-top: 1px;">
                                            $&nbsp;'.$mpd.'
                                            </td>';
                                            }

                                            if($mpe !='0'&& $mke !='0'){
                                                echo'
                                                <td style="width: 190px; text-align:center; '.$colorfondop.' color:#9400E1; border-left: 0.1mm solid black; border-bottom: 0.1mm none black; font-size: 20pt; padding-top: 1px;">
                                                $&nbsp;'.$mpe.'
                                                </td>';
                                                }

                               echo' </tr></table>';
                               
                               if( $id_plantilla=='20'){$notable='1';}else{$notable='0';}
                                 if($notable=='1'){
                                  $notitulo="black;";
                                  $noverer="display:none";
                                  } else{$notitulo="red;";$noverer="display:block";}
                                
                               

                            //   $cantpros=$cantpros+1;
                               
                              // echo'</table>';
                            //   if($canverificafind==$cantpros){
                                
                              //  echo'</table>';
                                
                             //   echo ''.$cantpros.' fin '.$cantpros.'';}