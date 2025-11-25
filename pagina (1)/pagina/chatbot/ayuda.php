<?php
session_start();
$usuario = $_SESSION['usuario'] ?? 'Invitado';
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Centro de Ayuda - Bella Click</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #ffe6f0 0%, #ffc3a0 100%);
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
form {
    background: white;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    width: 400px;
}
h2 {
    text-align: center;
    color: #ff6f91;
    margin-bottom: 20px;
}
label {
    display: block;
    margin-top: 15px;
    font-weight: 600;
}
input, textarea {
    width: 100%;
    padding: 10px;
    border: 2px solid #ff9a9e;
    border-radius: 10px;
    margin-top: 8px;
    font-family: 'Poppins', sans-serif;
}
button {
    margin-top: 20px;
    width: 100%;
    background: linear-gradient(135deg, #ff6f91 0%, #ff9a9e 100%);
    color: white;
    font-weight: bold;
    border: none;
    padding: 12px;
    border-radius: 10px;
    cursor: pointer;
    transition: 0.3s;
}
button:hover {
    transform: scale(1.05);
}
.success {
    color: green;
    text-align: center;
    font-weight: 600;
}
.error {
    color: red;
    text-align: center;
    font-weight: 600;
}
</style>
</head>
<body>

<form action="crear_ticket_jira.php" method="POST">
    <h2>🆘 Centro de Ayuda Bella Click</h2>

    <label>Usuario:</label>
    <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario); ?>" readonly>

    <label>Correo de contacto:</label>
    <input type="email" name="correo" placeholder="ejemplo@gmail.com" required>

    <label>Describe tu situación:</label>
    <textarea name="mensaje" rows="5" placeholder="Explica brevemente tu problema..." required></textarea>

    <button type="submit">Enviar solicitud</button>
</form>

</body>
</html>
