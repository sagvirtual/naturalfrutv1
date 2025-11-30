<?php include('../f54du60ig65.php');
$usuario = "Sistema";
$producto = $_POST['producto'];
$unidad = $_POST['unidad'];
$cantidad = $_POST['cantidad'];
$numero = $_POST['numero'];
$id_producto = $_POST['id_producto'];

$id_ordennum = $_POST['id_ordennum'];

$sqlprodcom = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_producto'");
if ($rowprdodtos = mysqli_fetch_array($sqlprodcom)) {
    $canxbule = $rowprdodtos["kilo"];
    $presentacion = $rowprdodtos["kilo"];


    if ($unidad != "Kg." && $unidad != "Unid.") {

        $cantidadvulto = $cantidad * $canxbule;
    } else {
        $cantidadvulto = $cantidad;
    }

    if ($cantidadvulto < 15) {
        $canxbule = 20;
    }

    if ($cantidadvulto >= $canxbule && $cantidadvulto > 19) {

        $ubicacion = '1';
    } else {
        $ubicacion = $_POST['ubicacion'];
    }

    if ($ubicacion == '2') {

        //obligo productos
        if ($id_producto == '852' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } // harina Repelada de Almendra - Sin Piel - Chile
        if ($id_producto == '863' && $cantidadvulto >= 15) {
            $ubicacion = '1';
        } //Hongos bolletus
        if ($id_producto == '535' && $cantidadvulto >= 5) {
            $ubicacion = '1';
        } //Dátiles medjoul
        if ($id_producto == '947' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Lentejas de Chocolate
        if ($id_producto == '299' && $cantidadvulto >= 5) {
            $ubicacion = '1';
        } //Bolitas de Chocolate x 2k
        if ($id_producto == '822' && $cantidadvulto >= 25) {
            $ubicacion = '1';
        } //Harina de Coco (Sin marca) - Bolsa x 25 Kg. 
        if ($id_producto == '2018' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Almendra Pelada Guara MEDIANA Nro.4  
        if ($id_producto == '1765' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Almendra Pelada Guara CHICA N° 2 (Sin marca) - Caja x 10 Kg. 
        if ($id_producto == '133' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Almendra Almendra Pelada Guara GRANDE N° 6     
        if ($id_producto == '374' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Castaña de Cajú Natural W3 - Origen Brasil (Sin marca) - Caja x 22.68 Kg. 
        if ($id_producto == '217' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Avellanas Peladas Mediana 9-11 - Origen Turquía (Sin marca) - Caja x 10 Kg. 
        if ($id_producto == '535' && $cantidadvulto >= 5) {
            $ubicacion = '1';
        } //Dátiles Medjoul Con Carozo - Origen Israel (Fruta desecada) - Caja x 5 Kg. 
        if ($id_producto == '445' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Coco en Escamas (Sin marca) - Caja x 10 Kg. 
        if ($id_producto == '174' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Coco en Escamas (Sin marca) - Caja x 10 Kg. 
        if ($id_producto == '440' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Clavo de Olor en Grano (Especias y condimentos) - Bolsa x 1 Kg. 
        if ($id_producto == '340' && $cantidadvulto >= 25) {
            $ubicacion = '1';
        } //Canela en Rama H2 (Sin marca) - Bolsa x 25 Kg. 
        if ($id_producto == '1505' && $cantidadvulto >= 50) {
            $ubicacion = '1';
        } //Sen en Hojas (Herboristeria) - Bolsa x 50 Kg. 
        if ($id_producto == '956' && $cantidadvulto >= 8) {
            $ubicacion = '1';
        } //Levadura en Polvo x 25 sobres (Levex) - Caja x 8 Uni. 
        if ($id_producto == '522' && $cantidadvulto >= 25) {
            $ubicacion = '1';
        } //Cúrcuma Molida - Esencia (Especias y condimentos) - Bolsa x 25 Kg.  
        if ($id_producto == '1154' && $cantidadvulto >= 20) {
            $ubicacion = '1';
        } //Moringa - Bolsa x 1 Kg. 
        if ($id_producto == '173' && $cantidadvulto >= 25) {
            $ubicacion = '1';
        } //Anís en Grano (Sin marca) - Bolsa x 25 Kg. 
        if ($id_producto == '816' && $cantidadvulto >= 20) {
            $ubicacion = '1';
        } //Harina de Arveja - Bolsa x 20 Kg. 
        if ($id_producto == '820' && $cantidadvulto >= 25) {
            $ubicacion = '1';
        } //Harina de Centeno (Sin marca) - Bolsa x 25 Kg. 
        if ($id_producto == '811' && $cantidadvulto >= 25) {
            $ubicacion = '1';
        } //Harina de Arroz Integral (Sin marca) - Bolsa x 25 Kg. 
        if ($id_producto == '809' && $cantidadvulto >= 25) {
            $ubicacion = '1';
        } //Harina de Arroz Blanca (Sin marca) - Bolsa x 25 Kg.  
        if ($id_producto == '271' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //GBayas de Goji  (Semillas) Caja x 10 Kg.
        if ($id_producto == '215' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Avellanas Peladas 13-15 
        if ($id_producto == '671' && $cantidadvulto >= 20) {
            $ubicacion = '1';
        } //Flores Hibiscus 
        if ($id_producto == '806' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Harina de Almendra Con Piel 100% Pura - Mendoza 
        if ($id_producto == '1189' && $cantidadvulto >= 20) {
            $ubicacion = '1';
        } //nuez Con Cáscara Chandler 2024 Calibre 36 +   
        if ($id_producto == '1993' && $cantidadvulto >= 21) {
            $ubicacion = '1';
        } //Almendra Pelada Carmel MEDIANA 27/30 EE.U
        if ($id_producto == '1654' && $cantidadvulto >= 3) {
            $ubicacion = '1';
        } //Tomate Deshidratado 1° A     

        if ($id_producto == '141' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Tomate Deshidratado 1° A       

        if ($id_producto == '403' && $cantidadvulto >= 6) {
            $ubicacion = '1';
        } //Chips de Banana Deshidroazucaradas

        if ($id_producto == '577' && $cantidadvulto >= 5) {
            $ubicacion = '1';
        } //Empaque Mixto Con Carozo

        if ($id_producto == '1908' && $cantidadvulto >= 5) {
            $ubicacion = '1';
        } //Empaque Mixto Con Carozo

        if ($id_producto == '1919' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Almendra Pelada Non Pareil EXTRA GRANDE 20/22 Chile      
        if ($id_producto == '923') {
            $ubicacion = '1';
        } //leche de almendra
        if ($id_producto == '924') {
            $ubicacion = '1';
        } //leche de almendra Amande

        if ($id_producto == '299' && $cantidadvulto >= 5) {
            $ubicacion = '1';
        }
        if ($id_producto == '1993' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Almendras Peladas CARMEL Chica 30-32 - CHILE
        if ($id_producto == '143' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Almendras Peladas CARMEL Grande 23/25 - CHILE        
        if ($id_producto == '145' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Almendras Peladas CARMEL Mediana 27/30 - CHILE
        if ($id_producto == '140' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Almendra Pelada Non Pareil GRANDE 25/27 - Chile
        if ($id_producto == '141' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Almendra Pelada Non Pareil SUPER GRANDE 23/25 - Chile
        if ($id_producto == '532' && $cantidadvulto > 1) {
            $ubicacion = '1';
        } //dactile argelia con carozo
        if ($id_producto == '533' && $cantidadvulto > 1) {
            $ubicacion = '1';
        } //dactile argelia sin carozo
        if ($id_producto == '138' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        }
    }
    if ($ubicacion == '0') {
        if ($id_producto == '1775' && $cantidadvulto >= 3) {
            $ubicacion = '1';
        } //redondelas bananita
        if ($id_producto == '1896' && $cantidadvulto >= 3) {
            $ubicacion = '1';
        } //redondelas frutilla
        if ($id_producto == '1776' && $cantidadvulto >= 3) {
            $ubicacion = '1';
        } //redondelas bmarro
        if ($id_producto == '1496' && $cantidadvulto >= 25) {
            $ubicacion = '1';
        } //redondelas bmarro
        if ($id_producto == '1496' && $cantidadvulto <= 5) {
            $ubicacion = '0';
        } //redondelas bmarro

        if ($id_producto == '1138') {
            $ubicacion = '0';
        } //Mix de Frutas Secas Con mani (Nuez - Almendras - Castañas - Pasas Negras y Rubias - Maní)  	
        if ($id_producto == '1139') {
            $ubicacion = '0';
        } //Mix de Frutas Secas Especial (Nuez, Almendras, Castañas, Avell)  	
        if ($id_producto == '1140') {
            $ubicacion = '0';
        } //Mix de Frutas Secas La Amistad (Sin marca)  	
        if ($id_producto == '1142') {
            $ubicacion = '0';
        } //Mix de Frutas Secas Sin Mani (Nuez-Almendras-Castañas-Pasas Rubias y Negras)  	
        if ($id_producto == '1143') {
            $ubicacion = '0';
        } //Mix de Frutas Secas Sin Pasas de Uva  	
        if ($id_producto == '1144') {
            $ubicacion = '0';
        } //Mix de Frutas Tropicales  	 	
        if ($id_producto == '1135') {
            $ubicacion = '0';
        } //Mix de 4 Semillas Clásico (Semillas)  	 	
        if ($id_producto == '1136') {
            $ubicacion = '0';
        } //MMix de 8 Semillas Premium (Semillas)  
        //Almendras Peladas CARMEL Mediana 27/30 - CHILE
        if ($id_producto == '138' && $cantidadvulto >= 10) {
            $ubicacion = '1';
        } //Almendra Pelada Non Pareil chica 30/32 - Chile	 	 	


    }

    switch ($ubicacion) {
        case "0":
            $OrdenUbic = "ordenevaa";
            $ItemnUbic = "itemenvasa";
            break;
        case "1":
            $OrdenUbic = "ordenbajar";
            $ItemnUbic = "itembajar";
            break;
        case "2":
            $OrdenUbic = "ordeneva";
            $ItemnUbic = "itemenvas";
            break;
        case "9":
            $OrdenUbic = "ordenbajar";
            $ItemnUbic = "itembajar";
            break;
        case "3":
            $OrdenUbic = "1";
            $ItemnUbic = "1";
            break;
    }

    // echo ''.$OrdenUbic.'';
    if ($OrdenUbic != '1') {
        $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM $OrdenUbic Where numero = '$numero' and fin='0'");
        if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

            $id_orden = $rowordenx['id'];
        } else {

            $timean = date("His");
            $fechaan = date("d-m-Y");
            $anclaje = $timean . $fechaan;
            $horas = date("H:i");

            $sqlordenr = "INSERT INTO `$OrdenUbic` (fecha, numero, usuario, anclaje, hora, manu) VALUES ('$fechahoy', '$numero', '$usuario', '$anclaje','$horas','1');";
            mysqli_query($rjdhfbpqj, $sqlordenr) or die(mysqli_error($rjdhfbpqj));

            $sqlordenty = mysqli_query($rjdhfbpqj, "SELECT * FROM $OrdenUbic Where anclaje = '$anclaje' and fin='0'");
            if ($roworden = mysqli_fetch_array($sqlordenty)) {


                $id_orden = $roworden['id'];
            }
        }
        $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM $ItemnUbic Where  numero='$numero' and id_producto='$id_producto'");
        if ($rordenx = mysqli_fetch_array($sqlordenr)) {
        } else {
            if (!empty($producto) && !empty($cantidad) && !empty($id_orden)) {
                $sqlorden = "INSERT INTO `$ItemnUbic` (producto, unidad, cantidad, fecha, id_orden,id_producto,numero) VALUES ('$producto', '$unidad', '$cantidad', '$fechahoy', '$id_orden','$id_producto','$id_ordennum');";
                mysqli_query($rjdhfbpqj, $sqlorden) or die(mysqli_error($rjdhfbpqj));

                $sqloend = "Update item_orden Set picking='3',pickinfin='$hora' Where id_orden='$numero' and id_producto='$id_producto'";
                mysqli_query($rjdhfbpqj, $sqloend) or die(mysqli_error($rjdhfbpqj));
            }
        }
    } else {
        //si se pone deposito abajo simplemente lo marca para saltar

        $sqlorden = "INSERT INTO `itembajar` (producto, unidad, cantidad, fecha, id_orden,id_producto,numero,sinstock,listo,id_usuarioclav) VALUES ('$producto', '$unidad', '$cantidad', '$fechahoy', '$id_orden','$id_producto','$id_ordennum','1','1','$id_usuarioclav');";
        mysqli_query($rjdhfbpqj, $sqlorden) or die(mysqli_error($rjdhfbpqj));
        $sqloend = "Update item_orden Set picking='3' Where id_orden='$numero' and id_producto='$id_producto'";
        mysqli_query($rjdhfbpqj, $sqloend) or die(mysqli_error($rjdhfbpqj));
    }
}
//echo ''.$numero.' pro: '.$id_producto.'';
echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='index.php?pan=1'");
echo ("</script>");
