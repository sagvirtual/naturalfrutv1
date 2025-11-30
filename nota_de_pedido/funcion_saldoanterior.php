<?php
 function calculodeuda($rjdhfbpqj,$id_clienteint,$id_orden){

        /* calculo cobros saldoini */


      



$sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente = '$id_clienteint'and id < $id_orden and col!='0' ORDER BY `orden`.`id` DESC");
        while($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
            $iddorden=$rowpagdeufp["id"];
            $adicionalvalor+=$rowpagdeufp["adicionalvalor"];
           // $saldo = $rowpagdeufp["saldo"];
            $totald+= $rowpagdeufp["total"];
            $feorcha= $rowpagdeufp["fecha"];

        }
        
        $sqlpeufpd = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_clienteint'  and modo='1' and id_orden < '$id_orden' ORDER BY `item_orden`.`id` ASC");
        $canv = mysqli_num_rows($sqlpeufpd);
        while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {

            $pagoTotal += $rowpaufp["valor"];
        }

        $sqlpecrpd = mysqli_query($rjdhfbpqj, "SELECT * FROM nota_credito Where id_cliente = '$id_clienteint'  and fin='1' and fecha <= '$feorcha' ORDER BY `nota_credito`.`id` ASC");
      
        while ($rowdpaufp = mysqli_fetch_array($sqlpecrpd)) {

            $ptotalcredi += $rowdpaufp["total"];
        }


        $pagoTotal=$pagoTotal+$ptotalcredi;

        
        //   if(empty($iddorden) ){
            
        $sclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_clienteint'");
        if ($rowpclientes = mysqli_fetch_array($sclientes)) {$saldoini=$rowpclientes['saldoini'];}
        
        //  }
        
        $saldo = $totald-$pagoTotal+$saldoini+$adicionalvalor;


//if($saldo<0.1){$saldo=0;}
    return $saldo;

 }


 function calculodeudaR($rjdhfbpqj,$id_clienteint,$id_orden){

    /* calculo cobros saldoini */


  



$sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente = '$id_clienteint'and id < $id_orden and col!='0' ORDER BY `orden`.`id` DESC");
    while($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
        $iddorden=$rowpagdeufp["id"];
        $adicionalvalor+=$rowpagdeufp["adicionalvalor"];
       // $saldo = $rowpagdeufp["saldo"];
        $totald+= $rowpagdeufp["total"];

    }
    
    $sqlpeufpd = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_clienteint'  and modo='1' and id_orden < '$id_orden' ORDER BY `item_orden`.`id` ASC");
    $canv = mysqli_num_rows($sqlpeufpd);
    while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {

        $pagoTotal += $rowpaufp["valor"];
    }



    

    $saldo = $totald-$pagoTotal+$saldoini+$adicionalvalor;
    
    if(empty($iddorden) ){

    $sclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_clienteint'");
    if ($rowpclientes = mysqli_fetch_array($sclientes)) {$saldo=$rowpclientes['saldoini'];}

    }



//if($saldo<0.1){$saldo=0;}
return $saldo;

}
 



function calculosaldo($rjdhfbpqj,$id_clienteint,$id_orden){

    /* calculo cobros saldoini */


  



$sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente = '$id_clienteint'and id <= $id_orden and col!='0' ORDER BY `orden`.`id` DESC");
    while($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
        $iddorden=$rowpagdeufp["id"];
        $adicionalvalor+=$rowpagdeufp["adicionalvalor"];
       // $saldo = $rowpagdeufp["saldo"];
        $totald+= $rowpagdeufp["total"];
        $feorcha= $rowpagdeufp["fecha"];

    }
    
    $sqlpeufpd = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_clienteint'  and modo='1' and id_orden < '$id_orden' ORDER BY `item_orden`.`id` ASC");
    $canv = mysqli_num_rows($sqlpeufpd);
    while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {

        $pagoTotal += $rowpaufp["valor"];
    }


    $sqlpedcrpd = mysqli_query($rjdhfbpqj, "SELECT * FROM nota_credito Where id_cliente = '$id_clienteint'  and fin='1' and fecha <= '$feorcha' ORDER BY `nota_credito`.`id` ASC");
      
    while ($rowddpaufp = mysqli_fetch_array($sqlpedcrpd)) {

        $ptotalcredi += $rowddpaufp["total"];
    }
    $pagoTotald=$pagoTotal+$ptotalcredi;
    //   if(empty($iddorden) ){
        
    $sclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_clienteint'");
    if ($rowpclientes = mysqli_fetch_array($sclientes)) {$saldoini=$rowpclientes['saldoini'];}
    
    //  }
    
    $saldo = $totald-$pagoTotald+$saldoini+$adicionalvalor;


//if($saldo<0.1){$saldo=0;}
return $saldo;

}
?>

