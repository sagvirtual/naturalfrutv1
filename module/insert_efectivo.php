<?php include('../f54du60ig65.php');

$camioneta='1';


$fechacodhoy = $_POST["fecha_caja"];
$id_camionetab = $_POST["id_camioneta"];
$efec1 = $_POST["efec1"];
$efec2 = $_POST["efec2"];
$efec3 = $_POST["efec3"];
$efec4 = $_POST["efec4"];
$efec5 = $_POST["efec5"];
$efec6 = $_POST["efec6"];
$efec7 = $_POST["efec7"];
$efec8 = $_POST["efec8"];
$efec9 = $_POST["efec9"];

$fechacarga=base64_encode($fechacodhoy);
$id_camioneta=base64_encode($id_camionetab);




    //revised if there is cassh deposited
    $sqlefectivo=mysqli_query($rjdhfbpqj,"SELECT * FROM efectivo Where fecha_caja = '$fechacodhoy' and id_camioneta='$id_camionetab'");
    if ($rowefectivo = mysqli_fetch_array($sqlefectivo)){
        $id_efectivo = $rowefectivo["id_efectivo"];

        $sqlefectivoa = "Update efectivo Set fecha_caja='$fechacodhoy', id_camioneta='$id_camionetab', efec1='$efec1', efec2='$efec2', efec3='$efec3', efec4='$efec4', efec5='$efec5', efec6='$efec6', efec7='$efec7', efec8='$efec8', efec9='$efec9' Where id_efectivo = '$id_efectivo'";
        mysqli_query($rjdhfbpqj, $sqlefectivoa) or die(mysqli_error($rjdhfbpqj));
    }else{
        $sqlefectivob = "INSERT INTO `efectivo` (fecha_caja, id_camioneta, efec1, efec2, efec3, efec4, efec5, efec6, efec7, efec8, efec9) VALUES ('$fechacodhoy', '$id_camionetab', '$efec1', '$efec2', '$efec3', '$efec4', '$efec5', '$efec6', '$efec7', '$efec8', '$efec9');";
        mysqli_query($rjdhfbpqj, $sqlefectivob) or die(mysqli_error($rjdhfbpqj));
    }

    echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='?hasta_date=$fechacarga&IdCamioneta=$id_camioneta&get=1'");
    echo("</script>"); 


   