<?php include('../template/cabezal.php');
include('../estadoscli/classestadoscli.php');
unset($_SESSION['idcliente']);
unset($_SESSION['dianoms']);
unset($_SESSION['fecharepart']);
unset($_SESSION['id_rubro']);
unset($_SESSION['tipo_cliente']);
unset($_SESSION['id_orden']); 
$id_cliente="42";
?>
 <link href="../assets/css/master.css" rel="stylesheet" type="text/css">

 <script language="JavaScript1.2" type="text/javascript"> 
/*         function eliminar (id) 
        { 
            var statusConfirm = confirm("¿Realmente lo desea borrar?"); 
            if (statusConfirm == true) 
            { 
              	window.location.href=id;
            } 
            else 
            { 
              ("Haces otra cosa"); 
            } 
        }  */
    </script>                

<br>

<br><br>




	

<? estados::debehaber($id_cliente);


?>



<?php include('../template/pie.php');?>