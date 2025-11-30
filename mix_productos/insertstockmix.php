<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 include('../nota_de_pedido/func_descuentastock.php');
 $idproduc=$_POST['id_producto'];
 $CantNuv=$_POST['kilosprepa'];
 $esmix=$_POST['esmix'];


 $fechasu = new DateTime();

// Sumar un año a la fecha
$fechasu->modify('+1 year');

// Formatear la fecha en el formato Y-m-d
$fecven = $fechasu->format('Y-m-d');
    //actualiza


  if (!empty($idproduc && $esmix=='1')) {

        $sqlrsqw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 where id_producto='$idproduc' and fecven ='$fecven' and id_compra='0'");
        if ($rowstok = mysqli_fetch_array($sqlrsqw)) {
            $CantStockOld = $rowstok["CantStock"];
            $idstok  = $rowstok["id"];

            if ($CantNuv > 0 && $idstok != '' && $id_usuarioclav != '' && $fecven != '0000-00-00' && $fecven != '') {
               
                    $CantStockUp = $CantStockOld + $CantNuv;
                    $sqlsudp = "Update stockhgz1 Set CantStock='$CantStockUp', fecven='$fecven', fecha='$fechahoy', hora='$horasin', id_usuario='$id_usuarioclav' Where id = '$idstok' and id_producto='$idproduc' and fecven ='$fecven'";
                    mysqli_query($rjdhfbpqj, $sqlsudp) or die(mysqli_error($rjdhfbpqj));
                   


                
           

            } else {
                echo '     <div class="alert alert-danger text-center" role="alert">
                Ingrese la cantidad de kilos para el stock!
                </div>';
            }
        } else {
            if ($CantNuv > 0 && $idproduc != '' && $idproduc != '0' && $fecven != '0000-00-00' && $fecven != '') {

                $sqlrubros = "INSERT INTO `stockhgz1` (id_producto, CantStock, fecven, fecha, hora, id_usuario) VALUES ('$idproduc','$CantNuv','$fecven', '$fechahoy', '$horasin', '$id_usuarioclav');";
                mysqli_query($rjdhfbpqj, $sqlrubros) or die(mysqli_error($rjdhfbpqj));
                
            

            } else {
                echo '     <div class="alert alert-danger text-center" role="alert">
                 Ingrese la cantidad de kilos para el stock!
                </div>';
            }
           
        }
       
      

    } 

   $sqlrsubros = "INSERT INTO `producion_env` (id_producto, CantStock, fecven, fecha, hora, id_usuario,sector) VALUES ('$idproduc','$CantNuv','$fecven', '$fechahoy', '$horasin', '$id_usuarioclav','$tipo_usuario');";
   mysqli_query($rjdhfbpqj, $sqlrsubros) or die(mysqli_error($rjdhfbpqj));
   mysqli_close($rjdhfbpqj);
   $comilla="'";
echo '
<div class="alert alert-success text-center">
    <strong> ' . $CantNuv . ' Kg. fueron agregados al Stock!!</strong>
</div>

<script>
    // Mostrar el mensaje por 3 segundos y luego refrescar
    setTimeout(function() {
        location.href='. $comilla.'../etiquetas/buscadoreti?producto=@dsdsd@'.$idproduc.''. $comilla.'
    }, 3000); // 3000 milisegundos = 3 segundos
</script>

';
?>