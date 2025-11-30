<?php
// Conexión a la base de datos
$sdhf="localhost";
$dbdhf="softwar2_dsddksujd";
$udhf="softwar2_koidksus";
$pdhf="6*3o#5VzK6";

$conn=new mysqli($sdhf,$udhf,$pdhf,$dbdhf);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID del producto desde la URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Consulta para obtener los detalles del producto
    $stmt = $conn->prepare("SELECT * FROM productos WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    // Mostrar los detalles del producto
    if ($product) {
        echo "<h1>{$product['nombre']}</h1>";
        echo "<p>Precio: {$product['precio']}</p>";
        echo "<p>Descripción: {$product['descripcion']}</p>";
        // Otros detalles del producto
    } else {
        echo "<p>El producto no fue encontrado.</p>";
    }
}

$conn->close();
?>
