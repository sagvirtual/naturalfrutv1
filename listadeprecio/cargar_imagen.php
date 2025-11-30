
<?php include ('../f54du60ig65.php');


$idlis=$_GET['idlis'];
$idse=base64_decode($idlis);
	if (!empty($_FILES["file"]["type"])) {
		$uploadedFile = '';

		$valid_extensions                                                                                                                                                                                   = array("jpeg", "jpg", "png");
		$temporary                                                                                                                                                                                          = explode(".", $_FILES["file"]["name"]);
		$file_extension                                                                                                                                                                                     = end($temporary);
		if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {$fileName = $idse;
			$sourcePath = $_FILES['file']['tmp_name'];
			$targetPath = $fileName;
			if (move_uploaded_file($sourcePath, $targetPath)) {
				$uploadedFile = $idse;

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
						$anchopro = $ancho * (30 / $alto );



					$thumb = imagecreatetruecolor(30, $anchopro);
					imagecopyresampled($thumb, $original, 0, 0, 0, 0, $anchopro, $altopro, $ancho, $alto);
					imagejpeg($thumb, $uploadedFile, 99);

				}

			}
		}

		//insert form data in the database
		$sql = "Update editlista Set foto1='$uploadedFile' Where id='$idse'";
		mysqli_query($rjdhfbpqj, $sql) or die(mysqli_error($rjdhfbpqj));
	}

	echo("<script language='JavaScript' type='text/javascript'>");
	echo("location.href='listaedit?jfndhom=$idlis'");
	echo("</script>"); 

?>