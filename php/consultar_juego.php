<?php
include 'conexion_be.php';

$id = $_GET['id'] ?? 0;
$query = "SELECT * FROM encuesta WHERE id = $id";
$resultado = mysqli_query($conexion, $query);
$juego = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Juego</title>
    <link rel="stylesheet" href="../styles5.css">
    <style>
        .detail-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .detail-item {
            margin-bottom: 15px;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .detail-label {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    
    
    <main class="container">
        <div class="detail-container">
            <h2>Detalles del Juego</h2>
            <div class="detail-item">
                <span class="detail-label">ID:</span>
                <?= $juego['id'] ?>
            </div>
            <div class="detail-item">
                <span class="detail-label">Nombre:</span>
                <?= $juego['nombre_juego'] ?>
            </div>
            <a href="../encuesta.php">Volver a la lista</a>
        </div>
    </main>
</body>
</html>