<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $codigo=$_POST['codigo'];
 $ubicacion=$_POST['ubicacion'];
 $pascol=$_POST['pascol'];
 $filapro=$_POST['filapro'];
 $idproducto=$_POST['idproducto'];


 if (strlen($codigo) == 12 || strlen($codigo) == 13){$codigv=$_POST['codigo'];}
 if (strlen($ubicacion) == 12 || strlen($ubicacion) == 13){$ubicaciono=$_POST['ubicacion'];}
 if (strlen($pascol) == 12 || strlen($pascol) == 13){$pascolo=$_POST['pascol'];}
//echo 'hola '.$codigv.' id pr: '. $idproducto.' ';
 

if(!empty($codigv)){
    
    if($codigv == "9780000009999" || $codigv == "978000000999"){
        $codyuigv=0;
    }else{ $codyuigv=$codigv;}

    $sqlcliefes = "Update productos Set codigo='$codyuigv' Where id = '$idproducto'";
    mysqli_query($rjdhfbpqj, $sqlcliefes) or die(mysqli_error($rjdhfbpqj));
}

if(!empty($ubicaciono)){

    if($ubicacion == "9780201379624" || $ubicacion == "978020137962"){$ubidssdoc='1';}
    elseif($ubicacion == "9780201379525" || $ubicacion == "978020137952"){$ubidssdoc='0';}
    elseif($ubicacion == "9780201379723" || $ubicacion == "978020137972"){$ubidssdoc='2';} 
    elseif($ubicacion == "9780201373721" || $ubicacion == "978020137372"){$ubidssdoc='3';}else{$ubidssdoc='9';}   
    if($ubicacioc=!''){
    $sqlcliefes = "Update productos Set ubicacion='$ubidssdoc' Where id = '$idproducto'";
    mysqli_query($rjdhfbpqj, $sqlcliefes) or die(mysqli_error($rjdhfbpqj));
}
}
if(!empty($pascolo)){

 function NombrePCF($rjdhfbpqj,$pascolo){
    if (strlen($pascolo) == 13){
$cod12 = substr($pascolo, 0, -1);
$codId = $cod12-878000000000;
}else{$codId = $pascolo-878000000000;}

    $sqlzona = mysqli_query($rjdhfbpqj, "SELECT * FROM picking Where id = '$codId'");
if ($rowzona = mysqli_fetch_array($sqlzona)) {  
    $vemoselv = $rowzona["nombre"];
}else{$vemoselv='';

}
return $vemoselv;
mysqli_close($rjdhfbpqj);
    } 


    if($pascol=!''){
        $vemoselv=NombrePCF($rjdhfbpqj,$pascolo);
   $sqlcliefes = "Update productos Set pascol='$vemoselv' Where id = '$idproducto'";
    mysqli_query($rjdhfbpqj, $sqlcliefes) or die(mysqli_error($rjdhfbpqj)); 

   
    }
}
if(!empty($filapro)){
    $sqlcliefes = "Update productos Set filapro='$filapro' Where id = '$idproducto'";
    mysqli_query($rjdhfbpqj, $sqlcliefes) or die(mysqli_error($rjdhfbpqj));
}
 if(empty($filapro)){ 

    echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='../codificacion/?idproedit=$idproducto'");
    echo("</script>"); } 
?>