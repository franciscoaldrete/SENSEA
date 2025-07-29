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

$id_entidad = isset($_GET['id_entidad']) ? intval($_GET['id_entidad']) : 0;
if ($id_entidad <= 0) {
    die('Entidad no especificada.');
}

// Obtener datos de la entidad
$stmt = $conn->prepare("SELECT tipo_entidad, nombre_entidad, codigo_entidad, fuente_general, fecha_registro FROM entidadesgeograficas WHERE id_entidad = ?");
$stmt->bind_param('i', $id_entidad);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows === 0) {
    echo '<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Entidad no encontrada</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"><link rel="stylesheet" href="../assets/css/main.css"></head><body><div class="container py-5 text-center"><div class="alert alert-danger"><h4 class="mb-3">La entidad seleccionada no existe.</h4><p>¿Deseas darla de alta?</p><a href="entidad_geografica_form.php" class="btn btn-primary">Registrar nueva entidad</a></div><a href="../admin.html" class="btn btn-link mt-3">Volver al panel principal</a></div></body></html>';
    exit;
}
$stmt->bind_result($tipo_entidad, $nombre_entidad, $codigo_entidad, $fuente_general, $fecha_registro);
$stmt->fetch();
$stmt->close();

// Consultar estado de cada sección
function seccion_estado($tabla, $id_entidad, $conn) {
    $query = "SELECT 1 FROM $tabla WHERE id_entidad = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_entidad);
    $stmt->execute();
    $stmt->store_result();
    $estado = $stmt->num_rows > 0 ? 'completo' : 'pendiente';
    $stmt->close();
    return $estado;
}
$estado_localizacion = seccion_estado('datoslocalizacion', $id_entidad, $conn);
$estado_tipologia = seccion_estado('tipologiaterritorial', $id_entidad, $conn);
$estado_ambiental = seccion_estado('datosambientales', $id_entidad, $conn);
$estado_social = seccion_estado('datossociales', $id_entidad, $conn);
$estado_economica = seccion_estado('datoseconomicos', $id_entidad, $conn);

// Definir título de la página para el header
$titulo_pagina = 'Captura de Variables/Indicadores';

// Incluir el header
include 'header.php';
?>
<style>
    body { background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 100%); font-family: 'Inter', sans-serif; }
    .section-title { color: #8e24aa; font-weight: 700; }
    .card-section { border: none; border-radius: 1.5rem; box-shadow: 0 4px 24px rgba(0,0,0,0.08); transition: transform 0.2s, box-shadow 0.2s; }
    .card-section:hover { transform: translateY(-8px) scale(1.03); box-shadow: 0 8px 32px rgba(0,0,0,0.12); }
    .icon-purple { color: #8e24aa; }
    .icon-cyan { color: #00bcd4; }
    .icon-green { color: #43a047; }
    .icon-yellow { color: #fbc02d; }
    .icon-red { color: #e53935; }
    .estado-completo { color: #43a047; font-weight: 600; }
    .estado-pendiente { color: #e53935; font-weight: 600; }
</style>

<div class="container py-5">
    <a href="../admin.php" class="text-primary mb-3 d-inline-block"><i class="fas fa-arrow-left me-2"></i>Panel principal</a>
    <h1 class="section-title mb-4">Captura de Variables/Indicadores de Municipios</h1>
    <div class="mb-4 p-4 bg-white rounded shadow-sm">
        <h5 class="mb-2"><i class="fas fa-map-marker-alt icon-purple me-2"></i>Entidad seleccionada</h5>
        <ul class="mb-0 list-unstyled">
            <li><strong>Tipo:</strong> <?= htmlspecialchars($tipo_entidad) ?></li>
            <li><strong>Nombre:</strong> <?= htmlspecialchars($nombre_entidad) ?></li>
            <?php if ($codigo_entidad): ?><li><strong>Código:</strong> <?= htmlspecialchars($codigo_entidad) ?></li><?php endif; ?>
            <?php if ($fuente_general): ?><li><strong>Fuente:</strong> <?= htmlspecialchars($fuente_general) ?></li><?php endif; ?>
            <li><strong>Fecha de registro:</strong> <?= htmlspecialchars($fecha_registro) ?></li>
        </ul>
    </div>
    <div class="row g-4">
        <div class="col-md-6 col-lg-4">
            <a href="captura_localizacion.php?id_entidad=<?= $id_entidad ?>" style="text-decoration:none;">
                <div class="card card-section h-100">
                    <div class="card-body">
                        <div class="mb-3"><i class="fas fa-map-marker-alt fa-2x icon-purple"></i></div>
                        <h5 class="card-title">Referencia geográfica / Demografía básica + integración</h5>
                        <p class="card-text text-muted">Datos de localización y población básica del municipio.</p>
                        <span class="<?= $estado_localizacion === 'completo' ? 'estado-completo' : 'estado-pendiente' ?>">
                            <?= $estado_localizacion === 'completo' ? 'Completo' : 'Pendiente' ?>
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="captura_tipologia.php?id_entidad=<?= $id_entidad ?>" style="text-decoration:none;">
                <div class="card card-section h-100">
                    <div class="card-body">
                        <div class="mb-3"><i class="fas fa-layer-group fa-2x icon-cyan"></i></div>
                        <h5 class="card-title">Tipología territorial (ERS Codes)</h5>
                        <p class="card-text text-muted">Clasificación territorial y códigos ERS.</p>
                        <span class="<?= $estado_tipologia === 'completo' ? 'estado-completo' : 'estado-pendiente' ?>">
                            <?= $estado_tipologia === 'completo' ? 'Completo' : 'Pendiente' ?>
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card card-section h-100">
                <div class="card-body">
                    <div class="mb-3"><i class="fas fa-leaf fa-2x icon-green"></i></div>
                    <h5 class="card-title">Ambiental / Recursos naturales</h5>
                    <p class="card-text text-muted">Información sobre recursos naturales y medio ambiente.</p>
                    <span class="<?= $estado_ambiental === 'completo' ? 'estado-completo' : 'estado-pendiente' ?>">
                        <?= $estado_ambiental === 'completo' ? 'Completo' : 'Pendiente' ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card card-section h-100">
                <div class="card-body">
                    <div class="mb-3"><i class="fas fa-users fa-2x icon-yellow"></i></div>
                    <h5 class="card-title">Social</h5>
                    <p class="card-text text-muted">Indicadores sociales relevantes del municipio.</p>
                    <span class="<?= $estado_social === 'completo' ? 'estado-completo' : 'estado-pendiente' ?>">
                        <?= $estado_social === 'completo' ? 'Completo' : 'Pendiente' ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card card-section h-100">
                <div class="card-body">
                    <div class="mb-3"><i class="fas fa-chart-line fa-2x icon-red"></i></div>
                    <h5 class="card-title">Económica</h5>
                    <p class="card-text text-muted">Datos económicos y de desarrollo municipal.</p>
                    <span class="<?= $estado_economica === 'completo' ? 'estado-completo' : 'estado-pendiente' ?>">
                        <?= $estado_economica === 'completo' ? 'Completo' : 'Pendiente' ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Incluir el footer
include 'footer.php';
?> 