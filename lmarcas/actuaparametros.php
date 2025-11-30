<?php include('../f54du60ig65.php');



$idcod = $_POST["jfndhom"];
$id = base64_decode($idcod);
$gananciaa = $_POST["gananciaa"];
$gananciab = $_POST["gananciab"];
$gananciac = $_POST["gananciac"];





if (!empty($id)) {
   
        $sqlmarcas = "Update marcas Set gananciaa='$gananciaa', gananciab='$gananciab', gananciac='$gananciac' Where id = '$id'";
        mysqli_query($rjdhfbpqj, $sqlmarcas) or die(mysqli_error($rjdhfbpqj));


        //actualizo produtos




        $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id_marcas = '$id'");
        while ($rowproductos = mysqli_fetch_array($sqlproductos)) {
            $idprod = $rowproductos['id'];
            $gananciasper = $rowproductos['gananciasper'];

            if ($gananciasper == '0') {
                $sqlprecioprodr = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idprod'  ORDER BY `precioprod`.`fecha` DESC");
                if ($rowprecioprod = mysqli_fetch_array($sqlprecioprodr)) {

                    $gananciaar = $rowprecioprod["ganancia_a"];
                    $gananciabr = $rowprecioprod["ganancia_b"];
                    $gananciacr = $rowprecioprod["ganancia_c"];
                    $tipo = $rowprecioprod["tipo"];

                    if ($gananciaar != $gananciaa ||  $gananciabr != $gananciab || $gananciacr != $gananciac) {

                        $fecha = $rowprecioprod["fecha"];
                        $idprofun = $rowprecioprod["id"];

                        $cproveedor = $rowprecioprod["cproveedor"];

                        $costorigi = $rowprecioprod["costo"];
                        $costo = $rowprecioprod["costo"];

                        //fech and diferent
                        $id_producto = $rowprecioprod["id_producto"];
                        $kilo = $rowprecioprod["kilo"];

                        //fin date
                        //estract gain

                        $kilo = $rowprecioprod["kilo"];
                        $costo_total = $costo + $cproveedor;
                        $costoxcaja = $costo_total * $kilo;

                        $costov = number_format($costo, 2, '.', '');

                        $costo_totalv = number_format($costo_total, 2, '.', '');
                        $costoxcajav = number_format($costoxcaja, 2, '.', '');

                        //precio minorista
                        if ($tipo == "0") {
                            $precio_kiloa = $costo_total + $gananciaa;
                        } else {
                            $precio_kiloa =  $costo_total / 100 * $gananciaa + $costo_total;
                        }
                        $precio_cajaar = $precio_kiloa * $kilo;

                        $precio_kiloav = number_format($precio_kiloa, 2, '.', '');
                        $precio_cajaav = number_format($precio_cajaar, 2, '.', '');

                        //precio mayorista
                        if ($tipo == "0") {
                            $precio_kilob = $costo_total + $gananciab;
                        } else {
                            $precio_kilob =  $costo_total / 100 * $gananciab + $costo_total;
                        }
                        $precio_cajabr = $precio_kilob * $kilo;

                        $precio_kilobv = number_format($precio_kilob, 2, '.', '');
                        $precio_cajabv = number_format($precio_cajabr, 2, '.', '');

                        //precio distribuidor
                        if ($tipo == "0") {
                            $precio_kiloc = $costo_total + $gananciac;
                        } else {
                            $precio_kiloc =  $costo_total / 100 * $gananciac + $costo_total;
                        }
                        $precio_cajacr = $precio_kiloc * $kilo;

                        $precio_kilocv = number_format($precio_kiloc, 2, '.', '');
                        $precio_cajacv = number_format($precio_cajacr, 2, '.', '');


                        //acapara precio producto

                        $sqlprecioprod = "Update precioprod Set costo_total='$costo_total', costoxcaja='$costoxcaja', precio_kiloa='$precio_kiloa', precio_cajaa='$precio_cajaav', precio_kilob='$precio_kilob', precio_cajab='$precio_cajabv', precio_kiloc='$precio_kiloc', precio_cajac='$precio_cajacv', ganancia_a='$gananciaa', ganancia_b='$gananciab', ganancia_c='$gananciac' Where id = '$idprofun'";
                        mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));

                        
                    }
                }
            }
        }


        //fin actualizo
    
}
