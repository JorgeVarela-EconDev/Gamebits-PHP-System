<?php
include 'php/conexion_be.php';

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}


$query_tipos = "SELECT * FROM tipos";
$resultado_tipos = mysqli_query($conexion, $query_tipos);


$query_usuarios = "SELECT * FROM usuarios";
$resultado_usuarios = mysqli_query($conexion, $query_usuarios);


$query_encuesta = "SELECT * FROM encuesta";
$resultado_encuesta = mysqli_query($conexion, $query_encuesta);


if (!$resultado_tipos || !$resultado_usuarios || !$resultado_encuesta) {
    die("Error al obtener los datos: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta General</title>
    <link rel="stylesheet" href="styles4.css">
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .tabla-consulta {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }

        .tabla-consulta th, .tabla-consulta td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .tabla-consulta th {
            background-color: #2C2F35;
            color: white;
        }

        .tabla-consulta tr:hover {
            background-color: #f5f5f5;
        }

        .seccion-consulta {
            margin-bottom: 40px;
        }

        .seccion-consulta h2 {
            color: #2C2F35;
            margin-bottom: 15px;
        }

        
        .btn-pdf {
            display: inline-block;
            padding: 12px 24px;
            background-color: #dc3545; 
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
            margin-bottom: 20px;
        }

        .btn-pdf:hover {
            background-color: #c82333; 
            transform: translateY(-2px);
        }

        .btn-pdf i {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <header>
        <div class="content">
            <a href="principal.php" class="logo">GAMEBITS</a>
            <input type="checkbox" id="menu"/>
            <label for="menu" class="menu-icono">☰</label>
            <nav class="navbar">
                <ul>
                    <li><a href="principal.php">Inicio</a></li>
                    <li><a href="consulta_general.php">Consulta</a></li>
                    <li><a href="tipos.php">Tipos de juegos</a></li>
                    <li><a href="encuesta.php">Encuesta</a></li>
                    <li><a href="preguntas.php">Preguntas frecuentes</a></li>
                    <li><a href="index.php">Registro</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        
        <a href="php/generarPDF.php" class="btn-pdf">
            <i class="fas fa-file-pdf"></i> Generar Reporte PDF
        </a>

        
        <div class="seccion-consulta">
            <h2>Tipos de Juegos</h2>
            <table class="tabla-consulta">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo de Juego</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_assoc($resultado_tipos)): ?>
                        <tr>
                            <td><?= $fila['id'] ?></td>
                            <td><?= $fila['tipo_juego'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        
        <div class="seccion-consulta">
            <h2>Usuarios Registrados</h2>
            <table class="tabla-consulta">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_assoc($resultado_usuarios)): ?>
                        <tr>
                            <td><?= $fila['id'] ?></td>
                            <td><?= $fila['nombre'] ?></td>
                            <td><?= $fila['email'] ?></td>
                            <td><?= $fila['contrasena'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        
        <div class="seccion-consulta">
            <h2>Resultados de la Encuesta</h2>
            <table class="tabla-consulta">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Juego</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_assoc($resultado_encuesta)): ?>
                        <tr>
                            <td><?= $fila['id'] ?></td>
                            <td><?= $fila['nombre_juego'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>

<?php
mysqli_close($conexion);
?>