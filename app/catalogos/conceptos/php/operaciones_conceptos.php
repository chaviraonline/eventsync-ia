<?php
session_start();
header('Content-Type: application/json');

// Validar que el usuario tenga sesión activa (Asumimos que la variable de sesión existe)
if (!isset($_SESSION['IdUsuario'])) {
    echo json_encode(['status' => 'error', 'message' => 'Sesión expirada.']);
    exit;
}

require_once '../config/conexion.php'; // Archivo de conexión a la BD MySQL

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

switch ($accion) {
    case 'leer':
        // Cargar todos los conceptos para el DataTable
        $sql = "SELECT IdConcepto, Descripcion, TipoMovimiento, Activo FROM ConceptosCaja ORDER BY IdConcepto DESC";
        $result = $conexion->query($sql);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        echo json_encode(["data" => $data]);
        break;

    case 'crear':
        $descripcion = trim($_POST['Descripcion']);
        $tipoMovimiento = $_POST['TipoMovimiento'];

        if (empty($descripcion) || empty($tipoMovimiento)) {
            echo json_encode(['status' => 'error', 'message' => 'Todos los campos son obligatorios.']);
            exit;
        }

        $sql = "INSERT INTO ConceptosCaja (Descripcion, TipoMovimiento, Activo) VALUES (?, ?, 1)";
        if ($stmt = $conexion->prepare($sql)) {
            $stmt->bind_param("ss", $descripcion, $tipoMovimiento);
            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Concepto creado exitosamente.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error al guardar el concepto.']);
            }
            $stmt->close();
        }
        break;

    case 'editar':
        $idConcepto = intval($_POST['IdConcepto']);
        $descripcion = trim($_POST['Descripcion']);
        $tipoMovimiento = $_POST['TipoMovimiento'];

        if (empty($descripcion) || empty($tipoMovimiento) || $idConcepto <= 0) {
            echo json_encode(['status' => 'error', 'message' => 'Datos inválidos o incompletos.']);
            exit;
        }

        $sql = "UPDATE ConceptosCaja SET Descripcion = ?, TipoMovimiento = ? WHERE IdConcepto = ?";
        if ($stmt = $conexion->prepare($sql)) {
            $stmt->bind_param("ssi", $descripcion, $tipoMovimiento, $idConcepto);
            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Concepto actualizado.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error al actualizar el concepto.']);
            }
            $stmt->close();
        }
        break;

    case 'desactivar':
    case 'activar':
        $idConcepto = intval($_POST['IdConcepto']);
        $nuevoEstado = ($accion === 'activar') ? 1 : 0;

        if ($idConcepto <= 0) {
            echo json_encode(['status' => 'error', 'message' => 'ID de concepto no válido.']);
            exit;
        }

        $sql = "UPDATE ConceptosCaja SET Activo = ? WHERE IdConcepto = ?";
        if ($stmt = $conexion->prepare($sql)) {
            $stmt->bind_param("ii", $nuevoEstado, $idConcepto);
            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Estado actualizado correctamente.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'No se pudo cambiar el estado.']);
            }
            $stmt->close();
        }
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Acción no permitida.']);
        break;
}

$conexion->close();
?>