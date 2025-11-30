<?php include ('../f54du60ig65.php');
#classe perfil



class estados {

	
	
	/* debe y haber */
	public static function debehaber($id_cliente) {
		$rjdhfbpqj = $GLOBALS['rjdhfbpqj'];



			$sqlpagosm=mysqli_query($rjdhfbpqj,"SELECT * FROM pagdeu Where id_cliente = '$id_cliente'  ORDER BY fecha desc");
			if ($rowm = mysqli_fetch_array($sqlpagosm))		
					
					{$fechaman=$rowm["fecha"];
					
						echo 'hola mundo '.$id_cliente.'';
					}		

		
		
					

  
   echo' <br><br><table width="90%" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#ffffff" >
        <tr> 
                  
          <td  class="carga_item" style="border-right: 1px solid #000000; border-top: 1px solid #000000;"> 
            <div align="center"><br>
<h1 style="font-size: 22pt">Estado 
        de Cuenta</h1></div><div align="center" >
		
	<br>
	
	<form name="debehaber"  id="debehaber" action="../salidas/ver_debe_haber" method="post" enctype="multipart/form-data" target="_blank">
	
<strong>FILTRAR</strong>&nbsp; DESDE&nbsp; <input type="date" name="desde" value="'.$fechamin.'"   min="'.$fechamin.'" max="'.$fechaman.'" style="font-size: 12pt">&nbsp; HASTA	&nbsp;<input type="date" name="hasta" value="'.$fechaman.'" min="'.$fechamin.'" max="'.$fechaman.'" style="font-size: 12pt"> &nbsp;&nbsp;

<input name="idclientes" type="hidden" id="idclientes" value="'.$idclientesen.'">




<input  type="submit" value="IMPRIMIR"  style="font-size: 12pt"><br><br>
		
		
		
		</div></td>                </tr>
              </table>
           
<div align="center">      

      <table width="90%" height="20" border="0" cellpadding="0" cellspacing="0">
  <tr>
          <td width="70" class="carga_item"><strong>Id</strong></td>
                           
          <td width="70" class="carga_item" ><strong>Fecha</strong></td>
						  
          
      <td width="500" class="carga_item" ><strong>Detalle</strong></td>
          <td width="60" class="carga_item"><strong>Debe</strong></td>
						  
          <td width="60" class="carga_item"><strong>Haber</strong></td>
						  
          <td width="40" class="carga_item" style="border-right: 1px solid #000000;"><strong>Total</strong></td>
		  
                          
        
                        </tr>  ';
 
$TAMANO_PAGINA = 60;
	

	
$sqlpagoss=mysqli_query($rjdhfbpqj,"SELECT * FROM pagdeu Where id_cliente = '$id_cliente'  ORDER BY fecha asc");
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
$sqlpagoss=mysqli_query($rjdhfbpqj,"SELECT * FROM pagdeu Where id_cliente = '$id_cliente'  ORDER BY fecha asc");
if ($row = mysqli_fetch_array($sqlpagoss))

$num_total_registros = mysqli_num_rows($sqlpagoss);

//calculo el total de páginas

$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

//construyo la sentencia SQL
	
$sqld=mysqli_query($rjdhfbpqj,"SELECT * FROM pagdeu Where id_cliente = '$id_cliente'  limit '$inicio','$TAMANO_PAGINA'; ORDER BY fecha asc "); //limit '$inicio','$TAMANO_PAGINA';
$num_fila = 0;
while ($row = mysqli_fetch_array($sqld))	
	{ 
				$idpaf=$row["id"];	
				$idpafcod=base64_encode($idpaf);
					
		
		
				
				$numefilar=$num_fila+1;
				$debe=$row["debe"];
				$haber=$row["valor"];

				if($debe!=""){$debe = number_format($debe , 0, '.', '').'.00';}	else{$debe = "";}
				if($haber!=""){$haber = number_format($haber , 0, '.', '').'.00';}	else{$haber = "";}	
		
				$paga+=number_format($row["debe"], 0, '.', '');
				$pagsa+=number_format($row["valor"], 0, '.', '');
				$totala = $paga-$pagsa;	

				$totala = number_format($totala , 0, '.', '').'.00';	
						
				if ($num_fila%2==0) 
					{$color= "#FFFFFF";} 
					else 
					{ $color= "#F3F3F3";}

					$pag=$row["debe"];
				
					echo '<tr><td width="70" class="carga_item">'.$numefilar.' &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
					
					//si es liquidacion no permito modificar
					echo'
									<a href="../cuenta?jfdfhk=&pjfdfhk='.$idpafcod.'">
									<img src="../assets/images/editar.gif" alt="Editar Valor" width="13" height="13" border="0"></a>&nbsp;&nbsp;&nbsp;
									<a href="javascript:eliminar('."'../estadoscli/br51688.php?".'jdnbsd='.$idpafcod.' '."'".') ">
									<img src="../assets/images/borrar.gif" width="13" height="13" border="0"></a>
					</td>
										<td width="70" class="carga_item" >'.$row["fecha"].'</td>
										<td width="500" class="carga_item" >Pago remito #'.$row["id_orden"].'</td>
										<td width="60" class="carga_item">'.$debe.'&nbsp;</td>
										<td width="60" class="carga_item">'.$haber.'&nbsp;</td>
										<td width="60" class="carga_item" style="border-right: 1px solid #000000;"></td>
										</tr>'; $num_fila++;
					
					
					
					}
					
					
					//fin while
	
	$total_ofi = number_format($totala, 2, '.', '');
	
               echo'   </table>
                   
        
  <table width="90%" height="0" border="1" cellpadding="0" cellspacing="0" class="carga_item">
    <tr> 
     
      <td width="116" style="border-right: 1px solid #000000;" > <div align="right"><h2><br>
         TOTAL&nbsp;&nbsp;'.$total_ofi.'$&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></td>';
	

	}	
	
	
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
        </table></div><br>';
		
		
			
		return $debehaber;
	}	
	
}
