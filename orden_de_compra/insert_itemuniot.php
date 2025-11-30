<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $id_cliente=$_POST['id_cliente'];
 $fechaorden=$_POST['fechaordn'];
 $horaord=$_POST['horaord'];
 $id_ordenedit=$_POST['id_ordenedit'];
 $tipoprov=$_POST['tipoprov'];

 
 $producto=$_POST['producto'];
 $idproduc=$_POST['idproduc'];
 $cantidad=$_POST['cantidad'];
 $unidad=$_POST['unidad'];
 $descuenun=$_POST['descuenun'];
 $improteun=$_POST['improteun'];
 $importtot=$_POST['importtot'];
 $numero=$_POST['numero'];
 $numeror=$_POST['numeror'];
 $fac_a=$_POST['fac_a'];
 $fac_r=$_POST['fac_r'];

 
 $id_categoria=$_POST['id_categoria'];
 $id_marca=$_POST['id_marca'];


if($id_ordenedit== 'dsds'|| $id_ordenedit== ''){
 $sqlordenx=mysqli_query($rjdhfbpqj,"SELECT * FROM ordencompra Where id_cliente = '$id_cliente' and finalizada='0' and fin='1'");
 if ($rowordenx = mysqli_fetch_array($sqlordenx)){

    $id_orden=$rowordenx['id'];
    $colorden=$rowordenx['col'];
    

    /* udate dzona */

 }else{

    $timean= date("His");
    $fechaan = date("d-m-Y");
    $anclaje=$timean.$fechaan;
    $horas = date("H:i");
     

    $sqlorden = "INSERT INTO `ordencompra` (id_cliente, fecha, hora, anclaje, fin, zona, poszona,tipoprov,numero,numeror,fac_a,fac_r) VALUES ('$id_cliente', '$fechaorden', '$horaord', '$anclaje', '1', '$zona', '$poszona','$tipoprov','$numero','$numeror','1','$fac_r');";
        mysqli_query($rjdhfbpqj, $sqlorden) or die(mysqli_error($rjdhfbpqj));

    $sqlordenty=mysqli_query($rjdhfbpqj,"SELECT * FROM ordencompra Where anclaje = '$anclaje' and id_cliente = '$id_cliente' and fin='1'");
    if ($roworden = mysqli_fetch_array($sqlordenty)){


        $id_orden=$roworden['id'];
    }

 }

}else{ $id_orden=$_POST['id_ordenedit'];

}
if(!empty($id_cliente) && !empty($producto) && !empty($cantidad) && !empty($id_orden)){

    $sqlorit=mysqli_query($rjdhfbpqj,"SELECT * FROM item_compra Where id_orden = '$id_orden' and id_producto='$idproduc' and modo='0'");
    if ($roworitnx = mysqli_fetch_array($sqlorit)){
     

    }else{

        if($cantidad > 0){
                    
                $sqlitem_ordeni = "INSERT INTO `item_compra` (id_cliente, id_orden, fecha, id_producto, kilos, tipounidad, nombre, descuenun, precio, total, fin, agregado, hora, id_categoria, id_marca) VALUES ('$id_cliente', '$id_orden', '$fechaorden', '$idproduc', '$cantidad', '$unidad', '$producto', '$descuenun', '$improteun', '$importtot', '1', '$agregado', '$fechhoras', '$id_categoria', '$id_marca');";
                        mysqli_query($rjdhfbpqj, $sqlitem_ordeni) or die(mysqli_error($rjdhfbpqj));
                    }else{$noser='&error=1';
                    
                    //  echo 'xxColoque cantidades<br><br>';      
                    }
                
                        
              
            
            }
            
}else{echo 'Coloque cantidades<br><br>';}
                        $id_clientecod=base64_encode($id_cliente);
                        $id_ordencod=base64_encode($id_orden);

echo ("<script language='JavaScript' type='text/javascript'>");
                            echo ("location.href='index.php?jhduskdsa=$id_clientecod$noser&orjndty=$id_ordencod&ref=&#idpro=$idproduc'");
                            echo ("</script>");  

                           
                            
?>