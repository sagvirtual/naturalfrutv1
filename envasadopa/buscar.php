

    <?php
    include('../f54du60ig65.php');
    $producto = $_POST['producto'];
    $producto =str_replace(' ', '%', $producto);
    $numero = $_POST['numero'];
    $unidad = $_POST['unidad'];
    if (!empty($producto)) {
        $sqlorden = mysqli_query($rjdhfbpqj, "SELECT DISTINCT producto FROM itemenvas Where producto LIKE '%$producto%' ORDER BY `itemenvas`.`producto` ASC");
        while ($roworden = mysqli_fetch_array($sqlorden)) {


            echo '
           <a href="index.php?producto=' . $roworden["producto"] . '&numero='.$_POST['numero'].'&unidad='.$_POST['unidad'].'" class="list-group-item list-group-item-action"><strong>' . $roworden["producto"] . '</strong></a>
            ';
        }
    }
    ?>


