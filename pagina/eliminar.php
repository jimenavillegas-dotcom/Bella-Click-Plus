<?php
session_start();
include 'conexion.php';

// Verificar si el usuario está conectado
if (!isset($_SESSION['admin1'])) {
    header("Location: admin1.php");
    exit;
}

// Obtener el nombre del usuario de la sesión
$usuario = $_SESSION['admin1'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar y Eliminar Producto</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding-bottom: 50px;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #f30049 0%, #ff6b9d 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(243, 0, 73, 0.3);
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 15s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-30px, -30px) scale(1.1); }
        }

        .header h1 {
            font-size: 2.5em;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            position: relative;
            z-index: 1;
        }

        .header i {
            font-size: 1.2em;
            margin-right: 15px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        /* Navegación */
        .nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .nav a {
            color: #667eea;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .nav a:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        /* Formulario */
        .form-container {
            max-width: 700px;
            margin: 40px auto;
            padding: 40px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-container h2 {
            color: #667eea;
            margin-bottom: 30px;
            font-size: 2em;
            text-align: center;
            font-weight: 700;
        }

        .form-container label {
            display: block;
            margin-top: 20px;
            margin-bottom: 8px;
            color: #444;
            font-weight: 600;
            font-size: 0.95em;
        }

        .form-container input,
        .form-container select {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 1em;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-container input:focus,
        .form-container select:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-container button {
            width: 100%;
            padding: 15px;
            margin-top: 25px;
            background: linear-gradient(135deg, #f30049 0%, #ff6b9d 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(243, 0, 73, 0.3);
        }

        .form-container button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(243, 0, 73, 0.4);
        }

        .form-container button:active {
            transform: translateY(-1px);
        }

        /* Información del producto */
        .product-info {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin: 30px auto;
            max-width: 700px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            animation: fadeIn 0.5s ease-out;
            border: 3px solid #f30049;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .product-info h2 {
            color: #667eea;
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .product-info h3 {
            color: #f30049;
            font-size: 2em;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .product-info p {
            margin: 12px 0;
            color: #555;
            font-size: 1.05em;
            line-height: 1.6;
        }

        .product-info strong {
            color: #333;
            font-weight: 600;
        }

        .product-info img {
            width: 100%;
            max-width: 400px;
            height: auto;
            margin: 25px auto;
            display: block;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
        }

        .product-info img:hover {
            transform: scale(1.05);
        }

        .delete-button {
            background: linear-gradient(135deg, #ff4757 0%, #ff6348 100%);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: 600;
            margin-top: 20px;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(255, 71, 87, 0.3);
        }

        .delete-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(255, 71, 87, 0.4);
        }

        /* Botón de regreso */
        .back-button {
            display: inline-block;
            margin: 30px auto;
            padding: 15px 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            text-align: center;
            border-radius: 25px;
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
            display: block;
            max-width: 250px;
            margin: 30px auto;
        }

        .back-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(102, 126, 234, 0.4);
        }

        /* Información del usuario */
        .user-info {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 20px;
            text-align: center;
            border-radius: 15px;
            max-width: 400px;
            margin: 30px auto;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            color: #333;
            font-weight: 600;
        }

        .logout-button {
            margin-left: 15px;
            padding: 10px 25px;
            background: linear-gradient(135deg, #f30049 0%, #ff6b9d 100%);
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(243, 0, 73, 0.3);
        }

        .logout-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(243, 0, 73, 0.4);
        }

        .no-results {
            text-align: center;
            padding: 40px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            margin: 30px auto;
            max-width: 600px;
            color: #666;
            font-size: 1.1em;
        }

        .no-results i {
            font-size: 3em;
            color: #f30049;
            margin-bottom: 20px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 1.8em;
            }

            .form-container {
                margin: 20px;
                padding: 25px;
            }

            .nav {
                flex-direction: column;
                gap: 10px;
            }

            .nav a {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><i class="fas fa-search"></i>Buscar y Eliminar Producto</h1>
    </div>

    <!-- Navegación -->
    <div class="nav">
        <a href="vender_producto.html"><i class="fas fa-shopping-cart"></i> Vender Producto</a>
        <a href="productos.php"><i class="fas fa-box-open"></i> Productos</a>
    </div>

    <div class="form-container">
        <h2><i class="fas fa-magic"></i> Buscar Producto</h2>
        <form action="eliminar.php" method="POST">
            <label for="nombre_producto"><i class="fas fa-tag"></i> Nombre del Producto:</label>
            <input type="text" id="nombre_producto" name="nombre_producto" placeholder="Escribe el nombre del producto..." required>

            <label for="categoria"><i class="fas fa-list"></i> Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="autos_motos_y_otros">✨ Brillos y colores mágicos para labio</option>
                <option value="celulares_y_telefonia">💖 Tonos suaves para mejillas sonrojadas</option>
                <option value="electrodomesticos">🎨 Paletas de ensueño y delineadores brillantes</option>
                <option value="herramientas">💅 Colores vibrantes para uñas perfectas</option>
                <option value="ropa_bolsas_calzado">👑 Kits completos para princesas</option>
                <option value="deportes_y_fitness">🪞 Brochas, espejos y organizadores</option>
                <option value="computacion">🧴 Productos suaves para la piel</option>
            </select>

            <button type="submit"><i class="fas fa-search"></i> Buscar Producto</button>
        </form>

        <?php
        // Incluir la conexión a la base de datos
        include 'conexion.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre_producto = $_POST['nombre_producto'];
            $categoria = $_POST['categoria'];

            // Consultar el producto de la base de datos
            $query = "SELECT * FROM $categoria WHERE nombre_producto LIKE ?";
            $stmt = $conn->prepare($query);
            $nombre_producto = "%" . $nombre_producto . "%";
            $stmt->bind_param("s", $nombre_producto);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product-info'>";
                    echo "<h2><i class='fas fa-hashtag'></i> ID: " . $row['id_producto'] . "</h2>";
                    echo "<h3>" . htmlspecialchars($row['nombre_producto']) . "</h3>";
                    echo "<p><strong>📝 Descripción:</strong> " . htmlspecialchars($row['descripcion']) . "</p>";
                    echo "<p><strong>💰 Precio:</strong> $" . number_format($row['precio'], 2) . "</p>";
                    echo "<p><strong>📦 Cantidad en Stock:</strong> " . $row['cantidad'] . "</p>";
                    echo "<img src='img/productos/" . htmlspecialchars($row['imagen']) . "' alt='" . htmlspecialchars($row['nombre_producto']) . "'>";
                    echo "<form action='eliminar_producto.php' method='POST'>";
                    echo "<input type='hidden' name='id_producto' value='" . $row['id_producto'] . "'>";
                    echo "<input type='hidden' name='categoria' value='" . htmlspecialchars($categoria) . "'>";
                    echo "<button type='submit' class='delete-button'><i class='fas fa-trash-alt'></i> Eliminar Producto</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<div class='no-results'>";
                echo "<i class='fas fa-sad-tear'></i>";
                echo "<p>No se encontraron productos para esa búsqueda.</p>";
                echo "</div>";
            }
        }

        $conn->close();
        ?>
    </div>

    <a href="login.php" class="back-button"><i class="fas fa-arrow-left"></i> Regresar a Inicio</a>
    
    <div class="user-info">
        <i class="fas fa-user-circle"></i> Hola, <?php echo htmlspecialchars($usuario); ?> 
        <form action="index.php" method="POST" style="display: inline;">
            <button type="submit" class="logout-button"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</button>
        </form>
    </div>
</body>
</html>