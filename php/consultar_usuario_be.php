<?php
include 'conexion_be.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Usuario</title>
    <link rel="stylesheet" href="../styles2.css">
    <style>
        .resultado-consulta {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
            border: 1px solid #dee2e6;
        }
        .resultado-consulta p {
            margin: 10px 0;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-content">
            <h1 id="title">Consultar Usuario</h1>
            <form method="GET">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Correo del usuario a consultar" name="email" required>
                    </div>
                </div>
                <div class="btn-field">
                    <button type="submit">Consultar</button>
                </div>
            </form>

            <?php
            if (isset($_GET['email'])) {
                $correo_consultar = mysqli_real_escape_string($conexion, $_GET['email']);
                
                $query_consultar = "SELECT * FROM usuarios WHERE email = '$correo_consultar'";
                $resultado = mysqli_query($conexion, $query_consultar);

                if (mysqli_num_rows($resultado) > 0) {
                    $usuario = mysqli_fetch_assoc($resultado);
                    echo '
                    <div class="resultado-consulta">
                        <h3>Datos del Usuario:</h3>
                        <p><strong>Nombre:</strong> ' . $usuario['nombre'] . '</p>
                        <p><strong>Correo:</strong> ' . $usuario['email'] . '</p>
                        <p><strong>Contraseña:</strong> ' . $usuario['contrasena'] . '</p>
                    </div>
                    ';
                } else {
                    echo '
                    <div class="resultado-consulta">
                        <p style="color: red;">No se encontró ningún usuario con ese correo.</p>
                    </div>
                    ';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php
mysqli_close($conexion);
?>