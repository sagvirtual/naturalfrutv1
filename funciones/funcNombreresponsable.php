<?php 
function NomResponsa($rjdhfbpqj,$id_usuario){

                            $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where id='$id_usuario'");
                             if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {  
                                                                 
                                $nombreresp=$rowusuarios["nom_contac"];
                                      
                                    }
                            return $nombreresp;
                             } 
                         
                        ?>




