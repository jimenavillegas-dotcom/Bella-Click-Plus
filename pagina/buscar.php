<?php
// Iniciar sesión
session_start();

// Configuración de la base de datos
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base_de_datos = "mercado_libre1";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $contraseña, $base_de_datos);
if ($conn->connect_error) {
    die("❌ Conexión fallida: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

// Obtener término de búsqueda
$search = isset($_GET['q']) ? trim($_GET['q']) : '';

// Tablas de productos
$tablas = [
    'autos_motos_y_otros',
    'celulares_y_telefonia',
    'computacion',
    'deportes_y_fitness',
    'electrodomesticos',
    'herramientas',
    'ropa_bolsas_calzado'
];

$resultados = [];

// Buscar productos
if (!empty($search)) {
    $searchTerm = "%" . $conn->real_escape_string($search) . "%";

    foreach ($tablas as $tabla) {
        $sql = "SELECT 
                    id_producto,
                    nombre_producto,
                    descripcion,
                    precio,
                    cantidad,
                    categoria_id,
                    imagen,
                    '$tabla' AS tabla_origen
                FROM $tabla
                WHERE nombre_producto LIKE '$searchTerm' 
                   OR descripcion LIKE '$searchTerm'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultados[] = $row;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de búsqueda | Bella Click</title>
    <style>
        body { font-family: Arial, sans-serif; background: #ebebeb; margin: 0; padding: 0; }
        .header { background: #fff159; padding: 15px; box-shadow: 0 1px 2px rgba(0,0,0,.2); }
        .header-content { max-width: 1200px; margin: auto; display: flex; align-items: center; gap: 15px; }
        .logo { font-size: 22px; font-weight: bold; text-decoration: none; color: #333; }
        .search-form { flex: 1; display: flex; }
        .search-form input { flex: 1; padding: 10px; font-size: 16px; border: none; border-radius: 4px 0 0 4px; }
        .search-form button { padding: 10px 20px; background: #3483fa; color: white; border: none; border-radius: 0 4px 4px 0; cursor: pointer; }
        .container { max-width: 1200px; margin: 20px auto; padding: 0 15px; }
        .products-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(230px, 1fr)); gap: 15px; }
        .product-card { background: white; border-radius: 6px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,.15); text-align: center; padding-bottom: 10px; }
        .product-image-container { height: 220px; display: flex; align-items: center; justify-content: center; overflow: hidden; border-bottom: 1px solid #eee; }
        .product-image { max-width: 100%; max-height: 100%; object-fit: contain; }
        .product-info { padding: 10px; }
        .product-price { font-size: 20px; font-weight: bold; color: #333; }
        .product-name { font-size: 14px; color: #555; margin: 5px 0; font-weight: bold; }
        .product-desc { font-size: 12px; color: #777; margin-bottom: 8px; }
        .add-button, .buy-button { display: inline-block; border: none; cursor: pointer; padding: 8px 12px; border-radius: 5px; color: white; font-size: 14px; margin: 5px 2px; transition: background 0.3s; }
        .add-button { background: #00a650; }
        .add-button:hover { background: #007a4d; }
        .buy-button { background: #3483fa; }
        .buy-button:hover { background: #2968c8; }
        .no-results { text-align: center; background: white; padding: 50px; border-radius: 6px; }
        input[type='number'] { width: 60px; padding: 5px; margin: 5px 0; }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-content">
            <a href="index.php" class="logo">Bella Click</a>
            <form action="buscar.php" method="GET" class="search-form">
                <input type="text" name="q" value="<?php echo htmlspecialchars($search); ?>" placeholder="Buscar productos, marcas y más..." required>
                <button type="submit">🔍 Buscar</button>
            </form>
        </div>
    </div>

    <div class="container">
        <?php if (!empty($search)): ?>
            <h3>Resultados para "<strong><?php echo htmlspecialchars($search); ?></strong>": <?php echo count($resultados); ?> encontrados</h3>
        <?php endif; ?>

        <?php if (count($resultados) > 0): ?>
            <div class="products-grid">
                <?php foreach ($resultados as $row): ?>
                    <div class="product-card">
                        <div class="product-image-container">
                            <?php
                                $ruta_imagen = "img/productos/" . $row['imagen'];
                                if (!empty($row['imagen']) && file_exists($ruta_imagen)) {
                                    echo "<img src='$ruta_imagen' class='product-image' alt='Imagen del producto'>";
                                } else {
                                    echo "<img src='img/no-image.png' class='product-image' alt='Sin imagen'>";
                                }
                            ?>
                        </div>

                        <div class="product-info">
                            <div class="product-price">$<?php echo number_format($row['precio'], 2); ?></div>
                            <div class="product-name"><?php echo htmlspecialchars($row['nombre_producto']); ?></div>
                            <div class="product-desc"><?php echo htmlspecialchars($row['descripcion']); ?></div>

                            <?php if ($row['cantidad'] > 0): ?>
                                <!-- Formulario para agregar al carrito -->
                                <form method="POST" action="agregar_carrito.php">
                                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                                    <input type="hidden" name="tabla_origen" value="<?php echo $row['tabla_origen']; ?>">
                                    <input type="number" name="cantidad" min="1" max="<?php echo $row['cantidad']; ?>" value="1" required>
                                    <button type="submit" class="add-button">🛒 Agregar al Carrito</button>
                                </form>

                                <!-- Formulario para comprar directamente -->
                                <form method="POST" action="checkout.php">
                                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                                    <input type="hidden" name="cantidad" value="1">
                                    <button type="submit" class="buy-button">💰 Comprar</button>
                                </form>
                            <?php else: ?>
                                <p style="color:red; font-weight:bold;">Agotado</p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php elseif(!empty($search)): ?>
            <div class="no-results">
                <h2>😔 No se encontraron productos</h2>
                <p>Intenta buscar con otros términos.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php $conn->close(); ?>
