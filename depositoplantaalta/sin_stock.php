



    <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#sinst" style="float: right;">Sin Stock</button>


    <div id="sinst" class="collapse">


        <div class="card-body">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 20mm;">Fecha </th>
                        <th class="text-center">Productos sin Stock</th>


                    </tr>
                </thead>
                <tbody>

                    <?php

                    //el ultimo dia que encuentro algo le descuento 2 dias
$sqlnrxg = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenbajar  Where fecha<'$fechahoy' and fin='1'  ORDER BY `ordenbajar`.`fecha` DESC");
if ($rowosgd = mysqli_fetch_array($sqlnrxg)) {$sumodifat=$rowosgd['fecha'];}



                    $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT DISTINCT producto,fecha FROM itembajar Where fecha >= '$sumodifat' and  sinstock = '1' ORDER BY `itembajar`.`fecha` ASC");
                    while ($rowordentd = mysqli_fetch_array($sqlordenr)) {


                        $sinstockd = $rowordentd['sinstock'];



                        echo '
                
                <tr>
                <td class="text-center" style="place-items: center;">' . date('d/m', strtotime($rowordentd['fecha'])) . '</td>
                <td  style="padding-left: 2mm;">' . $rowordentd['producto'] . '</td>
              
                
                 </tr>
                
                ';
                    }

                    ?>

                    <br>
                </tbody>
            </table>


        </div>
    </div>