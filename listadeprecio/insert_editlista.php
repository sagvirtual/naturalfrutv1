<?php



 include('../f54du60ig65.php');

$idlis=$_POST['idlis'];
$iddecod=base64_decode($idlis);

$fechalis=$_POST['fechalis'];
$comminima=$_POST['comminima'];
$commmenor=$_POST['commmenor'];
$noseac=$_POST['noseac'];
$color1=$_POST['color1'];
$color2=$_POST['color2'];
$color3=$_POST['color3'];
$color4=$_POST['color4'];
$color5=$_POST['color5'];
$color6=$_POST['color6'];
$color7=$_POST['color7'];
$color8=$_POST['color8'];
    
    if(!empty($fechalis)){

        $sqleditlistaw=mysqli_query($rjdhfbpqj,"SELECT * FROM editlista Where id = '$iddecod'");
        if ($roweditlistaw = mysqli_fetch_array($sqleditlistaw)){$tipolista=$roweditlistaw['tipolista'];}

        
        $sqleditlista=mysqli_query($rjdhfbpqj,"SELECT * FROM editlista Where fecha = '$fechalis' and tipolista = '$tipolista'");
        if ($roweditlista = mysqli_fetch_array($sqleditlista)){

            $noupda='1';
           

            echo("<script language='JavaScript' type='text/javascript'>");
            echo("location.href='listaedit?jfndhom=$idlis'");
            echo("</script>");


        }else{  
        $modsql="fecha='".$fechalis."'";}
        
        
       }
    if(!empty($color1)){$modsql="color1='".$color1."'";}
    if(!empty($color2)){$modsql="color2='".$color2."'";}
    if(!empty($color3)){$modsql="color3='".$color3."'";}
    if(!empty($color4)){$modsql="color4='".$color4."'";}
    if(!empty($color5)){$modsql="color5='".$color5."'";}
    if(!empty($color6)){$modsql="color6='".$color6."'";}
    if(!empty($color7)){$modsql="color7='".$color7."'";}
    if(!empty($color8)){$modsql="color8='".$color8."'";}
    if(!empty($comminima)){$modsql="comminima='".$comminima."'";}
    if(!empty($commmenor)){$modsql="commmenor='".$commmenor."'";}
    if(!empty($noseac)){$modsql="noseac='".$noseac."'";}


  
if($noupda!='1'){

$sqleditlista = "Update editlista Set $modsql  Where id = '$iddecod'";
mysqli_query($rjdhfbpqj, $sqleditlista) or die(mysqli_error($rjdhfbpqj));

}


if(!empty($fechalis)){
$fechacod=base64_encode($fechalis);
echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='listaedit?jfndhom=$idlis'");
echo("</script>");
} 
?>