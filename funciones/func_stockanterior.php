<?php
 function calculostock($rjdhfbpqj,$id_producto,$fecha){

        /* calculo cobros saldoini */

        $fecha='2028-01-01';
      



$sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom  WHERE id_producto='$id_producto' and  fecha < '$fecha' ");
        while($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
            $unid_bulto=$rowpagdeufp["unid_bulto"];
            $kilo=$rowpagdeufp["kilo"];
            if($unid_bulto=='1'){
                $totald+= $rowpagdeufp["agrstock"];
                $totald= $totald*$kilo;

            }else{

                $totald+= $rowpagdeufp["agrstock"];
            }

        }
        
        $sqlpeufpd = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden WHERE id_producto='$id_producto' and  fecha < '$fecha' and modo='0'");
      
        while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {
           
            $tipounidad=$rowpaufp["tipounidad"];
            $presentacion=$rowpaufp["presentacion"];

            if($tipounidad=='1'){
                $venta+= $rowpaufp["kilos"];
                $ventatotal= $venta*$presentacion;

            }else{

                $ventatotal+= $rowpaufp["kilos"];
            }
            
        }

     
        $totalstock=$totald-$ventatotal;

        
        //   if(empty($iddorden) ){
            
/*         $sclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_clienteint'");
        if ($rowpclientes = mysqli_fetch_array($sclientes)) {$saldoini=$rowpclientes['saldoini'];} */
        
        //  }
        
        


//if($saldo<0.1){$saldo=0;}
    return $totalstock;

 }


 

?>

