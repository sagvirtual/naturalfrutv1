
                <!-- lista muestra20-->
                <?php 

                 echo'<table cellPadding="0" cellSpacing="0" style=" '.$anchotable.'  border: none; "><tr>


                                <td style="width: 610px; border-bottom: 0.1mm solid black;background-color: red; text-align:center;  font-size: 20pt; padding: 3px; ">
                                <font style="color:#ffffff;">'.mb_strtoupper($nombrecate, 'UTF-8').'</font>';


                                   echo'  </td>
                                    
                            <td style="width: 190px; border-bottom: 0.1mm solid black; color:#ffffff; height: 28px;  background-color: red; text-align:center; border-left: 0.1mm solid black; padding-left: 2px; ; font-size: 12pt;">

                                    Precio <br>Unitario
                               
                                   
                                    </td>';

                                    if($mpb !='0'&& $mkb !='0'){
                                    echo'
                                    <td style="width: 190px; border-bottom: 0.1mm solid black; color:#ffffff;  background-color: red; text-align:center; border-left: 0.1mm solid black; padding-left: 2px; padding-right: 2px; font-size: 14;">

                                    Precio <br>Unitario <br>x '.$mkb.' '.substr($rowproductos["unidadnom"], 0, -1).'


                                        </td>';
                                    }


                                    if($mpc !='0'&& $mkc !='0'){
                                        echo'
                                        <td style="width: 190px; border-bottom: 0.1mm solid black; color:#ffffff;  background-color: red; text-align:center; border-left: 0.1mm solid black; padding-left: 2px; padding-right: 2px; font-size: 14;">
    
                                        Precio <br>Unitario <br>x '.$mkc.' '.substr($rowproductos["unidadnom"], 0, -1).'
    
    
                                            </td>';
                                        }

                                        if($mpd !='0'&& $mkd !='0'){
                                            echo'
                                            <td style="width: 190px; border-bottom: 0.1mm solid black; color:#ffffff;  background-color: red; text-align:center; border-left: 0.1mm solid black; padding-left: 2px; padding-right: 2px; font-size: 16;">
        
                                            Precio <br>Unitario <br>x '.$mkd.' '.substr($rowproductos["unidadnom"], 0, -1).'
        
        
                                                </td>';
                                            }

                                            if($mpe !='0'&& $mke !='0'){
                                                echo'
                                                <td style="width: 190px; border-bottom: 0.1mm solid black; color:#ffffff;  background-color: red; text-align:center; border-left: 0.1mm solid black; padding-left: 2px; padding-right: 2px; font-size: 16;">
            
                                                Precio <br>Unitario <br>x '.$mke.' '.substr($rowproductos["unidadnom"], 0, -1).'
            
            
                                                    </td>';
                                                }

                                echo'</tr>';
                            




                              echo  '<tr>

                                    <td style=" height: 35px;padding-left: 2px; font-size: 13pt; border-bottom: 0.1mm none black;">
                                        <font style="color:#000000;">'.$nombreproduc.'</font>';

                                       
                                        if($mubvx!='9'){
                                            echo'
                                        <font style="color:#FF0000;">'.$rowproductos["modo_producto"].''.$pingosb.'
                                        x '.$rowproductos["kilo"].'&nbsp;';}echo''.substr($rowproductos["unidadnom"], 0, -1).'</font>';

                                        
                                    echo'</td>
                                    
                                    <td style="width: 190px; padding-top: 1px; text-align:center;background-color: white; color:#000099; border-left: 0.1mm solid black; border-bottom: 0.1mm none black; font-size: 12pt;"> 
                                    $&nbsp;'.$mpa.'
                                    </td>';

                                    if($mpb !='0'&& $mkb !='0'){
                                    echo'
                                    <td style="width: 190px; text-align:center; background-color: yellow; color:#9400E1; border-left: 0.1mm solid black; border-bottom: 0.1mm none black; font-size: 20pt; padding-top: 1px;">
                                    $&nbsp;'.$mpb.'
                                    </td>';
                                    }

                                    if($mpc !='0'&& $mkc !='0'){
                                        echo'
                                        <td style="width: 190px; text-align:center; background-color: yellow; color:#9400E1; border-left: 0.1mm solid black; border-bottom: 0.1mm none black; font-size: 20pt; padding-top: 1px;">
                                        $&nbsp;'.$mpc.'
                                        </td>';
                                        }

                                        if($mpd !='0'&& $mkd !='0'){
                                            echo'
                                            <td style="width: 190px; text-align:center; background-color: yellow; color:#9400E1; border-left: 0.1mm solid black; border-bottom: 0.1mm none black; font-size: 20pt; padding-top: 1px;">
                                            $&nbsp;'.$mpd.'
                                            </td>';
                                            }

                                            if($mpe !='0'&& $mke !='0'){
                                                echo'
                                                <td style="width: 190px; text-align:center; background-color: yellow; color:#9400E1; border-left: 0.1mm solid black; border-bottom: 0.1mm none black; font-size: 20pt; padding-top: 1px;">
                                                $&nbsp;'.$mpe.'
                                                </td>';
                                                }

                               echo' </tr>';
                                
                        echo'</table>';
                        