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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevo_tipo = mysqli_real_escape_string($conexion, $_POST['tipo_juego']);
    $query = "UPDATE tipos SET tipo_juego = '$nuevo_tipo' WHERE id = $id";

    if (mysqli_query($conexion, $query)) {
        header("Location: ../tipos.php?exito=2");
        exit;
    } else {
        header("Location: ../tipos.php?error=" . urlencode(mysqli_error($conexion)));
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipo de Juego</title>
    <link rel="stylesheet" href="../styles4.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }

        .input-field {
            margin-bottom: 15px;
        }

        .input-field input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn-guardar {
            background-color: rgb(92, 76, 175);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-guardar:hover {
            background-color: rgb(76, 62, 145);
        }

        .btn-volver {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-left: 10px;
        }

        .btn-volver:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <main class="container">
        <section id="editar-tipo">
            <h2>Editar Tipo de Juego</h2>
            <div class="form-container">
                <form method="POST">
                    <div class="input-field">
                        <input type="text" name="tipo_juego" value="<?= $tipo_juego['tipo_juego'] ?>" required>
                    </div>
                    <button type="submit" class="btn-guardar">Guardar Cambios</button>
                    <a href="../tipos.php" class="btn-volver">Volver</a>
                </form>
            </div>
        </section>
    </main>
</body>
</html>

<?php
mysqli_close($conexion);
?>