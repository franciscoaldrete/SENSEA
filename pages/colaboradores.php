<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colaboradores - SENSEA</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body>
    <!-- Header Component -->
    <header class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="../index.html">
                <i class="fas fa-chart-line me-2"></i>SENSEA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html#vision">Visión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html#metodologia">Metodología</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html#indicadores">Indicadores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="colaboradores.html">Colaboradores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light btn-sm ms-2" href="../forms/captura-datos.html">
                            <i class="fas fa-edit me-1"></i>Captura Datos
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <div class="hero-badge mb-4">
                        <span class="badge bg-warning text-white px-3 py-2">
                            <i class="fas fa-users me-2"></i>Equipos de Trabajo SENSEA
                        </span>
                    </div>
                    <h1 class="display-3 fw-bold mb-4">
                        Nuestros Colaboradores
                    </h1>
                    <p class="lead mb-4 fs-5">
                        Conoce al equipo multidisciplinario de investigadores y expertos que desarrollan 
                        el proyecto "Sistema de Evaluación de indicadores Sociales, Económicos y Ambientales".
                    </p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <button class="btn btn-primary btn-lg team-tab active" data-team="equipo-1">
                            <i class="fas fa-search me-2"></i>Equipo 1: Análisis
                        </button>
                        <button class="btn btn-outline-light btn-lg team-tab" data-team="equipo-2">
                            <i class="fas fa-clipboard-list me-2"></i>Equipo 2: Campo
                        </button>
                        <button class="btn btn-outline-light btn-lg team-tab" data-team="equipo-3">
                            <i class="fas fa-rocket me-2"></i>Equipo 3: Estrategias
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-scroll-indicator">
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    <!-- Equipo 1: Análisis y Diagnóstico Section -->
    <section id="equipo-1" class="py-5 team-section active">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">
                    <i class="fas fa-search me-3"></i>Equipo 1: Análisis y Diagnóstico
                </h2>
                <p class="section-subtitle">Etapa 1: Abril - Octubre 2025</p>
                <div class="team-objective">
                    <p class="lead">Recopilar y analizar información sobre la competitividad regional, consolidando bases de datos y generando un diagnóstico inicial.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dra. Laura Cristina Piñón Howlet</h4>
                            <p class="collaborator-title">Evaluación de Competitividad</p>
                            <p class="collaborator-institution">Facultad de Contaduría y Administración</p>
                            <p class="collaborator-description">
                                Evaluación de la competitividad a través de herramientas de innovación tecnológica y gestión administrativa.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-primary">Innovación Tecnológica</span>
                                <span class="badge bg-secondary">Gestión Administrativa</span>
                                <span class="badge bg-success">Evaluación</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Alma Lilia Sapién Aguilar</h4>
                            <p class="collaborator-title">Análisis Administrativo</p>
                            <p class="collaborator-institution">Facultad de Contaduría y Administración</p>
                            <p class="collaborator-description">
                                Análisis de los factores administrativos que influyen en la competitividad y desarrollo empresarial.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-info">Factores Administrativos</span>
                                <span class="badge bg-warning">Desarrollo Empresarial</span>
                                <span class="badge bg-danger">Análisis</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dr. Omar Elier Varela Faudoa</h4>
                            <p class="collaborator-title">Coordinación Macroecónomica</p>
                            <p class="collaborator-institution">Finanzas, Economía y Estadística</p>
                            <p class="collaborator-description">
                                Coordinación de análisis macroeconómico y modelado de datos.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-dark">Análisis Macroecónomico</span>
                                <span class="badge bg-primary">Modelado de Datos</span>
                                <span class="badge bg-secondary">Estadística</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dra. Berenice Núñez Meléndez</h4>
                            <p class="collaborator-title">Gestión de Información</p>
                            <p class="collaborator-institution">Economía y Bases de Datos</p>
                            <p class="collaborator-description">
                                Gestión y análisis de información de fuentes oficiales.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-success">Bases de Datos</span>
                                <span class="badge bg-info">Fuentes Oficiales</span>
                                <span class="badge bg-warning">Gestión</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dra. Marisol García Alvarado</h4>
                            <p class="collaborator-title">Supervisión Metodológica</p>
                            <p class="collaborator-institution">Investigación y Administración</p>
                            <p class="collaborator-description">
                                Supervisión metodológica y estructuración de bases de datos.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-danger">Metodología</span>
                                <span class="badge bg-primary">Supervisión</span>
                                <span class="badge bg-secondary">Estructuración</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Candidata a Doctora Gloria Antonieta Martínez Caro</h4>
                            <p class="collaborator-title">Análisis de Literatura</p>
                            <p class="collaborator-institution">Investigación y Administración</p>
                            <p class="collaborator-description">
                                Apoyo en análisis de literatura y antecedentes.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-info">Literatura</span>
                                <span class="badge bg-warning">Antecedentes</span>
                                <span class="badge bg-success">Investigación</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dr. Juan Javier Gutiérrez García</h4>
                            <p class="collaborator-title">Procesamiento de Datos</p>
                            <p class="collaborator-institution">Sistemas</p>
                            <p class="collaborator-description">
                                Procesamiento y organización de bases de datos.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-dark">Procesamiento</span>
                                <span class="badge bg-primary">Organización</span>
                                <span class="badge bg-secondary">Sistemas</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dra. María del Carmen Gutiérrez Diez</h4>
                            <p class="collaborator-title">Responsable Técnico</p>
                            <p class="collaborator-institution">Sistemas</p>
                            <p class="collaborator-description">
                                Responsable técnico, supervisión y toma de decisiones.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-danger">Responsable Técnico</span>
                                <span class="badge bg-primary">Supervisión</span>
                                <span class="badge bg-secondary">Toma de Decisiones</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>M.A. Cynthia Guadalupe Parra Almada</h4>
                            <p class="collaborator-title">Tesista Doctoral</p>
                            <p class="collaborator-institution">Tesista Doctoral</p>
                            <p class="collaborator-description">
                                Recopilación de artículos para arco teórico.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-info">Recopilación</span>
                                <span class="badge bg-warning">Arco Teórico</span>
                                <span class="badge bg-success">Investigación</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Equipo 2: Trabajo de Campo Section -->
    <section id="equipo-2" class="py-5 bg-gradient-light team-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">
                    <i class="fas fa-clipboard-list me-3"></i>Equipo 2: Trabajo de Campo y Evaluación
                </h2>
                <p class="section-subtitle">Etapa 2: Noviembre 2025 - Abril 2026</p>
                <div class="team-objective">
                    <p class="lead">Aplicar encuestas en distintas regiones de Chihuahua, evaluar factores críticos de competitividad y validar los resultados mediante visitas in situ.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dr. Omar Elier Varela Faudoa</h4>
                            <p class="collaborator-title">Análisis Estadístico</p>
                            <p class="collaborator-institution">Finanzas, Economía y Estadística</p>
                            <p class="collaborator-description">
                                Responsable del análisis estadístico de las encuestas y modelado de correlaciones.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-primary">Análisis Estadístico</span>
                                <span class="badge bg-secondary">Modelado</span>
                                <span class="badge bg-success">Correlaciones</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Candidato a Doctor Héctor Hugo Domínguez Aragón</h4>
                            <p class="collaborator-title">Coordinación de Campo</p>
                            <p class="collaborator-institution">Recursos Humanos y Administración</p>
                            <p class="collaborator-description">
                                Coordinación de encuestadores y gestión del trabajo de campo.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-info">Coordinación</span>
                                <span class="badge bg-warning">Trabajo de Campo</span>
                                <span class="badge bg-danger">Gestión</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dra. Marisol Priscila Palafox Bolívar</h4>
                            <p class="collaborator-title">Diseño de Encuestas</p>
                            <p class="collaborator-institution">Administración y Mercadotecnia</p>
                            <p class="collaborator-description">
                                Diseño de encuestas enfocadas en competitividad y mercados.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-dark">Diseño</span>
                                <span class="badge bg-primary">Competitividad</span>
                                <span class="badge bg-secondary">Mercados</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dra. Irma Leticia Chávez Márquez</h4>
                            <p class="collaborator-title">Evaluación Estratégica</p>
                            <p class="collaborator-institution">Administración y TIC</p>
                            <p class="collaborator-description">
                                Evaluación de estrategias de administración y TIC aplicadas en las empresas encuestadas.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-success">Estrategias</span>
                                <span class="badge bg-info">TIC</span>
                                <span class="badge bg-warning">Evaluación</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dra. María de los Ángeles Guzmán Robles</h4>
                            <p class="collaborator-title">Transformación Digital</p>
                            <p class="collaborator-institution">Mercadotecnia y Transformación Digital</p>
                            <p class="collaborator-description">
                                Evaluación del impacto digital y tecnológico en la competitividad regional.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-danger">Transformación Digital</span>
                                <span class="badge bg-primary">Impacto Tecnológico</span>
                                <span class="badge bg-secondary">Mercadotecnia</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dra. Isela Adriana Valles Alarcón</h4>
                            <p class="collaborator-title">Análisis Legal</p>
                            <p class="collaborator-institution">Derecho y Cuestiones Legales</p>
                            <p class="collaborator-description">
                                Análisis de normativas que afectan la integración comercial de Chihuahua.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-dark">Normativas</span>
                                <span class="badge bg-primary">Integración Comercial</span>
                                <span class="badge bg-secondary">Derecho</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dra. Elia Angélica Molina Lara</h4>
                            <p class="collaborator-title">Análisis Fiscal</p>
                            <p class="collaborator-institution">Fiscal y Auditoría</p>
                            <p class="collaborator-description">
                                Evaluación de incentivos fiscales y obstáculos administrativos para la inversión.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-success">Incentivos Fiscales</span>
                                <span class="badge bg-info">Obstáculos</span>
                                <span class="badge bg-warning">Inversión</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dr. José Francisco Aldrete Enríquez</h4>
                            <p class="collaborator-title">Supervisión Digital</p>
                            <p class="collaborator-institution">Sistemas</p>
                            <p class="collaborator-description">
                                Supervisión del procesamiento digital de encuestas y manejo de herramientas tecnológicas. Diseño de SENSEA.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-danger">Procesamiento Digital</span>
                                <span class="badge bg-primary">Herramientas Tecnológicas</span>
                                <span class="badge bg-secondary">SENSEA</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dra. María del Carmen Gutiérrez Diez</h4>
                            <p class="collaborator-title">Digitalización</p>
                            <p class="collaborator-institution">Sistemas</p>
                            <p class="collaborator-description">
                                Digitalización de encuestas y automatización de datos en herramientas de análisis estadístico.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-info">Digitalización</span>
                                <span class="badge bg-warning">Automatización</span>
                                <span class="badge bg-success">Análisis Estadístico</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Equipo 3: Estrategias y Difusión Section -->
    <section id="equipo-3" class="py-5 team-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">
                    <i class="fas fa-rocket me-3"></i>Equipo 3: Diseño de Estrategias y Difusión
                </h2>
                <p class="section-subtitle">Etapa 3: Mayo - Diciembre 2026</p>
                <div class="team-objective">
                    <p class="lead">Validar los hallazgos con expertos, diseñar estrategias de competitividad regional y difundir los resultados del estudio.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dr. Omar Elier Varela Faudoa</h4>
                            <p class="collaborator-title">Estrategias Económicas</p>
                            <p class="collaborator-institution">Finanzas, Economía y Estadística</p>
                            <p class="collaborator-description">
                                Desarrollo de estrategias económicas y financieras para mejorar la competitividad.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-primary">Estrategias Económicas</span>
                                <span class="badge bg-secondary">Estrategias Financieras</span>
                                <span class="badge bg-success">Competitividad</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dra. Berenice Núñez Meléndez</h4>
                            <p class="collaborator-title">Evaluación de Impacto</p>
                            <p class="collaborator-institution">Economía y Bases de Datos</p>
                            <p class="collaborator-description">
                                Evaluación de impacto de las estrategias con modelos de simulación.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-info">Evaluación de Impacto</span>
                                <span class="badge bg-warning">Modelos de Simulación</span>
                                <span class="badge bg-danger">Estrategias</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dra. Marisol Priscila Palafox Bolívar</h4>
                            <p class="collaborator-title">Posicionamiento Comercial</p>
                            <p class="collaborator-institution">Administración y Mercadotecnia</p>
                            <p class="collaborator-description">
                                Estrategias de posicionamiento y promoción comercial de las regiones de Chihuahua.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-dark">Posicionamiento</span>
                                <span class="badge bg-primary">Promoción Comercial</span>
                                <span class="badge bg-secondary">Mercadotecnia</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dra. María de los Ángeles Guzmán Robles</h4>
                            <p class="collaborator-title">Internacionalización Digital</p>
                            <p class="collaborator-institution">Mercadotecnia y Transformación Digital</p>
                            <p class="collaborator-description">
                                Aplicación de herramientas digitales para la internacionalización de empresas.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-success">Herramientas Digitales</span>
                                <span class="badge bg-info">Internacionalización</span>
                                <span class="badge bg-warning">Empresas</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dra. Isela Adriana Valles Alarcón</h4>
                            <p class="collaborator-title">Revisión Legal</p>
                            <p class="collaborator-institution">Derecho y Cuestiones Legales</p>
                            <p class="collaborator-description">
                                Revisión legal de estrategias y políticas de integración comercial.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-danger">Revisión Legal</span>
                                <span class="badge bg-primary">Políticas</span>
                                <span class="badge bg-secondary">Integración Comercial</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Candidato a Doctor Héctor Hugo Domínguez Aragón</h4>
                            <p class="collaborator-title">Talento Humano</p>
                            <p class="collaborator-institution">Recursos Humanos y Administración</p>
                            <p class="collaborator-description">
                                Propuestas para mejorar la capacitación y competitividad del talento humano en el estado.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-dark">Capacitación</span>
                                <span class="badge bg-primary">Talento Humano</span>
                                <span class="badge bg-secondary">Propuestas</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>Dra. María del Carmen Gutiérrez Diez</h4>
                            <p class="collaborator-title">Herramientas Digitales</p>
                            <p class="collaborator-institution">Sistemas</p>
                            <p class="collaborator-description">
                                Implementación de herramientas digitales para la difusión del estudio y estrategias tecnológicas para la integración comercial.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-info">Herramientas Digitales</span>
                                <span class="badge bg-warning">Difusión</span>
                                <span class="badge bg-success">Integración Comercial</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>M.A. Cynthia Guadalupe Parra Almada</h4>
                            <p class="collaborator-title">Desarrollo de Tesis</p>
                            <p class="collaborator-institution">Tesista Doctoral</p>
                            <p class="collaborator-description">
                                Desarrollo de tesis doctoral en el marco de la temática.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-dark">Tesis Doctoral</span>
                                <span class="badge bg-primary">Desarrollo</span>
                                <span class="badge bg-secondary">Investigación</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collaborator-card">
                        <div class="collaborator-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="collaborator-info">
                            <h4>M.B.A. Juan Carlos Gómez Cano</h4>
                            <p class="collaborator-title">Planificación de Resultados</p>
                            <p class="collaborator-institution">Economista y Administrador</p>
                            <p class="collaborator-description">
                                Planificación de entrega de resultados y presentación.
                            </p>
                            <div class="collaborator-expertise">
                                <span class="badge bg-success">Planificación</span>
                                <span class="badge bg-info">Entrega de Resultados</span>
                                <span class="badge bg-warning">Presentación</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Colaboradores Externos Section -->
    <section id="colaboradores-externos" class="py-5 bg-gradient-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">
                    <i class="fas fa-globe-americas me-3"></i>Colaboradores Externos
                </h2>
                <p class="section-subtitle">Expertos internacionales y entidades clave que enriquecen nuestro análisis</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="international-card">
                        <div class="international-header">
                            <div class="international-flag">
                                <i class="fas fa-flag-usa"></i>
                            </div>
                            <div class="international-info">
                                <h4>Dr. Carlos Licón</h4>
                                <p class="international-subtitle">Universidad de Utah</p>
                            </div>
                        </div>
                        <div class="international-content">
                            <p>Ha desarrollado un instrumento especializado para evaluar la competitividad regional. Su participación se centrará en capacitar al equipo de profesores del proyecto, adaptando y replicando su herramienta en las diversas regiones de Chihuahua.</p>
                            <div class="international-contribution">
                                <h5>Contribuciones Principales:</h5>
                                <div class="contribution-badges">
                                    <span class="badge bg-primary">Instrumento Especializado</span>
                                    <span class="badge bg-secondary">Capacitación</span>
                                    <span class="badge bg-success">Adaptación</span>
                                    <span class="badge bg-info">Replicación</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="international-card">
                        <div class="international-header">
                            <div class="international-flag">
                                <i class="fas fa-flag-usa"></i>
                            </div>
                            <div class="international-info">
                                <h4>Mayra Maldonado y Eduardo Villacis</h4>
                                <p class="international-subtitle">University of Texas at El Paso (UTEP)</p>
                            </div>
                        </div>
                        <div class="international-content">
                            <p>Como investigadores de la UTEP, aportarán una perspectiva binacional al proyecto. Se busca que repliquen una parte del estudio en Texas, considerando que este estado es el principal socio comercial de Chihuahua.</p>
                            <div class="international-contribution">
                                <h5>Contribuciones Principales:</h5>
                                <div class="contribution-badges">
                                    <span class="badge bg-warning">Perspectiva Binacional</span>
                                    <span class="badge bg-danger">Estudio en Texas</span>
                                    <span class="badge bg-dark">Integración Económica</span>
                                    <span class="badge bg-primary">Comercio Internacional</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-8 mx-auto">
                    <div class="institution-highlight">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4><i class="fas fa-building me-2"></i>Plataforma de Inteligencia Competitiva del Sector Privado (PICsp) Chihuahua</h4>
                                <p class="mb-0">Iniciativa del sector empresarial de Chihuahua que integra esfuerzos para analizar, diseñar y proponer políticas públicas que mejoren la competitividad regional. Cuenta con metodologías y datos que servirán como base para el diagnóstico del proyecto.</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="institution-badges">
                                    <div class="badge-item">
                                        <i class="fas fa-chart-line fa-2x text-primary"></i>
                                        <span>Metodologías</span>
                                    </div>
                                    <div class="badge-item">
                                        <i class="fas fa-database fa-2x text-secondary"></i>
                                        <span>Bases de Datos</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include '../forms/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/navigation.js"></script>
    
    <!-- JavaScript para Sistema de Pestañas de Equipos -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener todos los botones de pestañas
            const teamTabs = document.querySelectorAll('.team-tab');
            const teamSections = document.querySelectorAll('.team-section');
            
            // Función para cambiar de pestaña
            function switchTeam(teamId) {
                // Remover clase active de todas las pestañas y secciones
                teamTabs.forEach(tab => tab.classList.remove('active'));
                teamSections.forEach(section => section.classList.remove('active'));
                
                // Agregar clase active a la pestaña seleccionada
                const activeTab = document.querySelector(`[data-team="${teamId}"]`);
                if (activeTab) {
                    activeTab.classList.add('active');
                }
                
                // Mostrar la sección correspondiente
                const activeSection = document.getElementById(teamId);
                if (activeSection) {
                    activeSection.classList.add('active');
                }
                
                // Scroll suave a la sección
                if (activeSection) {
                    activeSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
            
            // Agregar event listeners a todos los botones
            teamTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const teamId = this.getAttribute('data-team');
                    switchTeam(teamId);
                });
            });
            
            // Verificar si hay un hash en la URL al cargar la página
            if (window.location.hash) {
                const hash = window.location.hash.substring(1);
                if (['equipo-1', 'equipo-2', 'equipo-3'].includes(hash)) {
                    switchTeam(hash);
                }
            }
            
            // Agregar efecto de hover mejorado
            teamTabs.forEach(tab => {
                tab.addEventListener('mouseenter', function() {
                    if (!this.classList.contains('active')) {
                        this.style.transform = 'translateY(-1px)';
                    }
                });
                
                tab.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.style.transform = 'translateY(0)';
                    }
                });
            });
        });
    </script>
</body>
</html> 