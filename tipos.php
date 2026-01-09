<?php
include 'php/conexion_be.php';

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$query = "SELECT * FROM tipos";
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
    <title>Tipos de Juegos</title>
    <link rel="stylesheet" href="styles4.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .lista-tipos {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }

        .lista-tipos ul {
            list-style-type: none;
            padding: 0;
        }

        .lista-tipos li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .lista-tipos li:last-child {
            border-bottom: none;
        }

        .acciones-tipo a {
            display: inline-block;
            padding: 5px 10px;
            margin-left: 5px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: opacity 0.3s;
        }

        .btn-consultar {
            background-color: rgb(128, 122, 129);
        }

        .btn-editar {
            background-color: rgb(139, 152, 147);
        }

        .btn-eliminar {
            background-color: rgb(152, 139, 138);
        }

        .acciones-tipo a:hover {
            opacity: 0.8;
        }

        .mensaje-exito {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            text-align: center;
        }

        .mensaje-error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            text-align: center;
        }

        .btn-agregar {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            background-color: rgb(92, 76, 175);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-agregar:hover {
            background-color: rgb(76, 62, 145);
            transform: translateY(-2px);
        }

        .btn-agregar i {
            margin-right: 8px;
        }

        
        .datepicker {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 200px;
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
        <section id="tipos-juegos">
            <h2>Tipos de Juegos</h2>

            <?php if (isset($_GET['exito'])): ?>
                <div class="mensaje-exito">
                    <?php
                    switch ($_GET['exito']) {
                        case 1: echo "¡Tipo de juego agregado correctamente!"; break;
                        case 2: echo "¡Tipo de juego actualizado correctamente!"; break;
                        case 3: echo "¡Tipo de juego eliminado correctamente!"; break;
                    }
                    ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['error'])): ?>
                <div class="mensaje-error">
                    Error: <?= htmlspecialchars($_GET['error']) ?>
                </div>
            <?php endif; ?>

            
            <div class="acciones">
                <a href="php/agregar_tipo.php" class="btn-agregar">
                    <i class="fas fa-plus"></i> Agregar Nuevo Tipo de Juego
                </a>
            </div>

            
            <div style="margin: 20px 0;">
                <label for="fecha">Selecciona una fecha:</label>
                <input type="text" id="fecha" class="datepicker">
            </div>

            
            <div class="lista-tipos">
                <h3>Tipos de Juegos Registrados</h3>
                <ul>
                    <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                        <li>
                            <?= htmlspecialchars($fila['tipo_juego']) ?>
                            <div class="acciones-tipo">
                                <a href="php/consultar_tipo.php?id=<?= $fila['id'] ?>" class="btn-consultar">Consultar</a>
                                <a href="php/editar_tipo.php?id=<?= $fila['id'] ?>" class="btn-editar">Editar</a>
                                <a href="php/eliminar_tipo.php?id=<?= $fila['id'] ?>" 
                                   class="btn-eliminar"
                                   onclick="return confirm('¿Estás seguro de eliminar este tipo de juego?');">
                                    Eliminar
                                </a>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
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

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>

<?php
mysqli_close($conexion);
?>