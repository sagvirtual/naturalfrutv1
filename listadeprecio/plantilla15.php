

                <!-- lista muestra15-->
                <?php 
 

echo'
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>

                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>


                                    <td align="center" colspan="2" style=" vertical-align: middle; border-bottom: none;background-color:'.$str.'; text-align:center;  font-size: 24pt; padding: 3px; ">';

                                    echo '<p>';
                                    foreach ($palabras as $palabra) {
                                        // Seleccionar un color aleatorio de la lista de colores
                                        $color = $colores[array_rand($colores)];
                                        // Imprimir la palabra con el color seleccionado
                                        echo '<span style="color: ' . $color . ';">' . $palabra . '</span> ';
                                    }
                                    echo '</p>';

                                     echo' 

                                    </td>
                                    <td colspan="2" style="width: 200px; background-color: #006FE0; text-align:center; border: none; font-size: 16pt; padding: 10px;  color:white;">Nuevo Ingreso</td>

                                </tr>

                                <tr>

                                    <td style="background-color:'.$str.'; height: 35px;padding-left: 10px;font-size: 16pt; border-bottom: 0.1mm solid black;">
                                        
                                    <font style="color:#AF3C00;">Bolsa x 25 kg en Envase Original</font>
                                        <font style="color:#904FD0;">Precio del Kg </font>
                                    
                                        </td>

                                    <td style="padding-top: 1px; text-align:center;background-color:'.$str.'; color:#000000; border-left: none; border-bottom: 0.1mm solid black; font-size: 18pt; padding-right: 10px;">
                                        $ 4.290</td>
                                    <td style="text-align:center; background-color: black; color:#ffffff; border-left: 0.1mm solid black; border-bottom: 0.1mm solid black; font-size: 30pt; padding-top: 1px;">$ 64.350</td>
                                </tr>


                            </table>
                        </td>
                    </tr>
                </table>';