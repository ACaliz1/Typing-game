<?php
include '../config/database.php';

// Crear una consulta SQL para obtener las estadísticas de todos los usuarios
$sql = "SELECT username, wpm, accuracy, created_at FROM user_stats ORDER BY created_at DESC";
$result = $conn->query($sql);

$stats = [];

if ($result->num_rows > 0) {
    // Recorrer los resultados y agregar cada fila a la matriz de estadísticas
    while($row = $result->fetch_assoc()) {
        $stats[] = $row;
    }
} else {
    $stats = [];
}

// Enviar los resultados como un JSON
header('Content-Type: application/json');
echo json_encode($stats);

$conn->close();
?>
