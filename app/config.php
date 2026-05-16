<?php
/**
 * EventSync ERP - Archivo Central de Configuración
 */

// 1. Parámetros de la Base de Datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'pass');
define('DB_NAME', 'miseventos');

// 2. Parámetros Generales de la Plataforma
define('SYS_NAME', 'EventSync');
define('SYS_VERSION', '1.0.0');
define('SYS_URL', 'http://localhost/eventsync/'); // Modificar según el dominio final

// 3. Inicialización de Conexión Segura (PDO)
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", 
        DB_USER, 
        DB_PASS
    );
    // Forzar manejo estricto de errores y retornos limpios en arreglos asociativos
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // En producción se recomienda cambiar el 'die' por un log interno por seguridad
    die("Error crítico de infraestructura: No se pudo conectar a la base de datos.");
}