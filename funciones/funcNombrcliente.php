<?php 
function NomCliente($rjdhfbpqj,$id_cliente){

                            $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$id_cliente'");
                             if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {  
                                                                 
                                $nombrecli=$rowusuarios["nom_contac"]." ".$rowusuarios["nom_empr"];
                                      
                                    }
                            return $nombrecli;
                             } 
                         
                        ?>




