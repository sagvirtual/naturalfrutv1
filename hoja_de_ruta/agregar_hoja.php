<? include('../f54du60ig65.php'); 
$idcod=$_GET['juhytm'];
$dayver=$_GET['kjdsdsd'];
$hdnsbloekdjgsd=$_GET['hdnsbloekdjgsd'];
$idcamioneta=$_GET['hdnskdjjgsd'];
$id_camioneta=base64_decode($idcamioneta);
$idcliente=base64_decode($idcod);
$fechadecod=base64_decode($hdnsbloekdjgsd);


if(!empty($idcod)){



$sqlclientesr = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$idcliente'");//and dia_repart$dayver = '1' 
if ($rowclientesr = mysqli_fetch_array($sqlclientesr)) {
    
    $position=$rowclientesr['position'.$dayver];


        $sqlordenay = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente='$idcliente'and fecha < '$fechadecod' ORDER BY fecha asc");
        if ($rowordeny = mysqli_fetch_array($sqlordenay)) {
            $totalt = $rowordeny['total'];
        }

        $sqlorden = "INSERT INTO `orden` (id_cliente, fecha,  total, subtotal, position, camioneta, fin) VALUES ('$idcliente', '$fechadecod', '$totalt', '$totalt', '$position', '$id_camioneta', '1');";
        mysqli_query($rjdhfbpqj, $sqlorden) or die(mysqli_error($rjdhfbpqj));


   
    
    }


}else{echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='ver_hoja_de_ruta?hdnsbloekdjgsd=$hdnsbloekdjgsd&noooo&hdnskdjjgsd=$idcamioneta'");
    echo ("</script>");
    }


echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='ver_hoja_de_ruta?hdnsbloekdjgsd=$hdnsbloekdjgsd&hdnskdjjgsd=$idcamioneta'");
echo ("</script>");
?>




