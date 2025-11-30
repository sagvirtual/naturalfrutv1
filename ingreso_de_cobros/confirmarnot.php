<?php include( '../f54du60ig65.php' );
include( '../lusuarios/login.php' );
 
 $col=$_POST['confirmado'];

 $idorden=$_POST['iditem'];
 $id_clientecod=$_POST['id_clientecod'];
 $id_clientdcod=base64_encode($id_clientecod);


if ($id_clientdcod!='') {


/* 
        $sqlcliefes = "Update orden Set col='8', fecha10='$fechahoy', hora10='$horasin' Where id = '$idorden'";
        mysqli_query( $rjdhfbpqj, $sqlcliefes ) or die( mysqli_error( $rjdhfbpqj ) ); */
    

        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../deuda_clientes/debe_haber?jhduskdsa=$id_clientdcod'");
        echo ("</script>");
    } else{


        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../ingreso_cobros'");
        echo ("</script>");

    }

?>