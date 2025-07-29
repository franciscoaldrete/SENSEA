<?php
// Detectar si estamos en localhost o en el servidor
$is_localhost = in_array($_SERVER['HTTP_HOST'], ['localhost', '127.0.0.1']) || strpos($_SERVER['HTTP_HOST'], 'localhost') !== false;

// Configuración de conexión según el entorno
if ($is_localhost) {
    // Configuración para localhost (XAMPP)
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'fcoalder_SENSEA';
} else {
    // Configuración para servidor en la nube
    $host = 'localhost';
    $user = 'fcoalder_sensea';
    $pass = 'Sensea2025';
    $db = 'fcoalder_SENSEA';
}

// Conectar a la base de datos
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

header('Content-Type: application/json');
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