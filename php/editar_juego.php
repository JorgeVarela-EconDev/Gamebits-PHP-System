<?php
include 'conexion_be.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conexion, $_POST['id']);
    $nombre_juego = mysqli_real_escape_string($conexion, $_POST['nombre_juego']);
    
    $query = "UPDATE encuesta SET nombre_juego = '$nombre_juego' WHERE id = $id";
    
    if(mysqli_query($conexion, $query)) {
        header("Location: ../encuesta.php?exito=1");
    } else {
        header("Location: ../encuesta.php?error=" . urlencode(mysqli_error($conexion)));
    }
    exit;
}

$id = $_GET['id'] ?? 0;
$query = "SELECT * FROM encuesta WHERE id = $id";
$resultado = mysqli_query($conexion, $query);
$juego = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Juego</title>
    <link rel="stylesheet" href="../styles5.css">
    <style>
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #2196F3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    
    
    <main class="container">
        <div class="form-container">
            <h2>Editar Juego</h2>
            <form method="POST">
                <input type="hidden" name="id" value="<?= $juego['id'] ?>">
                <div class="form-group">
                    <label>Nombre del Juego:</label>
                    <input type="text" name="nombre_juego" value="<?= $juego['nombre_juego'] ?>" required>
                </div>
                <button type="submit">Actualizar</button>
            </form>
        </div>
    </main>
</body>
</html>