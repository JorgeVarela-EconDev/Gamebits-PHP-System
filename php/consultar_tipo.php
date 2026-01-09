<?php
include 'conexion_be.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conexion, $_GET['id']);
    $query = "SELECT * FROM tipos WHERE id = $id";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) > 0) {
        $tipo_juego = mysqli_fetch_assoc($resultado);
    } else {
        header("Location: ../tipos.php?error=Tipo de juego no encontrado");
        exit;
    }
} else {
    header("Location: ../tipos.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Tipo de Juego</title>
    <link rel="stylesheet" href="../styles4.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .detalle-tipo {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }

        .detalle-tipo p {
            margin: 10px 0;
            font-size: 16px;
        }

        .btn-volver {
            display: inline-block;
            padding: 10px 20px;
            background-color: rgb(92, 76, 175);
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 15px;
        }

        .btn-volver:hover {
            background-color: rgb(76, 62, 145);
        }
    </style>
</head>
<body>
    <main class="container">
        <section id="consultar-tipo">
            <h2>Consultar Tipo de Juego</h2>
            <div class="detalle-tipo">
                <p><strong>ID:</strong> <?= $tipo_juego['id'] ?></p>
                <p><strong>Tipo de Juego:</strong> <?= $tipo_juego['tipo_juego'] ?></p>
                <a href="../tipos.php" class="btn-volver">Volver</a>
            </div>
        </section>
    </main>
</body>
</html>

<?php
mysqli_close($conexion);
?>