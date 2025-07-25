<?php
header('Content-Type: application/json');
$usuariosFile = '../usuarios.json';
$uploadsDir = '../uploads/';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['empleado']) || !isset($_FILES['foto'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Datos incompletos']);
        exit;
    }
    $empleado = $_POST['empleado'];
    $foto = $_FILES['foto'];

    // Validar imagen
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($foto['type'], $allowedTypes)) {
        http_response_code(400);
        echo json_encode(['error' => 'Tipo de archivo no permitido']);
        exit;
    }
    if ($foto['size'] > 2 * 1024 * 1024) { // 2MB máximo
        http_response_code(400);
        echo json_encode(['error' => 'Archivo demasiado grande']);
        exit;
    }

    // Crear carpeta si no existe
    if (!file_exists($uploadsDir)) {
        mkdir($uploadsDir, 0777, true);
    }

    // Guardar imagen con nombre único
    $ext = pathinfo($foto['name'], PATHINFO_EXTENSION);
    $filename = $empleado . '_' . time() . '.' . $ext;
    $destino = $uploadsDir . $filename;
    if (!move_uploaded_file($foto['tmp_name'], $destino)) {
        http_response_code(500);
        echo json_encode(['error' => 'Error al guardar la imagen']);
        exit;
    }

    // Actualizar usuarios.json
    $usuarios = [];
    if (file_exists($usuariosFile)) {
        $usuarios = json_decode(file_get_contents($usuariosFile), true);
    }
    foreach ($usuarios as &$usuario) {
        if ($usuario['empleado'] === $empleado) {
            $usuario['foto'] = 'uploads/' . $filename;
            break;
        }
    }
    file_put_contents($usuariosFile, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo json_encode(['success' => true, 'foto' => 'uploads/' . $filename]);
    exit;
}
http_response_code(405);
echo json_encode(['error' => 'Método no permitido']); 