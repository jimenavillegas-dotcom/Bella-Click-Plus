<?php
session_start();
$usuario = $_SESSION['usuario'] ?? 'Invitado';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistente Bella Click 💬</title>
    <link rel="stylesheet" href="chatbot/chatbot.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            color: #fff;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
            margin-bottom: 20px;
        }

        .back-home {
            margin-top: 30px;
            text-decoration: none;
            background: white;
            color: #ff6f91;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .back-home:hover {
            background: #ffe6f0;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>

    <h1>💬 Bienvenido al Asistente de Bella Click</h1>

    <!-- 💄 Chatbot -->
    <div id="chatbot-window" style="display: flex;">
        <div id="chatbot-header">
            <span>Asistente Bella Click</span>
            <button id="chatbot-close" onclick="window.location.href='index.php'">✖</button>
        </div>
        <div id="chatbot-body">
            <div id="chatbot-messages"></div>
            <div id="chatbot-input-area">
                <input type="text" id="user-input" placeholder="Escribe tu respuesta...">
                <button onclick="sendMessage()">Enviar</button>
            </div>
        </div>
    </div>

    <a href="index.php" class="back-home">🏠 Volver al Inicio</a>

    <script src="chatbot/chatbot.js"></script>

</body>
</html>
