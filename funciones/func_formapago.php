<?php
function formDePag($rjdhfbpqj, $id_cliente, $id_orden)
{

    $sql_check = mysqli_query($rjdhfbpqj, "SELECT id,id_cliente FROM formapagor WHERE id_orden ='$id_orden' and id_cliente = '$id_cliente'");

    if (mysqli_num_rows($sql_check) > 0) {
        $sqlver = "formapagor";
        $sqlvewhw = "id_orden = '" . $id_orden . "' and ";
    } else {
        $sqlver = "formapago";
        $sqlvewhw = "";
    }


    // Verificar si ya existe el registro
    $sql_check = mysqli_query($rjdhfbpqj, "SELECT * FROM $sqlver WHERE $sqlvewhw id_cliente = '$id_cliente'");

    while ($row = mysqli_fetch_array($sql_check)) {

        $efectivo = $row['efectivo'];
        $transferencia = $row['Transferencia'];
        $cheque = $row['Cheque'];
        $echeq = $row['Echeq'];

        if ($efectivo == 1) {
            $nombre = "[Efectivo] ";
        }
        if ($transferencia == 1) {
            $nombre .= "[Transferencia] ";
        }
        if ($cheque == 1) {
            $nombre .= "[Cheque] ";
        }
        if ($echeq == 1) {
            $nombre .= "[Echeq] ";
        }
    }
    return $nombre;
}


function formDePagSelc($rjdhfbpqj, $id_cliente, $id_orden)
{

    $sql_check = mysqli_query($rjdhfbpqj, "SELECT id,id_cliente FROM formapagor WHERE id_orden ='$id_orden' and id_cliente = '$id_cliente'");

    if (mysqli_num_rows($sql_check) > 0) {
        $sqlver = "formapagor";
        $sqlvewhw = "id_orden = '" . $id_orden . "' and ";
    } else {
        $sqlver = "formapago";
        $sqlvewhw = "";
    }
    $comilla = "'";
    // Verificar si ya existe el registro
    $sql_check = mysqli_query($rjdhfbpqj, "SELECT * FROM $sqlver WHERE  $sqlvewhw id_cliente = '$id_cliente'");

    while ($row = mysqli_fetch_array($sql_check)) {

        $efectivo = $row['efectivo'];
        $transferencia = $row['Transferencia'];
        $cheque = $row['Cheque'];
        $echeq = $row['Echeq'];

        if ($efectivo == 1) {
            $checkedEf = "checked";
        } else {
            $checkedEf = "";
        }
        if ($transferencia == 1) {
            $checkedTr = "checked";
        } else {
            $checkedTr = "";
        }
        if ($cheque == 1) {
            $checkedChe = "checked";
        } else {
            $checkedChe = "";
        }
        if ($echeq == 1) {
            $checkedEche = "checked";
        } else {
            $checkedEche = "";
        }
    }

    echo '<div class="alert alert-dark" style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
    <b>Forma de Pago:</b>
    ';

    // Efectivo
    echo '<div class="form-group form-check" style="margin:0;">
            <input type="checkbox" class="form-check-input" name="ef' . $row["id"] . '" value="1"
                onclick="ajax_formadepago(
                    ' . $comilla . $row["id"] . $comilla . ',
                    $(' . $comilla . 'input:checkbox[name=ef' . $row["id"] . ']:checked' . $comilla . ').val(),
                    $(' . $comilla . 'input:checkbox[name=tr' . $row["id"] . ']:checked' . $comilla . ').val(),
                    $(' . $comilla . 'input:checkbox[name=che' . $row["id"] . ']:checked' . $comilla . ').val(),
                    $(' . $comilla . 'input:checkbox[name=eche' . $row["id"] . ']:checked' . $comilla . ').val()
                );" ' . $checkedEf . ' tabindex="-1">
            <label class="form-check-label">Efectivo</label>
        </div>';

    // Transferencia
    echo '<div class="form-group form-check" style="margin:0;">
            <input type="checkbox" class="form-check-input" name="tr' . $row["id"] . '" value="1"
                onclick="ajax_formadepago(
                    ' . $comilla . $row["id"] . $comilla . ',
                    $(' . $comilla . 'input:checkbox[name=ef' . $row["id"] . ']:checked' . $comilla . ').val(),
                    $(' . $comilla . 'input:checkbox[name=tr' . $row["id"] . ']:checked' . $comilla . ').val(),
                    $(' . $comilla . 'input:checkbox[name=che' . $row["id"] . ']:checked' . $comilla . ').val(),
                    $(' . $comilla . 'input:checkbox[name=eche' . $row["id"] . ']:checked' . $comilla . ').val()
                );" ' . $checkedTr . ' tabindex="-1">
            <label class="form-check-label">Transferencia</label>
        </div>';

    // Cheque
    echo '<div class="form-group form-check" style="margin:0;">
            <input type="checkbox" class="form-check-input" name="che' . $row["id"] . '" value="1"
                onclick="ajax_formadepago(
                    ' . $comilla . $row["id"] . $comilla . ',
                    $(' . $comilla . 'input:checkbox[name=ef' . $row["id"] . ']:checked' . $comilla . ').val(),
                    $(' . $comilla . 'input:checkbox[name=tr' . $row["id"] . ']:checked' . $comilla . ').val(),
                    $(' . $comilla . 'input:checkbox[name=che' . $row["id"] . ']:checked' . $comilla . ').val(),
                    $(' . $comilla . 'input:checkbox[name=eche' . $row["id"] . ']:checked' . $comilla . ').val()
                );" ' . $checkedChe . ' tabindex="-1">
            <label class="form-check-label">Cheque</label>
        </div>';

    // Echeq
    echo '<div class="form-group form-check" style="margin:0;">
            <input type="checkbox" class="form-check-input" name="eche' . $row["id"] . '" value="1"
                onclick="ajax_formadepago(
                    ' . $comilla . $row["id"] . $comilla . ',
                    $(' . $comilla . 'input:checkbox[name=ef' . $row["id"] . ']:checked' . $comilla . ').val(),
                    $(' . $comilla . 'input:checkbox[name=tr' . $row["id"] . ']:checked' . $comilla . ').val(),
                    $(' . $comilla . 'input:checkbox[name=che' . $row["id"] . ']:checked' . $comilla . ').val(),
                    $(' . $comilla . 'input:checkbox[name=eche' . $row["id"] . ']:checked' . $comilla . ').val()
                );" ' . $checkedEche . ' tabindex="-1">
            <label class="form-check-label">Echeq</label>
        </div>';

    echo '</div>'; // cierre de línea
}
