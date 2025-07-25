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
    $id_entidad = isset($_GET['id_entidad']) ? intval($_GET['id_entidad']) : 0;
    if ($id_entidad <= 0) {
        die('Entidad no especificada.');
    }
    $errores = [];
    $exito = false;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fuente_datos = trim($_POST['fuente_datos'] ?? '');
        $valores = [];
        for ($i = 1; $i <= 11; $i++) {
            $campo = 'R' . $i;
            $val = trim($_POST[$campo] ?? '');
            if ($val === '') {
                $errores[] = "El campo $campo es obligatorio.";
            }
            $valores[$campo] = $val;
        }
        if (empty($fuente_datos)) {
            $errores[] = 'El campo fuente de datos es obligatorio.';
        }
        if (empty($errores)) {
            // Asegurar que todos los valores estén definidos
            $R1 = $valores['R1'] ?? '';
            $R2 = $valores['R2'] ?? '';
            $R3 = $valores['R3'] ?? '';
            $R4 = $valores['R4'] ?? '';
            $R5 = $valores['R5'] ?? '';
            $R6 = intval($valores['R6'] ?? 0);
            $R7 = intval($valores['R7'] ?? 0);
            $R8 = intval($valores['R8'] ?? 0);
            $R9 = intval($valores['R9'] ?? 0);
            $R10 = intval($valores['R10'] ?? 0);
            $R11 = intval($valores['R11'] ?? 0);
            
            $stmt = $conn->prepare("INSERT INTO datoslocalizacion (id_entidad, fuente_datos, R1, R2, R3, R4, R5, R6, R7, R8, R9, R10, R11) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            if ($stmt === false) {
                $errores[] = 'Error en la consulta de inserción: ' . $conn->error;
            } else {
                $stmt->bind_param('issssssiiiiii', $id_entidad, $fuente_datos, $R1, $R2, $R3, $R4, $R5, $R6, $R7, $R8, $R9, $R10, $R11);
                if ($stmt->execute()) {
                    $exito = true;
                    echo '<script>alert("Datos guardados correctamente.");window.location.href="captura_secciones.php?id_entidad=' . $id_entidad . '";</script>';
                    exit;
                } else {
                    $errores[] = 'Error al guardar: ' . $stmt->error;
                }
                $stmt->close();
            }
        }
    }
    // Obtener datos de la entidad
    $stmt = $conn->prepare("SELECT tipo_entidad, nombre_entidad, codigo_entidad, fuente_general FROM entidadesgeograficas WHERE id_entidad = ?");
    $stmt->bind_param('i', $id_entidad);
    $stmt->execute();
    $stmt->store_result();
    $tipo_entidad = $nombre_entidad = $codigo_entidad = $fuente_general = '';
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($tipo_entidad, $nombre_entidad, $codigo_entidad, $fuente_general);
        $stmt->fetch();
    }
    $stmt->close();
    // Definición de campos y descripciones (extraídas de Libro1.csv)
    $campos = [
        'R1' => ['Área de tierra (m²)', 'Land area', 'Área de tierra en metros cuadrados'],
        'R2' => ['Área de agua (m²)', 'Water area', 'Área de agua en metros cuadrados'],
        'R3' => ['Área de tierra (mi²)', 'Land area', 'Área de tierra en millas cuadradas'],
        'R4' => ['Área de agua (mi²)', 'Water area', 'Área de agua en millas cuadradas'],
        'R5' => ['Área total (mi²)', 'Total area', 'Área total en millas cuadradas'],
        'R6' => ['Área total (acres)', 'total area in acres', 'Área total en acres'],
        'R7' => ['Población 2010', 'Population Estimate (as of July 1) - 2010', 'Estimación de población al 1 de julio de 2010'],
        'R8' => ['Población 2015', 'Population Estimate (as of July 1) - 2015', 'Estimación de población al 1 de julio de 2015'],
        'R9' => ['Tierra no pública', 'Non public land [total area minus public land]', 'Total de tierra menos tierras públicas'],
        'R10' => ['Total de hogares', 'estimate; households by type - total households [HC01_VC03]', 'Hogares por tipo - hogares totales'],
        'R11' => ['Familias', 'estimate; households by type - total households - family households (families) [HC01_VC04]', 'Hogares por tipo - hogares familiares (familias)'],
    ];

    // Definir título de la página para el header
    $titulo_pagina = 'Captura de Localización y Demografía';

    // Incluir el header
    include 'header.php';
    ?>
    <style>
        body { background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 100%); font-family: 'Inter', sans-serif; }
        .form-card { border: none; border-radius: 1.5rem; box-shadow: 0 4px 24px rgba(0,0,0,0.08); padding: 2rem 2.5rem; background: #fff; margin-top: 2rem; }
        .form-title { color: #8e24aa; font-weight: 700; margin-bottom: 0.5rem; }
        .entidad-sub { color: #444; font-size: 1.1em; margin-bottom: 1.5rem; background: #f3e6fa; border-radius: 1rem; padding: 1rem 1.5rem; }
        .entidad-sub strong { color: #8e24aa; }
        .btn-primary { background: #8e24aa; border: none; }
        .btn-primary:hover { background: #d81b60; }
        .btn-cancelar { background: #fff; color: #8e24aa; border: 2px solid #8e24aa; transition: 0.2s; }
        .btn-cancelar:hover { background: #f3e6fa; color: #d81b60; border-color: #d81b60; }
        .required { color: #e63946; }
        .campo-desc { font-size: 0.98em; color: #222; margin-bottom: 0.2em; }
        .campo-desc-ing { font-size: 0.92em; color: #888; margin-bottom: 0.2em; }
        .progress { height: 1.2rem; border-radius: 0.75rem; background: #f3e6fa; margin-bottom: 1.5rem; }
        .progress-bar { background: linear-gradient(90deg, #8e24aa 0%, #d81b60 100%); font-weight: 600; font-size: 1em; }
        
        /* Barra de progreso sticky */
        .progress-sticky {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid #8e24aa;
            padding: 0.5rem 1rem;
            box-shadow: 0 2px 10px rgba(142, 36, 170, 0.2);
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(-100%);
        }
        
        .progress-sticky.show {
            opacity: 1;
            transform: translateY(0);
        }
        
        .progress-sticky .progress {
            margin-bottom: 0;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Ajustar el contenido principal para la barra sticky */
        .content-with-sticky {
            padding-top: 4rem;
        }
        .tarjeta-grupo { background: #f8f6fc; border-radius: 1.2rem; box-shadow: 0 2px 10px rgba(142,36,170,0.06); padding: 1.2rem 1.5rem; margin-bottom: 1.5rem; }
        .tarjeta-titulo { font-size: 1.2em; font-weight: 600; color: #8e24aa; display: flex; align-items: center; gap: 0.5em; margin-bottom: 1em; }
        .tarjeta-titulo .emoji { font-size: 1.5em; }
        @media (max-width: 600px) { .form-card { padding: 1rem 0.5rem; } }
    </style>

    <!-- Barra de progreso sticky -->
    <div class="progress-sticky" id="progressSticky">
        <div class="progress">
            <div id="barraProgresoSticky" class="progress-bar" role="progressbar" style="width: 0%">0%</div>
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center min-vh-100 content-with-sticky">
        <div class="form-card w-100" style="max-width: 1200px; width: 90vw;">
            <h2 class="form-title text-center mb-2"><i class="fas fa-map-marker-alt me-2 icon-purple"></i>Referencia geográfica / Demografía básica + integración</h2>
            <div class="entidad-sub mb-4">
                <strong><?= htmlspecialchars($tipo_entidad) ?></strong> | <?= htmlspecialchars($nombre_entidad) ?>
                <?php if ($codigo_entidad): ?> <span class="ms-2"><strong>Código:</strong> <?= htmlspecialchars($codigo_entidad) ?></span><?php endif; ?>
                <?php if ($fuente_general): ?> <span class="ms-2"><strong>Fuente:</strong> <?= htmlspecialchars($fuente_general) ?></span><?php endif; ?>
            </div>
            <!-- Barra de progreso original (oculta en móviles) -->
            <div class="progress mb-4 d-none d-md-block">
                <div id="barraProgreso" class="progress-bar" role="progressbar" style="width: 0%">0%</div>
            </div>
            <?php if ($errores): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errores as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form method="post" autocomplete="off" id="formLocalizacion">
                <div class="tarjeta-grupo mb-4">
                    <div class="tarjeta-titulo"><span class="emoji">🌎</span><i class="fas fa-map fa-lg"></i> Superficie y áreas</div>
                    <div class="row">
                    <?php foreach ([1,2,3,4,5,6] as $i): $campo = 'R'.$i; $info = $campos[$campo]; ?>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <label for="<?= $campo ?>" class="form-label">
                                <?= $info[0] ?> <span class="required">*</span>
                            </label>
                            <div class="campo-desc-ing"><i class="fas fa-language me-1"></i><?= $info[1] ?></div>
                            <div class="campo-desc text-muted"><i class="fas fa-info-circle me-1"></i><?= $info[2] ?></div>
                            <input type="text" name="<?= $campo ?>" id="<?= $campo ?>" class="form-control campo-captura" required>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div class="tarjeta-grupo mb-4">
                    <div class="tarjeta-titulo"><span class="emoji">👥</span><i class="fas fa-users fa-lg"></i> Demografía</div>
                    <div class="row">
                    <?php foreach ([7,8] as $i): $campo = 'R'.$i; $info = $campos[$campo]; ?>
                        <div class="col-md-6 mb-3">
                            <label for="<?= $campo ?>" class="form-label">
                                <?= $info[0] ?> <span class="required">*</span>
                            </label>
                            <div class="campo-desc-ing"><i class="fas fa-language me-1"></i><?= $info[1] ?></div>
                            <div class="campo-desc text-muted"><i class="fas fa-info-circle me-1"></i><?= $info[2] ?></div>
                            <input type="text" name="<?= $campo ?>" id="<?= $campo ?>" class="form-control campo-captura" required>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div class="tarjeta-grupo mb-4">
                    <div class="tarjeta-titulo"><span class="emoji">🏠</span><i class="fas fa-home fa-lg"></i> Tierra y hogares</div>
                    <div class="row">
                    <?php foreach ([9,10,11] as $i): $campo = 'R'.$i; $info = $campos[$campo]; ?>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <label for="<?= $campo ?>" class="form-label">
                                <?= $info[0] ?> <span class="required">*</span>
                            </label>
                            <div class="campo-desc-ing"><i class="fas fa-language me-1"></i><?= $info[1] ?></div>
                            <div class="campo-desc text-muted"><i class="fas fa-info-circle me-1"></i><?= $info[2] ?></div>
                            <input type="text" name="<?= $campo ?>" id="<?= $campo ?>" class="form-control campo-captura" required>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div class="tarjeta-grupo mb-4">
                    <div class="tarjeta-titulo"><span class="emoji">📄</span><i class="fas fa-database fa-lg"></i> Fuente de datos</div>
                    <div class="mb-3">
                        <label for="fuente_datos" class="form-label">Fuente de datos <span class="required">*</span></label>
                        <input type="text" name="fuente_datos" id="fuente_datos" class="form-control campo-captura" required>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-fill">Guardar <i class="fas fa-save ms-2"></i></button>
                    <button type="button" class="btn btn-cancelar flex-fill" onclick="cancelarCaptura()">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    // Barra de avance dinámica mejorada
    function actualizarBarra() {
        const total = document.querySelectorAll('.campo-captura').length;
        let llenos = 0;
        document.querySelectorAll('.campo-captura').forEach(el => {
            if (el.value.trim() !== '') llenos++;
        });
        const porcentaje = Math.round((llenos / total) * 100);
        
        // Actualizar ambas barras de progreso
        const barraOriginal = document.getElementById('barraProgreso');
        const barraSticky = document.getElementById('barraProgresoSticky');
        
        if (barraOriginal) {
            barraOriginal.style.width = porcentaje + '%';
            barraOriginal.textContent = porcentaje + '%';
        }
        
        if (barraSticky) {
            barraSticky.style.width = porcentaje + '%';
            barraSticky.textContent = porcentaje + '%';
        }
        
        // Efecto visual adicional para la barra sticky
        if (porcentaje > 0) {
            document.getElementById('progressSticky').style.boxShadow = '0 4px 20px rgba(142, 36, 170, 0.3)';
        } else {
            document.getElementById('progressSticky').style.boxShadow = '0 2px 10px rgba(142, 36, 170, 0.2)';
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
        
        // Efecto de aparición suave para la barra sticky
        setTimeout(() => {
            document.getElementById('progressSticky').classList.add('show');
        }, 100);
    });
    
    function cancelarCaptura() {
        if (confirm('¿Estás seguro que deseas cancelar? Los datos no se guardarán y se perderán los cambios.')) {
            window.location.href = 'captura_secciones.php?id_entidad=<?= $id_entidad ?>';
        }
    }
    </script>

    <?php
    // Incluir el footer
    include 'footer.php';
    ?> 