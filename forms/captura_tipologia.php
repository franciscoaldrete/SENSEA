<?php
// Configuración de conexión
$host = 'localhost';
$user = 'fcoalder_sensea';
$pass = 'Sensea2025';
$db = 'fcoalder_SENSEA';

// Obtener id_entidad de la URL
$id_entidad = isset($_GET['id_entidad']) ? intval($_GET['id_entidad']) : 0;

if ($id_entidad == 0) {
    header('Location: captura_secciones.php');
    exit;
}

// Conectar a la base de datos
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener información de la entidad
$stmt = $conn->prepare("SELECT * FROM entidadesgeograficas WHERE id_entidad = ?");
if (!$stmt) {
    die("Error en prepare: " . $conn->error);
}

$stmt->bind_param("i", $id_entidad);
$stmt->execute();
$result = $stmt->get_result();
$entidad = $result->fetch_assoc();

if (!$entidad) {
    header('Location: captura_secciones.php');
    exit;
}

// Procesar formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $t1 = $_POST['t1'] ?? '';
    $t2 = $_POST['t2'] ?? '';
    $t3 = $_POST['t3'] ?? '';
    $t4 = $_POST['t4'] ?? '';
    $t5 = $_POST['t5'] ?? '';
    $t6 = $_POST['t6'] ?? '';
    $t7 = $_POST['t7'] ?? '';
    $t8 = $_POST['t8'] ?? '';
    $t9 = $_POST['t9'] ?? '';
    $t10 = $_POST['t10'] ?? '';
    $t11 = $_POST['t11'] ?? '';
    $t12 = $_POST['t12'] ?? '';
    $fuente_datos = $_POST['fuente_datos'] ?? '';

    // Insertar en la base de datos
    $stmt = $conn->prepare("INSERT INTO tipologiaterritorial (id_entidad, t1, t2, t3, t4, t5, t6, t7, t8, t9, t10, t11, t12, fuente_datos) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        die("Error en prepare: " . $conn->error);
    }

    $stmt->bind_param("isssssssssssss", $id_entidad, $t1, $t2, $t3, $t4, $t5, $t6, $t7, $t8, $t9, $t10, $t11, $t12, $fuente_datos);
    
    if ($stmt->execute()) {
        echo "<script>alert('Datos guardados correctamente'); window.location.href='captura_secciones.php?id_entidad=" . $id_entidad . "';</script>";
    } else {
        echo "<script>alert('Error al guardar: " . $stmt->error . "');</script>";
    }
}

$titulo_pagina = "Tipología Territorial";
include 'header.php';
?>

