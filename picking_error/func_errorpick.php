
<?php function error_picking($rjdhfbpqj, $id_orden, $id_producto)
{
    $sqlsel = mysqli_query($rjdhfbpqj, "SELECT id_resp_error FROM picking_error WHERE id_producto='$id_producto' AND id_orden='$id_orden'");
    if ($row = mysqli_fetch_array($sqlsel)) {
        $id_motivo_sel = (int)$row['id_resp_error'];
    } else {
        $id_motivo_sel = 0;
    }
    return $id_motivo_sel;
}


function selecterroomot($rjdhfbpqj, $id_orden, $id_producto, $tipo_usuario)
{
    if ($tipo_usuario != 30) {
        $bloc = "disabled";
    } else {
        $bloc = "";
    }
    $id_motivo_selv = error_picking($rjdhfbpqj, $id_orden, $id_producto);

    $comomilla = "'";
    echo '
<select  class="form-select"  style="color:red;" name="id_resp_error' . $id_producto . '" id="id_resp_error' . $id_producto . '" onchange="guardarPickingMotivo(' . $comomilla . '' . $id_producto . '' . $comomilla . ')" ' . $bloc . '>
   <option value="0"></option>';

    echo '<option value="99"';
    if ($id_motivo_selv == 99) {
        echo 'selected';
    };
    echo '>OK</option>';

    echo '<option value="34"';
    if ($id_motivo_selv == 34) {
        echo 'selected';
    };
    echo '>Picking</option>';

    echo ' <option value="29"';
    if ($id_motivo_selv == 29) {
        echo 'selected';
    };
    echo '>DEP. PA</option>';


    echo ' <option value="22"';
    if ($id_motivo_selv == 22) {
        echo 'selected';
    };
    echo '>Env. PA</option>';

    echo '<option value="21"';
    if ($id_motivo_selv == 21) {
        echo 'selected';
    };
    echo '>Env. PB</option>';

    echo ' <option value="30"';
    if ($id_motivo_selv == 30) {
        echo 'selected';
    };
    echo '>Control</option>';

    echo ' <option value="1"';
    if ($id_motivo_selv == 1) {
        echo 'selected';
    };
    echo '>Modif.</option>';
    echo ' </select>';
}
?>