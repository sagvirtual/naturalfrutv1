<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('lusuarios/login.php');


 
 $preparado=$_POST['preparado'];
 $iditemdfd=$_POST['iditem'];
 $horaentrega = date("H:i");


if($preparado=='0'){$nombrenegocio='';$horaentrega=''; $id_usuarioclav=''; $fechaentreg='';}

if($preparado=='9'){
        

        $sqlordenx=mysqli_query($rjdhfbpqj,"SELECT * FROM itembajar Where id_orden = '$iditemdfd' and listo='0'");
        if ($rowordenx = mysqli_fetch_array($sqlordenx)){

                $nosegui="1";


        }else{ $sqlordenx=mysqli_query($rjdhfbpqj,"SELECT * FROM itembajar Where id_orden = '$iditemdfd' and sinstock='1'");
                if ($rowordenx = mysqli_fetch_array($sqlordenx)){
        
                        $preparado='5';
        
        
                }}




}

if($nosegui!="1"){
 $sqlordend = "Update ordenbajar Set preparado='$preparado', usuario='$nombrenegocio', horaentrega='$horaentrega',  fechaentreg='$fechahoy', id_usuarioclav='$id_usuarioclav' Where id = '$iditemdfd'";
mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));


//paso seguimiento
$sqlnum=mysqli_query($rjdhfbpqj,"SELECT * FROM ordenbajar Where id='$iditemdfd' and fin = '1'");
        if ($rownum = mysqli_fetch_array($sqlnum)){$numeroordn=$rownum['numero'];



        $sqla=mysqli_query($rjdhfbpqj,"SELECT * FROM ordenevaa Where numero='$numeroordn' and preparado < 5 and fin = '1'");
        if ($rowa = mysqli_fetch_array($sqla)){

                $nosa="1";

        }else{

                $sqlb=mysqli_query($rjdhfbpqj,"SELECT * FROM ordeneva Where numero='$numeroordn' and preparado < 5 and fin = '1'");
                if ($rowb = mysqli_fetch_array($sqlb)){
                
                        $nosb="1";
                
                
                }else{
                        if($preparado < 2){$colponer='4';}else{$colponer='5';}
                        if($numeroordn !='000'){
                        $sqlc = "Update orden Set col='$colponer' Where id = '$numeroordn' and col!='8'";
                        mysqli_query($rjdhfbpqj, $sqlc) or die(mysqli_error($rjdhfbpqj));
                        }



                }

}
}

///fin



echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='index.php?1=1&modo'");
        echo ("</script>");
 
}else{

        echo'
        
        <script>
        var mensaje = "Falta tachar productos!";
        
        alert(mensaje);</script>
        ';


}
 
?>