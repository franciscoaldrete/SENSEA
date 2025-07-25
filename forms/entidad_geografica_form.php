<?php
// Configuración de conexión para la nube
$host = 'localhost';
$user = 'fcoalder_sensea';
$pass = 'Sensea2025';
$db = 'fcoalder_SENSEA';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

$errores = [];
$exito = false;
$entidad_existente = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo_entidad = trim($_POST['tipo_entidad'] ?? '');
    $nombre_entidad = trim($_POST['nombre_entidad'] ?? '');
    $codigo_entidad = trim($_POST['codigo_entidad'] ?? '');
    $fuente_general = trim($_POST['fuente_general'] ?? '');
    $fecha_registro = date('Y-m-d H:i:s');

    // Validaciones
    if (empty($tipo_entidad)) {
        $errores[] = 'El tipo de entidad es obligatorio.';
    }
    if (empty($nombre_entidad)) {
        $errores[] = 'El nombre de la entidad es obligatorio.';
    }

    // Buscar si ya existe la entidad
    if (empty($errores)) {
        $stmt = $conn->prepare("SELECT id_entidad FROM entidadesgeograficas WHERE tipo_entidad = ? AND nombre_entidad = ? LIMIT 1");
        if ($stmt === false) {
            $errores[] = 'Error en la consulta de búsqueda: ' . $conn->error;
        } else {
            $stmt->bind_param('ss', $tipo_entidad, $nombre_entidad);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($id_entidad_existente);
                    $stmt->fetch();
                    $entidad_existente = $id_entidad_existente;
                    // Redirigir a la siguiente etapa de captura
                    header('Location: captura_secciones.php?id_entidad=' . $entidad_existente);
                    exit;
                }
            } else {
                $errores[] = 'Error al ejecutar la consulta de búsqueda: ' . $stmt->error;
            }
            $stmt->close();
        }
    }

    // Si no existe, insertar
    if (empty($errores) && !$entidad_existente) {
        $stmt = $conn->prepare("INSERT INTO entidadesgeograficas (tipo_entidad, nombre_entidad, codigo_entidad, fuente_general, fecha_registro) VALUES (?, ?, ?, ?, ?)");
        if ($stmt === false) {
            $errores[] = 'Error en la consulta de inserción: ' . $conn->error;
        } else {
            $stmt->bind_param('sssss', $tipo_entidad, $nombre_entidad, $codigo_entidad, $fuente_general, $fecha_registro);
            if ($stmt->execute()) {
                $exito = true;
                header('Location: captura_secciones.php?id_entidad=' . $conn->insert_id);
                exit;
            } else {
                $errores[] = 'Error al guardar: ' . $stmt->error;
            }
            $stmt->close();
        }
    }
}

// Definir título de la página para el header
$titulo_pagina = 'Captura de Entidad Geográfica';
include 'header.php';
?>
<style>
    body {
        background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 100%);
        font-family: 'Inter', sans-serif;
    }
    .form-card {
        border: none;
        border-radius: 1.5rem;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        padding: 2rem 2.5rem;
        background: #fff;
        margin-top: 2rem;
    }
    .form-title {
        color: #1d3557;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
    .btn-primary {
        background: #1d3557;
        border: none;
    }
    .btn-primary:hover {
        background: #457b9d;
    }
    .required {
        color: #e63946;
    }
</style>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="form-card w-100" style="max-width: 500px;">
        <h2 class="form-title text-center mb-4"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Captura de Entidad Geográfica</h2>
        <?php if ($errores): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errores as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="post" autocomplete="off">
            <label for="tipo_entidad">Tipo de entidad*:</label>
            <select name="tipo_entidad" id="tipo_entidad" required class="form-select mb-3">
                <option value="">Seleccione...</option>
                <option value="Municipio">Municipio</option>
                <option value="Región">Región</option>
                <option value="Zona">Zona</option>
                <option value="Sección">Sección</option>
                <option value="Ejido">Ejido</option>
                <option value="Otro">Otro</option>
            </select>

            <label for="nombre_entidad">Nombre de la entidad*:</label>
            <input type="text" name="nombre_entidad" id="nombre_entidad" maxlength="255" required class="form-control mb-3">

            <label for="codigo_entidad">Código de la entidad:</label>
            <input type="text" name="codigo_entidad" id="codigo_entidad" maxlength="50" class="form-control mb-3">

            <label for="fuente_general">Fuente general:</label>
            <textarea name="fuente_general" id="fuente_general" rows="2" class="form-control mb-3"></textarea>

            <button type="submit" class="btn btn-primary w-100">Guardar y continuar</button>
        </form>
    </div>
</div>
<?php include 'footer.php'; ?> 