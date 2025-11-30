
                <!-- muestra10 varian B sin nueva campaña-->
                <?php 
 

echo'
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>
                                    <td rowspan="4" style="background-color:'.$str.'; vertical-align: bottom;"> <img src="../lproductos/foto'.$idpro.''.$refresko.'" style="height: 135px; width: 200px; border: none;">
                                    </td>

                                    <td rowspan="2" style="background-color:'.$str.'; text-align:right; border: none; font-size: 20pt; padding: 3px; padding-right: 10px;">
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
                                    <td style="height: 28px; width: 110px; background-color:'.$str.'; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 10pt;">Precio del kg</td>
                                    <td style="width: 180px; background-color:'.$str.'; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 14;">Precio de la Caja x 5Kg</td>
                                </tr>
                                <tr>



                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 6.163</td>
                                    <td style="text-align:right; background-color: #000000; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; background-color:'.$str.'; border: none;font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>



                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.349</td>
                                    <td style="text-align:right; background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.212</td>
                                </tr>
                                <tr>


                                    <td style="text-align:right; background-color:'.$str.'; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.325</td>
                                    <td style="text-align:right; background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.371</td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>';