<?php include('../f54du60ig65.php');
// ajax/guarda_notacli.php
//header('Content-Type: application/json; charset=utf-8');

include('../lusuarios/login.php'); // si esto te redirige, el front verá HTML


function historialconver($rjdhfbpqj, $id_clienteint)
{
    $comilla = "'";
    echo '<div class="accordion accordion-outline" id="haccordionoutline' . $id_clienteint . '">
        <div id="hcollapseOneoutline'  . $id_clienteint  . '" class="collapse" aria-labelledby="headingOneoutline" data-parent="#haccordionoutline'  . $id_clienteint  . '">
            <div class="card-body">
            ';

    $sqlnota = mysqli_query($rjdhfbpqj, "SELECT * FROM notacli WHERE id_cliente = '$id_clienteint'  ORDER BY id DESC");
    while ($rnotas = mysqli_fetch_array($sqlnota)) {
        //if ($rnotas['nota'] != "") {
        $idnota = $rnotas['id'];
        $fecha_action = $rnotas['fecha_action'];
        $nombrearchivo = $rnotas['mime'];
        if ($nombrearchivo != "") {

            $archivo = '
            Descargar: <a href="/flujocompra/' . $idnota . '_' . $nombrearchivo . '" target="_blank" download>
            
            ' . $nombrearchivo . '</a>';
        } else {
            $archivo = "ss";
        }

        // Separar fecha y hora
        $fechasep = explode(' ', $fecha_action);

        $fechabien = date('d/m/Y', strtotime($fechasep[0]));

        $notaver = $rnotas['nota'] . "<br>";
        echo '
        
        <div class="alert-list">
                                    <div class="alert alert-dark" role="alert">
                                      <p> ' . $notaver . '</p>
                                  ' . $archivo . '
                                      <p  style="float:right;color:grey;">' . $fechabien . ' ' . $fechasep[1] . ' hs.</p>
                                    </div>                                    
                                </div>
          
        
       ';
        // }
    }


    echo '
                <input type="hidden" class="id_cliente" value="' . $id_clienteint . '">
          

                <div class="form-group">
                    <textarea class="form-control" id="nota' . $id_clienteint . '" rows="3" placeholder="Cargar Nota o Conversación"></textarea>
                </div>

                <div class="form-group mb-0">
                    <input type="file" class="form-control-file" id="archinota' . $id_clienteint . '" 
                           accept=".txt,.jpg,.jpeg,.png,.mpg,.opus,.pdf">
                    <small class="text-muted">Formatos: txt, jpg, png, mpg, opus, pdf. Máx: 5MB.</small>
                </div>
                <br>

                <div class="form-group text-center">
                    <button type="button" class="btn btn-primary btn-guardar-nota"
                       onclick="ajax_cargarnota(' . $comilla . ''  . $id_clienteint  . '' . $comilla . ')">Guardar</button>
                </div>

                <div class="alert mt-2" style="display:none;"></div>
            </div>
            <br>
        </div>';


    echo '</div>';
}


$id_cliente = $_POST['idcliente'];
$nota = $_POST['nota'];
$archinota = $_POST['archinota'];


/* function jexit($ok, $msg = '', $http = 200, $extra = [])
{
    http_response_code($http);
    echo json_encode(array_merge(['ok' => $ok, 'msg' => $msg], $extra));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jexit(false, 'Método no permitido', 405);
} */

