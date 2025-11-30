<?php


/* elimina los item y actualiza el stok */
function eliminaitem($rjdhfbpqj, $iditem, $idproduc, $idorden, $cantpro)
{
    $cantprod = 0;
    if (!empty($iditem)) {

        $sqlborr = "delete from item_presupues Where id= '$iditem'";
        mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));


        if ($cantpro == '1') {

            $sqlborrd = "delete from presupuesto Where id= '$idorden'";
            mysqli_query($rjdhfbpqj, $sqlborrd) or die(mysqli_error($rjdhfbpqj));



            echo ("<script language='JavaScript' type='text/javascript'>");
            echo ("location.href='../listado_presupuesto'");
            echo ("</script>");
        }
    }
    echo '       <script>
        setTimeout(function(){
            location.reload();
        }, 2000); </script>';
    $cantprod = $cantprod + 1;
    echo '
        <div style="display: flex;justify-content: center;align-items: center;position: fixed;top: 0;left: 0;width: 100%;height: 100%;">
        <div  class="alert alert-danger" role="alert"><strong>Emiminando ' . $cantpro . ' un momento por favor...</strong></div></div>';
    mysqli_close($rjdhfbpqj);
}


function eliminarorden($idorden, $rjdhfbpqj)
{

    include('../lusuarios/login.php');
    /* while item orden para boorar */

    $sqlorden = mysqli_query($rjdhfbpqj, "SELECT  e.id as iditem, e.id_orden,  e.nombre, e.modo, e.id_producto, u.col, u.id
        FROM item_presupues e 
        INNER JOIN presupuesto u 
        ON e.id_orden = u.id
        Where e.id_orden = '$idorden' and e.modo='0' and u.col!='8'");
    $cantpro = mysqli_num_rows($sqlorden);
    while ($roworden = mysqli_fetch_array($sqlorden)) {


        $iditem = $roworden["iditem"];
        $nombre = $roworden["nombre"]; //
        $idproduc = $roworden["id_producto"];

        eliminaitem($rjdhfbpqj, $iditem, $idproduc, $idorden, $cantpro);
    }
    // mysqli_close($rjdhfbpqj);

}
