<?php include('../../f54du60ig65.php');
include('../inicio/login.php');
include('../../inicio/login.php');

$buscar = $_POST['buscar'];
$fechaorden = $_POST['fechaorden'];


?>




<table class="table">

    <tbody>

        <?php
  


        $sqljoin = mysqli_query($rjdhfbpqj, "SELECT orden.fecha, orden.id, orden.id_cliente, orden.total, orden.subtotal, clientes.nom_empr, 
                                clientes.address, orden.id, orden.camioneta
                                FROM orden 
                                INNER JOIN clientes ON orden.id_cliente = clientes.id
                                
                                Where orden.camioneta='$id_camioneta' and orden.fecha = '$fechaorden' and finalizada='0' and(orden.id LIKE '%$buscar%' OR orden.id_cliente LIKE '%$buscar%'  OR orden.total LIKE '%$buscar%' OR orden.subtotal LIKE '%$buscar%' OR clientes.address LIKE '%$buscar%' OR clientes.nom_empr LIKE '%$buscar%') ORDER BY `orden`.`fecha` DESC");



        while ($rowcategorias = mysqli_fetch_array($sqljoin)) {
            $id = $rowcategorias["id"];

            
            $mostrarr = ${"mostrarr" . $id};
            $idorden = $rowcategorias["id"];
            $fila = $fila + 1;
            $idcod = base64_encode($id);
            $idordencod = base64_encode($idorden);
            $cliente = $rowcategorias["address"];
            $clientev = strtoupper($cliente);
            $nom_empr = $rowcategorias["nom_empr"];
            $nom_emprv = ucfirst(strtolower($nom_empr));
            if (($fila % 2) == 0) {
                //Es un número par
                $colortr = '#fff';
            } else {
                //Es un número impar
                $colortr = '#F1F1F1';
            }

           


            echo '<tr>';

         




            echo '
                                        
                                            <td style="color: black; padding: 5 5px 5px 5px; background-color:' . $colortr . '"><b>' . $clientev . '</b><br> (' . $nom_emprv . ') </td>
                                                        
                                                    <td style="color: black; background-color:' . $colortr . '"> 
                                                    <div class="button-list">
                                                            <a href="../printcaja?jfndhom=' . $idordencod . '&modoprint=1"  class="btn btn-dark-rgba"> #' . $idorden . '</a> 


                                                        

                                                    </td> 
                                                </tr>';
        }

        ?>
    </tbody>
</table>