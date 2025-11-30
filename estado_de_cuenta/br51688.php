<? include('../f54du60ig65.php');


$tablacod=$_GET["kmlmksnchdsa"];
$columnacod=$_GET["lejfhdns"];
$id_contenedorcod=$_GET["ueemxhpqgd"];
$idclientesen=$_GET["kjkdssdd"];

$jfdfhk= $_GET["jfdfhk"];
$id_tarea = $_GET["jdnbsd"];

$id_tareadec=base64_decode($id_tarea);

$sql ="delete from pagos Where id='$id_tareadec'";
mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='../debhab?kmlmksnchdsa=$tablacod&lejfhdns=$columnacod&ueemxhpqgd=$id_contenedorcod&kjkdssdd=$idclientesen'");
echo("</script>");	
?>

