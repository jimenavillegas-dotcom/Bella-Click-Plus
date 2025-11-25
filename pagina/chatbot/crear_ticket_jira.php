<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario'] ?? 'Invitado';
    $correo = $_POST['correo'] ?? '';
    $mensaje = $_POST['mensaje'] ?? '';

    /$dominioJira = "https://yordiuriel9-1762829966794.atlassian.net";
$emailJira   = "yordiuriel9@gmail.com";     // el correo con el que entras a Jira
$apiToken    = "TATATT3xFfGF0Zynaap_Stav_R6Q1KpSM0LFz7NQgNMWYrvKu82lxETt-nFpwZvCvp2TEpjJg0a9jYaILEKVJKw5Pw0jpxqd3BUFEEAi7BM4DCv9LgwEvW8MZ5eVj0M0YgsdDcP1byjcnYyUJ6BhSUPrtsfCOat7er8i4YxpMrVxM9R4r9flAHZM=0079205B";         // el que generaste en id.atlassian.com
$projectKey  = "SCRUM";                            // Cambia por la clave de tu proyecto Jira

    $url = "$dominioJira/rest/api/3/issue";

    // 📋 Estructura del ticket
    $data = [
        "fields" => [
            "project" => ["key" => $projectKey],
            "summary" => "Solicitud de ayuda de $usuario",
            "description" => "Correo: $correo\n\nMensaje: $mensaje",
            "issuetype" => ["name" => "Task"]
        ]
    ];

    // 🔐 Conexión cURL a Jira API
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERPWD, "$emailJira:$apiToken");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);


    $response = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($status == 201) {
        echo "<p class='success'>✅ Tu solicitud fue enviada correctamente. En breve soporte se comunicará contigo.</p>";
    } else {
        echo "<p class='error'>❌ Error al enviar la solicitud. Código: $status<br>Respuesta: $response</p>";
    }
} else {
    echo "<p class='error'>Acceso no permitido.</p>";
}
?>
