<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel SENSEA</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 100%);
            font-family: 'Inter', sans-serif;
        }
        .dashboard-card {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }
        .dashboard-card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 32px rgba(0,0,0,0.12);
        }
        .dashboard-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .user-menu {
            min-width: 180px;
        }
        .avatar-img {
            width: 64px !important;
            height: 64px !important;
            object-fit: cover !important;
            background: #f0f0f0;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3" style="background: linear-gradient(90deg, #8e24aa 0%, #d81b60 100%) !important;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold fs-3 text-white" href="#">
                <i class="fas fa-chart-line me-2"></i>SENSEA
            </a>
            <div class="text-center flex-grow-1">
                <h3 class="text-white fw-bold mb-0" style="font-size: 1.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">Captura de Localización y Demografía</h3>
            </div>
            <div class="dropdown ms-auto">
                <button class="btn btn-primary dropdown-toggle text-white d-flex align-items-center gap-2" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false" style="background: rgba(255,255,255,0.1); border: none;">
                    <img id="avatarMenu" src="assets/images/avatar-default.png" alt="Avatar" class="rounded-circle avatar-img" >
                    <span id="nombreUsuarioMenu">Dr. José Francisco Aldrete Enríquez</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end user-menu" aria-labelledby="userMenu">
                    <li class="text-center py-2">
                        <img id="avatarDetalle" src="assets/images/avatar-default.png" alt="Avatar" class="rounded-circle avatar-img mb-2">
                        <div><span id="nombreUsuarioDetalle">Dr. José Francisco Aldrete Enríquez</span></div>
                    </li>
                    <li><a class="dropdown-item" href="#" id="editProfileBtn"><i class="fas fa-edit me-2"></i>Editar perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#" id="logoutBtn"><i class="fas fa-sign-out-alt me-2"></i>Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Panel Principal -->
    <div class="container py-5" id="dashboard">
        <div class="row mb-5">
            <div class="col text-center">
                <h1 class="fw-bold mb-3" style="color: #8e24aa;">Panel de Administración</h1>
                <p class="lead" style="color: #b39ddb;">Selecciona una sección para comenzar</p>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <a href="forms/entidad_geografica_form.php" style="text-decoration:none;">
                    <div class="card dashboard-card text-center p-4 h-100">
                        <div class="dashboard-icon text-primary"><i class="fas fa-city"></i></div>
                        <h4 class="fw-bold mb-2" style="color: #8e24aa;">Captura de Variables/Indicadores de Municipios</h4>
                        <p class="text-muted">Referencia geográfica, demografía, tipología territorial, ambiental, social y económica.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card dashboard-card text-center p-4 h-100">
                    <div class="dashboard-icon text-success"><i class="fas fa-users-cog"></i></div>
                    <h4 class="fw-bold mb-2" style="color: #43a047;">Análisis de expertos</h4>
                    <p class="text-muted">Captura de análisis por categorías: Social, Ambiental y Económico.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card dashboard-card text-center p-4 h-100">
                    <div class="dashboard-icon text-warning"><i class="fas fa-chart-pie"></i></div>
                    <h4 class="fw-bold mb-2" style="color: #fbc02d;">Análisis e interpretación de resultados</h4>
                    <p class="text-muted">Visualiza y analiza los resultados integrados del sistema.</p>
                </div>
            </div>
        </div>
    </div>
    <?php include 'forms/footer.php'; ?>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM cargado');
        
        // Verificar si Bootstrap está disponible
        if (typeof bootstrap === 'undefined') {
            console.error('Bootstrap no está disponible');
            return;
        }
        
        console.log('Bootstrap disponible');
        
        // Inicializar todos los dropdowns de Bootstrap
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        console.log('Dropdowns encontrados:', dropdownElementList.length);
        
        var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
            console.log('Inicializando dropdown:', dropdownToggleEl);
            return new bootstrap.Dropdown(dropdownToggleEl);
        });
        
        console.log('Dropdowns inicializados:', dropdownList.length);
        
        // Cargar información del usuario desde localStorage
        const empleado = localStorage.getItem('empleado');
        const nombreUsuario = localStorage.getItem('nombreUsuario');
        const fotoUsuario = localStorage.getItem('fotoUsuario');
        
        console.log('Usuario logueado:', empleado);
        
        // Si no hay usuario logueado, redirigir al login
        if (!empleado) {
            console.log('No hay usuario, redirigiendo...');
            window.location.href = 'index.php';
            return;
        }
        
        // Actualizar información del usuario en la interfaz
        if (nombreUsuario) {
            document.getElementById('nombreUsuarioMenu').textContent = nombreUsuario;
            document.getElementById('nombreUsuarioDetalle').textContent = nombreUsuario;
        }
        
        if (fotoUsuario) {
            document.getElementById('avatarMenu').src = fotoUsuario;
            document.getElementById('avatarDetalle').src = fotoUsuario;
        }
        
        // Manejar logout
        document.getElementById('logoutBtn').addEventListener('click', function(e) {
            e.preventDefault();
            
            if (confirm('¿Estás seguro que deseas cerrar sesión?')) {
                // Limpiar localStorage
                localStorage.removeItem('empleado');
                localStorage.removeItem('nombreUsuario');
                localStorage.removeItem('fotoUsuario');
                
                // Redirigir al login
                window.location.href = 'index.php';
            }
        });
        
        // Manejar editar perfil (placeholder)
        document.getElementById('editProfileBtn').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Función de editar perfil próximamente disponible.');
        });
        
        // Agregar evento de clic manual al botón del dropdown
        document.getElementById('userMenu').addEventListener('click', function(e) {
            console.log('Botón de usuario clickeado');
            e.preventDefault();
            e.stopPropagation();
            
            const dropdownMenu = this.nextElementSibling;
            if (dropdownMenu.classList.contains('show')) {
                dropdownMenu.classList.remove('show');
            } else {
                dropdownMenu.classList.add('show');
            }
        });
    });
    </script>
</body>
</html> 