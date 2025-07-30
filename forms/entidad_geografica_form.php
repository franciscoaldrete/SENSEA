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

$errores = [];
$exito = false;
$entidad_existente = null;
$datos_a_insertar = [];

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

    // Buscar si ya existe la entidad (por nombre Y código)
    if (empty($errores)) {
        $stmt = $conn->prepare("SELECT id_entidad FROM entidadesgeograficas WHERE tipo_entidad = ? AND nombre_entidad = ? AND codigo_entidad = ? LIMIT 1");
        if ($stmt === false) {
            $errores[] = 'Error en la consulta de búsqueda: ' . $conn->error;
        } else {
            $stmt->bind_param('sss', $tipo_entidad, $nombre_entidad, $codigo_entidad);
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

    // Si no existe, preparar datos para confirmación
    if (empty($errores) && !$entidad_existente) {
        $datos_a_insertar = [
            'tipo_entidad' => $tipo_entidad,
            'nombre_entidad' => $nombre_entidad,
            'codigo_entidad' => $codigo_entidad,
            'fuente_general' => $fuente_general,
            'fecha_registro' => $fecha_registro
        ];
        
        // Insertar directamente (sin confirmación por ahora)
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

// Obtener todas las entidades existentes para la tabla
$entidades_existentes = [];
$stmt = $conn->prepare("SELECT id_entidad, tipo_entidad, nombre_entidad, codigo_entidad, fuente_general, fecha_registro FROM entidadesgeograficas ORDER BY nombre_entidad ASC");
if ($stmt && $stmt->execute()) {
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $entidades_existentes[] = $row;
    }
}
$stmt->close();

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
    .table-card {
        border: none;
        border-radius: 1.5rem;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        padding: 2rem;
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
    .entidad-row {
        cursor: pointer;
        transition: background-color 0.2s;
    }
    .entidad-row:hover {
        background-color: #f8f9fa;
    }
    .entidad-row.selected {
        background-color: #e3f2fd;
    }
    .search-highlight {
        background-color: #fff3cd;
        font-weight: bold;
    }
    .table-responsive {
        max-height: 400px;
        overflow-y: auto;
    }
    .form-control:focus {
        border-color: #1d3557;
        box-shadow: 0 0 0 0.2rem rgba(29, 53, 87, 0.25);
    }
</style>

<div class="container py-4">
    <div class="row">
        <!-- Formulario de captura -->
        <div class="col-lg-6">
            <div class="form-card">
                <h2 class="form-title text-center mb-4">
                    <i class="fas fa-map-marker-alt me-2 text-primary"></i>Captura de Entidad Geográfica
                </h2>
                
                <?php if ($errores): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach ($errores as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="post" autocomplete="off" id="entidadForm">
                    <div class="mb-3">
                        <label for="tipo_entidad">Tipo de entidad <span class="required">*</span>:</label>
                        <select name="tipo_entidad" id="tipo_entidad" required class="form-select">
                            <option value="">Seleccione...</option>
                            <option value="Municipio">Municipio</option>
                            <option value="Región">Región</option>
                            <option value="Zona">Zona</option>
                            <option value="Sección">Sección</option>
                            <option value="Ejido">Ejido</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nombre_entidad">Nombre de la entidad <span class="required">*</span>:</label>
                        <input type="text" name="nombre_entidad" id="nombre_entidad" maxlength="255" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="codigo_entidad">Código de la entidad:</label>
                        <input type="text" name="codigo_entidad" id="codigo_entidad" maxlength="50" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="fuente_general">Fuente general:</label>
                        <textarea name="fuente_general" id="fuente_general" rows="2" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-save me-2"></i>Guardar y continuar
                    </button>
                </form>
            </div>
        </div>

        <!-- Tabla de entidades existentes -->
        <div class="col-lg-6">
            <div class="table-card">
                <h3 class="form-title mb-3">
                    <i class="fas fa-list me-2 text-primary"></i>Entidades Existentes
                </h3>
                


                <div class="table-responsive">
                    <table class="table table-hover" id="entidadesTable">
                        <thead class="table-dark">
                            <tr>
                                <th>Tipo</th>
                                <th>Nombre</th>
                                <th>Código</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($entidades_existentes as $entidad): ?>
                                <tr class="entidad-row" data-id="<?= $entidad['id_entidad'] ?>" 
                                    data-tipo="<?= htmlspecialchars($entidad['tipo_entidad']) ?>"
                                    data-nombre="<?= htmlspecialchars($entidad['nombre_entidad']) ?>"
                                    data-codigo="<?= htmlspecialchars($entidad['codigo_entidad']) ?>"
                                    data-fuente="<?= htmlspecialchars($entidad['fuente_general']) ?>">
                                    <td><?= htmlspecialchars($entidad['tipo_entidad']) ?></td>
                                    <td><?= htmlspecialchars($entidad['nombre_entidad']) ?></td>
                                    <td><?= htmlspecialchars($entidad['codigo_entidad']) ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary seleccionar-entidad">
                                            <i class="fas fa-check"></i> Seleccionar
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const entidadesTable = document.getElementById('entidadesTable');
    const entidadForm = document.getElementById('entidadForm');
    
    // Campos del formulario para filtrado
    const tipoInput = document.getElementById('tipo_entidad');
    const nombreInput = document.getElementById('nombre_entidad');
    const codigoInput = document.getElementById('codigo_entidad');
    
    // Función para filtrar la tabla
    function filtrarTabla() {
        const tipoFiltro = tipoInput.value.toLowerCase().trim();
        const nombreFiltro = nombreInput.value.toLowerCase().trim();
        const codigoFiltro = codigoInput.value.toLowerCase().trim();
        
        const rows = entidadesTable.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const tipo = row.getAttribute('data-tipo').toLowerCase();
            const nombre = row.getAttribute('data-nombre').toLowerCase();
            const codigo = row.getAttribute('data-codigo').toLowerCase();
            
            // Filtrado AND: todos los campos deben coincidir si están llenos
            let matches = true;
            
            if (tipoFiltro && !tipo.includes(tipoFiltro)) {
                matches = false;
            }
            if (nombreFiltro && !nombre.includes(nombreFiltro)) {
                matches = false;
            }
            if (codigoFiltro && !codigo.includes(codigoFiltro)) {
                matches = false;
            }
            
            row.style.display = matches ? '' : 'none';
        });
    }
    
    // Eventos para filtrado en tiempo real
    tipoInput.addEventListener('input', filtrarTabla);
    nombreInput.addEventListener('input', filtrarTabla);
    codigoInput.addEventListener('input', filtrarTabla);
    
    // Seleccionar entidad de la tabla
    document.querySelectorAll('.seleccionar-entidad').forEach(btn => {
        btn.addEventListener('click', function() {
            const row = this.closest('tr');
            const id = row.getAttribute('data-id');
            const tipo = row.getAttribute('data-tipo');
            const nombre = row.getAttribute('data-nombre');
            const codigo = row.getAttribute('data-codigo');
            const fuente = row.getAttribute('data-fuente');
            
            // Llenar el formulario
            document.getElementById('tipo_entidad').value = tipo;
            document.getElementById('nombre_entidad').value = nombre;
            document.getElementById('codigo_entidad').value = codigo;
            document.getElementById('fuente_general').value = fuente;
            
            // Confirmar y continuar
            if (confirm(`¿Deseas continuar con la entidad seleccionada?\n\nTipo: ${tipo}\nNombre: ${nombre}\nCódigo: ${codigo}`)) {
                window.location.href = `captura_secciones.php?id_entidad=${id}`;
            }
        });
    });
    
    // Validación antes de enviar
    entidadForm.addEventListener('submit', function(e) {
        const tipo = document.getElementById('tipo_entidad').value.trim();
        const nombre = document.getElementById('nombre_entidad').value.trim();
        const codigo = document.getElementById('codigo_entidad').value.trim();
        
        if (!tipo || !nombre) {
            alert('Por favor completa los campos obligatorios.');
            e.preventDefault();
            return;
        }
        
        // Verificar si ya existe
        const rows = entidadesTable.querySelectorAll('tbody tr');
        let existe = false;
        
        rows.forEach(row => {
            const rowTipo = row.getAttribute('data-tipo');
            const rowNombre = row.getAttribute('data-nombre');
            const rowCodigo = row.getAttribute('data-codigo');
            
            if (rowTipo === tipo && rowNombre === nombre && rowCodigo === codigo) {
                existe = true;
            }
        });
        
        if (existe) {
            alert('Esta entidad ya existe. Por favor selecciónala de la tabla.');
            e.preventDefault();
            return;
        }
        
        // Confirmar inserción
        const datos = `Tipo: ${tipo}\nNombre: ${nombre}\nCódigo: ${codigo}`;
        if (!confirm(`Entidad no existente. ¿Deseas darla de alta?\n\n${datos}`)) {
            e.preventDefault();
            return;
        }
    });
});
</script>

<?php include 'footer.php'; ?> 