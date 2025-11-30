<? include('../f54du60ig65.php');
//require('../salidas/mpdf.php');

/* ini_set('max_execution_time', 10); // Aumenta el tiempo máximo de ejecución a 300 segundos
ini_set('memory_limit', '1512M');    // Aumenta el límite de memoria a 512 MB */
//comienzo pdf
//ob_start();
$idcod = $_GET['fndhom'];
$idcodrt = $_GET['fndhom'];
$anchotable="width: 100%; ";



?>
    
<!-- Spectrum CSS -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css"> -->

<style>

body {
        margin: 0;
        padding: 0;
    }
    table {
        page-break-inside: avoid;
      width: 100%;
        font-family: cambria;
        line-height: 1;
    }
    tr {
                page-break-inside: avoid;
            }

</style>
<? 



/* parametros de color y tecto cabezal */
$idlista = base64_decode($idcod);
$sqleditlista = mysqli_query($rjdhfbpqj, "SELECT * FROM editlista Where id = '$idlista'");
if ($roweditlista = mysqli_fetch_array($sqleditlista)) {
    $fechalista = $roweditlista["fecha"];
    $tipolista = $roweditlista["tipolista"];
    $comminima = $roweditlista["comminima"];
    $commmenor = $roweditlista["commmenor"];
    $noseac = $roweditlista["noseac"];
    $color1 = $roweditlista["color1"];
    $color2 = $roweditlista["color2"];
    $color3 = $roweditlista["color3"];
    $color4 = $roweditlista["color4"];
    $color5 = $roweditlista["color5"];
    $color6 = $roweditlista["color6"];
    $color7 = $roweditlista["color7"];
    $color8 = $roweditlista["color8"];
    $foto1 = $roweditlista["foto1"];

    if ($tipolista == '0') {
        $nbombrel = 'Mayorista';
    }
    if ($tipolista == '1') {
        $nbombrel = 'Especiales';
    }
}

if (empty($foto1)) {
    $idlistafo = 'logo.png';
} else {
    $timean = date("His"); 
    $idlistafo = $idlista."?".$timean;
}

if (empty($color1)) {
    $color1 = '#FFBB34';

}
if (empty($color2)) {
    $color2 = '#000000';
  
}

if (empty($color3)) {
    $color3 = '#FFFFFF';
  
}

if (empty($color4)) {
    $color4 = '#6C2500';

   
}
if (empty($color5)) {
    $color5 = '#FFFF00';

}

if (empty($color6)) {
    $color6 = '#FFFFFF';

}

if (empty($color7)) {
    $color7 = '#AD9162';

}
if (empty($color8)) {
    $color8 = '#FFFFFF';
  
}
/* si no hay texto tomoel anterior */
if (empty($noseac)) { 
    $sqleditliold = mysqli_query($rjdhfbpqj, "SELECT * FROM editlista Where tipolista = '$tipolista' and fecha < '$fechalist' ORDER BY `editlista`.`fecha` ASC");
    if ($roweditlisold = mysqli_fetch_array($sqleditliold)) {
        $noseac = $roweditlisold["noseac"];

    } else {
        $noseac = 'NO SE ACEPTAN AGREGADOS';
    }
}

if (empty($comminima)) {
    $sqleditlioldc = mysqli_query($rjdhfbpqj, "SELECT * FROM editlista Where tipolista = '$tipolista' and fecha < '$fechalist' ORDER BY `editlista`.`fecha` ASC");
    if ($roweditlisoldc = mysqli_fetch_array($sqleditlioldc)) {
        $comminima = $roweditlisoldc["comminima"];

    } else {
        $comminima = '$120000';
    }
}
if (empty($commmenor)) {
    $sqleditlioldd = mysqli_query($rjdhfbpqj, "SELECT * FROM editlista Where tipolista = '$tipolista' and fecha < '$fechalist' ORDER BY `editlista`.`fecha` ASC");
    if ($roweditlisoldd = mysqli_fetch_array($sqleditlioldd)) {
        $commmenor = $roweditlisoldd["commmenor"];


    } else {
        $commmenor = '$12000';
    }
}

//include 'scriptlis.php';

?>





