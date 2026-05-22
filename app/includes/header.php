<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventSync v1.0 | Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
        <div class="container-fluid">
            <button class="btn btn-primary d-lg-none me-2" type="button" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            
            <a class="navbar-brand fw-bold" href="dashboard.php">
                <i class="fas fa-calendar-check me-2"></i>EventSync
            </a>
            
            <div class="d-flex ms-auto align-items-center">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle text-white border-0" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle fa-lg me-1"></i> 
                        <span class="d-none d-md-inline">Administrador</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Configuración</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="ajax/logout.php"><i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="d-flex" id="wrapper" style="margin-top: 56px;">
        
        <div class="bg-white border-end shadow-sm" id="sidebar-wrapper">
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent text-primary fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i> Panel Principal
                </a>
                
                <h6 class="sidebar-heading px-3 mt-4 mb-1 text-muted text-uppercase fs-7">Core Financiero</h6>
                <a href="caja_unica.php" class="list-group-item list-group-item-action bg-transparent text-dark">
                    <i class="fas fa-cash-register me-2"></i> Caja Única
                </a>
                
                </div>
        </div>
        
        <div id="page-content-wrapper" class="w-100 p-4">
            