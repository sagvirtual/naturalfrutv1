 <!-- muestra2 varian B sin nueva campaña-->
 <?php 

echo'
 <table cellPadding="0" cellSpacing="0" style=" '.$anchotable.'  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style="'.$anchotable.' height: 100px; border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>
                                <td style="background-color:'.$str.'; text-align:center; border: none; font-size: 20pt; padding: 3px; padding-right: 10px;">
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
                                   
                                   </tr>
                                   </table>
                                   </td>
                                   
                                </tr>
                               

                             
                </table>';?>