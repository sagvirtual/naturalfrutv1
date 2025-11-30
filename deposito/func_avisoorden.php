<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
function avisoorden($rjdhfbpqj, $id_usuarioclav)
{
    $sqen = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_usuarioclav='$id_usuarioclav' and col>'1' and col<='3'");
    if ($rowod = mysqli_fetch_array($sqen)) {
        echo '
        <div class="alert alert-danger text-center">
        <strong>!!Tenes un Pedido Nº ' . $rowod['id'] . ' para Preparar!!</strong>
         <a href="../picking/"><button type="button"
                        class="btn btn-dark btn-xs btnGoToTop">Picking Pedidos</button></a>
        </div>
        
        ';
    }
}
$avisoorden = avisoorden($rjdhfbpqj, $id_usuarioclav);
