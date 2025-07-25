<?php
header('Content-Type: application/json');
$host = 'localhost';
$user = 'fcoalder_sensea';
$pass = 'Sensea2025';
$db = 'fcoalder_SENSEA';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(['existe' => false]);
    exit;
}
$tipo = isset($_GET['tipo_entidad']) ? trim($_GET['tipo_entidad']) : '';
$nombre = isset($_GET['nombre_entidad']) ? trim($_GET['nombre_entidad']) : '';
if (!$tipo || !$nombre) {
    echo json_encode(['existe' => false]);
    exit;
}
$stmt = $conn->prepare('SELECT id_entidad FROM entidadesgeograficas WHERE tipo_entidad = ? AND nombre_entidad = ? LIMIT 1');
$stmt->bind_param('ss', $tipo, $nombre);
$stmt->execute();
$stmt->store_result();
$existe = $stmt->num_rows > 0;
$stmt->close();
$conn->close();
echo json_encode(['existe' => $existe]); 