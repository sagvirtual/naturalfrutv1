<?php 

$sdhf="localhost";
$dbdhf="softwar2_dsddksujd";
$udhf="softwar2_koidksus";
$pdhf="6*3o#5VzK6";

$conexion=new mysqli($sdhf,$udhf,$pdhf,$dbdhf);
$conexion->set_charset("utf8mb4");


$ident=$_GET['kjkjkvcssd'];

class crmhome {
	

	

/* ACA CONTROLO SI NO ESTA LA FOTO EN EL PERFIL PONGO LA FOTO POR DEFAUULT*/
public static function cantidadcolseg($col) {
	$conexion = $GLOBALS['conexion'];
		

$sqloportunidads=mysqli_query($conexion,"SELECT * FROM orden  Where col = '$col' ");
	
$numero_col = mysqli_num_rows($sqloportunidads);		

echo ''.$numero_col.'';	
}


	/* ACA CONTROLO SI NO ESTA LA FOTO EN EL PERFIL PONGO LA FOTO POR DEFAUULT*/
	public static function oportunidades($col,$cids) {
		$conexion = $GLOBALS['conexion'];
		$idents = $GLOBALS['ident'];
	
$sqloportunidad=mysqli_query($conexion,"SELECT * FROM orden  Where col='$col' ORDER BY `fechahoja` ASC");
while ($rowoportunidad = mysqli_fetch_array($sqloportunidad)){
	
 $str = "#";
 for($i = 0 ; $i < 6 ; $i++){
 $randNum = rand(0, 15);
 switch ($randNum) {
 case 10: $randNum = "A"; 
 break;
 case 11: $randNum = "B"; 
 break;
 case 12: $randNum = "C"; 
 break;
 case 13: $randNum = "D"; 
 break;
 case 14: $randNum = "E"; 
 break;
 case 15: $randNum = "F"; 
 break; 
 }
 $str .= $randNum;
 }	

	
$idorden = $rowoportunidad["id"];
$id_usuarioclav = $rowoportunidad["id_usuarioclav"];
$responsable = $rowoportunidad["responsable"];
$hora3 = $rowoportunidad["hora3"];
$hora = $rowoportunidad["hora"];
$hora_pic = $rowoportunidad["hora_pic"];
$fecha3 = $rowoportunidad["fecha3"];
$fecha = $rowoportunidad["fecha"];
$forzado = $rowoportunidad["forzado"];
$fechaOrden = $rowoportunidad["fechahoja"];
$fecha = $rowoportunidad["fecha"];

if($fechaOrden!='0000-00-00'){
$dia_en_espanol = array(
	'Monday'    => 'Lunes',
	'Tuesday'   => 'Martes',
	'Wednesday' => 'Miércoles',
	'Thursday'  => 'Jueves',
	'Friday'    => 'Viernes',
	'Saturday'  => 'Sábado',
	'Sunday'    => 'Domingo'
);

$nombre_dia_ingles = date('l', strtotime($fechaOrden));
$nombre_dia_espanol = $dia_en_espanol[$nombre_dia_ingles];

$diaorden=' 
 <style>
        .cuadro-horizontal {
           background-color: #ff8b00; /* Fondo amarillo */
            color: white; /* Letras negras */
            padding: 0px; /* Espaciado interno */
            
            width: 150px; /* Ancho del cuadro */
            height: 25px; /* Altura del cuadro */
            display: flex; /* Alineación horizontal */
            justify-content: center; /* Centrar el contenido horizontalmente */
            align-items: center; /* Centrar el contenido verticalmente */
            text-align: center; /* Alinear el texto al centro */
            transform: rotate(-90deg); /* Rotar el cuadro 90 grados */
            transform-origin: center; /* El punto de rotación está en el centro */
            margin: 0px; /* Añadir espacio alrededor del cuadro */
			   font-size: 20pt;
      font-weight: bold;
	   position:relative; 
	   top:62px;
	   left:215px;
        }
    </style>

<div class="cuadro-horizontal">
     '.$nombre_dia_espanol.'
    </div>';
}else {$diaorden='';}

if($forzado=='1'){

	$urgent='<img src="../assets/images/urgente.png" style="display: block; position: relative;  left: 35%;">
';
}else{$urgent='';}


if($col=='3'){
$sqlusuarios = mysqli_query($conexion, "SELECT * FROM usuarios Where id='$id_usuarioclav'");
if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {  
									
  $nombreuspic='<div style="padding-left:10px;"><p style="color:blue; font-weight: bold;font-size: 20pt;">Preparando:<br>'.$rowusuarios['nom_contac'].' <p>
 <p style="color:blue; font-weight: bold;  line-height: 100%;">Comienzo: '.$hora_pic.'hs.  &nbsp;&nbsp;'.date('d/m', strtotime($fecha3)).'</p>
 
  </div>';
		 
	   }
	}


if($col=='0'){
	$sqlusuarios = mysqli_query($conexion, "SELECT * FROM usuarios Where id='$responsable '");
	if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {  
										
	  $nombreuspic='<div style="padding-left:10px;"><p style="color:blue; font-weight: bold;font-size: 20pt;">'.$rowusuarios['nom_contac'].' <p>
	 <p style="color:blue; font-weight: bold;  line-height: 100%;">Comienzo: '.$hora.'hs. </p>
	 
	  </div>';
			 
		   }
		}
		if($col!='0'){
			$sqlusuarios = mysqli_query($conexion, "SELECT * FROM usuarios Where id='$responsable '");
			if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {  
												
			  $nombreuspicb='<div style="padding-left:10px;"><p style="color:grey; font-weight: bold;font-size: 12pt;">Ingreso: '.$rowusuarios['nom_contac'].' <p>
		
			 
			  </div>';
					 
				   }
				}
	if($col >'3'){
		$sqlusuarios = mysqli_query($conexion, "SELECT * FROM usuarios Where id='$id_usuarioclav'");
		if ($rowusuard = mysqli_fetch_array($sqlusuarios)) {  
											
		  $nombreuspicd='<div style="padding-left:10px;">Preparo: '.$rowusuard['nom_contac'].'</div>
		 
		 ';
				 
			   }
			}else{$nombreuspicd="";}


$sqlore = mysqli_query($conexion, "SELECT * FROM item_orden Where id_orden = '$idorden' and modo='0'");

$canverificafin=${"canverificafin".$idorden };
$canverificafin = mysqli_num_rows($sqlore);




$idordencod=base64_encode($idorden);
$id_contacto = $rowoportunidad["id_cliente"];





$sqlusuarios = mysqli_query($conexion, "SELECT * FROM orden Where id_orden = '$idorden' and col !='0' and col!='32'");
 if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {  
    $col = $rowusuarios["col"];    
         
  
 }
if($col=='5' || $col=='4'){
 $sqlordenx = mysqli_query($conexion, "SELECT * FROM impresion Where id_orden='$idorden'");
 if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

	$impreso='<span class="badge bg-blue" style="width: 100%;font-size: 22pt;background-color: blue;">Impreso Ok</span>';

 }else{$impreso='';}
}
 switch ($col) {
    case 1:
        $status='<p style="font-size: 12pt;"><span class="badge bg-secondary">Ingresando</span></p>';
       
        break;    
    case 2:
        $status='<p   style="font-size: 12pt;"<span class="badge bg-primary">Confirmado</span></p>';
       
        break;
    case 3:
        $status='<p   style="font-size: 12pt;"<span class="badge bg-success">Preparando</span></p>';
       
            break;    
    case 4:
        $status='<p   style="font-size: 12pt;"<span class="badge bg-danger">Pidiendo</span></p>';
            
            break;
    case 5:
            $status='<p   style="font-size: 12pt;"<span class="badge bg-success">Controlando</span></p>';
             break;
             case 6:
                $status='<p   style="font-size: 12pt;"<span class="badge bg-info">Retiro</span></p>';
       
                break;
    case 7:
        $status='<p   style="font-size: 12pt;"<span class="badge bg-dark">Despacho</span></p>';
       
            break;
            case 8:
                $status='<p  style="font-size: 12pt;"><span class="badge bg-secondary">Concretado</span></p>';
              
                break;
                case 7:
                    $status='<p   style="font-size: 12pt;"<span class="badge bg-secondary">Finalizado</span></p>';
                    break;
                    case 9:
                        $status='<p   style="font-size: 12pt;"<span class="badge bg-warning">En Ruta</span></p>';
                        break;}



//$nombre = $rowoportunidad["nombre"];
//$fecha = $rowoportunidad["fecha"];
/* $hora = $rowoportunidad["hora"];
$detalle = $rowoportunidad["detalle"];
$valoroportunidad = $rowoportunidad["valoroportunidad"];
$estadistica = $rowoportunidad["estadistica"];	
	
$pesow = number_format( $valoroportunidad, 2, ',', '.');

if($valoroportunidad!=""){
	
if($estadistica=="0"){
	$valorespre= "<br><br><strong><em>$".$pesow.".-</em></strong>";}else{$valorespre= "<br><br><strong><em><s>$".$pesow."</s>.-</em></strong>";}
	}else{$valorespre= "";}	 */
	
	echo"
	<style>
	
	
	.dots::after {
		text-align: left;
		content: '';
		display: inline-block;
		animation: dots 1s steps(5, end) infinite;
	}
	
	@keyframes dots {
		0%, 20% {
			content: '';
		}
		40% {
			content: '!';
		}
		60% {
			content: '!!';
		}
		80%, 100% {
			content: '!!';
		}
	}
	</style>
	
	";	
	
$sqllead=mysqli_query($conexion,"SELECT * FROM clientes Where id = '$id_contacto'");
if ($rowlead = mysqli_fetch_array($sqllead)){
$idcie = $rowlead["id"];
$nombre = $rowlead["nom_empr"];
$empresa = $rowlead["nom_contac"];
$domicilio = $rowlead["address"];
//$fecha = $rowlead["fecha"];

$zonaid=$rowlead["zona"];

$agregado=${"agregado".$idorden };
$cdon=${"cdon".$idorden };

$sqloere = mysqli_query($conexion, "SELECT * FROM item_orden Where id_orden = '$idorden'  and id_cliente='$id_contacto' and agregado='1' and modo='0'");
$numero_agre = mysqli_num_rows($sqloere);	
if ($rowddd = mysqli_fetch_array($sqloere)){
$agregado=$rowddd['agregado'];
$agreccs='red';$cdon='<i style="color:red;">Con '.$numero_agre.' agregados!<span class="dots"></span></i><br>';

}else{$agreccs='grey';$cdon="";}


$idcied=base64_encode($idcie);
$retiradcv=$rowlead['retira'];
    if($retiradcv=='1'){ $verprreir='<button type="button" class="btn btn-outline-dark">Retira el Cliente</button>'; $fonmed="14";}else{

		$verprreir=$rowlead["localidad"];
		$fonmed="10pt";

		$sqlleadd=mysqli_query($conexion,"SELECT * FROM zona Where id = '$zonaid'");
if ($rowleadd = mysqli_fetch_array($sqlleadd)){
	$zonad="Zona: ".$rowleadd["nombre"];

}else{$zonad="";}
	}	
	
}	

	
	echo '

	<a  href="../nota_de_pedido/?jhduskdsa='.$idcied.'&jufqwes='.$idordencod.'"> 
<div 
style="background-color: white;
-webkit-box-shadow: 0px 8px 8px 0px rgba(50, 50, 50, 0.75);
-moz-box-shadow:    0px 8px 8px 0px rgba(50, 50, 50, 0.75);
box-shadow:         0px 8px 8px 0px rgba(50, 50, 50, 0.75); "> '.$urgent.'   '.$diaorden.'  

<div  style="background-color: '. $str.'; height: 12px; width: 80px; position: relative; left: 0px; top: 10px;">  </div><br>


<strong style="color: black;font-size: 16pt;line-height : 25px; position: relative; top: 0px; left: 8px;" >'.$cdon.''.$rowlead["nom_contac"].' </strong><br>
<strong style="font-size: 22pt;line-height : 25px; position: relative; top: 0px; left: 8px; color:'.$agreccs.'" >Pedido: Nº '.$rowoportunidad["id"].' </strong>




<p style="width: 200px;left: 8px;position: relative; font-size: '.$fonmed.'pt;" >'.$verprreir.' </p>

<p style="width: 200px;left: 8px;position: relative; font-size: '.$fonmed.'pt;" >'.$zonad.'</p>
<p  style="font-size: 10pt; position:relative; padding-left:9px;">'.date('d/m/Y', strtotime($fecha)).' (Cant. Ítems '.$canverificafin.')</p>
'.$nombreuspicb.'
'.$nombreuspicd.'
'.$status.'

';

if($col!='0'){
echo'
<a href="../nota_de_pedido/nota_de_pedido_pdf.php?jdhsknc='.$idordencod.'&contr='.$col.'" target="_blank" style="font-size: 10pt; position:relative; float:right; top:-75px;"> <img src="../assets/images/pdf.png" alt="DESCARGAR PDF DEL PEDIDO"></a> 
';

}
 
echo''.$nombreuspic.''.$impreso.'
</div>



</a><br>
	
	
	
	
	
	
	
	
	';
}


		

	}
	




}
?>
  