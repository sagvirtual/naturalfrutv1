<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('lusuarios/login.php');
$horaentrega = date("H:i");
$preparador = $_POST['preparado'];

$preparexpl = explode("|", $preparador);
$preparado = $preparexpl[0];
$idusenv = $preparexpl[1];
$nombrenio = $preparexpl[2];


$iditemdfd = $_POST['iditem'];
$horaentrega = date("H:i");

if ($preparado != '100') {

        if ($preparado == '0') {
                $nombrenegocio = '';
                $horaentrega = '';
                $idusenv = '';
                $fechaentreg = '';
        }

        if ($preparado == '9') {


                $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM itemenvas Where id_orden = '$iditemdfd' and listo='0'");
                if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

                        $nosegui = "1";
                }
        }

        if ($nosegui != "1") {

                if ($preparado == '1' || $preparado == '0') {
                        $sqlordend = "Update ordeneva Set preparado='$preparado', usuario='$nombrenio', horaentrega='$horaentrega', fechaentreg='$fechahoy', id_usuarioclav='$idusenv' Where id = '$iditemdfd'";
                        mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
                } else {
                        $sqlordend = "Update ordeneva Set preparado='$preparado', horaentrega='$horaentrega', fechaentreg='$fechahoy' Where id = '$iditemdfd'";
                        mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
                }



                //paso seguimiento
                $sqlnum = mysqli_query($rjdhfbpqj, "SELECT * FROM ordeneva Where id='$iditemdfd' and fin = '1'");
                if ($rownum = mysqli_fetch_array($sqlnum)) {
                        $numeroordn = $rownum['numero'];



                        $sqla = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenbajar Where numero='$numeroordn' and preparado < 5 and fin = '1'");
                        if ($rowa = mysqli_fetch_array($sqla)) {

                                $nosa = "1";
                        } else {

                                $sqlb = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenevaa Where numero='$numeroordn' and preparado < 5 and fin = '1'");
                                if ($rowb = mysqli_fetch_array($sqlb)) {

                                        $nosb = "1";
                                } else {
                                        /*   if($preparado < 2){$colponer='4';}else{$colponer='5';}
                        if($numeroordn !='000'){
                        $sqlc = "Update orden Set col='$colponer'  Where id = '$numeroordn' and col!='8'";
                        mysqli_query($rjdhfbpqj, $sqlc) or die(mysqli_error($rjdhfbpqj));
                        } */

                                        if ($preparado == '9' || $preparado == '99') {
                                                $sqlc = "Update orden Set col='5'  Where id = '$numeroordn' and col!='8'";
                                                mysqli_query($rjdhfbpqj, $sqlc) or die(mysqli_error($rjdhfbpqj));
                                        }
                                }
                        }
                }

                ///fin



                echo ("<script language='JavaScript' type='text/javascript'>");
                echo ("location.href='index.php?1=1&modo'");
                echo ("</script>");
        } else {

                echo '
        
        <script>alert("Falta tachar productos!");</script>
        ';
        }
}
