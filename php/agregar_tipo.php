<?php
include 'conexion_be.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo_juego = mysqli_real_escape_string($conexion, $_POST['tipo_juego']);
    
    $query = "INSERT INTO tipos (tipo_juego) VALUES ('$tipo_juego')";
    
    if (mysqli_query($conexion, $query)) {
        header("Location: ../tipos.php?exito=1");
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
    <title>Agregar Tipo de Juego</title>
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
            margin-bottom: 20px;
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

        .btn-agregar {
            background-color: rgb(92, 76, 175);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-agregar:hover {
            background-color: rgb(76, 62, 145);
        }

        .btn-cancelar {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-left: 10px;
        }

        .btn-cancelar:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <main class="container">
        <section id="agregar-tipo">
            <h2>Agregar Tipo de Juego</h2>
            <div class="form-container">
                <form method="POST">
                    <div class="input-field">
                        <input type="text" name="tipo_juego" placeholder="Ingrese el tipo de juego" required>
                    </div>
                    <button type="submit" class="btn-agregar">Agregar</button>
                    <a href="../tipos.php" class="btn-cancelar">Cancelar</a>
                </form>
            </div>
        </section>
    </main>
</body>
</html>

<?php
mysqli_close($conexion);
?>