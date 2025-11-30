<?php
 


 if($_SESSION['tipo']=="30"){
/*     echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='/preparacionpedidos'");
    echo("</script>"); */
 }

 if($_SESSION['tipo']=="31"){$tiposecto="Recepción&nbsp;de&nbsp;Pedidos";}

 if($_SESSION['tipo']=="2"){$tiposecto="/module";}

 if($_SESSION['tipo']=="21"){     
    echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='/envasadopb'");
    echo("</script>");
}

 if($_SESSION['tipo']=="22"){
    echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='/envasadopa'");
    echo("</script>");
 }

 if($_SESSION['tipo']=="27"){     
    echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='/armadopedidos'");
    echo("</script>");
}

 if($_SESSION['tipo']=="29" && $id_usuarioclav!="40"){ 
    echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='/depositoplantaalta'");
    echo("</script>");
 } 
 if($_SESSION['tipo']=="3"){     
   echo("<script language='JavaScript' type='text/javascript'>");
   echo("location.href='/'");
   echo("</script>");
}

?>