<body>



       
<img src="/listadeprecio/portada.png" style="width: 200mm; height: 280mm; border: none;" > <br><br>

 
                <!-- cabezal 1-->
                <table  cellPadding="0" cellSpacing="0" style="background-color: <?= $color1 ?>; width: 100%; border: 0.5mm solid black; border-bottom: none; font-size: 12pt; vertical-align: top;">

                    <tr>

                        <td style="text-align:center; font-size: 10pt; padding: 5px;">
                            


                           
                         
                           
                            <font style="color:<?= $color2 ?>; ">Precios</font>
                            <font style="color:red;">Sin IVA </font>
                            <font style="color:<?= $color2 ?>;">Incluído y Sujetos a Modificación Sin Previo Aviso. </font>
                            <font style="color:red;">Rojo </font>
                            <font style="color:<?= $color2 ?>;">(Aumentos)</font>
                            <font style="color:green;">Verde </font>
                            <font style="color:<?= $color2 ?>;" >(Baja de Precios)</font>
                        </td>
                        <td style="text-align:center; padding:3px;">
                            
                           
                            <font style="color:<?= $color3 ?>; " ><?php echo '' . date('d/m/Y', strtotime($fechalista)) . '';?> &nbsp;</font>



                        </td>

                    </tr>
                </table>
                <!-- cabezal 2-->
                <table style="background-color: <?= $color4 ?>; width: 100%;  border: 0.5mm solid black; border-bottom: none; font-size: 12pt;">

                    <tr>

                        <td style="text-align:center; font-size: 14pt; ">
                          
                            <font style="color:<?= $color5 ?>;">COMPRA MÍNIMA</font>                          
                            <font style="color:<?= $color6 ?>;"><?= $comminima ?></font>
                            <font style="color:<?= $color5 ?>;"> Sin Costo de Envío - Compras Menores </font>
                            <font style="color:<?= $color6 ?>;"><?= $commmenor ?> </font>
                            <font style="color:<?= $color5 ?>;">Cargo de Envío</font>
                    </tr>
                </table>
                <!-- cabezal 3-->
                <table cellPadding="0" cellSpacing="0" style="background-color: <?= $color7 ?>; width: 100%;  border: 0.5mm solid black; font-size: 12pt;">

                    <tr>
                        <td style="text-align:center; padding: 2px; padding-left: 10px;">

                          
                            <img src="../listadeprecio/<?= $idlistafo ?>" width=auto height="30">

                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <img src="../listadeprecio/<?= $idlistafo ?>" width=auto height="30">
                        </td>
                       
                        <td style="text-align:center; font-size: 24pt ">
                           
                            <font style="color:<?= $color8 ?>;"><?= $noseac ?></font>

                        <td style="text-align:center; padding: 2px; padding-right: 10px;">
                            <img src="../listadeprecio/<?= $idlistafo ?>" width=auto height="30"> &nbsp;&nbsp; &nbsp;&nbsp;
                            <img src="../listadeprecio/<?= $idlistafo ?>" width=auto height="30">
                        </td>
                    </tr>
                    
                </table> 
      
                <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------- -->






                <? 
include('cssplantilla.php');
$timean = time(); 
$refresko =  "?".$timean;




   /* join   id='58' and*/
  $sqlcategoriasb = mysqli_query($rjdhfbpqj, "SELECT id,nombre FROM categorias Where estado='0' ORDER BY `categorias`.`position` ASC ");


