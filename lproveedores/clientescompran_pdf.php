<?php include('../f54du60ig65.php');

mysqli_query($rjdhfbpqj,"SET CHARACTER SET 'utf8'");
mysqli_query($rjdhfbpqj,"SET SESSION collation_connection ='utf8_unicode_ci'");

include('../lusuarios/login.php');
function limpiarAcentos($cadena) {
    return strtr($cadena, 'ÁÉÍÓÚáéíóúÑñ', 'AEIOUaeiouNN');
}
// Configuramos las cabeceras para descargar el archivo Excel
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=clientes.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "\xEF\xBB\xBF"; // Añadimos BOM para que Excel detecte UTF-8 correctamente

function versicom($rjdhfbpqj,$id_proveedor,$id_cliente){


    $sqlcerias = mysqli_query($rjdhfbpqj, "
    SELECT p.id_proveedor,p.id, io.modo,io.id_producto,io.id_cliente
    FROM productos p
    INNER JOIN item_orden io 
    ON p.id = io.id_producto
    WHERE  p.id_proveedor = '$id_proveedor' AND io.id_cliente = '$id_cliente' AND io.modo = '0'");

if ($rowcategorias = mysqli_fetch_array($sqlcerias)) {
    // Tu código para procesar el resultado
    $comresul = 'SI';
}else{ $comresul = '';}


   return $comresul;

}



$buscar=$_GET['buscar'];
$sincan=$_GET['sincan'];


if($sincan==1){

    $nopo="1";
}else{
   // $sql="and id='".$buscar."'";
   $nopo="0";
}

$sqlcerias = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$buscar' ");
while ($rowcategorias = mysqli_fetch_array($sqlcerias)) {

    $prveedor = $rowcategorias["empresa"];

}
?>



<style>

body {
    font-size: 10pt;
    font-family: Arial, sans-serif;
}
th, td {
        border-bottom: 1px solid #000000;
        border-left: 1px solid #000000;
        border-right: 1px solid #000000;
        padding: 2px;
    }

  
    .tdderechaf {
	border-right-width: 1pt;
	border-right-style: solid;
	border-right-color: #000000;
	border-bottom-width: 1pt;
	border-bottom-style: solid;
	border-bottom-color: #000000;
	width: 80px;

}


</style>

                 
        <table border="0" padding="0" style="background-color: #fff; width: 100%;"> 
        <tr>
                                                
                                                <td  style="border-color: black;text-align:left;"  colspan="7">Proveedor: <b><?=limpiarAcentos($prveedor)?></b></td>
                                            
                                            </tr> 
        <tr>
                                                
                                                <td  style="border-color: black;text-align:left;">Negocio</td>
                                                <td  style="border-color: black;text-align:left;">Contacto </td>
                                                <td  style="border-color: black;text-align:left;">Dirección </td>
                                                <td  style="border-color: black;text-align:left;">Localidad</td>
                                                <td  style="border-color: black;text-align:left;">WhatsApp </td>
                                                <td  style="border-color: black;text-align:left;">Telefono</td>
                                                <td  style="border-color: black;text-align:center;">Compra</td>
                                            
                                            </tr>
                                        <?php
                                //aca pruebo el otro

                                $sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where estado = '0' and zona!='4' and retira='0' and address!='RETIRA' ORDER BY localidad ASC");
                                while ($rowcategorias = mysqli_fetch_array($sqlcategorias)) {
                                    $id_cliente = $rowcategorias["id"];
                                    $nomnegovio = $rowcategorias['nom_contac'];
                                    $nombrecontacto = $rowcategorias['nom_empr'];
                                    $address = $rowcategorias['address'];
                                    $localidad = $rowcategorias['localidad'];
                                    $wsp = $rowcategorias["wsp"];
                                    $tel = $rowcategorias["tel"];

                                    $compra=versicom($rjdhfbpqj,$buscar,$id_cliente);

                                                    

                                                echo '<tr>
                                                
                                                <td  style="border-color: black;text-align:left;">' . $nomnegovio . '     </td>
                                                <td  style="border-color: black;text-align:left;">' . $nombrecontacto . '     </td>
                                                <td  style="border-color: black;text-align:left;">' . $address . '     </td>
                                                <td  style="border-color: black;text-align:left;">' . $localidad . '     </td>
                                                <td  style="border-color: black;text-align:left;">' . $wsp . '     </td>
                                                <td  style="border-color: black;text-align:left;">' . $tel . '     </td>
                                                <td  style="border-color: black;text-align:center;"><b>' . $compra . '<b> </td>
                                                </tr>';
                                               
                                                                               
                                                
                                            
                                                
                                           
                                            }
                                        

                                        
                                     




                                    
                                

                                ?>
 </table>


