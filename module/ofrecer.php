   
               
               <?php if ($sincarga != '78732') {
                $sqlitem_ordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechahoy' and stock='1'");
                if ($rowitem_orden = mysqli_fetch_array($sqlitem_ordenx)) {
                
               ?>
               <div class="card-body">
                
                   <div class="accordion" id="accordionExample">
                       <div class="card">
                           <div class="card-header" id="headingOne">
                               <h2 class="mb-0">
                                   <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">OFRECER PRODUCTO</button>
                               </h2>
                           </div>
                           <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                               


<tbody>


    <?php
    //aca pruebo el otro

    $sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias Where estado = '0' ORDER BY `categorias`.`position` ASC");
    while ($rowcategorias = mysqli_fetch_array($sqlcategorias)) {
        $id_categoria = $rowcategorias["id"];
        $nombrecate = strtoupper($rowcategorias["nombre"]);
        $sqlproductosr = ${"sqlproductos" . $id_categoria};
        $rowproductos = ${"rowproductos" . $id_categoria};
        $rowproductosr = ${"rowproductosr" . $id_categoria};
        $idproduff = ${"idproduff" . $id_categoria};
        $sqlitem_orden = ${"sqlitem_orden" . $id_categoria};
        $sqlitem_ordendis = ${"sqlitem_ordendis" . $id_categoria};


        //fin


        //me fijo si hay item comprados <tr
        $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' ");
        if ($rowproductos = mysqli_fetch_array($sqlproductosr)) {


            //join si el producto esta para el cliente
            $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT e.id, e.categoria, e.position, u.id_producto, u.stock, u.nombre, u.fecha, u.id_proveedor, u.id_orden
            FROM productos e INNER JOIN item_orden u ON e.id = u.id_producto Where u.fecha = '$fechahoy' and categoria='$id_categoria' and stock='1' and id_orden='0'");

            if ($rowproductosre = mysqli_fetch_array($sqlproductosv)) {


                echo '<table class="table table-bordered" style="background-color: black; position:relative; text-align:left;">


                <tr><td  style="background-color: #CBCBCB;"><h5 style="position:relative; top:4px;"><b>' . $nombrecate . ' </b></h5></td></tr>
                
                </table>
                
                <table class="table table-bordered table-hover" style="background-color: #fff; position:relative; top:-10px; text-align:left; height:5px;">
                <tr>
                    
                <th scope="col" style="border-color: black;width: 40px; text-align:center;">Kg.</th>
                <th scope="col" style="border-color: black;text-align:center;">Productos</th>
                <th scope="col" style="border-color: black;text-align:center;">Precio</th>
                </tr>
                ';
            }



            //pongo los item <tr>     

            $sqlproductosrg = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' ORDER BY `productos`.`position` ASC");

            while ($rowproductosrg = mysqli_fetch_array($sqlproductosrg)) {
                $idproduff = $rowproductosrg['id'];
               
               
            

                $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechahoy' and id_producto='$idproduff' and modo='0' and id_orden='0' and stock='1'");
                if ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
                    $nota = $rowitem_orden["nota"];
                    $idite = $rowitem_orden["id"];
                    $id_producto = $rowitem_orden["id_producto"];
                    $id_productocod = base64_encode($id_producto);
                    $idcodp = base64_encode($idite);
                    $precioproav = ${"precioproav" . $rowitem_orden["id"]};
                    $sqlprecioprod = ${"sqlprecioprod" . $rowitem_orden["id"]};
                    $rowprecioprod = ${"rowprecioprod" . $rowitem_orden["id"]};
                    $sqlprecioprod = ${"sqlprecioprod" . $rowitem_orden["id"]};
                    $rowitem_ordenr = ${"rowitem_ordenr" . $rowitem_orden["id"]};
                    $kilotor = ${"kilotor" . $rowitem_orden["id"]};
                    if (!empty($nota)) {
                        $notav = "(" . $nota . ")";
                    } else {
                        $notav = "";
                    }

                    $sqlitem_ordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechahoy' and id_producto='$idproduff' and modo='0' and id_orden='0' and stock='1'");
                    while ($rowitem_ordenr = mysqli_fetch_array($sqlitem_ordenr)) {$kilotor+=$rowitem_ordenr["kilos"];}


                    $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$id_producto' ORDER BY `precioprod`.`id` DESC");
                    if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
                        $kilocajon = $rowprecioprod["kilo"];
                        if($_SESSION['tipo_cliente']=="0"){$precioproav = $rowprecioprod["precio_kiloa"];}
                        if($_SESSION['tipo_cliente']=="1"){$precioproav = $rowprecioprod["precio_kilob"];}
                        if($_SESSION['tipo_cliente']=="2"){$precioproav = $rowprecioprod["precio_kiloc"];}
                    }


                    echo '<tr>
                    <td style="text-align:center;border-color: black;background-color:yellow"><b>' . $kilotor . '</b></td>
                    <td  style="border-color: black;background-color:yellow"><b> <a href="pedir_entrega?jfndhom=' . $idordencod . '&jjdfngh=' . $id_productocod . '">' . $rowitem_orden["nombre"] . '</b> ' . $notav . '
                    <p style="font-size:8pt; position:relative; top:0px;">(Caja x ' . $kilocajon . 'kg.)</a>
                    </p>
                    </td>
                    <td style="text-align:center;border-color: black;background-color:yellow;width: 110px;"><b>' . number_format($precioproav, 0, '', '.') . '</b></td>
                    
                    
                </tr>';
                }




                //fin poner el producto
            }
            echo '</table>';

            //fin item </tr>



        }
    }

    ?>

</tbody>
                           </div>
                       </div>
                   </div>
               </div>
               <?php
                
}}
                
               ?>