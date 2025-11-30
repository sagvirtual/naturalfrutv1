<?php
 function calculodeuda($rjdhfbpqj,$id_clienteint,$id_orden){

        /* calculo cobros saldoini */


      


/* 
$sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenprovee Where id_proveedor = '$id_clienteint'and id < $id_orden and col='8' ORDER BY `ordenprovee`.`id` DESC");
        while($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
            $iddorden=$rowpagdeufp["id"];
           // $saldo = $rowpagdeufp["saldo"];
            $totald+= $rowpagdeufp["cpratotal_prod"];

        } */
        
        $sqlpeufpd = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_proveedor = '$id_clienteint'  ORDER BY `prodcom`.`id` ASC");
        $canv = mysqli_num_rows($sqlpeufpd);
        while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {

            $pagoTotal += $rowpaufp["valor"];
            $totald+= $rowpaufp["cpratotal_prod"];
        }


        $saldo = $totald-$pagoTotal;
        
     /*    if(empty($iddorden) ){

        $sclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_clienteint'");
        if ($rowpclientes = mysqli_fetch_array($sclientes)) {$saldo=$rowpclientes['saldoini'];}

        } */



if($saldo<0.1){$saldo=0;}
    return $saldo;

 }
 
?>

