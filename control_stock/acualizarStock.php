<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/func_actividad.php');
$idcod = $_POST["jfndhom"];
$id = base64_decode($idcod);
if ($tipo_usuario == "0"  || $tipo_usuario == "57" || $tipo_usuario == "33" || $tipo_usuario == "1" || $tipo_usuario == "3" || $tipo_usuario == "30") {
    $CantNuv = $_POST["CantNuv"];
    $modo = $_POST["modo"];
    $idproduc = $_POST["idproduc"];

    // $idstok = $_POST["idstok"];
    $fecven = $_POST['fecven'];

    $origen = "Modifico stock Producto:" . $CantNuv;

    FuncActividad($rjdhfbpqj, $modo, $modo, $idproduc, $origen, $id_usuarioclav);
    //actualiza
    if (!empty($idproduc)) {

        $sqlrsqw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 where id_producto='$idproduc' and fecven ='$fecven'");
        if ($rowstok = mysqli_fetch_array($sqlrsqw)) {
            $CantStockOld = $rowstok["CantStock"];
            $idstok  = $rowstok["id"];

            if ($modo != '' && $idstok != '' && $id_usuarioclav != '' && $fecven != '0000-00-00' && $fecven != '') {
                if ($modo == '0') {
                    $CantStockUp = $CantStockOld + $CantNuv;
                    $sqlsudp = "Update stockhgz1 Set CantStock='$CantStockUp', fecven='$fecven', fecha='$fechahoy', hora='$horasin', id_usuario='$id_usuarioclav' Where id = '$idstok' and id_producto='$idproduc' and fecven ='$fecven'";
                    mysqli_query($rjdhfbpqj, $sqlsudp) or die(mysqli_error($rjdhfbpqj));
                    mysqli_close($rjdhfbpqj);
                } elseif ($modo == '1') {
                    if ($CantNuv < $CantStockOld) {
                        $CantStockUp = $CantStockOld - $CantNuv;

                        $sqlsup = "Update stockhgz1 Set CantStock='$CantStockUp', fecven='$fecven', fecha='$fechahoy', hora='$horasin', id_usuario='$id_usuarioclav' Where id = '$idstok' and id_producto='$idproduc' and fecven ='$fecven'";
                        mysqli_query($rjdhfbpqj, $sqlsup) or die(mysqli_error($rjdhfbpqj));
                        mysqli_close($rjdhfbpqj);
                    } else {
                        /* si es 0 o menor a 0 */

                        $sqdup = "Update stockhgz1 Set fecha='$fechahoy', hora='$horasin', id_usuario='$id_usuarioclav', id_producto=5.'$idproduc' Where id = '$idstok' and id_producto='$idproduc' and fecven ='$fecven'";
                        mysqli_query($rjdhfbpqj, $sqdup) or die(mysqli_error($rjdhfbpqj));
                        mysqli_close($rjdhfbpqj);
                    }
                }



                echo '     <div class="alert alert-success" role="alert">
                Guardando...
                </div>';

                echo '
                <script>
            
                location.reload();
                </script>
                
                ';
            } else {
                echo '     <div class="alert alert-danger" role="alert">
                Ingrese un Valor
                </div>';
            }
        } else {
            if ($CantNuv > 0 && $modo != '' && $idproduc != '' && $idproduc != '0' && $fecven != '0000-00-00' && $fecven != '') {

                $sqlrubros = "INSERT INTO `stockhgz1` (id_producto, CantStock, fecven, fecha, hora, id_usuario) VALUES ('$idproduc','$CantNuv','$fecven', '$fechahoy', '$horasin', '$id_usuarioclav');";
                mysqli_query($rjdhfbpqj, $sqlrubros) or die(mysqli_error($rjdhfbpqj));
                mysqli_close($rjdhfbpqj);

                echo '
                <script>
                      location.reload();
                </script>                
                ';
            } else {
                echo '     <div class="alert alert-danger" role="alert">
                Ingrese un Valor
                </div>';
            }
            echo '
            <script>
        
            location.reload();
            </script>
            
            ';
        }
    } else {
        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../control_de_stock?rang=2''");
        echo ("</script>");
    }
} else {
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("top.location.href='../control_de_stock?error=2321'");
    echo ("</script>");
}
