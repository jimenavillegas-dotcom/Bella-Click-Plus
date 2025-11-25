<?php
header('Content-Type: application/json; charset=utf-8');

// === CONFIGURACIÓN DE JIRA ===
$dominioJira = "https://yordiuriel9-1762829966794.atlassian.net"; 
$emailJira   = "yordiuriel9@gmail.com"; 
$apiToken    = "ATATT3xFfGF0sfI2jyeM2H32xZMujIPQ58osv4pXgRbyH37uRC96LJWh0DPCntFv9BPE5Y1_hA0Qch1gYZpeGJvUwmfjwFVgsOa-QEcl2wTy378B8QpNWZPXEIC9w2A-dHa-3y_pt86Xa9Iw23405TgLWgIq8VQBp_vQTt1UKquNdbHex_l12l8=8697CA6D"; // genera uno nuevo en https://id.atlassian.com/manage-profile/security/api-tokens
$projectKey  = "SCR"; // revisa la clave exacta de tu proyecto Jira

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido.']);
    exit;
}

// === DATOS RECIBIDOS ===
$nombre  = trim($_POST['nombre'] ?? 'Invitado');
$correo  = trim($_POST['correo'] ?? '');
$mensaje = trim($_POST['mensaje'] ?? '');

if (empty($correo) || empty($mensaje)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Campos obligatorios faltantes.']);
    exit;
}

// === ENVÍO A JIRA ===
$payload = [
    "fields" => [
    "project" => ["key" => $projectKey],
    "summary" => "Solicitud de ayuda - $nombre",
    "description" => [
        "type" => "doc",
        "version" => 1,
        "content" => [[
            "type" => "paragraph",
            "content" => [[
                "type" => "text",
                "text" => "Correo: $correo\n\nMensaje:\n$mensaje"
            ]]
        ]]
    ],
    "issuetype" => ["name" => "Task"]
]

];

$ch = curl_init("$dominioJira/rest/api/3/issue");
curl_setopt_array($ch, [
    CURLOPT_USERPWD => "$emailJira:$apiToken",
    CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($payload),
    CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 20
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$errorCurl = curl_error($ch);
curl_close($ch);

$jiraData = json_decode($response, true);

// === GENERAR PDF LOCAL ===
$pdfFileName = null;
try {
    require_once __DIR__ . '/fpdf186/fpdf.php';
    $ticketsDir = __DIR__ . '/tickets';
    if (!is_dir($ticketsDir)) mkdir($ticketsDir, 0775, true);

    $pdfFileName = 'ticket_' . time() . '.pdf';
    $pdfPath = "$ticketsDir/$pdfFileName";

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Ticket de Soporte - Bella Click', 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 8, "Nombre: $nombre", 0, 1);
    $pdf->Cell(0, 8, "Correo: $correo", 0, 1);
    $pdf->Ln(5);
    $pdf->MultiCell(0, 8, "Mensaje: $mensaje");
    $pdf->Ln(10);
    $pdf->Cell(0, 8, "Fecha: " . date('Y-m-d H:i:s'), 0, 1);
    $pdf->Output('F', $pdfPath);
} catch (Exception $e) {
    $pdfFileName = null;
}

// === RESPUESTA FINAL ===
if ($httpCode == 201 && isset($jiraData['key'])) {
    echo json_encode([
        'status' => 'success',
        'message' => "✅ Ticket creado correctamente (Jira ID: {$jiraData['key']})",
        'pdf' => $pdfFileName
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => "❌ Error al crear ticket. Código: $httpCode",
        'debug' => $errorCurl ?: $response
    ]);
}
?>

