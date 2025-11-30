<?php
 function TipoUsuario($rjdhfbpqj,$id_usuario){
$sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where  id = '$id_usuario'");
 if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {  
         $tipo_cliente = $rowusuarios["tipo_cliente"];    
         } 
           switch ($tipo_cliente) {
            case "0":
                $tiposecto = "General";
                break;
            case "3":
                $tiposecto = "Ventas";
                break;
            case "1":
                $tiposecto = "Administración";
                break;
            case "30":
                $tiposecto = "Preparación de Pedidos";
                break;
            case "31":
                $tiposecto = "Recepción de Pedidos";
                break;
            case "2":
                $tiposecto = "Gestíon de Deposito";
                break;
            case "21":
                $tiposecto = "Envasado Planta Baja";
                break;
            case "22":
                $tiposecto = "Envasado Planta Alta";
                break;
            case "27":
                $tiposecto = "Reparto";
                break;        
            case "33":
                $tiposecto = "Jefa Ventas";
                break;
            case "34":
                    $tiposecto = "Picking";
                    break;
            case "29":
                $tiposecto = "Dep. Planta Alta";
                break;       
                case "37":
                $tiposecto = "Tesorería";
                break;
                case "56":
                    $tiposecto = "Inventario";
                    break;
                    case "57":
                        $tiposecto = "Stock";
                        break;
            default:
                // Manejo de tipo de usuario desconocido
                $tiposecto = "Error";
                exit;
        }
 return $tiposecto;
 }
?>