<?php
 $id_productosq=$_POST['id_producto'];


 $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$id_productosq'");
 //busco el produco por la categoria agregar while
 if ($rowproductos = mysqli_fetch_array($sqlproductos)) {

     $idpro = $rowproductos["id"];
     $modo_producto = $rowproductos["modo_producto"];
     $unidadnom = $rowproductos["unidadnom"];
     if("$modo_producto"=="Pack"){$pidtb="del";}else{$pidtb="de la ";}
     if("$unidadnom"=="Kg."){$pidt="del";}else{$pidt="de la ";}




     $str = obtenerSiguienteColor($ultimoIndice, $coloresPasteles);

     

     $nombreproduc = strtolower($rowproductos["nombre"]);
     $nombreproduc = ucfirst($nombreproduc);




     $nombreproduce= explode("(",$nombreproduc);
     $nombreproduc= $nombreproduce[0];

     $colores=${"colores".$idpro};
     $palabras=${"palabras".$idpro};
     $palabra=${"palabra".$idpro};
     $colorfonpre=${"colorfonpre".$idpro};
     $colorfonpretext=${"colorfonpretext".$idpro};
     $valoranter=${"valoranter".$idpro};
     $valoractual=${"valoractual".$idpro};
     $sqlpreciodant=${"sqlpreciodant".$idpro};
     $rowprecrodant=${"rowprecrodant".$idpro};
     $kilopres=${"kilopres".$idpro};
     $mpa = ${"mpa".$idpro};
     $mkb = ${"mkb".$idpro};
     $mpb = ${"mpb".$idpro};
     $mkc = ${"mkc".$idpro};
     $mpc = ${"mpc".$idpro};
     $mkd = ${"mkd".$idpro};
     $mpd = ${"mpd".$idpro};  
     $mke = ${"mke".$idpro};
     $mpe = ${"mpe".$idpro};
     $pingos = ${"pingos".$idpro};
     $pingosc = ${"pingosc".$idpro};
     $pingosd = ${"pingosd".$idpro};
     $pingose = ${"pingose".$idpro};
     
     $mpbb = ${"mpbb".$idpro};
     $mpcb = ${"mpcb".$idpro};
     $mpdb = ${"mpdb".$idpro};
     $mpeb = ${"mpeb".$idpro};

     /* ep ultimo precio del producto */
     $sqlpreciodant = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$idpro'  and cerrado = '1' and confirmado = '1' ORDER BY `precioprod`.`fecha` DESC");
     if ($rowprecrodant = mysqli_fetch_array($sqlpreciodant)) {
         $kilopresd = $rowprecrodant["kilo"];
         $kilopres = str_replace(".", ",", $kilopresd);
         $mpa = $rowprecrodant["mpa"];
         $mkb = $rowprecrodant["mkb"];
         $mpb = $rowprecrodant["mpb"];
         $mkc = $rowprecrodant["mkc"];
         $mpc = $rowprecrodant["mpc"];
         $mkd = $rowprecrodant["mkd"];
         $mpd = $rowprecrodant["mpd"];  
         $mke = $rowprecrodant["mke"];
         $mpe = $rowprecrodant["mpe"];            
         
         $mua = $rowprecrodant["mua"];
         $mub = $rowprecrodant["mub"];
         $muc = $rowprecrodant["muc"];  
         $mud = $rowprecrodant["mud"];
         $mue = $rowprecrodant["mue"]; 
         
         /* bulto */
         $mpbb = $mpb * $kilopresd;
         $mpcb = $mpc  * $kilopresd;
         
         if($mkb == '1'){$pingos="";}else{$pingos="s";}
         if($mkc == '1'){$pingosc="";}else{$pingosc="s";}
         if($mkd == '1'){$pingosd="";}else{$pingods="s";}
         if($mke == '1'){$pingosb="";}else{$pingosb="s";}
         
         $mpa = number_format($mpa, 0, '.', ',');
         $mkb = number_format($mkb, 0, '.', ',');
         $mpb = number_format($mpb, 0, '.', ',');
         $mkc = number_format($mkc, 0, '.', ',');
         $mpc = number_format($mpc, 0, '.', ',');
         $mkd = number_format($mkd, 0, '.', ',');
         $mpd = number_format($mpd, 0, '.', ',');  
         $mke = number_format($mke, 0, '.', ',');
         $mpe = number_format($mpe, 0, '.', ',');
         
         $mpbb = number_format($mpbb, 0, '.', ',');
         $mpcb = number_format($mpcb, 0, '.', ',');
         $mpdb = number_format($mpdb, 0, '.', ',');
         $mpeb = number_format($mpeb, 0, '.', ',');



     } 
     /* fin */

     /* aca cambia normal verde o rojo si varia el precio */
     $valoranter='100';
     $valoractual='100';
     /* fin */
             
         $palabras = explode(" ", $nombreproduc);

         // Colores disponibles
         $colores = array("#0064B7", "black", "#99431B");

     /* si el precio es bajo */
     if( $valoranter > $valoractual){
         $colorfonpre="#FFFF14"; 
         $colorfonpretext="#007704"; 
         $colorfonpretextb="#007704"; 

     }elseif( $valoranter < $valoractual){
         $colorfonpre="black"; 
         $colorfonpretext="red"; 
         $colorfonpretextb="red"; 
     }
     elseif( $valoranter == $valoractual){
         $colorfonpre="black";  
         $colorfonpretext="white"; 
         $colorfonpretextb="black"; 
     }
    }
?>

