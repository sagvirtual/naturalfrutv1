<? include('../f54du60ig65.php');
include('../lusuarios/login.php');
$idcod = $_GET['juhytm'];
$idse = base64_decode($idcod);

$sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_producto = '$idse'");
if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
} else {

    if (!empty($idcod)) {
        $sqlborr = "delete from productos Where id= '$idse'";
        mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));

        $sqlborr = "delete from precioprod Where id_producto= '$idse'";
        mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
    }
}
echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../productos'");
echo ("</script>");
