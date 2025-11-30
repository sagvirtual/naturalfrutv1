<?php 
function NomPickin($rjdhfbpqj,$id_usuarioclav){

                            $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where id='$id_usuarioclav'");
                             if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {  
                                                                 
                                $nombreuspic=$rowusuarios["nom_contac"];
                                      
                                    }else{ $nombreuspic='<i style="color:red;">Sin Asignar!!!</i>';}
                            return $nombreuspic;
                             } 
                         
                        ?>