<style>
    body {
        background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 100%);
        font-family: 'Inter', sans-serif;
    }
    
    .form-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }
    
    .entity-info {
        background: linear-gradient(135deg, #8e24aa 0%, #d81b60 100%);
        color: white;
        padding: 1.5rem;
        border-radius: 1rem;
        margin-bottom: 2rem;
        text-align: center;
    }
    
    .entity-info h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }
    
    .entity-info p {
        margin: 0.5rem 0 0 0;
        opacity: 0.9;
    }
    
    .form-card {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border: 1px solid rgba(142, 36, 170, 0.1);
    }
    
    .form-card h3 {
        color: #8e24aa;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
        display: block;
    }
    
    .form-control {
        border: 2px solid #e5e7eb;
        border-radius: 0.5rem;
        padding: 0.75rem;
        transition: all 0.2s;
    }
    
    .form-control:focus {
        border-color: #8e24aa;
        box-shadow: 0 0 0 3px rgba(142, 36, 170, 0.1);
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #8e24aa 0%, #d81b60 100%);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 0.5rem;
        font-weight: 600;
        transition: all 0.2s;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(142, 36, 170, 0.3);
    }
    
    .btn-secondary {
        background: #6b7280;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 0.5rem;
        font-weight: 600;
        transition: all 0.2s;
    }
    
    .btn-secondary:hover {
        background: #4b5563;
        transform: translateY(-2px);
    }
    
    .progress-container {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    
    .progress {
        height: 1rem;
        border-radius: 0.5rem;
        background: #e5e7eb;
        overflow: hidden;
    }
    
    .progress-bar {
        background: linear-gradient(90deg, #8e24aa 0%, #d81b60 100%);
        transition: width 0.3s ease;
    }
    
    /* Barra de progreso debajo del header */
    .progress-header {
        position: fixed;
        top: 80px; /* Debajo del header */
        left: 0;
        right: 0;
        z-index: 999;
        background: linear-gradient(135deg, #8e24aa 0%, #d81b60 100%);
        color: white;
        padding: 0.75rem 1rem;
        box-shadow: 0 4px 20px rgba(142, 36, 170, 0.3);
        transition: all 0.3s ease;
        transform: translateY(-100%);
        opacity: 0;
    }
    
    .progress-header.show {
        transform: translateY(0);
        opacity: 1;
    }
    
    .progress-header.hidden {
        transform: translateY(-100%);
        opacity: 0;
    }
    
    .progress-header-content {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
    }
    
    .progress-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex: 1;
    }
    
    .progress-title {
        font-weight: 600;
        font-size: 1rem;
        white-space: nowrap;
    }
    
    .progress-stats {
        display: flex;
        align-items: center;
        gap: 1rem;
        font-size: 0.9rem;
    }
    
    .progress-bar-container {
        flex: 1;
        max-width: 300px;
    }
    
    .progress-header .progress {
        height: 0.8rem;
        background: rgba(255, 255, 255, 0.2);
        margin: 0;
    }
    
    .progress-header .progress-bar {
        background: rgba(255, 255, 255, 0.9);
        color: #8e24aa;
        font-weight: 600;
        font-size: 0.8rem;
    }
    
    .progress-controls {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .progress-btn {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
        padding: 0.3rem 0.6rem;
        border-radius: 0.5rem;
        font-size: 0.8rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .progress-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-1px);
    }
    
    .time-estimate {
        font-size: 0.8rem;
        opacity: 0.9;
    }
</style>

<!-- Barra de progreso debajo del header -->
<div class="progress-header" id="progressHeader">
    <div class="progress-header-content">
        <div class="progress-info">
            <div class="progress-title">
                <i class="fas fa-chart-line me-2"></i>
                Avance de captura: Tipología Territorial (ERS Codes)
            </div>
            <div class="progress-stats">
                <span id="progressPercentage">0%</span>
                <span id="progressFields">0/12 campos</span>
            </div>
        </div>
        <div class="progress-bar-container">
            <div class="progress">
                <div id="barraProgresoHeader" class="progress-bar" role="progressbar" style="width: 0%">0%</div>
            </div>
        </div>
        <div class="progress-controls">
            <button class="progress-btn" onclick="toggleProgress()" title="Ocultar/Mostrar barra">
                <i class="fas fa-eye"></i>
            </button>
            <button class="progress-btn" onclick="goToNextEmpty()" title="Ir al siguiente campo vacío">
                <i class="fas fa-arrow-down"></i>
            </button>
            <div class="time-estimate" id="timeEstimate">
                <i class="fas fa-clock me-1"></i>
                <span id="timeText">~5 min</span>
            </div>
        </div>
    </div>
</div>

<div class="form-container">
    <!-- Información de la entidad -->
    <div class="entity-info">
        <h2><i class="fas fa-map-marker-alt me-2"></i><?= htmlspecialchars($entidad['tipo_entidad']) ?>: <?= htmlspecialchars($entidad['nombre_entidad']) ?></h2>
        <p>Código: <?= htmlspecialchars($entidad['codigo_entidad']) ?> | Fuente: <?= htmlspecialchars($entidad['fuente_general']) ?></p>
    </div>

    <!-- Barra de progreso -->
    <div class="progress-container">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>Progreso de captura</h5>
            <span id="porcentajeTexto">0% completado</span>
        </div>
        <div class="progress">
            <div id="barraProgreso" class="progress-bar" role="progressbar" style="width: 0%">0%</div>
        </div>
    </div>

    <form method="POST" id="formTipologia">
        <!-- Tipología Territorial -->
        <div class="form-card">
            <h3><i class="fas fa-layer-group me-2"></i>Tipología Territorial (ERS Codes)</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">T1 - Clasificación ERS</label>
                        <input type="text" class="form-control campo-captura" name="t1" required>
                        <small class="text-muted">Clasificación según códigos ERS (Economic Research Service)</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">T2 - Tipo de Área</label>
                        <input type="text" class="form-control campo-captura" name="t2" required>
                        <small class="text-muted">Clasificación del tipo de área territorial</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">T3 - Zona Geográfica</label>
                        <input type="text" class="form-control campo-captura" name="t3" required>
                        <small class="text-muted">Identificación de la zona geográfica específica</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">T4 - Características Territoriales</label>
                        <input type="text" class="form-control campo-captura" name="t4" required>
                        <small class="text-muted">Características específicas del territorio</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">T5 - Clasificación Urbana/Rural</label>
                        <input type="text" class="form-control campo-captura" name="t5" required>
                        <small class="text-muted">Clasificación urbana o rural del área</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">T6 - Densidad Poblacional</label>
                        <input type="text" class="form-control campo-captura" name="t6" required>
                        <small class="text-muted">Densidad de población del área</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">T7 - Accesibilidad</label>
                        <input type="text" class="form-control campo-captura" name="t7" required>
                        <small class="text-muted">Nivel de accesibilidad del área</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">T8 - Conectividad</label>
                        <input type="text" class="form-control campo-captura" name="t8" required>
                        <small class="text-muted">Nivel de conectividad del área</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">T9 - Infraestructura Básica</label>
                        <input type="text" class="form-control campo-captura" name="t9" required>
                        <small class="text-muted">Disponibilidad de infraestructura básica</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">T10 - Servicios Públicos</label>
                        <input type="text" class="form-control campo-captura" name="t10" required>
                        <small class="text-muted">Cobertura de servicios públicos</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">T11 - Capacidad Institucional</label>
                        <input type="text" class="form-control campo-captura" name="t11" required>
                        <small class="text-muted">Capacidad institucional del área</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">T12 - Potencial de Desarrollo</label>
                        <input type="text" class="form-control campo-captura" name="t12" required>
                        <small class="text-muted">Potencial de desarrollo del área</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fuente de Datos -->
        <div class="form-card">
            <h3><i class="fas fa-database me-2"></i>Fuente de Datos</h3>
            <div class="form-group">
                <label class="form-label">Fuente de Datos</label>
                <input type="text" class="form-control campo-captura" name="fuente_datos" required>
                <small class="text-muted">Especificar la fuente de los datos capturados</small>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" onclick="cancelarCaptura()">
                <i class="fas fa-times me-2"></i>Cancelar
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Guardar Datos
            </button>
        </div>
    </form>
</div>

<script>
    // Variables globales
    let progressHidden = false;
    let startTime = Date.now();
    
    // Barra de avance dinámica mejorada
    function actualizarBarra() {
        const total = document.querySelectorAll('.campo-captura').length;
        let llenos = 0;
        document.querySelectorAll('.campo-captura').forEach(el => {
            if (el.value.trim() !== '') llenos++;
        });
        const porcentaje = Math.round((llenos / total) * 100);
        
        // Actualizar barra original
        const barraOriginal = document.getElementById('barraProgreso');
        if (barraOriginal) {
            barraOriginal.style.width = porcentaje + '%';
            barraOriginal.textContent = porcentaje + '%';
        }
        
        // Actualizar barra del header
        const barraHeader = document.getElementById('barraProgresoHeader');
        if (barraHeader) {
            barraHeader.style.width = porcentaje + '%';
            barraHeader.textContent = porcentaje + '%';
        }
        
        // Actualizar estadísticas
        const progressPercentage = document.getElementById('progressPercentage');
        const progressFields = document.getElementById('progressFields');
        const porcentajeTexto = document.getElementById('porcentajeTexto');
        
        if (progressPercentage) progressPercentage.textContent = porcentaje + '%';
        if (progressFields) progressFields.textContent = llenos + '/' + total + ' campos';
        if (porcentajeTexto) porcentajeTexto.textContent = porcentaje + '% completado';
        
        // Actualizar tiempo estimado
        actualizarTiempoEstimado(porcentaje, total, llenos);
    }
    
    // Calcular tiempo estimado
    function actualizarTiempoEstimado(porcentaje, total, llenos) {
        const tiempoTranscurrido = (Date.now() - startTime) / 1000; // en segundos
        const tiempoPorCampo = llenos > 0 ? tiempoTranscurrido / llenos : 30; // 30 segundos por defecto
        const camposRestantes = total - llenos;
        const tiempoRestante = camposRestantes * tiempoPorCampo;
        
        const timeText = document.getElementById('timeText');
        if (timeText) {
            if (porcentaje === 100) {
                timeText.textContent = '¡Completado!';
            } else if (tiempoRestante < 60) {
                timeText.textContent = `~${Math.round(tiempoRestante)}s`;
            } else if (tiempoRestante < 3600) {
                timeText.textContent = `~${Math.round(tiempoRestante / 60)}m`;
            } else {
                timeText.textContent = `~${Math.round(tiempoRestante / 3600)}h`;
            }
        }
    }
    
    // Ocultar/Mostrar barra de progreso
    function toggleProgress() {
        const progressHeader = document.getElementById('progressHeader');
        const toggleBtn = document.querySelector('.progress-btn i.fa-eye, .progress-btn i.fa-eye-slash');
        
        if (progressHidden) {
            progressHeader.classList.remove('hidden');
            progressHeader.classList.add('show');
            toggleBtn.className = 'fas fa-eye';
            progressHidden = false;
        } else {
            progressHeader.classList.remove('show');
            progressHeader.classList.add('hidden');
            toggleBtn.className = 'fas fa-eye-slash';
            progressHidden = true;
        }
    }
    
    // Ir al siguiente campo vacío
    function goToNextEmpty() {
        const campos = document.querySelectorAll('.campo-captura');
        for (let campo of campos) {
            if (campo.value.trim() === '') {
                campo.focus();
                campo.scrollIntoView({ behavior: 'smooth', block: 'center' });
                break;
            }
        }
    }
    
    // Ejecutar inmediatamente cuando se carga la página
    actualizarBarra();
    
    document.addEventListener('DOMContentLoaded', function() {
        // Agregar event listeners a todos los campos
        document.querySelectorAll('.campo-captura').forEach(el => {
            el.addEventListener('input', actualizarBarra);
            el.addEventListener('change', actualizarBarra);
            el.addEventListener('blur', actualizarBarra);
        });
        
        // Actualizar la barra inicial
        actualizarBarra();
        
        // Mostrar la barra de progreso con animación
        setTimeout(() => {
            document.getElementById('progressHeader').classList.add('show');
        }, 100);
    });
    
    function cancelarCaptura() {
        if (confirm('¿Estás seguro que deseas cancelar? Los datos no se guardarán y se perderán los cambios.')) {
            window.location.href = 'captura_secciones.php?id_entidad=<?= $id_entidad ?>';
        }
    }
</script>

<?php include 'footer.php'; ?> 