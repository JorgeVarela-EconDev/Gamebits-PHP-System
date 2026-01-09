<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro FONDEMI</title>
    <link rel="stylesheet" href="styles2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Incluye jQuery UI CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
       
        .datepicker {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-content">
            <h1 id="title">Registro (Agregar usuario)</h1>
            <form action="php/registro_usuario_be.php" method="POST" id="authForm">
                <div class="input-group">
                    <div class="input-field" id="nameInput">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Nombre" name="nombre" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Correo" name="email" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="password" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-calendar"></i>
                        <input type="text" id="fecha" class="datepicker" placeholder="Selecciona una fecha" name="fecha" required>
                    </div>
                    <p>¿Olvidaste tu contraseña? <a href="recuperacion.php">Click Aquí</a></p>
                </div>
                <div class="btn-field">
                    <button id="signUp" type="submit" name="action" value="register">Registro</button>                    
                    <button id="signIn" type="submit" name="action" value="login">Login</button>
                </div>
            </form>
            
            <div class="links">
                <a href="php/eliminar_usuario_be.php">Eliminar usuario</a>
                <a href="php/editar_usuario_be.php">Editar usuario</a>
                <a href="php/consultar_usuario_be.php">Consultar usuario</a>
            </div>
        </div>
    </div>

    
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

    <script src="script.js"></script>
</body>
</html>
