<?php $sdhf="localhost";
$dbdhf="softwar2_dsddksujd";
$udhf="softwar2_koidksus";
$pdhf="6*3o#5VzK6";
$rjdhfbpqj=new mysqli($sdhf,$udhf,$pdhf,$dbdhf);
$rjdhfbpqj->set_charset("utf8mb4");
$sqlstok = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where CantStock <= 0");
$canverificafin = mysqli_num_rows($sqlstok);
while ($rowstok = mysqli_fetch_array($sqlstok)) {
    $idtock=$rowstok['id'];
    
    $sqlborr=${"sqlborr".$idtock};
    $CantStock=${"CantStock".$idtock};
    $idproduc=${"idproduc".$idtock};
    
    $CantStock=$rowstok['CantStock'];
    $idproduc=$rowstok['id_producto'];
//echo ' id pro: '.$idproduc.' cant: '.$CantStock.' idstock: '.$idtock.'<br>';
$sqlborr ="delete from stockhgz1 WHERE id_producto = '$idproduc' AND CantStock = '0' and id='$idtock'";
mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
}
