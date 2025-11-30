<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');

$hdnsbloekdjgsd = $_POST['fechaold']; //fecha old

$id_clientecz = $_POST["id_clientecz"];
$id_ordencli = $_POST["id_ordencli"];

$fecharepart = $_POST["fecharepart"];
$idcamioneta = $_POST["idcamioneta"];
$idcamionetacod = base64_encode($idcamioneta);

if (!empty($fecharepart) && !empty($idcamioneta) && !empty($id_ordencli) && !empty($id_clientecz)) {

    $sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha = '$fecharepart' and id_cliente='$id_clientecz'");
    if ($roworden = mysqli_fetch_array($sqlorden)) {


        echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='ver_hoja_de_ruta?error=1&hdnsbloekdjgsd=$hdnsbloekdjgsd&hdnskdjjgsd=$idcamionetacod'");
echo ("</script>");

    } else {



        //me fijo que no se alla entregado los productos
        $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$id_ordencli' and conf_entrega='0'");
        if ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {

            $sqlhoja = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja Where fecha = '$fecharepart' and camioneta='$idcamioneta'");
            if ($rowhoja = mysqli_fetch_array($sqlhoja)) {
            } else {
                $sqlhojai = "INSERT INTO `hoja` (fecha, camioneta) VALUES ('$fecharepart', '$idcamioneta');";
                mysqli_query($rjdhfbpqj, $sqlhojai) or die(mysqli_error($rjdhfbpqj));
            }



            $sqlorden = "Update orden Set fecha='$fecharepart' Where id_cliente = ' $id_clientecz' and id = '$id_ordencli' and col !='8'";
            mysqli_query($rjdhfbpqj, $sqlorden) or die(mysqli_error($rjdhfbpqj));


            $sqlitemorden = "Update item_orden Set fecha='$fecharepart' Where id_cliente = ' $id_clientecz' and id_orden = '$id_ordencli'";
            mysqli_query($rjdhfbpqj, $sqlitemorden) or die(mysqli_error($rjdhfbpqj));
        } else {

            $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$id_ordencli'");
            if ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
                //si encuentro una orden
            } else {

                $sqlhoja = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja Where fecha = '$fecharepart' and camioneta='$idcamioneta'");
                if ($rowhoja = mysqli_fetch_array($sqlhoja)) {
                } else {
                    $sqlhojai = "INSERT INTO `hoja` (fecha, camioneta) VALUES ('$fecharepart', '$idcamioneta');";
                    mysqli_query($rjdhfbpqj, $sqlhojai) or die(mysqli_error($rjdhfbpqj));
                }



                $sqlorden = "Update orden Set fecha='$fecharepart' Where id_cliente = ' $id_clientecz' and id = '$id_ordencli' and col !='8'";
                mysqli_query($rjdhfbpqj, $sqlorden) or die(mysqli_error($rjdhfbpqj));
            }
        }
        echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='ver_hoja_de_ruta?hdnsbloekdjgsd=$hdnsbloekdjgsd&hdnskdjjgsd=$idcamionetacod'");
    echo ("</script>");
    }

}





