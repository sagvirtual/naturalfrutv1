<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$iditem = $_POST['iditem'];
$cantpro = $_POST['cantpro'];
$idorden = $_POST['idorden'];
$idproduc = $_POST['idproduc'];





if (!empty($iditem && $idorden != '0')) {




    $sqlborr = "delete from item_presupues Where id= '$iditem' ";
    mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));

    if ($cantpro == '1') {

        $sqlborrd = "delete from presupuesto Where id= '$idorden'";
        mysqli_query($rjdhfbpqj, $sqlborrd) or die(mysqli_error($rjdhfbpqj));




        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../listado_presupuesto'");
        echo ("</script>");
    } else {
        echo '
        <script>
    
location.reload();
</script>
        
        ';
    }
}
echo '<div  class="alert alert-danger" style="width: 100%; text-align:center; color:red;"><strong>Emiminando...</strong></div>';
