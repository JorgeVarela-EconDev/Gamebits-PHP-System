<?php
include 'php/conexion_be.php';

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$query = "SELECT id, nombre_juego FROM encuesta";
$resultado = mysqli_query($conexion, $query);

if (!$resultado) {
    die("Error al obtener los datos: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta de Juegos</title>
    <link rel="stylesheet" href="styles6.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #2C2F35;
            color: white;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        .acciones {
            margin: 20px 0;
            text-align: center;
        }

        .acciones a {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-agregar {
            background-color: rgb(92, 76, 175);
        }

        .btn-graficas {
            background-color: rgb(92, 76, 175); 
        }

        .btn-editar {
            background-color: rgb(139, 152, 147);
        }

        .btn-consultar {
            background-color: rgb(128, 122, 129);
        }

        .btn-eliminar {
            background-color: rgb(152, 139, 138);
        }

        .acciones a:hover {
            opacity: 0.9;
        }

        
        .datepicker {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 200px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="content">
            <div class="menu container">
                <a href="principal.php" class="logo">GAMEBITS</a>
                <input type="checkbox" id="menu"/>
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
        </div>
    </header>

    <main class="container">
        <section id="juegos">
            <h2>Resultados de la Encuesta</h2>
            
            
            <div class="acciones">
                <a href="php/agregar_juego.php" class="btn-agregar">Agregar Nuevo Juego</a>
                <a href="JqPlot/graficas.php" class="btn-graficas">Gráficas</a>
            </div>

            
            <div>
                <label for="fecha">Selecciona una fecha:</label>
                <input type="text" id="fecha" class="datepicker">
            </div>

            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Juego</th>
                        <th>Acciones</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>
                                <td>{$fila['id']}</td>
                                <td>{$fila['nombre_juego']}</td>
                                <td>
                                    <a href='php/consultar_juego.php?id={$fila['id']}' 
                                       class='btn-consultar'
                                       style='margin-right: 5px;'>
                                        Consultar
                                    </a>
                                    <a href='php/editar_juego.php?id={$fila['id']}' 
                                       class='btn-editar'
                                       style='margin-right: 5px;'>
                                        Editar
                                    </a>
                                    <a href='php/eliminar_juego.php?id={$fila['id']}' 
                                       class='btn-eliminar'
                                       onclick='return confirm(\"¿Estás seguro de eliminar este registro?\");'>
                                        Eliminar
                                    </a>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    
    <script>
        $(function() {
            $("#fecha").datepicker({
                dateFormat: "yy-mm-dd", 
                changeMonth: true, 
                changeYear: true, 
                yearRange: "1900:2025" 
            });
        });
    </script>
</body>
</html>

<?php
mysqli_close($conexion);
?>