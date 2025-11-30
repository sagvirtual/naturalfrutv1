<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');
include('template/cabezal.php');

if (isset($_POST['update'])) {
    foreach ($_POST['positions'] as $position) {
        $index = $position[0];
        $newPosition = $position[1];

        $rjdhfbpqj->query("UPDATE coddeposi SET position = '$newPosition' WHERE id='$index'");
    }

    exit('success');
}

?>

<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="dripicons-clipboard"></i> Listado de Nombres Ubicaciónes</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/ldeposito/"><button class="btn btn-primary"><i class="dripicons-clipboard"></i> Agregar Ubicaciónes</button></a>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">

        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
       
                <div class="card-body">
                    <div class="table-responsive">
                    <?php
// Parámetros de paginación
$limit = 80; // Número de resultados por página LIMIT $limit OFFSET $offset
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Consulta SQL con LIMIT y OFFSET
$sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi ORDER BY `position` ASC ");

// Calcular el número total de resultados
$total_results = mysqli_num_rows(mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi"));
$total_pages = ceil($total_results / $limit);
?>

<table class="table table-borderless">
    <thead> 
        <tr>
            <th>Nombre</th>
            <th>Codigo de barra</th>
            <th>Estado Ubi.</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($rowrubros = mysqli_fetch_array($sqlrubros)) {
            $id = $rowrubros["id"];
            $codigo = $rowrubros["codigo"];
            $idcod = base64_encode($id);
            $estado = $rowrubros["estado"];
            $idcodbarr = $rowrubros["id"] + 678000000000;

            $fraccionar = $rowrubros["fraccionar"];
            $selca = ($fraccionar == '0') ? "Fija" : "Temporal";

            if ($codigo == '0') {
                $sqlrubrosd = "Update coddeposi Set codigo='$idcodbarr' Where id = '$id'";
                mysqli_query($rjdhfbpqj, $sqlrubrosd) or die(mysqli_error($rjdhfbpqj));
                $codigo = $idcodbarr;
            }

            echo '<tr data-index="' . $rowrubros['id'] . '" data-position="' . $rowrubros['position'] . '" style="cursor:move;">
                    <td style="color: black;">' . $rowrubros["nombre"] . ' </td>
                    <td style="color: black;">
                        <a href="/ldeposito/codigo_depopsito_pdf.php?jfndhom=' . $idcod . '" class="btn btn-dark-rgba" title="Descargar Codigo"><i class="fa fa-barcode"></i> ' . $codigo . '# </a>
                    </td>
                    <td style="color: black;">' . $selca . ' </td>
                    <td>
                        <div class="button-list">
                            <a href="/ldeposito/?jfndhom=' . $idcod . '" class="btn btn-success-rgba" title="Editar Categoría"><i class="ri-pencil-line"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;';
            
            $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito Where id_destino='$codigo'");
            if (!$rowproductosv = mysqli_fetch_array($sqlproductosv)) {
                echo '<a href="javascript:eliminar(\'/ldeposito/mlkdths?juhytm=' . $idcod . '\')" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>';
            }

            echo '</div>
                  </td>
                  </tr>';
        } 
        mysqli_close($rjdhfbpqj);
        ?>
    </tbody>
</table>
<? if(1==2){?>
<!-- Controles de paginación -->
<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php if ($page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
        <?php if ($page < $total_pages): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

<?}?>

                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/plugins/switchery/switchery.min.js"></script>
        <!-- End col -->















        <?php include('template/pie.php'); ?>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('table tbody').sortable({
                    update: function(event, ui) {
                        $(this).children().each(function(index) {
                            if ($(this).attr('data-position') != (index + 1)) {
                                $(this).attr('data-position', (index + 1)).addClass('updated');
                            }
                        });

                        saveNewPositions();
                    }
                });
            });

            function saveNewPositions() {
                var positions = [];
                $('.updated').each(function() {
                    positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                    $(this).removeClass('updated');
                });

                $.ajax({
                    url: 'nomubdeposito.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        update: 1,
                        positions: positions
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
        </script>