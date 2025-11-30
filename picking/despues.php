<?php include('../f54du60ig65.php');
 $iditem=$_POST['iditem'];
 $idpedido=$_POST['idpedido'];

 $sqenowi = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden='$idpedido' and picking='0' and id !='$iditem'");
 if ($rowoddi = mysqli_fetch_array($sqenowi)) {

  
if(!empty($iditem)){
        $sqlordend = "Update item_orden Set picking='2', pickinicio='00:00:00', pickinfin='00:00:00' Where id='$iditem'";
          mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
      }  

      echo ("<script language='JavaScript' type='text/javascript'>");
          echo ("location.href='index.php?2'");
          echo ("</script>");

}else{



  $sqes = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden='$idpedido' and picking='0'");
          
  $canverifdin = mysqli_num_rows($sqes);
  if ($rowdoddi = mysqli_fetch_array($sqes)) {
    if($canverifdin=='1'){
      $sqlordend = "Update item_orden Set picking='2', pickinicio='00:00:00', pickinfin='00:00:00' Where id='$iditem'";
      mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));



    }
  }

echo ("<script language='JavaScript' type='text/javascript'>");
          echo ("location.href='index.php?12'");
          echo ("</script>");

}

          

