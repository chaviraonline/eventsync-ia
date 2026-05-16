<?php
require_once 'config.php';
session_start();

$error = '';

// Procesar el formulario cuando se envía por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo']);
    $password = trim($_POST['password']);

    if (!empty($correo) && !empty($password)) {
        // Consultar el usuario, asegurando que esté activo y trayendo el nombre del Rol
        $sql = "SELECT u.*, r.nombre_rol 
                FROM Usuarios u 
                JOIN Roles r ON u.rol_id = r.id 
                WHERE u.correo = ? AND u.activo = 1 
                LIMIT 1";
                
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$correo]);
        $usuario = $stmt->fetch();

        // Verificar el hash de la contraseña (utilizando password_verify)
        if ($usuario && password_verify($password, $usuario['password'])) {
            // Guardar variables de control en sesión
            $_SESSION['user_id']   = $usuario['id'];
            $_SESSION['user_name'] = $usuario['nombre'];
            $_SESSION['user_role'] = $usuario['nombre_rol'];
            
            // Redirección al módulo principal
            header("Location: dashboard.php");
            exit;
        } else {
            $error = 'Las credenciales ingresadas son incorrectas o la cuenta está inactiva.';
        }
    } else {
        $error = 'Por favor, introduce tu correo y contraseña.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Sistema | <?php echo SYS_NAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: #f8f9fa;
        }
        /* Lado Izquierdo: Fondo de Imagen con Degradado Corporativo */
        .login-side-img {
            background-image: linear-gradient(135deg, rgba(15, 32, 39, 0.85) 0%, rgba(44, 83, 100, 0.85) 100%), 
                              url('https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        /* Lado Derecho: Contenedor del Formulario */
        .login-form-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
            background-color: #fff !important;
        }
        .brand-logo-text {
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

    <div class="container-fluid p-0">
        <div class="row g-0">
            
            <div class="col-md-6 col-lg-7 d-none d-md-block">
                <div class="login-side-img d-flex flex-column justify-content-end p-5 text-white">
                    <div class="mb-4">
                        <span class="badge bg-primary mb-3 text-uppercase tracking-wider px-3 py-2">Ecosistema ERP v<?php echo SYS_VERSION; ?></span>
                        <h2 class="display-5 fw-bold mb-2">Control total y finanzas al centavo.</h2>
                        <p class="lead opacity-75 fs-5">La solución inteligente para la administración de recintos, seguimiento de paquetes escolares y conciliación de caja única.</p>
                    </div>
                    <div class="border-top border-secondary pt-3 opacity-50">
                        <small>&copy; 2026 <?php echo SYS_NAME; ?> Global Solutions.</small>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 bg-white">
                <div class="login-form-container">
                    <div class="w-100" style="max-width: 400px;">
                        
                        <div class="text-center text-md-start mb-5">
                            <h3 class="fw-bold fs-2 brand-logo-text mb-2 text-dark">
                                <i class="fa-solid fa-calendar-check text-primary me-1"></i>Event<span class="text-primary">Sync</span>
                            </h3>
                            <p class="text-muted">Ingresa tus credenciales de empleado para acceder al panel financiero.</p>
                        </div>

                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger d-flex align-items-center py-2 mb-4" role="alert">
                                <i class="fa-solid fa-triangle-exclamation me-2"></i>
                                <div class="small"><?php echo htmlspecialchars($error); ?></div>
                            </div>
                        <?php endif; ?>

                        <form action="" method="POST" autocomplete="off">
                            
                            <div class="mb-4">
                                <label for="correo" class="form-label fw-semibold text-secondary small">Correo Electrónico</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-envelope"></i></span>
                                    <input type="email" class="form-control bg-light border-start-0 ps-1" id="correo" name="correo" placeholder="usuario@dominio.com" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="password" class="form-label fw-semibold text-secondary small mb-0">Contraseña</label>
                                    <a href="#" class="text-decoration-none small text-primary fw-medium">¿Olvidaste tu contraseña?</a>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-lock"></i></span>
                                    <input type="password" class="form-control bg-light border-start-0 ps-1" id="password" name="password" placeholder="••••••••" required>
                                </div>
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember_me">
                                <label class="form-check-label text-muted small" for="remember_me">Recordar este dispositivo</label>
                            </div>

                            <div class="d-grid gap-2 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg fw-bold py-2.5 fs-6 shadow-sm text-uppercase tracking-wider">
                                    <i class="fa-solid fa-right-to-bracket me-2"></i>Ingresar al Sistema
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-5 pt-4 border-top border-light">
                            <span class="text-muted small">¿Problemas con tu terminal?</span>
                            <a href="https://wa.me/5211234567890" target="_blank" class="text-decoration-none small fw-bold ms-1 text-success">
                                <i class="fa-brands fa-whatsapp me-1"></i>Soporte de Caja
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>