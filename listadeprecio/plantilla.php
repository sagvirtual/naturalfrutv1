<?php include('../f54du60ig65.php');
include('cssplantilla.php');
include('plantillaprodsql.php');
 
$id_plantilla=$_POST['id_plantilla'];
$tipolist=$_POST['tipolist'];
$fechalista=$_POST['fechalista'];
$str=$_POST['str'];

$timean = time(); 
$refresko =  "?".$timean;

$anchotable="width: 205mm; ";

  /* bulto */
  $nomostitu='1';

 $mpbas = str_replace(',', '',$mpa);
    
 $mpsba = $mpbas * $kilopresd;
 //$mpba = number_format($mpsba, 0, '.', ',');

 $mpbds = str_replace(',', '',$mpd);
    
 $mpsbd = $mpbds * $kilopresd;
 //$mpdb = number_format($mpsbd, 0, '.', ',');



 

       /* me fijo si hay carteles */

       $sqleditlisproc=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where id_producto = '$idpro' and tipolista = '0' and fecha = '$fechalista'");
       if ($roweditlisprod = mysqli_fetch_array($sqleditlisproc)){
           $fechalistaca = $roweditlisprod["fecha"];}
           else{

               $sqleditlisprocb=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where id_producto = '$idpro' and tipolista = '0'");
               if ($roweditlisprodb = mysqli_fetch_array($sqleditlisprocb)){
                   $fechalistaca = $roweditlisprodb["fecha"];}

                 

           }


         $sqlproductdos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$idpro'");
           if ($rowprodductos = mysqli_fetch_array($sqlproductdos)) {
               
            $cosecha = $rowproductos["nombreb"];
               $nombreproduc = strtolower($rowprodductos["nombre"]);
          
                
              
              }

if($id_plantilla!='20'){
echo'
<a href="../productos?buscar='.$idpro.'&jfnddhom='.$_SESSION['jfnddhom'].'&pagina='.$pagina.'&busquedads='.$busquedads.'"   target="_parent" style="text-decoration: none;">';
include('plantilla'.$id_plantilla.'.php');
echo'</a>';
/* inser o update de los parametros de la plantilla */
}else{
  $jdfndhom=$_SESSION['jfnddhom'];
  $paginda=$_SESSION['pagina'];
  $busqusedads=$_SESSION['busquedads'];
  echo ("<script language='JavaScript' type='text/javascript'>");
  echo ("location.href='listaedit?jfndhom=$jdfndhom&pagina=$paginda&busqueda=$busqusedads'");
  echo ("</script>");

}
$qleditl=mysqli_query($rjdhfbpqj,"SELECT * FROM editlispro Where id_producto = '$id_productosq' and tipolist = '$tipolist' and fecha = '$fechalista'");
if ($rowproductos = mysqli_fetch_array($qleditl)){

$sqleditlpro = "Update editlispro Set id_plantilla='$id_plantilla' Where id_producto = '$id_productosq' and tipolist = '$tipolist' and fecha = '$fechalista'";
mysqli_query($rjdhfbpqj, $sqleditlpro) or die(mysqli_error($rjdhfbpqj));
}else{

    $sqlproductos = "INSERT INTO `editlispro` (id_producto, tipolist, fecha, id_plantilla) VALUES ('$id_productosq', '$tipolist', '$fechalista', '$id_plantilla');";
mysqli_query($rjdhfbpqj, $sqlproductos) or die(mysqli_error($rjdhfbpqj));


}

?>