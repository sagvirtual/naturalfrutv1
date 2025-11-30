<? include('../f54du60ig65.php');


$tablacod=$_POST["tabla"];
$columnacod=$_POST["columna"];
$id_contenedorcod=$_POST["id_contenedor"];
$idclientesen=$_POST["idclientes"];
$tipodeimp=$_POST["tipodeimp"];
$modosa=$_POST["modohaber"];


$importes=$_POST["importe"];
$forma=$_POST["forma"];
$nota=$_POST["nota"];
$fecha=$_POST["fecha"];

$id_tarea = $_POST["idpago"];

$cotidolar=$_POST["cotidolar"];
$moneda=$_POST["moneda"];


if($moneda==1){$importeb=$importes/$cotidolar;
   
	$infoconv=" (Cotización dolar $".$cotidolar.")" ;  		  
		  
	$importesa = $importeb;		  
		
			  
			  }else{
	
   
	$infoconv=" (Pago en Dolares ".$importes." cotización dolar $".$cotidolar.")" ;  		  
		  
	$importesa = $importes;
	
	
}

$notad = $_POST["nota"]."".$infoconv;





if($modosa=="1"){$debe=$importesa;}else{$importe=$importesa;}
$archivo = $_FILES["file"]["name"];

if (!empty($_FILES["file"]["type"])){
	
$sqlpagosd = "Update pagos Set archivo='$archivo'  Where id = '$id_tarea'";
mysqli_query($conexion, $sqlpagosd) or die(mysqli_error($conexion))	;

}

$sqlpagos = "Update pagos Set importe='$importe', forma='$forma', nota='$notad',  debe='$debe',  fecha='$fecha', cotidolar='$cotidolar', moneda='$moneda', modo='$modosa' Where id = '$id_tarea'";
mysqli_query($conexion, $sqlpagos) or die(mysqli_error($conexion));

$id_tarea='('.$id_tarea.')'.$_FILES["file"]["name"];

if (!empty($_FILES["file"]["type"])) {
	# code...

	if (!empty($_FILES["file"]["type"])) {
		$uploadedFile = '';

		//$valid_extensions  = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);
		$fileName = $id_tarea;
			$sourcePath = $_FILES['file']['tmp_name'];
			$targetPath = $fileName;
			if (move_uploaded_file($sourcePath, $targetPath)) {
				$uploadedFile = $id_tarea;
}
	

}
}


echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='../debhab?kmlmksnchdsa=$tablacod&lejfhdns=$columnacod&ueemxhpqgd=$id_contenedorcod&kjkdssdd=$idclientesen'");
echo("</script>");	
?>




