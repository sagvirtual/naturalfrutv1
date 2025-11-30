
<?php include ('../f54du60ig65.php');


$idlis=$_GET['idlis'];
$idproduc=$_GET['idproduc'];
$idse=base64_decode($idlis);
	if (!empty($_FILES["file"]["type"])) {
		$uploadedFile = '';

		$valid_extensions                                                                                                                                                                                   = array("jpeg", "jpg", "png");
		$temporary                                                                                                                                                                                          = explode(".", $_FILES["file"]["name"]);
		$file_extension                                                                                                                                                                                     = end($temporary);
		if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {$fileName = "foto".$idproduc;
			$sourcePath = $_FILES['file']['tmp_name'];
			$targetPath = $fileName;

            $targetFolder = "../lproductos/"; // Ruta a la carpeta específica
            $targetPath = $targetFolder . $fileName; // Path completo a la imagen de destino


			if (move_uploaded_file($sourcePath, $targetPath)) {
				$uploadedFile = $idproduc;

				if (($file_extension == "jpg") || ($file_extension == "jpeg") || ($file_extension == "JPG") || ($file_extension == "JPEG")) {

					$filenames = $uploadedFile;
					$exif = @exif_read_data($filenames);
					$ort = $exif['Orientation'];
					$ort1 = $ort;
					$exif = @exif_read_data($filenames, 0, true);
				
					@imagejpeg($image, $filenames, 99);

					$original = imagecreatefromjpeg("$uploadedFile");
					$ancho    = imagesx($original);
					$alto     = imagesy($original);
					


						// Calcular el nuevo ancho manteniendo la proporción de aspecto
						$anchopro = $ancho * (200 / $alto );



					$thumb = imagecreatetruecolor(200, $anchopro);
					imagecopyresampled($thumb, $original, 0, 0, 0, 0, $anchopro, $altopro, $ancho, $alto);
					imagejpeg($thumb, $uploadedFile, 99);

				}

			}
		}

		//insert form data in the database
		$sql = "Update productos Set file='$uploadedFile' Where id='$idproduc'";
		mysqli_query($rjdhfbpqj, $sql) or die(mysqli_error($rjdhfbpqj));
	}


	$pagina=$_SESSION['pagina'];
	$busquedads=$_SESSION['busquedads'];

	echo("<script language='JavaScript' type='text/javascript'>");
	echo("location.href='listaedit?jfndhom=$idlis&pagina=$pagina&busqueda=$busquedads'");
	echo("</script>"); 



?>