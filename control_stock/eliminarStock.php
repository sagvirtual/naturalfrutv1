<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/func_actividad.php');

$idstok = $_POST["idstok"];
$idproduc = $_POST["idproduc"];

if (!empty($idstok)) {
    $sqlborr = "delete from stockhgz1 Where id= '$idstok' and id_producto='$idproduc'";
    mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));

    $origen = "Elimino stock Producto";
    $nod = 0;
    FuncActividad($rjdhfbpqj, $nod, $nod, $idproduc, $origen, $id_usuarioclav);
}


echo '
            <script>
        
            location.reload();
            </script>
            
            ';
