<?php
include 'conexion.php';

$mensaje = strtolower(trim($_POST['mensaje']));
$respuesta = "";
$usuario = "Invitado";

// Mensajes variados
$saludos = [
    "¡Hola! 👋 ¿Qué tal tu día? Soy el asistente de *Mercado Libre*.",
    "¡Hey! 😄 Bienvenido de nuevo, ¿qué deseas buscar hoy?",
    "¡Hola, humano curioso! 🤖 Puedo ayudarte a buscar productos, ver tu carrito o consultar precios."
];
$noentiendo = [
    "Mmm... 🤔 no entendí eso. Puedes decir *buscar gloss*, *ver carrito* o *precio de celular*.",
    "Ups 😅 no tengo esa respuesta, pero puedo mostrarte categorías o productos.",
    "¿Podrías repetirlo? Estoy en modo aprendizaje 🧠."
];

$tablas_productos = [
    'autos_motos_y_otros',
    'celulares_y_telefonia',
    'computacion',
    'deportes_y_fitness',
    'electrodomesticos',
    'herramientas',
    'ropa_bolsas_calzado'
];

// --- SALUDO ---
if ($mensaje == "hola" || $mensaje == "buenas" || $mensaje == "hey") {
    $respuesta = $saludos[array_rand($saludos)];
}

// --- MOSTRAR CATEGORÍAS ---
elseif (strpos($mensaje, "categor") !== false) {
    $sql = "SELECT nombre_categoria FROM categorias";
    $result = $conn->query($sql);
    $respuesta = "Estas son nuestras categorías disponibles 🛍️:<br><ul>";
    while ($row = $result->fetch_assoc()) {
        $respuesta .= "<li>📦 " . $row['nombre_categoria'] . "</li>";
    }
    $respuesta .= "</ul><br>¿Quieres que te muestre productos de alguna?";
}

// --- BUSCAR PRODUCTO POR NOMBRE ---
elseif (strpos($mensaje, "buscar") !== false || strpos($mensaje, "busca") !== false || strpos($mensaje, "ver") !== false) {
    preg_match('/buscar|ver|busca\s+(.*)/', $mensaje, $match);
    $busqueda = isset($match[1]) ? trim($match[1]) : '';

    if ($busqueda == '') {
        $respuesta = "¿Qué producto quieres buscar? 🧐 Ejemplo: *buscar gloss* o *ver celular*.";
    } else {
        $respuesta = "🔎 Buscando <b>$busqueda</b>...<br>";
        $encontrado = false;

        foreach ($tablas_productos as $tabla) {
            $sql = "SELECT nombre_producto, precio, imagen FROM $tabla WHERE nombre_producto LIKE '%$busqueda%' LIMIT 3";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $respuesta .= "<br>🛒 <b>{$row['nombre_producto']}</b><br>💰 Precio: $" . $row['precio'];
                    if (!empty($row['imagen'])) {
                        $respuesta .= "<br><img src='imagenes/{$row['imagen']}' width='120' style='border-radius:10px;'><br>";
                    }
                }
                $encontrado = true;
                break;
            }
        }

        if (!$encontrado) {
            $respuesta .= "<br>No encontré productos relacionados con <b>$busqueda</b> 😔.";
        }
    }
}

// --- CONSULTAR PRECIO ---
elseif (strpos($mensaje, "precio") !== false) {
    preg_match('/precio\s+(.*)/', $mensaje, $match);
    $producto = isset($match[1]) ? trim($match[1]) : '';

    if ($producto == '') {
        $respuesta = "¿De qué producto quieres saber el precio? 💸 Ejemplo: *precio gloss*.";
    } else {
        $encontrado = false;
        foreach ($tablas_productos as $tabla) {
            $sql = "SELECT nombre_producto, precio FROM $tabla WHERE nombre_producto LIKE '%$producto%' LIMIT 1";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $respuesta = "💰 El producto <b>{$row['nombre_producto']}</b> cuesta $" . $row['precio'] . " pesos.";
                $encontrado = true;
                break;
            }
        }
        if (!$encontrado) {
            $respuesta = "No encontré el precio de ese producto 😢.";
        }
    }
}

// --- VER CARRITO ---
elseif (strpos($mensaje, "carrito") !== false || strpos($mensaje, "total") !== false) {
    $sql = "SELECT c.id_producto, c.cantidad, p.nombre_producto, p.precio 
            FROM carrito c 
            JOIN autos_motos_y_otros p ON c.id_producto = p.id_producto";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $total = 0;
        $respuesta = "🛒 En tu carrito tienes:<br>";
        while ($row = $result->fetch_assoc()) {
            $subtotal = $row['precio'] * $row['cantidad'];
            $total += $subtotal;
            $respuesta .= "• <b>{$row['nombre_producto']}</b> x{$row['cantidad']} — $" . number_format($subtotal, 2) . "<br>";
        }
        $respuesta .= "<br>💵 <b>Total:</b> $" . number_format($total, 2);
    } else {
        $respuesta = "Tu carrito está vacío 🛍️. ¡Agrega algunos productos!";
    }
}

// --- DESPEDIDA ---
elseif (strpos($mensaje, "gracias") !== false) {
    $respuesta = "¡De nada! 😄 Fue un placer ayudarte.";
}

// --- AYUDA ---
elseif (strpos($mensaje, "ayuda") !== false) {
    $respuesta = "Puedo ayudarte con:<br>🟢 Buscar productos con imágenes.<br>🟢 Consultar precios.<br>🟢 Mostrar tu carrito.<br>🟢 Ver categorías.<br><br>¿Qué te gustaría hacer?";
}

// --- SI NO ENTIENDE ---
else {
    $respuesta = $noentiendo[array_rand($noentiendo)];
}

// Guardar conversación
$stmt = $conn->prepare("INSERT INTO chatbot_conversaciones (usuario, mensaje_usuario, respuesta_bot) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $usuario, $mensaje, $respuesta);
$stmt->execute();

echo $respuesta;
$conn->close();
?>
