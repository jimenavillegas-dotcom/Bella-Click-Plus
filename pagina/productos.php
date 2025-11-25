<?php
include 'conexion.php';

$categoria_id = isset($_GET['categoria']) ? intval($_GET['categoria']) : 0;

if ($categoria_id > 0) {
    switch ($categoria_id) {
        case 1: $tabla_producto = 'autos_motos_y_otros'; break;
        case 2: $tabla_producto = 'celulares_y_telefonia'; break;
        case 3: $tabla_producto = 'electrodomesticos'; break;
        case 4: $tabla_producto = 'herramientas'; break;
        case 5: $tabla_producto = 'ropa_bolsas_calzado'; break;
        case 6: $tabla_producto = 'deportes_y_fitness'; break;
        case 7: $tabla_producto = 'computacion'; break;
        default: die('Categoría no válida');
    }
    $query = "SELECT * FROM $tabla_producto";
} else {
    $query = "SELECT * FROM autos_motos_y_otros UNION 
              SELECT * FROM celulares_y_telefonia UNION 
              SELECT * FROM electrodomesticos UNION 
              SELECT * FROM herramientas UNION 
              SELECT * FROM ropa_bolsas_calzado UNION 
              SELECT * FROM deportes_y_fitness UNION 
              SELECT * FROM computacion";
}

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Productos Mágicos</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 50%, #ff9a9e 100%);
        min-height: 100vh;
        padding-bottom: 50px;
        position: relative;
        overflow-x: hidden;
    }

    /* Fondo animado */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        animation: backgroundMove 20s linear infinite;
        z-index: 0;
        pointer-events: none;
    }

    @keyframes backgroundMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(60px, 60px); }
    }

    /* Header */
    .header {
        background: linear-gradient(135deg, #ff6f91 0%, #ff9a9e 50%, #ffc3a0 100%);
        padding: 40px 20px;
        text-align: center;
        color: white;
        font-size: 2.5em;
        font-weight: 700;
        box-shadow: 0 10px 40px rgba(255, 111, 145, 0.4);
        position: relative;
        z-index: 1;
        overflow: hidden;
    }

    .header::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
        animation: headerPulse 8s ease-in-out infinite;
    }

    @keyframes headerPulse {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(30px, 30px) scale(1.1); }
    }

    .header-text {
        position: relative;
        z-index: 1;
        text-shadow: 2px 2px 8px rgba(0,0,0,0.2);
        letter-spacing: 2px;
    }

    .header-text i {
        margin: 0 15px;
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    /* Container */
    .container {
        max-width: 1400px;
        margin: 40px auto;
        padding: 30px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 25px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        position: relative;
        z-index: 1;
        animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Filtro */
    .filter-form {
        text-align: center;
        margin-bottom: 40px;
        padding: 30px;
        background: linear-gradient(135deg, #fff5f7 0%, #ffe8ec 100%);
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(255, 111, 145, 0.2);
    }

    .filter-form label {
        display: block;
        margin-bottom: 15px;
        font-weight: 600;
        font-size: 1.2em;
        color: #ff6f91;
    }

    .filter-form label i {
        margin-right: 10px;
    }

    .filter-form select {
        padding: 15px 25px;
        margin: 10px;
        border-radius: 25px;
        border: 2px solid #ff9a9e;
        font-size: 1em;
        font-family: 'Poppins', sans-serif;
        min-width: 300px;
        background: white;
        cursor: pointer;
        transition: all 0.3s ease;
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23ff6f91' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 20px;
        padding-right: 50px;
    }

    .filter-form select:focus {
        outline: none;
        border-color: #ff6f91;
        box-shadow: 0 0 0 4px rgba(255, 111, 145, 0.2);
        transform: translateY(-2px);
    }

    .filter-form button {
        padding: 15px 40px;
        background: linear-gradient(135deg, #ff6f91 0%, #ff9a9e 100%);
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        font-weight: 700;
        font-size: 1.1em;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(255, 111, 145, 0.3);
        font-family: 'Poppins', sans-serif;
    }

    .filter-form button:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(255, 111, 145, 0.4);
    }

    .filter-form button i {
        margin-right: 8px;
    }

    /* Productos Grid */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }

    .product-card {
        background: white;
        padding: 25px;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        text-align: center;
        transition: all 0.3s ease;
        border: 3px solid transparent;
        position: relative;
        overflow: hidden;
    }

    .product-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #ff6f91 0%, #ff9a9e 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 0;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(255, 111, 145, 0.3);
        border-color: #ff6f91;
    }

    .product-card:hover::before {
        opacity: 0.05;
    }

    .product-card > * {
        position: relative;
        z-index: 1;
    }

    .product-card img {
        max-width: 150px;
        height: 150px;
        object-fit: cover;
        margin-bottom: 20px;
        border-radius: 15px;
        transition: transform 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .product-card:hover img {
        transform: scale(1.1) rotate(5deg);
    }

    .product-card h3 {
        color: #ff6f91;
        margin: 15px 0;
        font-size: 1.3em;
        font-weight: 700;
    }

    .product-card p {
        margin: 10px 0;
        font-size: 0.95em;
        color: #555;
        line-height: 1.6;
    }

    .product-card strong {
        color: #333;
        font-weight: 600;
    }

    .price-tag {
        font-size: 1.4em;
        color: #ff6f91;
        font-weight: 700;
        margin: 15px 0;
    }

    .stock-info {
        display: inline-block;
        padding: 5px 15px;
        background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
        color: #2e7d32;
        border-radius: 20px;
        font-size: 0.9em;
        font-weight: 600;
        margin: 10px 0;
    }

    .out-of-stock {
        background: linear-gradient(135deg, #ffebee 0%, #ffcdd2 100%);
        color: #c62828;
        font-weight: 700;
        padding: 10px 20px;
        border-radius: 20px;
        display: inline-block;
        margin: 10px 0;
    }

    .buy-form {
        margin-top: 20px;
        display: flex;
        gap: 10px;
        justify-content: center;
        align-items: center;
    }

    .buy-form input[type="number"] {
        width: 70px;
        padding: 10px;
        border: 2px solid #ff9a9e;
        border-radius: 12px;
        text-align: center;
        font-size: 1em;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }

    .buy-form input[type="number"]:focus {
        outline: none;
        border-color: #ff6f91;
        box-shadow: 0 0 0 3px rgba(255, 111, 145, 0.2);
    }

    .buy-button {
        padding: 12px 25px;
        background: linear-gradient(135deg, #ff6f91 0%, #ff9a9e 100%);
        color: white;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        font-weight: 700;
        font-size: 1em;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(255, 111, 145, 0.3);
        font-family: 'Poppins', sans-serif;
    }

    .buy-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 111, 145, 0.4);
    }

    .buy-button i {
        margin-right: 5px;
    }

    /* No productos */
    .no-products {
        text-align: center;
        padding: 60px 20px;
        color: #ff6f91;
        font-weight: 600;
        font-size: 1.3em;
    }

    .no-products i {
        font-size: 4em;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    /* Botón de regreso */
    .back-button {
        display: block;
        margin: 40px auto 0 auto;
        padding: 15px 35px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        text-decoration: none;
        text-align: center;
        border-radius: 25px;
        width: fit-content;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        font-size: 1.1em;
    }

    .back-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
    }

    .back-button i {
        margin-right: 10px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container {
            margin: 20px;
            padding: 20px;
        }

        .header {
            font-size: 1.8em;
            padding: 30px 15px;
        }

        .filter-form select {
            min-width: 100%;
        }

        .products-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }
</style>
</head>
<body>

<div class="header">
    <div class="header-text">
        <i class="fas fa-star"></i>
        Productos Mágicos
        <i class="fas fa-star"></i>
    </div>
</div>

<div class="container">
    <form class="filter-form" method="GET" action="productos.php">
        <label for="categoria">
            <i class="fas fa-filter"></i> Filtrar por Categoría
        </label>
        <select id="categoria" name="categoria">
            <option value="0">✨ Todas las Categorías</option>
            <option value="1" <?php if ($categoria_id == 1) echo 'selected'; ?>>💄 Brillos y colores mágicos para labios</option>
            <option value="2" <?php if ($categoria_id == 2) echo 'selected'; ?>>🌸 Tonos suaves para mejillas sonrojadas</option>
            <option value="3" <?php if ($categoria_id == 3) echo 'selected'; ?>>🎨 Paletas de ensueño y delineadores brillantes</option>
            <option value="4" <?php if ($categoria_id == 4) echo 'selected'; ?>>💅 Colores vibrantes para uñas perfectas</option>
            <option value="5" <?php if ($categoria_id == 5) echo 'selected'; ?>>👑 Kits completos para princesas</option>
            <option value="6" <?php if ($categoria_id == 6) echo 'selected'; ?>>🪞 Brochas, espejos y organizadores</option>
            <option value="7" <?php if ($categoria_id == 7) echo 'selected'; ?>>🧴 Productos suaves para la piel</option>
        </select>
        <button type="submit">
            <i class="fas fa-search"></i> Buscar
        </button>
    </form>

    <div class="products-grid">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product-card'>";
            echo "<img src='img/productos/" . htmlspecialchars($row['imagen']) . "' alt='" . htmlspecialchars($row['nombre_producto']) . "'>";
            echo "<h3>" . htmlspecialchars($row['nombre_producto']) . "</h3>";
            echo "<p><strong>📝 Descripción:</strong> " . htmlspecialchars($row['descripcion']) . "</p>";
            echo "<div class='price-tag'>💰 $" . number_format($row['precio'], 2) . "</div>";
            echo "<div class='stock-info'><i class='fas fa-box'></i> Stock: " . $row['cantidad'] . "</div>";

            // Formulario de comprar
            if ($row['cantidad'] > 0) {
                echo "<form method='POST' action='agregar_carrito.php' class='buy-form'>";
                echo "<input type='hidden' name='id_producto' value='" . $row['id_producto'] . "'>";
                echo "<input type='number' name='cantidad' min='1' max='" . $row['cantidad'] . "' value='1' required>";
                echo "<button type='submit' class='buy-button'><i class='fas fa-shopping-cart'></i> Comprar</button>";
                echo "</form>";
            } else {
                echo "<div class='out-of-stock'><i class='fas fa-times-circle'></i> Agotado</div>";
            }

            echo "</div>";
        }
    } else {
        echo "<div class='no-products'>";
        echo "<div><i class='fas fa-sad-tear'></i></div>";
        echo "<p>No hay productos disponibles en esta categoría.</p>";
        echo "</div>";
    }

    $conn->close();
    ?>
    </div>
</div>

<a href="index.php" class="back-button">
    <i class="fas fa-arrow-left"></i> Regresar a Inicio
</a>

</body>
</html>