<? include('../f54du60ig65.php');
include('../lusuarios/login.php');
$idcod = $_GET['jfndhom'];
$idcodrt = $_GET['jfndhom'];
include('listcabezal.php');
$cuadrosinfoto="";

$_SESSION['pagina']=$_GET['pagina'];


$_SESSION['busquedads']=$busquedads;


$_SESSION['jfnddhom']=$_GET['jfndhom'];




$sqleditwld = mysqli_query($rjdhfbpqj, "SELECT * FROM editlista Where fecha < '$fechalista' and tipolista = '0'");
if ($roweditdsold = mysqli_fetch_array($sqleditwld)) {
    $fechalisold = $roweditdsold["fecha"];}else{$fechalisold = $fechalista;}

?>
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<style>
/* Estilo para el botón */
button {
  cursor: pointer;
  display: flex;
  width: 130px;
  height: 30px;
  justify-content: center;
  align-items: center;
}

/* Estilo para el modal */
.modal {
 /*   font-family: Arial, sans-serif;  Fuente Arial */
  display: none; /* Ocultar el modal por defecto */
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4); /* Fondo oscuro semitransparente */
}

/* Estilo para el contenido del modal */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* Centrar vertical y horizontalmente */
  padding: 20px;
  border: 1px solid #888;
  width: 233mm;
  text-align:center;
}

/* Estilo para el botón de cerrar */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>




<?
include('cssplantilla.php');
$timean = time(); 
$refresko =  "?".$timean;

/* join */




// Dividir la cadena de búsqueda en palabras
$palabrasbu = explode(' ', $busquedads);

// Crear un array para almacenar las condiciones de búsqueda para cada palabra
$condiciones = array();

foreach ($palabrasbu as $palabrax) {
    // Reemplazar espacios con comodines para que coincida con cualquier palabra
    $termino = '%' . str_replace(' ', '%', $palabrax) . '%';
    // Agregar la condición para esta palabra al array
    $condiciones[] = "productos.nombre LIKE '$termino'";
}

// Unir todas las condiciones con el operador AND para asegurarse de que todas las palabras estén presentes
$condicion_final = implode(' AND ', $condiciones);


/* paginacion */


if(empty($busqueda)){$TAMANO_PAGINA = 1;}else{$TAMANO_PAGINA = 5;}

//examino la página a mostrar y el inicio del registro a mostrar

$pagina = $_GET["pagina"];

if (!$pagina) {

		$inicio = 0;

		$pagina=1;

}

else {

	$inicio = ($pagina - 1) * $TAMANO_PAGINA;

}

