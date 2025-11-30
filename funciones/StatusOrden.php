<?php
 function StatusOrden($rjdhfbpqj,$id_orden){

$sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id = '$id_orden' and col !='0' and col!='32'");
 if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {  
    $col = $rowusuarios["col"];    
         
  
 }

 switch ($col) {

    case 0:
        $status='<p><span class="badge bg-secondary">Ingresando</span></p>';
       
        break;  
    case 1:
        $status='<p><span class="badge" style="background-color: #9B290A; color:white">Sin Confirmar</span></p>';
       
        break;    
    case 2:
        $status='<p><span class="badge " style="background-color: #1A6B9D; color:white">Confirmado</span></p>';
       
        break;
    case 3:
        $status='<p><span class="badge " style="background-color: #1C7002; color:white">Preparando</span></p>';
       
            break;    
    case 4:
        $status='<p><span class="badge " style="background-color: #557B29; color:white">Pidiendo</span></p>';
            
            break;
    case 5:
            $status='<p><span class="badge " style="background-color: #7B00AC; color:white">Controlando</span></p>';
             break;
             case 6:
                $status='<p><span class="badge " style="background-color: #EDFF0A; color:black">Retiro</span></p>';
       
                break;
    case 7:
        $status='<p><span class="badge " style="background-color: #FBCE0B; color:black">Despacho</span></p>';
       
            break;
            case 8:
                $status='<p><span class="badge bg-secondary">Concretado</span></p>';
              
                break;
                case 7:
                    $status='<p><span class="badge bg-secondary">Finalizado</span></p>';
                    break;
                    case 9:
                        $status='<p><span class="badge"style="background-color:black; color:white">En Ruta</span></p>';
                        break;
                        case 31:
                            $status='<p><span class="badge"  style="background-color:blue; color:white">Entregada</span></p>';
                            break;
                            case 32:
                                $status='<p><span class="badge"  style="background-color:red; color:black">Cancelada</span></p>';
                                break;

}
 return $status;
 }
?>
