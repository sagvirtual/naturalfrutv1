<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../template/cabezal.php');
?>
<style>
    /* Estilo para el mensaje de confirmación */
    #mensajeCopiado {
        display: none;
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        position: fixed;
        top: 120px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1000;
        border-radius: 5px;
    }
</style>
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Datos</h4>

        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">





        <div class="col-lg-10">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="table-responsive">



                        <table id="datatable-buttons" class="table table-striped table-bordered ">

                            <tbody>

                                <td>

                                    <button type="button" class="btn btn-primary" onclick="copyToClipboard('#fot3')"> Copiar Datos del Banco</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-secondary" onclick="copyToClipboard('#fot2')"> Copiar Direccíon</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-secondary" onclick="copyToClipboard('#fot4')"> Nuevo Cliente</button>


                                </td>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>




<div class="invisible">
    <textarea id="fot2">
Natural Frut     
Alsina 1935, B1650 Villa Lynch, Provincia de Buenos Aires
Lunes a Viernes de 10:00 a 13:00 y 14:00 a 15:30hs
https://maps.app.goo.gl/6K4HHyq7ixd13iANA
			</textarea>
</div>



<div class="invisible">
    <textarea id="fot3">
*DATOS PARA DEPOSITO/TRANSFERENCIA*
*Razón Social:* Genebrier Sebastián Alejandro
*Banco:* Banco Credicoop
*CUIT:* 20-32763767-4
*Sucursal:* 069
*Tipo de Cuenta:* Cuenta Corriente
*CBU:* 1910069855006900863132
*Nº Cuenta:* CC$ 191-069-008631/3
*Alias:* NATURAL.FRUT.GENE</textarea>
</div>

<div class="invisible">
    <textarea id="fot4">
*Nombre de contacto:*
*Nombre del local/negocio:*
*Direccion:*
*Localidad:*
*Telefono de contacto:*
*Horarios de atencion:*
*Condicion frente al IVA:*
*CUIT:*
*RAZON SOCIAL:* &nbsp;</textarea>
</div>
</div>

<script language="JavaScript" type="text/JavaScript">
    function copyToClipboard(elemento) {
            var $temp = $("<textarea>");
            $("body").append($temp);
            $temp.val($(elemento).text()).select();
            document.execCommand("copy");
            $temp.remove();
            
            // Mostrar el mensaje "Dato copiado"
            var mensaje = document.getElementById("mensajeCopiado");
            mensaje.style.display = "block";
            
            // Ocultar el mensaje después de 2 segundos
            setTimeout(function() {
                mensaje.style.display = "none";
            }, 2000);
        }
    </script>





<?php include('../template/pie.php'); ?>