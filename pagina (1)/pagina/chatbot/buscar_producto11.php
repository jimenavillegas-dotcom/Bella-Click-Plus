<?php
header("Content-Type: text/html; charset=UTF-8");
include 'conexion.php';

if (!isset($_GET['q'])) {
    echo "⚠️ No se recibió el término de búsqueda.";
    exit;
}

$q = trim($_GET['q']);
$q = mysqli_real_escape_string($conn, $q);

// Tablas de productos (como tienes en tu base de datos)
$tablas = [
    'autos_motos_y_otros',
    'celulares_y_telefonia',
    'computacion',
    'deportes_y_fitness',
    'electrodomesticos',
    'herramientas',
    'ropa_bolsas_calzado'
];

$encontrados = [];
foreach ($tablas as $tabla) {
    $sql = "SELECT id_producto, nombre_producto, descripcion, precio, imagen 
            FROM $tabla 
            WHERE nombre_producto LIKE '%$q%' OR descripcion LIKE '%$q%' 
            LIMIT 5";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $encontrados[] = $row;
        }
    }
}

if (count($encontrados) > 0) {
    foreach ($encontrados as $producto) {
        echo "<div style='margin-bottom:15px; padding:10px; border-radius:10px; background:#fff3f7; box-shadow:0 0 5px rgba(0,0,0,0.1);'>";
        echo "<strong>📦 " . htmlspecialchars($producto['nombre_producto']) . "</strong><br>";
        echo "<em>📝 " . htmlspecialchars($producto['descripcion']) . "</em><br>";
        echo "💰 <b>$" . number_format($producto['precio'], 2) . "</b><br>";

        if (!empty($producto['imagen'])) {
            echo "<img src='img/productos/" . htmlspecialchars($producto['imagen']) . "' 
                  alt='" . htmlspecialchars($producto['nombre_producto']) . "' 
                  style='width:100px; height:100px; object-fit:cover; border-radius:10px; margin-top:8px;'>";
        }

        echo "</div>";
    }
} else {
    echo "❌ No encontré productos que coincidan con '<b>" . htmlspecialchars($q) . "</b>'.";
}

$conn->close();
?>
