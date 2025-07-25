<?php
// Obtener el título de la página desde la variable pasada
$titulo_pagina = isset($titulo_pagina) ? $titulo_pagina : 'SENSEA';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo_pagina) ?> - SENSEA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .navbar-sensea {
            background: linear-gradient(90deg, #8e24aa 0%, #d81b60 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: white !important;
        }
        .user-menu {
            min-width: 200px;
        }
        .user-info {
            background: rgba(255,255,255,0.1);
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            color: white;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255,255,255,0.3);
        }
        .page-title {
            color: white;
            font-weight: 600;
            font-size: 1.3rem;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-sensea">
        <div class="container-fluid">
            <a class="navbar-brand" href="../admin.html">
                <i class="fas fa-chart-line me-2"></i>SENSEA
            </a>
            
            <div class="navbar-nav mx-auto">
                <span class="page-title"><?= htmlspecialchars($titulo_pagina) ?></span>
            </div>
            
            <div class="dropdown">
                <button class="btn user-info dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../assets/images/avatar-default.png" alt="Avatar" class="user-avatar">
                    <span>Dr. José Francisco Aldrete Enríquez</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end user-menu" aria-labelledby="userMenu">
                    <li class="text-center py-2">
                        <img src="../assets/images/avatar-default.png" alt="Avatar" class="user-avatar mb-2">
                        <div><strong>Dr. José Francisco Aldrete Enríquez</strong></div>
                        <small class="text-muted">Administrador</small>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Editar perfil</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Configuración</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="../index.html"><i class="fas fa-sign-out-alt me-2"></i>Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav> 