$sqlcategoriasba = mysqli_query($rjdhfbpqj, "SELECT
   productos.id_marcas, productos.id, productos.id_proveedor, productos.categoria, productos.nombre, productos.estado, 
   proveedores.id, proveedores.empresa as empresapro,
   marcas.empresa, 
   categorias.id as idcate, categorias.position, categorias.nombre as nomcate


   FROM productos 
   INNER JOIN marcas ON productos.id_marcas = marcas.id 
   INNER JOIN categorias ON categorias.id = productos.categoria
   INNER JOIN proveedores ON productos.id_proveedor = proveedores.id

   Where  $condicion_final OR marcas.empresa LIKE '%$busquedads%' OR proveedores.empresa LIKE '%$busquedads%' OR categorias.nombre LIKE '%$busquedads%'
   GROUP BY categorias.id");





$num_total = mysqli_num_rows($sqlcategoriasba);
$total_paginas = ceil($num_total / $TAMANO_PAGINA);
//construyo la sentencia SQL			  
$limit= " limit " . $inicio . "," . $TAMANO_PAGINA ;







   /* join */
  $sqlcategoriasb = mysqli_query($rjdhfbpqj, "SELECT
   productos.id_marcas, productos.id, productos.id_proveedor, productos.categoria, productos.nombre, productos.estado, 
   proveedores.id, proveedores.empresa as empresapro,
   marcas.empresa, 
   categorias.id as idcate, categorias.position, categorias.nombre as nomcate


   FROM productos 
   INNER JOIN marcas ON productos.id_marcas = marcas.id 
   INNER JOIN categorias ON categorias.id = productos.categoria
   INNER JOIN proveedores ON productos.id_proveedor = proveedores.id

   Where  $condicion_final OR marcas.empresa LIKE '%$busquedads%' OR proveedores.empresa LIKE '%$busquedads%' OR categorias.nombre LIKE '%$busquedads%'
   GROUP BY categorias.id
   
    ORDER BY `categorias`.`position` ASC 

    $limit
   ");


while ($rowcategoriasb = mysqli_fetch_array($sqlcategoriasb)) {
  $id_categoria = $rowcategoriasb["idcate"];
    $nombrecate = strtoupper($rowcategoriasb["nomcate"]);

        echo '<table cellPadding="0" cellSpacing="0" style="'.$anchotable.' border: none; "><tr>
        <td style=" background-color:black; color:white; text-align:center;">'.$nombrecate.'</td>
        </tr></table>';


    $nomostitu = ${"nomostitu".$id_categoria};
    $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where estado='0' and categoria='$id_categoria' and $condicion_final ORDER BY `productos`.`position` ASC ");
    //busco el produco por la categoria agregar while$canverificafind)
    $canverificafin = mysqli_num_rows($sqlproductos);

    if($canverificafin=='0'){$sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and estado='0' ORDER BY `productos`.`position` ASC ");}
    $canverificafind = mysqli_num_rows($sqlproductos)*2;
    while ($rowproductos = mysqli_fetch_array($sqlproductos)) {
      

        $idpro = $rowproductos["id"];
        $fileds = $rowproductos["file"];
        $modo_producto = $rowproductos["modo_producto"];
        $unidadnom = $rowproductos["unidadnom"];
        $id_marcasp = $rowproductos["id_marcas"];
        if("$modo_producto"=="Pack"){$pidtb="del";}else{$pidtb="de la ";}
        if("$unidadnom"=="Kg."){$pidt="del";$ella="el";}else{$pidt="de la "; $ella="la";}



        $str = obtenerSiguienteColor($ultimoIndice, $coloresPasteles);

        
        
        $nombreproducs = $rowproductos["nombre"];

        $nombreproduce= explode("(",$nombreproducs);
        $nombreproduc= $nombreproduce[0];

        $cosecha = $rowproductos["nombreb"];
        //$nombreproduc = strtolower($rowproductos["nombre"]);
        //$nombreproduc = ucfirst($nombreproduc);
        $colores=${"colores".$idpro};
        $id_marcasp=${"id_marcasp".$idpro};
        $nombremar=${"nombremar".$idpro};
        //$fileds=${"fileds".$idpro};
        $palabras=${"palabras".$idpro};
        $palabra=${"palabra".$idpro};
        $colorfonpre=${"colorfonpre".$idpro};
        $colorfonpretext=${"colorfonpretext".$idpro};
        $valoranter=${"valoranter".$idpro};
        $valoractual=${"valoractual".$idpro};
        $sqlpreciodant=${"sqlpreciodant".$idpro};
        $rowprecrodant=${"rowprecrodant".$idpro};
        $kilopres=${"kilopres".$idpro};
        
        $mga = ${"mga".$idpro};
        $mpa = ${"mpa".$idpro};
        $mkb = ${"mkb".$idpro};
        $mpb = ${"mpb".$idpro};
        $mkc = ${"mkc".$idpro};
        $mpc = ${"mpc".$idpro};
        $mkd = ${"mkd".$idpro};
        $mpd = ${"mpd".$idpro};  
        $mke = ${"mke".$idpro};
        $mpe = ${"mpe".$idpro};

        $mua = ${"mua".$idpro};
        $mub = ${"mub".$idpro};  
        $muc = ${"muc".$idpro};
        $mud = ${"mud".$idpro};
        $mue = ${"mue".$idpro};



        $sqlpreciold=${"sqlpreciold".$idpro};
        $rowprecroold=${"rowprecroold".$idpro};



        $pingos = ${"pingos".$idpro};
        $pingosc = ${"pingosc".$idpro};
        $pingosd = ${"pingosd".$idpro};
        $pingose = ${"pingose".$idpro};
        
        $mpbb = ${"mpbb".$idpro};
        $mpcb = ${"mpcb".$idpro};
        $mpdb = ${"mpdb".$idpro};
        $mpeb = ${"mpeb".$idpro};
        
        $mpbbcantk = ${"mpbbcantk".$idpro};
        $mpcbcantk = ${"mpcbcantk".$idpro};
        $mpdbcantk = ${"mpdbcantk".$idpro};
        $mpebcantk = ${"mpebcantk".$idpro};
        
        $altofoto = ${"altofoto".$idpro};
        
        $colspan = ${"colspan".$idpro};
        
       
        
        $rowecartestx = ${"rowecartestx".$idpro};
        $sqlcartester = ${"sqlcartester".$idpro};
        $color1tex = ${"color1tex".$idpro};
        $id_cartelre = ${"id_cartelre".$idpro};
        
        
        $sqleditlispro = ${"sqleditlispro".$idpro};
        $roweditlispro = ${"roweditlispro".$idpro};
        $id_plantilla = ${"id_plantilla".$idpro}; 

        $sqleditlisproc = ${"sqleditlisproc".$idpro};
        $sqleditlisprocb = ${"sqleditlisprocb".$idpro};
        $roweditlisprod = ${"roweditlisprod".$idpro};  $sqleditlisproc = ${"sqleditlisproc".$idpro};
        $roweditlisprodb = ${"roweditlisprodb".$idpro};
        $fechalistaca = ${"fechalistaca".$idpro}; 
        $kilopresd = ${"kilopresd".$idpro}; 

        $sqleditlisproc=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where id_producto = '$idpro' and tipolista = '0' and fecha = '$fechalista'");
        if ($roweditlisprod = mysqli_fetch_array($sqleditlisproc)){
            $fechalistaca = $roweditlisprod["fecha"];}
            else{
   
                $sqleditlisprocb=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where id_producto = '$idpro' and tipolista = '0'");
                if ($roweditlisprodb = mysqli_fetch_array($sqleditlisprocb)){
                    $fechalistaca = $roweditlisprodb["fecha"];}
   
                  
   
            }

        /* ep ultimo precio del producto */
        $sqlpreciodant = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$idpro'  and cerrado = '1' and confirmado = '1'  ORDER BY fecha DESC, id DESC;");
        if ($rowprecrodant = mysqli_fetch_array($sqlpreciodant)) {
            $kilopresd = $rowprecrodant["kilo"];
            $kilopres = str_replace(".", ",", $kilopresd);
            $mga = $rowprecrodant["mga"];
            $mpa = $rowprecrodant["mpa"];
            $mkb = $rowprecrodant["mkb"];
            $mpb = $rowprecrodant["mpb"];
            $mkc = $rowprecrodant["mkc"];
            $mpc = $rowprecrodant["mpc"];
            $mkd = $rowprecrodant["mkd"];
            $mpd = $rowprecrodant["mpd"];  
            $mke = $rowprecrodant["mke"];
            $mpe = $rowprecrodant["mpe"];    
            
            $mua = $rowprecrodant["mua"];
            $mub = $rowprecrodant["mub"];
            $muc = $rowprecrodant["muc"];  
            $mud = $rowprecrodant["mud"];
            $mue = $rowprecrodant["mue"]; 
             
        


            
            $palabras = explode(" ", $nombreproduc);
            
            // Colores disponibles
            $colores = array("#0064B7", "black", "#99431B");
            
            /* aca cambia normal verde o rojo si varia el precio */   
    
            $sqlpreciold = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where fecha <='$fechalisold' and id_producto='$idpro'  and cerrado = '1' and confirmado = '1'  ORDER BY fecha DESC, id DESC;");
            if ($rowprecroold = mysqli_fetch_array($sqlpreciold)) {$valoranter=$rowprecroold['mpb'];}else{$valoranter=$mpb;}
    
            $valoractual=$mpb;
            /* fin */
        /* si el precio es bajo */
        if( $valoranter > $valoractual){
            $colorfonpre="#FFFF14"; 
            $colorfonpretext="#007704"; 
            $colorfonpretextb="#007704"; 

        }elseif( $valoranter < $valoractual){
            $colorfonpre="black"; 
            $colorfonpretext="red"; 
            $colorfonpretextb="red"; 
        }
        elseif( $valoranter == $valoractual){
            $colorfonpre="black";  
            $colorfonpretext="white"; 
            $colorfonpretextb="black"; 
        }
            
            
            
            
            /* bulto */
          $mpba = $mpa * $kilopresd;

          
         // $mpbb = $mpb * $mkb;

        /*   if($id_plantilla!='7'){
          $mpbb = $mpb  * $kilopresd;
          $mpcb = $mpc  * $kilopresd;
          $mpdb = $mpd  * $kilopresd;
          $mpeb = $mpe  * $kilopresd;
        }else{


          if($mub=='1'){$mpbbcantk = $mkb  * $kilopresd; $mpbb = $mpc  * $mpbbcantk;}else{$mpbb = $mpb  * $kilopresd;}
          if($muc=='1'){$mpcbcantk = $mkc  * $kilopresd; $mpcb = $mpc  * $mpcbcantk;}else{$mpcb = $mpc  * $kilopresd;}
          if($mud=='1'){$mpdbcantk = $mkd  * $kilopresd; $mpdb = $mpc  * $mpdbcantk;}else{$mpdb = $mpd  * $kilopresd;}
          if($mue=='1'){$mpebcantk = $mke  * $kilopresd; $mpeb = $mpc  * $mpebcantk;}else{$mpeb = $mpe  * $kilopresd;}
        }
            
         $mpa = number_format($mpa, 0, '.', ',');
            $mkb = number_format($mkb, 0, '.', ',');
            $mpb = number_format($mpb, 0, '.', ',');
            $mkc = number_format($mkc, 0, '.', ',');
            $mpc = number_format($mpc, 0, '.', ',');
            $mkd = number_format($mkd, 0, '.', ',');
            $mpd = number_format($mpd, 0, '.', ',');  
            $mke = number_format($mke, 0, '.', ',');
            $mpe = number_format($mpe, 0, '.', ',');
            
            $mpba = number_format($mpba, 0, '.', ',');
            $mpbb = number_format($mpbb, 0, '.', ',');
            $mpcb = number_format($mpcb, 0, '.', ',');
            $mpdb = number_format($mpdb, 0, '.', ',');
            $mpeb = number_format($mpeb, 0, '.', ','); */
    
            if($mkb == '1'){$pingos="";}else{$pingos="s";}
            if($mkc == '1'){$pingosc="";}else{$pingosc="s";}
            if($mkd == '1'){$pingosd="";}else{$pingosd="s";}
            if($mke == '1'){$pingose="";}else{$pingose="s";}


            
           


        } 
        /* fin */
        $sqleditlispro=mysqli_query($rjdhfbpqj,"SELECT * FROM editlispro Where id_producto = '$idpro' and tipolist = '0' and fecha = '$fechalista'");
        if ($roweditlispro = mysqli_fetch_array($sqleditlispro)){
            $id_plantilla = $roweditlispro["id_plantilla"];}
            else{
                
                $sqleditlispro=mysqli_query($rjdhfbpqj,"SELECT * FROM editlispro Where id_producto = '$idpro' and tipolist = '0'");
        if ($roweditlispro = mysqli_fetch_array($sqleditlispro)){
            $id_plantilla = $roweditlispro["id_plantilla"];}else{
                
                
                if($mga !=null && $mga !='0' && $mga > '0' && !empty($mga)){$id_plantilla='19';}else{
                $id_plantilla='99';}}
                }



       /*      if( $id_plantilla=='20'){
            $nomostitu=$nomostitu+1;
            if( $nomostitu <='1'){
            echo'<table cellPadding="0" cellSpacing="0" style=" '.$anchotable.'   border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">  ';}
        } */
             


        $comoi="'";   
        //if($id_plantilla!='20' || $id_plantilla!='99') { 
        if($id_plantilla!='99') { 
        echo '<table cellPadding="0" cellSpacing="0"  onmouseover="mostrarTabla'.$idpro.'('.$comoi.'vertable'.$idpro.''.$comoi.')" onmouseout="ocultarTabla'.$idpro.'('.$comoi.'vertable'.$idpro.''.$comoi.')">
        <tr>
        <td>';
        if($palabras!=""){
        echo'<table style="cursor: pointer; width: 150px; height: 100px;text-align:center; display:none;" id="vertable'.$idpro.'" > 
        <tr>
        <td>
        
        <button id="myBtn'.$idpro.'" style="cursor: pointer; display: flex; width: 130px; height: 30px;   justify-content: center;align-items: center;">CARTELITOS</button>
        
        

        </td>
        </tr>
      
        <tr>
        <td>
        <button id="myBtnp'.$idpro.'" style="cursor: pointer; display: flex; width: 130px; height: 30px;  justify-content: center;align-items: center;">PLANTILLAS</button>

        </td>
        </tr>  <tr>
        <td>

        <form enctype="multipart/form-data" id="form'.$idpro.'">
      
        <input type="file" id="myfile'.$idpro.'" name="file" style="display: none;" />

                    </form>
                    <a onclick="document.getElementById('.$comoi.'myfile'.$idpro.''.$comoi.').click();">
                        <button style="cursor: pointer; display: flex; width: 130px; height: 30px; justify-content: center;align-items: center;">FOTO </button></a>

                        </td>
                        </tr>
                    </table>'; }
        

                 
                /* modal catelitos  <span class="close'.$idpro.'" style="cursor: pointer;float:right;">Cerrar &times;</span>*/
                    echo'<div id="myModal'.$idpro.'" class="modal">
                    <div class="modal-content" style="text-align:center;">
                    ';
                        include('contccartelito.php');
                    echo'</div>
                    </div>';
                    //if($id_plantilla!='20' && $id_plantilla!='99'){
                    if($id_plantilla!='99'){
                   echo' <script>
                
                    var btn'.$idpro.' = document.getElementById('.$comoi.'myBtn'.$idpro.''.$comoi.');
                    var modal'.$idpro.' = document.getElementById('.$comoi.'myModal'.$idpro.''.$comoi.');
                
                    var span'.$idpro.' = document.getElementsByClassName("close'.$idpro.'")[0];
                    

                    btn'.$idpro.'.onclick = function() {
                    modal'.$idpro.'.style.display = "block";
                    }
                    

                    
                    
                    window.onclick = function(event) {
                    if (event.target == modal'.$idpro.') {
                        modal'.$idpro.'.style.display = "none";
                    }
                    }
                    </script>';
                }

             /*    span'.$idpro.'.onclick = function() {
                    modal'.$idpro.'.style.display = "none";


                    }    $sqleditlispro=mysqli_query($rjdhfbpqj,"SELECT * FROM editlispro Where id_producto = '$idpro' and tipolist = '0' and fecha = '$fechalista'");
                    if ($roweditlispro = mysqli_fetch_array($sqleditlispro)){
                        $id_plantilla = $roweditlispro["id_plantilla"];}
                        else{
                            
                            $sqleditlispro=mysqli_query($rjdhfbpqj,"SELECT * FROM editlispro Where id_producto = '$idpro' and tipolist = '0'");
                    if ($roweditlispro = mysqli_fetch_array($sqleditlispro)){
                        $id_plantilla = $roweditlispro["id_plantilla"];}else{
                            
                            
                            if($mga !=null && $mga !='0' && $mga > '0' && !empty($mga)){$id_plantilla='7';}else{
                            $id_plantilla='99';}}
                            }



       if( $id_plantilla=='20'){
       $nomostitu=$nomostitu+1; } */

        
                            if($id_plantilla!='7'){
                                $mpbb = $mpb  * $kilopresd;
                                $mpcb = $mpc  * $kilopresd;
                                $mpdb = $mpd  * $kilopresd;
                                $mpeb = $mpe  * $kilopresd;
                              }else{
                                
                      
                                if($mub=='1'){$mpbbcantk = $mkb  * $kilopresd; $mpbb = $mpb  * $mpbbcantk;}else{$mpbb = $mpb  * $mkb; }
                                if($muc=='1'){$mpcbcantk = $mkc  * $kilopresd; $mpcb = $mpc  * $mpcbcantk;}else{$mpcb = $mpc  * $mkc;}
                                if($mud=='1'){$mpdbcantk = $mkd  * $kilopresd; $mpdb = $mpd  * $mpdbcantk;}else{$mpdb = $mpd  * $mkd;}
                                if($mue=='1'){$mpebcantk = $mke  * $kilopresd; $mpeb = $mpe  * $mpebcantk;}else{$mpeb = $mpe  * $mke;}
                              }
                                  
                               $mpa = number_format($mpa, 0, '.', ',');
                                  $mkb = number_format($mkb, 0, '.', ',');
                                  $mpb = number_format($mpb, 0, '.', ',');
                                  $mkc = number_format($mkc, 0, '.', ',');
                                  $mpc = number_format($mpc, 0, '.', ',');
                                  $mkd = number_format($mkd, 0, '.', ',');
                                  $mpd = number_format($mpd, 0, '.', ',');  
                                  $mke = number_format($mke, 0, '.', ',');
                                  $mpe = number_format($mpe, 0, '.', ',');
                                  
                                  $mpba = number_format($mpba, 0, '.', ',');
                                  $mpbb = number_format($mpbb, 0, '.', ',');
                                  $mpcb = number_format($mpcb, 0, '.', ',');
                                  $mpdb = number_format($mpdb, 0, '.', ',');
                                  $mpeb = number_format($mpeb, 0, '.', ',');
                            
            /* modal de las plantillas */
            echo'<div id="myModalp'.$idpro.'" class="modal">
            <div class="modal-content">
            <span class="closep'.$idpro.'" style="cursor: pointer;float:right;">Cerrar &times;</span><br><br>';
            include('displantillas.php');
            echo'</div>
            </div>';
            if($id_plantilla!='99'){
            echo'<script>

            var btnp'.$idpro.' = document.getElementById('.$comoi.'myBtnp'.$idpro.''.$comoi.');
            var modalp'.$idpro.' = document.getElementById('.$comoi.'myModalp'.$idpro.''.$comoi.');

            var spanp'.$idpro.' = document.getElementsByClassName("closep'.$idpro.'")[0];


            btnp'.$idpro.'.onclick = function() {
            modalp'.$idpro.'.style.display = "block";
            }


            spanp'.$idpro.'.onclick = function() {
            modalp'.$idpro.'.style.display = "none";
            }

            window.onclick = function(event) {
            if (event.target == modalp'.$idpro.') {
            modalp'.$idpro.'.style.display = "none";
            }
            }
            </script>';

        }
                   /* me fijo si hay carteles */

                   $sqleditlisproc=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where id_producto = '$idpro' and tipolista = '0' and fecha = '$fechalista'");
                   if ($roweditlisprod = mysqli_fetch_array($sqleditlisproc)){
                       $fechalistaca = $roweditlisprod["fecha"];}
                       else{

                           $sqleditlisprocb=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where id_producto = '$idpro' and tipolista = '0'");
                           if ($roweditlisprodb = mysqli_fetch_array($sqleditlisprocb)){
                               $fechalistaca = $roweditlisprodb["fecha"];}

                             

                       }




                    echo' <td>
                    
                    <div id="resultadoplantilla'.$idpro.'">';

                    if($id_plantilla!='14'){
                        echo'<a href="../productos?buscar='.$idpro.'&jfnddhom='.$idcodrt.'&pagina='.$pagina.'&busquedads='.$busquedads.'"  target="_parent" style="text-decoration: none;">';
                    
            include('plantilla'.$id_plantilla.'.php');
            echo'</a>';
                    

                echo' </div>';
                   
                
              
          
             echo'   </td>
                    </tr>
                </table> ';}
              
       }
       if($id_plantilla!='99'){
            echo' <script>
            function mostrarTabla'.$idpro.'(id) {
            var tabla'.$idpro.' = document.getElementById(id);
            tabla'.$idpro.'.style.display = "block";
            }

            function ocultarTabla'.$idpro.'(id) {
            var tabla'.$idpro.' = document.getElementById(id);
            tabla'.$idpro.'.style.display = "none";
            }
            </script>';
        }
           
            /*     if($id_plantilla=='20'){

                   
                         
                         include('plantilla20.php');
     
                     } */
                    // sleep(1);
             
    }   
    
    
 /* if($id_plantilla=='20'){echo '</table>';} */
   

}

?>

<br><br>



<!-- lista productos fin -->
           
<style>
.pagination-container {
    max-width: 20cm;
    margin: 0 auto;
}

/* Estilos de la paginación */
.pagination {  background-color: white;
    list-style-type: none;
    display: flex;
    flex-wrap: wrap; /* Esto permite que los elementos se muestren en varias líneas si es necesario */
    justify-content: center;
    padding: 0;
}

.pagination li {
    background-color: white;
    margin-right: 5px;
    margin-bottom: 20px; /* Añadimos un margen inferior para separar los elementos verticalmente */
    width: auto; /* Cambiamos el ancho a automático para que se adapten al contenido */
    white-space: nowrap; /* Evita que el texto se divida en varias líneas */
}

.pagination li a {
    color: #333;
    text-decoration: none;
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.pagination li.active a {
    background-color: #007bff;
    color: #fff;
    border: 1px solid #007bff;
}

</style>



<div class="pagination-container">
    <ul class="pagination">
        <?php
        if(($pagina - 1) > 0) { 
            echo "<li><a class='pagination-item' href='../listadeprecio/listaedit?jfndhom=$idcodrt&pagina=".($pagina-1)."&busqueda=$busquedads#ancla'><</a></li>"; 
        }

        if ($total_paginas > 1){
            for ($i=1;$i<=$total_paginas;$i++){
                if ($pagina == $i) {
                    echo "<li class='active'><a class='pagination-item' href='../listadeprecio/listaedit?jfndhom=$idcodrt&pagina=" . $i . "&busqueda=$busquedads#ancla'>";
                     if($TAMANO_PAGINA=='1'){ $idsds=$i-1;
                        $sqlcatedxgorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias  ORDER BY `categorias`.`position` ASC limit $idsds,1");
                        while ($rowcatedsdrias = mysqli_fetch_array($sqlcatedxgorias)) {echo''.$rowcatedsdrias['nombre'].'</a></li>';}
                       }
                } else {
                    echo "<li><a class='pagination-item' href='../listadeprecio/listaedit?jfndhom=$idcodrt&pagina=" . $i . "&busqueda=$busquedads#ancla'>"  ;
                    if($TAMANO_PAGINA=='1'){ $idsds=$i-1;
                        $sqlcatedxgorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias  ORDER BY `categorias`.`position` ASC limit $idsds,1");
                        while ($rowcatedsdrias = mysqli_fetch_array($sqlcatedxgorias)) {echo''.$rowcatedsdrias['nombre'].'</a></li>';}
                       }
                }
            }
        }

        if(($pagina + 1) <= $total_paginas) { 
            echo "<li><a class='pagination-item' href='../listadeprecio/listaedit?jfndhom=$idcodrt&pagina=".($pagina+1)."&busqueda=$busquedads#ancla'>></a></li>"; 
        }
        ?>
    </ul>
</div>

            </td>
        </tr>
    </table>
    <?php
/* 
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME,"es_RA");
$horadd = date("H:i:s");
$iptrr = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['REMOTE_ADDR'];

 $sqlvisualizacion = "INSERT INTO `visualizacion` (ip, fecha, hora, quin, origen, ordigen) VALUES ('$iptrr', '$fechahoy', '$horadd', '$quin', 'lista', '$ordigen');";
 mysqli_query($rjdhfbpqj, $sqlvisualizacion) or die(mysqli_error($rjdhfbpqj));
  */
?>
    
    <br><br><br><br><br><br>
    </td>
    </tr>
    </table>
    <script>
        $('#myfile').change(function() {
            // submit the form
            $('#form').submit();
        });

        $(document).ready(function(e) {
            $("#form").on('submit', function(e) {



                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'cargar_imagen.php?idlis=<?= $idcodrt ?>',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(msg) {
                        $('.statusMsg').html('');

                        $('#form').css("opacity", "");
                        $(".submitBtn").removeAttr("disabled");
                        $("#muestroaca").html(msg);
                    }
                });
            });


        });
    </script>


<script>
    // Función para recargar la página
    function recargarPagina() {
        location.reload();
    }

</script>
</body>