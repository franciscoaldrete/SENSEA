<?php
header('Content-Type: application/json');
$usuariosFile = '../usuarios.json';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Leer usuarios
    if (file_exists($usuariosFile)) {
        echo file_get_contents($usuariosFile);
    } else {
        echo json_encode([]);
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!isset($input['empleado']) || !isset($input['nombre'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Datos incompletos']);
        exit;
    }
    $empleado = $input['empleado'];
    $nombre = $input['nombre'];

    $usuarios = [];
    if (file_exists($usuariosFile)) {
        $usuarios = json_decode(file_get_contents($usuariosFile), true);
    }
    foreach ($usuarios as &$usuario) {
        if ($usuario['empleado'] === $empleado) {
            $usuario['nombre'] = $nombre;
            break;
        }
    }
    file_put_contents($usuariosFile, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo json_encode(['success' => true]);
    exit;
}
?> 