while ($rowcategoriasb = mysqli_fetch_array($sqlcategoriasb)) {
  $id_categoria = $rowcategoriasb["id"];
    $nombrecate = strtoupper($rowcategoriasb["nombre"]);

      echo '<table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: none; "><tr>
      <td style=" background-color:black; color:white; text-align:center;">'.$nombrecate.'</td>
      </tr></table>';

    
    $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where estado='0' and categoria='$id_categoria' ORDER BY `productos`.`position` ASC ");
    //busco el produco por la categoria agregar while$canverificafind)
    $canverificafin = mysqli_num_rows($sqlproductos);

    while($canverificafin=='0'){$sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and estado='0' ORDER BY `productos`.`position` ASC ");}
    $canverificafind = mysqli_num_rows($sqlproductos)*2;
    while ($rowproductos = mysqli_fetch_array($sqlproductos)) {
      

        $idpro = $rowproductos["id"];
        $fileds = $rowproductos["file"];
        $modo_producto = $rowproductos["modo_producto"];
        $unidadnom = $rowproductos["unidadnom"];
        $id_marcasp = $rowproductos["id_marcas"];
        if("$modo_producto"=="Pack"){$pidtb="del";}else{$pidtb="de la ";}
        if("$unidadnom"=="Kg."){$pidt="del";}else{$pidt="de la ";}




        $str = obtenerSiguienteColor($ultimoIndice, $coloresPasteles);

        



        $nombreproducs = $rowproductos["nombre"];

        $nombreproduce= explode("(",$nombreproducs);
        $nombreproduc= $nombreproduce[0];


        $cosecha = $rowproductos["nombreb"];
        //$nombreproduc = strtolower($rowproductos["nombre"]);
        //$nombreproduc = ucfirst($nombreproduc);
        $colores=${"colores".$idpro};
        $id_marcasp=${"id_marcasp".$idpro};
        $nombremar=${"nombremar".$idpro};
        //$fileds=${"fileds".$idpro};
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

        $mua = ${"mua".$idpro};
        $mub = ${"mub".$idpro};  
        $muc = ${"muc".$idpro};
        $mud = ${"mud".$idpro};
        $mue = ${"mue".$idpro};



        $sqlpreciold=${"sqlpreciold".$idpro};
        $rowprecroold=${"rowprecroold".$idpro};



        $pingos = ${"pingos".$idpro};
        $pingosc = ${"pingosc".$idpro};
        $pingosd = ${"pingosd".$idpro};
        $pingose = ${"pingose".$idpro};
        
        $mpbb = ${"mpbb".$idpro};
        $mpcb = ${"mpcb".$idpro};
        $mpdb = ${"mpdb".$idpro};
        $mpeb = ${"mpeb".$idpro};
        
        $altofoto = ${"altofoto".$idpro};
        
        $colspan = ${"colspan".$idpro};


        
        $sqleditlispro = ${"sqleditlispro".$idpro};
        $roweditlispro = ${"roweditlispro".$idpro};
        $id_plantilla = ${"id_plantilla".$idpro}; 

        $sqleditlisproc = ${"sqleditlisproc".$idpro};
        $sqleditlisprocb = ${"sqleditlisprocb".$idpro};
        $roweditlisprod = ${"roweditlisprod".$idpro};  $sqleditlisproc = ${"sqleditlisproc".$idpro};
        $roweditlisprodb = ${"roweditlisprodb".$idpro};
        $fechalistaca = ${"fechalistaca".$idpro}; 
        $kilopresd = ${"kilopresd".$idpro}; 

        $sqleditlisproc=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where id_producto = '$idpro' and tipolista = '0' and fecha = '$fechalista'");
        if ($roweditlisprod = mysqli_fetch_array($sqleditlisproc)){
            $fechalistaca = $roweditlisprod["fecha"];}
            else{
   
                $sqleditlisprocb=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where id_producto = '$idpro' and tipolista = '0'");
                if ($roweditlisprodb = mysqli_fetch_array($sqleditlisprocb)){
                    $fechalistaca = $roweditlisprodb["fecha"];}
   
                  
   
            }

        /* ep ultimo precio del producto */
        $sqlpreciodant = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$idpro'  and cerrado = '1' and confirmado = '1'  ORDER BY fecha DESC, id DESC;");
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
             
        


            
            $palabras = explode(" ", $nombreproduc);
            
            // Colores disponibles
            $colores = array("#0064B7", "black", "#99431B");
            
            /* aca cambia normal verde o rojo si varia el precio */   
    
            $sqlpreciold = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where fecha <='$fechalisold' and id_producto='$idpro'  and cerrado = '1' and confirmado = '1'  ORDER BY fecha DESC, id DESC;");
            if ($rowprecroold = mysqli_fetch_array($sqlpreciold)) {$valoranter=$rowprecroold['mpb'];}else{$valoranter=$mpb;}
    
            $valoractual=$mpb;
            /* fin */
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
            
            
            
        $sqleditlispro=mysqli_query($rjdhfbpqj,"SELECT * FROM editlispro Where id_producto = '$idpro' and tipolist = '0' and fecha = '$fechalista'");
        if ($roweditlispro = mysqli_fetch_array($sqleditlispro)){
            $id_plantilla = $roweditlispro["id_plantilla"];}
            else{
                
                $sqleditlispro=mysqli_query($rjdhfbpqj,"SELECT * FROM editlispro Where id_producto = '$idpro' and tipolist = '0'");
        if ($roweditlispro = mysqli_fetch_array($sqleditlispro)){
            $id_plantilla = $roweditlispro["id_plantilla"];}else{
                
                
                if($palabras!=""){$id_plantilla='7';}else{
                $id_plantilla='99';}}
                }

            
            /* bulto */
          $mpba = $mpa * $kilopresd;
      /*     $mpbb = $mpb * $kilopresd;
            $mpcb = $mpc  * $kilopresd;
            $mpdb = $mpd  * $kilopresd;
            $mpeb = $mpe  * $kilopresd; */

            if($id_plantilla!='7'){
                $mpbb = $mpb  * $kilopresd;
                $mpcb = $mpc  * $kilopresd;
                $mpdb = $mpd  * $kilopresd;
                $mpeb = $mpe  * $kilopresd;
              }else{
                
      
                if($mub=='1'){$mpbbcantk = $mkb  * $kilopresd; $mpbb = $mpb  * $mpbbcantk;}else{$mpbb = $mpb  * $mkb; }
                if($muc=='1'){$mpcbcantk = $mkc  * $kilopresd; $mpcb = $mpc  * $mpcbcantk;}else{$mpcb = $mpc  * $mkc;}
                if($mud=='1'){$mpdbcantk = $mkd  * $kilopresd; $mpdb = $mpd  * $mpdbcantk;}else{$mpdb = $mpd  * $mkd;}
                if($mue=='1'){$mpebcantk = $mke  * $kilopresd; $mpeb = $mpe  * $mpebcantk;}else{$mpeb = $mpe  * $mke;}
              }
                  
          
            
            
            if($mkb == '1'){$pingos="";}else{$pingos="s";}
            if($mkc == '1'){$pingosc="";}else{$pingosc="s";}
            if($mkd == '1'){$pingosd="";}else{$pingosd="s";}
            if($mke == '1'){$pingose="";}else{$pingose="s";}


            
            $mpa = number_format($mpa, 0, '.', ',');
            $mkb = number_format($mkb, 0, '.', ',');
            $mpb = number_format($mpb, 0, '.', ',');
            $mkc = number_format($mkc, 0, '.', ',');
            $mpc = number_format($mpc, 0, '.', ',');
            $mkd = number_format($mkd, 0, '.', ',');
            $mpd = number_format($mpd, 0, '.', ',');  
            $mke = number_format($mke, 0, '.', ',');
            $mpe = number_format($mpe, 0, '.', ',');
            
            $mpba = number_format($mpba, 0, '.', ',');
            $mpbb = number_format($mpbb, 0, '.', ',');
            $mpcb = number_format($mpcb, 0, '.', ',');
            $mpdb = number_format($mpdb, 0, '.', ',');
            $mpeb = number_format($mpeb, 0, '.', ',');



        } 
        /* fin */

        

        $comoi="'";   
       
        echo '<table cellPadding="0" cellSpacing="0">
        <tr>
        <td>';
       

                 
             



                    
                   /* me fijo si hay carteles */

                   $sqleditlisproc=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where id_producto = '$idpro' and tipolista = '0' and fecha = '$fechalista'");
                   if ($roweditlisprod = mysqli_fetch_array($sqleditlisproc)){
                       $fechalistaca = $roweditlisprod["fecha"];}
                       else{

                           $sqleditlisprocb=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where id_producto = '$idpro' and tipolista = '0'");
                           if ($roweditlisprodb = mysqli_fetch_array($sqleditlisprocb)){
                               $fechalistaca = $roweditlisprodb["fecha"];}

                             

                       }




                    echo' <td>';
                   
                    
                 

                    if($id_plantilla!='14'){
                    
            include('plantilla'.$id_plantilla.'.php');
         
                    

          
                   
                
              
                
             echo'   </td>
                    </tr>
                </table> ';
       }
                
          

                
                
       







             
    }   
    
    
  
    /* trato que aparesca un solo cabezal */
   

}

?>

<?php $fechahoyas=date('d-m-Y', strtotime($fechalista));?>
</body>
<?  //envio de PDF

/* $html = ob_get_contents();
ob_end_clean();

$mpdf = new mPDF('A4-P'); ; 
$mpdf->AddPageByArray([
    "margin-left" => "5mm",
    "margin-right" => "5mm",
    "margin-top" => "5mm",
    "margin-bottom" => "5mm"
]);




$mpdf->writeHTML($html);
$mpdf->Output('lista Mayorista '. $fechahoyas . '.pdf', 'I'); //I D
 */






?>