/* 
if ($id_cliente <= 0) jexit(false, 'Falta id_cliente', 400);
if ($id_cliente   <  0) jexit(false, 'id_cliente inválido', 400);
if ($nota === '' && empty($_FILES['archinota'])) jexit(false, 'Nada para guardar', 400);

// Validar límites del servidor (opcional, preventivo)
$ini_upload = ini_get('upload_max_filesize');
$ini_post   = ini_get('post_max_size');

$dirBase = __DIR__ . '../flujocompra/';
if (!is_dir($dirBase) && !@mkdir($dirBase, 0775, true)) {
    jexit(false, 'No se pudo crear carpeta de uploads', 500);
}

$archivo_ruta = '';
$archivo_mime = '';
$archivo_peso = 0;

if (isset($_FILES['archinota']) && $_FILES['archinota']['error'] !== UPLOAD_ERR_NO_FILE) {

    if ($_FILES['archinota']['error'] !== UPLOAD_ERR_OK) {
        jexit(false, 'Error al subir el archivo (code ' . $_FILES['archinota']['error'] . ')', 400);
    }
    if ($_FILES['archinota']['size'] > 5 * 1024 * 1024) {
        jexit(false, 'El archivo supera los 5MB', 400);
    }

    $nombreOriginal = $_FILES['archinota']['name'];
    $ext = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));
    $permitidas = ['txt', 'jpg', 'jpeg', 'png', 'mpg', 'opus', 'pdf'];
    if (!in_array($ext, $permitidas, true)) {
        jexit(false, 'Formato no permitido', 400);
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime  = $finfo->file($_FILES['archinota']['tmp_name']);

    $uniq = date('Ymd_His') . '_' . substr(md5(uniqid('', true)), 0, 8);
    $destFilename = $uniq . '.' . $ext;
    $destPath     = $dirBase . $destFilename;

    if (!move_uploaded_file($_FILES['archinota']['tmp_name'], $destPath)) {
        jexit(false, 'No se pudo guardar el archivo', 500);
    }

    $archivo_ruta = '/flujocompra/' . $destFilename;
    $archivo_mime = $mime ?: '';
    $archivo_peso = intval($_FILES['archinota']['size']);
} */

// INSERT







$notaEsc = mysqli_real_escape_string($rjdhfbpqj, $nota);
/* $archivo_rutaEsc = mysqli_real_escape_string($rjdhfbpqj, $archivo_ruta);
$archivo_mimeEsc = mysqli_real_escape_string($rjdhfbpqj, $archivo_mime);
 */
if ($id_cliente > 0 && ($notaEsc != "" || $_FILES["archinota"]["name"] != "")) {


    /*   $archivo_rutaEsc = "foto" . $id_cliente;
    $filev = $_FILES["archinota"]["tmp_name"];
    if ($fileexten == "image/png" || $fileexten == "image/jpg" || $fileexten == "image/jpeg") {
        move_uploaded_file($filev, $idfoto);
        chmod($idfoto, 0777);
    } */

    $nombrearchico = basename($_FILES['archinota']['name']);

    $sql = "INSERT INTO notacli (id_cliente, nota, archivo, mime, peso, responsable,fecha)
        VALUES ('$id_cliente', '$notaEsc', '$archivo_rutaEsc', '$nombrearchico', '$archivo_peso', '$id_usuarioclav', NOW())";
    mysqli_query($rjdhfbpqj, $sql) or die(mysqli_error($rjdhfbpqj));
    $id_ordenfinal = mysqli_insert_id($rjdhfbpqj);
    /* if (!mysqli_query($rjdhfbpqj, $sql)) {
    if ($archivo_ruta && file_exists($dirBase . basename($archivo_ruta))) {
        @unlink($dirBase . basename($archivo_ruta));
    }
    jexit(false, 'DB: ' . mysqli_error($rjdhfbpqj), 500);
}




jexit(true, 'OK', 200); */

    $permitidos = ['txt', 'jpg', 'jpeg', 'png', 'mpg', 'opus', 'pdf'];

    if (!empty($_FILES['archinota']['name'])) {
        $tmp = $_FILES['archinota']['tmp_name'];
        $nombre = basename($_FILES['archinota']['name']);

        $ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

        if (!in_array($ext, $permitidos)) {
            http_response_code(400);
            exit('Tipo de archivo no permitido');
        }


        $destino = $id_ordenfinal . "_" . $nombre;
        if (!move_uploaded_file($tmp, $destino)) {
            http_response_code(400);
            exit('No se pudo guardar el archivo');
        }
    }
}

historialconver($rjdhfbpqj, $id_cliente);
