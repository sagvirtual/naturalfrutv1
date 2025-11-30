<?php include ('../f54du60ig65.php');



	
	
	/* debe y haber */
function debehaber($rjdhfbpqj,$id_cliente) {
	
$tablacod = base64_encode($tabla);
$columnacod =base64_encode($columna);
$id_contenedorcod = base64_encode($id_contenedor);
$idclientesen = base64_encode($id_cliente);

		
$sqlpagosm=mysqli_query($rjdhfbpqj,"SELECT * FROM item_orden Where id_cliente = '$id_cliente' ORDER BY fecha desc");
if ($rowm = mysqli_fetch_array($sqlpagosm))		
		
		{$fechaman=$rowm["fecha"];}		

		
		
$linkestado='&kmlmksnchdsa='.$tablacod.'&lejfhdns='.$columnacod.'&ueemxhpqgd='.$id_contenedorcod.'&kjkdssdd='.$idclientesen.'';

	
$sqlpagos=mysqli_query($rjdhfbpqj,"SELECT * FROM item_orden Where id_cliente = '$id_cliente' ORDER BY fecha asc");
$num_total_registros3 = mysqli_num_rows($sqlpagos);
while ($row = mysqli_fetch_array($sqlpagos))
{ 
$fechamin=$row["fecha"];
	
$ids=$row["id"]; 
$pag+=$row["debe"];
$pags+=$row["importe"];
$english_format_number = $pag-$pags;
$total_oficial = number_format($english_format_number, 2, '.', '');
/* $sql ="Update pagos Set  totalgral='$total_oficial' Where id_cliente='$id_cliente' and id= '$ids' ";
mysql_query($sql, $con) or die(mysql_error());  */

  
   echo' <style>

.Recuadro_mod {
	BACKGROUND-COLOR: #f4faff;
	border-top: 1px none #CCCCCC;
	border-right: 1px none #CCCCCC;
	border-bottom: 1px none #CCCCCC;
	border-left: 1px none #CCCCCC;
	padding: 0px;









}

.cuadrobase {
	border: 0.5pt solid #000000;
	height: 0.6cm;

}
.lineaderecha {
	border-right-width: 0.5pt;
	border-right-style: none;
	border-right-color: #99CCCC;

}
.cuadroduplica {
	border-right-width: 0.1pt;
	border-bottom-width: 0.1pt;
	border-left-width: 0.1pt;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: none;
	border-left-style: solid;
	border-right-color: #000000;
	border-bottom-color: #000000;
	border-left-color: #000000;
	height: 0.6cm;
	border-top-width: 0.1pt;
	border-top-color: #000000;



}
.cuadroduplicafino {

	border-right-width: 0.1pt;
	border-bottom-width: 0.1pt;
	border-left-width: 0.1pt;
	border-top-style: none;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-right-color: #000000;
	border-bottom-color: #000000;
	border-left-color: #000000;
	height: 0.5cm;
	border-top-width: 0px;
}
.doscostado {
	border-left-width: 0.1pt;
	border-top-style: none;
	border-right-style: solid;
	border-bottom-style: none;
	border-left-style: solid;
	border-bottom-color: #000000;
	border-left-color: #000000;
	border-right-width: 0.1pt;
	border-right-color: #000000;
}
.cuadroduplica2 {
	border-right-width: 0.1pt;
	border-bottom-width: 0.1pt;
	border-left-width: 0.1pt;
	border-top-style: none;
	border-right-style: solid;
	border-bottom-style: none;
	border-left-style: solid;
	border-right-color: #000000;
	border-bottom-color: #000000;
	border-left-color: #000000;
	height: 0.4cm;
	border-top-width: 0px;
	background-color: #FF0000;




}
.cuadromenu {
	border: 1.5pt solid #999999;

	background-color: #E8E8E8;
	text-transform: none;
	background-position: center top;
	text-align: left;
	width: 600px;
	height: 25px;
	top: 20px;










}
.seleccio {
	width: 550px;
}

.imputdatos {
	border: none #003333;
	background-color: #FFFFFF;

	color: #000000;
}

.imputdatos2 {
	border: none #003333;
	background-color: #F3F3F3;

	color: #000000;
}
.imputdatos3 {
	border: none #003333;
	background-color: #F3F3F3;
	background-position: center;

}
.carga_item{
	text-align: left;
	padding-left: 5px;
	border-top: 1px none #000000;
	border-right: 1px none #000000;
	border-bottom: 1px solid #000000;
	border-left: 1px solid #000000;
	
	background-color: #FFFFFF;

}
.carga_itemm{
	text-align: left;
	padding-left: 5px;
	border-top: 1px none #000000;
	border-right: 1px solid #000000;
	border-bottom: 1px solid #000000;
	border-left: 1px solid #000000;
	background-color: white;
	
}
.centro{
	border-right: 1px solid #000000;
	
}
.centro2{
	border-left: 1px solid #000000;
	
}
.carga_item td{

	padding-left: 2px;
	border-right:1px #000000;
	border-left:1px #000000;
	border-top:0px;
	border-bottom:0px;

	
}
.item {
	border-top-style: solid;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: #999999;
	border-right-color: #999999;
	border-bottom-color: #999999;
	border-left-color: #999999;
	height: 20px;
	width: 117px;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
}
.ingleavelblanco {
	border: none #003333;
	background-color: #FFFFFF;

	color: #333333;
	text-align: center;
}

.ingleavelgris {
	border: none #003333;
	background-color: #F3F3F3;
	
	color: #333333;
	text-align: center;
}
.leabelcenter {
	background-color: transparent;
	border: 1px solid #999999;

	color: #333333;
	text-align: center;
}
.total {
	border: none #003333;
	background-color: #FFFFFF;

	color: #000000;

	text-align: right;
}
.ren {
	height: 0.628cm;
	bottom: 20px;

}
</style>	<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#ffffff" >
        <tr> 
                  
          <td  class="carga_item" style="border-right: 1px solid #000000; border-top: 1px solid #000000;"> 
</td>                </tr>
              </table>
           
<div align="center">      

      <table width="100%" height="20" border="0" cellpadding="0" cellspacing="0">
  <tr>
         
                           
          <td width="10px" class="carga_item" ><strong>Id</strong></td>
          <td width="70" class="carga_item" ><strong>Fecha</strong></td>
						  
          
      <td width="500" class="carga_item" ><strong>Detalle</strong></td>
          <td width="60" class="carga_item"><strong>Debe</strong></td>
						  
          <td width="60" class="carga_item"><strong>Haber</strong></td>
						  
          <td width="40" class="carga_item" style="border-right: 1px solid #000000;"><strong>Total</strong></td>
          <td width="40" class="carga_item" style="border-right: 1px solid #000000;"><strong>Acción</strong></td>
		  
                          
        
                        </tr>  ';
 
$TAMANO_PAGINA = 60;
	

	
$sqlpagoss=mysqli_query($rjdhfbpqj,"SELECT * FROM item_orden Where id_cliente = '$id_cliente' and modo='1'  ORDER BY fecha asc");
//$num_total_registros3 = mysqli_num_rows($sqlpagoss);
if ($row = mysqli_fetch_array($sqlpagoss)){

$total_paginas2 = ceil($num_total_registros3 / $TAMANO_PAGINA);

if ($pagina=="")
{$pagina=$total_paginas2;}


if (!$pagina) {

		$inicio = 0;

		$pagina=$total_paginas2;

}

else {

	$inicio = ($pagina - 1) * $TAMANO_PAGINA;

}
$sqlpagoss=mysqli_query($rjdhfbpqj,"SELECT * FROM item_orden Where id_cliente = '$id_cliente'  ORDER BY fecha asc");
if ($row = mysqli_fetch_array($sqlpagoss))

$num_total_registros = mysqli_num_rows($sqlpagoss);

//calculo el total de páginas

$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

/* join */

// Verificar la conexión
if (!$rjdhfbpqj) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Definir la consulta SQL
$sql = "SELECT e.total, e.saldo, e.id, u.id_orden, u.tipopag, u.valor, u.modo, u.id_cliente, e.fin, e.fecha as fechadeuda, u.fecha as fechapago
        FROM orden e 
        INNER JOIN item_orden u 
        ON e.id_cliente = u.id_cliente 
		Where u.id_cliente = '$id_cliente' and e.fin='1' and u.modo='1'";

$query = mysqli_query($rjdhfbpqj, $sql);
while ($rowjons = mysqli_fetch_array($query)) {

	$cant=$cant+1;
	$fechaok=${"fechaok".$cant};
	$importehabervv=${"importehabervv".$cant};



	/* deuda */
 	$deudatot = $rowjons['total'];
	$idordde = $rowjons['id'];

	
	 
	/* fin deuda */

	/* pagos */
	$tipopages = $rowjons['tipopag'];
	$id_ordend = $rowjons['id_orden'];

	if($id_ordend!='0'){$idpago="a la Venta Nº ".$id_ordend;}else{$idpago="";}
	if ($tipopages == '1') {
		$tipopagver = "Efectivo ";
	}
	if ($tipopages == '2') {
		$tipopagver = "Transferencia ";
	}
	if ($tipopages == '3') {
		$tipopagver = "Deposito ";
	}
	if ($tipopages == '4') {
		$tipopagver = "Cheque ";
	}
	if ($tipopages == '5') {
		$tipopagver = "Mercado pago ";
	}

	


	/* fin pagos */
/* haber */
	if($rowjons["modo"]=="1"){
		$importehaberv= $rowjons["valor"];
		$importedebev=""; 
		$detallep="Pago en ".$tipopagver.$idpago; 
		$fechaok=$rowjons["fechapago"];
	}
		/* aca debe */
		else{
			$importedebev=$deudatot; 
			$importehaberv= "";
			$detallep="Compra Venta Nº ".$idordde;
			$fechaok=$rowjons["fechadeuda"];
		
		}
		$totalavps=$rowjons["saldo"]-$importehaberv;
		

 
	echo '<tr>
                           <td  class="carga_item" >'.$cant.'</td>
                           <td width="70" class="carga_item" >'.date('d/m/Y', strtotime($fechaok)).'</td>
						  <td width="500" class="carga_item" >'.$detallep.' '.$idordde.'</td>
                          <td width="60" class="carga_item">'.$importedebev.'&nbsp;</td>
						  <td width="60" class="carga_item">'.$importehaberv.'&nbsp;</td>
						  <td width="60" class="carga_item" >'.$totalavps.' </td>
						  <td  class="carga_item" style="border-right: 1px solid #000000;">
	
	
	
					<a href="../cuenta?jfdfhk='.$idclientesen.'&pjfdfhk='.$idpafcod.'">
					<img src="editar.gif" alt="Editar Valor" width="13" height="13" border="0"></a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:eliminar('."'../estadoscli/br51688.php?".'jdnbsd='.$idpafcod.''.$linkestado.' '."'".') ">
					<img src="borrar.gif" width="13" height="13" border="0"></a>
	
	
	
	</td>
						  </tr>'; $num_fila++;
	
	//le pongo el totaldebehaber por linea
		
/* 	$sqlpagosup = "Update pagos Set  totaldebehab='$totala' Where id = '$idpaf'";
mysqli_query($rjdhfbpqj, $sqlpagosup) or die(mysqli_error($rjdhfbpqj)); */
	
	
	
	}
	
	
	//fin while
	
	$total_ofi = number_format($totala, 2, '.', '');
	$total_ofiv = number_format($totala, 2, ',', '.');
	
               echo'   </table>
                   
        
  <table width="100%" height="0" border="1" cellpadding="0" cellspacing="0" class="carga_item">
    <tr> 
     
      <td width="116" style="border-right: 1px solid #000000;" > <div align="right"><h2><br>
         TOTAL&nbsp;&nbsp;$ '.$total_ofiv.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></p></td>';
	
	
	
/* 	$sqlpagosd = "Update clientes Set  deuda='$total_ofi' Where id = '$id_cliente'";
mysqli_query($rjdhfbpqj, $sqlpagosd) or die(mysqli_error($rjdhfbpqj)); */
	
/* 	
         if ("$fac" == "N"){
$sql ="Update usuarios Set facturado='$total_oficial' Where id='$id_cliente'";}
else {
$sql ="Update usuarios Set facturado_b='$total_oficial' Where id='$id_cliente'";}

mysql_query($sql, $con) or die(mysql_error()); */
	}	
	
	/* paginacion */
	if ($total_paginas > 1){

	for ($i=1;$i<=$total_paginas;$i++){

		if ($pagina == $i)

			//si muestro el índice de la página actual, no coloco enlace

			echo $pagina . " ";

		else

			//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página

			echo "<a href='debhab.php?pagina=" . $i . "&buscando=" . $buscando . "'>" . $i . "</a> ";

	}

}

   echo'  </tr>
        </table></div><br>
		
		
	<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#ffffff" >
        <tr> 
                  
          <td  class="carga_item" style="border-right: 1px solid #000000; border-top: 1px solid #000000;"> 
            <div align="center"><br>
		
	
	
	<form name="debehaber"  id="debehaber" action="../salidas/ver_debe_haber" method="post" enctype="multipart/form-data" target="_blank">
	


<input name="idclientes" type="hidden" id="idclientes" value="'.$idclientesen.'">
	<input name="id_contenedor" type="hidden" id="id_contenedor" value="'.$id_contenedorcod.'">
	<input name="tabla" type="hidden" id="tabla" value="'.$tablacod.'">
	<input name="columna" type="hidden" id="columna" value="'.$columnacod.'">  
	  
	<input name="desde" type="hidden" id="desde" value="'.$fechamin.'">
	<input name="hasta" type="hidden" id="hasta" value="'.$fechaman.'">




<input  type="submit" value="DESCARGAR ESTADO DE CUENTA EN PDF"  style="font-size: 12pt"></form><br><br>
		
		
		
		</div></td>                </tr>
              </table>	
		
		
		
		';
		
		
			
		return $debehaber;
	}	
	

	
}
