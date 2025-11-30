<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');


if($tipo_usuario=="0" || $tipo_usuario=="33" ||$tipo_usuario=="3" || $tipo_usuario=="1"|| $tipo_usuario=="30"){ 


 
 include('clasehome.php');
 
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Seguimiento</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  
  

</head>


<html lang="es">
<head>
<style>

    
    body {
        zoom: 55%;

    }
</style>
 
  

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50"  >
<div  style="text-align:center; padding-right: 10px;background-color: #0B6CF7; ">
        <p style=" font-size: 14pt; color: white;">Sistema de Seguimientos de Pedidos Versión 1.0.1 &nbsp;&nbsp;&nbsp;&nbsp;Usuario: <?= $nombrenegocio ?></p>
    </div>
<META HTTP-EQUIV="REFRESH" CONTENT="12">

<div class="row" style="position: fixed; top: 10px; z-index: 10000; width: 250px; float: right; right: 400px; text-align:center; ">



</div>
<div style="top: 0px; position: relative; padding-left: 30px; vertical-align: text-top; ">

	<div id="mostrarleader">


		<table style="top: 0;margin-top: 1px; vertical-align: text-top; width: 3500px;"><!-- 5400px; -->
			<tr style="top: 0;margin-top: 1px; vertical-align: text-top;">
					 <td>
								



									<div>

										<div style="background-color: grey; height: 80px;">
										<a href="../../"> <button type="button" class="btn">Cerrar</button></a>

										</div>
										
									</div>
							</td>
			<!-- <td style="width: 400px;">
								<div style="width: 300px;">



									<div>

										<div style="background-color: #FFC300; height: 86px;">
											<h1 style="position: relative; padding: 10px; padding-top: 25px; color:black">WhatsApp Pedido (0)</h1>

										</div><br>
										<div>
										<?php
										 
										// include('../mensajeswsp/vistomensaje.php');
										 
										?>
										</div>
									</div>
							</td>  -->

					<td style="width: 400px;">
						<div style="width: 300px;">



							<div>

								<div style="background-color: gray; height: 86px;">
									<h1 style="position: relative; padding: 10px; padding-top: 5px;"> 
									<a href="../nota_de_pedido/"> <button type="button" class="btn">+</button></a>
									Ingresando (<?php echo crmhome::cantidadcolseg(0); ?>)</h1>

								</div><br>
								<?php echo crmhome::oportunidades(0,1); ?>

							</div>
					</td> 

							<!-- nuevo col -->

						

							<td style="width: 400px;">
								<div style="width: 300px;">



									<div>

										<div style="background-color: #AD3B06; height: 86px;">
											<h1 style="position: relative; padding: 10px; padding-top: 25px;"> Esperando Confirmacíon (<?php echo crmhome::cantidadcolseg(1); ?>)</h1>

										</div><br>
										<?php echo crmhome::oportunidades(1,1); ?>

									</div>
							</td> 
						
							<td style="width: 400px;">
								<div style="width: 300px;">



									<div>

										<div style="background-color: #067FAD; height: 86px;">
											<h1 style="position: relative; padding: 10px; padding-top: 25px;"> Confirmados (<?php echo crmhome::cantidadcolseg(2); ?>)</h1>

										</div><br>
										<?php echo crmhome::oportunidades(2,1); ?>

									</div>
							</td> 
                            <td style="width: 400px;">
								<div style="width: 300px;">



									<div>

										<div style="background-color: green; height: 86px;">
											<h1 style="position: relative; padding: 10px; padding-top: 25px;"> Preparando (<?php echo crmhome::cantidadcolseg(3); ?>)</h1>

										</div><br>
										<?php echo crmhome::oportunidades(3,1); ?>

									</div>
							</td> 
							<td style="width: 400px;">
								<div style="width: 300px;">



									<div>

										<div style="background-color: #678C35; height: 86px;">
											<h1 style="position: relative; padding: 10px; padding-top: 25px;"> Pidiendo Productos (<?php echo crmhome::cantidadcolseg(4); ?>)</h1>

										</div><br>
										<?php echo crmhome::oportunidades(4,1); ?>

									</div>
							</td> 
							<td style="width: 400px;">
								<div style="width: 300px;">



									<div>

										<div style="background-color: #9000BA; height: 86px;">
											<h1 style="position: relative; padding: 10px; padding-top: 25px;"> Controlando (<?php echo crmhome::cantidadcolseg(5); ?>)</h1>

										</div><br>
										<?php echo crmhome::oportunidades(5,1); ?>

									</div>
							</td> 
							<td style="width: 400px;">
								<div style="width: 300px;">



									<div>

										<div style="background-color: #F0FF00; height: 86px; ">
											<h1 style="position: relative; padding: 10px; padding-top: 25px;color:black;"> Listo para Retiro (<?php echo crmhome::cantidadcolseg(6); ?>)</h1>

										</div><br>
										<?php echo crmhome::oportunidades(6,1); ?>

									</div>
							</td> 
							<td style="width: 400px;">
								<div style="width: 300px;">



									<div>

										<div style="background-color: #FFD500; height: 86px;">
											<h1 style="position: relative; padding: 10px; padding-top: 25px;color:black;"> Listo para Despacho (<?php echo crmhome::cantidadcolseg(7); ?>)</h1>

										</div><br>
										<?php echo crmhome::oportunidades(7,1); ?>

									</div>
							</td> 
							<td style="width: 400px;">
								<div style="width: 300px;">



									<div>

										<div style="background-color: black; height: 86px;">
											<h1 style="position: relative; padding: 10px; padding-top: 25px;color:gray;">En Ruta de Entrega</h1>

										</div><br>
										<?php echo crmhome::oportunidades(9,1); ?>

									</div>
							</td> 
							<td style="width: 400px;">
								<div style="width: 300px;">



									<div>

										<div style="background-color: blue; height: 86px;">
											<h1 style="position: relative; padding: 10px; padding-top: 25px;color:gray;">Entregadas</h1>

										</div><br>
										<?php echo crmhome::oportunidades(31,1); ?>

									</div>
							</td> 
						
					
						

						




							<!-- fin col -->







			</tr>







		</table>
	</div>
	<br><br>
    </div><br><br>
<!-- Footer -->
<footer class="text-center" style="background-color: black; position: fixed; width: 100%; height: 20px; bottom: -10px; left: -10px; z-index: 1000;">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="ARRIBA">
   ARRIBA 
  </a>

</footer>

  <script src="/js/top.js"></script>
</body>
</html>
<?php
  mysqli_close($rjdhfbpqj);
}else{
	echo ("<script language='JavaScript' type='text/javascript'>");
			echo ("location.href='../'");
			echo ("</script>"); 
	}
 
 
?>


