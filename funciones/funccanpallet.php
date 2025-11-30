<?php
 function ubicacionprohab($rjdhfbpqj,$id_producto){

    $sqe = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito Where id_producto='$id_producto' and fin='0'");
    $catpallet = mysqli_num_rows($sqe);
    
    

    return $catpallet; 
 }



