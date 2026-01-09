<?php
require 'conexion_be.php'; 


$query_tipos = "SELECT * FROM tipos";
$resultado_tipos = mysqli_query($conexion, $query_tipos);
$datos_tipos = [];
while ($fila = mysqli_fetch_assoc($resultado_tipos)) {
    $datos_tipos[] = $fila;
}


$query_usuarios = "SELECT * FROM usuarios";
$resultado_usuarios = mysqli_query($conexion, $query_usuarios);
$datos_usuarios = [];
while ($fila = mysqli_fetch_assoc($resultado_usuarios)) {
    $datos_usuarios[] = $fila;
}

$query_encuesta = "SELECT * FROM encuesta";
$resultado_encuesta = mysqli_query($conexion, $query_encuesta);
$datos_encuesta = [];
while ($fila = mysqli_fetch_assoc($resultado_encuesta)) {
    $datos_encuesta[] = $fila;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte General de Datos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .seccion-consulta {
            margin-bottom: 40px;
        }
        .seccion-consulta h2 {
            color: #2C2F35;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1>Reporte General de Datos</h1>

    
    <div class="seccion-consulta">
        <h2>Tipos de Juegos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de Juego</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos_tipos as $fila): ?>
                    <tr>
                        <td><?= $fila['id'] ?></td>
                        <td><?= $fila['tipo_juego'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    
    <div class="seccion-consulta">
        <h2>Usuarios Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos_usuarios as $fila): ?>
                    <tr>
                        <td><?= $fila['id'] ?></td>
                        <td><?= $fila['nombre'] ?></td>
                        <td><?= $fila['email'] ?></td>
                        <td><?= $fila['contrasena'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    
    <div class="seccion-consulta">
        <h2>Resultados de la Encuesta</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Juego</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos_encuesta as $fila): ?>
                    <tr>
                        <td><?= $fila['id'] ?></td>
                        <td><?= $fila['nombre_juego'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>