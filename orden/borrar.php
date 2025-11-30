<?php session_start();
$sdhf="localhost";
$dbdhf="softwar2_dsddksujd";
$udhf="softwar2_koidksus";
$pdhf="6*3o#5VzK6";

$rjdhfbpqj=new mysqli($sdhf,$udhf,$pdhf,$dbdhf);


//esto es lo que calcula el paginado
sleep(1);
$CantidadMostrar=50;
$buscar=$_SESSION['buscar'];
//Conexion  al servidor mysql

                    // Validado  la variable GET
    $compag = (int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
	$TotalReg =$rjdhfbpqj->query("SELECT productos.id_marcas, productos.id as idproducto, productos.codigo, productos.modo_producto, productos.nombre, productos.gananciasper, productos.categoria, productos.id_proveedor,productos.detalle, productos.estado, productos.unidadnom, marcas.empresa FROM productos INNER JOIN marcas 
    ON productos.id_marcas = marcas.id 
    Where  productos.nombre LIKE '%$buscar%' OR marcas.empresa LIKE '%$buscar%' OR productos.codigo LIKE '%$buscar%' OR productos.categoria LIKE '%$buscar%'");
	//Se divide la cantidad de registro de la BD con la cantidad a mostrar 
	$TotalRegistro =ceil($TotalReg->num_rows/$CantidadMostrar);
	
	 //Operacion matematica para mostrar los siquientes datos.
	$IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):0;

//fin esto es lo que calcula el paginado



	//Consulta SQL
	$consultavistas =mysqli_query($rjdhfbpqj, "SELECT productos.id_marcas, productos.id as idproducto, productos.codigo, productos.modo_producto, productos.nombre, productos.gananciasper, productos.categoria, productos.id_proveedor,productos.detalle, productos.estado, productos.unidadnom, marcas.empresa FROM productos INNER JOIN marcas 
    ON productos.id_marcas = marcas.id 
    Where  productos.nombre LIKE '%$buscar%' OR marcas.empresa LIKE '%$buscar%' OR productos.codigo LIKE '%$buscar%' OR productos.categoria LIKE '%$buscar%' 
				ORDER BY
				productos.id ASC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar);

    while ($rowproductos = mysqli_fetch_array($consultavistas)) {

    echo 'aca:'.$rowproductos['nombre'].' <br>';}






	//Validmos el incrementador par que no genere error
	//de consulta.  
    if($IncrimentNum<=0){}else {
	echo "<a href=\"borrar.php?pag=".$IncrimentNum."\">Seguiente</a>";
	}
	

?>
<table ><tr><td colspan="1" ></td></tr></table>&nbsp;