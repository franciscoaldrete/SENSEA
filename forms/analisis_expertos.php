<?php
// Configurar zona horaria para México
date_default_timezone_set('America/Mexico_City');

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

// Definir título de la página para el header
$titulo_pagina = 'Análisis de Expertos';
include 'header.php';
?>

<style>
    body {
        background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 100%);
        font-family: 'Inter', sans-serif;
    }
    
    .analysis-card {
        border: none;
        border-radius: 1.5rem;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        padding: 2rem;
        background: #fff;
        margin-bottom: 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .analysis-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    }
    
    .analysis-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--card-color-1), var(--card-color-2));
    }
    
    .analysis-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.8;
    }
    
    .analysis-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #1d3557;
    }
    
    .analysis-description {
        font-size: 1rem;
        color: #6c757d;
        line-height: 1.5;
    }
    
    .analysis-status {
        position: absolute;
        top: 1rem;
        right: 1rem;
        padding: 0.25rem 0.75rem;
        border-radius: 1rem;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .status-pending {
        background: #fff3cd;
        color: #856404;
    }
    
    .status-complete {
        background: #d4edda;
        color: #155724;
    }
    
    /* Colores específicos para cada tarjeta */
    .card-social-ambiental {
        --card-color-1: #4facfe;
        --card-color-2: #00f2fe;
    }
    
    .card-social-economico {
        --card-color-1: #f093fb;
        --card-color-2: #f5576c;
    }
    
    .card-ambiental-economico {
        --card-color-1: #43e97b;
        --card-color-2: #38f9d7;
    }
    
    .card-ambiental-social {
        --card-color-1: #fa709a;
        --card-color-2: #fee140;
    }
    
    .card-economico-ambiental {
        --card-color-1: #a8edea;
        --card-color-2: #fed6e3;
    }
    
    .card-economico-social {
        --card-color-1: #ffecd2;
        --card-color-2: #fcb69f;
    }
    
    .page-header {
        text-align: center;
        margin-bottom: 3rem;
    }
    
    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1d3557;
        margin-bottom: 1rem;
    }
    
    .page-subtitle {
        font-size: 1.2rem;
        color: #6c757d;
        max-width: 600px;
        margin: 0 auto;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .analysis-card {
            padding: 1.5rem;
        }
        
        .analysis-icon {
            font-size: 2.5rem;
        }
        
        .analysis-title {
            font-size: 1.3rem;
        }
        
        .page-title {
            font-size: 2rem;
        }
    }
</style>

<div class="container py-4">
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-chart-line me-3 text-primary"></i>Análisis de Expertos
        </h1>
        <p class="page-subtitle">
            Selecciona el tipo de análisis que deseas realizar para construir relaciones entre diferentes factores
        </p>
    </div>

    <div class="row">
        <!-- Social - Ambiental -->
        <div class="col-lg-6 col-md-6">
            <div class="analysis-card card-social-ambiental" onclick="navegarAnalisis('social-ambiental')">
                <div class="analysis-status status-pending">
                    <i class="fas fa-clock me-1"></i>Pendiente
                </div>
                <div class="text-center">
                    <div class="analysis-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="analysis-title">Social - Ambiental</h3>
                    <p class="analysis-description">
                        Variables para construir una relación entre factores sociales que afectan el medio ambiente
                    </p>
                </div>
            </div>
        </div>

        <!-- Social - Económico -->
        <div class="col-lg-6 col-md-6">
            <div class="analysis-card card-social-economico" onclick="navegarAnalisis('social-economico')">
                <div class="analysis-status status-pending">
                    <i class="fas fa-clock me-1"></i>Pendiente
                </div>
                <div class="text-center">
                    <div class="analysis-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="analysis-title">Social - Económico</h3>
                    <p class="analysis-description">
                        Variables para construir una relación entre factores sociales que afectan la economía
                    </p>
                </div>
            </div>
        </div>

        <!-- Ambiental - Económico -->
        <div class="col-lg-6 col-md-6">
            <div class="analysis-card card-ambiental-economico" onclick="navegarAnalisis('ambiental-economico')">
                <div class="analysis-status status-pending">
                    <i class="fas fa-clock me-1"></i>Pendiente
                </div>
                <div class="text-center">
                    <div class="analysis-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="analysis-title">Ambiental - Económico</h3>
                    <p class="analysis-description">
                        Variables para construir una relación entre factores ambientales que afectan la economía
                    </p>
                </div>
            </div>
        </div>

        <!-- Ambiental - Social -->
        <div class="col-lg-6 col-md-6">
            <div class="analysis-card card-ambiental-social" onclick="navegarAnalisis('ambiental-social')">
                <div class="analysis-status status-pending">
                    <i class="fas fa-clock me-1"></i>Pendiente
                </div>
                <div class="text-center">
                    <div class="analysis-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h3 class="analysis-title">Ambiental - Social</h3>
                    <p class="analysis-description">
                        Variables para construir una relación entre factores ambientales que afectan lo social
                    </p>
                </div>
            </div>
        </div>

        <!-- Económico - Ambiental -->
        <div class="col-lg-6 col-md-6">
            <div class="analysis-card card-economico-ambiental" onclick="navegarAnalisis('economico-ambiental')">
                <div class="analysis-status status-pending">
                    <i class="fas fa-clock me-1"></i>Pendiente
                </div>
                <div class="text-center">
                    <div class="analysis-icon">
                        <i class="fas fa-coins"></i>
                    </div>
                    <h3 class="analysis-title">Económico - Ambiental</h3>
                    <p class="analysis-description">
                        Variables para construir una relación entre factores económicos que afectan el medio ambiente
                    </p>
                </div>
            </div>
        </div>

        <!-- Económico - Social -->
        <div class="col-lg-6 col-md-6">
            <div class="analysis-card card-economico-social" onclick="navegarAnalisis('economico-social')">
                <div class="analysis-status status-pending">
                    <i class="fas fa-clock me-1"></i>Pendiente
                </div>
                <div class="text-center">
                    <div class="analysis-icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h3 class="analysis-title">Económico - Social</h3>
                    <p class="analysis-description">
                        Variables para construir una relación entre factores económicos que afectan lo social
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function navegarAnalisis(tipo) {
    // Por ahora, mostrar un mensaje de que la página está en desarrollo
    const mensajes = {
        'social-ambiental': 'Análisis Social - Ambiental',
        'social-economico': 'Análisis Social - Económico',
        'ambiental-economico': 'Análisis Ambiental - Económico',
        'ambiental-social': 'Análisis Ambiental - Social',
        'economico-ambiental': 'Análisis Económico - Ambiental',
        'economico-social': 'Análisis Económico - Social'
    };
    
    const mensaje = mensajes[tipo];
    
    if (confirm(`¿Deseas continuar con el ${mensaje}?\n\nEsta funcionalidad está en desarrollo.`)) {
        // Aquí se agregarán las páginas específicas cuando estén listas
        alert('Página en desarrollo. Próximamente disponible.');
        // window.location.href = `analisis_${tipo}.php`;
    }
}

// Agregar efecto hover con sonido (opcional)
document.querySelectorAll('.analysis-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-8px) scale(1.02)';
    });
    
    card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
    });
});
</script>

<?php include 'footer.php'; ?> 